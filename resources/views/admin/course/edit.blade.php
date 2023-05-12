@extends('admin.layout.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Course</h1>
<form id="createCourse" action="{{ route('admin.programs.update',$program) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-6">
            <h4>Current course image</h4>
            <img src="{{ asset('storage/'.$program->image) }}" alt="" srcset="" style="max-height: 300px">
        </div>
    </div>
    <div class="row">
        <x-forms.input name='image'
                       type='file'
                       label='Update course image'
                       class='col-6' />
        <x-forms.select name='category_id'
                        label='Course Category'
                        :options="$categories"
                        :selected="$program->category_id"
                        required=true
                        class='col-6' />
    </div>
    <div class="row">
        <x-forms.input name='title[en]'
                       type='text'
                       label='Course Title (English)'
                       :value="$program->getTranslation('title','en')"
                       required=true
                       class='col-6' />
        <x-forms.input name='title[ar]'
                       type='text'
                       label='Course Title (Arabic)'
                       :value="$program->getTranslation('title','ar',false)"
                       required=true
                       class='col-6' />
    </div>

    <div class="row">
        <x-forms.textarea name='description[en]'
                          type='text'
                          label='Course Description (English)'
                          :value="$program->getTranslation('description','en')"
                          class='col-6' />
        <x-forms.textarea name='description[ar]'
                          type='text'
                          label='Course Description (Arabic)'
                          :value="$program->getTranslation('description','ar',false)"
                          class='col-6' />
    </div>

    <div class="row">
        <x-forms.textarea name='objectives[en]'
                          type='text'
                          label='Course Objectives (English)'
                          :value="$program->getTranslation('objectives','en')"
                          class='col-6' />
        <x-forms.textarea name='objectives[ar]'
                          type='text'
                          label='Course Objectives (Arabic)'
                          :value="$program->getTranslation('objectives','ar',false)"
                          class='col-6' />
    </div>

    <div class="row">
        <x-forms.array name='aimed_at[en]'
                       classname='aimeden'
                       type='text'
                       label='Aimed at (English)'
                       placeholder='Enter an item'
                       :values="$program->getTranslation('aimed_at','en')"
                       class='col-6' />
        <x-forms.array name='aimed_at[ar]'
                       classname='aimedar'
                       type='text'
                       label='Aimed at (Arabic)'
                       placeholder='Enter an item'
                       :values="$program->getTranslation('aimed_at','ar',false)"
                       class='col-6' />
    </div>

    <div class="row pt-4">
        <x-forms.array name='learn_to[en]'
                       type='text'
                       classname='learntoen'
                       label='Learn to (English)'
                       placeholder='Enter an item'
                       :values="$program->getTranslation('learn_to','en')"
                       class='col-6' />
        <x-forms.array name='learn_to[ar]'
                       type='text'
                       classname='learntoar'
                       label='Learn to (Arabic)'
                       placeholder='Enter an item'
                       :values="$program->getTranslation('learn_to','ar',false)"
                       class='col-6' />
    </div>

    <div class="row pt-4">
        <x-forms.array-textarea name='modules[en]'
                                type='text'
                                classname='moduleen'
                                label='Module (English)'
                                placeholder="Enter module title, then lessons seperated by '|'"
                                :values="$modules_en"
                                class='col-6' />
        <x-forms.array-textarea name='modules[ar]'
                                classname='modulear'
                                type='text'
                                label='Module (Arabic)'
                                placeholder="Enter module title, then lessons seperated by '|'"
                                :values="$modules_ar"
                                class='col-6' />
    </div>

    <div class="row">
        <x-forms.input name='duration'
                       type='number'
                       label='Course duration'
                       required=true
                       :value="$program->duration"
                       class='col-6' />
        <x-forms.input name='price'
                       type='number'
                       label='Course price'
                       :value="$program->price"
                       required=true
                       class='col-6' />
    </div>

    <div class="row">
        <x-forms.select name='language'
                        label='Course Language'
                        :options="['en'=>'English','ar'=>'Arabic']"
                        required=true
                        :selected="$program->language"
                        class='col-6' />
        <x-forms.select name='delivery_mode'
                        label='Delivery Mode'
                        :options="['online'=>'Online']"
                        required=true
                        :selected="$program->delivery_mode"
                        class='col-6' />
    </div>

    <div class="row">
        <x-forms.select name='level_id'
                        label='Course level'
                        :options="$levels"
                        :selected="$program->level_id"
                        required=true
                        class='col-6' />
        <x-forms.multi-select name='instructors_id[]'
                              label='Course instructors'
                              :options="$instructors"
                              :selected="$program->instructors->pluck('id')->toArray()"
                              class='col-6' />
    </div>

    <div class="row">
        <div class="col-6 pt-4">
            <label>Is Featured?</label>
            <input
                   type="checkbox"
                   name="featured"
                   value="yes"
                   {{ $program->featured?'checked':'' }} />
            <x-error-message fieldName=featured />
        </div>
    </div>

    <div class="row justify-content-end">
        <input class="btn btn-warning m-2"
               type="reset">
        <input class="btn btn-success m-2"
               type="submit"
               value="Update">
    </div>
</form>
<script>
    $('form#createCourse').submit(function () {
        $(':input', this).each(function () {
            this.disabled = !($(this).val());
        });
    });
</script>@endsection