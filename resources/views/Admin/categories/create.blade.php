
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
            <div class="content-wrapper bg-white">

    <div class="container-fluid">
        <div class="card">
            <div class="card-footer">
                <i class="fas fa-pencil-alt"></i>

                Add Category

            </div>


            <div class=" container-fluid mb-3 ">
                <a href="{{route('category.index')}}" title="Back" class="btn btn-danger mt-2 float-right"><i
                        class="fas fa-reply"></i></a>
            </div>

            <hr />
            <div class="card-body">

                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf



                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" style="color: black;" name="name" value="" placeholder="Category Name"
                                class="form-control @error('name')  is-invalid @enderror " />

                            @error('name')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <hr />


                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label">Category Description</label>
                        <div class="col-sm-10">
                            <input type="text" style="color: black;" name="description" value="" placeholder="Category Description"
                                class="form-control @error('description')  is-invalid @enderror " />

                            @error('description')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <hr />



                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label" for="status">{{ __('Status') }}</label>

                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="Active"
              >

                                <label class="form-check-label">
                                    {{ __('Active') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="NotActive"
                                    >
                                <label class="form-check-label">
                                    {{ __('InActive') }}
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
