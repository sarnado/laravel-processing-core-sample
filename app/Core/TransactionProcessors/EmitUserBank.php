<?php


namespace App\Core\TransactionProcessors;


use App\Core\Statuses\TransactionStatuses;
use App\Events\TransactionProcessedEvent;
use App\Models\Transaction;

class EmitUserBank implements ITransactionProcessor
{

    private Transaction $transaction;

    /**
     * @throws \Throwable
     */
    public function process(Transaction $transaction): Transaction
    {
        $this->transaction = $transaction;
        return \DB::transaction(function() {
            $this->emitUserBank();
            $this->updateTransactionStatus();
            $this->sendCallback();
            return $this->transaction;
        });
    }

    private function emitUserBank(): void
    {
        // TODO: there we must emit user bank for sending funds to processing bank account
    }

    private function updateTransactionStatus(): void
    {
        $this->transaction->status = TransactionStatuses::THREE_DS;
        $this->transaction->save();
    }

    private function sendCallback(): void
    {
        // TODO: There we must send notification to user frontend or send callback to another microservice
    }
}
