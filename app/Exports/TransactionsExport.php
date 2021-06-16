<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::all();
    }
    public function headings(): array
    {
        return [
            'no',
            'name.',
            'quantity',
            'price',
            'amount',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->no,
            $transaction->name,
            $transaction->quantity,
            $transaction->price,
            $transaction->amount,
        ];
    }
}
