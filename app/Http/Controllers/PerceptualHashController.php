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
        $originalImageHash = $this->imageHash->hash(storage_path('images/kamen-rider-black.jpg'));
        $watermarkImageHash = $this->imageHash->hash(storage_path('images/kamen-rider-black-with-watermark.jpg'));
        echo __('Original image hexadecimal image fingerprint: ') . $originalImageHash->toHex() . PHP_EOL;
        echo __('Original image bits image fingerprint: ') . $originalImageHash->toBits() . PHP_EOL;
        echo __('Watermarked image hexadecimal image fingerprint: ') . $watermarkImageHash->toHex() . PHP_EOL;
        echo __('Watermarked image bits image fingerprint: ') . $watermarkImageHash->toBits() . PHP_EOL;
        echo __('The difference between the original image and the watermarked image: ') . $distance = $originalImageHash->distance($watermarkImageHash) . PHP_EOL;
        echo ($distance <= 5) ? __('The original image and the watermarked image are almost the same.') : __('The original image and the watermarked image are different.') . PHP_EOL;
    }
}
