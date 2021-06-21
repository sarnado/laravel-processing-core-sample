<?php


namespace App\DTO;


use JetBrains\PhpStorm\ArrayShape;

class CreateTransactionDTO
{
    public string $from_card;

    public string $from_card_date;

    public string $from_card_user;

    public string $from_card_cvv;

    public string $to_card;

    public string $amount;

    public int $currency_id;

    public function __construct(array $data)
    {
        if (!isset(
            $data['from_card'],
            $data['from_card_date'],
            $data['from_card_user'],
            $data['from_card_cvv'],
            $data['to_card'],
            $data['amount'],
            $data['currency_id'],
        )) {
            throw new \InvalidArgumentException('Invalid data provided');
        }
        $this->from_card = $data['from_card'];
        $this->from_card_date = $data['from_card_date'];
        $this->from_card_user = $data['from_card_user'];
        $this->from_card_cvv = $data['from_card_cvv'];
        $this->to_card = $data['to_card'];
        $this->amount = number_format($data['amount'], 5, '.', '');
        $this->currency_id = $data['currency_id'];
    }

    #[ArrayShape(['from_card' => "string", 'from_card_date' => "string", 'from_card_user' => "string", 'to_card' => "string", 'amount' => "string", 'currency_id' => "int", 'from_card_cvv' => "string|null"])]
    public function toArray($withCvv = false): array
    {
        return [
            'from_card' =>  $this->from_card,
            'from_card_date' => $this->from_card_date,
            'from_card_user' => $this->from_card_user,
            'from_card_cvv' => $withCvv ? $this->from_card_cvv : null,
            'to_card' => $this->to_card,
            'amount' => $this->amount,
            'currency_id' => $this->currency_id
        ];
    }
}
