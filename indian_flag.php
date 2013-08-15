<?php
/*
* @package	:	Indian-flag
* @Description:	Draw indian flag on page
* @author 	:	Sarath
* @Created 	:	Aug-15-2013
*/


$flag=imagecreate(1350, 900); //Creating image resource;
if(!$flag) die('Some error occured!!');

//Color allocation
$white=	imagecolorallocate($flag,255,255,255);
$saffron = imagecolorallocate($flag, 255, 153, 51);
$green = imagecolorallocate($flag, 18, 136, 7);
$blue = imagecolorallocate($flag, 00, 0, 137);
//Draw the tricolor sections.The white portion is no need to be specified since
//the background color is white.
imagefilledrectangle($flag, 0, 0, 1350, 300, $saffron);
imagefilledrectangle($flag, 0, 600, 1350, 900, $green);

//Draw the Ashoka Chakra
//The Circle can be created with imageellipse itself after setting the thickness.
//But unfortunetly due to a bug in GD library(reported more than 5 years ago :()
//the thickness is being ignored.
imagefilledellipse($flag, 675, 450, 240, 240, $blue);
imagefilledellipse($flag, 675, 450, 210, 210, $white);






//if the script being invocked from CLI and has a filename arguments then write
//the out put to the file else print to the outputstream.
if (isset($_SERVER['argv'][1])) {
    if(imagejpeg($flag, $_SERVER['argv'][1] . '.jpg', 100))
        echo "National Flag saved to ".$_SERVER['argv'][1] . '.jpg';
    else
        echo "Some error occured";
} else {
    header("Content-type: image/jpeg");
    imagejpeg($flag, null, 100);
}
imagedestroy($flag);

?>