<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
            <div class="be-content">
                <div class="main-content container-fluid">
                    <h3>Update Item</h3>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <form method="POST" action="{{ url('/admin/item/update') }}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="food_id" value="{{ $food->id }}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <br />
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label>Item Category</label>
                                                        {{ Form::select('food_category', $foodCategories, $food->food_category_id, ['class' => 'form-control food-category input-sm']) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Item Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $food->name }}" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="be-checkbox">
                                                            @if ($food->chef_hat == 1) 
                                                                {{ Form::checkbox('chef_hat', 1, true, ['id' => 'chef_hat']) }}
                                                            @else
                                                                {{ Form::checkbox('chef_hat', 1, null, ['id' => 'chef_hat']) }}
                                                            @endif
                                                            <label for="chef_hat" class="radio-label texthover">Chef Hat</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">   
                                                        <div class="be-checkbox">      
                                                            @if ($food->is_new == 1)                         
                                                                {{ Form::checkbox('is_new', 1, true, ['id' => 'is_new'] ) }}
                                                            @else
                                                                {{ Form::checkbox('is_new', 1, null, ['id' => 'is_new'] ) }}
                                                            @endif
                                                            <label for="is_new" class="radio-label texthover">New</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Price Per Item/Set (RM)</label>
                                                        <input type="number" class="form-control" name="price" value="{{ $food->price }}" step=".01" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Minimum Purchase</label>
                                                        <input type="number" class="form-control" name="minimum_purchase" value="{{ $food->min }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Maximum Purchase</label>
                                                        <input type="number" class="form-control" name="maximum_purchase" value="{{ $food->max }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>
                                                            Food Image 
                                                            @if($food->food_image == null)

                                                            @else
                                                                <a target="_blank" href="{{ url('storage/food/'.$food->food_image) }}">
                                                                    <span class="label label-info">View Current Image</span>
                                                                </a>
                                                            @endif
                                                        </label>
                                                        <input type="file" class="form-control" name="food_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Update Item</button>
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