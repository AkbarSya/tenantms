    <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TenantMS | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/dist/css/AdminLTE.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
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
            <?php
            $room = $order->price;
            $pack = $package->price;
            $sum = $room + $pack;
            $tax = $sum /10;
            $total = $sum + $tax;
            ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>                    
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$order->room}}</td>
                    <td>Rp. {{number_format($order->price,0,",",",")}}</td>                                        
                  </tr>
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$package->name}}</td>
                    <td>Rp. {{number_format($package->price,0,",",",")}}</td>                    
                  </tr>
                  <tr>
                    <td>{{$no++}}</td>
                    <td>Tax (10%)</td>
                    <td>Rp. {{number_format($tax,0,",",",")}}</td>                    
                  </tr>
                  <tr>
                    <td>{{$no++}}</td>
                    <td>Total</td>
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
        </section><!-- /.content -->         
        </body>

        <!-- AdminLTE App -->
    <script src="{{url('/dist/js/app.min.js')}}"></script>