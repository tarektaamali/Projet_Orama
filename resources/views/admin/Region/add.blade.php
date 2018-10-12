@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
              Gestion de Zone d'intervention
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter un zone</h3>
                        </div>
                    @include('admin.includes.messages')


                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('region.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Region </label>
                                        <input type="text" class="form-control" id="titre" name="titre" placeholder="region">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                        <a href='{{route('region.index')}}' class="btn btn-warning">Back</a>
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