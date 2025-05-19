<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PC Bulacan Computer Store  | Shop Online Now</title>
    <meta name="description" content="Olives PH | Shop Online Now">
    <meta name="author" content="p-themes">
    @vite('resources/css/app.css')

    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/images/icons/site.html">
    <link rel="mask-icon" href="/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skins/skin-demo-2.css?v={{ time() }}">

    <link rel="stylesheet" href="/assets/css/demos/demo-3.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">


                        <div class="header-dropdown">
                            <a href="#">Eng</a>
                            
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->
                    
                    <div class="header-right">
                        <ul class="top-menu">
                           
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="https://www.facebook.com/Tmacsportswearandprinting" target="_blank">About Us</a></li>
                                    <li><a href="https://www.facebook.com/Tmacsportswearandprinting" target="_blank">Contact Us</a>
                                    
                                    @if (Auth::user() == NULL)

                                    @else
                                    @if (Auth::user()->email == TRUE)
                                    <li></li>
                                    <div class="header-dropdown">
                                        <a href="#"><i class="icon-user"></i>{{ Auth::user()->email }}</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="/account">My Account</a></li>
                                                
                                                @if (Auth::user()->role == '1') 

                                                <li></li>
                                                <li><a href="/admin">Admin Settings</a></li>

                                                <li></li>
                                                @endif
                                               
                                                <form action="/logout" method="POST">
                                                @csrf
                                                <li></li>
                                                <li><button type="submit">LOGOUT</button></li>
                                                </form>

                                            </ul>
                                     </div>
                                    </div>
                                                                     
                                    
                                    @else
                                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                                    @endif
                                   
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="/" class="logo">
                            <img src="/new/images/logo.png" alt="PC Bulacan" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="/">Home</a>  
                                </li>
                                <li>
                                    <a href="/view/all" class="sf-with-ul">Product</a>

                                    <ul>
                                        <li>
                                            <a href="/view/all">ALL</a>
                                        </li>
                                        <li>
                                            <a href="/view/laptop">LAPTOPS</a>
                                        </li>
                                        <li>
                                            <a href="/view/processor">PROCESSORS</a>
                                        </li>
                                        <li>
                                            <a href="/view/gpu">GRAPHICS CARDS</a>
                                        </li>
                                        <li>
                                            <a href="/view/psu">POWER SUPPLY</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->
                    
                    <div class="header-right">
                     <div class="header-search">
                        <a href="#" class="search-toggle" role="button" title="Search">
                            <i class="icon-search"></i>
                        </a>
                        <form action="/search" method="GET">
                            @csrf
                           
                            <div class="header-search-wrapper">
                                <label for="product" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="product" id="product" placeholder="Search product" required>
                                
                            </div>
                        </form>
                    </div>
            
                        
                  

@include('components.mycart')
                       


                        </div><!-- End .header-right -->
                        @endif
                    </div><!-- End .container -->
                </div><!-- End .header-middle -->
            </header><!-- End .header -->

@include('components.message')