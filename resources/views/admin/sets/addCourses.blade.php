<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
    	<div class="be-content">
		    <div class="main-content container-fluid">
		        <h3>Add Courses For Sets <u>{{ $set->name }}</u></h3> 
		        @if(Session::has('message'))
		        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		        @endif
		        
		        <div class="row">
		            <div class="col-md-12">
		                <div class="panel panel-default panel-border-color panel-border-color-primary">
		                	<div class="panel-heading">
		                	</div>
		                    <div class="panel-body">
		                    	<form method="POST" action="{{ url('/admin/set/'.$set->id.'/courses/add') }}" enctype="multipart/form-data">
		                        	{{ csrf_field() }}
		                            <div class="row">
		                            		<div class="col-md-12">
		                            			<label>Category Name</label>
		                            			<input type="text" name="food_category" class="form-control" placeholder="Courses Category Name (Rice / Noodles / Vagetable / Baverage / etc)">
		                            		</div>
		                            		<br />&nbsp;<br />
		                            		<div class="col-md-12">
		                            			<label>How many item need to be selected on this category?</label>
		                            			<input type="number" min="1" name="maximum_select" class="form-control" placeholder="How many item need to be selected on this category?">
		                            		</div>
		                            		&nbsp;<br />
		                            		<div id="food_list">
			                            		<div class="col-md-6">
			                            			<select class="form-control food" name="food[]">
													    <option value="">Please Select Courses</option>
													    @foreach( \App\Food::all() as $food)
													    <option value="{{ $food->id }}">{{ $food->name }}</option>
													    @endforeach
													</select>
			                            		</div>
			                            		<div class="col-md-4">
			                            			<input type="text" name="add_price[]" class="form-control" placeholder="Additonal Price Per Pax (Optional)">
			                            		</div>
			                            		<div class="col-md-2">
			                            			<button type="button" class="btn btn-xl btn-success" onclick="addFood({{ rand() }});">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button>
			                            		</div>
		                            		</div>
		                            		<div class="col-md-12">
		                            			<div class="be-checkbox be-checkbox-color inline">
		                            				<input id="check" type="checkbox" name="multiple" value="1">
                          							<label for="check">Allow Multiple Select</label>
                          						</div>
		                            		</div>
		                            		<div class="col-md-12">
		                            			<div class="be-checkbox be-checkbox-color inline">
		                            				<input id="compulsory" type="checkbox" name="compulsory" value="1">
                          							<label for="compulsory">Compulsory Category (Need To Be Choose at least 1)</label>
                          						</div>
		                            		</div>
		                            		&nbsp;<br />&nbsp;<br />
		                            	<br />
		                            </div>
		                            <button type="submit" class="btn btn-info">Add</button>
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