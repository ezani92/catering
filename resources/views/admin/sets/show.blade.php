<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3 class="">{{ $set->name }}</h3>
                @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-default panel-table">
                            <div class="panel-body">
                                <table class="table table-striped table-borderless">
                                    <tbody class="">
                                        <tr>
                                            <td width="30%"><strong>Package Name</strong></td>
                                            <td>{{ $set->package->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Price Per Pax/Set</strong></td>
                                            <td>RM {{ $set->price }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Course</strong></td>
                                            <td>{{ $set->courses }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Minimum Pax</strong></td>
                                            <td>{{ $set->min_pax }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Maximum Pax</strong></td>
                                            <td>{{ $set->max_pax }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Info</strong></td>
                                            <td>{{ $set->info }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Display Image</strong></td>
                                            <td>
                                            	<img width="40%" src="{{ asset('storage/set/'.$set->image) }}"> <br />
                                            	<a target="_blank" href="{{ asset('storage/set/'.$set->image) }}">View Image</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated</strong></td>
                                            <td>{{ $set->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @if($set->trashed())
                            <a href="{{ url('admin/set/'.$set->id.'/show') }}" onclick="return showLink(this.href)" class="btn btn-block btn-success">Show Set On Order Page</a>
                        @else
                            <a href="{{ url('admin/set/'.$set->id.'/hide') }}" onclick="return hideLink(this.href)" class="btn btn-block btn-warning">Hide Set On Order Page</a>
                        @endif
                        <a href="{{ url('admin/set/'.$set->id.'/edit') }}" class="btn btn-block btn-info">Edit Set</a>
                        <a href="{{ url('admin/set/'.$set->id.'/delete') }}" onclick="return deleteset(this.href)" class="btn btn-block btn-danger">Delete SET</a>
                    </div>
                </div>
                <br />
                <h3>Courses Details</h3>
                <div class="row">
                    <div class="col-md-12">
                    	<div class="panel panel-default panel-table">
                            <div class="panel-body">
                                <table class="table table-striped table-borderless">
                                	<thead>
                                        <tr>
                                        	<th>Courses categories</th>
                                        	<th>Courses</th>
                                            <th>Selection Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($set->course_categories as $courseCategory)
                                        <tr>
                                            <td>{{ $courseCategory->name }}</td>
                                    		<td>
                                                <ul>
                                                    @foreach($courseCategory->courses as $course)
                                                        <li>
                                                            {{ $course->food->name }}
                                                            @if($course->additional_price == 0.00)

                                                            @else
                                                                ( <i>Additional Charge : RM{{ $course->additional_price }}</i> )
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                @if($courseCategory->allow_multiple == 1)
                                                    Multiple Selection
                                                @else
                                                    Single Selection
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('admin.layouts.footer')
    <script type="text/javascript">
        function hideLink(url) {

            swal({
                title: 'Are you sure?',
                text: "This Set Will Be Hide On Order Page",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hide it!'
            }).then(function() {
                window.location.replace(url);
            })

            return false;
        }

        function showLink(url) {

            swal({
                title: 'Are you sure?',
                text: "This Set Will Be Show On Order Page",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, show it!'
            }).then(function() {
                window.location.replace(url);
            })

            return false;
        }

        function deleteset(url) {

            swal({
                title: 'Are you sure you want to delete this set?',
                text: "This action cant be undo.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                window.location.replace(url);
            })

            return false;
        }
    </script>
    </body>
</html>