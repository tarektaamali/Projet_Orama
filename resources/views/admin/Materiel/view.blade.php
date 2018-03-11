@extends('admin\layouts\app')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-warning">Update</button>
                            <button type="button" class="btn btn-warning">Update</button>
                        </div>
                        <!-- /.panel-heading -->

                        <div class="box">

                            <div class="box-body">
                                <table width="100%" class="table table-bordered table-striped" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Rubrique</th>
                                        <th>nombre</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($materiel as $mt)
                                        <tr>
                                            <td> {{$mt->id}}</td>
                                            <td> {{$mt->libelle}}</td>
                                            <td> {{$mt->nombre}}</td>
                                            <td> <center><a href="UpdateRB/{{$rb->id}}"> <button type="button" class="btn btn-warning">Update</button></a></center> </td>
                                            <td><center> <a href="AddRB/{{$rb->id}}"> <button type="button" class="btn btn-danger">Delete</button></a></center> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </section>
        <!-- /.content -->
    </div>



@endsection