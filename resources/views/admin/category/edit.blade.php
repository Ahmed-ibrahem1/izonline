@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.min.css') }}">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Category</h1>


<form action="{{ route('admin.categories.update',$category) }}" enctype="multipart/form-data" method="POST">
    @method('PUT')
    @csrf

    <h3>Current Icon</h3>
    <section class="row mt-3 justify-content-center">
        <div class="col-8 bg-gray-400 rounded text-center p-3">
            <img src="{{ asset('storage/cats/'.$category->icon) }}" class="img-fluid" alt="">
        </div>
    </section>

    <section class="row mt-3">
        <x-forms.input name='icon'
                       type='file'
                       label='Category Icon'
                       class='col-6' />

        <x-forms.input name='featured'
                       inputClass=''
                       type=checkbox
                       label='Featured Category'
                       value=1
                       :checked="$category->featured"
                       class="col-6 m-auto" />
    </section>

    <section class="row mt-3">
        <x-forms.input name='title[en]'
                       type=text
                       label='Title (English)'
                       placeholder='Category title in english'
                       :value="$category->getTranslation('title','en')"
                       required=true
                       class="col-6" />

        <x-forms.input name='title[ar]'
                       type=text
                       label='Title (Arabic)'
                       placeholder='Category title in arabic'
                       :value="$category->getTranslation('title','ar')"
                       required=true
                       class="col-6" />

    </section>

    <section class="row mt-3">
        <x-forms.select name='parent_id'
                        id="selectParent"
                        nullable=true
                        nullableLabel="No parent"
                        label="Parent of the category"
                        labelClass="col-12 p-0"
                        :options="$categories"
                        :selected="$category->parent_id"
                        class="col-6" />
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