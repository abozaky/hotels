@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Add New Room    
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
            @foreach ($languages as $language )
              <li class="{{ $language->name == 'En' ? 'active' : '' }}"><a href="#{{$language->name}}">{{$language->title}} Translation</a></li> 
              @endforeach
          </ul>
          <form action="{{ route('Rooms.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="edit" style="margin:13px; margin-bottom:0px" >
                  <div class=" form-group">
                    <label for="exampleInputEmail1">Room Number</label>
                    <input type="number" class="form-control" name="room_number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Room Number">
                    <input type="hidden" class="form-control" name="hotel_id" value="{{$hotelID}}">
                  </div>
                </div>
                <div class="edit" style="margin:13px; margin-bottom:0px" >
                  <label for="countries">Select Bed </label>
                  <select class="form-control" name="bed">
                    <option value="single">single</option>
                    <option value="double">double</option>
                    <option value="triple">triple</option>
                  </select>
              </div>
                <div class="edit" style="margin:13px; margin-bottom:0px" >
                  <label for="countries">Select Room Type </label>
                  <select class="form-control" name="room_type">
                    <option value="standar">standar</option>
                    <option value="delux">delux</option>
                  </select>
              </div>
              <div class="tab-content">
                 @foreach ($languages as $language )
                  <div class="tab-pane {{ $language->name == 'En' ? 'active' : '' }}" id="{{$language->name}}">
                      
                      <div class="form-group">
                          <label for="exampleInputEmail1">locale {{$language->name}}</label>
                          <input type="text" class="form-control" value="{{$language->name}}"  name="locale={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Room Information {{$language->name}}</label>
                        <input type="text" class="form-control" name="name={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like: (standard double classic room king beds)">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Room options {{$language->name}}</label>
                        <input type="text" class="form-control" name="options={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like: (Room Only or Breakfast)">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cancellation Policy {{$language->name}}</label>
                        <input type="text" class="form-control" name="cancelation_details={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like: (From Date 2019-10-11 Non Refundable)">
                      </div> 
                        <button type="submit" class="btn btn-primary {{ $language->name == 'En' ? '' : 'hide' }} ">Submit</button>      
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