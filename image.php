<?php
include "utils.php";
$regions = get_regions();
$width = 600;
$height = 600;
// Создаём пустое изображение и добавляем текст
$im = imagecreatetruecolor($width, $height);
imagesavealpha($im, true);
imageantialias($im, true);
$trans_colour = imagecolorallocatealpha($im, 0, 0, 0, 127);
imagefill($im, 0, 0, $trans_colour);
$text_color = imagecolorallocate($im, 233, 14, 91);
$summ = array_reduce($regions, function ($acc, $cur) {
    return $acc + $cur->value;
}, 0);

imagestring($im, 1, 5, 5,  'A Simple Text String ' . $summ . ' summ', $text_color);

$start_angle = 0;

foreach ($regions as $index => $region) {
    $name = $region->name;
    $color = $region->color;
    $value = $region->value;
    $theta = $value / $summ * 360;
    $col_map = hexToRgb($color);
    $region_color = imagecolorallocate($im, $col_map['r'], $col_map['g'], $col_map['b']);
    imagestring($im, 1, 5, $index * 10 + 30, 'summ: '.$summ. 'theta: ' . $theta . ' value: ' . $value, $text_color);

    imagefilledarc($im,  $width / 2, $height / 2, $width, $height, $start_angle, $start_angle + $theta, $region_color, IMG_ARC_PIE);
    $start_angle = $start_angle + $theta;
    // break;
}

// imagecopyresampled($im,$im,0,0,0,0,$width/2,$height/2,$width,$height);
// Выводим изображение
header('Content-Type: image/jpeg');
imagepng($im);
// Освобождаем память
imagedestroy($im);
