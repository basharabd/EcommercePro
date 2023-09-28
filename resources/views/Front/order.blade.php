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
        width:77%;
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
                <th> Email</th>
                <th> Phone</th>
                <th>Address</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>quantity</th>
                <th>Image</th>
                <th>Payment  Status</th>
                <th>Delivery Status</th>

                <th>Cancel Order</th>





            </tr>
            </thead>
            <tbody>




              @forelse ($orders as $order )
              <tr>
                <td>{{ $order->name}}</td>
                <td>{{ $order->email}}</td>
                <td>{{ $order->phone}}</td>
                <td>{{ $order->address}}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->price}}</td>
                <td>{{ $order->quantity}}</td>

                <td>
                    <img src="{{ asset('/uploads/' . $order->image) }}">
                 </td>

                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->delivery_status }}</td>

                <td>
                    @if ($order->delivery_status=='processing')

                    <a href="{{url('cancel_order',$order->id)}}"
                         onclick="return Confirm('Are You Sure To Cancel This Order!!')"
                         class="btn btn-danger">Cancel Order</a>

                    @else

                    <p style="color: blue;">Not Allowed!</p>


                    @endif


                </td>

              </tr>

              @empty
              <tr>
                  <td colspan="11">

                      <div class="alert alert-info text-center" style="font-size: 1.5rem;" role="alert">
                          No Orders Defined!
                      </div>

                  </td>
              </tr>



          @endforelse







            </tbody>



          </table>



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
