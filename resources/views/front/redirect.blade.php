<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <br /><br /><br /><br /><br />
                        <h3 class="text-center">Please Wait... You will be redirect in 5 seconds. (please do not close or refresh the browser)</h3>
                    </div>
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')
    <script type="text/javascript">
        
        window.setTimeout(function() {
            window.location.href = '{{ url('order/history') }}';
        }, 5000);

    </script>
    </body>
</html>