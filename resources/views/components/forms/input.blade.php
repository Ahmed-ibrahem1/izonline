@props(['type','name','label','inputClass','placeholder'=>null,'required' => false,'checked'=> false,'value'=>null, 'class'=>''])

<div class="fw-600 fs-13 ls-1 tas {{ $class }}">
    <label>{!! $label. ($required?' *':'') !!}</label>
    <input
           type="{{ $type }}"
           name="{{ $name }}"
           class="{{ $inputClass??'form-control' }}"
           placeholder="{{ $placeholder?$placeholder:$label }}"
           value="{{ $value }}"
           {{ $required?'required':'' }}
           {{ $checked?'checked':'' }}
           {{ $attributes }}>

    <x-error-message :fieldName="$name" />
</div>