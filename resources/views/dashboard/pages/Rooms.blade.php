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
              <h3 class="box-title">All Rooms</h3>
            </div>
            <!-- /.box-header -->
           
            <div class="box-body">
              <table id="example1" class="datatable table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>Room Number</th>
                  <th>Room Name</th>
                  <th>Available  From</th>
                  <th>Available  To</th>
                  <th>availability</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($Rooms as $Room)
                    <tr>
                        <td>{{$Room->room->room_number}}</td>
                        <td>{{$Room->name}}</td>
                        <td>{{$Room->room->not_avilable_from}}</td>
                        <td>{{$Room->room->not_avilable_to}}</td>
                        <td>{{$Room->room->avilable == 0 ? 'free' : 'busy'  }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('Rooms.edit',['RoomID'=>$Room->room->id] )}}">Edit</a>
                            <form action="{{ route('Rooms.destroy',['RoomID'=> $Room->room->id ] )}}" method="post" style="display:inline;">
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
                    <th>Room Number</th>
                    <th>Room Name</th>
                    <th>Available  From</th>
                    <th>Available  To</th>
                    <th>availability</th>
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