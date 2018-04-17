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
                    <div class="col-md-12">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                <form method="post" action="{{ url('admin/item-category/'.$foodCategory->id.'/update') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Category name</label>
                                        <input type="text" name="name" class="form-control input-sm" value="{{ $foodCategory->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Type{{ $foodCategory->type }}</label>
                                        {{ Form::select('category_type', ['food' => 'Food','other' => 'Others'], $foodCategory->type, ['class' => 'form-control food-category input-sm']) }}
                                    </div>
                                    <button class="btn btn-info" type="submit">Update Item Category</button>
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