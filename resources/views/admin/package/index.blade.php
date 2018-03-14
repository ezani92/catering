<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>All Package List</h3>
                @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<div class="row">
                    <div class="col-md-12">
						<div class="panel panel-default panel-border-color panel-border-color-primary">
						    <div class="panel-body">
                                <br />
                                <table id="packages-table" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th width="30%">Description</th>
                                            <th>Price From</th>
                                            <th>Pdf File</th>
                                            <th>Last Update</th>
                                            <th>Display On Frontend?</th>
                                            <th>Is Trashed?</th>
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
            ajax: 'package-data',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'price_start', name: 'price_start' },
                { data: 'pdf_file', name: 'pdf_file' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'display', name: 'display', orderable: false, searchable: false },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
    </script>
    </body>
</html>