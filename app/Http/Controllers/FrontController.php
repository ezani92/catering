<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;
use App\Package;
use App\Set;
use App\Course;
use App\Shipping;
use DB;
use App\Food;
use App\FoodCategory;
use Session;
use Ixudra\Curl\CurlService;
use App\Order;
use DataTables;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index()
    {
    	$packages = Package::where('is_display',1)->get();

    	return view('front.index',[
    		'packages' => $packages
    	]);
    }

    public function CheckShipping(Request $request)
    {
        $input = $request->all();

        $curlService = new CurlService();

        $response = $curlService->to('https://maps.googleapis.com/maps/api/geocode/json')
        ->withData( array(  'address' => $input['google_map'],
                            'key' => 'AIzaSyDLhmlgfJ1tfqc3omBsKO8ZdkwzbRRSbN0',
                    ) )
        ->get();

        $result = json_decode($response,true);

        $data = array();

        foreach($result['results']['0']['address_components'] as $element){
            $data[ implode(' ',$element['types']) ] = $element['long_name'];
        }
        

        $city = $data['locality political'];

        $isShip = Shipping::where('city_name','like','%'.$city.'%')->count();

        if($isShip == 1)
        {
            session(['delivery_lat' => $input['delivery_lat']]);
            session(['delivery_long' => $input['delivery_long']]);

            Session::flash('delivery', '1'); 

            return redirect('/');
        }
        else
        {
            return redirect('/location-results');
        }

        return redirect('/');
    }

    public function ApiShipping(Request $request)
    {
        $input = $request->all();

        $curlService = new CurlService();

        $response = $curlService->to('https://maps.googleapis.com/maps/api/geocode/json')
        ->withData( array(  'address' => $input['address'],
                            'key' => 'AIzaSyDLhmlgfJ1tfqc3omBsKO8ZdkwzbRRSbN0',
                    ) )
        ->get();

        $result = json_decode($response,true);

        $data = array();

        foreach($result['results']['0']['address_components'] as $element){
            $data[ implode(' ',$element['types']) ] = $element['long_name'];
        }
        

        $city = $data['locality political'];

        $isShip = Shipping::where('city_name','like','%'.$city.'%')->count();

        return $isShip;
    }

    public function package($package_slug)
    {
    	$package = Package::where('slug',$package_slug)->first();

    	if ($package === null) {
            abort(404);
        }

    	$sets = Set::where('package_id', $package->id)->get();

    	return view('front.package',[
    		'sets' => $sets,
    		'package' => $package
    	]);
	}

	public function set($package_slug,$set_slug)
	{
		$set = Set::where('slug',$set_slug)->first();

		return view('front.set',[
    		'set' => $set
    	]);
	}

	public function addon(Request $request)
	{
		$input = $request->all();

		$set = Set::find($input['_setID']);

		$course_categories = DB::table('course_categories')
             ->whereIn('id', $input['_CourseCategories'])
             ->get();
        $food_categories = FoodCategory::where('type','food')->get();
        $other_categories = FoodCategory::where('type','other')->get();

        $item_categories = FoodCategory::all();
        $foods = Food::all();


		return view('front.addon',[
			'input' => $input,
			'set' => $set,
			'course_categories' => $course_categories,
			'food_categories' => $food_categories,
            'other_categories'=> $other_categories,
            'item_categories' => $item_categories,
			'foods' => $foods
		]);
	}

	public function checkoutPost(Request $request)
	{
		$input = $request->all();
		Session::put('checkout', $request->all());

		$set = Set::find($input['_set_id']);

		$course_categories = DB::table('course_categories')
             ->whereIn('id', $input['_courses_categories'])
             ->get();

        $food_categories = FoodCategory::all();
        $foods = Food::all();

        if(isset($input['_addon_id']))
        {
            $addons = \App\Food::whereIn('id', $input['_addon_id'])->get();
            $add_on_price = 0;
            $i = 0;
                                        
            foreach($addons as $addon)
            {
                $addon_x_quantity = $addon->price * $input['_quantity'][$i];

                $add_on_price = $add_on_price + $addon_x_quantity;
                $i++;
            }

            $add_on_price_gst = $add_on_price * 1.06;
        }
        else
        {
            $add_on_price = 0;
            $add_on_price_gst = 0;
            $addons = collect(new Food);
        }

        return view('front.checkout',[
			'input' => $input,
			'set' => $set,
			'course_categories' => $course_categories,
			'food_categories' => $food_categories,
			'add_on_price' => $add_on_price,
			'add_on_price_gst' => $add_on_price_gst,
			'foods' => $foods,
			'addons' => $addons
		]);
	}

	public function checkoutGet()
	{
		$input = Session::get('checkout');

		$set = Set::find($input['_set_id']);

		$course_categories = DB::table('course_categories')
             ->whereIn('id', $input['_courses_categories'])
             ->get();

        $food_categories = FoodCategory::all();
        $foods = Food::all();

        if(isset($input['_addon_id']))
        {
            $addons = \App\Food::whereIn('id', $input['_addon_id'])->get();
            $add_on_price = 0;
            $i = 0;
                                        
            foreach($addons as $addon)
            {
                $addon_x_quantity = $addon->price * $input['_quantity'][$i];

                $add_on_price = $add_on_price + $addon_x_quantity;
                $i++;
            }

            $add_on_price_gst = $add_on_price * 1.06;
        }
        else
        {
            $add_on_price = 0;
            $add_on_price_gst = 0;
            $addons = collect(new Food);
        }

		return view('front.checkout',[
			'input' => $input,
			'set' => $set,
			'course_categories' => $course_categories,
			'food_categories' => $food_categories,
			'add_on_price' => $add_on_price,
			'add_on_price_gst' => $add_on_price_gst,
			'foods' => $foods,
			'addons' => $addons
		]);
	}

	public function payment(Request $request)
	{
		$input = $request->all();

		$input['courses_categories'];

		$grand_total = 100 * round($input['grand_price'],2);

		// Create Bill First

			$curlService = new CurlService();

	        $response = $curlService->to('https://www.billplz.com/api/v3/bills/')
	        ->withData( array( 'collection_id' => '_ku6cmmq',
	                           'email' => $input['checkout_email'],
	                           'mobile' => $input['checkout_phone'],
	                           'name' => $input['checkout_name'],
	                           'amount' => $grand_total,
	                           'callback_url' => url('order/callback'),
	                           'redirect_url' => url('order/redirect'),
	                           'deliver' => false,
	                           'description' => 'Teaffani Online Order'
	                     ) )
	        ->withOption('USERPWD', 'a4c3f66e-2549-49be-89ff-ff197d3bd22b:')
	        ->post();

	        $result = json_decode($response,true);

	    // End Create Bill

	    $user = User::find($input['checkout_user_id']);
	    $user->phone = $input['checkout_phone'];
	    $user->address1 = $input['checkout_billing_address_1'];
	    $user->address2 = $input['checkout_billing_address_2'];
	    $user->postcode = $input['checkout_billing_poscode'];
	    $user->city = $input['checkout_billing_city'];
	    $user->state = $input['checkout_billing_state'];
	    $user->save();

	    $order = new Order;

	    $order->user_id = $input['checkout_user_id'];
	    $order->hash_id = time();
	    $order->package_id = $input['package_id'];
	    $order->set_id = $input['set_id'];
	    $order->pax = $input['pax'];
	    $order->set_price = floatval($input['set_price']);
	    $order->addon_price = floatval($input['addon_price']);
	    $order->transport_price = floatval($input['transport_price']);
	    $order->gst_price = floatval($input['gst_price']);
	    $order->grand_price = floatval($input['grand_price']);
	    $order->checkout_date = $input['checkout_date'];
	    $order->checkout_time = $input['checkout_time'];
	    $order->checkout_delivery_address_1 = 'null';
	    $order->checkout_delivery_address_2 = 'null';
	    $order->checkout_delivery_postcode = $input['checkout_delivery_postcode'];
	    $order->checkout_delivery_city = $input['checkout_delivery_city'];
	    $order->checkout_delivery_state = 'null';
	    $order->checkout_note = $input['checkout_note'];
        $order->checkout_lat = $input['delivery_lat'];
        $order->checkout_long = $input['delivery_long'];
	    $order->courses_categories = implode(',',$input['courses_categories']);
	    $order->courses = implode(',',$input['courses']);
	    $order->addon_id = implode(',',$input['addon_id']);
	    $order->addon_quantity = implode(',',$input['addon_quantity']);

	    $order->billplz_id = $result['id'];		
		$order->billplz_url = $result['url'];
		$order->billplz_amount = $result['amount'];
		$order->billplz_status = $result['paid'];

		$order->save();

        if($input['rad'] == 'payment')
        {
            return redirect($result['url']);
        }
        else if($input['rad'] == 'quotation')
        {
            return redirect('invoice/'.$order->hash_id);
        }

	}

	public function callback(Request $Request)
    {

    	$input = Request::all();

    	if($input['paid'] == 'true')
    	{
    		$order = Order::where('billplz_id',$input['id'])->first();

    		$order->billplz_status = 1;

    		$order->save();
    	}
    }

    public function redirect()
    {

    	return view('front/redirect');
    }

    public function history()
    {

    	return view('front/history');
    }

    public function historydata($user_id)
    {

    	$orders = Order::where('user_id',$user_id)->get();

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
            })
            ->editColumn('status', function ($order) {
                if($order->status == 1)
                {
                	return '<span class="label label-default">Pending Payment</span>';
                }
                else if($order->status == 2)
                {
                	return '<span class="label label-default">Order Process</span>';
                }
                else if($order->status == 3)
                {
                	return '<span class="label label-default">Order Delivered</span>';
                }
                else if($order->status == 4)
                {
                	return '<span class="label label-default">Completed</span>';
                }
            })
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

    public function vieworder($hash_id)
    {
    	$order = Order::where('hash_id',$hash_id)->first();

    	return view('front.order',[
    		'order' => $order
    	]);
    }

    public function invoice($hash_id)
    {

        $order = Order::where('hash_id',$hash_id)->first();

        if ($order === null) {
            abort(404);
        }

        $pdf = PDF::loadView('pdf.invoice',compact('order'))->setOptions([
            'isRemoteEnabled' => true
        ]);

        return $pdf->stream('invoice.pdf');
    }
}
