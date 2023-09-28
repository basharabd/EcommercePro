<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>

       @include('sweetalert::alert')



       @if (session()->has('success'))
       <div class=" alert alert-danger">
           {{ session()->get('success') }}
       </div>
   @endif



       <div>
          <form action="{{url('search_product')}}" method="get">
            @csrf
             <input type="text" name="search" placeholder="Search For Products">
<br><br>
             <input type="submit" value="search">
          </form>
       </div>

       <div class="row">

        @forelse ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-4">
           <div class="box">
              <div class="option_container">
                 <div class="options">
                    <a href="{{route('products.show',$product->id)}}" class="option1">
                    Product Detail
                    </a>

                    <form action="{{url('add_cart',$product->id)}}" method="POST">
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
              <div class="img-box">
                  <img
                  src="{{ asset('/uploads/' . $product->image) }}"
               >                </div>
              <div class="detail-box">
                 <h5>
                    {{$product->name}}
                 </h5>

                 @if ($product->discount_price!=null)
                 <h5 class=" text-center" style="color: red">
                    Discount
                    <br>

                  $  {{$product->discount_price}}

                 </h5>

                 <h6 style="text-decoration: line-through; color:blue">
                    Price
                    <br>
                   $ {{$product->price}}
                 </h6>

                 @else

                 <h6 style="color: blue;">
                    Price
                    <br>
                    {{$product->price}}
                 </h6>
                 @endif

                 {{-- <div>
                  <h6> Available  Quantity :    {{$product->quantity}} </h6>

                 </div> --}}








              </div>
           </div>
        </div>

        @empty
        <tr>
            <td colspan="9">

                <div class="alert alert-info text-center"
                    style="font-size: 1.5rem;" role="alert">
                    No Products Defined!
                </div>

            </td>
        </tr>

        @endforelse
       </div>




       <div class="btn-box">
         <a href="{{url('view_all_product')}}">
         View All products
         </a>
      </div>


    </div>



 </section>
