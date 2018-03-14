<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>Item Category</h3>
                @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                <form method="post" action="{{ url('admin/item-category') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Category name</label>
                                        <input type="text" name="name" class="form-control input-sm">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Type</label>
                                        <select name="category_type" class="form-control">
                                            <option value="food">food</option>
                                            <option value="other">other</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-info" type="submit">Add New Item Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
						<div class="panel panel-default panel-border-color panel-border-color-primary">
						    <div class="panel-body">
                                <br />
                                <table id="food-category-table" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th width="30%">Name</th>
                                            <th width="30%">Type</th>
                                            <th>Last Update</th>
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
        $('#food-category-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'item-category-data',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'type', name: 'type' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
    </script>
    </body>
</html>