<?php

namespace App\Helpers;

use App\Models\UserModel
use Auth;

class AccessHelpers
{

    private $user = null;


    /**
     * @param null
     * @param void
     **/
    public static currentUser()
    {
        $this->userId = Auth::user();
        return $this;
    }


    /**
     * @param integer $userId
     * @param void
     **/
    public static user($userId)
    {

        $um = new UserModel;
        $this->user = $um->get($id);

    }


    /**
     * @param string $permission
     * @param boolean
     **/
    public static can($permission)
    {

        if($user == null) {
            $this->currentUser()
        }

        if($this->user->contains($permission) {
            return false;
        }

        return true;
    }
}
