@extends('admin.layout.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Instructors</h1>

@if ($instructors->isNotEmpty())
<table class="showtime-table table table-striped table-hover rounded">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name (En)</th>
            <th scope="col">Name (Ar)</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    @foreach ($instructors as $instructor)
    <tr>
        <th><img src="{{ asset('storage/'.$instructor->image) }}" alt="" srcset="" height="80px"></th>
        <th>{{ $instructor->getTranslation('name','en') }}</th>
        <th>{{ $instructor->getTranslation('name','ar') }}</th>
        <td>
            <a href="{{ route('admin.instructors.edit',$instructor) }}"
               class="btn btn-warning text-white">Edit</a>
        </td>
        <td>
            <form action="{{ route('admin.instructors.destroy',$instructor) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger text-white"
                       type="submit"
                       value="Delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@else
<div class="bg-light p-3 font-weight-bold rounded text-center">
    There are currently no instructors.
</div>
@endif
@endsection