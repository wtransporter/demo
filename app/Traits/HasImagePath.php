<?php

namespace App\Traits;

trait HasImagePath
{
    public function imagePath()
    {
        if ($this->imageExists('app/public/images/')) {
            return $this->demoImage();
        }

        return $this->pathToImage();
    }

    public function thumb()
    {
        if ($this->imageExists('app/public/images/thumbs/')) {
            return $this->demoImage();
        }

        return $this->pathToThumb();
    }

    public function pathToThumb()
    {
        return asset('storage/images/thumbs/' . $this->image);
    }

    public function pathToImage()
    {
        return asset('storage/images/' . $this->image);
    }

    public function demoImage()
    {
        return asset('images/demo.jpg');
    }

    protected function imageExists($path)
    {
        return !file_exists(storage_path($path . $this->image)) || is_null($this->image);
    }
}