<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Blog</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{url('css/plugin.css')}}" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Header -->
<header>
    <div class="upper-head clearfix">
        <div class="container">
            <div class="header-date">
                <p><i class="icon-clock"></i> {{date('D')}}, {{date('d F Y')}}</p>
                <p><i class="icon-cloud"></i> Jember, East Java</p>
            </div>
        </div>
    </div>
</header>
<!-- Header Ends -->

<!-- Navigation Bar -->
<div class="navigation">
    <div class="container">
        <div class="navigation-content">
            <div class="header_menu">
                <!-- start Navbar (Header) -->
                <nav class="navbar navbar-default navbar-sticky-function navbar-arrow">
                    <div class="logo pull-left">
                        <a href="index.html"><img alt="Image" src="{{url('images/logo1.png')}}"></a>
                    </div>
                    <div id="navbar" class="navbar-nav-wrapper pull-right">

                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li>
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            @guest
                                <li>
                                    <a href="{{route('login')}}">Login</a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}">Register</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('post.create')}}">Post</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                       class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endif
                            <li>
                                <a id="searchtoggl" class="searchtoggle"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                    <div id="slicknav-mobile"></div>
                </nav>
            </div>
            <div id="searchbar" class="searchbar">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="Search Now">
                        <a href="#"><span class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Navigation Bar Ends -->

<!-- Breadcrumb -->

<!-- Breadcrumb Ends -->

<!-- Listing -->
@yield('section')
<!-- Listing Ends -->

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-copyright">
            <div class="container">
                <div class="copyright-content text-center">
                    <span>Copyright © 2018 <a
                            href="www.cyclonethemes.com">Cyclone Themes</a> - All Rights reserved</span>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</footer>
<!-- Footer Ends -->

<!-- back to top start -->
<div id="back-to-top">
    <a href="#"></a>
</div>

<!-- *Scripts* -->
<script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/plugin.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
</body>
</html>
