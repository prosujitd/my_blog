<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFileTrait
{
    public function uploadUsingStorage($newImage = null, $path = '/', $oldImageWithPath=null)
    {

        // checking new image selected from UI or not
        if ($newImage) {
            $newImageWithPath = $newImage->store($path);        // save new image to server

            if ($oldImageWithPath) {                            // checking old image exist in database or not
                Storage::delete($oldImageWithPath);
            }

            return $newImageWithPath;
        }
        return $oldImageWithPath;
    }

    public function deleteUsingStorage($oldImageWithPath){
        if ($oldImageWithPath) {
            return Storage::delete($oldImageWithPath);
        }
    }
}
