<?php

namespace App\Services;

use Imagick;

class ImageProcessor
{
    protected Imagick $imagick;
    protected string $path;
    protected string $extension;

    public function __construct(Imagick $imagick, string $path)
    {
        $this->imagick = $imagick;
        $this->path = $path;
        $this->extension = pathinfo($path,  PATHINFO_EXTENSION);
        $this->imagick->setImageCompressionQuality(80);
    }

    public function resizeImage(int $height, int $width)
    {
        $this->imagick->resizeImage($height, $width, imagick::FILTER_LANCZOS, 0.5);
        $this->writeImage($this->path);
        return $this;
    }

    public function convertImage(string $format)
    {
        $this->imagick->setImageformat($format);
        $this->extension = $format;
        return $this;
    }

    public function autoRotateImage()
    {
        $orientation = $this->imagick->getImageOrientation();
        
        switch($orientation) {
            case imagick::ORIENTATION_BOTTOMRIGHT: 
                $this->imagick->rotateimage("#000", 180); // rotate 180 degrees
                break;

            case imagick::ORIENTATION_RIGHTTOP:
                $this->imagick->rotateimage("#000", 90); // rotate 90 degrees CW
                break;

            case imagick::ORIENTATION_LEFTBOTTOM: 
                $this->imagick->rotateimage("#000", -90); // rotate 90 degrees CCW
                break;
        }

        $this->imagick->setImageOrientation(imagick::ORIENTATION_TOPLEFT);
        return $this;
    }

    public function writeImage()
    {
        $this->imagick->writeImage($this->path);
        return $this;
    }

    public function cloneImage()
    {
        $uuid = \Illuminate\Support\Str::uuid();
        $filename = $uuid . '.' . $this->extension;
        $newPath = dirname($this->path) . '/' . $filename;
        $this->imagick->writeImage($newPath);
        $this->path = $newPath;
        return $this;
    }

    public function destroy()
    {
        $this->imagick->destroy();
        return $this->path;
    }
}