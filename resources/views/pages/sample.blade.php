@extends('layouts.pages-layout')

@section('pageTitle', $pageTitle ?? __('Sample'))

@section('content')

@endsection

@push('scripts')
    @vite('resources/js/sample')
@endpush
