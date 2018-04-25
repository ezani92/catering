<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
            <div class="be-content">
                <div class="main-content container-fluid">
                    <h3 class="">{{ $user->name }}</h3>
                    <div class="row">
	                    <div class="col-md-6">
							<div class="panel panel-default panel-border-color panel-border-color-primary">
							    <div class="panel-body">
	                                <br />
	                                <table id="users-table" class="table table-striped table-hover table-fw-widget">
	                                    <tbody>
	                                    	<tr>
	                                    		<td width="30%"><strong>Fullname</strong></td>
	                                    		<td>{{ $user->name }}</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td><strong>Email Address</strong></td>
	                                    		<td>{{ $user->email }}</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td><strong>Phone No</strong></td>
	                                    		<td>{{ $user->phone }}</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td><strong>Date Registered</strong></td>
	                                    		<td>{{ $user->created_at->format('d M Y h:i A') }}</td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td><strong>Address</strong></td>
	                                    		<td>
	                                    			{{ $user->address1 }} <br />
	                                    			{{ $user->address2 }} <br />
	                                    			{{ $user->city }} {{ $user->postcode }} <br />
	                                    			{{ $user->state }} <br />
	                                    		</td>
	                                    	</tr>
	                                    </tbody>
	                                </table>
	                                <br />
							    </div>
							</div>
						</div>
						<div class="col-md-6">
							<a href="{{ url('admin/user') }}/{{ $user->id }}/edit" class="btn btn-block btn-default">Edit User</a><br />
							<a href="{{ url('admin/user') }}/{{ $user->id }}/delete" onclick="return deleteUser(this.href)" class="btn btn-block btn-danger">Delete User</a>
						</div>
					</div>
					<h3>All Order History</h3>
					<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                <br />
                                <table id="packages-table" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>{{-- 
                                            <th>Order Status</th> --}}
                                            <th width="30%">Order Date</th>
                                            <th>Package</th>
                                            <th>Set</th>
                                            <th>Total Price (with gst)</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@if($orders->count() == 0)
											<tr><td colspan="7">No Booking History For This User</td></tr>
                                    	@else
	                                    	@foreach($orders as $order)
	                                		<tr>
	                                			<td>{{ $order->hash_id }}</td>
	                                			<td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
	                                			<td>{{ $order->package->name }}</td>
	                                			<td>{{ $order->set->name }}</td>
	                                			<td>RM {{ $order->grand_price }}</td>
	                                			<td>
	                                				@if($order->billplz_status == 0)
	                									<a target="_blank" href="{{ $order->billplz_url }}"><span class="label label-danger">UNPAID</span></a>
	                								@elseif($order->billplz_status == 1)
	                									<span class="label label-success">PAID</span>
	                								@endif
	                                			</td>
	                                			<td><a href="{{ url('admin/order/'.$order->id.'') }}" class="btn btn-xs btn-info">View</a></td>
	                                		</tr>
	                                		@endforeach
	                                	@endif
                                	</tbody>
                                </table>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
    @include('admin.layouts.footer')
    <script type="text/javascript">
        function deleteUser(url) {

            swal({
                title: 'Are you sure?',
                text: "All related to this user, bookings history and report will be lost",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Delete it!'
            }).then(function() {
                window.location.replace(url);
            })

            return false;
        }
    </script>
    </body>
</html>