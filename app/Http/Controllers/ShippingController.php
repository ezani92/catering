<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Carbon\Carbon;
use Session;


class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shipping.index');
    }

    public function data(Datatables $datatables)
    {
        $shippings = Shipping::all();

        return Datatables::of($shippings)
            ->addColumn('actions', function($shipping) {
                return view('admin.action.shippings', compact('shipping'))->render();
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $shipping = new Shipping;

        $shipping->city_name = $input['city'];
        $shipping->state = $input['state'];
        $shipping->rate = $input['rate'];

        $shipping->save();

        Session::flash('message', 'New Shipping Was Successfully Added!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/shipping');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
