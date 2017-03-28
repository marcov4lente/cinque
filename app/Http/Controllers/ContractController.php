<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContractModel;

class ContractController extends Controller
{

    private $contractModel;

    public function __construct() {
        $this->contractModel = new ContractModel;
    }

    /**
     * @param  integer $id
     * @return Response
     */
    public function get($id)
    {

        $data = $contractModel->get($id);

        if(!$data) {
            return response()->view('errors.404', [], 404);
        }


        return view('contract.get', $data);
    }

    /**
     * @return Response
     */
    public function list()
    {

        $data = $contractModel->list();
        return view('contract.list', $data);

    }

    /**
     * @param  Request $request
     * @return Response
     */
    public function create(Request $request)
    {

        return view('contract.create', $data);

    }

    /**
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        if($request->isMethod('post') {

            $validator = Validator::make(
                array('item' => 'numeric'),
            );

            $data = $contractModel->update($request);

            if($data) {
                return redirect('contract')->with('status', 'Error! Contract could not be updated!');
            }

            return redirect('contract')->with('status', 'Success! Contract updated succesfully!');

        }

        $data = $contractModel->get();
        return view('contract.update', $data);

    }

    /**
     * @return Response
     */
    public function delete($id)
    {

        $data = $contractModel->list();

        if($data) {
            return redirect('contract')->with('status', 'Error! Contract could not be deleted!');
        }

        return redirect('contract')->with('status', 'Success! Contract deleted succesfully!!');
    }
}
