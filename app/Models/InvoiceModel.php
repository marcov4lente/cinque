<?php

namespace App\Models;

use App\ORM\Invoice;
use Auth;

class InvoiceModel
{

    function get($id)
    {

        $invoice = Invoice::where('id', '=', $id)
            ->whereNull('deleted_at')
            ->first();

        return $invoice;

    }

    function list($filters)
    {

        $q = Invoice::whereNull('deleted_at')
            ->orderBy('name', 'asc');

        if(isset($filter['q']) && $filter['q'] != null) {
            $q->where(function($q) {
                $q->where('name', 'LIKE', $filter['q'])
                    ->where('id', 'LIKE', $filter['q']);
            });
        }

        if(isset($filter['email']) && $filter['email'] != null) {

        }

        $invoice = $q->paginate(10);

        return $invoice;

    }

    function create($data)
    {

        $invoice = new Invoice;

        foreach(Client::getFields() as $f) {
            if(isset($data[$f])) {
                $client->$f = $data[$f];
            }
        }

        if(!$invoice->save()) {
            return false;
        }

        return $invoice->id;
    }

    function update($id, $data)
    {

        $invoice = Invoice::where('id', '=', $id)
            ->whereNull('deleted_at')
            ->first();

        if(!$invoice) {
            return false;
        }

        foreach(Invoice::getFields() as $f) {
            if(isset($data[$f])) {
                $client->$f = $data[$f];
            }
        }

        $invoice->updated_at = date('Y-m-d H:i:s');
        $invoice->updated_by = Auth::user()->id;

        if(!$invoice->save()) {
            return false;
        }

        return true;

    }

    function delete($id)
    {

        $invoice = Invoice::where('id', '=', $id)
            ->whereNull('deleted_at')
            ->first();

        if(!$invoice) {
            return false;
        }

        $invoice->deleted_at = date('Y-m-d H:i:s');
        $invoice->deleted_by = Auth::user()->id;
        $invoice->save();

        if(!$invoice->save()) {
            return false;
        }

        return true;

    }

}
