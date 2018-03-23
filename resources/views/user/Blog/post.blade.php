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
                <h2>{{$article->title}}</h2>
<!--
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" class="text-link"><span>Home</span></a></li>
                    <li class="breadcrumb-item"><a href="blog.html" class="text-link"><span>Blog</span></a></li>
                    <li class="breadcrumb-item active">{{$article->title}}</li>
                </ul>-->

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
                    <!-- blog img -->
                    <div class="blog-img">
                        <img src="/storage/blogimage/{{$article->image}}" alt="">
                    </div>
                    <!-- /blog img -->

                    <!-- blog content -->
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li>By John doe ,</li>
                            <li>12 November 2017</li>
                        </ul>
                        <h3>{{$article->subtitle}}</h3>




                        {!!  htmlspecialchars_decode($article->post)!!}






                    </div>
                    <!-- /blog content -->

                    <!-- blog tags & share -->
                    <div class="blog-tags-share">
                      <!--  <div class="tags">
                            <span>TAGS:</span>
                            <ul class="tags-list">
                                <li><a href="#" class="text-link"><span>#&nbsp;build</span></a></li>
                                <li><a href="#" class="text-link"><span>#&nbsp;teamwork</span></a></li>
                                <li><a href="#" class="text-link"><span>#&nbsp;paint</span></a></li>
                            </ul>
                        </div>-->
                        <div class="share">
                            <span>SHARE:</span>
                            <ul class="share-list">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"> </i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /blog tags & share -->

                    <!-- blog comments -->
                    <div class="blog-comments">
                        <h3 class="title">3 Comments</h3>

                        <!-- comment -->
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="./img/avatar.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Joe Doe</h4>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                <button class="main-button reply-btn">Reply</button>
                                <span class="time">February 19, 2016</span>

                                <!-- comment -->
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="./img/avatar.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Joe Doe</h4>
                                        <p>Percipit recusabo ad mel, lorem tritani hendrerit sed at, erant aliquip vim eu. Ex cum brute essent forensibus, no qui omnium viderer. Iuvaret pertinacia cu nec. Vim te nusquam periculis, ei iisque periculis his.</p>
                                        <button class="main-button reply-btn">Reply</button>
                                        <span class="time">February 19, 2016</span>
                                    </div>
                                </div>
                                <!-- /comment -->
                            </div>
                        </div>
                        <!-- /comment -->

                        <!-- comment -->
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="./img/avatar.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Joe Doe </h4>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu</p>
                                <button class="main-button reply-btn">Reply</button>
                                <span class="time">February 19, 2016</span>
                            </div>
                        </div>
                        <!-- /comment -->

                    </div>
                    <!-- /blog comments -->

                    <!-- blog reply form -->
                    <div class="reply-form">
                        <h3 class="title">Leave a reply</h3>
                        <form>
                            <input class="input" type="text" placeholder="Name">
                            <input class="input" type="email" placeholder="Email">
                            <textarea placeholder="Add Your Commment"></textarea>
                            <button type="submit" class="main-button">Submit</button>
                        </form>
                    </div>
                    <!-- /blog reply form -->

                </div>
            </div>
            <!-- /Main -->

            <!-- Aside -->
            <div id="aside" class="col-md-3">

                <div class="widget">
                    <h3 class="title">Populare Posts</h3>

                    <!-- single post -->
                    @foreach($recentarticles as $recentarticle)
                        <div class="widget-post">
                            <a href="{{route('article',$recentarticle->title)}}" class="text-link">
                                <img src="/storage/blogimage/{{$recentarticle->image}}" alt="" width="80" height="60">
                                <span>{{$recentarticle->title}}</span>
                            </a>
                            <ul class="blog-meta">
                                <li>By John doe ,</li>
                                <li>12 November 2017</li>
                            </ul>
                        </div>
                @endforeach
                <!-- /single post -->

                </div>

                <div class="widget">
                    <h3 class="title">Category</h3>
                    <div class="widget-category">
                        <a href="#">Construction<span>(124)</span></a>
                        <a href="#">Consulting<span>(78)</span></a>
                        <a href="#">Decorating<span>(12)</span></a>
                        <a href="#">Renovation<span>(45)</span></a>
                        <a href="#">Architecture<span>(27)</span></a>
                        <a href="#">Painting<span>(45)</span></a>
                    </div>
                </div>
                <!-- /Category -->

                <!-- Posts sidebar -->
                <!-- /Posts sidebar -->

                <!-- Tags -->
                <!-- /Tags -->

            </div>
            <!-- /Aside -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
@endsection