@props(['name','label','placeholder'=>null,'required' => false,'value'=>'', 'class'=>''])

<div class="form-row {{ $class }}">
    <label>{{ $label. ($required?' *':'')}}</label>
    <textarea
              name="{{ $name }}"
              class="form-control"
              placeholder="{{ $placeholder?$placeholder:$label }}"
              rows="5"
              {{ $required?'required':'' }}>{{ $value }}</textarea>

    <x-error-message :fieldName="$name" />
</div>