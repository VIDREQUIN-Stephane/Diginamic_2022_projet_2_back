<?php
function create($string){
    $hash = md5($string);
    $color = substr($hash, 0,6);
    $image = imagecreate(400,400);
    $bg = imagecolorallocate($image,255,255,255);
    $color = imagecolorallocate($image, hexdec(substr($color,0,2)),hexdec(substr($color,2,2)),hexdec(substr($color,4,2)));

    for ($x = 0; $x < 5; $x++){
        for ($y = 0; $y<5;$y++){
            echo $x * 5 + $y;
        }
    }
}