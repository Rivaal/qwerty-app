<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tools extends BaseController
{
    public function cropImage()
    {
        $imagePath = 'assets\userimg\cover\KAT001.jpg';
        if (!file_exists($imagePath) || !is_readable($imagePath)) {
            throw new \RuntimeException('Image file not found or not readable');
        }
        $image = Image::make($imagePath);
        $width = $image->width();
        $height = $image->height();



        // Set the output file path and format
        $outputFilePath = 'assets\userimg\cover\KAT001_cropped.jpg';
        $outputFormat = 'jpg';

        if ($width > $height) {
            // Landscape image, crop the right and left edges
            $xOffset = ($width - $height) / 2;
            $image->crop($height, $height, $xOffset, 0);
        } else {
            // Portrait image, crop the top and bottom edges
            $yOffset = ($height - $width) / 2;
            $image->crop($width, $width, 0, $yOffset);
        }

        $image->save($outputFilePath, 80, $outputFormat);
    }
}