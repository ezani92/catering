<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>Order #{{ $order->hash_id }} Details</h3>
                <a href="{{ url('admin/order') }}" class="label label-default">Back To Order List</a>
                <br /><br />
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                <h5 style="text-decoration: underline;">Package Details</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="30%"><strong>Order Status</strong></td>
                                            <td>
                                                @if($order->status == 1)
                                                    <span class="label label-info">Pending Payment</span>
                                                @elseif($order->status == 2)
                                                    <span class="label label-info">Order Process</span>
                                                @elseif($order->status == 3)
                                                    <span class="label label-info">Order Delivered</span>
                                                @elseif($order->status == 4)
                                                    <span class="label label-info">Completed</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><strong>Package Name</strong></td>
                                            <td>{{ $order->package->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Set Name</strong></td>
                                            <td>{{ $order->set->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Pax</strong></td>
                                            <td>{{ $order->pax }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Set Price</strong></td>
                                            <td>RM {{ $order->set_price }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Add-On Price</strong></td>
                                            <td>RM {{ $order->addon_price }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Transportation Price</strong></td>
                                            <td>RM {{ $order->transport_price }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>GST</strong></td>
                                            <td>RM {{ $order->gst_price }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Price</strong></td>
                                            <td>RM {{ $order->grand_price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br /><br />
                                <h5 style="text-decoration: underline;">Payment Details</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="30%"><strong>Payment Gateway</strong></td>
                                            <td>Billplz Sdn Bhd (FPX)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Payment Status</strong></td>
                                            <td>
                                                @if($order->billplz_status == 0)
                                                    <span class="label label-danger">UNPAID</span>
                                                @elseif($order->billplz_status == 1)
                                                    <span class="label label-success">PAID</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Payment Link</strong></td>
                                            <td><a target="_blank" href="{{ $order->billplz_url }}">{{ $order->billplz_url }}</a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Invoice</strong></td>
                                            <td><a href="{{ url('invoice/'.$order->hash_id) }}" target="_blank"><span class="label label-info">Download</span></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                <h5 style="text-decoration: underline;">Delivery Details</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="30%"><strong>Date</strong></td>
                                            <td>{{ $order->checkout_date }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Time</strong></td>
                                            <td>{{ $order->checkout_time }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td>
                                                {{ $order->checkout_delivery_address_1 }}<br />
                                                {{ $order->checkout_delivery_address_2 }}<br />
                                                {{ $order->checkout_delivery_postcode }}, {{ $order->checkout_delivery_city }}<br />
                                                {{ $order->checkout_delivery_state }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Extra Notes</strong></td>
                                            <td>{{ $order->checkout_note }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br /><br />
                                <h5 style="text-decoration: underline;">Courses Details</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Courses categories</th>
                                            <th>Courses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php

                                            $course_categories_array = explode(',',$order->courses_categories);
                                            $courses_array = explode(',',$order->courses);

                                            $course_categories = \App\CourseCategory::whereIn('id', $course_categories_array)
                                             ->get();


                                        @endphp

                                        @foreach($course_categories as $course_category)
                                            <tr>
                                                <td>{{ $course_category->name }}</td>
                                                <td>
                                                     <ul style="padding-left:0; ">@php

                                                        $courses = \App\Course::where('course_category_id',$course_category->id)->whereIn('id', $courses_array)->get();

                                                        @endphp
                                                        @foreach($courses as $course)
                                                            <li style="list-style-position:inside; color: #748182;">{{ $course->food->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br /><br />
                                <h5 style="text-decoration: underline;">Addon Details</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Addon Item</th>
                                            <th>Price Per (unit / Item / Set)</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    @php

                                        $addons_array = explode(',',$order->addon_id);
                                        $quantity_array = explode(',',$order->addon_quantity);
                                        $addons = \App\Food::whereIn('id', $addons_array)->get();

                                        $i = 0;
                                    

                                    @endphp
                                    <tbody>
                                        @foreach($addons as $addon)
                                        <tr>
                                            <td>{{ $addon->name }}</td>
                                            <td>RM {{ $addon->price }}</td>
                                            <td><i class="fas fa-times"></i> {{ $quantity_array[$i] }}</td>
                                            <td>RM {{ $addon->price * $quantity_array[$i] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('admin.layouts.footer')
    </body>
</html>