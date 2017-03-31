<?php

namespace App\Http\Middleware;

use App\Helpers\AccessHelper;
use Illuminate\Http\Request;

class AccessControl
{

    public function handle(Request $request, Closure $next, $permission = null)
    {

        if($response->status() > 299) {
            return $response;
        }

        if(static::currentUser()->can($permission)) {
            return $response;
        }

        $this->redirector->route('/')
            ->with('status', 'error')
            ->with('message','Access denied.');
    }
}
