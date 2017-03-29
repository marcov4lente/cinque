<?php

namespace App\ORM;

class QuoteIten
{

    protected $table = 'quote_items';
    protected $fields = [
        'quote_id',
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
