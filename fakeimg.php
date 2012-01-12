<?php
$key = rawurldecode($_REQUEST['key']);
$idx = intval(rawurldecode($_REQUEST['idx']));

$text = substr($key.'-'.$idx, 0, 4);

$w=448; $h=252;
#$w=320; $h=180;
#$w=160; $h=90;
$font = '/usr/share/fonts/truetype/freefont/FreeSerifBold.ttf';
$fontsize=70;
$angle=25;

function hue ($m1, $m2, $h) {
	if ($h<0)   { $h = $h+1.0; }
	if ($h>1)   { $h = $h-1.0; }
	if ($h*6<1) { return $m1+($m2-$m1)*$h*6.0; }
	if ($h*2<1) { return $m2; }
	if ($h*3<2) { return $m1+($m2-$m1)*((2/3.0)-$h)*6.0; }
	return $m1;
}

function hsl2rgb ($im, $h, $s, $l) {
	if ($s == 0.0) { $mr = $mg = $mb = $l; }
	else {
		if ($l<=0.5) { $m2 = $l*($s+1.0); }
		else         { $m2 = $l+$s-($l*$s); }
		$m1 = $l*2.0 - $m2;
		$mr = hue($m1, $m2, ($h+(1/3.0)));
		$mg = hue($m1, $m2,  $h);
		$mb = hue($m1, $m2, ($h-(1/3.0)));
	}
  return imagecolorallocate($im, $mr*255, $mg*255, $mb*255);
}

// Set the content-type
header('Content-Type: image/png');

// create image
$im = imagecreatetruecolor($w, $h);

$white = imagecolorallocate($im, 255, 255, 255);
$grey  = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
$color = hsl2rgb($im, (ord($key)%8)/8.0, 1.0-(($idx%6)/6.0), .8-(($idx%6)/12.0));

if (0) {
	imagefilledrectangle($im, 0, 0, $w-1, $h-1, $black);
	imagefilledrectangle($im, 2, 2, $w-3, $h-3, $color);
} else {
	imagefilledrectangle($im, 0, 0, $w-1, $h-1, $color);
}

// determine center of image
$bbox = ImageTTFBBox($fontsize, $angle, $font, $text);
$X = $bbox[0] + (imagesx($im) - $bbox[4])/2;
$Y = $bbox[1] + (imagesy($im) - $bbox[5])/2;

// shadow
imagettftext($im, $fontsize, $angle, $X+1, $Y+1, $grey, $font, $text);
// text
imagettftext($im, $fontsize, $angle, $X, $Y, $black, $font, $text);

imagepng($im);
imagedestroy($im);
?>
