<?php


namespace App\Core\Payloads;


class TransferTransactionPayload
{
    public string $from_card;

    public string $from_card_date;

    public string $from_card_user;

    public string $to_card;

    public string $description;

    public static function createFromArray(array $data): TransferTransactionPayload
    {
        if (!isset(
            $data['from_card'],
            $data['from_card_date'],
            $data['from_card_user'],
            $data['to_card'],
            $data['description'],
        )) {
            throw new \InvalidArgumentException('Invalid data provided');
        }
        $payload = new self();
        $payload->from_card = $data['from_card'];
        $payload->from_card_date = $data['from_card_date'];
        $payload->from_card_user = $data['from_card_user'];
        $payload->to_card = $data['to_card'];
        $payload->description = $data['description'];
        return $payload;
    }
}
