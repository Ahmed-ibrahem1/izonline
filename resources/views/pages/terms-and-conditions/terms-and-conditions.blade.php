@extends('layout.layout')

@section('content')
<x-pages.hero-title :title="__('footer.bottom-bar-terms-and-conditions')" />

<div class="container py-5">
    @include('pages.terms-and-conditions.terms-and-conditions-'.app()->getLocale())
</div>
@endsection