<?php


namespace App\Core;


use App\Core\Payloads\TransferTransactionPayload;
use App\Core\Statuses\TransactionStatuses;
use App\DTO\CreateTransactionDTO;
use App\Events\TransactionProcessedEvent;
use App\Exceptions\WrongCardException;
use App\Models\Currency;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class CreateTransaction
{
    private User $user;
    private CreateTransactionDTO $dto;
    private Transaction $tx;

    private Currency $currency;

    public function __construct(User $user, CreateTransactionDTO $dto)
    {
        $this->user = $user;
        $this->dto = $dto;
    }

    /**
     * @throws WrongCardException
     * @throws \JsonException
     * @throws \Throwable
     */
    public function execute(): Transaction
    {
        return \DB::transaction(function () {
            $this->getCurrency();
            $this->checkCards();
            $this->createTransaction();
            $this->createEvent();
            return $this->tx;
        });
    }

    /**
     * @throws ValidationException
     */
    private function getCurrency(): void
    {
        $data = Currency::find($this->dto->currency_id);
        if (!$data) {
            throw ValidationException::withMessages([
                'currency_id' => 'Wrong currency'
            ]);
        }
        $this->currency = $data;
    }

    /**
     * @throws WrongCardException
     * @throws \JsonException
     */
    private function checkCards(): void
    {
        $cardChecker = new CardChecker();
        if (!$cardChecker->checked($this->dto->from_card, $this->currency)) {
            $error = [
                ...$this->dto->toArray(),
                'field' => 'from_card'
            ];
            throw new WrongCardException(json_encode($error, JSON_THROW_ON_ERROR), 'from_card');
        }
        if (!$cardChecker->checked($this->dto->to_card, $this->currency)) {
            $error = [
                ...$this->dto->toArray(),
                'field' => 'to_card'
            ];
            throw new WrongCardException(json_encode($error, JSON_THROW_ON_ERROR), 'to_card');
        }
    }

    private function createTransaction(): void
    {
        $this->tx = new Transaction();
        $this->tx->amount = $this->dto->amount;
        $this->tx->fee = FeeCalculator::calculate($this->dto->amount, config('core.service_percent'));
        $this->tx->currency_id = $this->currency->id;
        $this->tx->status = TransactionStatuses::CREATED;
        $this->tx->payload = $this->createTxPayload();
        $this->tx->payload_type = $this->tx->payload->getShortName();
        $this->tx->user_id = $this->user->id;
        $this->tx->save();
    }

    private function createTxPayload(): TransferTransactionPayload
    {
        return TransferTransactionPayload::createFromArray($this->dto->toArray());
    }

    private function createEvent(): void
    {
        event(new TransactionProcessedEvent($this->tx));
    }
}
