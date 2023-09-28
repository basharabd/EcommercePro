
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

        <style>
            .form-select{
             background: black;
            }
        </style>

        <div class="main-panel">
            <div class="content-wrapper">

    <div class="container-fluid">
        <div class="card">
            <div class="card-footer">
                <i class="fas fa-pencil-alt"></i>

                Add Product

            </div>


            <div class=" container-fluid mb-3 ">
                <a href="{{route('products.index')}}" title="Back" class="btn btn-danger mt-2 float-right"><i
                        class="fas fa-reply"></i></a>
            </div>

            <hr />
            <div class="card-body">

                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf



                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" style="color: black;" name="name" value="" placeholder="Product Name"
                                class="form-control @error('name')  is-invalid @enderror " />

                            @error('name')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <hr />






                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Product Description</label>
                        <div class="col-sm-10">
                            <input type="text" style="color: black;" name="description" value="" placeholder="Product Description"
                                class="form-control @error('description')  is-invalid @enderror " />

                            @error('description')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>


                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Product Quntitiy</label>
                        <div class="col-sm-10">
                            <input type="text" style="color: black;" name="quantity" value="" placeholder="Product Quntitiy"
                                class="form-control @error('quantity')  is-invalid @enderror " />

                            @error('quantity')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>




                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Product Price</label>
                        <div class="col-sm-10">
                            <input type="text" style="color: black;" name="price" value="" placeholder="Product Price"
                                class="form-control @error('price')  is-invalid @enderror " />

                            @error('price')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Product DisCount</label>
                        <div class="col-sm-10">
                            <input type="text" style="color: black;" name="discount_price" value="" placeholder="Product DisCountPrice"
                                class="form-control @error('discount_price')  is-invalid @enderror " />

                            @error('discount_price')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>


                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Product Category</label>
                        <div class="col-sm-10">
                            <select class="form-select"  name="category" aria-label="Default select example">
                                <option value="" selected>Choose Category</option>
                                @foreach ($categories as $category )
                                <option value="{{$category->name}}">{{$category->name}}</option>

                                @endforeach

                              </select>

                            @error('category')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Product Image</label>
                        <div class="col-sm-10">
                            <input type="file" style="color: black;" name="image" value=""
                                class="form-control @error('image')  is-invalid @enderror " />

                            @error('image')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>








                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label" for="status">{{ __('Status') }}</label>

                        <div>
                            <div class="form-check">
                                <input class="form-check-input"  type="radio" name="status" value="active"
              >

                                <label class="form-check-label">
                                    {{ __('Active') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="inactive"
                                    >
                                <label class="form-check-label">
                                    {{ __('inactive') }}
                                </label>
                            </div>

                        </div>

                        @error('status')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>




                    <div class="row mt-5  float-right">

                        <button type="submit" class=" btn btn-success"><i class="fa-solid fa-floppy-disk"></i></button>

                    </div>




                </form>

            </div>


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
