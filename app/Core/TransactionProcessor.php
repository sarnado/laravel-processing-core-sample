<?php


namespace App\Core;


use App\Core\TransactionProcessorPipes\ITransactionProcessorPipe;
use App\Models\Transaction;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;

class TransactionProcessor
{

    private array $pipes = [

    ];

    public function init(Transaction $transaction)
    {
        return app(Pipeline::class)
            ->send($transaction)
            ->through($this->pipes)
            ->then(function (ITransactionProcessorPipe $processor)
            {
                return $processor;
            });
    }
}
