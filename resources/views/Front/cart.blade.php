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
      <style type="text/css">
      .cart{
        margin: auto;
        width: 70%;
        text-align: center;
        padding: 10px;
      }


      </style>

    </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
     @include('Front.header')
         <!-- end header section -->

         @if (session()->has('success'))
         <div class=" alert alert-danger">
             {{session()->get('success')}}
         </div>
         @endif

     <div class="cart">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th>User Address</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantitiy</th>
                <th>Product Image</th>
                <th>Remove</th>


            </tr>
            </thead>
            <tbody>

                <?php $totalprice = 0 ;?>

              @foreach ($carts as $cart )
              <tr>
                <td>{{$cart->name}}</td>
                <td>{{$cart->email}}</td>
                <td>{{$cart->phone}}</td>
                <td>{{$cart->address}}</td>
                <td>{{$cart->product_name}}</td>
                <td>${{$cart->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td> <img
                    src="{{ asset('/uploads/' . $cart->image)}}" height="400px" width="400px">
                </td>

                <td><a href="{{url("remove_cart" , $cart->id)}}" onclick ="return confirm('Are You Sure to remove this product?!')" class="btn btn-sm btn-danger">Remove</a></td>

              </tr>


              <?php $totalprice =   $totalprice + $cart->price?>

              @endforeach

            </tbody>

          </table>
          <div>
            <h1 style="font-size: 20px; padding:40px; color:red;">Total Price :$ {{$totalprice}}</h1>
        </div>

        <div class="">
            <h1 style="font-size: 25px; padding-bottom:15px;p">Proceed To Order</h1>

            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{url('stripe' , $totalprice)}}" class="btn btn-danger">Pay Using Card</a>


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
