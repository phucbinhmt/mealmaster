<div class="modal modal-blur fade" id="changeAvatarModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="changeAvatarForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Change avatar')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <div id="avatarUpload" class="dropzone">
                            <div class="dz-message">
                                @lang('Kéo và thả hình ảnh vào đây hoặc click để tải lên hình ảnh mới')
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
