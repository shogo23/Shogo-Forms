<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/*************************
*	Admin Page Callback.
*	@version 1.0.0
**************************/
class SF_Admin_Page {

	/*******************
	*	Admin Nav Menu.
	********************/
	private static function nav() {
		ob_start();

		include_once SF_PATH . 'includes/html/admin_nav.php';

		echo ob_get_clean();
	}

	/*****************************
	*	Admin page main content.
	*	@version 1.0.0
	******************************/
	public function main() {
		ob_start();

		self::nav();

		echo '<br />';

		include_once SF_PATH . 'includes/html/admin_main.php';

		echo ob_get_clean();
	}

  /*****************************
	*	Admin page create form.
	*	@version 1.0.0
	******************************/
  public function create_form() {
    ob_start();

    self::nav();

    include_once SF_PATH . 'includes/html/admin_form_create.php';
  }

  /*****************************
	*	Admin page main about us.
	*	@version 1.0.0
	******************************/
  public function about() {
    ob_start();

    self::nav();

    echo '<br />';

    include_once SF_PATH . 'includes/html/about.php';

    echo ob_get_clean();
  }
}
