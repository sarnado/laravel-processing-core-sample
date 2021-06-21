<?php


namespace App\Core\TransactionProcessors;


use App\Core\Statuses\TransactionStatuses;
use App\Events\TransactionProcessedEvent;
use App\Models\Transaction;

class EmitDestinationBank implements ITransactionProcessor
{

    private Transaction $transaction;

    /**
     * @throws \Throwable
     */
    public function process(Transaction $transaction): Transaction
    {
        $this->transaction = $transaction;
        return \DB::transaction(function() {
            $this->emitBank();
            $this->updateTransactionStatus();
            $this->sendCallback();
            $this->createEvent();
            return $this->transaction;
        });
    }

    private function emitBank(): void
    {
        // TODO: there we must emit destination bank and send funds from processing bank account to destination bank account
    }

    private function updateTransactionStatus(): void
    {
        $this->transaction->status = TransactionStatuses::COMPLETED;
        $this->transaction->save();
    }

    private function sendCallback(): void
    {
        // TODO: There we must send notification to user frontend or send callback to another microservice
    }

    private function createEvent(): void
    {
        event(new TransactionProcessedEvent($this->transaction));
    }
}
