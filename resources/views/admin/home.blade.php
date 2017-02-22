    @extends('layouts.skeladmin')
    @section('content')
    
    <title>Tenant MS | Home</title>
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <section class="content-header">
          <h1>
            Admin Notification
            <small>here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>
        <section class="content">        
          <!-- row -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                        <?php
                        $waktu = \Carbon::now();

                        echo Carbon::createFromFormat('Y-m-d H:i:s',$waktu)->format('d M y');

                        ?>
                  </span>
                </li>
                @foreach($book as $key)
                <li>
                  <i class="fa fa-edit bg-green"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{Carbon::createFromFormat('Y-m-d H:i:s',$key->created_at)->format('H:i ( d M y )')}}</span>
                    <h3 class="timeline-header"><a href="#">{{$key->company_name}}</a> Have Been Book<small></small></h3>
                    <div class="timeline-body">
                     <p>Leader Name :{{$key->leader_name}}</p>
                     <p>Estimate Time :{{Carbon::createFromFormat('Y-m-d H:i:s',$key->created_at)->format('  d M Y ')}}</p>
                    </div>
                    <div class="timeline-footer">
                      <div class="col-sm-1">
                      <form action="{{url('admin/del/'.$key->id)}}" method="post">
                        {!!csrf_field()!!}
                       <button type="submit" class="btn btn-danger btn-sm">Delete
                        
                      </form>
                      
                    </div>
                    <div class="timeline-footer">
                      <a href="input/{{$key->id}}" class="btn btn-primary btn-sm">Confirm</a>
                    </div>
                    </div>
                  </div>
                </li>
                @endforeach            
                <!-- /.timeline-label -->              
                <!-- timeline item -->
                @foreach($email as $key)
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{Carbon::createFromFormat('Y-m-d H:i:s',$key->created_at)->format('H:i ( d M y )')}}</span>
                    <h3 class="timeline-header"><a href="#">Admin</a> send an email to {{$key->receiver_name}} <small> < {{$key->receiver}} ></small></h3>
                    <div class="timeline-body">
                     {{$key->subject}}                      
                    </div>
                    <div class="timeline-footer">
                      <a href="read-mail/{{$key->id}}" class="btn btn-primary btn-sm">Read more</a>
                    </div>
                  </div>
                </li>
                @endforeach                               
                @foreach($input as $key)
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{Carbon::createFromFormat('Y-m-d H:i:s',$key->created_at)->format('H:i ( d M y )')}}</span>
                    <h3 class="timeline-header"><a href="#">Admin</a> Order to {{$key->company_id}} <small> Date Expired at< {{$key->expired_date}} ></small></h3>
                    <div class="timeline-body">
                     {{$key->subject}}                      
                    </div>
                    <div class="timeline-footer">
                      <a href="detail/{{$key->id}}" class="btn btn-primary btn-sm">Read more</a>
                    </div>
                  </div>
                </li>
                @endforeach            
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li> 
                <!-- END timeline item -->
                <!-- timeline item -->
         </section>
@endsection            