<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class FilesHelper
{
   public static function acceptable(UploadedFile $file): bool
   {
       $extension = $file->extension();
       Log::debug('extension = '.$extension);
       $acceptableExtension = ['doc','docx','pdf','txt'];
       return in_array($extension,$acceptableExtension);
   }
}
