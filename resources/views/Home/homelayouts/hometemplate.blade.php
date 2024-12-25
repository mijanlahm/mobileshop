@php 
   $categories = App\Models\category::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijan</title>
    @vite('resources/css/bootstrap.min.css')
    @vite('resources/css/style.css')
    @vite('resources/css/responsive.css')
    
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    
</head>


<body>
    <!-- banner bg main start -->
    <div class="banner_bg_main back-image clearfix">
       <!-- header top section start -->
       <div class="container">
          <div class="header_section_top">
             <div class="row">
                <div class="col-sm-12">
                   <div class="custom_menu">
                      <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                         <li><a href="{{ route('bestseller') }}">Best Sellers</a></li>
                         <li><a href="{{ route('giftidea') }}">Gift Ideas</a></li>
                         <li><a href="{{ route('newreleases') }}">New Releases</a></li>
                         <li><a href="{{ route('todaysdeal') }}">Today's Deals</a></li>
                         <li><a href="{{ route('customerservice') }}">Customer Service</a></li>
                      
                        

                           @guest
                                 <!-- User is not logged in -->
                                 <li><a href="{{ route('login') }}">Login</a></li>
                           @else
                                 <!-- Admin-specific menu -->
                                 @role('admin')
                                    <li><a href="{{ route('admindashboard') }}">Admin Dashboard</a></li>
                                 @endrole

                                 <!-- Regular user menu -->
                                 @role('user')
                                    <li><a href="{{ route('userprofile') }}">My Profile</a></li>
                                    <li><a href="{{ route('addtocart') }}">Cart</a></li>
                                    @endrole
                           @endguest

                      

                        </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- header top section start -->
       <!-- logo section start -->
       <div class="logo_section">
          <div class="container">
             <div class="row">
                <div class="col-sm-12">
                   <div class="logo"><a href="index.html"><img src="{{ asset('images/logo.png') }}"></a></div>
                </div>
             </div>
          </div>
       </div>
       <!-- logo section end -->
       <!-- header section start -->
       <div class="header_section">
          <div class="container">
             <div class="containt_main">
                <div id="mySidenav" class="sidenav">
                   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                   <a href="{{ route('home') }}">Home</a>

                  @foreach ($categories as $category)
                     <a href="{{ route('category', [$category->id, $category->slug]) }}">{{ $category->category_name }}</a>
                   @endforeach
                   
                </div>
                <span class="toggle_icon" onclick="openNav()"><img src="{{ asset('images/toggle-icon.png') }}"></span>
                <div class="dropdown">
                   <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                   </button>
                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      
                  
                  @foreach ($categories as $category)
                     <a class="dropdown-item" href="{{ route('category', [$category->id, $category->slug]) }}">{{ $category->category_name }}</a>
                   @endforeach

                   </div>
                </div>
                <div class="main">
                   <!-- Another variation with a button -->
                   <div class="input-group">
                     <form action="" method="GET">
                        <input style="position: absolute; left:0;" type="text" name="query" class="form-control" placeholder="Search this blog" value="{{ request()->query('query') }}">
                        <div class="input-group-append">
                           <button style="position: absolute; right:0;" class="btn btn-warning" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </form>
                   </div>
                </div>
                <div class="header_box">
                   <div class="lang_box ">
                      <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                      <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu ">
                         <a href="#" class="dropdown-item">
                         <img src="images/flag-france.png" class="mr-2" alt="flag">
                         French
                         </a>
                      </div>
                   </div>
                   <div class="login_menu">
                      <ul>
                         <li><a href="{{ route('addtocart') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="padding_10">Cart</span></a>
                         </li>
                         
                         @guest
                           <!-- User is not logged in -->
                              <li><a style="margin-left: 3px;" class="fa fa-user-circle" href="{{ route('login') }}"> <span class="padding_10">Login</span></a></li>
                           @else
                              <!-- User is logged in -->
                              <li>Welcome, {{ Auth::user()->name }}</li>
                              <li>
                                 <form action="{{ route('logout') }}" method="POST">
                                       @csrf
                                       <button style="border-radius:3px; padding:3px;" type="submit">Logout</button>
                                 </form>
                              </li>
                           @endguest

                      </ul>
                   </div>
                </div>
            </div>
         </div>
   </div>
</div>

<!-- Common part -->

       <div class="container py-5" style="margin-top: 200px" >

            @yield('main_content')
         
       </div>

<!-- end of common part -->


    <!-- footer section start -->
    <div class="footer_section layout_padding">
       <div class="container">
          <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
          <div class="input_bt">
             <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
             <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
          </div>
          <div class="footer_menu">
             <ul>
               <li><a href="{{ route('home') }}">Home</a></li>
               <li><a href="{{ route('bestseller') }}">Best Sellers</a></li>
               <li><a href="{{ route('giftidea') }}">Gift Ideas</a></li>
               <li><a href="{{ route('newreleases') }}">New Releases</a></li>
               <li><a href="{{ route('todaysdeal') }}">Today's Deals</a></li>
               <li><a href="{{ route('customerservice') }}">Customer Service</a></li>
             </ul>
          </div>
          <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
       </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
       <div class="container">
          <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
       </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>

    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    

    <script>
       function openNav() {
         document.getElementById("mySidenav").style.width = "250px";
       }
       
       function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
       }
    </script>

   <script>
      (function (window, document) {
         var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
         };

         window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
      })(window, document);
   </script>
 </body>
</html>