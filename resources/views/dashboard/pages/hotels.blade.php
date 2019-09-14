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
          <div class="box-header">
              <!-- Start Form add Category -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add New hotel</button>
              <div class="modal fade bd-example-modal-sm" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Hotel..</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ route('hotels.store') }}"  enctype="multipart/form-data" >
                      @csrf
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Hotel Name:</label>
                        <input type="text" class="form-control" id="recipient-name" name="name">
                                @error('name')
                                    <label class="text-danger"> {{ $message }}</label>
                                @enderror
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Hotel Description:</label>
                        <textarea class="form-control" name="description" id="message-text"></textarea>
                                @error('description')
                                    <label class="text-danger"> {{ $message }}</label>
                                @enderror
                      </div>
                        <div class="custom-file">
                          <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                @error('image')
                                    <label class="text-danger"> {{ $message }}</label>
                                @enderror
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                    </form>
                </div>
              </div>
              </div>
                <!-- end form add Category -->
          </div>
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
                      <!-- Start Form Edit Category -->
                    <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#EditCategory1">Edit</button>

                      <div class="modal fade bd-example-modal-sm" id="EditCategory1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action=""  enctype="multipart/form-data" >
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Category Name:</label>
                                <input type="text" class="form-control" id="recipient-name" value="" name="name"> 
                                      @error('name')
                                            <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Category Description:</label>
                                <textarea class="form-control" name="description" id="message-text"></textarea>
                                        @error('description')
                                            <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                              </div>
                                <div class="custom-file">
                                  <img src="" class="img-thumbnail" style="max-height: 13rem; width: 100%; min-height: 13rem; ">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                        @error('image')
                                            <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                            </form>
                        </div>
                      </div>
                      </div>
                        <!-- end form Edit Category -->
                </td>
                <td> 

                    <form action="" method="post">
                    <input class=" btn-sm btn-default label-danger" type="submit" value="Delete" />
                    @method('delete')
                    @csrf
                    </form>
                        
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