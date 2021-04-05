<?php

namespace App\Traits;

trait HasImagePath
{
    abstract protected function parentId();

    public function imagePath()
    {
        if (!file_exists($this->pathToImage())) {
            return $this->demoImage();
        }

        return url($this->pathToImage());
    }

    public function thumb()
    {
        if (!file_exists($this->pathToImage('thumbs/'))) {
            return $this->demoImage();
        }

        return url($this->pathToImage('thumbs/'));
    }

    public function pathToImage($thumb = '')
    {
        return 'storage/images/' . $thumb . $this->parentId() . '/' . $this->image;
    }

    public function demoImage()
    {
        return asset('images/demo.jpg');
    }
}