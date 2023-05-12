@extends('admin.layout.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Add Course</h1>
<form id="createCourse" action="{{ route('admin.programs.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <x-forms.input name='image'
                       type='file'
                       label='Course Image'
                       class='col-6' />
        <x-forms.select name='category_id'
                        label='Course Category'
                        :options="$categories"
                        :selected="old('category_id')"
                        required=true
                        class='col-6' />
    </div>
    <div class="row">
        <x-forms.input name='title[en]'
                       type='text'
                       label='Course Title (English)'
                       :value="old('title.en')"
                       required=true
                       class='col-6' />
        <x-forms.input name='title[ar]'
                       type='text'
                       label='Course Title (Arabic)'
                       :value="old('title.ar')"
                       required=true
                       class='col-6' />
    </div>

    <div class="row">
        <x-forms.textarea name='description[en]'
                          type='text'
                          label='Course Description (English)'
                          :value="old('description.en')"
                          class='col-6' />
        <x-forms.textarea name='description[ar]'
                          type='text'
                          label='Course Description (Arabic)'
                          :value="old('description.ar')"
                          class='col-6' />
    </div>

    <div class="row">
        <x-forms.textarea name='objectives[en]'
                          type='text'
                          label='Course Objectives (English)'
                          :value="old('objectives.en')"
                          class='col-6' />
        <x-forms.textarea name='objectives[ar]'
                          type='text'
                          label='Course Objectives (Arabic)'
                          :value="old('objectives.ar')"
                          class='col-6' />
    </div>

    <div class="row">
        <x-forms.array name='aimed_at[en]'
                       classname='aimeden'
                       type='text'
                       label='Aimed at (English)'
                       placeholder='Enter an item'
                       :values="old('aimed_at.en')"
                       class='col-6' />
        <x-forms.array name='aimed_at[ar]'
                       classname='aimedar'
                       type='text'
                       label='Aimed at (Arabic)'
                       placeholder='Enter an item'
                       :values="old('aimed_at.ar')"
                       class='col-6' />
    </div>

    <div class="row pt-4">
        <x-forms.array name='learn_to[en]'
                       type='text'
                       classname='learntoen'
                       label='Learn to (English)'
                       placeholder='Enter an item'
                       :values="old('learn_to.en')"
                       class='col-6' />
        <x-forms.array name='learn_to[ar]'
                       type='text'
                       classname='learntoar'
                       label='Learn to (Arabic)'
                       placeholder='Enter an item'
                       :values="old('learn_to.ar')"
                       class='col-6' />
    </div>

    <div class="row pt-4">
        <x-forms.array-textarea name='modules[en]'
                                type='text'
                                classname='moduleen'
                                label='Module (English)'
                                placeholder="Enter module title, then lessons seperated by '|'"
                                :values="old('modules.en')"
                                class='col-6' />
        <x-forms.array-textarea name='modules[ar]'
                                classname='modulear'
                                type='text'
                                label='Module (Arabic)'
                                placeholder="Enter module title, then lessons seperated by '|'"
                                :values="old('modules.ar')"
                                class='col-6' />
    </div>

    <div class="row">
        <x-forms.input name='duration'
                       type='number'
                       label='Course duration'
                       required=true
                       :value="old('duration')"
                       class='col-6' />
        <x-forms.input name='price'
                       type='number'
                       label='Course price'
                       :value="old('price')"
                       required=true
                       class='col-6' />
    </div>

    <div class="row">
        <x-forms.select name='language'
                        label='Course Language'
                        :options="['en'=>'English','ar'=>'Arabic']"
                        required=true
                        :selected="old('language')"
                        class='col-6' />
        <x-forms.select name='delivery_mode'
                        label='Delivery Mode'
                        :options="['online'=>'Online']"
                        required=true
                        :selected="old('delivery_mode')"
                        class='col-6' />
    </div>

    <div class="row">
        <x-forms.select name='level_id'
                        label='Course level'
                        :options="$levels"
                        :selected="old('level_id')"
                        required=true
                        class='col-6' />
        <x-forms.multi-select name='instructors_id[]'
                              label='Course instructors'
                              :options="$instructors"
                              :selected="old('instructors_id')"
                              class='col-6' />
    </div>

    <div class="row">
        <div class="col-6 pt-4">
            <label>Is Featured?</label>
            <input
                   type="checkbox"
                   name="featured"
                   value="yes"
                   {{ old('featured') == "yes"?'checked':'' }} />
            <x-error-message fieldName=featured />
        </div>
    </div>

    <div class="row justify-content-end">
        <input class="btn btn-success m-2"
               type="submit"
               value="Save" />
    </div>
</form>
<script>
    $('form#createCourse').submit(function () {
        $(':input', this).each(function () {
            this.disabled = !($(this).val());
        });
    });
</script>
@endsection