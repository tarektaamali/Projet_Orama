@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" xmlns:color="http://www.w3.org/1999/xhtml"
         xmlns:text-color="http://www.w3.org/1999/xhtml">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gestion de employee
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
                        <form role="form" action="{{ route('employes.update',$employe->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">First Name
                                        </label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="User Name" value="{{$employe->firstname}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">last Name
                                        </label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="User Name" value="{{$employe->lastname}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{$employe->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$employe->phone}}" >
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
                                        <a href='{{ route('employes.index') }}' class="btn btn-warning">Back</a>
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