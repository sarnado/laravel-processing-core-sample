<?php


namespace App\Core\TransactionProcessors;


use App\Core\Statuses\TransactionStatuses;
use App\Events\TransactionProcessedEvent;
use App\Models\Transaction;

class CheckTransactionStatus implements ITransactionProcessor
{

    private Transaction $transaction;

    /**
     * @throws \Throwable
     */
    public function process(Transaction $transaction): Transaction
    {
        $this->transaction = $transaction;
        $this->sendCallback();
        return $this->transaction;
    }

    private function sendCallback(): void
    {
        //TODO: There we must send notification to user frontend or send callback to another microservice
    }
}
