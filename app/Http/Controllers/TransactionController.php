<?php

namespace App\Http\Controllers;

use \App\Models\TransactionModel
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{


    var $cm;


    function __construct()
    {

        $this->cm = new TransactionModel;

    }


    /**
     * @param integer $id
     * @return Response
     **/
    public function view($id)
    {

        $data = $this->lm->get($id);

        if($data == false) {
            return redirect('/')
                ->with('status', 'error')
                ->with('message','Item not found.');
        }

        return view('transaction.view', $data);
    }


    /**
     * @param Request $request
     * @return Response
     **/
    public function list(Request $request)
    {

        $filters['q'] = $request->get('q', null);

        $data = $this->lm->list($filters);
        return view('transaction.list', $data);

    }


    /**
     * @param Request $request
     * @return Response
     **/
    public function create(Request $request)
    {

        if($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|string',
                'description' => 'string',
                'toolkit_id' => 'numeric',
                'form' => 'string',
            ]);

            $createData = $request->all();
            $create = $this->lm->create($createData);

            if(!$create) {
                return redirect()
                    ->back()
                    ->with('status', 'error')
                    ->with('message','Transaction creation failed.');
            }

            return redirect()->route('view-transaction', ['id' => $create])
                ->with('status', 'success')
                ->with('message','Transaction created succesfully.');

        }

        return view('transaction.create', $data);

    }


    /**
     * @param integer $id
     * @param Request $request
     * @return Response
     **/
    public function update($id, (Request $request)
    {


        $data = $this->cm->get($id);

        if($data == false) {
            return redirect('/')
                ->with('status', 'error')
                ->with('message','Item not found.');
        }

        if($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|string',
                'description' => 'string',
                'toolkit_id' => 'numeric',
                'form' => 'string',
            ]);

            $updateData = $request->all();
            $update = $this->cm->update($id, $updateData);

            if(!$update) {
                return redirect()
                        ->back()
                        ->with('status', 'error')
                        ->with('message','Transaction update failed.');
            }

            return redirect()->route('view-transaction', ['id' => $data->id])
                    ->with('status', 'success')
                    ->with('message','Transaction updated succesfully.');
        }

        return view('transaction.update', $data);

    }


    /**
     * @param integer $id
     * @return Response
     **/
    public function delete($id)
    {

        $delete = $this->cm->delete($id);

        if(!$delete) {
            return redirect()->route('view-transactions')
                ->with('status', 'error')
                ->with('message','Transaction deletion failed.');
        }

        return redirect()->route('view-transactions')
            ->with('status', 'success')
            ->with('message','Transaction deleted succesfully.');
    }
}
