@extends('admin.layout.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Add Instructor</h1>
<form action="{{ route('admin.instructors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row pt-2">
        <x-forms.input name='image'
                       type='file'
                       label='Instructor image'
                       required=true
                       class='col-12' />
    </div>
    <div class="row pt-2">
        <x-forms.input name='name[en]'
                       type='text'
                       label='Instructor name (English)'
                       :value="old('name.en')"
                       required=true
                       class='col-6' />
        <x-forms.input name='name[ar]'
                       type='text'
                       label='Instructor name (Arabic)'
                       :value="old('name.ar')"
                       required=true
                       class='col-6' />
    </div>

    <div class="row pt-2">
        <x-forms.textarea name='biography[en]'
                          type='text'
                          label='Instructor biography (English)'
                          :value="old('biography.en')"
                          required=true
                          class='col-6' />
        <x-forms.textarea name='biography[ar]'
                          type='text'
                          label='Instructor biography (Arabic)'
                          :value="old('biography.ar')"
                          required=true
                          class='col-6' />
    </div>


    <div class="row pt-2">
        <x-forms.textarea name='experience[en]'
                          type='text'
                          label='Instructor experience (English)'
                          :value="old('experience.en')"
                          required=true
                          class='col-6' />
        <x-forms.textarea name='experience[ar]'
                          type='text'
                          label='Instructor experience (Arabic)'
                          :value="old('experience.ar')"
                          required=true
                          class='col-6' />
    </div>

    <div class="row pt-2">
        <x-forms.input name='instagram'
                       type='text'
                       label='Instagram link'
                       class='col-6' />
        <x-forms.input name='facebook'
                       type='text'
                       label='Facebook link'
                       class='col-6' />
    </div>

    <div class="row justify-content-end">
        <input class="btn btn-success m-2"
               type="submit"
               value="Save" />
    </div>
</form>
@endsection