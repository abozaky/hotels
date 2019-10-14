@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
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
             <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Cities</h3>
            </div>
            <!-- /.box-header -->
           
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>City En_Name</th>
                  <th>City Ar_Name</th>
                  <th>Country Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                    <tr>
                        <td>{{$city->id}}</td>
                        <td>{{$city->city_enName}}</td>
                        <td>{{$city->city_arName}}</td>
                        <td>{{$city->country->country_enName}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('cities.edit',['RoomID'=>$city->id] )}}">Edit</a>
                            <form action="{{ route('cities.destroy',['RoomID'=> $city->id ] )}}" method="post" style="display:inline;">
                                <input class="btn-sm btn-danger" type="submit" value="Delete" />
                                @method('delete')
                                @csrf
                            </form>   
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>City En_Name</th>
                    <th>City Ar_Name</th>
                    <th>Country Name</th>
                    <th>Action</th>
                </tr>
                </tfoot>
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