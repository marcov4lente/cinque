<?php

namespace App\ORM;

class Contract
{

    protected $table = 'contracts';
    protected $fields = [
        'status',
        'client_id',
        'quote_id',
        'issued_date',
        'name',
        'attachment',
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
