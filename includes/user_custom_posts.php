<?php

/************************************************************
* This is the script to convert created forms to post type
* and create admin page to view form entries.
* @version 1.0.0
*************************************************************/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


class SF_user_custom_posts {

  //Convert Custom Post Type.
  public function init_custom_post() {

    //WP Query Properties.
    $args = array(
      'post_type'               => 'shogo-forms',
      'orderby'                 => 'menu_order',
      'order'                   => 'DESC',
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $forms = new WP_Query( $args );

    //Create a Custom Post Type. If There is a form created.
    if ( $forms->have_posts() ) {

      //Loop Forms Created as a Custom Post Types.
      while ( $forms->have_posts() ): $forms->the_post();
        //Single post type name.
        $singular = get_the_title();

        //Plural post type name.
        $plural = get_the_title();

        //Replace spaces to dash.
        $slug = str_ireplace( ' ', '-',  get_the_title() );

        //Lowercase all captital letters.
        $slug = strtolower( $slug );

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
          'show_in_nav_menu'     => true,
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
                                    'slug' => $slug,
                                    'with_front' => true,
                                    'pages' => true,
                                    'feeds' => true
                                  ),
          'supports'             => array( 'title' )
        );

        register_post_type( $slug, $args );
      endwhile;
    }
  }

  //Create Admin Pages.
  public function init_admin_page() {

    //WP Query Properties.
    $args = array(
      'post_type'               => 'shogo-forms',
      'orderby'                 => 'menu_order',
      'order'                   => 'DESC'
    );

    //Initiate WP_Query.
    $forms = new WP_Query( $args );

    //Loop Forms Created as Admin Pages.
    while ( $forms->have_posts() ):
      $forms->the_post();

      //Get Post Title and replace spaces into dashes.
      $title = str_ireplace( ' ', '_', get_the_title() );
      $title2 = str_ireplace( ' ', '-', get_the_title() );

      //Get Unread Entries.
      $unread_count = SF_Methods::get_form_unread_entries( strtolower( $title2 ) );

      //If $unread_count is is morethan 0 print out results.
      if ( $unread_count > 0 ) {
        $unread = SF_Methods::sort_unread( $unread_count );
      } else {
        $unread = '';
      }

      //Initiate Admin Pagees.
      add_menu_page(
        get_the_title(),
        get_the_title() . ' ' . $unread,
        'manage_options',
        $title,
        array( 'SF_user_custom_posts', 'admin_page_callback' ),
        'dashicons-format-aside',
        '10'
      );
    endwhile;
  }

  //Admin Pages Callback.
  public function admin_page_callback() {
    global $post;

    //Admin page static url.
    $page = $_GET['page'];

    //Replace Page Name underscore to dash.
    $page = str_ireplace( '_', '-', strtolower( $page ) );

    //WP Query Properties.
    $args = array(
      'post_type'               => 'shogo-forms',
      'orderby'                 => 'menu_order',
      'order'                   => 'DESC',
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $forms = new WP_Query( $args );


    //Get Specific Post ID and Post name.
    //If Have Post.
    if ( $forms->have_posts() ) {

      //Post ID Container.
      $post_id = 0;

      //Loop Form List.
      while ( $forms->have_posts() ) {
        $forms->the_post();

        //The Post Name.
        $slug = $post->post_name;

        //Get the specific form contents.
        //If $_GET['page'] is equal to the Post Name.
        if ( $page == $slug ) {

          //The Post ID.
          $post_id = get_the_id();

          //Post Name.
          $s = $slug;
        }
      }

      SF_user_custom_posts::admin_page_callback_contents( $post_id, $s );
    }
  }

  //Admin Page Contents.
  private static function admin_page_callback_contents( $post_id, $slug ) {

    //Get All Entries in Specific Post Type (the $slug).
    //WP Query Properties.
    $args = array(
      'post_type'               => $slug,
      'order'                   => 'DESC',
      'no_found_rows'           => true,
      'update_post_term_cache'  => false
    );

    //Initiate WP_Query.
    $forms = new WP_Query( $args );

    //wpdb will be use to check if entry has file attatchments.
    global $wpdb;

    //Prefix.
    $prefix = $wpdb->prefix;

    //sf_forms_upload database table.
    $table = $prefix . 'sf_forms_uploads';

    //Load Contents.
    ob_start();
    include_once SF_PATH . '/includes/html/user_custom_post_contents.php';
    echo ob_get_clean();
  }
}
