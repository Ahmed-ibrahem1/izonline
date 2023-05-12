@props(['fieldName'])

@error($fieldName)
<p class="text-danger small mt5">{{ $message }}</p>
@enderror