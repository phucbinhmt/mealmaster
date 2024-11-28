@extends('layouts.pages-layout')

@section('pageTitle', $pageTitle ?? __('Meal Categories'))

@section('pageTitleAction')
    @php
        $modalId = '#mealCategoryModal';
        $modalLabel = __('New meal category');
    @endphp
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <a href="#" class="btn btn-primary d-none d-sm-inline-block add" data-bs-toggle="modal"
                data-bs-target="{{ $modalId }}">
                {{ $modalLabel }}
            </a>
            <a href="#" class="btn btn-primary d-sm-none btn-icon add" data-bs-toggle="modal"
                data-bs-target="{{ $modalId }}" aria-label="{{ $modalLabel }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('Meal Categories')</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="mealCategoriesTable" class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>@lang('#')</th>
                                <th>@lang('Name')</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('modals.meal-categories-modal');
    @include('modals.confirm-delete-modal');
@endpush

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\StoreMealCategoryRequest', '#mealCategoryForm') !!}
    <script>
        const languages = {
            edit_action: "{{ __('Edit meal category') }}",
            add_action: "{{ __('Add meal category') }}",
            success_title: "{{ __('Success') }}",
            create_success_message: "{{ __('Meal category created successfully') }}",
            update_success_message: "{{ __('Meal category updated successfully') }}",
            delete_success_message: "{{ __('Meal category deleted successfully') }}",
        }
    </script>
    @vite('resources/js/pages/meal-categories.js')
@endpush
