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
        $this->imagick->clone();
        $this->imagick->setImageformat($format);
        $this->imagick->writeImage('images/profiles/test.webp');
        return $this;
    }

    public function cloneImage()
    {
        $this->imagick->clone();
        $this->imagick->setImageformat("webp");
        $this->imagick->writeImage('images/profiles/test.webp');
        return $this;
    }

    public function destroy()
    {
        $this->imagick->destroy();
    }
}