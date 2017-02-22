 	@extends('layouts.skelaccount')
  	@section('content')
 		<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Invoice
            <small>#200{{$status->id}}</small>
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
            <?php
            ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tenant Name</th>
                    <th>Total</th>                    
                    
                  </tr>
                </thead>
                <tbody>
                @foreach($client as $key)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$key->name}}</td>
                    <td>Rp. {{number_format($total,0,",",",")}}</td>
                  </tr>                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>              
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Bank Transfer
              </p>
            </div><!-- /.col -->            
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="{{url('account/print/'.$order->id)}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              @if($pay->status == "Not Applied")
              <form action="{{url('/account/payment')}}" method="post">
              {!! csrf_field() !!}
              <input type="hidden" value="{{$status->id}}" name="id">
              <input type="hidden" value="{{$client->name}}" name="name">
              <input type="hidden" value="{{$client->email}}" name="email">
              <input type="hidden" value="{{$status->date_order}}" name="date">        
              <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>              
              </form>
              @endif
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->

      @endsection