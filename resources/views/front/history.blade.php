<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>My Order History</h3>
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
                                            <th>Order ID</th>
                                            <th>Order Status</th>
                                            <th width="30%">Order Date</th>
                                            <th>Package</th>
                                            <th>Set</th>
                                            <th>Total Price (with gst)</th>
                                            <th>Payment Status</th>
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
    @include('frontLayouts.footer')  
    <script>
    $(function() {
        $('#packages-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'history-data/{{ Auth::user()->id }}',
            columns: [
                { data: 'hash_id', name: 'hash_id' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'package_id', name: 'package_id' },
                { data: 'set_id', name: 'set_id' },
                { data: 'grand_price', name: 'grand_price' },
                { data: 'billplz_status', name: 'billplz_status' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
    </script>
    </body>
</html>