<?php
$img = imagecreatetruecolor(100 , 50);
$bgcolor = imagecolorallocate($img, 255, 255, 255);
imagefill($img,0,0,$bgcolor);
$text='';
$fontfile = 'arial.ttf';
$captcha = '';
//output pixel
for($i=0; $i < 300 ; $i++){
	$pointcolor = imagecolorallocate($img,mt_rand(50,200),mt_rand(50,200),mt_rand(50,200));
	imagesetpixel($img, mt_rand(0,100), mt_rand(0,50), $pointcolor);
}
//output line
for ($i=0; $i < 15 ; $i++) { 
	$linecolor = imagecolorallocate($img,mt_rand(80,220),mt_rand(80,220),mt_rand(80,220));
	imageline($img, mt_rand(0,100), mt_rand(0,50), mt_rand(0,100), mt_rand(0,50), $linecolor);
}

for ($i=0; $i < 4; $i++) { 
	$textcolor = imagecolorallocate($img,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
	$chars='abcdefghijkmnpqrstuvwxyABCDEFGHJKMNPQRSTUVWXY3456789';
	$text=substr($chars,mt_rand(0,(strlen($chars)-1)),1);
	$captcha.=$text;
	$fontsize=mt_rand(15,20);
	$x = ($i*90/4)+rand(0,15);
	$y = rand(20,40);
	imagettftext ( $img , $fontsize , rand(-10,10) ,$x , $y , $textcolor ,  $fontfile ,  $text );
}

session_start();
$_SESSION['captcha']=$captcha;

//output image
header('Content-type: image/png');
imagepng($img);
imagedestroy($img);