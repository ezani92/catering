<?php

namespace App\Http\Controllers;

use App\Set;
use App\Package;
use App\Food;
use App\CourseCategory;
use App\Course;
use Illuminate\Http\Request;
use Session;

class SetController extends Controller
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
        $packages = Package::all();
        $foods = Food::all();

        return view('admin.sets.create',[
            'packages' => $packages,
            'foods' => $foods
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function step2(Request $request)
    {
        $input = $request->all();
        $file = $request->file('image');

        $filename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'storage/set';
        $file->move($destinationPath,$filename);

        $set = New Set;

        $set->package_id = $input['package_id'];
        $set->type = $input['type'];
        $set->name = $input['name'];
        $set->price = $input['price'];
        $set->courses = $input['courses'];
        $set->min_pax = $input['min_pax'];
        $set->max_pax = $input['max_pax'];
        $set->image = $filename;

        if(isset($input['info']))
        {
            $set->info = $input['info'];
        }

        $set->save();

        return view('admin.sets.create2',[
            'set' => $set
        ]);

    }

    public function step3(Request $request)
    {
        $input = $request->all();

        $i = 0;

        foreach ($input['food_category'] as $food_category)
        {
            if($food_category == '')
            {

            }
            else
            {
                $courseCategory = new CourseCategory;
                $courseCategory->set_id = $input['set_id'];
                $courseCategory->name = $food_category;
                $courseCategory->maximum_selection = $input['maximum_select'.$i];

                if(isset($input['multiple'.$i]))
                {
                    $courseCategory->allow_multiple = $input['multiple'.$i];
                }
                else
                {
                    $courseCategory->allow_multiple = 0;
                }

                if(isset($input['compulsory'.$i]))
                {
                    $courseCategory->compulsory = $input['compulsory'.$i];
                }
                else
                {
                    $courseCategory->compulsory = 0;
                }

                
                $courseCategory->save();

                $j = 0;

                foreach ($input['food'.$i] as $food)
                {
                    $course = new Course;
                    $course->course_category_id = $courseCategory->id;
                    $course->food_id = $food;

                    if($input['add_price'.$i][$j] != null)
                    {
                        $course->additional_price = $input['add_price'.$i][$j];
                    }
                    else
                    {
                        $course->additional_price = 0;
                    }

                    $course->save();

                    $j++;
                }

                $i++;
            }

            
        }

        Session::flash('message', 'New Sets Was Successfully Added!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/package/'.$input['package_id']);

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set,$set_id)
    {
        $set = Set::where('id',$set_id)->withTrashed()->first();

        return view('admin.sets.show',[
            'set' => $set
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function edit(Set $set,$set_id)
    {
        $set = Set::withTrashed()->where('id',$set_id)->first();
        $packages = Package::all();

        if ($set === null) {
            abort(404);
        }

        return view('admin.sets.edit',[
            'set' => $set,
            'packages' => $packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Set $set, $set_id)
    {
        $input = $request->all();

        $set = Set::find($set_id);

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
        
            $filename = time().'.'.$file->getClientOriginalExtension();
        
            $destinationPath = 'storage/set';
            $file->move($destinationPath,$filename);

            $set->image = $filename;
        }

        $set->package_id = $input['package_id'];
        $set->type = $input['type'];
        $set->name = $input['name'];
        $set->price = $input['price'];
        $set->courses = $input['courses'];
        $set->min_pax = $input['min_pax'];
        $set->max_pax = $input['max_pax'];

        if(isset($input['info']))
        {
            $set->info = $input['info'];
        }

        $set->save();

        Session::flash('message', 'Set Succesfully Updated!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/set/'.$set_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function destroy(Set $set,$set_id)
    {
        $set = Set::withTrashed()->where('id',$set_id)->first();

        $set->forceDelete();
        $set->course_categories()->forceDelete();

        return redirect('admin/set/'.$set->package->id);

    }

    public function active($set_id)
    {
        $set = Set::withTrashed()->where('id',$set_id)->restore();

        Session::flash('message', 'Set Was Successfully Show On Order Page!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/set/'.$set_id);
    }

    public function deactive($set_id)
    {
        $set = Set::find($set_id);
        $set->delete();

        Session::flash('message', 'Set Was Successfully Hided on Order Page!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/set/'.$set_id);
    }

    public function coursesEdit($set_id, $course_category_id)
    {
        $set = Set::find($set_id);
        $CourseCategory = CourseCategory::find($course_category_id);

        $courses = $CourseCategory->courses;

        $foods = Food::all()->pluck('name','id');

        return view('admin.sets.editCourses',compact('set','CourseCategory','courses','foods'));
    }

    public function coursesUpdate(Request $request, $set_id, $course_category_id)
    {
        $input = $request->all();

        $CourseCategory = CourseCategory::find($course_category_id);
        $CourseCategory->name = $input['food_category'];
        $CourseCategory->maximum_selection = $input['maximum_select'];

        if(isset($input['multiple']))
        {
            $CourseCategory->allow_multiple = $input['multiple'];
        }
        else
        {
            $CourseCategory->allow_multiple = 0;
        }

        if(isset($input['compulsory']))
        {
            $CourseCategory->compulsory = $input['compulsory'];
        }
        else
        {
            $CourseCategory->compulsory = 0;
        }


        $CourseCategory->save();

        Session::flash('message', 'Courses Was Successfully Updated!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/set/'.$set_id);
    }

    public function reposition(Request $request)
    {
        $input = $request->all();


        if(isset($input['set']))
        {
            $i = 0;
            foreach($input['set'] as $id)
            {
                $i++;
                $set = Set::find($id);
                $set->position = $i;
                $set->save();
            }
        }
        else
        {
            
        }
    }
}
