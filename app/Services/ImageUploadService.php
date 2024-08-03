<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function handleImageUploadAndMerge(Request $request, $path)
    {
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs($path, $fileName);
        $request->merge(['image' => $fileName]);
        return $fileName;
    }
    public function updateImage(Request $request, $model, $path)
    {
        if ($request->hasFile('photo')) {
            if ($model->image) {
                Storage::delete($path.'/'.$model->image);
            }
            $fileName = $this->handleImageUploadAndMerge($request, $path);
        } else {
            $request->merge(['image' => $model->image]);
        }
    }
}
