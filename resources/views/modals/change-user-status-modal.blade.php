<div class="modal modal-blur fade" id="changeUserStatusModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="changeUserStatusForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Change user status')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">@lang('Current status'): <span id="currentStatus"></span></label>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label class="form-label">@lang('New status')</label>
                        <select class="form-select tom-select" name="status">
                            <option value="">@lang('Select status')</option>
                            @foreach (App\Enums\UserStatusEnum::cases() as $status)
                                <option value="{{ $status->value }}">@lang(Str::title($status->value))</option>
                            @endforeach
                        </select>
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
