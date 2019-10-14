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
            @foreach ($languages as $language )
              <li class="{{ $language->name == 'En' ? 'active' : '' }}"><a href="#{{$language->name}}">{{$language->title}} Translation</a></li> 
              @endforeach
          </ul>
          <form action="{{ route('Add_New_Hotel.store') }}" method="post" enctype="multipart/form-data">
            @csrf
               <div class="edit" style="margin:13px; margin-bottom:0px" >
                    <label for="countries">Select Country </label>
                    <select class="form-control" name="country_id" id="countries">
                      <option value="">Please Choose Hotel Country</option>
                      @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_enName}} -{{ $country->country_arName }}</option>
                      @endforeach  
                    </select>
               </div>
               <div class="edit cities" style="margin:13px; margin-bottom:0px" >
                  {{-- this select return from ajax  --}}
               </div>
               <div class="edit" style="margin:13px; margin-bottom:0px" >
                    <label for="exampleFormControlSelect1">Select Stars </label>
                    <select class="form-control" name="stars" id="exampleFormControlSelect1">
                      <option value="1">&#9733 </option>
                      <option value="2">&#9733 &#9733 </option>
                      <option value="3">&#9733 &#9733 &#9733 </option>
                      <option value="4">&#9733 &#9733 &#9733 &#9733</option>
                      <option value="5">&#9733 &#9733 &#9733 &#9733 &#9733</option>
                    </select>
                    @error('stars')
                    <label class="text-danger"> {{ $message }}</label>
                    @enderror
                </div>

                <div class="custom-file" style="margin:13px; margin-bottom:0px">
                    <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                     <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="images[]" multiple>
                </div>

              <div class="tab-content">
                 @foreach ($languages as $language )
                  <div class="tab-pane {{ $language->name == 'En' ? 'active' : '' }}" id="{{$language->name}}">
                      
                      <div class="form-group">
                          <label for="exampleInputEmail1">locale {{$language->name}}</label>
                          <input type="text" class="form-control" value="{{$language->name}}"  name="locale={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                      </div> 
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Hotel name {{$language->name}}</label>
                        <input type="text" class="form-control" name="hotel_Name={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Hotel Name">
                      </div> 

                      <div class="form-group">
                          <label for="exampleInputEmail1">description {{$language->name}}</label>
                          <textarea class="summernote"  name="description={{$language->name}}" ></textarea>
                      </div> 
                      
                      <div class="form-group">
                          <label for="exampleInputEmail1">address {{$language->name}}</label>
                          <input type="text" class="form-control" name="address={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter hotel address">                         
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