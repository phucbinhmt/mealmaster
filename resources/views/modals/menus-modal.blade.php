<div class="modal modal-blur fade" id="menuModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="menuForm">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Title')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="card border-0">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist"
                                id="mealCategoriesTablist">
                                {{-- <li class="nav-item" role="presentation">
                                    <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab"
                                        aria-selected="true" role="tab">Home</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab"
                                        aria-selected="false" role="tab" tabindex="-1">Profile</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab"
                                        aria-selected="false" role="tab" tabindex="-1">Activity</a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" role="tabpanel" id="mealsByCategoryTab">
                                    <div class="form-selectgroup form-selectgroup-boxes">
                                        <label class="form-selectgroup-item flex-fill">
                                            <input type="checkbox" name="meals[]" value="1"
                                                class="form-selectgroup-input">
                                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="me-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div class="form-selectgroup-label-content d-flex align-items-center">
                                                    <div class="card">
                                                        <!-- Photo -->
                                                        <div class="img-responsive img-responsive-21x9 card-img-top"
                                                            style="background-image: url(./static/photos/home-office-desk-with-macbook-iphone-calendar-watch-and-organizer.jpg)">
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="card-title">Card with top image</h3>
                                                            <p class="text-secondary">Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit. Aperiam deleniti fugit
                                                                incidunt, iste, itaque minima
                                                                neque pariatur perferendis sed suscipit velit vitae
                                                                voluptatem.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade active show" id="tabs-home-8" role="tabpanel">
                                    <h4>Home tab</h4>
                                    <div>Cursus turpis vestibulum, dui in pharetra vulputate id sed non turpis ultricies
                                        fringilla at sed facilisis lacus pellentesque purus nibh</div>
                                </div>
                                <div class="tab-pane fade" id="tabs-profile-8" role="tabpanel">
                                    <h4>Profile tab</h4>
                                    <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at
                                        diam, sem nunc amet, pellentesque id egestas velit sed</div>
                                </div>
                                <div class="tab-pane fade" id="tabs-activity-8" role="tabpanel">
                                    <h4>Activity tab</h4>
                                    <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet,
                                        facilisi sit mauris accumsan nibh habitant senectus</div>
                                </div> --}}
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
