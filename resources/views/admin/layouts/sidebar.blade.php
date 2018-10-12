<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin/dist/img/tarek.png') }}" class="img-circle" alt="User Image">
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
                    <li ><a href="{{ route('projet.index0') }}"><i class="fa fa-calendar-o"></i>  n'est pas validé</a></li>
                    <li><a href="{{ route('projet.index1') }}"><i class="fa fa-calendar-plus-o"></i> Encours  </a></li>
                    <li><a href="{{ route('projet.index2') }}"><i class="fa fa-calendar-check-o"></i>Devis Validée  </a></li>
                    <li><a href="{{ route('projet.index3') }}"><i class="fa  fa-hourglass-end"></i> Projet terminé </a></li>

                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa  fa-cubes"></i> <span>Zone</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('region.create') }}"><i class="fa fa-plus-square"></i>Ajouter</a></li>
                    <li><a href="{{ route('region.index') }}"><i class="fa fa-eye"></i> Liste </a></li>

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
                    <li ><a href="{{ route('service.create') }}"><i class="fa fa-plus-square"></i> Ajouter</a></li>
                    <li><a href="{{ route('service.index') }}"><i class="fa fa-eye"></i> Liste </a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-group"></i> <span>Demandeurs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index')}}"><i class=" fa  fa-list"></i>Nouveaux Demandeurs</a></li>
                    <li><a href="{{route('users.index1')}}"><i class=" fa  fa-list"></i> Demandeurs</a></li>

                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Fournisseur</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('fournisseurs.index')}}"><i class=" fa  fa-list"></i> Nouveaux Fournisseurs </a></li>
                    <li><a href="{{route('fournisseurs.index1')}}"><i class=" fa  fa-list"></i>Fournisseurs</a></li>

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
                    <li class="active"><a href="index.html"><i class="fa fa-plus-square"></i> Ajouter</a></li>
                    <li><a href="{{ route('rapport.index') }}"><i class="fa fa-eye"></i> Liste </a></li>
                </ul>
            </li>
       <!--     <li class="active treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-keyboard-o"></i> Create</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i> Liste </a></li>
                </ul>
            </li>-->
            <li class=""><a href="{{ route('feedback.index') }}"><i class="fa fa-envelope"></i> Feedbacks</a></li>




            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>