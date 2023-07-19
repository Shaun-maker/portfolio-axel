<?php

namespace App\Services;

use Imagick;

class ImageProcessor
{
    protected $imagick;

    public function __construct(Imagick $imagick)
    {
        $this->imagick = $imagick;
    }

    public function resizeImage($path, int $height, int $width)
    {
        $this->imagick->resizeImage($height, $width, imagick::FILTER_LANCZOS, 0.5);
        $this->imagick->writeImage($path);
        return $this;
    }

    public function convertImage(string $format)
    {
        // TODO
        return "You want to convert image ?";
    }

    public function cloneImage()
    {
        return $this->imagick->clone();
    }

    public function destroy()
    {
        $this->imagick->destroy();
    }
}