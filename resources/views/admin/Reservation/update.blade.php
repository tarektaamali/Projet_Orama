@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
              mise a jour de service
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Titles</h3>
                        </div>
                        @if(count($errors)> 0)
                            @foreach($errors -> all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>

                        @endforeach
                    @endif

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('reservation.update',$reservation->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">titre</label>
                                        <input type="text" readonly="" class="form-control" id="title" name="title" value="{{$reservation->title}}" placeholder="titre">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">description</label>
                                        <textarea  readonly="" rows ="4" class="form-control" id="description"  name="description">{{$reservation->description}}</textarea>

                                    </div>

                                    <div class="form-group">
                                        <label>Chef d'equipe</label>
                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="equipe">
                                            <option value=""> </option>

                                        @if(count($reservation->chefs)>0)
                                                <option  value="{{$reservation->admin_id}}" selected> {{$reservation->chefs->name}}</option>
                                               @endif

                                            @foreach ($admins as $admin)
                                                <option value="{{$admin->id}}"> {{ $admin->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href='{{route('reservation.index')}}' class="btn btn-warning">Back</a>
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