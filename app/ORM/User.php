<?php

namespace App\ORM;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    protected $table = 'users';
    protected $fields = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
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
