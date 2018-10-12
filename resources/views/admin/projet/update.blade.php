@extends('admin.layouts.app')
@section('headSection')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection

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
                        <form role="form" action="{{route('projet.update',$projet->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Objet</label>
                                        <input type="text" readonly="" class="form-control" id="objet" name="objet" value="{{$projet->objet}}" placeholder="objet">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">description</label>
                                        <textarea  readonly="" rows ="4" class="form-control" id="description"  name="description">{{$projet->description}}</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>Tel:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control" readonly="" value="{{$projet->user->telephone}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>service:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-cog"></i>
                                            </div>
                                            <input type="text" class="form-control" readonly="" value="{{$projet->service->libelle}}">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Adr:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <input type="text" class="form-control" readonly="" value="{{$projet->lieu}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                        </div>

                                    </div>
                                 <!--   <div class="form-group">

                                        <label>Chef d'equipe</label>
                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="equipe">
                                            <option value=""> </option>



                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date start:</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="date_start" type="date" class="form-control pull-right" id="datepicker">
                                        </div>
                                        <!-- /.input group -->
                              <!--      </div>
                                    <div class="form-group">
                                        <label>Date start:</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="date_fin" class="form-control pull-right" id="datepicker1">
                                        </div>
                                        <!-- /.input group -->
                       <!--             </div>
                                    <div class="form-group" style="margin-top:18px;">
                                        <label>Select materiel</label>
                                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="materiels[]">
                                   /
                                        </select>
                                    </div> -->

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Validé</button>
                                        <a href='{{route('projet.index0')}}' class="btn btn-warning">retour</a>
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
@section('footerSection')
    <script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
</script>
@endsection