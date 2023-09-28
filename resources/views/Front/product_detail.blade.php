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
      <div class="hero_area">
         <!-- header section strats -->
     @include('Front.header')
         <!-- end header section -->

         @include('sweetalert::alert')






      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto;">
         <div class="box">

            <div class="img-box">
                <img
                src="{{ asset('/uploads/' . $products->image)}}" height="400px" width="400px">
                            </div>
            <div class="detail-box">
               <h5>
               Product :    {{$products->name}}
               </h5>


               @if ($products->discount_price!=null)
               <h6  style="color: red">


               DisCount Price:   {{$products->discount_price}}

               </h6>

               <h6 style="text-decoration: line-through; color:blue">


                  Price  :  {{$products->price}}
               </h6>

               @else

               <h6 style="color: blue">
                  Price
                  <br>
                  {{$products->price}}
               </h6>
               @endif




               <h6>   Category :    {{$products->category}} </h6>
               <h6>   Description :    {{$products->description}} </h6>
                  <h6> Available  Quantity :    {{$products->quantity}} </h6>


                  <form action="{{url('add_cart',$products->id)}}" method="POST">
                    @csrf
                    <div class=" row">

                        <div class=" col-md-4">
                            <input type="number" name="quantity" value="1" min="1" style="width: 100px;">

                        </div>

                        <div class=" col-md-4">
                            <input type="submit" value="Add To Cart">

                        </div>
                    </div>


                </form>






            </div>
         </div>
      </div>







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
      <script src="{{asset('front/js/custom.js"')}}></script>
   </body>
</html>
