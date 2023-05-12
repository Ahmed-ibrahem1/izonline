@extends('layout.layout')

@section('content')
<div class="spacer-100"></div>
<section class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 m-auto">
                <div class="checkout-item">
                    <h2 class="rounded">Checkout</h2>
                    <div class="checkout-one">
                        <form id="data-form" method="POST" action="{{ route('sales.store') }}">
                            @csrf
                            <div class="row pb-5">
                                <div class="col-lg-4 col-12">
                                    <img class="img-fluid rounded" src="{{ asset('storage/course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png') }}" alt="" srcset="">
                                </div>
                                <div class="col-lg-8 col-12">
                                    <p class="font-weight-bold my-0"><strong>{{ $program->title }}</strong></p>
                                    <p class="font-weight-bold my-0"><strong>Price: </strong> {{ config('app.currency').$program->price }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>First Name:</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>City:</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Postal Code:</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Country:</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" form="data-form" class="btn checkout-btn" value="Send Details" />
        </div>
    </div>
</section>
<div class="spacer-100"></div>
@endsection