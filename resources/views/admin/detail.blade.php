@extends('layouts.skeladmin')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{ $status->room }}
            <small>Room</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Detail</li>
          </ol>
        </section>
        @if($status->company_id == 0)
       <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Status</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 300px">Object</th>
                      <th>Description</th>                      
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Room Name : </td>
                      <td>{{$status->room}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Floor Type : </td>
                      <td>{{$status->floor}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Status Room : </td>
                      <td>
                      @if($status->status=='READY')
                      <span class="label label-success">READY</span>
                      @elseif($status->status=='NOT READY')
                      <span class="label label-danger">NOT READY</span>
                      @elseif($status->status=='ON GOING')
                      <span class="label label-warning">ON GOING</span>
                      @endif
                      </td>                                                     
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Package Type : </td>
                      <td>{{$package->name}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Company Name : </td>
                      <td>No Name</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Date Order : </td>
                      <td>{{$status->date_order}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Expired Date : </td>
                      <td>{{$status->expired_date}}</td>                                          
                    </tr>                    
                  </table>
                </div><!-- /.box-body -->                
              </div><!-- /.box -->                    
            </section>
            @else
            
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Status</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 300px">Object</th>
                      <th>Description</th>                      
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Room Name : </td>
                      <td>{{$status->room}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Floor Type : </td>
                      <td>{{$status->floor}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Status Room : </td>
                      <td>
                      @if($status->status=='READY')
                      <span class="label label-success">READY</span>
                      @elseif($status->status=='NOT READY')
                      <span class="label label-danger">NOT READY</span>
                      @elseif($status->status=='ON GOING')
                      <span class="label label-warning">ON GOING</span>
                      @endif
                      </td>                                                     
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Package Type : </td>
                      <td>{{$package->name}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Company Name : </td>
                      <td>{{$client->name}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Date Order : </td>
                      <td>{{$status->date_order}}</td>                                          
                    </tr>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>Expired Date : </td>
                      <td>{{$status->expired_date}}</td>                                          
                    </tr>                    
                  </table>
                </div><!-- /.box-body -->                
              </div><!-- /.box -->                    
            </section>
            @endif


</div>


@endsection