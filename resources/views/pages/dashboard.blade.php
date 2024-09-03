@extends('layouts.pages-layout')

@section('pageTitle', $pageTitle ?? 'Dashboard')

@section('content')
    Dashboard content
@endsection

@push('scripts')
    @vite('resources/js/sample')
@endpush
