<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    // bu method fileni yuklash uchun.
    public function fileUpload($file)
    {
        $url = null;

        if ($file) {
            $imageName = time() . '.' . $file->extension();
            $image_path = $file->storeAs('uploads', $imageName, 'public');
            $url = '/storage/' . $image_path;
        } else {
            $url = null;
        }

        return $url;
    }

    // bu method fileni yangilash uchun.
    public function fileUpdate($file, $newFile)
    {
        $url = null; // bu rasmni pathini olish uchun.
        if ($file) {
            $img = explode('/', $file);
            $originalImg = $img[count($img) - 1];
            // dd($originalImg);
            $exists = Storage::disk('public')->exists('uploads/' . $originalImg);

            if ($exists) {
                Storage::disk('public')->delete('uploads/' . $originalImg);
            }

            $imageName = time() . '.' . $newFile->extension();
            $image_path = $file->storeAs('uploads', $imageName, 'public');

            $url = '/storage/' . $image_path;
        }

        return $url;
    }
}