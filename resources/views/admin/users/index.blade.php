@extends('admin.layout.layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection

@section('content')
    @if ($users->isNotEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800">Users</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Purchased programs</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>

                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach (App\Models\User::purchases($user) as $purchase)
                                            {{ $purchase->title }}
                                        @endforeach

                                    </td>
                                    {{-- App\Models\User::purchases($user)->getTranslation('title','en') --}}
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a class="btn col-6 btn-warning mx-1"
                                                href="{{ route('admin.users.edit', $user) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" class="col-6 px-0 mx-1"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input class="w-100 btn btn-danger text-white" type="submit"
                                                    value="Delete">
                                            </form>
                                        </div>
                                    </td>



                                    {{-- <td>{{ App\Models\Program::find($sale->program_id)->getTranslation('title','en') }}</td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Purchased programs</th>
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
                There are currently no users.
            </h3>
        </div>
    @endif
@endsection

@section('foot')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                "order": [
                    [1, "asc"]
                ]
            });
        });
    </script>
@endsection
