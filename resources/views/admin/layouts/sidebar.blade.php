<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
      <!--  <form action="#" method="get" class="sidebar-form">
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
            <li class=""><a href="{{ route('projet.planning') }}"><i class="fa fa-calendar"></i>Plannification</a></li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-calendar-plus-o"></i> <span>Projet</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('projet.index') }}"><i class="fa fa-calendar-o"></i> Reservation en attente</a></li>
                    <li><a href="{{ route('projet.index1') }}"><i class="fa fa-calendar-plus-o"></i> Reservation En cours  </a></li>
                    <li><a href="{{ route('projet.index1') }}"><i class="fa fa-calendar-check-o"></i> Reservation Validée  </a></li>
                    <li><a href="{{ route('projet.index2') }}"><i class="fa  fa-hourglass-half"></i> Projet En cours  </a></li>
                    <li><a href="{{ route('projet.index3') }}"><i class="fa  fa-hourglass-end"></i> Projet terminé </a></li>

                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa  fa-cubes"></i> <span>Materiel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('materiels.create') }}"><i class="fa fa-plus-square"></i> Add</a></li>
                    <li><a href="{{ route('materiels.index') }}"><i class="fa fa-eye"></i> View </a></li>
                    <li><a href="{{ route('materiels.index') }}"><i class="fa  fa-file-text-o"></i>Demande materiel</a></li>

                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa  fa-cogs"></i> <span>Service</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('service.create') }}"><i class="fa fa-plus-square"></i> Add</a></li>
                    <li><a href="{{ route('service.index') }}"><i class="fa fa-eye"></i> View </a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-group"></i> <span>Employée </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{route('users.create')}}"><i class="fa fa-plus"></i>New Mobile User</a></li>
                    <li ><a href="{{route('employes.create')}}"><i class="fa fa-plus"></i>New Employee</a></li>
                    <li><a href="{{route('users.index')}}"><i class=" fa  fa-list"></i> List user </a></li>
                    <li><a href="{{route('employes.index')}}"><i class=" fa  fa-list"></i> List Employes</a></li>

                </ul>
            </li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Rapport</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-plus-square"></i> Add</a></li>
                    <li><a href="{{ route('rapport.index') }}"><i class="fa fa-eye"></i> View </a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('articles.create') }}"><i class="fa fa-keyboard-o"></i> Create</a></li>
                    <li><a href="{{ route('articles.index') }}"><i class="fa fa-eye"></i> View </a></li>
                </ul>
            </li>
            <li class=""><a href="{{ route('clients.index') }}"><i class="fa fa-user"></i> Clients</a></li>
            <li class=""><a href="{{ route('feedback.index') }}"><i class="fa fa-envelope"></i> Feedbacks</a></li>




            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>