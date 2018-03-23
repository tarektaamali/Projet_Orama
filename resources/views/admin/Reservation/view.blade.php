@extends('admin\layouts\app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                liste de Service
           <!--     <small>it all starts here</small>-->
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>

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
                            <h3 class="box-title">liste des services</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Etat</th>
                                    <th>service</th>
                                    <th>Client</th>
                                    <th>Chef d'equipe</th>
                                    <th>Valider</th>
                                    <th>delete</th>



                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$reservation->title}}</td>
                                    <td>{{$reservation->description}}</td>
                                    <td>{{$reservation->etat}}</td>
                                    <td>{{$reservation->services->titre}}</td>
                                 <td>{{$reservation->users->name}}</td>
                                    @if(count($reservation->chefs)>0)
                                        <td>{{$reservation->chefs->name}}</td>
                                    @else
                                        <td>Nothing</td>
                                    @endif

                                    <td><a href="{{ route('reservation.edit',$reservation->id) }}"><span class="glyphicon glyphicon-cog"></span></a></td>
                                       <td>
                                    <form  id="delete-form-{{$reservation->id}}" method="post" action="{{route('reservation.destroy',$reservation->id)}}" style="display: none">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>
                                    <a href="" onclick="if(confirm ('Are you sure ,You want to delete')){

                                            event.preventDefault();document.getElementById('delete-form-{{$reservation->id}}').submit(); }
                                            else
                                            {

                                            event.preventDefault();
                                            }

                                            "><span class="glyphicon glyphicon-trash"></span></a>



                                              </td>


                                    @endforeach
                                </tr>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Etat</th>
                                    <th>service</th>
                                    <th>Client</th>
                                    <th>Chef d'equipe</th>
                                    <th>Validéé</th>
                                    <th>delete</th>



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