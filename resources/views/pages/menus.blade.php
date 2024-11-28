@extends('layouts.pages-layout')

@section('pageTitle', $pageTitle ?? __('Menu'))

@section('content')
    <div class="container container-xl">
        <div id="calendar"></div>
    </div>
@endsection

@push('modals')
    @include('modals.menus-modal')
@endpush

@push('scripts')
    @vite('resources/js/pages/menus.js')
@endpush
