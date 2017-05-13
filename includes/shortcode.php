<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/***************************
* Sortcode Functionalities.
* @version 1.0.0
****************************/
class SF_Shortcode {

  //Initiate Shortcode.
  public function init( $atts, $content = null ) {

    //If shortcode provided a Post ID.
    if ( $atts['id'] ) {

      //Post ID.
      $post_id = $atts['id'];

      //Transfer to content method to process functionalities.
      return SF_Shortcode::content( $post_id );
    }
  }

  //Form Contents.
  private static function content( $post_id ) {
    ob_start();
    include SF_PATH . 'includes/html/shortcode-contents.php';
    $output = ob_get_contents();
    ob_get_clean();
    ob_end_flush();

    return $output;
  }

  //Remove Special Characters.
  private static function ireplace( $str ) {

    $old = array();
    $old[] = ' ';
    $old[] = '-';
    $old[] = '.';
    $old[] = ',';
    $old[] = '/';
    $old[] = '[';
    $old[] = ']';
    $old[] = '/';
    $old[] = '*';
    $old[] = '<';
    $old[] = '>';
    $old[] = "'";
    $old[] = '"';
    $old[] = "(";
    $old[] = ")";
    $old[] = '~';
    $old[] = '!';
    $old[] = '@';
    $old[] = '#';
    $old[] = '$';
    $old[] = '%';
    $old[] = '^';
    $old[] = '&';

    $new = array();
    $new[] = '_';
    $new[] = '_';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';
    $new[] = '';

    $s = stripcslashes( str_ireplace( $old, $new, $str ) );

    return $s;
  }
}
