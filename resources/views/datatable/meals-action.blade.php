<div class="dropdown">
    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown"
        aria-expanded="false">@lang('Actions')</button>
    <div class="dropdown-menu dropdown-menu-end" style="">
        <a class="dropdown-item edit" data-id="{{ $meal->id }}" href="#">@lang('Edit')</a>
        <a class="dropdown-item delete" data-id="{{ $meal->id }}" href="#">@lang('Delete')</a>
    </div>
</div>
