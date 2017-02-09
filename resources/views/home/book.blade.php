 @extends('layouts.skelhome')
 @section('content')
<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="Creative One Page Parallax Template">
	<meta name="keywords" content="Creative, Onepage, Parallax, HTML5, Bootstrap, Popular, custom, personal, portfolio" /> 
	<meta name="author" content=""> 
	<title>Detail Room - Tenant Management System</title> 
	<link href="{{url('home/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('home/css/prettyPhoto.css')}}" rel="stylesheet"> 
	<link href="{{url('home/css/font-awesome.min.css')}}" rel="stylesheet"> 
	<link href="{{url('home/css/animate.css')}}" rel="stylesheet"> 
	<link href="{{url('home/css/main.css')}}" rel="stylesheet">
	<link href="{{url('home/css/responsive.css')}}" rel="stylesheet"> 
	<!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 
	<script src="js/respond.min.js"></script> <![endif]--> 
	<link rel="shortcut icon" href="{{url('home/images/ico/favicon.png')}}"> 
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('home/images/ico/apple-touch-icon-144-precomposed.png')}}"> 
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('images/ico/apple-touch-icon-114-precomposed.png')}}"> 
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('images/ico/apple-touch-icon-72-precomposed.png')}}"> 
	<link rel="apple-touch-icon-precomposed" href="{{url('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->
<body>
	<div class="preloader">
		<div class="preloder-wrap">
			<div class="preloder-inner"> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div>
			</div>
		</div>
	</div><!--/.preloader-->
	<header id="navigation"> 
		<div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
			<div class="container"> 
				<div class="navbar-header"> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
					</button> 
					<a class="navbar-brand" href="/"><h1><img src="{{url('images/logo.png')}}" style="max-width: 100px" alt="logo"></h1></a> 
				</div> 
				<div class="collapse navbar-collapse"> 
					<ul class="nav navbar-nav navbar-right"> 
						<li class="scroll active"><a href="#navigation">Home</a></li> 
						<li class="scroll"><a href="#about-us">About Room</a></li> 
						<li class="scroll"><a href="#services">Booked Room</a></li> 
						<li class="scroll"><a href="#our-team">Book Your Room</a></li>
					</ul> 
				</div> 
			</div> 
		</div><!--/navbar--> 
	</header> <!--/#navigation--> 
	<section id="home">   
		<div class="home-pattern"></div>
		<div id="main-carousel" class="carousel slide" data-ride="carousel"> 
			<ol class="carousel-indicators">
				<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
				<li data-target="#main-carousel" data-slide-to="2"></li>
			</ol><!--/.carousel-indicators--> 
			<div class="carousel-inner">
				@foreach($image as $img)
				@if($loop->first)
				<div class="item active" style="background-image: url({{url('file/photo/'.$img->filename)}})">
				@else
				<div class="item" style="background-image: url({{url('file/photo/'.$img->filename)}})">
				@endif
					<div class="carousel-caption"> 
						<div> 
							<h2 class="heading animated bounceInDown" style="color: #3c8dbc">TENANT </h2> <h2 class="heading animated bounceInDown"> It's Our Work</h2>
							<p class="animated bounceInUp">Fully Professional tenant management system</p> 
						</div> 
					</div> 
				</div>
				@endforeach 
		</div><!--/.carousel-inner-->

		<a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		<a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
	</div> 
</section><!--/#home-->

<section id="about-us">
	<div class="container">
		<div class="text-center">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="title-one">About Room</h2>					
				<p>With This Room, You can make your own room!!!</p>
			</div>
		</div>
		<div class="about-us">
			<div class="row">
				<div class="col-sm-6">
					<h3>Detail Room</h3>
					<p>Security Safe!</p> 
					<p>
				</div>
				<div class="col-sm-6">
					<p>
					<h3>Price Per Year:</h3>
					<p> Rp. {{number_format($detail->price,0,",",",")}}</p>
					</p>
					<h3>Package Type :</h3>
					<p>Name  : {{$package->name}}</p>
					<p>Price : Rp. {{number_format($package->price,0,",",",")}}</p>
					<h3>Detail Item :</h3>					
					@foreach($p_item as $p_item_val)
					<?php
					$item = App\Item::find($p_item_val->item_id);
					?>
					<p>- {{ $item->name }}</p>				
					@endforeach
				</div>
			</div>
		</div>
	</div>
		</div>
	</section><!--/#about-us-->

	<section id="services" class="parallax-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Booked Table</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
					<div class="box-body">
						<table id="example2" class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Company Name</th>
									<th>Status</th>
									<th>Email</th>
									<th>Date Order</th>
									<th>Expery Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$client = App\Client::where('id',$detail->company_id)->get();
									$no = 1;
								?>
								@foreach($client as $client)
								<tr>
								<td>{{$no++}}</td>
								<td>{{$client->name}}</td>
								<td>{{$detail->status}}</td>
								<td>{{$client->email}}</td>
								<td>{{$detail->date_order}}</td>
								<td>{{$detail->expired_date}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>						
					</div>
				</div>
			</div>			
			</div>
		</section><!--/#service-->

		<section id="our-team">
			<div class="container">
				<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Book The Room!</h2>
					<div class="box box-primary">
					<div class="box-header with-border" style="display: none">
						<h3 class="box-title">asdkl</h3>
					</div>
					<div class="box-body">
					<form id="contact-form" class="contact" method="post" action="{{url('/book')}}">
					{!! csrf_field() !!}
					<input type="hidden" name="room_id" value="{{$detail->id}}">
					<div class="form-group">
						<input type="text" name="company_name" class="form-control name-field" required="required" placeholder="Company Name"></div>
					<div class="form-group">
						<input type="email" name="email" class="form-control mail-field" required="required" placeholder="Company Email">
					</div> 
					<div class="form-group">
						<input type="text" name="leader_name" class="form-control name-field" required="required" placeholder="Leader Name">
					</div>
					<div class="form-group">
						<input type="text" name="leader_email" class="form-control mail-field" required="required" placeholder="Leader Email">
					</div>
					<div class="form-group">
					<textarea name="address" id="address" required="required" class="form-control" rows="8" placeholder="Company Address"></textarea>
					</div> 
					<div class="form-group">
						<input type="text" name="phone" required="required" placeholder="Phone Number" class="form-control" data-inputmask="'mask': '(021)999-999-99'" data-mask>
					</div>
					<div class="form-group">
					<div class="col-sm-6">
						<label>Date Order</label>
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						<input type="text" class="form-control" name="date_order" placeholder="dd/mm/yyyy" required="required" data-inputmask="'alias' : 
						'dd/mm/yyyy'" data-mask>
						</div>
					</div>
					<div class="form-group">
						<label>Estimate Time</label>
						<input type="text" class="form-control mail-field" name="date_expired" placeholder="Years" data-inputmask="'mask': '_ Year(s)'" required="required" data-mask>
					</div>
					</div>
					<div class="form-group">
 					<button type="submit" class="btn btn-primary">Book Now!</button>
					</div>
					</form>
					</div>
					</div>
					</div>
				</div>
		</section><!--/#Our-Team-->							
	<footer id="footer"> 
		<div class="container"> 
			<div class="text-center"> 
				<p>Copyright &copy; 2014 - <a href="http://mostafiz.me/">Mostafiz</a> | All Rights Reserved</p> 
			</div> 
		</div> 
	</footer> <!--/#footer--> 

	<script type="text/javascript" src="{{url('home/js/jquery.js')}}"></script> 
	<script type="text/javascript" src="{{url('home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{url('home/js/smoothscroll.js')}}"></script> 
	<script type="text/javascript" src="{{url('home/js/jquery.isotope.min.js')}}"></script>
	<script type="text/javascript" src="{{url('home/js/jquery.prettyPhoto.js')}}"></script> 
	<script type="text/javascript" src="{{url('home/js/jquery.parallax.js')}}"></script> 
	<script type="text/javascript" src="{{url('home/js/main.js')}}"></script> 
</body>
</html>
@endsection