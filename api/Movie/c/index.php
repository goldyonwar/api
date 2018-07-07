<?php
/**
 * Created by PhpStorm.
 * User: goldyonwar
 * Date: 5/7/17
 * Time: 12:11 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("html_errros", 1);
// File and new size
//$filename = '142.png';
//$percent = 0.5;
//
//// Content type
//header('Content-Type: image/jpeg');
//
//// Get new sizes
//list($width, $height) = getimagesize($filename);
//$newwidth = $width * $percent;
//$newheight = $height * $percent;
//
//// Load
//$thumb = imagecreatetruecolor($newwidth, $newheight);
//$source = imagecreatefrompng($filename);
//
//// Resize
//imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//
//// Output
//imagejpeg($thumb);
$filename = 'giphy.gif';
$source = "/Users/goldyonwar/PhpstormProjects/testing/";
function thumbnail($img, $source, $dest, $maxw, $maxh)
{
    $jpg = $source . $img;

    $extension = explode('.', $img);


    if ($extension[1] == "jpeg" || $extension[1] == "jpg") {
        list($width, $height) = getimagesize($jpg); //$type will return the type of the image
        $source = imagecreatefromjpeg($jpg);

        if ($maxw >= $width && $maxh >= $height) {
            $ratio = 1;
        } elseif ($width > $height) {
            $ratio = $maxw / $width;
        } else {
            $ratio = $maxh / $height;
        }

        $thumb_width = round($width * $ratio); //get the smaller value from cal # floor()
        $thumb_height = round($height * $ratio);

        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

        $path = $dest. $img;
        imagejpeg($thumb, $path, 75);
        imagedestroy($thumb);
        imagedestroy($source);
    } else if ($extension[1] == "png") {
        list($width, $height) = getimagesize($jpg); //$type will return the type of the image
        $source = imagecreatefrompng($jpg);

        if ($maxw >= $width && $maxh >= $height) {
            $ratio = 1;
        } elseif ($width > $height) {
            $ratio = $maxw / $width;
        } else {
            $ratio = $maxh / $height;
        }

        $thumb_width = round($width * $ratio); //get the smaller value from cal # floor()
        $thumb_height = round($height * $ratio);

        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

        $path = $dest. $img;
        imagepng($thumb, $path,9);
        imagedestroy($thumb);
        imagedestroy($source);
    } else if ($extension[1] == "gif") {
        list($width, $height) = getimagesize($jpg); //$type will return the type of the image
        $source = imagecreatefromgif($jpg);

        if ($maxw >= $width && $maxh >= $height) {
            $ratio = 1;
        } elseif ($width > $height) {
            $ratio = $maxw / $width;
        } else {
            $ratio = $maxh / $height;
        }

        $thumb_width = round($width * $ratio); //get the smaller value from cal # floor()
        $thumb_height = round($height * $ratio);

        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

        $path = $dest. $img;
        imagegif($thumb, $path,9);
        imagedestroy($thumb);
        imagedestroy($source);
    }else{
        echo "error";
    }

}

thumbnail($filename, $source, $source, 450, 450);

?>

