<div class="col-xl-4 col-lg-4 col-md-6">
    <div class="course-grid bg-shadow tooltip-style">
        <div class="course-header">
            <div class="course-thumb">
                <img src="{{ asset('storage/'.$program->image) }}" alt="" class="img-fluid">
                <div class="course-price">{{ config('app.currency').$program->price }}</div>
            </div>
        </div>

        <div class="course-content">
            <h3 class="course-title mb-20"> <a href="{{ route('programs.show',$program) }}">{{ $program->title }}</a> </h3>

            <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                <span class="duration"><i class="far fa-clock me-2"></i>{{ $program->duration }}</span>
                <span class="students"><i class="far fa-user-alt me-2"></i>{{ $program->getLanguage() }}</span>
                @if ($program->modules)
                <span class="lessons"><i class="far fa-play-circle me-2"></i>{{ count($program->modules) }} {{ __('show-program.modules') }}</span>
                @endif
            </div>
        </div>

        <div class="course-hover-content">
            <div class="price">{{ config('app.currency').$program->price }}</div>
            <h3 class="course-title mb-20 mt-30"> <a href="{{ route('programs.show',$program) }}">{{ $program->title }}</a> </h3>
            <div class="course-meta d-flex align-items-center mb-20">
                @if ($program->category)
                <div class="author me-4">
                    <a href="{{ route('programs.index') }}?category_id={{ $program->category->id }}">{{ $program->category->title }}</a>
                </div>
                @endif
                @if ($program->modules)
                <span class="lesson"> <i class="far fa-file-alt"></i>{{ count($program->modules) }} {{ __('show-program.modules') }}</span>
                @endif
            </div>
            <a href="{{ route('programs.show',$program) }}" class="btn btn-grey btn-sm rounded"> {{ __('index-program.read-more') }} <i class="fal fa-angle-right"></i></a>
        </div>
    </div>
</div>