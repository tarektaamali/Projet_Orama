@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
              Gestion de service
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">AJouter un service</h3>
                        </div>
                        @if(count($errors)> 0)
                            @foreach($errors -> all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>

                        @endforeach
                    @endif

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('service.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Titre </label>
                                        <input type="text" class="form-control" id="titre" name="titre" placeholder="titre">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">AJouter</button>
                                        <a href='{{route('service.index')}}' class="btn btn-warning">Back</a>
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