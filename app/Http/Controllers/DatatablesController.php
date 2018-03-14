<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;

class DatatablesController extends Controller
{
   
    public function index()
    {
        return view('admin.user.index');
    }

    public function data(Datatables $datatables)
    {
        $users = User::select(array('users.id','users.name','users.email','users.created_at','users.updated_at'));
        return Datatables::of($users)
            ->addColumn('actions', function($user) {
                return view('admin.action.users', compact('user'))->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
