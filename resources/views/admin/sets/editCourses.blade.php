<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
    	<div class="be-content">
		    <div class="main-content container-fluid">
		        <h3>Edit Courses On Sets <u>{{ $set->name }}</u> For <u>{{ $CourseCategory->name }}</u> Category</h3> 
		        @if(Session::has('message'))
		        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		        @endif
		        
		        <div class="row">
		            <div class="col-md-12">
		                <div class="panel panel-default panel-border-color panel-border-color-primary">
		                	<div class="panel-heading">
		                	</div>
		                    <div class="panel-body">
		                    	<form method="POST" action="{{ url('/admin/set/'.$set->id.'/courses/'.$CourseCategory->id.'/update') }}" enctype="multipart/form-data">
		                        	{{ csrf_field() }}
		                            <div class="row">
		                            		<div class="col-md-12">
		                            			<label>Category Name</label>
		                            			<input type="text" name="food_category" class="form-control" placeholder="Courses Category Name (Rice / Noodles / Vagetable / Baverage / etc)" value="{{ $CourseCategory->name }}">
		                            		</div>
		                            		<br />&nbsp;<br />
		                            		<div class="col-md-12">
		                            			<label>How many item need to be selected on this category?</label>
		                            			<input type="number" min="1" name="maximum_select" class="form-control" placeholder="How many item need to be selected on this category?" value="{{ $CourseCategory->maximum_selection }}">
		                            		</div>
		                            		&nbsp;<br />
		                            		<div id="food_list">
		                            			<br />
		                            			@foreach($courses as $course)
		                            			<span id="remove{{ $course->id }}">
			                            		<div class="col-md-6">
			                            			{{ Form::select('food[]', $foods, $course->food_id , ['class' => 'form-control food']) }}
			                            		</div>
			                            		<div class="col-md-4">
			                            			<input type="text" name="add_price[]" class="form-control" value="{{ $course->additional_price }}" placeholder="Additonal Price Per Pax (Optional)">
			                            		</div>
			                            		<div class="col-md-2">
			                            			{{-- <button type="button" class="btn btn-xl btn-success" onclick="addFood();">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button> --}}
			                            			<button type="button" class="btn btn-xl btn-danger" onclick="removeFood({{ $course->id }});">&nbsp;<i class="mdi mdi-minus"></i>&nbsp;</button>
			                            		</div>
			                            		<br />&nbsp;
			                            		</span>
			                            		@endforeach
		                            		</div>

		                            		&nbsp;
		                            		@if($CourseCategory->allow_multiple == 1)
			                            		<div class="col-md-12">
			                            			<div class="be-checkbox be-checkbox-color inline">
			                            				<input id="check" type="checkbox" name="multiple" value="1" checked>
	                          							<label for="check">Allow Multiple Select</label>
	                          						</div>
			                            		</div>
		                            		@else
												<div class="col-md-12">
			                            			<div class="be-checkbox be-checkbox-color inline">
			                            				<input id="check" type="checkbox" name="multiple" value="1">
	                          							<label for="check">Allow Multiple Select</label>
	                          						</div>
			                            		</div>
		                            		@endif

		                            		@if($CourseCategory->compulsory == 1)
			                            		<div class="col-md-12">
			                            			<div class="be-checkbox be-checkbox-color inline">
			                            				<input id="compulsory" type="checkbox" name="compulsory" value="1" checked>
	                          							<label for="compulsory">Compulsory Category (Need To Be Choose at least 1)</label>
	                          						</div>
			                            		</div>
		                            		@else
												<div class="col-md-12">
			                            			<div class="be-checkbox be-checkbox-color inline">
			                            				<input id="compulsory" type="checkbox" name="compulsory" value="1">
	                          							<label for="compulsory">Compulsory Category (Need To Be Choose at least 1)</label>
	                          						</div>
			                            		</div>
		                            		@endif
		                            		&nbsp;<br />&nbsp;<br />
		                            	<br />
		                            </div>
		                            <button type="submit" class="btn btn-info">Update</button>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    @include('admin.layouts.footer')
    <script type="text/javascript">
        
        $(document).ready(function() {
            $('.food').select2();
		});

        function addFood()
        {
        	var unix = Math.round(+new Date()/1000);

        	var html = '<span id=remove'+ unix +'>&nbsp;<br /><div class="col-md-6"> <select class="form-control food" name="food[]" required> <option value="">Please Select Courses</option> @foreach( \App\Food::all() as $food) <option value="{{ $food->id }}">{{ $food->name }}</option> @endforeach </select> </div><div class="col-md-4"> <input type="text" name="add_price[]" class="form-control" placeholder="Additonal Price Per Pax (Optional)"> </div> <div class="col-md-2"> <button type="button" class="btn btn-xl btn-success" onclick="addFood();">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button> <button type="button" class="btn btn-xl btn-danger" onclick="removeFood('+ unix +');">&nbsp;<i class="mdi mdi-minus"></i>&nbsp;</button> </div></span>';

        	$("#food_list").append(html);

        	$('.food').select2();
        }

        function removeFood(i)
        {
        	$("#remove"+i).remove();
        }  
        

    </script>
    </body>
</html>