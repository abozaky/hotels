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
              <h3 class="box-title">Pricing Lists</h3>
            </div>
            {{-- {{dd($pricingLists[0]['roomAvailable']['room']['RoomTranslation'][0]['name'])}} --}}
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="datatable table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Date From</th>
                  <th>Date To</th>
                  <th>Nationality</th>
                  <th>User Type</th>
                  <th>Room Name</th>
                  <th>Price Adult</th>
                  <th>Price Child</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($pricingLists as $pricingList)
                    <tr>
                        <td>{{$pricingList->id}}</td>
                        <td>{{$pricingList['roomAvailable']['date_from']}}</td>
                        <td>{{$pricingList['roomAvailable']['date_to']}}</td>
                        <td>{{$pricingList->nationality}}</td>
                        <td>{{$pricingList->user_type}}</td>
                        <td>{{  $pricingList['roomAvailable']['room']['RoomTranslation'][0]['name']  }}</td>
                        <td>{{$pricingList->price_adult}}</td>
                        <td>{{$pricingList->price_child}}</td>
                        <td>
                            <form action="{{ route('pricing_list.destroy',['roomAvailable'=> $pricingList->room_available_id ] )}}" method="post" style="display:inline;">
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
                    <th>Nationality</th>
                    <th>User Type</th>
                    <th>Room Name</th>
                    <th>Price Adult</th>
                    <th>Price Child</th>
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
