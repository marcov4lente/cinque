<?php

namespace App\ORM;

class Quote
{

    protected $table = 'quotes';
    protected $fields = [
        'status',
        'client_id',
        'invoice_id',
        'issued_date',
        'expiry_date',
        'sub_total',
        'total',
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
