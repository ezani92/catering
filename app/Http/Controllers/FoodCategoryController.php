<?php

namespace App\Http\Controllers;

use App\FoodCategory;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Carbon\Carbon;
use Session;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.food-category.index');
    }

    public function data(Datatables $datatables)
    {
        $foodCategories = FoodCategory::all();

        return Datatables::of($foodCategories)
            ->addColumn('actions', function($foodCategory) {
                return view('admin.action.foodCategories', compact('foodCategory'))->render();
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
        $input = $request->all();

        $foodCategory = New FoodCategory;
        $foodCategory->name = $input['name'];
        $foodCategory->type = $input['category_type'];
        $foodCategory->save();

        Session::flash('message', 'New Item Category Was Successfully Added!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/item-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodCategory $foodCategory)
    {
        //
    }
}
