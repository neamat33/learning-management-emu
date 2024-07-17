<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;
use File;

class InputHelper
{

     static public function upload($file, $path)
     {
         // Generate a unique file name
         $file_name = time() . '.webp';
         $destination_path = public_path($path);
 
         // Create the destination directory if it doesn't exist
         if (!file_exists($destination_path)) {
             mkdir($destination_path, 0755, true);
         }
 
         // Convert the image to WebP format and save it
         $image = Image::make($file)->encode('webp', 90);
         $image->save($destination_path . '/' . $file_name);
 
         return $path . $file_name;
     }
     static public function uploadWithCrop($file, $path, $width, $height, $x = null, $y = null)
     {
          $file_name = time() . '.' . $file->getClientOriginalExtension();
          $destination_path = public_path($path);
          $image = Image::make($file->path());
          $image->crop($width, $height, $x, $y)->save($destination_path . $file_name);

          return $path . $file_name;
     }

     public static function delete($path)
     {
          File::delete($path);
     }
}
