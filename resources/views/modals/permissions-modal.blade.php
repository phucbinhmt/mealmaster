<div class="modal modal-blur fade" id="permissionModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="permissionForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Edit permissions')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach (App\Helpers\PermissionHelper::getPermissions() as $permissionGroupName => $permissions)
                        <div class="mb-3">
                            <div class="form-label">@lang($permissionGroupName)</div>
                            <div>
                                @foreach ($permissions as $permission)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $permission->value }}">
                                        <span class="form-check-label">@lang($permission->label())</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>
