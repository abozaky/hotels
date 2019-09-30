@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Add New Hotel    
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
                    <label for="exampleFormControlSelect1">Select Country </label>
                    
                    <select class="form-control" name="country_id" id="exampleFormControlSelect1">
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{ ($country->id ==  $Hotels->country_id) ? 'selected' : ''  }}>{{$country->country_enName}} -{{ $country->country_arName }}</option>
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
                {{-- <img src="{{  asset('hotel_Images/' . '1569870887.Chrysanthemum.jpg') }}" class="img-thumbnail" style="max-height: 13rem; width: 100%; min-height: 13rem; "> --}}
                {{-- {{dd($Hotels->photos)}} --}}
                {{-- {{ json_decode($Hotels->photos) }} --}}
         
                <div class="custom-file" style="margin:13px; margin-bottom:0px">
                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        <a href="{{  asset('hotel_Images/' . '1569870887.Chrysanthemum.jpg') }}">Show Images</a>
                     <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="images[]" multiple>
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
                          <input type="text" class="form-control" value="{{$Hotel->description}}" name="description={{$Hotel->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter hotel description">
                      </div> 
                      
                      <div class="form-group">
                          <label for="exampleInputEmail1">address {{$Hotel->address}}</label>
                          <input type="text" class="form-control" value="{{$Hotel->address}}" name="address={{$Hotel->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter hotel address">                         
                      </div> 

                        <button type="submit" class="btn btn-primary {{ $Hotel->locale == 'En' ? '' : 'hide' }} ">Submit</button>      
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