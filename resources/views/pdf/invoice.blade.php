<!DOCTYPE html>
<html lang="en">
   	<head>
    	<title>Teaffani Catering | Invoice</title>
     	<meta charset="utf-8">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
     	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     	<style type="text/css">
     		
     		.header {
     			text-align: center;
     		}

     		.borderless tr td {
			    border: none !important;
			    padding: 0px !important;
			}

			.white {
				color: white;
			}

			.invoice-title h2, .invoice-title h3 {
			    display: inline-block;
			}

			.table > tbody > tr > .no-line {
			    border-top: none;
			}

			.table > thead > tr > .no-line {
			    border-bottom: none;
			}

			.table > tbody > tr > .thick-line {
			    border-top: 2px solid;
			}
			.red
			{
				color: red;
			}

			.green {
				color: green;
			}

     	</style>
   	</head>
   	<body>
    	<div class="container">
		    <div class="row">
		        <div class="col-xs-12">
		    		<div class="invoice-title">
		    			<h2>Invoice</h2><h3 class="pull-right">Order # {{ $order->hash_id }}</h3>
		    		</div>
		    		<hr />
		    	</div>
		    </div>

		    		<div class="row">
		    			<div class="col-xs-6">
		    				<address>
		    				<strong>Invoice To:</strong><br>
		    					{{ $order->user->name }}<br>
		    					{{ $order->user->phone }}<br />
		    					{{ $order->user->address1 }}<br />
		    					{{ $order->user->address2 }}<br />
		    					{{ $order->user->city }}, {{ $order->user->postcode }}<br />
		    					{{ $order->user->state }}
		    				</address>
		    			</div>
		    			<div class="col-xs-1">
		    			</div>
		    			<div class="col-xs-5">
		    				<address>
		    				<strong>Invoice From:</strong><br>
		    					Teaffani Catering Sdn Bhd<br>
		    					No. 8 Jalan Pelukis U1/46A<br />
		    					Temasya 18, Glenmarie,<br />
		    					Kawasan Perindustrian Temasya,<br />
		    					40150 Shah Alam, Selangor 
		    				</address>
		    			</div>
		    		</div>
		    		<div class="row">
		    			<div class="col-xs-6">
		    					<strong>Invoice Status:</strong><br>
		    					@if($order->billplz_status == 0)
		    						<span class="red">UNPAID</span>
		    					@else
		    						<span class="green">PAID</span>
		    					@endif
		    					<br><br>
		    					<strong>Order Date:</strong><br>
		    					{{ $order->created_at->format('M d, Y') }}<br><br>
		    			</div>
		    		</div>
		    
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="panel panel-default">
		    			<div class="panel-heading">
		    				<h3 class="panel-title"><strong>Order summary</strong></h3>
		    			</div>
		    			<div class="panel-body">
		    				<div class="table-responsive">
		    					<table class="table table-condensed">
		    						<thead>
		                                <tr>
		        							<td><strong>Item</strong></td>
		        							<td class="text-center"><strong>Quantity</strong></td>
		        							<td class="text-right"><strong>Totals</strong></td>
		                                </tr>
		    						</thead>
		    						<tbody>
		    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
		    							<tr>
		    								<td><strong>Package {{ $order->package->name }}</strong></td>
		    								<td class="text-center">&nbsp;</td>
		    								<td class="text-right">&nbsp;</td>
		    							</tr>
		    							<tr>
		    								<td>- Set {{ $order->set->name }}</td>
		    								<td class="text-center">{{ $order->pax }} PAX</td>
		    								<td class="text-right">RM {{ $order->set_price }}</td>
		    							</tr>
		    							<tr>
		    								<td>- Add On</td>
		    								<td class="text-center">-</td>
		    								<td class="text-right">RM {{ $order->addon_price }}</td>
		    							</tr>
		    							<tr>
		    								<td>- Transport</td>
		    								<td class="text-center">-</td>
		    								<td class="text-right">RM {{ $order->transport_price }}</td>
		    							</tr>
		    						</tbody>
		    					</table>
		    					<table class="table table-condensed">
		    						<tbody>
		    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
		    							
		    							<tr>
		    								<td class="thick-line"></td>
		    								<td class="thick-line text-right"><strong>Subtotal</strong></td>
		    								<td class="thick-line text-right">RM {{ $order->set_price + $order->addon_price + $order->transport_price}}</td>
		    							</tr>
		    							<tr>
		    								<td class="no-line"></td>
		    								<td class="no-line text-right"><strong>GST 6%</strong></td>
		    								<td class="no-line text-right">RM {{ $order->gst_price }}</td>
		    							</tr>
		    							<tr>
		    								<td class="no-line"></td>
		    								<td class="no-line text-right"><strong>Total</strong></td>
		    								<td class="no-line text-right">RM {{ $order->grand_price }}</td>
		    							</tr>
		    						</tbody>
		    					</table>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="well">
		    		<p>This invoice is computer ganerated, if you find mistake on this invoice please contact us at support@teaffani.com for more details</p>
		    	</div>
		    </div>
		</div>
   	</body>
</html>