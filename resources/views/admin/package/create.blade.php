<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
            <div class="be-content">
                <div class="main-content container-fluid">
                    <h3>Create New Package</h3>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <form method="POST" action="{{ url('/admin/package/create') }}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Package Name</label>
                                                    <input name="name" type="text" class="form-control input-sm" required>
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Description</label>
                                                    <textarea class="form-control description" name="description" required></textarea>
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Price Start From (RM)</label>
                                                    <input name="price_start" type="text" class="form-control input-sm" required>
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Price Per?</sup></label>
                                                    <select name="is_pax" class="form-control" required>
                                                        <option value="Pax">Pax</option>
                                                        <option value="Item">Item</option>
                                                    </select>
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Featured Image (1000x686)</label>
                                                    <input type="file" name="featured_image" class="form-control input-sm" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Show Pdf Menu</sup></label>
                                                    <select name="is_pdf" class="form-control" required>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Pdf File</label>
                                                    <input type="file" name="pdf" class="form-control input-sm" />
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Terms & Conditions</label>
                                                    <textarea class="form-control terms" name="terms" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Create New Package</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @include('admin.layouts.footer')
    <script>
        $('.terms').wysihtml5({
            toolbar: {
                fa: true
            }
        });
    </script>
    </body>
</html>