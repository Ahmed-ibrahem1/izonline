@props(['image', 'name','job','biography'=>""])
<div class="single-instructor-box mt-3 mb-3">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-4">
            <div class="instructor-image">
                <img src="{{ asset('storage/'.$image) }}" alt="" class="img-fluid" width="350px" height="350px">
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="instructor-content">
                <h4>{{ $name }}</h4>
                <span class="sub-title">{{ $job }}</span>

                <p>{{ $biography }}</p>
            </div>
        </div>
    </div>
</div>