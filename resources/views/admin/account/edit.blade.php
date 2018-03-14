<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
            <div class="be-content">
                <div class="main-content container-fluid">
                    <h3>Account Update</h3>
                    @if(Session::has('message'))
						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
					@endif
                    <div class="row">
                    	<div class="col-md-12">
						    <div class="panel panel-default panel-border-color panel-border-color-primary">
						        <div class="panel-body">
						            <form method="POST" action="{{ url('/admin/account/') }}/{{ $user_id }}/edit">
						             <input type="hidden" name="_method" value="PUT">
						             {{ csrf_field() }}
						            	<div class="row">
							            	<div class="col-md-6">
								                <div class="form-group xs-pt-10">
								                    <label>Fullname</label>
								                    <input name="fullname" type="text" class="form-control input-sm" value="{{ Auth::user()->name }}">
								                </div>
								                <div class="form-group xs-pt-10">
								                    <label>Email</label>
								                    <input name="email" type="email" class="form-control input-sm" value="{{ Auth::user()->email }}">
								                </div>
								                <div class="form-group xs-pt-10">
								                    <label>Phone No</label>
								                    <input name="phone" type="text" class="form-control input-sm" value="{{ Auth::user()->phone }}" autocomplete="off">
								                </div>
								                <div class="form-group xs-pt-10">
								                    <label>Password <sup>(*leave blank if using the current password)</sup></label>
								                    <input name="password"  type="password" class="form-control input-sm" autocomplete="off">
								                </div>
								            </div>
								            <div class="col-md-6">
								                <div class="form-group xs-pt-10">
								                    <label>Address 1</label>
								                    <input name="address1" type="text" class="form-control input-sm" value="{{ Auth::user()->address1 }}">
								                </div>
								                <div class="form-group xs-pt-10">
								                    <label>Address 2</label>
								                    <input name="address2" type="text" class="form-control input-sm" value="{{ Auth::user()->address2 }}">
								                </div>
								                <div class="form-group xs-pt-10">
								                    <label>City</label>
								                    <input name="city" type="text" class="form-control input-sm" value="{{ Auth::user()->city }}">
								                </div>
								                <div class="form-group xs-pt-10">
								                    <label>Postcode</label>
								                    <input name="postcode" type="text" class="form-control input-sm" value="{{ Auth::user()->postcode }}">
								                </div>
								                <div class="form-group xs-pt-10">
								                    <label>State</label>
								                    <input name="state" type="text" class="form-control input-sm" value="{{ Auth::user()->state }}">
								                </div>
							            	</div>
						            	</div>
						                <button type="submit" class="btn btn-block btn-primary">Update</button>
						            </form>
						        </div>
						    </div>
						</div>
                    </div>
                </div>
            </div>
    @include('admin.layouts.footer')
    </body>
</html>