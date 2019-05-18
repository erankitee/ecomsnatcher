@extends('includes.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 delivery_123" style="margin-bottom: 10px; margin-top: 10px;">
			<h1>Select a delivery address</h1>
		</div>
		<div class="col-md-6">
			<a 
				href="#myModal"
				class="btn btn-info pull-right addaddress" 
				data-toggle="modal"
				data-target="#myModal"
				style="border-radius: 7px; margin-top: 27px;">Add New Address
			</a>
		</div>
	</div>
	<div class="row ">
		<div class=" col-md-4 bg-light text-dark" >
			<div class="well">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of tcard'scontent.</p>
			<a href="#" class="btn btn-success btn-sm"style="border-radius: 7px;">Deliver to this address</a>
			<a href="#" class="btn btn-info btn-sm" style="border-radius: 7px;">Edit Address</a>
		</div>	
		</div>	
	</div>
</div>

@include('partials.modals.address')
@endsection