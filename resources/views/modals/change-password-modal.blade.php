<div class="modal modal-blur fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="changePasswordForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Change password')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">@lang('New password')</label>
                        <input type="password" class="form-control" name="new_password" placeholder="@lang('New password')">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('Confirm new password')</label>
                        <input type="password" class="form-control" name="new_password_confirmation"
                            placeholder="@lang('Confirm new password')">
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
