@extends('admin\layouts\app')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gestion des Articles
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">titles</h3>
                    </div>
                    @if(count($errors)> 0)
                        @foreach($errors -> all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>

                    @endforeach
                @endif
                <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('articles.update',$article->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="box-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Titre de poste</label>
                                    <input type="text" class="form-control"  name="title" value="{{$article->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Sous-titre de poste </label>
                                    <input type="text" class="form-control" name="subtitle" value="{{$article->subtitle}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload image</label>
                                    <input type="file" name="image" id="exampleInputFile">
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Write Post Body Here
                                    <small>Simple and fast</small>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">
                                        {{$article->post}}


                                </textarea>
                            </div>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href='{{route('articles.index')}}' class="btn btn-warning">Back</a>

                        </div>
                    </form>
                </div>

                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>



@endsection
@section('footerSection')
    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
@endsection