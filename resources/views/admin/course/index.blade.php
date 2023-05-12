@extends('admin.layout.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Courses</h1>

@if ($courses->isNotEmpty())
<table class="showtime-table table table-striped table-hover rounded">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Title (En)</th>
            <th scope="col">Title (Ar)</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    @foreach ($courses as $course)
    <tr>
        <th><img src="{{ asset('storage/'.$course->image) }}" alt="" srcset="" height="80px"></th>
        <th>{{ $course->getTranslation('title','en') }}</th>
        <th>{{ $course->getTranslation('title','ar') }}</th>
        <td>
            <a href="{{ route('admin.programs.edit',$course) }}"
               class="btn btn-warning text-white">Edit</a>
        </td>
        <td>
            {{-- <form action="{{ route('admin.programs.destroy',$course) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger text-white"
                   type="submit"
                   value="Delete">
            </form> --}}
        </td>
    </tr>
    @endforeach
</table>
@else
<div class="bg-light p-3 font-weight-bold rounded text-center">
    There are currently no courses.
</div>
@endif
@endsection