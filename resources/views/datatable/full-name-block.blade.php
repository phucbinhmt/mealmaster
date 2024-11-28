<div class="d-flex py-1 align-items-center">
    <span class="avatar me-2" style="background-image: url({{ $user->profile_picture_path }})"></span>
    <div class="flex-fill">
        <div class="font-weight-medium">{{ $user->full_name }}</div>
        <div class="text-secondary"><a href="#" class="text-reset">{{ $user->email }}</a></div>
    </div>
</div>
