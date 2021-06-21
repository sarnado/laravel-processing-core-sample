<?php


namespace App\Core\TransactionProcessorPipes;


use App\Core\Statuses\TransactionStatuses;
use App\Core\TransactionProcessors\CheckTransactionStatus;
use App\Core\TransactionProcessors\EmitDestinationBank;
use App\Core\TransactionProcessors\EmitUserBank;
use App\Models\Transaction;
use Closure;


class CheckTransactionStatusPipe implements ITransactionProcessorPipe
{
    protected array $statuses = [
        TransactionStatuses::REJECTED,
        TransactionStatuses::COMPLETED
    ];

    public function handle(Transaction $transaction, Closure $next)
    {
        if (in_array($transaction->status, $this->statuses, true)) {
            return new CheckTransactionStatus();
        }
        return $next($transaction);
    }
}
