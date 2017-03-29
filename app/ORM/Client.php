<?php

namespace App\ORM;

class Client
{

    protected $table = 'clients';
    protected $fields = [
        'type',
        'name',
        'mobile',
        'email',
        'address_1',
        'address_2',
        'address_3',
        'address_4',
        'post_code',
        'city',
        'country',
        'telephone',
        'contact_first_name',
        'contact_last_name',
        'contact_email',
        'contact_telephone',
        'contact_mobile',
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
