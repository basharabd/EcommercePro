
<!DOCTYPE html>
<html lang="en">
  <head>
 @include('Admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('Admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('Admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">



            <div style="padding-left: 400px;padding-bottom:30px;">

                <form action="{{url('search')}}" method="get">
                    @csrf

                    <input type="text"  style="color: black;" name="search" placeholder="Search For Somethings">
                    <input type="submit" value="search" class="btn btn-outline-behance">

                </form>
            </div>
                @if (session()->has('success'))
                <div class=" alert alert-danger">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="container-fluid">
                <div class="card">
                    <div class="card-footer">
                        <i class="fas fa-list"></i>
                      All Orders

                    </div>
                    <hr />



                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">User Name</th>
                                    <th class=" text-center"> Email</th>
                                    <th class=" text-center"> Phone</th>

                                    <th class=" text-center">Address</th>
                                    <th class=" text-center">Product Name</th>

                                    <th class=" text-center">Product Price</th>
                                    <th class=" text-center">quantity</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Payment  Status</th>
                                    <th class="text-center">Delivery Status</th>

                                    <th class="text-center">Delivered</th>

                                    <th class="text-center">Download PDF File</th>






                                </tr>
                            </thead>

                            <tbody>

                               @forelse ($orders as $order)
                                    <tr>


                                        <td class=" text-center">{{ $order->name}}</td>
                                        <td class=" text-center">{{ $order->email}}</td>
                                        <td class=" text-center">{{ $order->phone}}</td>
                                        <td class=" text-center">{{ $order->address}}</td>
                                        <td class=" text-center">{{ $order->product_name }}</td>
                                        <td class=" text-center">{{ $order->price}}</td>
                                        <td class=" text-center">{{ $order->quantity}}</td>

                                        <td class=" text-center">
                                            <img src="{{ asset('/uploads/' . $order->image) }}">
                                         </td>

                                        <td class=" text-center">{{ $order->payment_status }}</td>
                                        <td class=" text-center">{{ $order->delivery_status }}</td>

                                        <td class=" text-center">
                                            @if ( $order->delivery_status =='processing')
                                            <a href="{{url('delivered' , $order->id)}}" onclick="return confirm('Are You Sure This Product is delivered!!! ')" class="btn btn-primary">Delivered</a>

                                            @else
                                            <p style="color: green;">Delivered</p>


                                            @endif
                                            </td>

                                            <td class=" text-center"><a href="{{url('download_pdf',$order->id)}}" class="btn btn-secondary">PDF File</a></td>




                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="9">

                                            <div class="alert alert-info text-center"
                                                style="font-size: 1.5rem;" role="alert">
                                                No Orders Defined!
                                            </div>

                                        </td>
                                    </tr>


                                @endforelse


                            </tbody>

                        </table>



                    </div>


                </div>

            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('Admin.js')
  </body>
</html>
