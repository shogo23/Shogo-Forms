<?php

/*********************************************************************************************
* This is the view for field attributes like dropdown options, radio bullets, and checkboxes.
* @version 1.0.0
**********************************************************************************************/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

?>

<?php
  /************************
  * If Has Dropdown Field
  *************************/
?>
<?php if ( $field_type == 'dropdown_field' ): ?>
  <?php if ( $_SESSION['create_form'][$pos]['dropdown_field']['options'] ): ?>
    <ul class="SF_dropdown_option_container">
      <?php foreach ( $_SESSION['create_form'][$pos]['dropdown_field']['options'] as $option ): ?>
        <li>
          <label>Option Value:</label><br />
          <input type="text" class="SF_dropdown_option_value" value="<?php if ( $option['value'] ) echo $option['value']; ?>" /> <span title="Delete This Option" class="SF_dropdown_del_option dashicons dashicons-no SF_del"></span> <br />
          <input type="checkbox" class="SF_dropdown_option_select" <?php if ( $option['checked'] == 1 ) echo 'checked="checked"' ?> /> Make as default selection
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <script type="text/javascript">
    //Loop the number of option fields.
    jQuery(".SF_dropdown_option_container li .SF_dropdown_option_value").each(function( c ) {

      //Add 1 for nth-child element referencing.
      var i2 = c + 1;

      jQuery(".SF_dropdown_option_container li:nth-child( " + i2 + " ) .SF_dropdown_option_value").on("keyup input", function() {

        //Ajax Request Values.
        var data = {
          "action": "SF_forms",													//WP-ajax action,
          "operation": "update_dropdown_option_value",	//Ajax Request Operation.
          "pos": <?php echo $pos; ?>,																			//Dropdown Field Current array position.
          "dropdown_pos": c,														//Dropdown Field Option array position.
          "content": jQuery(".SF_dropdown_option_container li:nth-child( " + i2 + " ) .SF_dropdown_option_value").val() //The Value of Keyup.
        };

        //Execute Ajax Request.
        jQuery.post(ajaxurl, data);
      });

      //Dropdown Field Options Selected on Change Event.
      jQuery(".SF_dropdown_option_container li:nth-child( " + i2 + " ) .SF_dropdown_option_select").on("change", function() {

        //If Dropdown is checked.
        if ( jQuery(".SF_dropdown_option_container li:nth-child( " + i2 + " ) .SF_dropdown_option_select").is(":checked") ) {

          //Value is 1.
          var checked = 1;
        } else {

          //Value is 0.
          var checked = 0;
        }

        //Ajax Request Values.
        var data = {
          "action": "SF_forms",															//WP-ajax action,
          "operation": "update_dropdown_option_selected",		//Ajax Request Operation.
          "pos": <?php echo $pos; ?>,																					//Dropdown Field Current array position.
          "dropdown_pos": c,																//Dropdown Field Option array position.
          "content": checked																//Required Value.
        };

        //Execute Ajax Request.
        jQuery.post(ajaxurl, data, function() {

          SF_field_attr( <?php echo $pos ?>, "dropdown_field" );
        });
      });

      //Dropdown Field Delete Option on Click Event.
      jQuery(".SF_dropdown_option_container li:nth-child( " + i2 + " ) .SF_dropdown_del_option").on("click", function() {

        //Ajax Request Values.
        var data = {
          "action": "SF_forms",
          "operation": "update_dropdown_remove_option",
          "pos": <?php echo $pos; ?>,
          "dropdown_pos": c
        };

        //Execute Ajax Request.
        jQuery.post(ajaxurl, data, function() {

          SF_field_attr( <?php echo $pos; ?>, "dropdown_field" );
        });
      });
    });
  </script>
<?php endif; ?>

<?php
  /*********************
  * If Has Radio Field.
  **********************/
?>
<?php if ( $field_type == 'radio_button' ): ?>
  <?php if ( ! empty( $_SESSION['create_form'][$pos]['radio_button']['bullets'] ) ): ?>
    <ul class="SF_radio_buttons_container">
      <?php foreach ( $_SESSION['create_form'][$pos]['radio_button']['bullets'] as $bullet ): ?>
        <li>
          <label for="SF_radio_label">Radio Label:</label><br />
          <input type="text" class="SF_radio_label" value="<?php if ( $bullet['bullet_label'] ) echo $bullet['bullet_label']; ?>" /> <span title="Delete This Bullet" class="SF_radio_del_bullet dashicons dashicons-no SF_del"></span> <br />
          <input type="checkbox" class="SF_radio_button_check" <?php if ( $bullet['checked'] == 1 ) echo 'checked="checked"' ?> /> Make default select.
        </li>
      <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  <script type="text/javascript">
    jQuery(".SF_radio_buttons_container li").each(function( c ) {

      //Add 1 for nth-child element referencing.
      var i2 = c + 1;

      //Radio Field Bullet Label on Keyup Event.
      jQuery(".SF_radio_buttons_container li:nth-child( " + i2 + " ) .SF_radio_label").on("keyup", function() {

        //Ajax Request Values.
        var data = {
          "action": "SF_forms",												//WP-ajax action.
          "operation": "update_radio_bullet_label",		//Ajax Request Operation.
          "pos": <?php echo $pos; ?>,									//Radio Field Array Position.
          "bullet_pos": c,														//Radio Field Bullet Array Position.
          "content": jQuery(".SF_radio_buttons_container li:nth-child( " + i2 + " ) .SF_radio_label").val() //Value of Keyup.
        };

        //Execute Ajax Request.
        jQuery.post(ajaxurl, data);
      });

      //Radio Field Option Selected on Change Event.
      jQuery(".SF_radio_buttons_container li:nth-child( " + i2 + " ) .SF_radio_button_check").on("change", function() {

        //If Checkbox is checked.
        if ( jQuery(".SF_radio_buttons_container li:nth-child( " + i2 + " ) .SF_radio_button_check").is(":checked") ) {

          //Value is 1.
          var checked = 1;
        } else {

          //Value is 0.
          var checked = 0;
        }

        //Ajax Request Values.
        var data = {
          "action": "SF_forms",					//WP-ajax action.
          "operation": "radio_select",	//Ajax Request Operation.
          "pos": <?php echo $pos ?>,											//Radio Field Array Position.
          "bullet_pos": c,							//Radio Field Bullet Array Position.
          "checked": checked						//checked Value.
        };

        //Execute Ajax Request.
        jQuery.post(ajaxurl, data, function() {

          SF_field_attr( <?php echo $pos ?>, "radio_button" );
        });
      });

      //Radio Field Remove Bullet on Click Event.
      jQuery(".SF_radio_buttons_container li:nth-child( " + i2 + " ) .SF_radio_del_bullet").on("click", function() {

        //Ajax Properties.
        var data = {
          "action": "SF_forms",
          "operation": "remove_radio_bullet",
          "pos": <?php echo $pos; ?>,
          "bullet_pos": c
        };

        //Execute Ajax Request.
        jQuery.post(ajaxurl, data, function() {

          SF_field_attr( <?php echo $pos; ?>, "radio_button" );
        });
      });
    });
  </script>
<?php endif; ?>

<?php
  /*****************
  * If Has Checkbox
  ******************/
?>
<?php if ( $field_type == 'checkbox' ): ?>
  <?php if ( ! empty( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] ) ): ?>
    <ul class="SF_checkbox_ch_container">
      <?php foreach ( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] as $ch ): ?>
        <li>
          <label for="SF_radio_label">Checkbox Label:</label><br />
          <input type="text" class="SF_ch_label" value="<?php if ( $ch['checkbox_label'] ) echo $ch['checkbox_label']; ?>" /> <span title="Delete This Checkbox" class="SF_checkbox_del_ch dashicons dashicons-no SF_del"></span> <br />
          <input type="checkbox" class="SF_ch_checked" <?php if ( $ch['checked'] == 1 ) echo 'checked="checked"' ?> /> Check by default.
        </li>
      <?php endforeach; ?>
    </ul>

    <script type="text/javascript">
      jQuery(".SF_checkbox_ch_container li").each(function( c ) {

        //Add 1 for nth-child element referencing.
				var i2 = c + 1;

        //Checkbox Label on Keyup Event.
				jQuery(".SF_checkbox_ch_container li:nth-child( " + i2 + " ) .SF_ch_label").on("keyup", function() {

					//Ajax Request Values.
					var data = {
						"action": "SF_forms",												                                                //WP-ajax action.
						"operation": "update_checkbox_ch_label",		                                                //Ajax Request Operation.
						"pos": <?php echo $pos; ?>,																		                              //Checbox Field Array Position.
						"ch_pos": c,																                                                //Checkbox Field Bullet Array Position.
						"content": jQuery(".SF_checkbox_ch_container li:nth-child( " + i2 + " ) .SF_ch_label").val() //Value of Keyup.
					};

					//Execute Ajax Request.
					jQuery.post(ajaxurl, data);
				});

        //Checkbox Default check on Change Event.
				jQuery(".SF_checkbox_ch_container li:nth-child( " + i2 + " ) .SF_ch_checked").on("change", function() {

					//If Checkbox is checked.
					if ( jQuery(".SF_checkbox_ch_container li:nth-child( " + i2 + " ) .SF_ch_checked").is(":checked") ) {

						//Value is 1.
						var checked = 1;
					} else {

						//Value is 0.
						var checked = 0;
					}

					//Ajax Request Values.
					var data = {
						"action": "SF_forms",							//WP-ajax action.
						"operation": "checkbox_checked",	//Ajax Request Operation.
						"pos": <?php echo $pos; ?>,				//Checbox Field Array Position.
						"ch_pos": c,											//Checbox Field Bullet Array Position.
						"checked": checked								//checked Value.
					};

					//Execute Ajax Request.
					jQuery.post(ajaxurl, data);
				});

        //Checkbox Remove Checkboxes on Click Event.
				jQuery(".SF_checkbox_ch_container li:nth-child( " + i2 + " ) .SF_checkbox_del_ch").on("click", function() {

					//Ajax Properties.
					var data = {
						"action": "SF_forms",
						"operation": "remove_checkbox_ch",
						"pos": <?php echo $pos; ?>,
						"ch_pos": c,
					};

					//Execute Ajax Request.
					jQuery.post(ajaxurl, data, function(r) {

						//Reload create form window.
						SF_field_attr( <?php echo $pos ?>, "checkbox" );
					});
				});
      });
    </script>
  <?php endif; ?>
<?php endif; ?>
