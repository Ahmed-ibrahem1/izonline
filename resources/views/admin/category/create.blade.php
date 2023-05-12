@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.min.css') }}">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Create Category</h1>


<form action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

    <section class="row mt-3">
        <x-forms.input name='icon'
                       type='file'
                       label='Category Icon'
                       required=true
                       class='col-6' />

        <x-forms.input name='featured'
                       inputClass=''
                       type=checkbox
                       label='Featured Category'
                       value=1
                       :checked="old('featured')==1"
                       class="col-6 m-auto" />
    </section>

    <section class="row mt-3">
        <x-forms.input name='title'
                       type=text
                       label='Title (English)'
                       placeholder='Category title in english'
                       :value="old('title')"
                       required=true
                       class="col-6" />

        <!--<x-forms.input name='title[ar]'-->
        <!--               type=text-->
        <!--               label='Title (Arabic)'-->
        <!--               placeholder='Category title in arabic'-->
        <!--               :value="old('title.ar')"-->
        <!--               required=true-->
        <!--               class="col-6" />-->

    </section>

    <section class="row mt-3">
        <x-forms.select name='parent_id'
                        id="selectParent"
                        nullable=true
                        nullableLabel="No parent"
                        label="Parent of the new category"
                        labelClass="col-12 p-0"
                        :options="$categories"
                        :selected="old('user_ids')"
                        class="col-6" />
    </section>

    <div class="row justify-content-end mt-5">
        <input class="btn btn-success col-2 m-2"
               type="submit"
               value="Create" />
    </div>
</form>

@endsection

@section('foot')
<script src="{{ asset('assets/js/bootstrap-multiselect.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#selectParent').multiselect({
            maxHeight:'200',
            enableFiltering:true,
            enableCaseInsensitiveFiltering:true,
            enableFullValueFiltering:false,
            widthSynchronizationMode:'ifPopupIsSmaller',
            buttonContainer:'<div class="btn-group w-100" />'
        });
        
        $('form#create-category').submit(function() {
            $(':input', this).each(function() {
                this.disabled = !($(this).val());
            });
        });
    })

</script>
@endsection