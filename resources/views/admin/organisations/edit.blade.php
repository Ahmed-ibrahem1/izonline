@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.min.css') }}">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Organisation</h1>


<form action="{{ route('admin.organisations.update',$organisation) }}" enctype="multipart/form-data" method="POST">
    @method('PUT')
    @csrf
    

    <section class="row mt-3">
        <x-forms.input name='image'
        type='file'
        label='Update organisation image'
        class='col-6' />
        
        <x-forms.input name='cover'
        type='file'
        label='Organisation Cover'
        class='col-6' />
        
        <x-forms.input name='name[en]'
                       type=text
                       label='Name (English)'
                       placeholder='Organisation name in english'
                       :value="$organisation->getTranslation('name','en')"
                       required=true
                       class="col-6" />

        <x-forms.input name='name[ar]'
                       type=text
                       label='Name (Arabic)'
                       placeholder='Organisation name in arabic'
                       :value="$organisation->getTranslation('name','ar')"
                       required=true
                       class="col-6" />

    </section>

    <section class="row mt-3">
        <x-forms.textarea name='description[en]'
                          type='text'
                          label='Organisation description (English)'
                          :value="$organisation->getTranslation('description','en')"
                          required=true
                          class='col-6' />
        <x-forms.textarea name='description[ar]'
                          type='text'
                          label='Organisation description (Arabic)'
                          :value="$organisation->getTranslation('description','ar')"
                          required=true
                          class='col-6' />
    </section>


    <section class="row mt-3">
        <x-forms.textarea name='attributes[en]'
                         type='text'
                        label='Organisation attributes (English)'
                        :value="$organisation->getTranslation('attributes','en')"
                        required=true
                         class='col-6' />
        <x-forms.textarea name='attributes[ar]'
                        type='text'
                        label='Organisation attributes (Arabic)'
                        :value="$organisation->getTranslation('attributes','ar')"
                        required=true
                        class='col-6' />
    </section>


    <section class="row mt-3">
        <x-forms.input name='website'
                       type='text'
                       label='Website link'
                       :value="$organisation->website"
                       class='col-3' />
        <x-forms.input name='instagram'
                       type='text'
                       label='Instagram link'
                       :value="$organisation->instagram"
                       class='col-3' />
        <x-forms.input name='facebook'
                       type='text'
                       :value="$organisation->facebook"
                       label='Facebook link'
                       class='col-3' />
        <x-forms.input name='twitter'
                       type='text'
                       :value="$organisation->twitter"
                       label='Twitter link'
                       class='col-3' />
    </section>




    <div class="row justify-content-end">
        <input class="btn btn-warning m-2 col-2 mt-5"
               type="reset">
        <input class="btn btn-success m-2 col-2 mt-5"
               type="submit"
               value="Update">
    </div>
</form>

@endsection

