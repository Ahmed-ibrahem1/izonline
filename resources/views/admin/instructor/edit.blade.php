@extends('admin.layout.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Instructor</h1>
<form action="{{ route('admin.instructors.update',$instructor) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row pt-2">
        <div class="col-6">
            <h4>Current instructor image</h4>
            <img src="{{ asset('storage/'.$instructor->image) }}" alt="" srcset="" style="max-height: 300px">
        </div>
        <x-forms.input name='image'
                       type='file'
                       label='Upload new image'
                       class='col-6' />
    </div>
    <div class="row pt-2">
        <x-forms.input name='name[en]'
                       type='text'
                       label='Instructor name (English)'
                       :value="$instructor->getTranslation('name','en')"
                       required=true
                       class='col-6' />
        <x-forms.input name='name[ar]'
                       type='text'
                       label='Instructor name (Arabic)'
                       :value="$instructor->getTranslation('name','ar')"
                       required=true
                       class='col-6' />
    </div>

    <div class="row pt-2">
        <x-forms.textarea name='biography[en]'
                          type='text'
                          label='Instructor biography (English)'
                          :value="$instructor->getTranslation('biography','en')"
                          required=true
                          class='col-6' />
        <x-forms.textarea name='biography[ar]'
                          type='text'
                          label='Instructor biography (Arabic)'
                          :value="$instructor->getTranslation('biography','ar')"
                          required=true
                          class='col-6' />
    </div>

    <div class="row pt-2">
        <x-forms.textarea name='experience[en]'
                          type='text'
                          label='Instructor experience (English)'
                          :value="$instructor->getTranslation('experience','en')"
                          required=true
                          class='col-6' />
        <x-forms.textarea name='experience[ar]'
                          type='text'
                          label='Instructor experience (Arabic)'
                          :value="$instructor->getTranslation('experience','ar')"
                          required=true
                          class='col-6' />
    </div>

    <div class="row pt-2">
        <x-forms.input name='instagram'
                          type='text'
                          label='Instagram link'
                          :value="$instructor->instagram"
                          required=true
                          class='col-6' />
        <x-forms.input name='facebook'
                          type='text'
                          label='Facebook link'
                          :value="$instructor->facebook"
                          required=true
                          class='col-6' />
    </div>

    <div class="row justify-content-end">
        <input class="btn btn-warning m-2"
               type="reset">
        <input class="btn btn-success m-2"
               type="submit"
               value="Update">
    </div>
</form>
@endsection