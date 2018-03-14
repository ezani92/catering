<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;
use DB;
use Carbon\Carbon;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    public function data(Datatables $datatables)
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->addColumn('actions', function($user) {
                return view('admin.action.users', compact('user'))->render();
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('d M Y, h:i A') : '';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if ($user === null) {
            abort(404);
        }

        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user = User::find($id);
        $user->name = $input['fullname'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];

        if(isset($input['password'] ))
        {
            $user->password = bcrypt($input['password']);
        }

        $user->address1 = $input['address1'];
        $user->address2 = $input['address2'];
        $user->city = $input['city'];
        $user->postcode = $input['postcode'];
        $user->state = $input['state'];

        $user->save();

        Session::flash('message', 'User Account was succesfully updated!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/user/'.$user->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
