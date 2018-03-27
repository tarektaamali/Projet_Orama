@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gestion Materiels
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter MATERIEL</h3>
                        </div>
                    @include('admin.includes.messages')

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('materiels.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">	libelle </label>
                                        <input type="text" class="form-control" id="libelle" name="libelle" placeholder="libelle">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">	nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Chef d'equipe</label>
                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="adminid">
                                            @foreach ($admins as $admin)

                                                <option value="{{$admin->id}}"> {{ $admin->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">AJouter</button>
                                        <a href='{{route('materiels.index')}}' class="btn btn-warning">Back</a>
                                    </div>

                                </div>

                            </div>

                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection