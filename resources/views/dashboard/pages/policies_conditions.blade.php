@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Policies and Conditions  
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
            <li class="active">Simple</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <ul class="nav nav-tabs" id="myForm">
            @foreach ($languages as $language )
                <li class="{{ $language->name == 'En' ? 'active' : '' }}"><a href="#{{$language->name}}">{{$language->title}} Translation</a></li> 
            @endforeach
        </ul>
        @if($policies->isEmpty())
            <form method="POST" action="{{ route('policies_conditions.store') }}">
                @csrf
                <div class="form-group ">
                    <div class="tab-content"> 
                        @foreach ($languages as $language )
                            <div class="tab-pane {{ $language->name == 'En' ? 'active' : '' }}" id="{{$language->name}}">
                                <div class="form-group">
                                        <input type="hidden" class="form-control" value="{{$language->name}}"  name="locale={{$language->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Privacy Policy {{$language->name}}</label>
                                    <textarea class="summernote"  name="Privacy_Policy={{$language->name}}" ></textarea>
                                    <label>Terms And Condition {{$language->name}}</label>
                                    <textarea class="summernote"  name="Terms_And_Condition={{$language->name}}" ></textarea>
                                    <label>Cancellation Policy {{$language->name}}</label>
                                    <textarea class="summernote"  name="Cancellation_Policy={{$language->name}}" ></textarea>
                                </div> 
                                <button type="submit" class="btn btn-primary {{ $language->name == 'En' ? '' : 'hide' }} ">Submit</button>      
                            </div>        
                        @endforeach
                    </div>
                </div>
            </form>
        @else
            
            <form method="POST" action="{{ route('policies_conditions.update',['id'=>'locale'] )}}">
                    @method('PUT')
                    @csrf
                <div class="form-group ">
                    <div class="tab-content"> 
                        @foreach ($policies as $policy )                    
                            <div class="tab-pane {{ $policy->locale == 'En' ? 'active' : '' }}" id="{{$policy->locale}}">
                                <div class="form-group">
                                        <input type="hidden" class="form-control" value="{{$policy->locale}}"  name="locale={{$policy->locale}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Privacy Policy {{$policy->locale}}</label>
                                    <textarea class="summernote"  name="Privacy_Policy={{$policy->locale}}" >{{$policy->Privacy_Policy}}</textarea>
                                    <label>Terms And Condition {{$policy->locale}}</label>
                                    <textarea class="summernote"  name="Terms_And_Condition={{$policy->locale}}" >{{$policy->Terms_And_Condition}}</textarea>
                                    <label>Cancellation Policy {{$policy->locale}}</label>
                                    <textarea class="summernote"  name="Cancellation_Policy={{$policy->locale}}" >{{$policy->Cancellation_Policy}}</textarea>
                                </div> 
                                <button type="submit" class="btn btn-primary {{ $policy->locale == 'En' ? '' : 'hide' }} ">Update</button>
                            </div>        
                        @endforeach
                    </div>
                </div>
            </form>
            <form action="{{ route('policies_conditions.destroy',['id'=>'locale'] )}}" method="post">
                    @method('delete')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Delete All Data" />
            </form>
        @endif 
            
    </section> 
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection