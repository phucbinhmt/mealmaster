<div class="modal modal-blur fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="userForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Title')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Employee code')</label>
                                <input type="text" class="form-control" name="employee_code"
                                    placeholder="@lang('Employee code')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label">@lang('Role')</label>
                                <select class="form-select tom-select role-select" name="role">
                                    <option value="">@lang('Select role')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('First name')</label>
                                <input type="text" class="form-control" name="first_name"
                                    placeholder="@lang('First name')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Last name')</label>
                                <input type="text" class="form-control" name="last_name"
                                    placeholder="@lang('Last name')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Date of birth')</label>
                                <div class="input-icon mb-2">
                                    <input class="form-control lite-picker" name="date_of_birth" data-mask="00/00/0000"
                                        data-mask-visible="false" placeholder="__/__/____" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Gender')</label>
                                <div class="form-selectgroup">
                                    @foreach (App\Enums\GenderEnum::cases() as $gender)
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="gender" value="{{ $gender->value }}"
                                                class="form-selectgroup-input"
                                                @if ($gender->value == config('gender.default')) checked @endif>
                                            <span class="form-selectgroup-label">{{ Str::title($gender->value) }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Email')</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="@lang('Email')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Phone Number')</label>
                                <input type="tel" class="form-control" name="phone_number"
                                    placeholder="@lang('Phone number')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Address')</label>
                                <input type="text" class="form-control" name="address"
                                    placeholder="@lang('Address')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label">@lang('Province')</label>
                                <select class="form-select tom-select province-select" name="province_id">
                                    <option value="">@lang('Select province')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label">@lang('District')</label>
                                <select class="form-select tom-select district-select" name="district_id">
                                    <option value="">@lang('Select district')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label">@lang('Ward')</label>
                                <select class="form-select tom-select ward-select" name="ward_id">
                                    <option value="">@lang('Select ward')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>
