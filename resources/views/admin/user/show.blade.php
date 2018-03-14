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
						</div>
					</div>
                </div>
            </div>
    @include('admin.layouts.footer')
    </body>
</html>