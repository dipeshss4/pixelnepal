@section('sidebar')

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Category</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                        <li><a href="{{route(('category.index'))}}"><i class="fa fa-circle-o"></i> View Category</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Product</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('product.create')}}"><i class="fa fa-circle-o"></i> Add Product</a></li>
                        <li><a href="{{route(('product.index'))}}"><i class="fa fa-circle-o"></i> View Product</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Slider</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('slider.create')}}"><i class="fa fa-circle-o"></i> Add Slider</a></li>
                        <li><a href="{{route(('slider.index'))}}"><i class="fa fa-circle-o"></i> View Slider</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Gallery</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('gallery.create')}}"><i class="fa fa-circle-o"></i> Add Image</a></li>
                        <li><a href="{{route(('gallery.index'))}}"><i class="fa fa-circle-o"></i> View Image </a></li>

                    </ul>
                </li>




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    @endsection