@extends('admin.layout.layout')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.min.css') }}">
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit User</h1>


<form action="{{ route('admin.users.update',$user) }}" enctype="multipart/form-data" method="POST">
    @method('PUT')
    @csrf




    <section class="row mt-3">
        
        <x-forms.input name='username'
                       type=text
                       label='Username'
                       :value="$user->username"
                       class='col-6' />

        <x-forms.input name='email'
                       type=email
                       label='Email'
                       :value="$user->email"
                       class="col-6 m-auto" />
    </section>
    <section class="row mt-3">
        
        <x-forms.input name='first_name'
                       type='text'
                       label='First name'
                       :value="$user->first_name"
                       class='col-4' />

        <x-forms.input name='middle_name'
                       type=text
                       label='Middle name'
                       :value="$user->middle_name"
                       class="col-4 m-auto" />

        <x-forms.input name='last_name'
                       type=text
                       label='Last name'
                       :value="$user->last_name"
                       class="col-4 m-auto" />
    </section>

    <section class="row mt-3">
        
        <x-forms.input name='password'
                       type=password
                       label='Password'
                       class='col-6' />

        <x-forms.input name='phone_number'
                       inputClass="form-control phone-input" 
                       type="tel" 
                       name="phone_number"
                       label='Phone number'
                       :value="$user->phone_number"
                       class="col-6 m-auto" />

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
        
        $('form#create-user').submit(function() {
            $(':input', this).each(function() {
                this.disabled = !($(this).val());
            });
        });
    })

</script>
@endsection