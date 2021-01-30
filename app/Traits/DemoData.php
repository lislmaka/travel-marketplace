<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait DemoData
{
    public static function DemoImages($count = 20)
    {
        $directory = public_path('images/demo/demo1');
        $images_array = File::files($directory);

        return $images_array;
    }

    public static function DemoImages2($count = 20)
    {
        $directory = public_path('images/demo/demo2');
        $images_array = File::files($directory);

        return $images_array;
    }

    public static function DemoFaces($count = 20)
    {

        $faces = array();

        for ($i = 1; $i <= $count; $i++) {
            $rnd = rand(0, 99);
            $who = ($rnd >= 50) ? 'women' : 'men';
            $urlToFace = 'https://randomuser.me/api/portraits/'.$who.'/'.$rnd.'.jpg';
            $faces[] = $urlToFace;
        }

        return $faces;
    }
}
