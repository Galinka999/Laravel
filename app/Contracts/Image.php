<?php declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface Image
{
    public function imageUpload(UploadedFile $file): string;
}
