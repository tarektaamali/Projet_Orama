@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Admin</h3>
                        </div>

                    @include('admin.includes.messages')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('users.update',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="@if (old('nom')){{ old('nom') }}@else{{ $user->nom }}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Prenom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="@if (old('prenom')){{ old('prenom') }}@else{{ $user->prenom }}@endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone" value="@if (old('telephone')){{ old('telephone') }}@else{{ $user->telephone }}@endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_passowrd">Status</label>
                                        <div class="checkbox">
                                            <label ><input type="checkbox" name="status"
                                                           @if (old('status')==1 || $user->status == 1)
                                                           checked
                                                           @endif value="1">Status</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href='{{ route('users.index') }}' class="btn btn-warning">Back</a>
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