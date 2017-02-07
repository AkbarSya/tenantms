    @extends('layouts.skeladmin')
    @section('content')
    <title>Tenant MS | Input</title>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Room Status
            <small>Here</small>
          </h1>          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Input Room here</h3>
                </div><!-- /.box-header -->              
                <div class="box-body">
                @if(session('message'))
                <div class="row">            
                  <div class="box-body">
                    <div class="callout callout-danger">
                    <h4>{{ session('message') }}</h4>
                    </div>
                  </div>
                </div>
                @endif
                <form action="{{url('admin/room')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                  <div class="form-group">
                    <input class="form-control" name="room" placeholder="Room Name :">
                  </div>
                  <div class="form-group">
                    <label>Floor</label>
                    <select class="form-control" name="floor">
                        <option>1 - A</option>
                        <option>2 - B</option>
                        <option>3 - C</option>
                        <option>4 - D</option>
                        <option>5 - E</option>
                      </select>
                  </div>
                  <label>Price</label>
                  <input class="form-control" name="price_r" data-inputmask='"mask": "Rp.99.999.999"' data-mask></input>
                    <!-- radio -->
                    <label>Package</label>
                    @forelse($package as $ss)
                    <div class="form-group">
                      <div class="radio">
                        <label>                    
                          <input type="radio" name="package_id" id="optionsRadios1" value="{{$ss->id}}" required>
                          {{$ss->name}}
                        </label>
                      </div>
                    </div>    
                    @empty
                    <div>
                      <span class="label label-danger"> Package is Empty!</span><p> 
                    </div>
                    @endforelse
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" class="form-control" name="status" placeholder="READY" disabled>
                    </div>                                    
                </div><!-- /.box-body -->              
                  <div class="input-group margin">
                    <label>Review Image</label>
                    <div class="col-sm-12">
                      <input type="file" name="photo[]" accept="image/*" class="btn btn-primary" multiple required>
                    </div><!-- /btn-group -->                                          
                  </div><!-- /input-group -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Send</button>
                  </div>
                  <button class="btn label-warning"><i class="fa fa-times"></i> Discard</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    @endsection