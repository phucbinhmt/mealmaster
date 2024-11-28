<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait ImageUpload
{
    /**
     * Upload an image to the specified disk and directory.
     *
     * @param UploadedFile $image
     * @param string $disk
     * @param string $directory
     * @return string
     */
    public function uploadImage(UploadedFile $image, string $directory = 'images', string $disk = 'public')
    {
        $filename = bin2hex(random_bytes(16)) . '.' . $image->getClientOriginalExtension();
        $image->storeAs($directory, $filename, $disk);
        return Storage::disk($disk)->url($directory . '/' . $filename);
    }


    /**
     * Delete an image from the specified disk.
     *
     * @param string $path
     * @param string $disk
     * @return bool
     */
    public function deleteImage(string $path, string $disk = 'public')
    {
        return Storage::disk($disk)->delete($path);
    }
}
