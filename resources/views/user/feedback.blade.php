@extends('user.layouts.app')

@section('main-content')
    <div id="page-header" class="banner-area sm-section">

        <!-- Background Image -->
        <div class="bg-img overlay" style="background-image:url('{{asset('user/img/background3.jpg')}}')"></div>
        <!-- /Background Image -->

        <!-- page wrapper -->
        <div class="page-wrapper text-center">
            <div class="container">
                <div class="row">
                    <h2>Blog Single Post</h2>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" class="text-link"><span>Home</span></a></li>
                        <li class="breadcrumb-item"><a href="blog.html" class="text-link"><span>Blog</span></a></li>
                        <li class="breadcrumb-item active">Single Post</li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- /page wrapper -->

    </div>
    <!-- /Page Header Section -->

    <!-- Blog page Section -->
    <div class="section md-section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- Main -->
                <div id="main" class="col-md-9">
                    <div class="blog">
                        <div class="reply-form">
                            <h3 class="title">Leave a feedback</h3>
                            <form role="form" action="{{route('feedback.store')}}" method="post">
                                {{ csrf_field() }}
                                <input class="input" type="text" placeholder="name" id="name" name="name">
                                <input class="input" type="email" placeholder="Email" id="email" name="email">
                                <textarea placeholder="Votre Message" id="message" name="message"></textarea>
                                <button type="submit" class="main-button">Submit</button>
                            </form>
                        </div>
                        <!-- /blog reply form -->

                    </div>
                </div>
                <!-- /Main -->

                <!-- Aside -->
                <!-- /Aside -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
@endsection