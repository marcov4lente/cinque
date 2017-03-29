<?php

namespace App\Models;

use App\ORM\Client;
use Auth;

class ClientModel
{

    $fields =

    function get($id)
    {

        $client = Client::where('id', '=', $id)
            ->whereNull('deleted_at')
            ->first();

        return $client;

    }

    function list($filters)
    {

        $q = Client::whereNull('deleted_at')
            ->orderBy('name', 'asc');

        if(isset($filter['q']) && $filter['q'] != null) {
            $q->where(function($q) {
                $q->where('name', 'LIKE', $filter['q'])
                    ->where('contact_first_name', 'LIKE', $filter['q']);
            });
        }

        if(isset($filter['email']) && $filter['email'] != null) {

        }

        $client = $q->paginate(10);

        return $client;

    }

    function create($data)
    {

        $client = new Client;

        foreach(Client::getFields() as $f) {
            if(isset($data[$f])) {
                $client->$f = $data[$f];
            }
        }

        if(!$client->save()) {
            return false;
        }

        return $client->id;
    }

    function update($id, $data)
    {

        $client = Client::where('id', '=', $id)
            ->whereNull('deleted_at')
            ->first();

        if(!$client) {
            return false;
        }

        foreach(Client::getFields() as $f) {
            if(isset($data[$f])) {
                $client->$f = $data[$f];
            }
        }

        $client->updated_at = date('Y-m-d H:i:s');
        $client->updated_by = Auth::user()->id;

        if(!$client->save()) {
            return false;
        }

        return true;

    }

    function delete($id)
    {

        $client = Client::where('id', '=', $id)
            ->whereNull('deleted_at')
            ->first();

        if(!$client) {
            return false;
        }

        $client->deleted_at = date('Y-m-d H:i:s');
        $client->deleted_by = Auth::user()->id;
        $client->save();

        if(!$client->save()) {
            return false;
        }

        return true;

    }

}
