<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Unset has_form.
//unset( $_SESSION['has_form'] );

//Unset create_form.
unset( $_SESSION['create_form'] );

//Unset or Reset $_SESSION['success_settings'].
unset( $_SESSION['success_settings'] );

//After Submitting an Entry. User can modify success message and font color.
$_SESSION['success_settings'] = array(
	'message' => 'Entry Saved!',
	'font-color' => '#04E732',
	'ajax_loader' => 'black',
	'page_redirect' => get_home_url()
);

?>
<div class="SF_error_screen">
	<div class="SF_header">Error! Please resolve the following errors</div>
	<div class="SF_message"></div>
	<div class="SF_choices">
		<span class="SF_ok button">OK</span>
	</div>
</div>
<div class="SF_success_screen"></div>
<div class="SF_admin_cf_container">
	<div class="SF_admin_cf_name_container">
		<label for="SF_admin_cf_form_name">Form Name (Post Type):</label><br />
		<input type="text" class="SF_admin_cf_form_name" maxlength="20" />
	</div>
  <div class="SF_form_btns">
    <ul>
      <li><input type="button" id="SF_text" class="SF_input" value="Text Input" /></li>
			<li><input type="button" id="SF_number" class="SF_input" value="Number Input" /></li>
      <li><input type="button" id="SF_email" class="SF_input" value="Email Field" /></li>
			<li><input type="button" id="SF_dropdown" class="SF_input" value="Dropdown" /></li>
      <li><input type="button" id="SF_radio" class="SF_input" value="Radio Button" /></li>
      <li><input type="button" id="SF_checkbox" class="SF_input" value="Checkbox" /></li>
      <li><input type="button" id="SF_textarea" class="SF_input" value="Textarea" /></li>
			<li><input type="button" id="SF_file" class="SF_input" value="File Attachments" /></li>
			<li><input type="button" id="SF_captcha" value="Captcha" /></li>
      <li><input type="button" id="SF_submit" class="SF_input" value="Submit Button" /></li>
    </ul>
  </div>
  <div class="SF_gen_forms"></div>
	<div class="SF_form_success_contents">
		<ul>
			<li>
				<label>After Entry Submitted Message:</label><br />
				<input type="text" class="SF_after_sub_message" style="color: <?php echo $_SESSION['success_settings']['font-color']; ?>;" value="<?php echo $_SESSION['success_settings']['message']; ?>" />
			</li>
			<li>
				<label>Font Color:</label><br />
				<input type="text" class="SF_after_sub_message_font_color" value="<?php echo $_SESSION['success_settings']['font-color']; ?>" />
			</li>
			<li>
				<label>Select Saving Enrty Loader:</label><br />
				<ul class="SF_forms_ajax_loader_list">
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_black" value="black" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'black' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-black.gif" /><br /></li>
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_blue" value="blue" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'blue' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-blue.gif" /><br /></li>
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_green" value="green" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'green' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-green.gif" /><br /></li>
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_grey" value="grey" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'grey' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-grey.gif" /><br /></li>
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_pink" value="pink" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'pink' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-pink.gif" /><br /></li>
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_red" value="red" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'red' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-red.gif" /><br /></li>
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_violet" value="violet" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'violet' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-violet.gif" /><br /></li>
					<li><input type="radio" name="SF_ajax_loader" class="SF_ajax_loader_yellow" value="yellow" <?php if ( $_SESSION['success_settings']['ajax_loader'] == 'yellow' ) echo 'checked="checked"'; ?> /> <img src="/wp-content/plugins/shogo-forms/img/ajax_loader/ajax-yellow.gif" /><br /></li>
				</ul>
			</li>
			<li>
				<label>After Form Fill Redirect User To Page:</label><br />
				<input type="text" class="SF_page_redirect_url" value="<?php echo $_SESSION['success_settings']['page_redirect']; ?>" />
			</li>
		</ul>
	</div>
  <div class="SF_btns">
    <span class="button-primary SF_btn_save">Save</span> <span class="button-primary SF_btn_clear">Clear All</span>
  </div>
</div>

<script type="text/javascript">

	//.SF_gen_forms Responsive Height.
  var win_height = jQuery(window).height() - 300;

	//Initiate .SF_gen_forms.
  SF_load_create_form();

	//When Field button Clicked.
  var field_button_click = false;

	//SF_gen_forms height setting.
  jQuery(".SF_gen_forms").css({
    "height": win_height + "px"
  });

	//Text Field Button on Click Event.
  jQuery("#SF_text").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "text_field"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
  });

	//Nuber Field Button on Click Event.
	jQuery("#SF_number").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "number_field"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
	});

	//Email Field Button on Click Event.
  jQuery("#SF_email").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "email_field"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
  });

	//Dropdown Field Button on Click Event.
	jQuery("#SF_dropdown").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "dropdown_button"
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
	});

	//Radio Field Button on Click Event.
  jQuery("#SF_radio").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "radio_button"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });

  });

	//Checkox Field Button on Click Event.
  jQuery("#SF_checkbox").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "checkbox"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
  });

	//Textarea Field Button on Click Event.
  jQuery("#SF_textarea").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "textarea"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
  });

	//File Attachment Field Button on Click Event.
	jQuery("#SF_file").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "file_attachments"
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
			SF_load_create_form();
		});
	});

	//Captcha Field Button on Click Event.
	jQuery("#SF_captcha").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
		var data = {
      "action": "SF_forms",
      "operation": "captcha"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
	});

	//Submit Field Button on Click Event.
  jQuery("#SF_submit").on("click", function() {

		//Change Boolean property.
    field_button_click = true;

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "submit"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
  });

	//Clear Form Fields Button on Click Event.
  jQuery(".SF_btn_clear").on("click", function() {

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "clear_form"
    };

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function() {

			//Initiate .SF_gen_forms.
      SF_load_create_form();
    });
  });

	//Method for Ajax Create Form List.
  function SF_load_create_form() {

		//Ajax Properties.
    var data = {
      "action": "SF_forms",
      "operation": "create_form"
    };

		jQuery(".SF_gen_forms").html("<img src='/wp-content/plugins/shogo-forms/img/ajax-loader.gif' /> Please Wait...");

		//Initiate Ajax Request.
    jQuery.post(ajaxurl, data, function(r) {

			//Initiate .SF_gen_forms.
      jQuery(".SF_gen_forms").html(r);

			//Scroll down if field button is clicked.
      if ( field_button_click == true ) {

        SF_scroll_down();

        //Change Boolean property.
        field_button_click = false;
      }
    });
  }

	//Scroll down once user add a field.
	function SF_scroll_down() {
		jQuery(".SF_gen_forms").scrollTop( jQuery(".SF_gen_forms")[0].scrollHeight + jQuery(".SF_gen_forms")[0].clientHeight + 500);
	}

	//Save Button on Click Event.
	jQuery(".SF_btn_save").on("click", function() {

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "form_validation"
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data, function( r ) {

			//If Ajax Response is OK.
			if ( r !== "ok" ) {

				//Show Error Sccreen.
				jQuery(".SF_error_screen").fadeIn(500);

				//Set Validation Message from Ajax Response.
				jQuery(".SF_error_screen .SF_message").html(r);
			} else {

				//Form Name Value.
				var form_name = jQuery(".SF_admin_cf_form_name").val();

				//If Form Name is filled up.
				if ( form_name == "" ) {

					//Show Error Sccreen.
					jQuery(".SF_error_screen").fadeIn(500);

					//Set Validation Message.
					jQuery(".SF_error_screen .SF_message").html("Please provide a form name.");
				} else {

					//Ajax Properties.
					var data2 = {
						"action": "SF_forms",
						"operation": "form_name",
						"form_name": form_name
					};

					//Initiate Ajax Request.
					jQuery.post(ajaxurl, data2, function(r) {

						//If Ajax Response is Exists.
						if ( r == "exists" ) {

							//Show Error Sccreen.
							jQuery(".SF_error_screen").fadeIn(500);

							//Set Validation Message.
							jQuery(".SF_error_screen .SF_message").html("You cannot use this form name. Form Name is already exists or other plugin used this name as Post Type.");
						} else {

							//Ajax Properties.
							var data3 = {
								"action": "SF_forms",
								"operation": "save_form",
								"form_name": form_name
							}

							//Initiate Ajax Request.
							jQuery.post(ajaxurl, data3, function( r ) {

								//If Ajax Response is Ok.
								if ( r == "ok" ) {

									//Scroll Up to show success message.
									jQuery("html, body").animate({
										scrollTop: 0
									}, 300);

									//Show Success Screen and Set Success Massage.
									jQuery(".SF_success_screen").fadeIn(500).html( form_name + " Saved!" );

									//Redirect to shogo forms page in 3 seconds.
									setTimeout(function() {
										location = "<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page";
									}, 3000);
								}
							});
						}
					});
				}
			}
		});
	});

	//Close Error Screen.
	jQuery(".SF_ok").on("click", function() {
		jQuery(".SF_error_screen").fadeOut(500, function() {
			jQuery(".SF_error_screen .SF_message").html("");
		});
	});

	//After Entry Submitted Message.
	jQuery(".SF_after_sub_message").on("keyup", function() {

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_main_success_message",
			"data": jQuery(".SF_after_sub_message").val()
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	//After Entry Submitted Message.
	jQuery(".SF_after_sub_message_font_color").colorPicker({
		renderCallback: function($elm, toggled) {
			if (toggled === true) { // simple, lightweight check
				//
			} else if (toggled === false) {
				//
			} else {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_main_success_message_font_color",
					"data": $elm['text']
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Apply Font Color.
					jQuery(".SF_after_sub_message").attr("style", "color: " + $elm['text']);
				});
			}
		}

	//On Keyup or Input Event.
	}).on("keyup input", function() {

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_main_success_message_font_color",
			"data": jQuery(".SF_after_sub_message_font_color").val()
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data, function() {

			jQuery(".SF_after_sub_message_font_color").on("blur", function() {

				//Apply Font Color.
				jQuery(".SF_after_sub_message").attr("style", "color: " + jQuery(".SF_after_sub_message_font_color").val());
			});
		});
	});

	//Ajax Loader Selections on Click Event.
	jQuery(".SF_ajax_loader_black").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	jQuery(".SF_ajax_loader_blue").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	jQuery(".SF_ajax_loader_green").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	jQuery(".SF_ajax_loader_grey").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	jQuery(".SF_ajax_loader_pink").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	jQuery(".SF_ajax_loader_red").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	jQuery(".SF_ajax_loader_violet").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	jQuery(".SF_ajax_loader_yellow").on("click", function() {

		//Value of input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_loader",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});

	//Page Redirect on Keyup Event.
	jQuery(".SF_page_redirect_url").on("keyup input", function() {

		//Value of Input.
		var input = jQuery(this).val();

		//Ajax Properties.
		var data = {
			"action": "SF_forms",
			"operation": "update_ajax_page_redirect",
			"content": input
		};

		//Initiate Ajax Request.
		jQuery.post(ajaxurl, data);
	});
</script>
