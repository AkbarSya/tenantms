    @extends('layouts.skeladmin')
    @section('content')
    <title>Tenant MS | Input Company</title>    
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

                <form action="{{url('admin/input')}}" method="post">
                {!! csrf_field() !!}
                <div class="box-body">                  
                  <div class="form-group">
                    <label>Company Name :</label>
                    <input class="form-control" placeholder="Company Name :" name="name" class="{{ $errors->first('name') ? " invalid" : "" }}" id="name" data-success="complete" required value="{{$book->company_name}}">
                  </div>                                    
                  <div class="form-group">
                    <label>Company Address :</label>
                    <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter ..." required>{{$book->address}}</textarea>        
                  </div><!-- /.form group -->                  
                    <div class="form-group">
                      <input class="form-control" placeholder="Company Email :" name="email" class="{{ $errors->first('email') ? " invalid" : "" }}" id="email" data-success="complete" required value="{{$book->email}}">
                    </div>   
                    <!-- phone mask -->
                  <div class="form-group">
                    <label>Company Phone:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control" name="phone" id="phone" data-inputmask="'mask': ['(021)-9999-9999', '+99 999 9999-9999']" data-mask required value="{{$book->phone}}">
                    </div>
                  </div><!-- /.form group -->                                      
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Send</button>
                  </div>               
                  <a href="{{url('admin\home')}}" class="btn btn-warning">Discard</a>                    
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      @endsection