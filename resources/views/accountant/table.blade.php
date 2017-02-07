    @extends('layouts.skelaccount')
    @section('content')
    <title>Tenant MS | Room Status</title>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Room Status
            <small>preview of Room Status</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Simple</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">          
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Status Today</h3>                  
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Room</th>
                      <th>Floor</th>
                      <th>Status</th>                      
                      <th>Process It!</th>
                    </tr>
                    @foreach($list as $key)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $key->room}}</td>
                      <td>{{ $key->floor }}</td>
                      <td> 
                      @if($key->status=='READY')
                      <span class="label label-success">READY</span>
                      @elseif($key->status=='NOT READY')
                      <span class="label label-danger">NOT READY</span>
                      @elseif($key->status=='ON GOING')
                      <span class="label label-warning">ON GOING</span>
                      @endif
                      </td>
                      <td><a href="detail/{{$key->id}}">Go!</a></td>                      
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