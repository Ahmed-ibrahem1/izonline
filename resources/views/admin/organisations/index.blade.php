@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection

@section('content')
@if ($organisations->isNotEmpty())
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800">Organizations</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="organisationsTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
            
                        <th>Image</th>
                        <th>Cover</th>
                        
                        <th>Name</th>
                        <th>Description</th>
                        <th>Attributes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organisations as $organisation)
                    <tr>

          <th><img src="{{ asset('storage/organizations/'.$organisation->image) }}" alt="" srcset="" height="80px"></th>
         <th><img src="{{ asset('storage/organizations/'.$organisation->cover) }}" alt="" srcset="" height="80px"></th>

                        <td>{{ $organisation->name }}</td>
                        <td>{{ $organisation->description }}</td>
                        <td>{{ $organisation->attributes }}</td>

                        
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a class="btn col-6 btn-warning mx-1" href="{{ route('admin.organisations.edit',$organisation) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.organisations.destroy',$organisation) }}"
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
                         <th>Image</th>
                        <th>Cover</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Attributes</th>
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
        There are currently no Organizations.
    </h3>
</div>
@endif
@endsection

@section('foot')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#organisationsTable').DataTable({
            "order":[[1,"asc"]]
        });
    } );
</script>
@endsection