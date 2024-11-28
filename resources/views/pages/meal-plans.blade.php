@extends('layouts.pages-layout')

@section('pageTitle', $pageTitle ?? __('Meal Plans'))

@section('content')

@endsection

@push('scripts')
    @vite('resources/js/pages/meal-plans.js')
@endpush
