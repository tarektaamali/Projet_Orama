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
                    @if(count($errors)> 0)
                        @foreach($errors -> all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>

                        @endforeach
                    @endif
                </div>
                    <div class="reply-form">
                        <h3 class="title">login</h3>



                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>




            </div>
        </div>
        <!-- /page wrapper -->

    </div>
    <!-- /Page Header Section -->

    <!-- Blog page Section -->

@endsection