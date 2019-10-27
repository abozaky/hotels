
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active" ><a href="{{ route('index.index') }}"><i class="fa fa-dashboard"></i> <span>Home Page</span></a></li> 
        <li><a href=""><i class="fa fa-users"></i> <span>Users</span></a></li>
        <li><a href="{{route('countries.index')}}"><i class="fa fa-users"></i> <span>Countries</span></a></li>
        <li><a href="{{route('cities.index')}}"><i class="fa fa-users"></i> <span>Cities</span></a></li> 
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Hotels</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="{{route('Add_New_Hotel.index')}}"><i class="fa fa-users"></i> <span>Add New Hotel</span></a></li>
                <li><a href="{{route('hotels.index')}}"><i class="fa fa-users"></i> <span>All Hotels</span></a></li>
            </ul>
        </li>
        <li><a href="{{route('Rooms.index')}}"><i class="fa fa-users"></i> <span>Rooms</span></a></li> 
        <li><a href="{{route('pricing_list.index')}}"><i class="fa fa-users"></i> <span>Price lists</span></a></li>
        <li><a href="{{route('policies_conditions.index')}}"><i class="fa fa-users"></i> <span>Policies and Conditions</span></a></li> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>