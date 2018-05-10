@extends('admin\layouts\app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gestion de projet
                <!--     <small>it all starts here</small>-->
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

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
                            <h3></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>service</th>
                                    <th>Client</th>
                                    <th>addresse</th>
                                    <th>date debut</th>
                                    <th>date fin</th>
                                    <th>Chef d'equipe</th>
                                    <th>Valider</th>
                                    <th>delete</th>



                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projets as $projet)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$projet->titre}}</td>
                                        <td>{{$projet->description}}</td>
                                        <td>{{$projet->service->titre}}</td>
                                        <td>{{$projet->client->name}}</td>
                                        <td>{{$projet->adresse}}</td>
                                        @if($projet->start_date ==null)
                                        <td>vide</td>
                                    @else
                                        <td>{{$projet->start_date}}</td>
                                        @endif
                                        <td>{{$projet->end_date}}</td>

                                    @if(count($projet->chefs)>0)
                                            <td>{{$projet->chefs->name}}</td>
                                        @else
                                            <td>Nothing</td>
                                        @endif

                                        <td><a href="{{ route('projet.edit',$projet->id) }}"><span class="glyphicon glyphicon-cog"></span></a></td>
                                        <td>
                                            <form  id="delete-form-{{$projet->id}}" method="post" action="{{route('projet.destroy',$projet->id)}}" style="display: none">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                            <a href="" onclick="if(confirm ('Are you sure ,You want to delete')){

                                                    event.preventDefault();document.getElementById('delete-form-{{$projet->id}}').submit(); }
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
                                    <th>service</th>
                                    <th>Client</th>
                                    <th>addresse</th>
                                    <th>date debut</th>
                                    <th>date fin</th>
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