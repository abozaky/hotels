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
              <h3 class="box-title">All Countries </h3>
              <a class="btn btn-info" style="margin:10px" href="{{ route('countries.create')}}">Add New Country </a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>country enName</th>
                    <th>country arName</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                    <tr>
                        <td>{{$country->id}}</td>
                        <td>{{$country->country_code}}</td>
                        <td>{{$country->country_enName}}</td>
                        <td>{{$country->country_arName}}</td>
                        <td class="text-center">
                            <a class="btn btn-warning" href="{{ route('cities.show',['id  '=> $country['id']] )}}">Add City</a>
                            <a class="btn btn-primary" href="{{ route('countries.edit',['id  '=> $country['id']] )}}">Edit</a>
                            <form action="{{ route('countries.destroy',['id'=> $country['id']] )}}" method="post" style="display:inline;">
                                <input class="btn-sm btn-danger" type="submit" value="Delete" />
                                @method('delete')
                                @csrf
                            </form>   
                        </td>
                     <tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>country enName</th>
                    <th>country arName</th>
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