<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-3 col-xs-12  {{-- affix affix-top --}}"">
                        <div id="accordion1" class="panel-group accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne"><i style="color: #008d86;" class="fas fa-utensils"></i>&nbsp;&nbsp;Your Selection </a></h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body" style="color: white; background-image: url({{ asset('storage/set/'.$set->image) }}); background-size: cover; margin: 0 0px;">
                                    <br /><br /><br /><br /><br /><br />
                                    </div>

                                    <h3 style="text-align: center;">{{ $set->package->name }}</h3>
                                    <br />
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo"><i style="color: #008d86;" class="fas fa-users"></i>&nbsp;&nbsp;Checkout Summary </a></h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    @php

                                    $setprice = str_replace(',','',$input['_set_price']);
                                    $grand = floatval($setprice) + floatval($add_on_price);
                                    $grand_with_gst = $grand * 1.06;
                                    $gst_only = $grand_with_gst - $grand;


                                    @endphp
                                    <div style="padding-left: 16px; padding-right: 16px;">
                                        NUMBER OF PAX SELECTED<br />
                                        <span style="font-size:24px; color: #7f8c8d;"><span id="pax_selected">{{ $input['_pax'] }}</span></span>
                                        <br />
                                        SET PRICE<br />
                                        <span style="font-size:24px; color: #7f8c8d;">RM <span id="set_price">{{ $input['_set_price'] }}</span></span>
                                        <br />
                                        ADD ON PRICE<br />
                                        <span style="font-size:24px; color: #7f8c8d;">RM <span id="add_on_price">{{ $add_on_price }}</span></span>
                                        <br />
                                        TRANSPORTATION<br />
                                        <span style="font-size:24px; color: #7f8c8d;">RM <span id="transportation_price">0</span></span>
                                        <br />
                                        GST<br />
                                        <span style="font-size:24px; color: #7f8c8d;">RM <span id="gst" >{{ $gst_only }}</span></span>
                                        <br />
                                        Grand Total<br />
                                        <span style="font-size:24px; color: #000;">RM <span id="grand_total">{{ $grand_with_gst }}</span></span>
                                        <br />
                                        <br />
                                    </div>
                                    <form id="checkout-form" style="display: none;" method="post" action="{{ url('order/payment') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="package_id" value="{{ $set->package->id }}">
                                        <input type="hidden" name="set_id" value="{{ $set->id }}">
                                        <input type="hidden" name="pax" value="{{ $input['_pax'] }}"> 
                                        @foreach($course_categories as $course_category)
                                            <input type="hidden" name="courses_categories[]" value="{{ $course_category->id }}">
                                            @php

                                                $courses = \App\Course::where('course_category_id',$course_category->id)->whereIn('id', $input['_courses'])->get();

                                            @endphp
                                            @foreach($courses as $course)
                                                <input type="hidden" name="courses[]" value="{{ $course->id }}">
                                            @endforeach
                                        @endforeach
                                        @if(isset($input['_addon_id']))
                                            @php

                                                $j = 0;

                                            @endphp
                                            @foreach($input['_addon_id'] as $addon_id)
                                                <input type="hidden" name="addon_id[]" value="{{ $addon_id }}">
                                                <input type="hidden" name="addon_quantity[]" value="{{ $input['_quantity'][$j] }}">

                                            @php

                                                $j++;

                                            @endphp
                                            @endforeach
                                        @else
                                            <input type="hidden" name="addon_id[]" value="">
                                            <input type="hidden" name="addon_quantity[]" value="">
                                        @endif

                                        
                                        <input type="hidden" id="setprice" name="set_price" value="{{ $input['_set_price'] }}">
                                        <input type="hidden" id="addon_price" name="addon_price" value="{{ $add_on_price }}">
                                        <input type="hidden" id="transport_price" name="transport_price" value="0">
                                        <input type="hidden" id="gst_price" name="gst_price" value="{{ $gst_only }}">
                                        <input type="hidden" id="grand_price" name="grand_price" value="{{ $grand_with_gst }}">
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree"><i style="color: #008d86;" class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Dishes</a></h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div style="padding-left: 51px; padding-right: 16px;">
                                        @foreach($course_categories as $course_category)
                                            <strong><span style="text-transform: uppercase;">{{ $course_category->name }}</span></strong>
                                            <ul style="padding-left:0; ">
                                                @php

                                                $courses = \App\Course::where('course_category_id',$course_category->id)->whereIn('id', $input['_courses'])->get();

                                                @endphp
                                                @foreach($courses as $course)
                                                    <li style="list-style-position:inside; color: #748182;">{{ $course->food->name }}</li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                        <br /><br />
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseFour"><i style="color: #008d86;" class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add On Order</a></h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <ul id="ul_side_dishes" class="side-orders-selected" >
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($addons as $addon)
                                        <li id="addonList_'+food_id+'" class="addon-list">
                                            <div class="alert alert-dismissible fade in" role="alert" style="margin-bottom: -15px;">
                                                <span>{{ $addon->name }}</span> 
                                                <h5>Quantity : <span id="quantity_'+food_id+'"></span>{{ $input['_quantity'][$i] }}</h5>
                                                <h4>RM<span id="total_price_'+food_id+'">{{ $addon->price * $input['_quantity'][$i] }}</span></h4>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 style="margin-top: 0px;">Checkout</h2>
                            </div>
                        </div>
                        <div class="row">
                            @if (Auth::guest())
                            <div class="col-md-12">
                                <div class="panel panel-default panel-package compulsory">
                                    <div class="panel-body">
                                        <h4 style="border-bottom: 1px dotted #999; padding-bottom: 10px; ">YOU ARE NOT LOG IN</h4>
                                        <p>Please login / register first before continue with checkout</p>
                                        <br />
                                        <a href="{{ url('login') }}" class="btn btn-primary">Login</a> <a href="{{ url('register') }}" class="btn btn-primary">Register</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-12">
                                <div class="panel panel-default panel-package compulsory">
                                    <div class="panel-body">
                                        <h4 style="border-bottom: 1px dotted #999;">PERSONAL / COMPANY DETAILS</h4>
                                        <br />
                                        <input type="hidden" name="checkout_user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label><strong>Fullname / Company Name</strong></label>
                                            <input type="text" name="checkout_name" class="form-control" value="{{ Auth::user()->name }}" required>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label><strong>Email Address</strong></label>
                                                <input type="text" name="checkout_email" class="form-control" value="{{ Auth::user()->email }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label><strong>Phone Number</strong></label>
                                                <input type="number" minlength="10" name="checkout_phone" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Address 1 (Billing)</strong></label>
                                            <input type="text" name="checkout_billing_address_1" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Address 2 *optional (Billing)</strong></label>
                                            <input type="text" name="checkout_billing_address_2" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label><strong>Postcode (Billing)</strong></label>
                                                <input type="text" name="checkout_billing_poscode" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label><strong>City (Billing)</strong></label>
                                                <input type="text" name="checkout_billing_city" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>State (Billing)</strong></label>
                                            <select name="checkout_billing_state" class="form-control" required>
                                                <option>Selangor</option>
                                                <option>Kuala Lumpur</option>
                                                <option>Putrajaya</option>
                                                <option>Perak</option>
                                                <option>Johor</option>
                                                <option>Pahang</option>
                                                <option>Pulau Pinang</option>
                                                <option>Kedah</option>
                                                <option>Perlis</option>
                                                <option>Negeri Sembilan</option>
                                                <option>Melaka</option>
                                                <option>Kelantan</option>
                                                <option>Terengganu</option>
                                                <option>Sabah</option>
                                                <option>Sarawak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default panel-package compulsory">
                                    <div class="panel-body">
                                        <h4 style="border-bottom: 1px dotted #999;">DELIVERY DETAILS</h4>
                                        <br />
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label><strong>Date Delivery</strong></label>
                                                <input type="date" name="checkout_date" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Time Delivery</label>
                                                <input type="time" name="checkout_time" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Poscode (Delivery)</label>
                                                <input type="text" name="checkout_delivery_postcode" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>City (Delivery) *We only deliver to cities that are listed here</label>
                                                <select name="checkout_delivery_city" id="city_delivery" class="form-control select2" required>
                                                        <option value="" data-rate="0">Select</option>
                                                    @foreach(\App\Shipping::all() as $shipping)
                                                        <option value="{{ $shipping->city_name }}" data-rate="{{ $shipping->rate }}">{{ $shipping->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Drag Delivery Location On Map Below</label>
                                            <input type="text" name="google_map" id="google_map" class="form-control" required>
                                            <div id="somecomponent" style="width: 100%; height: 400px;"></div>
                                            <input type="hidden" id="delivery_lat" name="delivery_lat">
                                            <input type="hidden" id="delivery_long" name="delivery_long">
                                        </div>

                                        <div class="form-group">
                                            <label>Other Notes / Request</label>
                                            <textarea class="form-control" name="checkout_note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default panel-package compulsory">
                                    <div class="panel-body">
                                        <h4 style="border-bottom: 1px dotted #999;">CHECKOUT INFORMATION</h4>
                                        <br />
                                        <div class="form-group">
                                            <div class="be-radio">
                                                <input type="radio" name="rad" id="rad2" class="checkout-type" value="payment">
                                                <label for="rad2">I Want to make a payment</label>
                                            </div>

                                            <div class="be-radio">
                                                <input type="radio" name="rad" id="rad1" class="checkout-type" value="quotation">
                                                <label for="rad1">I want to request quotation first</label>
                                            </div>
                                        </div>
                                        <br /><br />
                                        <button class="btn btn-primary btn-block payment" type="submit" style="display: none;">PROCEED TO PAYMENT</button>
                        
                                        <button class="btn btn-primary btn-block quotation" type="submit" style="display: none;">DOWNLOAD QUOTATION</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')   
    <script type="text/javascript">

    $(document).ready(function(){

        

        
          
         $('.select2').select2();

         $("#city_delivery").on("change", function(){
            
           var transport_rate = $('option:selected', this).attr('data-rate');
           var set_price = $("#setprice").val().replace(',', '');
           var addon_price =  $("#addon_price").val();

           var total = parseFloat(set_price) + parseFloat(addon_price) + parseFloat(transport_rate);


           var grand_total = total * 1.06;
           var gst = grand_total - total;

           animate(transport_rate,'transportation_price');
           $("#transport_price").val(transport_rate);

           animate(gst,'gst');
           $("#gst_price").val(gst);

           animate(grand_total,'grand_total');
           $("#grand_price").val(grand_total);

        });

        $('.checkout-type').click(function() {
            
            if(this.value == 'payment')
            {
                $(".payment").show();
                $(".quotation").hide();
            }
            else if(this.value == 'quotation')
            {
                $(".payment").hide();
                $(".quotation").show();
            }

        }); 

    });

    function animate(animate_num,selector)
    {
        var decimal_places = 2;
        var decimal_factor = decimal_places === 0 ? 1 : Math.pow(10, decimal_places);

        $('#'+selector)
            .animateNumber({
                number: animate_num * decimal_factor,
                numberStep: function(now, tween) {
                    var floored_number = Math.floor(now) / decimal_factor,
                        target = $(tween.elem);

                    if (decimal_places > 0) {
                        // force decimal places even if they are 0
                        floored_number = floored_number.toFixed(decimal_places);

                        // replace '.' separator with ','
                        floored_number = floored_number.toString().replace('.', '.');
                    }

                    target.text(floored_number);
                }
            },
        500
        );
    }

    $('#somecomponent').locationpicker({
        @if(Session::has('delivery_lat'))    
            location: {
                latitude: {{ session('delivery_lat') }},
                longitude: {{ session('delivery_long') }}
            },
        @else
            location: {
                latitude: 3.0733,
                longitude: 101.5054
            },
        @endif
        radius: false,
        inputBinding: {
           locationNameInput: $('#google_map'),
           latitudeInput: $('#delivery_lat'),
           longitudeInput: $('#delivery_long')
        },
        onchanged: function(currentLocation, radius, isMarkerDropped) {
            
            var address = $('#google_map').val();

            $.ajax({
                url: '{{ url('api/check-shipping') }}',
                type: 'POST',
                data: { 
                    address: address
                },
                success: function(result) {
                    
                    if(result == '1')
                    {
                        swal({
                            title: "Hooray!",
                            text: "We can deliver to your location! =)",
                            type: "success",
                            confirmButtonText: "Continue",
                        });
                    }
                    else
                    {
                        console.log(result);
                        swal({
                            title: "Oh No!",
                            text: "We are not able to deliver to this location, Please set another location. :(",
                            type: "warning",
                            confirmButtonText: "Set Another Address",
                        });
                    }

                },
            });
        },
        markerInCenter: false,
        enableAutocomplete: true,
        addressFormat: 'street_address',
        autocompleteOptions: {
            types: ['address'],
            componentRestrictions: {country: 'my'}
        }
    });



    </script>
    </body>
</html>