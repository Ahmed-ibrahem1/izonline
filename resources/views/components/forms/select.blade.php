<div class="form-group {{ $class??'' }}">
    <label>{!! $label !!}</label>
    <select id="{{ $id??'' }}"
            name="{{ $name }}"
            class="form-control"
            {{ $required??'' }}>
        @if ($nullable??false)
        <option value="">{{ $nullableLabel }}</option>
        @endif
        @foreach ($options as $key=>$value)
        @if (isset($selected) && $selected == $key)
        <option value="{{ $key }}"
                selected>{{ $value }}</option>
        @else
        <option value="{{ $key }}">{{ $value }}</option>
        @endif
        @endforeach
    </select>
    <x-error-message :fieldName="$name" />
</div>