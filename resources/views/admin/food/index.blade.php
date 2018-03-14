<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>Item Listing</h3>
                @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<div class="row">
                    <div class="col-md-12">
						<div class="panel panel-default panel-border-color panel-border-color-primary">
						    <div class="panel-body">
                                <br />
                                <table id="food-table" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item Category</th>
                                            <th>name</th>
                                            <th>Price Per Item/Set (RM)</th>
                                            <th>Minimum Puchase</th>
                                            <th>Maximum Purchase</th>
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
        $('#food-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'item-data',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'food_category_id', name: 'food_category_id' },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'min', name: 'min' },
                { data: 'max', name: 'max' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
    </script>
    </body>
</html>