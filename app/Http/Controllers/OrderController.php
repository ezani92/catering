<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use DataTables;

use DB;
use Carbon\Carbon;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index');
    }

    public function data()
    {
        $orders = Order::all();

        return Datatables::of($orders)
            ->addColumn('actions', function($order) {
                return view('frontLayouts.action.orders', compact('order'))->render();
            })
            ->editColumn('created_at', function ($order) {
                return $order->created_at ? with(new Carbon($order->created_at))->format('d M Y, h:i A') : '';
            })
            ->editColumn('package_id', function ($order) {
                $package = $order->package->name;

                return $package;
            })
            ->editColumn('set_id', function ($order) {
                $set = $order->set->name;

                return $set;
            // })
            // ->editColumn('status', function ($order) {
            //     if($order->status == 1)
            //     {
            //         return '<span class="label label-default">Pending Payment</span>';
            //     }
            //     else if($order->status == 2)
            //     {
            //         return '<span class="label label-default">Order Process</span>';
            //     }
            //     else if($order->status == 3)
            //     {
            //         return '<span class="label label-default">Order Delivered</span>';
            //     }
            //     else if($order->status == 4)
            //     {
            //         return '<span class="label label-default">Completed</span>';
            //     }
            // })
            ->editColumn('billplz_status', function ($order) {
                if($order->billplz_status == 0)
                {
                    return '<a target="_blank" href="'.$order->billplz_url.'"><span class="label label-danger">UNPAID</span></a>';
                }
                else if($order->billplz_status == 1)
                {
                    return '<span class="label label-success">PAID</span>';
                }
            })
            ->editColumn('grand_price', function ($order) {
                $price = "RM " .$order->grand_price;

                return $price;
            })
            ->rawColumns(['actions','status','billplz_status'])
            ->make(true);
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
