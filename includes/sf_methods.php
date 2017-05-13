<?php

/************************************************************************************
* This script is a request helper to fetch specific data and checking data existance
* and return results.
* @version 1.0.0
*************************************************************************************/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class SF_Methods {

  //Method to check if form name has form fields.
  public function has_forms() {

    //WP_Query Property.
    $args = array(
      'post_type'               => 'shogo-forms'
    );

    //Initiate WP_Query.
    $query = new WP_Query( $args );

    //Return boolean if has form field.
    if ( $query->have_posts() ) {
      return true;
    }

    return false;
  }

  //Method to check if form has entries.
  public static function has_entries( $post_type ) {

    //WP_Query Property.
    $args = array(
      'post_type'               => $post_type,
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $query = new WP_Query( $args );

    //Return boolean if has form field.
    if ( $query->have_posts() ) {
      return true;
    }

    return false;
  }

  //Method to get entries for specific form.
  public static function get_entries( $post_type ) {

    //WP_Query Properties.
    $args = array(
      'post_type'               => $post_type,
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $query = new WP_Query( $args );

    //List of entries via array.
    $entries = $query->get_posts();

    //return request.
    return $entries;
  }

  public static function get_post_title( $post_id ) {

    //Container to get Post Title.
    $post_title = '';

    //WP_Query Properties.
    $args = array(
      'post_type'               => 'shogo-forms',
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $query = new WP_Query( $args );

    //Loop The Query
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();

        //Get The Post Title.
        if ( get_the_id() == $post_id ) {

          //The post title.
          $post_title = get_the_title();
        }
      }

      //Replace spaces to dash.
      $post_title = strtolower( str_ireplace( ' ', '-', $post_title ) );

      //return request.
      return $post_title;
    }
  }

  //Method to check if entry has file attachments.
  public static function has_file_attachments( $post_name ) {

    //Wordpress Database Query.
    global $wpdb;

    //WP Prefix.
    $prefix = $wpdb->prefix;

    //Database table.
    $table = $prefix . 'sf_forms_uploads';

    //Count the Specific file attachment entry record.
    $row_count = $wpdb->get_var( "SELECT COUNT(*) FROM $table WHERE `entry_name` = '$post_name'" );

    //If count is zero or not return has boolean.
    if ( $row_count > 0 ) {
      return true;
    }

    return false;
  }

  //Method to get entry's file attachments.
  public static function get_file_attachements( $post_name ) {

    //Wordpress Database Query.
    global $wpdb;

    //WP Prefix.
    $prefix = $wpdb->prefix;

    //Database table.
    $table = $prefix . 'sf_forms_uploads';

    //Query file attachments record.
    $files = $wpdb->get_results( "SELECT field_name, dir_name, file_size, filename FROM $table WHERE `entry_name` = '$post_name'" );

    //return results.
    return $files;
  }

  //Method to count unread entries.
  public static function get_form_unread_entries( $post_type ) {

    //WP_Query Properties.
    $args = array(
      'post_type'               => $post_type,
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $query = new WP_Query( $args );

    //The Entry lists.
    $forms = $query->get_posts();

    //Default count.
    $count = 0;

    //Loop all entries to find unread entries.
    foreach ( $forms as $f ) {

      //Get Meta Entry Records.
      $meta = get_post_meta( $f->ID );

      //Get the Unread Entries.
      if ( $meta['status'][0] == 'unread' ) {

        //Increment unread count records.
        $count++;
      }
    }

    //Return result.
    return $count;
  }

  //Method to get entry name of specific request.
  public static function get_entry_name( $post_id, $post_type ) {

    //WP_Query Properties.
    $args = array(
      'post_type'               => $post_type,
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $query = new WP_Query( $args );

    //The Posts List.
    $entries = $query->get_posts();

    //Post title container.
    $post_title = '';

    //Loop all entries.
    foreach ( $entries as $entry ) {

      //Get Specific entry name.
      if ( $entry->ID == $post_id ) {

        //The Entry Name.
        $post_title = $entry->post_title;
      }
    }//Initiate WP_Query.

    //Return result.
    return $post_title;
  }

  //Replace || seperator to comma space.
  public static function replace_sep( $str ) {
    return str_ireplace( '||', ', ', $str );
  }

  //Shorten Unread Count String Length.
  public static function sort_unread( $count ) {

    //If String Length is morethan 2.
    if ( strlen( $count ) > 2 ) {

      //Return String Count.
      return '<span style="background-color: red; font-size: 9px; padding: 6px 5px; border-radius: 50%; margin-left: 5px;">99+</span>';
    }

    //Return String Count.
    return '<span style="background-color: red; font-size: 9px; padding: 4px 6px; border-radius: 50%; margin-left: 5px;">' . $count . '</span>';
  }
}
