<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>All User</h3>
                @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<div class="row">
                    <div class="col-md-12">
						<div class="panel panel-default panel-border-color panel-border-color-primary">
						    <div class="panel-body">
                                <br />
                                <table id="users-table" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Time Register</th>
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
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'user-data',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
    </script>
    </body>
</html>