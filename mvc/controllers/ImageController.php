<?php
namespace App\Controllers;

use App\Models\Stamp;
use App\Providers\Validator;
use App\Providers\View;

class ImageController {
    public function showImage($stampId) {
        $image = new Image();
        $images = $image->selectbyStampId($stampId);

        return $images;
    }
}