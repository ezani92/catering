<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
    <?php

    $notifications = Auth::user()->notifications()->paginate(20);

    ?>
            <div class="be-content">
                <div class="main-content container-fluid">
                    <h3 class="text-center">All Notifications</h3>
                    <br />
                    <ul>
                    @foreach($notifications as $notification)
                    	@if($notification->type == 'App\Notifications\NewUserRegisterAdmin')
	                    	<li>
	                    		{{ \App\User::find($notification->data['user_id'])->name }} 
	                    		Just created an account on Teaffani [{{ Carbon\Carbon::parse($notification->data['register_time']['date'])->diffForHumans() }}]
	                    	</li>
	                    @endif
                    @endforeach
                	</ul>
                    {{ $notifications->links() }}
                </div>
            </div>
    @include('admin.layouts.footer')
    </body>
</html>