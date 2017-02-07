    @extends('layouts.skeladmin')
    @section('content')
    <title>Tenant MS | Status Driver</title>    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Input Order
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
                  <h3 class="box-title">Input Order here</h3>
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
                        <!-- dimananya mau ditambahin || liatin gue dulu -->
                      </div>
                    </div>
                  </div>
                </div>
                @endif

                <form action="{{url('admin/inputs')}}" method="post">
                <?php
                  $book = \App\Book::orderBy('id','desc')->first();
                  $r_name = \App\Order::where('id',$book->room_id)->first();
                ?>
                {!! csrf_field() !!}
                <div class="box-body">                  
                  <div class="form-group">
                  
                    <label>Company Name :</label>                    
                    <div class="form-group">
                      <input class="form-control" name="company_id" class="{{ $errors->first('company_id') ? " invalid" : "" }}" id="company_id" data-success="complete" value="{{$client->name}}" disabled="">
                    </div>   
                    <div class="form-group">
                      <input class="form-control" name="company" class="{{ $errors->first('company') ? " invalid" : "" }}" id="company" data-success="complete" value="{{$client->id}}" type="hidden">
                    </div>

                    <label>Room Name :</label>
                    <select class="form-control" name="room">
                    @if(count($book->id)!=0) 
                         <option value="{{$book->room_id}}">{{$r_name->room}}</option>      
                    @else
                    @foreach($room as $room)                    
                         <option value="{{$room->id}}">{{$room->room}}</option>                                                                
                    @endforeach
                    @endif
                  </select>                  
                  </div>   
                  <!-- Date and time range -->
                  <div class="form-group">
                    <label>Duration :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="duration" placeholder=" Years" value="{{$book->date_expired}}">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                                                                                         
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Send</button>
                  </div>               
                  <a href="{{url('home')}}" class="btn btn-warning">Discard</a>                    
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      @endsection