@props(['title','description'=>null, 'lessons'])

<li class="section">
    <div class="section-header">
        <div class="section-left">
            <h5 class="section-title">{{ $title }}</h5>
            @if ($description)
            <p class="section-desc">{{ $description }}</p>
            @endif
        </div>
    </div>

    <ul class="section-content">

        @foreach ($lessons as $lesson)
        <li class="course-item course-item-lp_assignment course-item-lp_lesson">
            <a class="section-item-link" onclick="return false">
                <span class="item-name">{{ $lesson }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</li>
<!-- section end -->