<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
    	<div class="be-content">
		    <div class="main-content container-fluid">
		        <h3>Edit Sets</h3> 
		        @if(Session::has('message'))
		        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		        @endif
		        
		        <div class="row">
		            <div class="col-md-12">
		                <div class="panel panel-default panel-border-color panel-border-color-primary">
		                	<div class="panel-heading">
		                	</div>
		                    <div class="panel-body">
		                    	<form method="POST" action="{{ url('/admin/set/'.$set->id.'/update') }}" enctype="multipart/form-data">
		                        	{{ csrf_field() }}
		                        	<input type="hidden" name="_method" value="PUT">
		                            <div class="row">
		                            	<div class="col-md-6 form-group">
		                            		<label>Select Package</label>
                                            <select class="form-control packages" name="package_id" required>
                                                <option value="">Please Select one</option>
                                                @foreach($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                @endforeach
                                            </select>
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>Select Sets Type</label>
                                            <select class="form-control type" name="type" required>
                                                <option value="">Please Select one</option>
                                                <option value="1">Selection</option>
                                                <option value="2">Fixed</option>
                                                <option value="3">Add-On Only</option>
                                            </select>
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>Set Name</label>
                                            <input name="name" type="text" class="form-control" value="{{ $set->name }}" required>
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>Default Price (Without GST)</label>
                                            <input name="price" type="number" step=".01" class="form-control" value="{{ $set->price }}" required>
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>How Many Courses In This Set</label>
                                            <input name="courses" type="number" class="form-control" value="{{ $set->courses }}" required>
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>Minimum Pax To Order This Set</label>
                                            <input name="min_pax" type="number" class="form-control" value="{{ $set->min_pax }}" required>
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>Maximum Pax To Order This Set</label>
                                            <input name="max_pax" type="number" class="form-control" value="{{ $set->max_pax }}" required>
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>Preview Image (<a target="_blank" href="{{ asset('storage/set/'.$set->image) }}">Current Image</a>) <sub>*Leave empty if the image is same</sub></label>
                                            <input name="image" type="file" class="form-control">
		                            	</div>
		                            	<div class="col-md-6 form-group">
		                            		<label>Top Info Text (Optional)</label>
                                            <input name="info" type="text" value="{{ $set->info }}" class="form-control">
		                            	</div>
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
            $('.packages').select2();
            $('.type').select2();
        });

    </script>
    </body>
</html>