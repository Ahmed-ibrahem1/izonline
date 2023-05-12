@extends('layout.layout')

@section('content')
<div class="container py-5">

    <h1 class="h3 mb-4 text-gray-800">Purchased Courses</h1>

    @if ($courses->isNotEmpty())
    <table class="showtime-table table table-striped table-hover rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title (En)</th>
                <th scope="col">Title (Ar)</th>
            </tr>
        </thead>
        @foreach ($courses as $course)
        <tr>
            <th><img src="{{ asset('storage/'.$course->program->image) }}" alt="" srcset="" height="80px"></th>
            <th>{{ $course->program->getTranslation('title','en') }}</th>
            <th>{{ $course->program->getTranslation('title','ar') }}</th>
        </tr>
        @endforeach
    </table>
    @else
    <div class="bg-light p-3 font-weight-bold rounded text-center">
        You have not purchased any courses yet.
    </div>
    @endif
</div>
@endsection