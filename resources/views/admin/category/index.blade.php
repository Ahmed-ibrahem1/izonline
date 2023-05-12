@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection

@section('content')
@if ($categories->isNotEmpty())
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="categoriesTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        
                      <!--<td class="text-center"> <img src="{{asset('st/cats/')}}" height="80px" alt="Category Icon"></td>-->
                      
                        <td class="text-center"> <img src="{{ asset('storage/cats/'.$category->icon) }}" height="80px" alt="Category Icon"></td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->parent? $category->parent->title:'-' }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a class="btn col-6 btn-warning mx-1" href="{{ route('admin.categories.edit',$category) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy',$category) }}"
                                      class="col-6 px-0 mx-1"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="w-100 btn btn-danger text-white"
                                           type="submit"
                                           value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@else
<div class="w-100 bg-gray-300 text-center font-weight-bold rounded p-4">
    <h3>
        There are currently no Categories.
    </h3>
</div>
@endif
@endsection

@section('foot')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#categoriesTable').DataTable({
            "order":[[1,"asc"]]
        });
    } );
</script>
@endsection