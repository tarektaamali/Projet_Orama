@extends('user.layouts.app')

@section('main-content')
    <div id="page-header" class="banner-area sm-section">

        <!-- Background Image -->
        <div class="bg-img overlay" style="background-image:url('./img/background3.jpg')"></div>
        <!-- /Background Image -->

        <!-- page wrapper -->
        <div class="page-wrapper text-center">
            <div class="container">
                <div class="row">
                    <h2>Blog Single Post</h2>
                    @if(count($errors)> 0)
                        @foreach($errors -> all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>

                        @endforeach
                    @endif
                    <div class="reply-form">
                        <h3 class="title">Reserver</h3>

                        <form role="form" action="{{route('reserver.store')}}" method="post">
                            {{ csrf_field() }}
                            <input class="input" type="text" placeholder="title" id="title" name="title">
                            <input class="input" type="text" placeholder="adresse" id="adresse" name="adresse">
                            <div class="form-group">
                                <label>Services</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="service">
                                    @foreach ($services as $service)

                                    <option value="{{$service->id}}"> {{ $service->titre }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <textarea placeholder="Votre Message" id="description" name="description"></textarea>


                            <button type="submit" class="main-button">Submit</button>

                        </form>
                    </div>



                </div>
            </div>
        </div>
        <!-- /page wrapper -->

    </div>
    <!-- /Page Header Section -->

    <!-- Blog page Section -->

@endsection