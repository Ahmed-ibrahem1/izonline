<div class="col-xl col-sm-6 col-lg-4">
    <a href="{{ route('programs.index') }}?branch_id={{ $branch->id }}">
        <div class="single-course-category style-1 bg-shade">
            <div class="course-cat-content">
                <h4 class="course-cat-title">
                    <span>{{ $branch->name }}</span>
                </h4>
            </div>
        </div>
    </a>
</div>