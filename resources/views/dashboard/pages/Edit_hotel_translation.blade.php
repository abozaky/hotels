@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
          <a class="btn btn-danger" href="{{route('photos.show',['id'=> $Hotels['id']]) }}">Go to Edit Hotle Photos</a>   
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
            @foreach ($HotelTranslation as $Hotel )
            <li class="{{ $Hotel->locale == 'En' ? 'active' : '' }}"><a href="#{{$Hotel->locale}}">{{$Hotel->locale}} Translation</a></li> 
            @endforeach
        </ul>
        <form action="{{ route('hotels.update',['id'=> $Hotel['hotel_id']]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="edit" style="margin:13px; margin-bottom:0px" >
                <label for="countries">Select Country </label>
                <select class="form-control" name="country_id" >
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{ ($country->id ==  $Hotels->country_id) ? 'selected' : ''  }}>{{$country->country_enName}} -{{ $country->country_arName }}</option>
                    @endforeach  
                </select>
              </div>
            <div class="edit" style="margin:13px; margin-bottom:0px" >
                <label for="countries">Select City </label>
                <select class="form-control" name="city_id">
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}" {{ ($city->id ==  $Hotels->city_id) ? 'selected' : ''  }}>{{$city->city_enName}} -{{ $city->city_arName }}</option>
                    @endforeach  
                </select>
              </div>
           
            <div class="edit" style="margin:13px; margin-bottom:0px" >
                <label for="exampleFormControlSelect1">Select Stars </label>
                <select class="form-control" name="stars" id="exampleFormControlSelect1">
                    <option value="1" {{ ($Hotels->stars ==  1) ? 'selected' : ''  }}>&#9733 </option>
                    <option value="2" {{ ($Hotels->stars ==  2) ? 'selected' : ''  }} >&#9733 &#9733 </option>
                    <option value="3" {{ ($Hotels->stars ==  3) ? 'selected' : ''  }} >&#9733 &#9733 &#9733 </option>
                    <option value="4" {{ ($Hotels->stars ==  4) ? 'selected' : ''  }} >&#9733 &#9733 &#9733 &#9733</option>
                    <option value="5" {{ ($Hotels->stars ==  5) ? 'selected' : ''  }} >&#9733 &#9733 &#9733 &#9733 &#9733</option>
                </select>
            </div>
            <div class="tab-content">
              @foreach ( $HotelTranslation as $Hotel )
                <div class="tab-pane {{ $Hotel->locale == 'En' ? 'active' : '' }}" id="{{$Hotel->locale}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">locale {{$Hotel->locale}}</label>
                        <input type="text" class="form-control" value="{{$Hotel->locale}}"  name="locale={{$Hotel->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Hotel name {{$Hotel->locale}}</label>
                      <input type="text" class="form-control" value="{{$Hotel->name}}" name="hotel_Name={{$Hotel->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Hotel Name">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">description {{$Hotel->locale}}</label>
                        <textarea class="summernote"  name="description={{$Hotel->locale}}" >{{$Hotel->description}}</textarea>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">address {{$Hotel->locale}}</label>
                        <input type="text" class="form-control" value="{{$Hotel->address}}" name="address={{$Hotel->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter hotel address">                         
                    </div> 
                      <button type="submit" class="btn btn-primary {{ $Hotel->locale == 'En' ? '' : 'hide' }} ">Submit</button>      
                  </div>        
                @endforeach
            </div>
          </form>
        </div>
    </div>
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection