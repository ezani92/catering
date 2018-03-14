<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>All Shipping Rate List</h3>
                @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                            <form method="post" action="{{ url('admin/shipping') }}">
                                {{ csrf_field() }}
                                <h4>Add New Shipping Rate</h4>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select name="state" class="form-control" required>
                                        <option>Selangor</option>
                                        <option>Kuala Lumpur</option>
                                        <option>Pulai Pinang</option>
                                        <option>Johor</option>
                                        <option>Putrajaya</option>
                                        <option>Perak</option>
                                        <option>Sabah</option>
                                        <option>Pahang</option>
                                        <option>Kedah</option>
                                        <option>Perlis</option>
                                        <option>Negeri Sembilan</option>
                                        <option>Terengganu</option>
                                        <option>Kelantan</option>
                                        <option>Melaka</option>
                                        <option>Labuan</option>
                                        <option>Sarawak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rate (RM)</label>
                                    <input type="number" step="0.01" name="rate" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
						<div class="panel panel-default panel-border-color panel-border-color-primary">
						    <div class="panel-body">
                                <br />
                                <table id="packages-table" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th width="30%">City</th>
                                            <th>State</th>
                                            <th>Transport Rate (RM)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                                <br />
						    </div>
						</div>
					</div>
				</div>
            </div>
        </div>
    @include('admin.layouts.footer')
    <script>
    $(function() {
        $('#packages-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'shipping-data',
            columns: [
                { data: 'city_name', name: 'city_name' },
                { data: 'state', name: 'state' },
                { data: 'rate', name: 'rate' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
    </script>
    </body>
</html>