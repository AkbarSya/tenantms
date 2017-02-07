    @extends('layouts.skeloper')
    @section('content')
    <title>Tenant MS | Status Driver</title>    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Input Items
            <small>Here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Input</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          @if(session('message'))
          <div class="row">            
            <div class="box-body">
                <div class="callout callout-danger">
                    <h4>{{ session('message') }}</h4>
                </div>
            </div>
          </div>
          @endif
          <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Input Items here</h3>
                  <div class="pull-right">
                    <a href="javascript:void(0)" id="btn-add"><i class="fa fa-plus-square-o"></i> Add</a>
                  </div>
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

                <form action="{{url('warehouse/create')}}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="count_item" value="3" class="count_item"></input>
                <div class="box-body">                  
                  @for($a=1;$a<=3;$a++)
                  <div class="form-group" id="form-group-{{ $a }}">
                      <div class="col-sm-10">
                        <label>Item Name :</label>
                        <input class="form-control" placeholder="Item Name :" name="name-{{ $a }}" class="{{ $errors->first('name') ? " invalid" : "" }}" id="name-{{ $a }}" data-success="complete">
                      </div>
                      <div class="col-sm-2">
                        <label>Stock :</label>
                        <input class="form-control" name="stock-{{ $a }}" placeholder=" Pcs">
                      </div>
                  </div>
                  @endfor                                       
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Send</button>
                  </div>               
                  <a href="{{url('warehouse\status')}}" class="btn btn-warning">Back</a>                    
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      
      @endsection

