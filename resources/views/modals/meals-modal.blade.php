<div class="modal modal-blur fade" id="mealModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="mealForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Title')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Meal name')</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="@lang('Meal name')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label">@lang('Meal category')</label>
                                <select class="form-select tom-select meal-category-select" name="meal_category_id">
                                    <option value="">@lang('Select category')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('Price')</label>
                                <input type="text" class="form-control" name="price"
                                    placeholder="@lang('Price')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label">@lang('Status')</label>
                                <select class="form-select tom-select" name="status">
                                    <option value="">@lang('Select status')</option>
                                    @foreach (App\Enums\MealStatusEnum::cases() as $status)
                                        <option value="{{ $status->value }}">@lang(Str::title($status->value))</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('Description')</label>
                        <textarea rows="3" name="description" class="form-control" placeholder="Meal description"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <label class="form-label text-start">@lang('Meal image')</label>
                        <div id="mealImageUpload" class="dropzone">
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
