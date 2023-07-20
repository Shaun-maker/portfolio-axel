<?php

namespace App\Services;

use Imagick;

class ImageProcessor
{
    protected Imagick $imagick;
    protected string $path;
    protected string $extension;
    protected array $exifs;

    public function __construct(Imagick $imagick, string $path)
    {
        $this->imagick = $imagick;
        $this->path = $path;
        $this->extension = pathinfo($path,  PATHINFO_EXTENSION);
        $this->exifs = $imagick->getImageProperties('exif:*');
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
        $this->imagick->setImageProperty('Exif:Make', 'Imagick');
        foreach ($this->exifs as $key => $value) {
            $this->imagick->setImageProperty($key, $value);
        }
        $this->imagick->writeImage('images/profiles/test.webp');
        $this->extension = $format;
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