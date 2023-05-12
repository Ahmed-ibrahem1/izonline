@extends('layout.layout')

@section('content')
<x-pages.hero-title :title="__('footer.bottom-bar-privacy')" />

<div class="container py-5">
    @include('pages.privacy-policy.privacy-policy-'.app()->getLocale())
</div>
@endsection