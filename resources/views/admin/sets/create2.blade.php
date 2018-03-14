<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
    	<div class="be-content">
		    <div class="main-content container-fluid">
		        <h3>Create New Sets</h3> @if(Session::has('message'))
		        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		        @endif
		        
		        <div class="row">
		            <div class="col-md-12">
		                <div class="panel panel-default panel-border-color panel-border-color-primary">
		                	<div class="panel-heading">
		                		<h4>Step 2 : Courses Category</h4>
		                		<hr />
		                	</div>
		                    <div class="panel-body">
		                    	<form method="POST" action="{{ url('/admin/set/create/step3') }}" enctype="multipart/form-data">
		                        	{{ csrf_field() }}
		                        	<input type="hidden" name="package_id" value="{{ $set->package_id }}">
		                        	<input type="hidden" name="set_id" value="{{ $set->id }}">
		                        	@for($i = 0; $i < $set->courses; $i++)
		                            	<div class="row">
		                            		<div class="col-md-12">
		                            			<input type="text" name="food_category[]" class="form-control" placeholder="Courses Category Name (Rice / Noodles / Vagetable / Baverage / etc">
		                            		</div>
		                            		&nbsp;<br />
		                            		<div id="food_list{{ $i }}">
			                            		<div class="col-md-6">
			                            			<select class="form-control food" name="food{{ $i }}[]">
													    <option value="">Please Select Courses</option>
													    @foreach( \App\Food::all() as $food)
													    <option value="{{ $food->id }}">{{ $food->name }}</option>
													    @endforeach
													</select>
			                            		</div>
			                            		<div class="col-md-4">
			                            			<input type="text" name="add_price{{ $i }}[]" class="form-control" placeholder="Additonal Price Per Pax (Optional)">
			                            		</div>
			                            		<div class="col-md-2">
			                            			<button type="button" class="btn btn-xl btn-success" onclick="addFood({{ $i }});">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button>
			                            		</div>
		                            		</div>
		                            		<div class="col-md-12">
		                            			<div class="be-checkbox be-checkbox-color inline">
		                            				<input id="check{{ $i }}" type="checkbox" name="multiple{{$i}}" value="1">
                          							<label for="check{{ $i }}">Allow Multiple Select</label>
                          						</div>
		                            		</div>
		                            		&nbsp;<br />
		                            		<hr /><hr />
		                            	</div>
		                            	<br />
		                            @endfor
		                            <button type="submit" class="btn btn-info">Next</button>
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

        function addFood(i)
        {
        	var unix = Math.round(+new Date()/1000);

        	var html = '<span id=remove'+ unix +'>&nbsp;<br /><div class="col-md-6"> <select class="form-control food" name="food'+ i +'[]" required> <option value="">Please Select Courses</option> @foreach( \App\Food::all() as $food) <option value="{{ $food->id }}">{{ $food->name }}</option> @endforeach </select> </div><div class="col-md-4"> <input type="text" name="add_price'+ i +'[]" class="form-control" placeholder="Additonal Price Per Pax (Optional)"> </div> <div class="col-md-2"> <button type="button" class="btn btn-xl btn-success" onclick="addFood('+ i +');">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button> <button type="button" class="btn btn-xl btn-danger" onclick="removeFood('+ unix +');">&nbsp;<i class="mdi mdi-minus"></i>&nbsp;</button> </div></span>';

        	$("#food_list"+i).append(html);

        	$('.food').select2();
        }

        function removeFood(i)
        {
        	$("#remove"+i).remove();
        }  
        

    </script>
    </body>
</html>