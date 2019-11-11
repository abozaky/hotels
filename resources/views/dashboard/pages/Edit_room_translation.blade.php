@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Edit Room    
      <small>  
        <!-- session to display message from AllusersController -->
        @if (Session('success'))

          <h3 class="label label-success " role="alert">
           {{ Session('success') }}
          </h3>

        @endif  
    </small>
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
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
        {{-- form start --}}
        
          <ul class="nav nav-tabs" id="myForm">
            @foreach ($RoomTranslation as $RoomT )
              <li class="{{ $RoomT->locale == 'En' ? 'active' : '' }}"><a href="#{{$RoomT->locale}}">{{$RoomT->locale}} Translation</a></li> 
              @endforeach
          </ul>
          <form action="{{ route('Rooms.update',['id'=> $RoomT->room_id]) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <div class="edit" style="margin:13px; margin-bottom:0px" >
                <div class=" form-group">
                <label for="exampleInputEmail1">Room Number</label>
                <input type="number" class="form-control" value="{{$Room->room_number}}" name="room_number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Room Number">
                </div>
              </div>
              <div class="tab-content">
                 @foreach ($RoomTranslation as $RoomT )
                  <div class="tab-pane {{ $RoomT->locale == 'En' ? 'active' : '' }}" id="{{$RoomT->locale}}">
                      
                      <div class="form-group">
                          <label for="exampleInputEmail1">locale {{$RoomT->locale}}</label>
                          <input type="text" class="form-control" value="{{$RoomT->locale}}"  name="locale={{$RoomT->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Room Information {{$RoomT->locale}}</label>
                        <input type="text" class="form-control" value="{{$RoomT->name}}" name="name={{$RoomT->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like: (standard double classic room king beds)">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Room options {{$RoomT->locale}}</label>
                        <input type="text" class="form-control" value="{{$RoomT->options}}" name="options={{$RoomT->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like: (Room Only or Breakfast)">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cancellation Policy {{$RoomT->locale}}</label>
                        <input type="text" class="form-control" value="{{$RoomT->cancelation_details}}" name="cancelation_details={{$RoomT->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like: (From Date 2019-10-11 Non Refundable)">
                      </div> 
                        <button type="submit" class="btn btn-primary {{ $RoomT->locale == 'En' ? '' : 'hide' }} ">Submit</button>      
                  </div>        
                 @endforeach
              </div>
          </form>
        {{--/.form  --}} 
        </div>
    </div>
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection