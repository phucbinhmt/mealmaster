@extends('layouts.pages-layout')

@section('pageTitle', $pageTitle ?? __('Employee'))

@section('pageTitleAction')
    @php
        $modalId = '#userModal';
        $modalLabel = __('New user');
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
                <h3 class="card-title">@lang('Users')</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="usersTable" class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>@lang('#')</th>
                                <th>@lang('Employee code')</th>
                                <th>@lang('Full Name')</th>
                                <th>@lang('Position')</th>
                                <th>@lang('Status')</th>
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
    @include('modals.users-modal')
    @include('modals.change-password-modal')
    @include('modals.confirm-delete-modal');
    @include('modals.change-avatar-modal');
    @include('modals.change-user-status-modal')
@endpush

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\StoreUserRequest', '#userForm') !!}
    {!! JsValidator::formRequest('App\Http\Requests\ChangePasswordRequest', '#changePasswordForm') !!}
    {!! JsValidator::formRequest('App\Http\Requests\ChangeUserStatusRequest', '#changeUserStatusForm') !!}
    <script>
        const languages = {
            edit_action: "{{ __('Edit user') }}",
            add_action: "{{ __('Add user') }}",
            success_title: "{{ __('Success') }}",
            failed_title: "{{ __('Failed') }}",
            create_success_message: "{{ __('User created successfully') }}",
            update_success_message: "{{ __('User updated successfully') }}",
            delete_success_message: "{{ __('User deleted successfully') }}",
            change_password_success_message: "{{ __('Password changed successfully') }}",
            change_avatar_success_message: "{{ __('Avatar changed successfully') }}",
            change_status_success_message: "{{ __('Status changed successfully') }}",
        }
    </script>
    @vite('resources/js/pages/users.js')
@endpush
