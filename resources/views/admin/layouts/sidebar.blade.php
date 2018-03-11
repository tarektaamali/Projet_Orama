<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>admin admin</p>
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
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i>Plannification</a></li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Reservation</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="index.html"><i class="fa fa-circle-o"></i> Reservation en attende</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Reservation valider </a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Materiel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('materiels.create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                    <li><a href="{{ route('materiels.index') }}"><i class="fa fa-circle-o"></i> View </a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>service</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="index.html"><i class="fa fa-circle-o"></i> Add</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> View </a></li>
                </ul>
            </li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Rapport</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Add</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> View </a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('articles.create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                    <li><a href="{{ route('articles.index') }}"><i class="fa fa-circle-o"></i> View </a></li>
                </ul>
            </li>
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Clients</a></li>
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Feedbacks</a></li>




            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>