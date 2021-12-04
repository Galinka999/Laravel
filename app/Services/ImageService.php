<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Image;
use Illuminate\Http\UploadedFile;
use Auth;


class ImageService implements Image
{
    public function imageUpload(UploadedFile $file): string
    {
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid('n_') . "." . $fileExtension;
//        $file->storePubliclyAs(Auth::id(), $fileName, 'news');
        dd($file->storeAs(Auth::id(), $fileName, 'news'));
    }
}
