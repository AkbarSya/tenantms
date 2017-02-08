    @extends('layouts.skelaccount')
    @section('content')
    <title>Tenant MS | Payment Status</title>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Payment Status
            <small>preview of Payment Status</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Status</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">            
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Payment Today</h3>                  
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Client Name</th>
                      <th>Code Payment</th>
                      <th>Total Payment</th>                      
                      <th>Status</th>
                    </tr>
                    @foreach($pay as $key)
                    <?php
                    $client = \App\Client::where('id',$key->client_id)->first();
                    ?>
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $client->name}}</td>
                      <td>{{ $key->pay_code }}</td>
                      <td>{{ $key->status}}</td>                      
                      <td><a href="detail/{{$key->id}}">See Me</a></td>                      
                    </tr>
                    @endforeach
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    @endsection