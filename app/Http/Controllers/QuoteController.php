<?php

namespace App\Http\Controllers;

use \App\Models\QuoteModel
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuoteController extends Controller
{


    var $qm;


    function __construct()
    {

        $this->qm = new QuoteModel;

    }


    /**
     * @param integer $id
     * @return Response
     **/
    public function view($id)
    {

        $data = $this->qm->get($id);

        if($data == false) {
            return redirect('/')
                ->with('status', 'error')
                ->with('message','Item not found.');
        }

        return view('quote.view', $data);
    }


    /**
     * @param Request $request
     * @return Response
     **/
    public function list(Request $request)
    {

        $filters['q'] = $request->get('q', null);

        $data = $this->qm->list($filters);
        return view('quote.list', $data);

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
            $create = $this->qm->create($createData);

            if(!$create) {
                return redirect()
                    ->back()
                    ->with('status', 'error')
                    ->with('message','Quote creation failed.');
            }

            return redirect()->route('view-quote', ['id' => $create])
                ->with('status', 'success')
                ->with('message','Quote created succesfully.');

        }

        return view('quote.create', $data);

    }


    /**
     * @param integer $id
     * @param Request $request
     * @return Response
     **/
    public function update($id, (Request $request)
    {


        $data = $this->qm->get($id);

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
            $update = $this->qm->update($id, $updateData);

            if(!$update) {
                return redirect()
                        ->back()
                        ->with('status', 'error')
                        ->with('message','Quote update failed.');
            }

            return redirect()->route('view-quote', ['id' => $data->id])
                    ->with('status', 'success')
                    ->with('message','Quote updated succesfully.');
        }

        return view('quote.update', $data);

    }


    /**
     * @param integer $id
     * @return Response
     **/
    public function delete($id)
    {

        $delete = $this->qm->delete($id);

        if(!$delete) {
            return redirect()->route('view-quotes')
                ->with('status', 'error')
                ->with('message','Quote deletion failed.');
        }

        return redirect()->route('view-quotes')
            ->with('status', 'success')
            ->with('message','Quote deleted succesfully.');
    }
}
