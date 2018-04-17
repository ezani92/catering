<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodCategory;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Carbon\Carbon;
use Session;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.food.index');
    }

    public function data(Datatables $datatables)
    {
        $foods= Food::all();

        return Datatables::of($foods)
            ->addColumn('actions', function($food) {
                return view('admin.action.foods', compact('food'))->render();
            })
            ->editColumn('name', function ($food) {
                
                if($food->chef_hat == 1)
                {
                    if($food->is_new == 1)
                    {
                        return $food->name.'<sup class="new-item">New</sup> <img height="20px" src="https://png.icons8.com/ios/1600/00827B/chef-hat.png"> ';
                    }
                    else
                    {
                        return $food->name.'<img height="20px" src="https://png.icons8.com/ios/1600/00827B/chef-hat.png"> ';
                    }
                    
                }
                else
                {
                    if($food->is_new == 1)
                    {
                        return $food->name.'<sup class="new-item">New</sup>';
                    }
                    else
                    {
                        return $food->name;
                    }
                }
                

            })
            ->editColumn('food_category_id', function ($food) {
                
                return $food->foodCategory->name;

            })
            ->rawColumns(['actions','name'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foodCategories = FoodCategory::all();        

        return view('admin.food.create',compact('foodCategories'));
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

        $food = new Food;

        if ($request->hasFile('food_image'))
        {
            $file = $request->file('food_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'storage/food';
            $file->move($destinationPath,$filename);

            $food->food_image = $filename;
        }

        $food->food_category_id = $input['food_category'];
        $food->name = $input['name'];

        if(isset($input['chef_hat']))
        {
            $food->chef_hat = $input['chef_hat'];
        }

        else
        {
            $food->chef_hat = 0;
        }

        if(isset($input['is_new']))
        {
            $food->is_new = $input['is_new'];
        }

        else
        {
            $food->is_new = 0;
        }

        $food->price = $input['price'];
        $food->min = $input['minimum_purchase'];
        $food->max = $input['maximum_purchase'];

        $food->save();

        Session::flash('message', 'New Food Was Successfully Added!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food, $food_id)
    {
        $food = Food::find($food_id);
        $foodCategories = FoodCategory::pluck('name', 'id')->all();

        return view('admin.food.show',['food' => $food, 'foodCategories' => $foodCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $input = $request->all();

        $food = Food::find($input['food_id']);

        if ($request->hasFile('food_image'))
        {
            $file = $request->file('food_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'storage/food';
            $file->move($destinationPath,$filename);

            $food->food_image = $filename;

            $food->food_category_id = $input['food_category'];
            $food->name = $input['name'];
            if(isset($_POST['chef_hat'])) {

            $food->chef_hat = $_POST['chef_hat'];

            }

            else {

                $food->chef_hat = 0;

            }

            
            if(isset($_POST['is_new'])) {

                $food->is_new = $_POST['is_new'];
    
            }

            else {

                $food->is_new = 0;

            }    
            $food->price = $input['price'];
            $food->min = $input['minimum_purchase'];
            $food->max = $input['maximum_purchase'];

            $food->save();
        }
        else
        {
            $food->food_category_id = $input['food_category'];
            $food->name = $input['name'];
            if(isset($_POST['chef_hat'])) {

            $food->chef_hat = $_POST['chef_hat'];

            }

            else {

                $food->chef_hat = 0;

            }

            
            if(isset($_POST['is_new'])) {

                $food->is_new = $_POST['is_new'];
    
            }

            else {

                $food->is_new = 0;

            }
            $food->price = $input['price'];
            $food->min = $input['minimum_purchase'];
            $food->max = $input['maximum_purchase'];

            $food->save();
        }

        Session::flash('message', 'Food Was Successfully Updated!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/item/'.$input['food_id']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
