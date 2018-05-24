<?php

namespace App\Http\Controllers;

use Request;
use App\Order;

class CallbackController extends Controller
{
	public function billplz(Request $request)
    {
    	$input = Request::all();

    	if($input['paid'] == 'true')
    	{
            $order = Order::where('billplz_id',$input['id'])->first();

    		$order->billplz_status = 1;

    		$order->save();
    	}
    }
}