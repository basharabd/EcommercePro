<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('front/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>

      @include('sweetalert::alert')

      <div class="hero_area">
         <!-- header section strats -->
     @include('Front.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('Front.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('Front.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('Front.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('Front.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('Front.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
     @include('Front.client')
      <!-- end client section -->
      <!-- footer start -->
     @include('Front.footer')
      <!-- footer end -->
     @include('Front.copyright')
      <!-- jQery -->
      <script src="{{asset('front/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('front/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('front/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('front/js/custom.js')}}"></script>

      <script>
                 document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      </script>
   </body>
</html>
