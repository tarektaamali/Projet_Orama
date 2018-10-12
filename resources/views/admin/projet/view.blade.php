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
                                    <th>Objet</th>
                                    <th>Description</th>
                                    <th>Service</th>
                                    <th>Demandeur</th>
                                    <th>Lieu</th>
                                    <th>Fournisseur</th>
                                    <th>Proposition</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projets as $projet)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$projet->objet}}</td>
                                        <td>{{$projet->description}}</td>
                                        <td>{{$projet->service->libelle}}</td>
                                        <td>{{$projet->user->prenom}} {{$projet->user->nom}} <?php"\n"?>{{$projet->user->telephone}}<?php"\n"?> {{$projet->user->email}} </td>
                                        <td>{{$projet->lieu}}</td>
                                        @if($projet->realisateur_id ==null)
                                            <td>vide</td>
                                        @else
                                            <td>{{$projet->fournisseur->societe}}<?php"\n"?>
                                                {{$projet->fournisseur->email}}<?php"\n"?>
                                                {{$projet->fournisseur->telephone}}</td>
                                         @endif
                                         @if($projet->etat_id==1)
                                         <td>Vide</td>
                                         @else
                                        <td><a href="{{ route('propostion.view',$projet->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                             </td>
                                             @endif 
                                          
                                        <td>
                                        <a href="{{ route('projet.show',$projet->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>

                                            <a href="{{ route('projet.edit',$projet->id) }}"><span class="glyphicon glyphicon-cog"></span></a>
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
                                    <th>Objet</th>
                                    <th>Description</th>
                                    <th>Service</th>
                                    <th>Demandeur</th>
                                    <th>Lieu</th>
                                    <th>Fournisseur</th>
                                    <th>Proposition</th>
                                    <th>Action</th>


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