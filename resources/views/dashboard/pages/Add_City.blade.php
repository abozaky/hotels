@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Add New City   
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
                @isset($city)
                  <form action="{{ route('cities.update',['id'=>$city->id]) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                      <div class="edit" style="margin:13px; margin-bottom:0px" >
                        <div class=" form-group">
                        <label for="exampleInputEmail1">City English Name </label>
                          <input type="text" class="form-control" value="{{$city->city_enName}}" name="city_enName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like ( Cairo ) ">
                        </div>
                        <div class=" form-group">
                          <label for="exampleInputEmail1">City Arabic Name</label>
                          <input type="text" class="form-control" value="{{$city->city_arName}}" name="city_arName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like ( القاهره ) ">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>      
                      </div>
                  </form>
                @else 
                  <form action="{{ route('cities.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="edit" style="margin:13px; margin-bottom:0px" >
                        <div class=" form-group">
                        <label for="exampleInputEmail1">City English Name </label>
                          <input type="text" class="form-control" name="city_enName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like ( Cairo ) ">
                        </div>
                        <div class=" form-group">
                          <label for="exampleInputEmail1">City Arabic Name</label>
                          <input type="text" class="form-control" name="city_arName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="like ( القاهره ) ">
                        <input type="hidden" class="form-control" name="country_id" value="{{$id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>      
                      </div>
                  </form>
                @endisset   
            </div>
      </div>
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection