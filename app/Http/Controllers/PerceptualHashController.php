<?php

namespace App\Http\Controllers;

use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\DifferenceHash;

class PerceptualHashController extends Controller
{

    private $imageHash;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->imageHash = new ImageHash(new DifferenceHash());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $originalImageHash = $this->imageHash->hash(public_path('images/kamen-rider-black.jpg'));
        $watermarkImageHash = $this->imageHash->hash(public_path('images/kamen-rider-black-with-watermark.jpg'));
        echo '原始圖片雜奏十六進位數字：' . $originalImageHash->toHex() . PHP_EOL;
        echo '原始圖片雜奏整數：' . $originalImageHash->toInt() . PHP_EOL;
        echo '浮水印圖片雜奏十六進位數字：' . $watermarkImageHash->toHex() . PHP_EOL;
        echo '浮水印圖片雜奏整數：' . $watermarkImageHash->toInt() . PHP_EOL;
        echo '原始圖片和浮水印圖片差距：' . $distance = $originalImageHash->distance($watermarkImageHash) . PHP_EOL;
        echo ($distance <= 5) ? '原始圖片和浮水印圖片幾乎相同' : '原始圖片和浮水印圖片不同' . PHP_EOL;
    }
}
