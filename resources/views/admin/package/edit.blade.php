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
                                    <form method="POST" action="{{ url('/admin/package/'.$package->id.'/update') }}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="_method" value="PUT">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Package Name</label>
                                                    <input name="name" type="text" class="form-control input-sm" value="{{ $package->name }}">
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Description</label>
                                                    <textarea class="form-control description" name="description">{{ $package->description }}</textarea>
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Price Start From (RM)</label>
                                                    <input name="price_start" type="text" class="form-control input-sm" value="{{ $package->price_start }}">
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Price Per?</sup></label>
                                                    {{ Form::select('is_pax', ['Pax' => 'Pax', 'Item' => 'Item'], $package->is_pax,['class' => 'form-control']) }}
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Featured Image (<a target="_blank" href="{{ asset('storage/featured_image/'.$package->featured_image) }}">Current Image</a>) <sub>*Leave empty if the image file is same</sub></label>
                                                    <input type="file" name="featured_image" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Show Pdf Menu</sup></label>
                                                    {{ Form::select('is_pdf', ['0' => 'No', '1' => 'Yes'], $package->is_pdf,['class' => 'form-control']) }}
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Pdf File (<a target="_blank" href="{{ asset('storage/pdf/'.$package->pdf_file) }}">Current PDF</a>) <sub>*Leave empty if the pdf file is same</sub></label>
                                                    <input type="file" name="pdf" class="form-control input-sm" />
                                                </div>
                                                <div class="form-group xs-pt-10">
                                                    <label>Terms & Conditions</label>
                                                    <textarea class="form-control terms" name="terms">{{ $package->terms }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Update Package</button>
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