@extends('layouts.skeloper')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Items
            <small>Status</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Status Item</li>
          </ol>
        </section>

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
                      <th style="width: 300px">Item Name</th>
                      <th style="width: 10px">Stock</th>                      
                    </tr>
                  @foreach($listi as $key)
                   <div class="col-sm-1">
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$key->name}}</td>
                      <td>{{$key->stock}}</td>                                          
                    </tr>
                   </div>
                  @endforeach  
                  </table>
                </div><!-- /.box-body -->                
              </div><!-- /.box -->        


</div>


@endsection