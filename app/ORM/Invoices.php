<?php

namespace App\ORM;

class Invoice
{

    protected $table = 'invoices';
    protected $fields = [
        'status',
        'client_id',
        'quote_id',
        'issued_date',
        'due_date',
        'sub_total',
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
