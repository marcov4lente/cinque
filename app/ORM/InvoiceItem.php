<?php

namespace App\ORM;

class InvoiceIten
{

    protected $table = 'invoice_items';
    protected $fields = [
        'invoice_id',
        'type',
        'sequence',
        'description',
        'quantity',
        'rate',
        'price',
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
