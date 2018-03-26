<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
            <div class="be-content">
                <div class="main-content container-fluid">
                    <h3>Create New Item</h3>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <form method="POST" action="{{ url('/admin/item/create') }}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <br />
                                                    <div class="form-group col-md-6">
                                                        <label>Item Category</label>
                                                        <select class="form-control food-category input-sm" name="food_category" required>
                                                            <option value="">Select</option>
                                                            @foreach($foodCategories as $foodCategory)
                                                                <option value="{{ $foodCategory->id }}">{{ $foodCategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Item Name</label>
                                                        <input type="text" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="be-checkbox">
                                                            {{ Form::checkbox('chef_hat', 1, null, ['id' => 'chef_hat']) }}
                                                            <label for="chef_hat" class="radio-label texthover">Chef Hat</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">   
                                                        <div class="be-checkbox">                               
                                                            {{ Form::checkbox('is_new', 1, null, ['id' => 'is_new'] ) }} 
                                                            <label for="is_new" class="radio-label texthover">New</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Price Per Item/Set (RM)</label>
                                                        <input type="number" class="form-control" name="price" step=".01" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Minimum Purchase</label>
                                                        <input type="number" class="form-control" name="minimum_purchase" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Maximum Purchase</label>
                                                        <input type="number" class="form-control" name="maximum_purchase" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Food Image </label>
                                                        <input type="file" class="form-control" name="food_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Create New Food</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @include('admin.layouts.footer')
    <script type="text/javascript">
        
        $(document).ready(function() {
            $('.food-category').select2();
        });

    </script>
    </body>
</html>