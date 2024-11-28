<div class="d-flex py-1 align-items-center">
    <span class="avatar me-2" style="background-image: url({{ $meal->image_path }})"></span>
    <div class="flex-fill">
        <div class="font-weight-medium">{{ $meal->name }}</div>
        <div class="text-secondary"><a href="#" class="text-reset">{{ Str::limit($meal->description, 20) }}</a></div>
    </div>
</div>
