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

                    @if (session()->has('success'))
                        <div class=" alert alert-danger">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-footer">
                                <i class="fas fa-list"></i>
                                Product List

                            </div>
                            <hr />




                            <hr />
                            <div class=" container-fluid mb-2">
                                <a href="{{ route('products.create') }}" title="Add New"
                                    class="btn btn-primary float-right mx-4"><i class="fas fa-plus"></i></a>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Description</th>
                                                <th> Category</th>

                                                <th>Product Price</th>
                                                <th>Product Image</th>

                                                <th>Status</th>
                                                <th>Discount Price</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($products as $product)
                                                <tr>


                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <td>{{ $product->category }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td><img
                                                            src="{{ asset('/uploads/' . $product->image) }}"
                                                         ></td>
                                                    <td>{{ $product->status }}</td>
                                                    <td>{{ $product->discount_price }}</td>
                                                    <td>
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class=" btn btn-sm btn-primary" title="Eidt"
                                                            style="margin-bottom: .5rem"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                    </td>

                                                    <td>
                                                        <form action="{{ route('products.destroy', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick="return confirm('Are You Sure To Deleted This')"
                                                                class=" btn btn-sm btn-danger" title="Delete"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>

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


                                        </tbody>

                                    </table>

                                    {{-- {{ $categories->withQueryString()->links() }} --}}


                                </div>


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
