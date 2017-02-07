    @extends('layouts.skeloper')
    @section('content')
    <title>Tenant MS | Status Driver</title>    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Input Company
            <small>Here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Input</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Input Company here</h3>                  
                </div><!-- /.box-header -->              
                @if(count($errors) > 0)
                <div class="row">
                  <div class="col s12">
                    <div class="card red darken-1">
                      <div class="card-content white-text">
                        <span class="card-title">Error With Input</span>
                        @foreach($errors->all() as $error)
                          <ul>
                            <li>- {{$error}}</li>
                          </ul>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                @endif

                <form action="{{url('warehouse/package')}}" method="post">
                {!! csrf_field() !!}
                <div class="box-body">                                    
                  <div class="form-group">                      
                        <label>Package Name :</label>
                        <input class="form-control" placeholder="Package Name :" name="name" class="{{ $errors->first('name') ? " invalid" : "" }}" id="name" data-success="complete" required="">                     
                        <label> Price :</label>
                        <input class="form-control" name="price" data-inputmask='"mask": "Rp.9.999.999"' data-mask></input>

                        <label>Select Items</label><p></p>
                      @foreach($item as $key)                    
                      <div class="col-sm-2">
                      <p class="text-muted"><input type="checkbox" class="minimal" name="package_create[]" value="{{ $key->id }}">{{$key->name}}</input></p>
                      </div>                     
                      @endforeach
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Send</button>
                  </div>               
                  <a href="{{url('warehouse\status')}}" class="btn btn-warning"> <i class="fa fa-angle-double-left"></i> Back</a>                    
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      
      @endsection

