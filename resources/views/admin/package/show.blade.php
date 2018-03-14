<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3 class="">{{ $package->name }}</h3>
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
                                            <td width="30%"><strong>Description</strong></td>
                                            <td>{{ $package->description }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Price Start</strong></td>
                                            <td>RM {{ $package->price_start }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Price Rule</strong></td>
                                            <td>Per {{ $package->is_pax }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>PDF File</strong></td>
                                            <td><a target="_blank" href="{{ asset('storage/pdf/'.$package->pdf_file) }}">View PDF</a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Active On Order</strong></td>
                                            <td>
                                                @if($package->is_display == 1)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Not Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated</strong></td>
                                            <td>{{ $package->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @if($package->is_display == 1)
                            <a href="{{ url('admin/package/'.$package->id.'/hide') }}" onclick="return hideLink(this.href)" class="btn btn-block btn-danger">Hide Package On Order Page</a>
                        @else
                            <a href="{{ url('admin/package/'.$package->id.'/show') }}" onclick="return showLink(this.href)" class="btn btn-block btn-success">Show Package On Order Page</a>
                        @endif
                        <a href="{{ url('admin/package/'.$package->id.'/edit') }}" class="btn btn-block btn-info">Edit Package</a>
                        <a href="{{ url('admin/set/create') }}" class="btn btn-block btn-warning">Create New Set</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>List Of Sets</h3>
                    </div>
                </div>
                <br />
                <div class="row">
                    @foreach($package->sets as $set)
                    <div class="col-md-4">
                        <div class="panel panel-default panel-package">
                            <span class="top-info">{{ $set->info }}</span>
                            <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('storage/set/'.$set->image) }}); background-size: cover; margin: 0 0px;">    <br /><br /><br /><br /><br /><br /><br />
                            </div>
                            <div class="panel-body text-center">
                                <span style="font-size: 20px;">RM {{ $set->price }}</span><sup> / {{ $package->is_pax }}</sup>
                                <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                <span style="font-size: 20px;">RM {{ number_format($set->price * 1.06,2) }}</span><sup> / GST</sup>
                                <br />
                                <span style="font-size: 15px;">{{ $set->courses }} Course | min {{ $set->min_pax }} Pax</sup>
                                <br />
                                <span style="font-size: 15px;">{{ $set->name }}</sup>
                                <br />
                                @if($set->deleted_at == null)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-warning">Not Active</span>
                                @endif
                                
                                <br /><br />
                                <a href="{{ url('order/'.$package->slug.'/'.$set->slug) }}" class="btn btn-default">View Set On Front End</a> <a href="{{ url('admin/set/'.$set->id) }}" class="btn btn-default">Manage Set</a>
                            </div> 
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    @include('admin.layouts.footer')
    </body>
    <script type="text/javascript">
        function hideLink(url) {

            swal({
                title: 'Are you sure?',
                text: "This Package Will Be Hide On Order Page",
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
                text: "This Package Will Be Show On Order Page",
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
    </script>
</html>