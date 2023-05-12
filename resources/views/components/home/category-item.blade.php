

<div class="col-xl col-sm-6 col-lg-4">
    <a href="{{ route('programs.index') }}?category_id={{ $category->id }}">
        <div class="single-course-category style-1 bg-shade">
            <div class="course-cat-icon">
                <img src="{{ $category->getFirstMediaUrl('icon','icon')}}" alt="" class="img-fluid">
            </div>
            <div class="course-cat-content">
                <h4 class="course-cat-title">
                    <span>{{ $category->title }}</span>
                </h4>

                <p class="course-count">{{ $category->programs->count() }} {{ __('home.program') }}</p>
            </div>
        </div>
    </a>
</div>