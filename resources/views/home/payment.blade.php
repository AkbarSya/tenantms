<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TenantMS | Payment Form</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="/" class="navbar-brand"><b>Tenant</b>MS</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->        
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Payment Proccess
              <small>PT Example 2.0</small>
            </h1>            
          </section>

          <!-- Main content -->
          <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="row">                                
                  </div>
                <form action="{{url('payment')}}" method="post" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="col-sm-12">
                  <div class="col-sm-2">
                  <label>Code Payment</label>
                  <input type="text" class="form-control" name="code" placeholder="Code">
                  </div>       
                  </div>                       
                  <div class="form-group">
                    <label>Company Name</label>
                    <input class="form-control" name="company" placeholder="Company Name :"  value="{{$client->name}}">
                  </div>                                    
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control"  value="{{$client->email}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" name="phone" class="form-control"  value="{{$client->phone}}">
                    </div>
                  </div>
                    <div class="form-group">
                    <div class="col-xs-12">
                      <p class="lead">Payment Detail</p>
                      <div class="table-responsive">
                        <table class="table">
                        <?php
                        $total = $order->price + $package->price;
                        $prnt = $total/10;
                        $max = $prnt + $total
                        
                        ?>
                          <input type="hidden" name="total" value="{{$max}}">
                          <tr>
                            <th style="width:50%">Room Price</th>
                            <td>Rp {{number_format($order->price,0,",",",")}}</td>
                          </tr>
                          <tr>
                            <th>Package Price</th>
                            <td>Rp {{number_format($package->price,0,",",",")}}</td>
                          </tr>
                          <tr>
                            <th>Tax (10%)</th>
                            <td>Rp {{number_format($prnt,0,",",",")}}</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td>Rp {{number_format($max,0,",",",")}}</td>
                          </tr>
                        </table>
                      </div>
                    </div><!-- /.col -->
                    </div>                                                  
                </div><!-- /.box-body -->              
                  <div class="input-group margin">
                    <label>Evidence of Transfer</label>
                    <div class="col-sm-12">
                      <input type="file" name="photo" class="btn btn-primary" required>
                    </div><!-- /btn-group -->                                          
                  </div><!-- /input-group -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Send</button>
                  </div>
                  <button class="btn label-warning"><i class="fa fa-times"></i> Discard</button>
                </div><!-- /.box-footer -->
                  
                </form>
                </div>
              </div>
            </div>
          </div>

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
  </body>
</html>
