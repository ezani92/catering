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
                                <a href="{{ url('/order/'.$package->slug) }}" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <form id="mapForm" method="post" action="{{ url('/check-shipping') }}">
                    {{ csrf_field() }}
                        <div class="modal-header">
                            <h4 class="modal-title">Check if we deliver to your area!</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Drag Delivery Location On Map Below, If you cant find your address, Please drag the marker to nearest location.</label>
                                <input type="text" name="google_map" id="google_map" class="form-control" required>
                                <div id="somecomponent" style="width: 100%; height: 400px;"></div>
                                <input type="hidden" id="delivery_lat" name="delivery_lat">
                                <input type="hidden" id="delivery_long" name="delivery_long">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Check Location</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Select Later</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')
    <script type="text/javascript">

    $(document).ready(function(){

        

       
        $('.select2').select2();

         $('#somecomponent').locationpicker({
             location: {
                 latitude: 3.0733,
                 longitude: 101.5054 
             },
             radius: false,
             inputBinding: {
                 locationNameInput: $('#google_map'),
                 latitudeInput: $('#delivery_lat'),
                 longitudeInput: $('#delivery_long')
             },
             onchanged: function(currentLocation, radius, isMarkerDropped) {

             },
             markerInCenter: false,
             enableAutocomplete: true,
             addressFormat: 'street_address',
             autocompleteOptions: {
                 types: ['address'],
                 componentRestrictions: {
                     country: 'my'
                 }
             }
         });

        $('#mapForm').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        }); 

     });

    </script>
    <style>
        .pac-container {
            z-index: 10000 !important;
        }

        .modal-header {
            border-bottom:1px solid #eee;
            background-color: #005344;
            color: white;
         }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){

            @if(Session::has('delivery'))
                swal({
                    title: "Hooray!",
                    text: "We can deliver to your location! =)",
                    type: "success",
                    confirmButtonText: "Proceed Order",
                });
            @else
                 $('#myModal').modal('show');
            @endif

        }); 
    </script>
    </body>
</html>