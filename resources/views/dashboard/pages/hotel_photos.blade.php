@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Hotel Photos  
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
            <form action="{{ route('photos.update',['id'=> $Hotels['id']]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="custom-file" style="margin-bottom:13px">
                    <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="images[]" multiple>
                    <input type="hidden" value="{{$Hotels->photos}}" name="old_photos">
                </div>
                <button type="submit" class="btn btn-primary ">Upload Photos</button>      
            </form>
        </div> 
        <div class="col-xs-12">
            <div class="edit" style="margin-top:13px; ">
                     @php  $dd = json_decode($Hotels->photos) ; @endphp 
                <div class="row">
                    @if($dd != null)
                        @foreach ($dd as $images)     
                        <div class="col-lg-2 col-md-4 col-xs-12">
                            <div class="card" style="width: 18rem; margin-bottom:13px">
                                <img src="{{  asset('hotel_Images/' . $images) }}"  alt="..." height="100">
                                <div class="card-body" style="margin-top:13px;">
                                    <a href="{{route('Delete_Photos',['id'=> $Hotels['id'] ,'imagename'=>  $images  ])}}" class="btn-sm btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h2>Not Found Images</h2>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection