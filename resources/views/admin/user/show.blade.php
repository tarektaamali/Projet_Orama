@extends('admin\layouts\app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Demandeurs</h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Liste des demandeurs</h3>
                    @include('admin.includes.messages')
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>-->
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th>societe</th>
                                    <th>adresse</th>
                                    <th>tele</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$user->prenom}} {{$user->nom}}</td>
                                    <td>{{$user->email}}</td>
                                    @if($user->status == 0)
                                    <td>désactivier</td>
                                    @else
                                        <td>Activier</td>
                                    @endif

                                        <td>{{$user->societe}}</td>
                                    <td>{{$user->adresse}}</td>
                                    <td>{{$user->telephone}}</td>
                                    <td><a href="{{ route('users.edit',$user->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>

                                    <td>
                                        <form  id="delete-form-{{$user->id}}" method="post" action="{{route('users.destroy',$user->id)}}" style="display: none">
                                                {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="if(confirm ('Are you sure ,You want to delete')){

                                                event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit(); }
                                                else
                                                {

                                                event.preventDefault();
                                                }

                                                "><span class="glyphicon glyphicon-trash"></span></a>


                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom&Prenom</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th>societe</th>
                                    <th>adresse</th>
                                    <th>tele</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>



@endsection
@section('footerSection')
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection