@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     All Hotels    
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
        <div class="box">  
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
              </tr>

              @foreach ($HotelTranslation as $Hotels )
                <tr>
                  <td>{{$Hotels->id}}</td>
                  <td>{{$Hotels->name}}</td>
                  <td>{{$Hotels->address}}</td>
                  <td class="text-center">
                      <a class="btn btn-primary" href="{{ route('hotels.edit',['hotelID'=> $Hotels['hotel_id']] )}}">Edit</a>
                  </td>
                  <td > 
                      <form action="{{ route('hotels.destroy',['hotelID'=> $Hotels['hotel_id']] )}}" method="post">
                          <input class="btn-sm btn-danger" type="submit" value="Delete" />
                          @method('delete')
                          @csrf
                      </form>   
                  </td>    
                <tr>
              @endforeach
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection