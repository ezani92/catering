<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-3 col-xs-12 affix affix-top">
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
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo"><i style="color: #008d86;" class="fas fa-users"></i>&nbsp;&nbsp;Number Of Pax </a></h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div style="padding-left: 16px; padding-right: 16px;">
                                        (Minimum {{ $set->min_pax }} Pax) | {{ $set->courses }} courses
                                        <br /><br />
                                        <div class="input-group input-group-lg">
                                            <input id="input_total" type="text" value="" name="input_total" class="form-control input-lg" style="text-align:center;">
                                        </div>
                                        <br />
                                        NUMBER OF PAX SELECTED<br />
                                        <span style="font-size:24px; color: #01493c;"><span id="pax_selected">0</span></span>
                                        <br />
                                        PRICE<br />
                                        <span style="font-size:24px; color: #01493c;">RM <span id="total">0</span></span>
                                        <br />
                                        PRICE W/ GST<br />
                                        <span style="font-size:24px; color: #01493c;">RM <span id="total_with_gst" >0</span></span>
                                        <br />
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img style="display: none;" id="view_image" width="100%" src="https://via.placeholder.com/600x350&text=No%20Image%20Available">
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
                            <form id="form-order" method="POST" action="{{ url('order/add-on') }}">
                            {{ csrf_field() }}
                            <input id="pax_form" name="pax_form" type="hidden" value="0">
                            <input id="total_form" name="total_form" type="hidden" value="0">
                            <input name="_setID" type="hidden" value="{{ $set->id }}">
                            @foreach($set->course_categories as $course_categories)
                            <div class="col-md-6">
                                <div id="cat_div_{{ $course_categories->id }}" class="panel panel-default panel-package {{ $course_categories->compulsory === 1 ? "compulsory" : "" }} ">
                                    <div class="panel-body  row-eq-height">
                                        <h3 style="color: #01493c;">
                                            {{ $course_categories->name }} 
                                        </h3>
                                        <code class="text-center" style="color:#0a0;">Minimum Selection :  {{ $course_categories->maximum_selection }}</code>
                                        <input name="CategoryName" type="hidden" value="{{ $course_categories->name }}" />
                                        <input name="_CourseCategories[]" type="hidden" value="{{ $course_categories->id }}" />
                                        <hr />
                                        <div class="form-group">
                                            @foreach($course_categories->courses as $course)
                                                @if($course->additional_price == 0)
                                                    <div class="be-checkbox">
                                                        <input name="_courses[]" value="{{ $course->id }}" data-additional="0" data-additional-price="0" id="food_{{ $course->food->id }}" type="checkbox" class="count-course food_class_{{ $course->course_category_id }}">
                                                        <label style="display: block; padding: 1px 2px;" class="radio-label texthover" for="food_{{ $course->food->id }}" 
                                                            @if($course->food->food_image == null)
                                                                data-image="null"
                                                            @else 
                                                                data-image="{{ url('/') }}/storage/food/{{ $course->food->food_image }}"
                                                            @endif
                                                            >
                                                            <div class="food-label food-item-name">
                                                                {{ $course->food->name }}
                                                                @if($course->food->chef_hat == 1 && $course->food->is_new == 1)
                                                                    <sup class="new-item">New</sup>
                                                                    <img style="margin-bottom: 7px;" height="20px" src="https://png.icons8.com/ios/1600/00827B/chef-hat.png">
                                                                @elseif ($course->food->is_new == 1)
                                                                    <sup class="new-item">New</sup>
                                                                @elseif ($course->food->chef_hat == 1)
                                                                    <img style="margin-bottom: 7px;" height="20px" src="https://png.icons8.com/ios/1600/00827B/chef-hat.png">
                                                                @endif
                                                            </div>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="be-checkbox">
                                                        <input name="_courses[]" value="{{ $course->id }}" data-additional="1" data-additional-price="{{ $course->additional_price }}" id="food_{{ $course->food->id }}" type="checkbox" class="count-course food_class_{{ $course->course_category_id }}">
                                                        <label style="display: block; padding: 1px 2px;" class="radio-label texthover" for="food_{{ $course->food->id }}" data-image="
                                                            @if($course->food->food_image == null)
                                                                https://via.placeholder.com/600x350&text=No%20Image%20Available
                                                            @else 
                                                                https://teaffani.dev/storage/food/{{ $course->food->food_image }}
                                                            @endif
                                                            ">{{ $course->food->name }} 
                                                            @if($course->food->chef_hat == 1)
                                                                <img style="margin-bottom: 7px;" height="20px" src="https://png.icons8.com/ios/1600/00827B/chef-hat.png">
                                                            @else

                                                            @endif
                                                            <span style="color: #02A847;">(+ RM{{ $course->additional_price }})</span>
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        @if($course_categories->allow_multiple == 1)
                                        <script type="text/javascript">

                                            $("input.food_class_{{ $course->course_category_id }}").click(function () {
                                                
                                                if ($("#cat_div_{{ $course_categories->id }}").find("input:checked").length > 0) {
                                                    $('#cat_div_{{ $course_categories->id }}').addClass('success');
                                                    $('#cat_div_{{ $course_categories->id }}').removeClass('error');
                                                    $('#error_summary_content').hide();
                                                }

                                                calculate();

                                            });
                                        </script>

                                        @else
                                        <script type="text/javascript">
                                            
                                            $('input.food_class_{{ $course->course_category_id }}').on('change', function() {
                                                $('input.food_class_{{ $course->course_category_id }}').not(this).prop('checked', false);  
                                            });

                                            $("input.food_class_{{ $course->course_category_id }}").click(function () {

                                                if ($("#cat_div_{{ $course_categories->id }}").find("input:checked").length > 0) {
                                                    $('#cat_div_{{ $course_categories->id }}').addClass('success');
                                                    $('#cat_div_{{ $course_categories->id }}').removeClass('error');
                                                    $('#error_summary_content').hide();
                                                }

                                                calculate();
                                            });
                                        </script>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </form>
                        </div>
                        <button id="next" class="btn btn-lg btn-primary">NEXT</button>
                    </div>
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')   
    <script type="text/javascript">

    $(document).ready(function(){


        $('.texthover').mouseover(function(){
            
            var food_image = $(this).data("image");

            if(food_image == 'null')
            {

            }
            else
            {
                $("#view_image").attr("src",food_image);
                $("#view_image").show();
            }
            

        });
        $('.texthover').mouseout(function(){
            $("#view_image").hide();
        });

        $(function() {
            $('.row-eq-height').matchHeight();
        });

        var input_total = $("input[name='input_total']").TouchSpin({
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary",
            min: {{ $set->min_pax }},
            max: {{ $set->max_pax }},
            step: 5,
            initval: {{ $set->min_pax }}

        });

            calculate();

        input_total.on("change", function() {
            calculate();
        });
        
        $(".count-course").change(function() {
            if(this.checked) {
                var totalCheckboxes = $(".count-course:checked").length;

                var courses = {{ $set->courses }};

                if(totalCheckboxes > courses)
                {
                    
                    swal({
                        title: 'Whoops!',
                        text: "You can only select "+ courses +" courses from this package",
                        type: 'warning',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                    });

                    $(this).prop('checked', false);
                }
                else
                {
                    
                }

                
            }
        });

        $('#next').on("click", function() {
            
            var isError = false;
            $('#error_summary_body').empty();

            $(".compulsory").each(function (i) {
                if ($(this).find('input:checked').length == 0) {

                    $('#error_summary_body').append("<li>" + $(this).find("input[name$='CategoryName']").val() + "</li>");
                    $(this).addClass('error');

                    isError = true;
                }

            });

            if (isError) {
                $('#error_summary_content').show();
                return false;
            }
            else
            {

                $('#form-order').submit();
            }

        });

        

    });

    function calculate()
    {
        var current_pax = $('#input_total').val();
        var total = current_pax * {{ $set->price }};

        var total_additional_price = 0;

        $(".count-course").each(function (i) {
        
            var is_additional = $(this).data("additional");
            var additional_price = parseFloat($(this).data("additional-price"));
            var totalCheckboxes = $(".count-course:checked").length;

            if(is_additional == 1)
            {
                if(this.checked)
                {
                    total_additional_price = total_additional_price + additional_price;
                }
            }
        });

        var final_additional_price = total_additional_price * $('#input_total').val();
        var grand_total = total + final_additional_price;

        animate(grand_total,'total');
        animate((total + final_additional_price) * 1.06 , 'total_with_gst');

        $('#pax_form').val(current_pax);
        $('#total_form').val(grand_total);

        $('#pax_selected').text($('#input_total').val());
    }

    function animate(animate_num,selector)
    {
        var decimal_places = 2;
        var decimal_factor = decimal_places === 0 ? 1 : Math.pow(10, decimal_places);

        var final = animate_num.toFixed(2);

        $('#'+selector).text(final);

        // $('#'+selector)
        //     .animateNumber({
        //         number: animate_num * decimal_factor,
        //         numberStep: function(now, tween) {
        //             var floored_number = Math.floor(now) / decimal_factor,
        //                 target = $(tween.elem);

        //             if (decimal_places > 0) {
        //                 // force decimal places even if they are 0
        //                 floored_number = floored_number.toFixed(decimal_places);

        //                 // replace '.' separator with ','
        //                 floored_number = floored_number.toString().replace('.', '.');
        //             }

        //             target.text(floored_number);
        //         }
        //     },
        // 500
        // );
    }
    </script>
    </body>
</html>