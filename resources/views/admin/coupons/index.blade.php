@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection

@section('content')
@if ($coupons->isNotEmpty())
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800">Coupons</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="couponsTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Discount Type</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->discountType() }}</td>
                        <td>{{ $coupon->amount }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn col-6 btn-warning" href="{{ route('admin.coupons.edit',$coupon) }}">
                                Edit
                            </a>
                            <form action="{{ route('admin.coupons.destroy',$coupon) }}"
                                  class="col-6"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="w-100 btn btn-danger text-white"
                                       type="submit"
                                       value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Code</th>
                        <th>Discount Type</th>
                        <th>Amount</th>
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
        There are currently no Coupons.
    </h3>
</div>
@endif
@endsection

@section('foot')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#couponsTable').DataTable({
            "order":[[1,"asc"]]
        });
    } );
</script>
@endsection