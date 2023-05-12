<div class="form-group {{ $class??'' }}">
    <label class="{{ $labelClass??'' }}">{!! $label !!}</label>
    <select id="{{ $id??'' }}"
            name="{{ $name }}"
            class="form-control {{ $selectClass??'' }}"
            multiple="multiple"
            {{ $required??'' }} multiple>
        @foreach ($options as $key=>$value)
        @if (isset($selected) && in_array($key,$selected))
        <option value="{{ $key }}"
                selected>{{ $value }}</option>
        @else
        <option value="{{ $key }}">{{ $value }}</option>
        @endif
        @endforeach
    </select>
    <x-error-message :fieldName="$name" />
</div>