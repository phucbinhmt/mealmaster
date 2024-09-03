<div class="modal modal-blur fade" id="roleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="roleForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Title')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">@lang('Role name')</label>
                        <input type="text" class="form-control" name="name" placeholder="@lang('Role name')">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('Role display name')</label>
                        <input type="text" class="form-control" name="display_name" placeholder="@lang('Role display name')">
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
