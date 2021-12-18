<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileHandler 

{
    public function uploadFile($file, $uploads_dir)
    {
        if ($file) {
            $originalName = pathInfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . md5(uniqid()) . '.' . $file->guessExtension();
            try {
                $pathForUploads = $uploads_dir;
                $file->move($pathForUploads, $fileName);
                
            } catch (FileException $e) {

            }
        }
        return $pathForUploads . '/' . $fileName;
    }

}