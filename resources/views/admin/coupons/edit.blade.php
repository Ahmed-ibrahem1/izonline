@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.min.css') }}">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Coupon</h1>

<form id="create-coupon" action="{{ route('admin.coupons.update',$coupon) }}" method="POST">
    @method('PUT')
    @csrf

    <h5>General</h5>
    <hr>
    <section class="row">
        <x-forms.input name='code'
                       type=text
                       label='Code'
                       placeholder='Enter promo code'
                       :value="$coupon->code"
                       required=true
                       class="col-6" />

        <x-forms.textarea name='description'
                          label='Description'
                          placeholder='Coupon Description'
                          :value="$coupon->description"
                          class="col-6" />
    </section>

    <section class="row mt-3">
        <x-forms.select name='discount_type'
                        label="Discount Type"
                        :options="$discountTypes"
                        :selected="$coupon->discount_type"
                        class="col-6" />

        <x-forms.input name='amount'
                       type=number
                       label="Discount Amount"
                       required=true
                       min=1
                       :value="$coupon->amount"
                       class="col-6" />
    </section>

    <h5 class="mt-5">Usage Restrictions</h5>
    <hr>
    <section class="row">
        <x-forms.multi-select selectClass="multiselect"
                              name='user_ids[]'
                              label="Allow Specific Users"
                              labelClass="col-12 p-0"
                              :options="$users"
                              :selected="$coupon->user_ids"
                              class="col-6" />

        <x-forms.multi-select selectClass="multiselect"
                              name='course_ids[]'
                              label="Allow Specific courses"
                              labelClass="col-12 p-0"
                              :selected="$coupon->course_ids"
                              :options="$courses"
                              class="col-6" />
    </section>

    <section class="row">
        <x-forms.input name='all_users'
                       inputClass=''
                       type=checkbox
                       label='Valid for any user?'
                       value=1
                       :checked="$coupon->all_users"
                       class="col-6" />

        <x-forms.input name='all_courses'
                       inputClass=''
                       type=checkbox
                       label='Valid for any course?'
                       value=1
                       :checked="$coupon->all_courses"
                       class="col-6" />
    </section>

    <section class="row mt-4">
        <x-forms.multi-select selectClass="multiselect"
                              name='category_ids[]'
                              label='Allow Specific Categories <span class="small">(Includes Child Categories)</span>'
                              :selected="$coupon->category_ids"
                              labelClass="col-12 p-0"
                              :options="$categories"
                              class="col-6" />
    </section>

    <h5 class="mt-5">Usage Limits</h5>
    <hr>
    <section class="row mt-3">
        <x-forms.input name='usage_limit'
                       type=number
                       label='Number of uses per user <span class="small">(Cant be edited after creation)</span>'
                       :placeholder="$coupon->usage_limit??'Unlimited'"
                       disabled
                       class="col-6" />
    </section>

    <h5 class="mt-5">Scheduling <span class="small">(Leave empty to make coupon valid forever)</span></h5>
    <hr>
    <section class="row mt-3">
        <x-forms.input name='valid_from'
                       type=date
                       :value="$coupon->valid_from->toDateString()"
                       label="Valid From"
                       class="col-6" />

        <x-forms.input name='valid_to'
                       type=date
                       :value="$coupon->valid_to->toDateString()"
                       label="Valid To"
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
        $('.multiselect').multiselect({
            maxHeight:'200',
            includeSelectAllOption:true,
            enableFiltering:true,
            enableCaseInsensitiveFiltering:true,
            enableFullValueFiltering:false,
            widthSynchronizationMode:'ifPopupIsSmaller',
            buttonContainer:'<div class="btn-group w-100" />'
        });
        
        $('form#create-coupon').submit(function() {
            $(':input', this).each(function() {
                if (this.name != 'usage_limit')
                this.disabled = !($(this).val());
            });
        });
    })

</script>
@endsection