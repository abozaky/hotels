@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Hotels    
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
                <th>Category Name</th>
                <th>Description</th>
                <th>image</th>
                <th colspan="2" class="text-center" >Action</th>
                
              </tr>
              <!-- to fetach array to table from Orders_Controller -->
              
               
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="">Show Photo</a>
                </td>
                <td>
                edit
                </td>
                <td> 

                  delete
                        
                </td>
              <tr>

    
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