@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
    Add New Price 
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
        </div>
    </div>
    <form action="{{ route('pricing_list.store') }}" method="post" enctype="multipart/form-data" >
             @csrf
        <div class="form-row" id="formulario">
            <div class="form-group col-md-6">
                <label>Date From:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                        <input type="text" class="form-control pull-right datepicker" name="date_from">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Date To:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                        <input type="text" class="form-control pull-right datepicker" name="date_to">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="Rooms">Select User Type</label>
                <select class="form-control" name="user_type">
                    <option value="guest">guest</option>
                    <option value="trader">trader</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Price night adult</label>
                    <input type="number" class="form-control" name="price_adult" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price adult">
            </div>
            <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Price night child</label>
                    <input type="number" class="form-control" name="price_child" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price Child">
            </div>
            <div class="form-group col-md-2" >
                <label >Nationality</label>
                <input type="text" class="form-control" name="nationality[]"  placeholder="Enter nationality"> 
                <input type="button" value="+" onClick="addInput();">
            </div>
        </div>
            <div class="form-group col-md-12">
            <input type="hidden" class="form-control" name="room_id" value="{{$RoomID}}"> 
                <button type="submit" class=" btn btn-primary">Submit</button>   
            </div>   
    </form>
  </section>
</div>
@endsection