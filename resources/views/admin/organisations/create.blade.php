@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.min.css') }}">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Add Organisation</h1>


<form action="{{ route('admin.organisations.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

    

    <section class="row mt-3">
        
        <x-forms.input name='image'
        type='file'
        label='Organisation image'
        class='col-6' />
        
        <x-forms.input name='cover'
        type='file'
        label='Organisation Cover'
        class='col-6' />
        
        <x-forms.input name='name[en]'
                       type=text
                       label='Name (English)'
                       placeholder='Organisation name in english'
                       :value="old('name.en')"
                       required=true
                       class="col-6" />

        <x-forms.input name='name[ar]'
                       type=text
                       label='Name (Arabic)'
                       placeholder='Organisation name in arabic'
                       :value="old('name.ar')"
                       required=true
                       class="col-6" />

    </section>

    <section class="row mt-3">
        <x-forms.textarea name='description[en]'
                          type='text'
                          label='Organisation description (English)'
                          :value="old('description.en')"
                          required=true
                          class='col-6' />
        <x-forms.textarea name='description[ar]'
                          type='text'
                          label='Organisation description (Arabic)'
                          :value="old('description.ar')"
                          required=true
                          class='col-6' />
    </section>


    <section class="row mt-3">
        <x-forms.textarea name='attributes[en]'
                         type='text'
                        label='Organisation attributes (English)'
                        :value="old('attributes.en')"
                        required=true
                         class='col-6' />
        <x-forms.textarea name='attributes[ar]'
                        type='text'
                        label='Organisation attributes (Arabic)'
                        :value="old('attributes.ar')"
                        required=true
                        class='col-6' />
    </section>


    <section class="row mt-3">
        <x-forms.input name='website'
                       type='text'
                       label='Website link'
                       class='col-3'
                       required=true
                       />
        <x-forms.input name='instagram'
                       type='text'
                       label='Instagram link'
                       class='col-3'
                       required=true
                       />
        <x-forms.input name='facebook'
                       type='text'
                       label='Facebook link'
                       class='col-3'
                       required=true
                       />
        <x-forms.input name='twitter'
                       type='text'
                       label='Twitter link'
                       class='col-3'
                       required=true
                       />
    </section>

    <div class="row justify-content-end mt-5">
        <input class="btn btn-success col-2 m-2"
               type="submit"
               value="Create" />
    </div>
</form>

@endsection

