@extends('admin.layout.layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection

@section('content')
    @if ($sales->isNotEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800">Sales</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="salesTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th> User name</th>
                                <th>Program name</th>
                                <th>Price</th>
                                <th>Coupon</th>
                                <th>Date of purchase</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                @if (App\Models\User::find($sale->user_id) ? true : false)
                                    <tr>
                                        <td>{{ $sale->user_id }}</td>
                                        <td>{{ App\Models\User::find($sale->user_id)->first_name }}
                                            {{ App\Models\User::find($sale->user_id)->middle_name }}
                                        </td>
                                        <td>{{ App\Models\Program::find($sale->program_id)->getTranslation('title', 'en') }}
                                        </td>
                                        <td>{{ $sale->amount }}</td>
                                        <td>{{ $sale->coupon_id ? $sale->coupon_id : 'No coupon used' }}</td>
                                        <td>{{ $sale->created_at }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $sale->user_id }}</td>
                                        <td>User deleted</td>
                                        <td>{{ App\Models\Program::find($sale->program_id)->getTranslation('title', 'en') }}
                                        </td>
                                        <td>{{ $sale->amount }}</td>
                                        <td>{{ $sale->coupon_id ? $sale->coupon_id : 'No coupon used' }}</td>
                                        <td>{{ $sale->created_at }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>User Id</th>
                                <th> User name</th>
                                <th>Program name</th>
                                <th>Price</th>
                                <th>Coupon</th>
                                <th>Date of purchase</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="w-100 bg-gray-300 text-center font-weight-bold rounded p-4">
            <h3>
                There are currently no sales.
            </h3>
        </div>
    @endif
@endsection

@section('foot')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#salesTable').DataTable({
                "order": [
                    [1, "asc"]
                ]
            });
        });
    </script>
@endsection
