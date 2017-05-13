<div class="SF_admin_main_nav">
  <ul>
    <li><a class="nav_link <?php if ( $_GET['page'] == 'shogo-forms-page' ) echo 'nav-active'; ?>" href="<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page">Forms</a></li>
    <li><a class="nav_link <?php if ( $_GET['page'] == 'SF-create-form' ) echo 'nav-active'; ?>" href="<?php echo admin_url( 'admin.php' ); ?>?page=SF-create-form">Create Form</a></li>
    <li><a class="nav_link <?php if ( $_GET['page'] == 'SF-about-plugin' ) echo 'nav-active'; ?>" href="<?php echo admin_url( 'admin.php' ); ?>?page=SF-about-plugin">About Plugin</a></li>
  </ul>
  <div style="clear: both;"></div>
</div>

<div class="SF_mobile_admin_main_nav">
	<select class="SF_mobile_nav_select">
		<option value="forms" <?php if ( $_GET['page'] == 'shogo-forms-page' ) echo 'selected'; ?>>Forms</option>
		<option value="create_form" <?php if ( $_GET['page'] == 'SF-create-form' ) echo 'selected'; ?>>Create Form</option>
		<option value="about" <?php if ( $_GET['page'] == 'SF-about-plugin' ) echo 'selected'; ?>>About Plugin</option>
	</select>
</div>

<script type="text/javascript">

	//Call method.
	SF_responsive_action();

	//Window Resize Event.
	jQuery(window).resize(function() {

		//Call Method.
		SF_responsive_action()
	});

	//Method only works for window with width 570 pixels and below.
	function SF_responsive_action() {

		//If window size is equal to 570 or below.
		if ( jQuery(window).width() <= 570 ) {

			//On Change Event.
			jQuery(".SF_mobile_nav_select").on("change", function() {

				//Value of .SF_mobile_nav_select
				var opt = jQuery(this).val();

				//Redirect user on specific admin page.
				switch ( opt ) {

					//If value is forms.
					case "forms":

						//Redirect to forms page.
						location = "<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page";
					break;

					//If Value is create_form.
					case "create_form":

						//Redirect to create_form page.
						location = "<?php echo admin_url( 'admin.php' ); ?>?page=SF-create-form";
					break;

					//If Value is about.
					case "about":

						//Redirect to about plugin page.
						location = "<?php echo admin_url( 'admin.php' ); ?>?page=SF-about-plugin";
					break;
				}
			});
		}
	}
</script>
