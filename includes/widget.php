<?php

//Exit if accesssed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/********************
* Main Widget Class.
* @version 1.0.0
*********************/
class SF_Widget extends WP_Widget {

  /*****************
	*	Widget Setup
	*	@version 1.0.0
	******************/
  public function __construct() {

    //Setup Class Name and Description.
    $opt = array(
      'classname' => 'Shogo_Widget',
      'description' => 'A form submission to your theme widgets or sidebars. Good for landing pages.'
    );

    //Initialize Plugin's Widget.
    parent::__construct( 'shogo-forms', 'Shogo Forms', $opt );
  }

  /********************
	*	Widget form setup
	*	@version 1.0.0
	*********************/
  public function form( $instance ) {

    //If has instance.
    if ( $instance ) {
      //Append Title.
			$title = esc_attr( $instance['title'] );

      //Append Shortcode.
      $shortcode = esc_attr( $instance['shortcode'] );
    } else {

      //Append Title.
			$title = '';

      //Append Shortcode.
      $shortcode = '';
    }
    ?>

    <label for="<?php echo $this->get_field_id('title'); ?>" class="SF_widget_label">Title:</label><br />
		<input type="text" class="widefat widget_input_title SF_widget_title" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" /><br />
    <label for="<?php echo $this->get_field_id('shortcode'); ?>" class="SF_widget_label">Shortcode:<label><br />
    <input type="text" class="widefat widget_input_title SF_widget_shortcode" id="<?php echo $this->get_field_id('shortcode'); ?>" name="<?php echo $this->get_field_name('shortcode'); ?>" value="<?php echo $shortcode; ?>" />

    <?php
  }

  /**************************
	*	Widget Front End Layout
	*	@version 1.0.0
	***************************/
  public function widget( $args, $instance ) {

    //Extract Args.
		extract( $args );

		//Header Title of the Widget.
		$title = apply_filters( 'Widget_title', $instance['title'] );

    //Shortcode of the Widget.
    $shortcode = $instance['shortcode'];

    ob_start();
		echo $before_widget;

    //if title is not null.
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

    //Initiate Form Shortcode.
    echo do_shortcode( $shortcode );

    echo $after_widget;
		echo ob_get_clean();
  }

  public function update( $new_instance, $old_instance ) {

    //Get Old Intance.
		$instance = $old_instance;

		//Replace Title from the $instance if there is a new.
		$instance['title'] = strip_tags($new_instance['title']);

		//Replace Shortcode from the $instance if there is a new.
		$instance['shortcode'] = strip_tags($new_instance['shortcode']);

		return $instance;
  }
}
