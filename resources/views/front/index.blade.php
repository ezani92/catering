<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Design Your Menu</h1>
                        <p style="font-size: 18px; line-height: 25px; font-weight: 200; color: #a0a0a0">
                            Because every event and taste preferences are unique, plan your own buffet spread from our wide range of local favourites and international craves. There’s definitely no shortage of options here!
                        </p>
                        <br />
                    </div>
                </div>
                <div class="row">
                    @foreach($packages as $package)
                    <div class="col-md-6">
                        <div class="panel panel-default panel-package">
                            <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/black-layer.png') }}), url({{ asset('assets/img/stock/food1.jpg') }}); margin: 0 0px;"> <span class="title">{{ $package->name }}</span>
                                <br>
                                <span style="font-size: 10px; color: grey;">
                                                        start from
                                                    </span>
                                <br />
                                <span style="font-size: 25px;">
                                                        RM {{ $package->price_start }}
                                                    </span>
                                <br>
                                <span style="font-size: 10px; color: grey;">
                                                        per {{ $package->is_pax }}
                                                    </span>
                                <br />
                            </div>
                            <div class="panel-body text-center">
                                <p>
                                    {{ $package->description }}
                                </p>
                                <a href="{{ url('/order/'.$package->slug) }}" class="btn btn-default">Order Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="padding-top: 15%;">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action="{{ url('/set-shipping') }}">
                    {{ csrf_field() }}
                        <div class="modal-header">
                            <h4 class="modal-title">Please select a delivery location</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Select City</label>
                                <select name="checkout_delivery_city" id="city_delivery" class="form-control select2" required>
                                        <option value="" data-rate="0">Select</option>
                                    @foreach(\App\Shipping::all() as $shipping)
                                        <option value="{{ $shipping->city_name }}" data-rate="{{ $shipping->rate }}">{{ $shipping->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p>*If you cant find your location above means we are not able to deliver to that location</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Continue</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Select Later</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')
    <script type="text/javascript">
        @php
            $shipping = session('shipping_location');
            if($shipping == null)
            {
                echo "$('#myModal').modal('show');";
            }
        @endphp
        $('.select2').select2();
    </script>
    </body>
</html>