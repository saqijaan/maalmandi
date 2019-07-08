<!DOCTYPE html>
<html lang="en">
<head>

<!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
  @include('user.layouts.css')
  @yield('css')
</head>

<body class="body-wrapper">

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light text-dark navigation">
              <a class="navbar-brand" href="/">
                <img src="/images/logo.png" alt="" style="height:50px;width:50px;">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto mt-10 text-md-center text-right">
                      <!-- Authentication Links -->
                      @auth
                      {{--  <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Profile</a>
                      </li>  --}}
                      <li class="nav-item">
                        <a class="nav-link text-dark btn p-2 border-bottom border-danger" onclick="$('#logout').submit()" href="#">Logout</a>
                        <form action="{{ route('logout') }}" id="logout" method="POST">
                          @csrf
                        </form>
                      </li>
                      <li class="nav-item ml-md-4 mt-md-0 mt-3">
                        <a class="nav-link text-dark btn p-2 border-bottom border-success" href="{{ route('user.post.index') }}">My Ads</a>
                      </li>
                      <li class="nav-item ml-md-4 mt-md-0 mt-3">
                        <a class="nav-link text-light btn p-2 rounded btn-success btn-lg" href="{{ route('user.post.create') }}">Post New Ad</a>
                      </li>
                      @endauth
                      
                      @guest
                        <li class="nav-item">
                          <a class="nav-link text-dark login-button" href="{{ route('register') }}">Sign Up</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark login-button" href="{{ route('login') }}">Login</a>
                        </li>    
                      @endguest
                    </ul>
              </div>
            </nav>
        </div>
      </div>
    </div>
  </section>

    @yield('page')


<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-12">
          <!-- Copyright -->
          <div class="copyright">
            <p>Copyright © 2019. All Rights Reserved</p>
          </div>
        </div>
        <div class="col-sm-6 col-12">
          <!-- Social Icons -->
          <ul class="social-media-icons text-right">
              <li><a class="fa fa-facebook" href="https://www.facebook.com"></a></li>
              <li><a class="fa fa-twitter" href="https://www.twitter.com"></a></li>
              <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com"></a></li>
              <li><a class="fa fa-vimeo" href="https://www.vimeo.com"></a></li>
            </ul>
        </div>
      </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
      <a id="top" class="" href=""><i class="fa fa-angle-up"></i></a>
    </div>
</footer>

@include('user.layouts.js')
<script>
    $("select").selectpicker({
      liveSearch:true
    });
</script>
@include('layouts.toastr-message')
@yield('js')
</body>
</html>



