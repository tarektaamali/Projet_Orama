@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" xmlns:color="http://www.w3.org/1999/xhtml"
         xmlns:text-color="http://www.w3.org/1999/xhtml">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gestion de service
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Admin</h3>
                        </div>
                    @include('admin.includes.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">User Name
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ old('name') }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone" value="{{ old('phone') }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password" value="{{ old('password') }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Passowrd</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm passowrd" >
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_passowrd">Status</label>
                                        <div class="checkbox">
                                            <label ><input type="checkbox" name="status" @if (old('status') == 1)
                                                checked
                                                           @endif value="1">Status</label>
                                        </div>
                                    </div>

                                  <!--  <div class="form-group">
                                        <label>Assign Role</label>
                                      <select name="role" id="role" class="form-control">
                                          <option value="1">Chef d'equipe</option>
                                          <option value="0">Ouvrier</option>

                                      </select>
                                    </div>-->

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href='{{ route('users.index') }}' class="btn btn-warning">Back</a>
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