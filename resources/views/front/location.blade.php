<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br /><br /><br /><br />
                        <h1 class="">Oh No! Our Service are still not supported on your location.</h3>
                            <br />
                            <a href="{{ url('/') }}"><button class="btn btn-large btn-primary">Continue With Order</button></a>
                    </div>
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')
    </body>
</html>