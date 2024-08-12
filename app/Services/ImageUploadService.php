<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function handleImageUploadAndMerge(Request $request, $path, $fieldName)
    {
        $fileName = $request->$fieldName->getClientOriginalName();
        $request->$fieldName->storeAs($path, $fileName);
        $request->merge(['image' => $fileName]);
        return $fileName;
    }

    public function handleMultipleImageUpload(Request $request, $path, $fieldName)
    {
        $fileNames = [];
        if (is_array($request->file($fieldName))) {
            foreach ($request->file($fieldName) as $file) {
                $fileName = $file->getClientOriginalName();
                $file->storeAs($path, $fileName);
                $fileNames[] = $fileName; // Thêm tên file vào mảng
            }
            $request->merge([$fieldName => $fileNames]); // Cập nhật request với mảng tên file
        }
        return $fileNames;
    }

    public function updateImage(Request $request, $model, $path, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            if ($model->image) {
                Storage::delete($path . '/' . $model->image);
            }
            $fileName = $this->handleImageUploadAndMerge($request, $path, $fieldName);
        } else {
            $request->merge(['image' => $model->image]);
        }
    }
}
