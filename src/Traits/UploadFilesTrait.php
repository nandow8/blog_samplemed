<?php

namespace App\Traits;

trait UploadFilesTrait 
{
    public function uploadFiles($image, $folder) {
        $uniqueImage = date('Y-m-d') . date('H-i-s');
        $targetPath = WWW_ROOT. 'img'. DS . $folder . DS . $uniqueImage . $image->getClientFilename();
        $image->moveTo($targetPath);
        
        return $folder . '/' . $uniqueImage . $image->getClientFilename();
    }
}
