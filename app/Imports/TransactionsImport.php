<?php

namespace App\Imports;

use App\Transaction;
use App\ItemData;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return $row[1];
        if ( $row[1]=='المادة') 
        {}
        else
        {
            $transaction = Transaction::where('name', $row[1])->first();
            if ($transaction) {
                return new ItemData([
                    'item_id'     => $transaction->id,
                    'quantity'    => $row[2]?$row[2]:0, 
                    'price'    => $row[3]?$row[3]:0, 
                    'amount'    => $row[4]?$row[4]:0, 
                ]);
            }else
           $transaction = Transaction::create([
            'name'    => $row[1], 
            ]);
        return new ItemData([
            'item_id'     => $transaction->id,
            'quantity'    => $row[2]?$row[2]:0, 
            'price'    => $row[3]?$row[3]:0, 
            'amount'    => $row[4]?$row[4]:0, 
        ]);
        }
    }
}
