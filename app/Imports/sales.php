<?php

namespace App\Imports;

use App\Sale;
use App\SaleP;
use App\ItemData;
use Maatwebsite\Excel\Concerns\ToModel;

class Sales implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $x;
    public function model(array $row)
    {
        // return $row[1];
        // dd($row);
 
        if ( $row[0]=='كشف احصائي') 
        {
        $this->x=$row[4].$row[6];

        }
        elseif ( $row[0]=='البند') 
        {}
        else
        {
        // dd($row);

        // dd($this->x);
        // 'account','delegate','subject'.'quantity','price','amount','date' 

            $sale = Sale::where('date', $this->x)->where('account', $row[1])->where('delegate', $row[2])->where('subject', $row[3])->first();
            
            if ($sale) {

                $sale2 = Sale::where('id', $sale->id)->where('quantity', $row[4])->where('price', $row[5])->first();   
            
                if (!$sale2) 
                // dd($sale2);
                // dd($sale2->id);

                 return new SaleP([
                    'account'     => $row[1],
                    'delegate'    => $row[2]?$row[2]:0, 
                    'subject'    => $row[3]?$row[3]:0, 
                    'quantity'    => $row[4]?$row[4]:0, 
                    'price'    => $row[5]?$row[5]:0, 
                    'amount'    => $row[7]?$row[7]:0, 
                    'date'    => $this->x, 
                    'oldId'    => $sale->id, 
                ]);
            }
            elseif ($row[1]=="الاجمالي") {
                # code...
            }else
           
        // dd($row[3]?$row[3]:0);
         
        return new Sale([
            'account'     => $row[1],
            'delegate'    => $row[2]?$row[2]:0, 
            'subject'    => $row[3]?$row[3]:0, 
            'quantity'    => $row[4]?$row[4]:0, 
            'price'    => $row[5]?$row[5]:0, 
            'amount'    => $row[7]?$row[7]:0, 
            'date'    => $this->x, 
        ]);
        }
    }
}
