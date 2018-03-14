<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == 1)
        {
            return view('admin.account.edit',['user_id' => $id]);
        }
        else if(Auth::user()->role == 2)
        {
            return view('user.account.edit',['user_id' => $id]);
        }
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

        Session::flash('message', 'Account was succesfully updated!'); 
        Session::flash('alert-class', 'alert-success');

        if(Auth::user()->role == 1)
        {
            return redirect('admin/account/'.$user->id.'/edit');
        }
        else if(Auth::user()->role == 2)
        {
            return redirect('account/'.$user->id.'/edit');
        }
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
