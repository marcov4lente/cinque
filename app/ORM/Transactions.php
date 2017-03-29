<?php

namespace App\ORM;

class Transactions
{

    protected $table = 'transactions';
    protected $fields = [
        'type',
        'client_id',
        'invoice_id',
        'description',
        'date',
        'amount',
    ];


    /**
     * @param null
     * @return void
     **/
    public function getFields()
    {
        return $this->fields;
    }

}
