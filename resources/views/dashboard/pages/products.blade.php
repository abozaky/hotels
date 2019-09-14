@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Products    
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add Product</button>
              <div class="modal fade bd-example-modal-sm" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ route('products.store') }}"  enctype="multipart/form-data" >
                       @csrf
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Name:</label>
                        <input type="text" class="form-control" id="recipient-name" name="ProductName">
                               @error('ProductName')
                                     <label class="text-danger"> {{ $message }}</label>
                                @enderror
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product price:</label>
                        <input type="number" class="form-control" id="recipient-name" name="prcie">
                               @error('prcie')
                                     <label class="text-danger"> {{ $message }}</label>
                                @enderror
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Quantity:</label>
                        <input type="number" class="form-control" id="recipient-name" name="Quantity">
                               @error('Quantity')
                                     <label class="text-danger"> {{ $message }}</label>
                                @enderror
                      </div>
                       <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Is Offer ?</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_offer" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_offer" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                          </div>
                               @error('is_offer')
                                     <label class="text-danger"> {{ $message }}</label>
                                @enderror
                      </div>
                       <div class="offer">
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label"> Offer:</label>
                             
                            <input type="number" class="form-control" id="recipient-name" name="Offer"> 
                                   @error('Offer')
                                         <label class="text-danger"> {{ $message }}</label>
                                    @enderror
                          </div>
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Eexpire Offer: </label>
                            <input type="number" class="form-control" id="recipient-name" name="expire_offer" placeholder="after (2) days ..." >
                                   @error('expire_offer')
                                         <label class="text-danger"> {{ $message }}</label>
                                    @enderror
                          </div>
                       </div>
                       <div class="form-group">
                          
                          <label for="recipient-name" class="col-form-label">Category Name:</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="Category">

                          @foreach( $categories as $Category )
                              <option value="{{$Category['id']}}">{{$Category['name']}}</option>
                          @endforeach

                          </select>
                          @error('Category')
                          <label class="text-danger"> {{ $message }}</label>
                          @enderror
                      </div>                      
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Product Description:</label>
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
            <table class="table table-hover text-center">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>image</th>
                <th>price</th>
                <th>quantity</th>
                <th>is_offer</th>
                <th>offer</th>
                <th>expire_offer</th>
                <th>selling_number </th>
                <th>CategoryName</th>
                <th>Edit</th>
                <th>Delete</th>
                
              </tr>
              <!-- to fetach array to table from Orders_Controller -->
              
                 @foreach($products as $product)

              <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{ str_limit( $product['description'],10 ) }}</td>
                <td><a href="{{  asset('Products_Image/' . $product['photo']) }}">Show</a>
                <td>{{$product['price']}} $</td>
                <td>{{$product['quantity']}}</td>
                @if($product['is_offer'] == 0)
                <td>No</td>
                <td>-</td>
                <td>-</td>
                @else
                <td>yes</td>
                <td>{{$product['offer']}} %</td>
                <td>{{$product['expire_offer']}}</td>
                @endif
                <td>{{$product['selling']}}</td>
                <td>{{$product->category()->first()->name}}</td>
                <td>
                            <!-- Start Form Edit Product -->
                           <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#EditProduct{{$product['id']}}">Edit</button>

                      <div class="modal fade bd-example-modal-sm" id="EditProduct{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{ route('products.update',['products'=> $product['id']]) }}"  enctype="multipart/form-data" >
                               @csrf
                              @method('PUT')

                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Product Name:</label>
                                <input type="text" class="form-control" id="recipient-name" name="ProductName" value="{{$product['name']}}"> 
                                       @error('ProductName')
                                             <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Product price:</label>
                                <input type="number" class="form-control" id="recipient-name" name="prcie" value="{{$product['price']}}">
                                       @error('prcie')
                                             <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Quantity:</label>
                                <input type="number" class="form-control" id="recipient-name" name="Quantity" value="{{$product['quantity']}}">
                                       @error('Quantity')
                                             <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">sales count:</label>
                                <input type="number" class="form-control" id="recipient-name" name="selling" value="{{$product['selling']}}">
                                       @error('selling')
                                             <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                               </div>
                               <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Is Offer ?</label>
                                  @if($product['is_offer'] == 0)
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_offer" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_offer" id="inlineRadio2" value="0" checked>
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                  </div>

                                  @else
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_offer" id="inlineRadio1" value="1" checked>
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_offer" id="inlineRadio2" value="0" >
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                  </div>

                                  @endif  

                                       @error('is_offer')
                                             <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                              </div>
                               <div class="offer">
                                   <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"> Offer:</label>
                                     
                                    <input type="number" class="form-control" id="recipient-name" name="Offer" value="{{$product['Offer']}}"> 
                                           @error('Offer')
                                                 <label class="text-danger"> {{ $message }}</label>
                                            @enderror
                                  </div>
                                   <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Eexpire Offer: </label>
                                    <input type="number" class="form-control" id="recipient-name" name="expire_offer" placeholder="after (2) days ..." value="{{$product['expire_offer']}}" >
                                           @error('expire_offer')
                                                 <label class="text-danger"> {{ $message }}</label>
                                            @enderror
                                  </div>
                               </div>
                               <div class="form-group">
                                  
                                  <label for="recipient-name" class="col-form-label">Category Name:</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="Category">

                                  @foreach( $categories as $Category )
                                      <option value="{{$Category['id']}}">{{$Category['name']}}</option>
                                      <option value="{{$product['category_id']}}" selected>{{$product->category()->first()->name}}</option>
                                  @endforeach

                                  </select>
                                  @error('Category')
                                  <label class="text-danger"> {{ $message }}</label>
                                  @enderror
                              </div>                      
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Product Description:</label>
                                <textarea class="form-control" name="description" id="message-text">{{$product['description']}}</textarea>
                                        @error('description')
                                             <label class="text-danger"> {{ $message }}</label>
                                        @enderror
                              </div>
                                <div class="custom-file">
                                  <img src="{{  asset('Products_Image/' . $product['photo']) }}" class="img-thumbnail" style="max-height: 13rem; width: 100%; min-height: 13rem; ">
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
                          <!-- end form Edit Product -->

                </td>
                <td>
                   <form action="{{ route('products.destroy',['products'=> $product['id']] )}}" method="post">
                    <input class=" btn-sm btn-default label-danger" type="submit" value="Delete" />
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