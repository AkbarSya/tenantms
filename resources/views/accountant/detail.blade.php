 	@extends('layouts.skelaccount')
  	@section('content')
 		<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Invoice
            <small>#000{{$status->id}}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Invoice</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> PT Tahapan Maju Jaya
                <small class="pull-right">{{$status->date_order}}</small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Admin, PT Tahapan Maju Jaya</strong><br>
                Jl.Halim Perdana Kusuma<br>
                DKI Jakarta, Jakarta Timur. 13630<br>
                Phone: (021) 123-5432<br>
                Email: akbar.syabani@gmail.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong>{{$client->name}}</strong><br>
                {{$client->address}}<br>                
                Phone: {{$client->phone}}<br>
                Email: {{$client->email}}
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #000{{$status->id}}</b><br>
              <br>
              <b>Order ID:</b> {{$status->id}}<br>
              <b>Payment Due:</b> {{$status->date_order}}<br>
              <b>Account:</b> Admin
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Room</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$no++}}</td>
                    <td>Call of Duty</td>
                    <td>455-981-221</td>
                    <td>El snort testosterone trophy driving gloves handsome</td>
                    <td>$64.50</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Need for Speed IV</td>
                    <td>247-925-726</td>
                    <td>Wes Anderson umami biodiesel</td>
                    <td>$50.00</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Monsters DVD</td>
                    <td>735-845-642</td>
                    <td>Terry Richardson helvetica tousled street art master</td>
                    <td>$10.70</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Grown Ups Blue Ray</td>
                    <td>422-568-642</td>
                    <td>Tousled lomo letterpress</td>
                    <td>$25.99</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="../../dist/img/credit/visa.png" alt="Visa">
              <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
              <img src="../../dist/img/credit/american-express.png" alt="American Express">
              <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Amount Due 2/22/2014</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$265.24</td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->

      @endsection