<?php

/*
* Plugin Name: Shogo Forms.
* Description: Shogo Forms is a form submission for worpdress websites and blogs. User can customize any form field they want to display in the front end and with custom field layout to match the layout of the websites and blog. Shogo Forms can also embed to your theme widgets.
* Plugin URI: http://www.github.com/shogo23
* Author: Gervic Caviteno
* Author URI: http://www.facebook.com/gervic23
* Version: 1.0.0
* License: GPLV2
* Requires at least: 4.0
* Tested up to: 4.7
*/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

//Plugin Location Path.
define( 'SF_PATH', plugin_dir_path( __FILE__ ) );

final class Shogo_Forms {

  //Wordpress $wpdb.
  public static $db;

  //Wordpress Prefix.
  public static $wp_pref;

  //Plugin database table name.
  public static $sf_table;


  public function __construct() {

    //Initiate session.
    $this->session();

    //Initiate includes method.
    $this->includes();

    //Initiate globals method.
    $this->globals();

    //Initiate Wordpress Hooks.
    $this->hooks();
  }

  /*********************************************
  * Database Instalation Proccess.
  * This method runs during plugin activation.
  * @version 1.0.0
  **********************************************/
  public function install() {

    /*
    * Make Directory for Upload Files.
    * This directory serve as file upload storage
    */

    //Path to move the uploaded file.
    $location = ABSPATH . '/wp-content/uploads/sf_forms/';

    mkdir( $location, 007, true );

    //Making sure the directory has full permission.
    chmod( $location, 0777 );

    $index = $location . 'index.php';

    $fopen = fopen( $index, 'w' );
             fwrite( $fopen, '' );
             fclose( $fopen );

    //Wordpress $wpdb.
    $db = self::$db;

    //WP Database Prefix.
    $prefix = self::$wp_pref;

    //Plugin table name.
    $table = $prefix . self::$sf_table;

    //Charset Coallate.
    $charset_collate = $db->get_charset_collate();

    //Create Databse Table.
    $sql = "CREATE TABLE $table (
      id bigint(100) NOT NULL AUTO_INCREMENT,
      entry_name VARCHAR(255) DEFAULT '' NOT NULL,
      field_name VARCHAR(255) DEFAULT '' NOT NULL,
      dir_name VARCHAR(255) DEFAULT '' NOT NULL,
      file_size VARCHAR(255) DEFAULT '' NOT NULL,
      filename VARCHAR(255) DEFAULT '' NOT NULL,
      UNIQUE KEY id (id)
    ) $charset_collate;";

    require_once( ABSPATH.'wp-admin/includes/upgrade.php' );

    dbDelta( $sql );

    //Database Table Version.
    add_option('SF_forms', '1.0.0');
  }

  /*******************************************************************
  * Remove all forms, entries and file attachments.
  * Drop Database Rable `$wp->prefix . 'sf_shogo_forms_uploads'`.
  * This method runs during plugin deactivation.
  * @version 1.0.0
  ********************************************************************/
  public function uninstall() {

    //Wordpress $wpdb.
    $db = self::$db;

    //WP Database Prefix.
    $prefix = self::$wp_pref;

    //Plugin table name.
    $table = $prefix . self::$sf_table;

    //Check if there is an existed form fields.
    if ( SF_Methods::has_forms() ) {

      //WP_Query Property
      $args = array( 'post_type' => 'shogo-forms' );

      //Initiate WP_Query.
      $query = new WP_Query( $args );

      //Get List of Forms.
      $forms2 = $query->get_posts();

      //Loop Forms
      foreach ( $forms2 as $form2 ) {

        //Form ID.
        $post_id = $form2->ID;

        //Form Title or Name.
        $post_title = strtolower( str_ireplace( ' ', '-', $form2->post_title ) );

        //Get Form Entries.
        $entries = SF_Methods::get_entries( $post_title );

        //Loop Enrries.
        foreach ( $entries as $entry ) {

          //Entry ID.
          $id = $entry->ID;

          //Entry Title or Ident.
          $ident = $entry->post_title;

          //Check if entry has file attachments.
          if ( SF_Methods::has_file_attachments( $ident ) ) {

            //Get File Attachments Lists.
            $files = SF_Methods::get_file_attachements( $ident );

            //Path to uploaded file.
            $location = ABSPATH . '/wp-content/uploads/sf_forms/';

            //
            foreach ( $files as $file ) {

              //Dir Name.
              $dir_name = $file->dir_name;

              //Filename.
              $filename = $file->filename;

              //Check if file exists.
              if ( file_exists( $location . $dir_name . '/' .$filename ) ) {

                //Delete File.
                unlink( $location . $dir_name . '/' .$filename );

                //Delete Dir.
                rmdir( $location . $dir_name );
              }
            }
          }

          //Delete Entry.
          wp_delete_post( $id );
        }

        //Delete Form.
        wp_delete_post( $post_id );
      }
    }

    //Uploaded files main location.
    $location = ABSPATH . '/wp-content/uploads/sf_forms/';

    //Delete index.php if exists inside sf_forms dir.
    if ( file_exists( $location . 'index.php' ) ) {

      //Delete index.php
      unlink( $location . 'index.php' );

      //Delete sf_forms dir.
      rmdir( $location );
    }

    //DB Query to drop table.
    $sql = "DROP TABLE IF EXISTS ".$table;

    //Drop table.
    $db->query( $sql );
  }

  /*****************
  * Session
  * @version 1.0.0
  ******************/
  private function session() {
    if ( ! session_id() ) {
      session_start();
    }
  }

  /**********************************************
  * Includes php files required for this plugin.
  * @version 1.0.0
  ***********************************************/
  private function includes() {
    include_once SF_PATH . 'includes/sf_methods.php';
    include_once SF_PATH . 'includes/ajax.php';
    include_once SF_PATH . 'includes/user_custom_posts.php';
    include_once SF_PATH . 'includes/admin_page.php';
    include_once SF_PATH . 'includes/shortcode.php';
    include_once SF_PATH . 'includes/widget.php';
  }

  /****************************
  * Initiate Global Variables.
  * @version 1.0.0
  *****************************/
  private function globals() {

    //Global Variables
    global $wpdb;

    //Globalize Wordpress $wpdb;
    self::$db = $wpdb;

    //Globalize Wordpress Databse Prefix.
    self::$wp_pref = $wpdb->prefix;

    //Globalize database table name/
    self::$sf_table = $wp->prefix . 'sf_forms_uploads';
  }

  /***************************
  * Initiate Wordpress Hooks.
  * @version 1.0.0
  ****************************/
  private function hooks() {

    //Initiate install hook.
    register_activation_hook( __FILE__, array( $this, 'install' ) );

    //Initiate unintall hook.
    register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );

    //Initiate admin enqueue scripts.
    add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

    //Initiate enqueue scripts for Front End.
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

    //Initiate Admin Page.
    add_action( 'admin_menu', array( $this, 'admin_page' ) );

    //Initiate custom post type.
    add_action( 'init', array( $this, 'custom_post' ) );

    //Initiate custom post type created by admin.
    add_action( 'init', array( 'SF_user_custom_posts', 'init_custom_post' ) );

    //Initiate admin page generated by admin's custom post type.
    add_action( 'admin_menu', array( 'SF_user_custom_posts', 'init_admin_page' ) );

    //Initiate ajax hook.
    add_action( 'wp_ajax_SF_forms', array( 'SF_Ajax', 'init' ) );

    //Initiate ajax hook for front end.
    add_action( 'wp_ajax_nopriv_SF_forms', array( 'SF_Ajax', 'init' ) );

    //Initiate shortcode
    add_shortcode( 'shogo_forms', array( 'SF_Shortcode', 'init' ) );

    //Initialize Plugin Widget.
		add_action( 'widgets_init', create_function( '', 'return register_widget( "SF_Widget" );') );
  }

  /************************
  * Admin Enqueue Scripts.
  * @version 1.0.0
  ************************/
  public function admin_enqueue_scripts() {
    global $pagenow;

    if ( $pagenow == 'admin.php' && ( $_GET['page'] == 'shogo-forms-page' || $_GET['page'] == 'SF-create-form' || $_GET['page'] == 'SF-about-plugin' ) ) {
      wp_enqueue_script( 'jquery' );
      wp_enqueue_script( 'jquery-ui-sortable' );
      wp_enqueue_script( 'color-picker', plugins_url( '/js/colorpicker/jqColorPicker.min.js', __FILE__ ) );
    }

    if ( $pagenow == 'admin.php' && $_GET['page'] == 'SF-about-plugin' ) {
      wp_enqueue_style( 'SF-viewport-animate', plugins_url( '/css/animate.css', __FILE__ ) );
    }

    wp_enqueue_style( 'SF-admin-style', plugins_url( '/css/SF_admin.css', __FILE__ ) );
  }

  /*******************************
  * Enqueue Scripts for Fron End.
  * @version 1.0.0
  ********************************/
  public function enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style( 'SF-admin-style', plugins_url( '/css/SF_form.css', __FILE__ ) );
    wp_enqueue_script( 'xhr2', plugins_url( '/js/xhr2.js', __FILE__ ) );
  }

  /**********************
  * Plugin's admin page.
  * @version 1.0.0
  ***********************/
  public function admin_page() {

    //Main Page.
    add_menu_page(
      'Shogo Forms',
      'Shogo Forms',
      'manage_options',
      'shogo-forms-page',
      array( 'SF_Admin_Page', 'main' ),
      'dashicons-format-aside'
    );

    //Create Form.
    add_submenu_page(
      'shogo-forms-page',
      'Create Form',
      'Create Form',
      'manage_options',
      'SF-create-form',
      array( 'SF_Admin_Page', 'create_form' )
    );

    //About Plugin
    add_submenu_page(
      'shogo-forms-page',
      'About Plugin',
      'About Plugin',
      'manage_options',
      'SF-about-plugin',
      array( 'SF_Admin_Page', 'about' )
    );
  }

  /***************************
  * Plugin's Custom Post Type.
  * @version 1.0.0
  ****************************/
  public function custom_post() {

    //Single post type name.
    $singular = 'Shogo Form';

    //Plural post type name.
    $plural = 'Shogo Forms';

    //Label Properties.
    $labels = array(
      'name'                  => $plural,
      'singular_name'         => $singular,
      'add_name'              => 'Add New ',
      'add_new_item'          => 'Add new ' . $singular,
      'edit'                  => 'Edit',
      'edit_item'             => 'Edit ' . $singular,
      'new_item'              => 'New ' . $singular,
      'view'                  => 'View ' . $singular,
      'view_item'             => 'View ' . $singular,
      'search_term'           => 'Search ' . $plural,
      'parent'                => 'Parent ' . $singular,
      'not_found'             => 'No ' . $plural . ' found',
      'not_found_in_trash'    => 'No ' . $plural . ' in trash'
    );

    //Custom Post Type Properties.
    $args = array(
      'labels'               => $labels,
      'public'               => true,
      'publicly_queryable'   => true,
      'show_in_nav_menu'     => false,
      'show_ui'              => false,
      'show_in_menu'         => false,
      'show_in_admin_bar'    => false,
      'menu_position'        => 10,
      'can_export'           => true,
      'delete_with_user'     => false,
      'hierarchical'         => true,
      'has_archive'          => true,
      'query_var'            => true,
      'compatibility_type'   => 'page',
      'map_meta_cap'         => true,
      'rewrite'              => array(
                                'slug' => 'shogo-forms',
                                'with_front' => true,
                                'pages' => true,
                                'feeds' => true
                              ),
      'supports'             => array( 'title' )
    );

    register_post_type( 'shogo-forms', $args );
  }
}

function SF_run() {
  return new Shogo_Forms();
}

$GLOBALS['Shogo_Forms'] = SF_run();
