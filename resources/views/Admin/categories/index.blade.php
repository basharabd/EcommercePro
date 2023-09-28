
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

                @if (session()->has('success'))
                <div class=" alert alert-danger">
                    {{session()->get('success')}}
                </div>
                @endif
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-footer">
                            <i class="fas fa-list"></i>
                            Category List

                        </div>
                        <hr />




                        <hr />
                        <div class=" container-fluid mb-2">
                            <a href="{{ route('category.create') }}" title="Add New" class="btn btn-primary float-right mx-4"><i
                                    class="fas fa-plus"></i></a>

                        </div>

                        <div class="card-body">
                             <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Status</th>

                                        <th>Created_At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse ($categories as $category)
                                        <tr>


                                            <td>{{ $category->name }}</td>

                                            <td>{{ $category->description}}</td>
                                            <td>{{ $category->status}}</td>


                                            <td>{{ $category->created_at }}</td>


                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}" class=" btn btn-sm btn-primary"
                                                    title="Eidt" style="margin-bottom: .5rem"><i class="fas fa-pencil-alt"></i></a>

                                            </td>

                                            <td>
                                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are You Sure To Deleted This')" class=" btn btn-sm btn-danger" title="Delete"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="9">

                                                <div class="alert alert-info text-center" style="font-size: 1.5rem;" role="alert">
                                                    No Categories Defined!
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
