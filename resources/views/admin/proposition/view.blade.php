@extends('admin\layouts\app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                liste des Proposition de devis
           <!--     <small>it all starts here</small>-->
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Devis</h3>

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
                                    <th>Fournisseur</th>
                                    <th>Description</th>
                                    <th>Echeance </th>
                                    <th>Devis </th>
                                    <th>Start_date </th>
                                    <th>Status </th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($propositions as $region)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$region->user->email}}</td>
                                    <td>{{$region->description}}</td>
                                    <td>{{$region->echenance}}</td>
                                    <td>{{$region->devis}}</td>
                                    <td>{{$region->start_date}}</td>
                                    @if($region->projet->realisateur_id !=$region->user_id)
                                        <td></td>
                                    @else
                                        <td>Accepter</td>
                                    @endif

                                    <td><a href="{{ route('region.edit',$region->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>

                                    <td>
                                        <form  id="delete-form-{{$region->id}}" method="post" action="{{route('region.destroy',$region->id)}}" style="display: none">
                                                {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="if(confirm ('Are you sure ,You want to delete')){

                                                event.preventDefault();document.getElementById('delete-form-{{$region->id}}').submit(); }
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
                                    <th>Fournisseur</th>
                                    <th>Description</th>
                                    <th>Echeance </th>
                                    <th>Devis </th>
                                    <th>Start_date </th>
                                    <th>Status </th>
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