<?php

namespace App\Listeners;

use App\Core\TransactionProcessor;
use App\Events\TransactionProcessedEvent;
use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessTransactionListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TransactionProcessedEvent  $event
     * @return void
     */
    public function handle(TransactionProcessedEvent $event): void
    {
        $transaction = $event->transaction;
        $this->processTransaction($transaction);
    }

    /**
     * @param Transaction $transaction
     */
    private function processTransaction(Transaction $transaction): void
    {
        $processor = new TransactionProcessor();
        $processor->init($transaction);
    }
}
