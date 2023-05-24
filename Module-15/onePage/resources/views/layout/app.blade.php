<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/svg" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lineicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/tiny-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    @include('layout.header');

    @yield('content')

    @include('layout.footer');

    <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/glightbox.bundle.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/min.js')}}"></script>
    <script src="{{asset('js/bootstrap/tiny-slider.js')}}"></script>

    <script>

        //===== close navbar-collapse when a  clicked
        let navbarTogglerNine = document.querySelector(
          ".navbar-nine .navbar-toggler"
        );
        navbarTogglerNine.addEventListener("click", function () {
          navbarTogglerNine.classList.toggle("active");
        });
    
        // ==== left sidebar toggle
        let sidebarLeft = document.querySelector(".sidebar-left");
        let overlayLeft = document.querySelector(".overlay-left");
        let sidebarClose = document.querySelector(".sidebar-close .close");
    
        overlayLeft.addEventListener("click", function () {
          sidebarLeft.classList.toggle("open");
          overlayLeft.classList.toggle("open");
        });
        sidebarClose.addEventListener("click", function () {
          sidebarLeft.classList.remove("open");
          overlayLeft.classList.remove("open");
        });
    
        // ===== navbar nine sideMenu
        let sideMenuLeftNine = document.querySelector(".navbar-nine .menu-bar");
    
        sideMenuLeftNine.addEventListener("click", function () {
          sidebarLeft.classList.add("open");
          overlayLeft.classList.add("open");
        });
    
        //========= glightbox
        GLightbox({
          'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
          'type': 'video',
          'source': 'youtube', //vimeo, youtube or local
          'width': 900,
          'autoplayVideos': true,
        });
    
      </script>
</body>
</html>