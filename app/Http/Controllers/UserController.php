<?php

namespace App\Http\Controllers;

use \App\Models\UserModel
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{


    var $qm;


    function __construct()
    {

        $this->qm = new UserModel;

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

        return view('user.view', $data);
    }


    /**
     * @param Request $request
     * @return Response
     **/
    public function list(Request $request)
    {

        $filters['q'] = $request->get('q', null);

        $data = $this->qm->list($filters);
        return view('user.list', $data);

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
                    ->with('message','User creation failed.');
            }

            return redirect()->route('view-user', ['id' => $create])
                ->with('status', 'success')
                ->with('message','User created succesfully.');

        }

        return view('user.create', $data);

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
                        ->with('message','User update failed.');
            }

            return redirect()->route('view-user', ['id' => $data->id])
                    ->with('status', 'success')
                    ->with('message','User updated succesfully.');
        }

        return view('user.update', $data);

    }


    /**
     * @param integer $id
     * @return Response
     **/
    public function delete($id)
    {

        $delete = $this->qm->delete($id);

        if(!$delete) {
            return redirect()->route('view-users')
                ->with('status', 'error')
                ->with('message','User deletion failed.');
        }

        return redirect()->route('view-users')
            ->with('status', 'success')
            ->with('message','User deleted succesfully.');
    }
}
