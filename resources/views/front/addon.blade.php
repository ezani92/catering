<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-3 col-xs-12{{--  affix affix-top --}}">
                        <div id="accordion1" class="panel-group accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne"><i style="color: #7f8c8d;" class="fas fa-utensils"></i>&nbsp;&nbsp;Your Selection </a></h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body" style="color: white; background-image: url({{ asset('storage/set/'.$set->image) }}); background-size: cover; margin: 0 0px;">
                                    <br /><br /><br /><br /><br /><br />
                                    </div>

                                    <h3 style="text-align: center;">{{ $set->package->name }}</h3>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo"><i style="color: #7f8c8d;" class="fas fa-users"></i>&nbsp;&nbsp;Number Of Pax </a></h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div style="padding-left: 16px; padding-right: 16px;">
                                        NUMBER OF PAX SELECTED<br />
                                        <span style="font-size:24px; color: #7f8c8d;"><span id="pax_selected">{{ $input['pax_form'] }}</span></span>
                                        <br />
                                        PRICE<br />
                                        <span style="font-size:24px; color: #7f8c8d;">RM <span id="total">{{ number_format($input['total_form'],2) }}</span></span>
                                        <br />
                                        PRICE W/ GST<br />
                                        <span style="font-size:24px; color: #7f8c8d;">RM <span id="total_with_gst" >{{ number_format($input['total_form'] * 1.06,2) }}</span></span>
                                        <br />
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree"><i style="color: #7f8c8d;" class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Dishes</a></h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div style="padding-left: 51px; padding-right: 16px;">
                                        @foreach($course_categories as $course_category)
                                            <strong><span style="text-transform: uppercase;">{{ $course_category->name }}</span></strong>
                                            <ul style="padding-left:0; ">@php

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
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseFour"><i style="color: #7f8c8d;" class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add On Order</a></h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse in">
                                    <ul id="ul_side_dishes" class="side-orders-selected">
                                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <div class="row" id="error_summary_content" style="display: none;">
                            <div class="col-md-12">
                                <div class="alert alert-danger-small alert-dismissible fade in" role="alert">
                                    <button class="close" aria-label="Close" type="button" data-dismiss="alert">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <p><strong id="error_summary_header" style="font-size: 16px;">Please select one items:</strong></p>
                                    <ul id="error_summary_body"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1 style="margin-top: 0px;">Add-on Order(s)</h1>
                                <br />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills">
                                    @php
                                        $first = true;
                                    @endphp
                                    @foreach($food_categories as $food_category)
                                        @if($first == true)
                                            <li class="active" style="display: inline-block; float: none; background-color: #fff;"><a style="text-transform: uppercase;" data-toggle="tab" href="#{{ $food_category->id }}">{{ $food_category->name }}</a></li>
                                            @php
                                                $first = false;
                                            @endphp
                                        @else
                                            <li style="display: inline-block; float: none; background-color: #fff;"><a style="text-transform: uppercase;" data-toggle="tab" href="#{{ $food_category->id }}">{{ $food_category->name }}</a></li>

                                        @endif

                                    @endforeach
                                    <br /><br />
                                    @foreach($other_categories as $other_category)

                                        <li style="display: inline-block; float: none; background-color: #fff;"><a style=" text-transform: uppercase;" data-toggle="tab" href="#{{ $other_category->id }}">{{ $other_category->name }}</a></li>

                                    @endforeach



                                </ul>
                                <br />
                                <div class="tab-content">
                                    @php
                                        $first = true;
                                    @endphp
                                    @foreach($item_categories as $item_category)
                                        @if($first == true)
                                            <div id="{{ $item_category->id }}" class="tab-pane fade in active">
                                            @php
                                                $first = false;
                                            @endphp
                                        @else
                                            <div id="{{ $item_category->id }}" class="tab-pane fade">
                                        @endif
                                                <div class="row">
                                                @foreach($item_category->foods as $food)

                                                    <div class="col-md-6">
                                                    <div class="well"> 
                                                        <h5 style="margin-bottom: 0px;">{{ $food->name }}</h5>
                                                        <span>RM {{ $food->price }} (RM {{ $food->price * 1.06 }} w/GST) - Min {{ $food->min }} Set</span>
                                                        <br /><br />
                                                        <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="input-group input-group-lg">
                                                                <input id="input_total" type="text" value="" name="input_add_on_{{ $food->id }}" data-price="{{ $food->price }}" class="form-control input-lg add_on_{{ $food->id }}" style="text-align:center;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button data-food-id="{{ $food->id }}" data-food-price="{{ $food->price }}" data-food-name="{{ $food->name }}" class="btn btn-info btn-counter btn-block btn-add btn-add-{{ $food->id }}">ADD</button>
                                                            <button data-food-id="{{ $food->id }}" class="btn btn-grey btn-counter btn-block btn-remove btn-remove-{{ $food->id }}" style="display: none; margin-top: 0px;">REMOVE</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                @endforeach
                                                </div>

                                            </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <form id="form-addon" style="display: none;" method="post" action={{ url('order/check-out') }}>
                            {{ csrf_field() }}
                            <input type="hidden" name="_package_id" value="{{ $set->package->id }}">
                            <input type="hidden" name="_set_id" value="{{ $set->id }}">
                            <input type="hidden" name="_pax" value="{{ $input['pax_form'] }}"> 
                            @foreach($course_categories as $course_category)
                                <input type="hidden" name="_courses_categories[]" value="{{ $course_category->id }}">
                                @php

                                    $courses = \App\Course::where('course_category_id',$course_category->id)->whereIn('id', $input['_courses'])->get();

                                @endphp
                                @foreach($courses as $course)
                                    <input type="hidden" name="_courses[]" value="{{ $course->id }}">
                                @endforeach
                            @endforeach
                            
                            <input type="hidden" name="_set_price" value="{{ number_format($input['total_form'],2) }}">
                            <span id="input_addon_id">


                            </span>
                            <span id="input_addon_quantity">


                            </span>

                        </form>
                        <button id="back" class="btn btn-lg btn-">BACK</button> 
                        <button id="next" type="submit" class="btn btn-lg btn-primary">NEXT</button>
                    </div>
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')   
    <script type="text/javascript">

    $(document).ready(function(){
        $('#back').on('click', function(e){
            e.preventDefault();
            window.history.back();
        });

    @foreach($foods as $food)

        var input_total_{{ $food->id }} = $("input.add_on_{{ $food->id }}").TouchSpin({
            buttondown_class: "btn btn-grey",
            buttonup_class: "btn btn-grey",
            postfix: "Set",
            postfix_extraclass: "btn btn-default",
            min: {{ $food->min }},
            max: {{ $food->max }},
            initval: {{ $food->min }}

        });

        input_total_{{ $food->id }}.on("change", function() {

            changeQuantity({{ $food->id }},{{ $food->price }},this.value);

        });

    @endforeach

        $(".btn-add").on("click", function() {
            
            var food_id = $(this).data("food-id");
            var food_price = $(this).data("food-price");
            var food_name = $(this).data("food-name");
            var quantity = $("input.add_on_"+food_id).val();

            $('.btn-add-'+food_id).hide();
            $('.btn-remove-'+food_id).show();

            var total_price = food_price * quantity;

            $("#ul_side_dishes").append('<li id="addonList_'+food_id+'" class="addon-list"> <div class="alert alert-dismissible fade in" role="alert" style="margin-bottom: -15px;"> <button onclick="removeSide('+food_id+');" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> <span>'+food_name+'</span> <h5><span id="quantity_'+food_id+'">'+quantity+'</span></h5> <h4>RM<span id="total_price_'+food_id+'">'+total_price+'</span></h4> </div> </li>');
            $("#input_addon_id").append('<input id="input_addon_list_'+food_id+'" type="hidden" name="_addon_id[]" value="'+food_id+'" />');
            $("#input_addon_quantity").append('<input id="input_quantity_list_'+food_id+'" type="hidden" name="_quantity[]" value="'+quantity+'" />');
        });

        $(".btn-remove").on("click", function() {
            
            var food_id = $(this).data("food-id");
            removeSide(food_id);
            
        });

        $('#next').on("click", function() {
            $('#form-addon').submit();
        });   

        
    });

    function removeSide(food_id)
    {
        $("#addonList_"+food_id).remove();
        $("#input_addon_list_"+food_id).remove();
        $("#input_quantity_list_"+food_id).remove();

        $('.btn-add-'+food_id).show();
        $('.btn-remove-'+food_id).hide();
    }

    function changeQuantity(id,price,quantity)
    {
        var new_total = (price * quantity);
        var n = new_total.toFixed(2);


        $("#quantity_"+id).text(quantity);
        $("#total_price_"+id).text(n);

        $("#input_quantity_list_"+id).val(quantity);
    }



    </script>
    </body>
</html>