<?php
require_once ('config.php');
header('Content-Type:image/png');
$im = imagecreatetruecolor(200,80);
$zs = imagecolorallocate($im, 148 ,0,211);
$red = imagecolorallocate($im, 255 ,0,0);
$blue = imagecolorallocate($im, 0 ,0,255);
$black = imagecolorallocate($im,0,0,0,);
$white = imagecolorallocate($im,255,255,255);
$fontcolor=imagecolorallocate($im,rand(0,120),rand(0,120),rand(0,120));

$strs = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
$s = substr($strs,rand(0,strlen($strs)-1),1);
$b = $s;
//$s .= substr($strs,rand(0,strlen($strs)-1),1);
//$s .= substr($strs,rand(0,strlen($strs)-1),1);
//$s .= substr($strs,rand(0,strlen($strs)-1),1);
//imagestring($im,77,10,20,$s,$white);
//$a = substr($strs,rand(0,strlen($strs)-1),1);
//$b = $b.$a;
imagettftext($im,30,mt_rand(-10,30),40,65,imagecolorallocate($im,rand(0,120),rand(0,120),rand(0,120)),'C:\Windows\Fonts\Inkfree.ttf',$s);
$s = substr($strs,rand(0,strlen($strs)-1),1);
$b .= $s;
imagettftext($im,30,mt_rand(-10,30),65,65,imagecolorallocate($im,rand(0,120),rand(0,120),rand(0,120)),'C:\Windows\Fonts\Inkfree.ttf',$s);
$s = substr($strs,rand(0,strlen($strs)-1),1);
$b .= $s;
imagettftext($im,30,mt_rand(-10,30),90,65,imagecolorallocate($im,rand(0,120),rand(0,120),rand(0,120)),'C:\Windows\Fonts\Inkfree.ttf',$s);
$s = substr($strs,rand(0,strlen($strs)-1),1);
$b .= $s;

$_SESSION['code'] = $b;
imagettftext($im,30,mt_rand(-10,30),115,65,imagecolorallocate($im,rand(0,120),rand(0,120),rand(0,120)),'C:\Windows\Fonts\Inkfree.ttf',$s);
imagefill($im,10,10,$zs);
imagepng($im);
?>