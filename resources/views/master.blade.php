<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HerbShop</title>
        
       {{-- maps --}}

      

        <link rel="icon" type="img/png" href="{{asset('frontend/img/logo.png')}}">

        <!-- Google Fonts -->

        

        <link
            href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600'
            rel='stylesheet'
            type='text/css'>
        <link
            href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300'
            rel='stylesheet'
            type='text/css'>
        <link
            href='http://fonts.googleapis.com/css?family=Raleway:400,100'
            rel='stylesheet'
            type='text/css'>

        <!-- Bootstrap -->
        <link
            rel="stylesheet"
            href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="crossorigin=""/>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media
        queries --> 
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script
        src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script
        src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
    </head>
   
       
    <body>

        <!-- End header area -->

        <div class="site-branding-area" style="background-color:#f4f4f4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">

                            <h1>
                                <a href="#">

                                    <b>Herb<span>Shop
                                        </span></b>
                                    <sup>
                                        <img src="frontend/img/logo.png" width="4%" alt=""></sup>
                                </a><br>
                                <p style="font-size:13px; margin-left:85px; color:#555;"> AreaSemarang </p>
                            </h1>
                           
                        </div>
                        
                    </div>

                    <div class="col-sm-6">
                        <div class="shopping-item">
                            <a href="{{url('/show-cart')}}">Cart
                                <span class="cart-amunt"></span>
                                <i class="fa fa-shopping-cart"></i>
                                <span class="product-count"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End site branding area -->

       <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button
                            type="button"
                            class="navbar-toggle"
                            data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="">
                                <a href="{{ url('/index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ URL('/product') }}">Product</a>
                            </li>
                         
                           
                            <li>
                                <a href="{{ URL('/contac') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ URL('/help') }}">Help</a>
                            </li>

                            <?php
                                $customer_id=Session::get('customer_id');
                            ?>
                           <?php if($customer_id != NULL){ ?>
                                <li>
                                        <a href="{{URL::to('/customer-logout')}}">
                                                <font color="#004D40">
                                                <i class="fa fa-user"></i>
                                            LOGOUT</a>
                                </li>
                          
                            <?php } else { ?>
                                <li>
                                        <a href="{{URL::to('/login-check')}}">
                                                <font color="#004D40">
                                                <i class="fa fa-user"></i>
                                            LOGIN</a>
                                </li>
                           <?php } ?>
                           
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End mainmenu area -->

        <!-- Home -->

            @yield('content')

       <!-- End Home -->

      
        <!-- End footer top area -->

        <div class="footer-bottom-area">
                <div class="container">
                    
                        <div class="row">

                                <div class="col-md-6 col-sm-6">
                                        <div class="footer-about-us">
                                            <h2>HerbShop<span> Social Media</span></h2>
                                            <p> <br> 
                                            Instagram: @HerbShop <br>
                                        Facebook: HerbShop <br>
                                        Twitter: @HerbShop<br>
                                        YouTube: HerbShop Channel<br>
                                    </p>
                                            <div class="footer-social">
                                                <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                               
                                            </div>
                                        </div>
                                    </div>


        
                           
                        </div>
                    </div>
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="copyright">
                            <p align="right">&copy; developed by HerbShop | 2019</i>
                        </p>
                    </div>
                    
                </div>
                

              
            </div>
        </div>
    </div>
    <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>

    <!-- jQuery easing -->
    <script src="{{asset('frontend/js/jquery.easing.1.3.min.js')}}"></script>

    <!-- Main Script -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    {{-- script leaflet --}}
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"integrity="sha512nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>

    <script>
            $('#kec').on('change',function(e){
                console.log(e);

                var kec_idd = e.target.value;

                $.get('/json-kel?kec_idd=' + kec_idd, function(data){
                    $('#kel').empty();
                    $.each(data,function(index, subkecObj){
                        $('#kel').append('<option value="'+subkecObj.kel_id'">'+subkecObj.kel_name+'</option>');
                    });
                });
            });
        
        </script>
 
    
</body>
</html>

