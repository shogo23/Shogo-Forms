<?php

/******************************************************************************
* Captcha Image. This script is not included to wordpress Shogo Forms Plugin.
* This script runs when captcha field is present.
* @version 1.0.0;
********************************************************************************/

//Start Session to handle captcha values.
session_start();


/*
* $post_name is to prevent captcha data override while multiple forms are used in a single page (Content or Widget).
* Each forms has its own captcha data to process.
*/
if ( isset( $_GET['post_name'] ) ) {
  $post_name = $_GET['post_name'];
} else {
  $post_name = 'dev';
}

/*
* String Length of Captcha. If not set from create form, default value is 10.
* Otherwise if $_SESSION['captcha']['len'] is set, value by the user will be applied.
*/
if ( ! empty( $_SESSION['captcha'][$post_name]['len'] ) ) {
  $len = $_SESSION['captcha'][$post_name]['len'];
} else {
  $len = 10;
}

//Image Size.
$img = imagecreate( 200, 50 );

//Captcha Background Color. If Background is set by the user.
if ( ! empty( $_SESSION['captcha'][$post_name]['background_color'] ) ) {
  $bg_rgb =  $_SESSION['captcha'][$post_name]['background_color'];
  $bg_rgb = ltrim( $bg_rgb, 'rgb(' );
  $bg_rgb = rtrim( $bg_rgb, ')' );
  $bg_rgb = explode( ', ', $bg_rgb );

//Default Background Color.
} else {
  $bg_rgb = array();
  $bg_rgb[0] = 255;
  $bg_rgb[1] = 0;
  $bg_rgb[2] = 0;
}

//String Font Color.
if ( ! empty( $_SESSION['captcha'][$post_name]['font-color'] ) ) {
  $string_rgb =  $_SESSION['captcha'][$post_name]['font-color'];
  $string_rgb = ltrim( $string_rgb, 'rgb(' );
  $string_rgb = rtrim( $string_rgb, ')' );
  $string_rgb = explode( ', ', $string_rgb );
} else {
  $string_rgb = array();
  $string_rgb[0] = 255;
  $string_rgb[1] = 255;
  $string_rgb[2] = 255;
}

//Line Color.
if ( ! empty( $_SESSION['captcha'][$post_name]['line_color'] ) ) {
  $line_rgb =  $_SESSION['captcha'][$post_name]['line_color'];
  $line_rgb = ltrim( $line_rgb, 'rgb(' );
  $line_rgb = rtrim( $line_rgb, ')' );
  $line_rgb = explode( ', ', $line_rgb );
} else {
  $line_rgb = array();
  $line_rgb[0] = 150;
  $line_rgb[1] = 150;
  $line_rgb[2] = 150;
}

//Image Color.
$string_color = imagecolorallocate( $img, $string_rgb[0], $string_rgb[1], $string_rgb[2] );

//Line Color.
$line_color = imagecolorallocate( $img, $line_rgb[0], $line_rgb[1], $line_rgb[2] );

//Image Color Red Background Color.
$background_color = imagecolorallocate( $img, $bg_rgb[0], $bg_rgb[1], $bg_rgb[2] );

//String Characters to be used for generating codes.
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxwz1234567890';

//Random String container.
$str = '';

//Loop to generate random codes.
for ( $i = 0; $i < $len; $i++ ) {
  $num = rand() % 33;
  $tmp = substr( $chars, $num, 1 );
  $str = $str . $tmp;
}

//Generating color lines.
imagefill( $img, 0, 0, $background_color );

//Loop to generate color line sizes and angles.
for ( $i = 1; $i <= 30; $i++ ) {
  $x1 = rand( 0, 200 );
  $y1 = rand( 0, 200 );
  $x2 = rand( 0, 200 );
  $y2 = rand( 0, 200 );

  imageline( $img, $x1, $y1, $x2, $y2, $line_color );
}

//Create Image String.
imagestring( $img, 5, 10, 15, $str, $string_color );

//Create session captcha.
$_SESSION['captcha'][$post_name]['string'] = $str;

//Make an output as image/png.
header("Content-type: image/png");
imagepng( $img );
imagedestroy( $img );
