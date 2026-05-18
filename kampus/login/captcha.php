<?php
session_start();
// Membuat teks acak 5 digit
$code = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 5);
$_SESSION['captcha_code'] = $code;

// Membuat latar gambar
$image = imagecreate(100, 35);
$background = imagecolorallocate($image, 225, 225, 225); 
$text_color = imagecolorallocate($image, 13, 59, 102);    

// Membuat garis gangguan biar tidak dibaca bot
for($i=0; $i<4; $i++) {
    imageline($image, rand(0, 100), rand(0, 35), rand(0, 100), rand(0, 35), $text_color);
}

imagestring($image, 5, 25, 10, $code, $text_color);

header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>