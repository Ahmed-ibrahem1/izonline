@props(['title','items'])

<div class="course-widget course-info mb-3">
    <h4 class="course-title">{{ $title }}</h4>
    <ul class="m-4">
        @foreach ($items as $item)
        <li>
            <i class="fa fa-check"></i>
            {{ $item }}
        </li>
        @endforeach
    </ul>
</div>