<?php

/**********************
* Form Content.
* This is the shortcode contents of the specific user's created form.
* @version 1.0.0
***********************/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

//The Post Name or Form Name.
$post_title = SF_Methods::get_post_title( $post_id );

//Change dash to underscore.
$post_name = str_ireplace( '-', '_', $post_title );

//Post Meta of Specific Form to get JSON Form fields.
$meta = get_post_meta( $post_id );

//Get All Form Fields and Decode Json Values.
$forms = json_decode( $meta['form_content'][0], true );

//Get All Success Settings and Decode Json Values.
$success_settings = json_decode( $meta['success_settings'][0], true );

//If has File Attachments
$has_file_attachments = false;

//Text Fields Count.
$text_field_count = 0;

//Email Fields Count.
$email_field_count = 0;

//Dropdown Fields Count.
$dropdown_field_count = 0;

//Radio Fields Count.
$radio_button_count = 0;

//Checkbox Fields Count.
$checkbox_field_count = 0;

//Textarea Fields Count.
$textarea_field_count = 0;

//File Attachments Fields Count.
$fa_field_count = 0;

?>

<?php
/*
* If Has Form Fields. Else it will show nothing.
*/
?>
<?php if ( ! empty( $forms ) ): ?>
  <!-- Start Shogo Forms. Form name <?php echo $post_name; ?>. -->
  <div class="SF_forms SF_<?php echo $post_name; ?>">
    <ul>

      <?php
        //Wordpress nonce or csrf protection.
      ?>
      <li class="SF_fields SF_csrf_field">
        <input type="hidden" id="SF_csrf" value="<?php echo wp_create_nonce( 'sf-nonce' ); ?>" />
        <input type="hidden" id="status" value="unread" />
      </li>

      <?php
        //Loop Form Values.
      ?>
      <?php $c_main = 0; foreach ( $forms as $form ): ?>

        <?php
          //If Form Value has Text Fields.
        ?>
        <?php if ( ! empty( $form['text_field'] ) ): ?>
          <?php

            //Increment Text Fields Count.
            $text_field_count += count( $form );

            //Replace Space to Dash.
            $text_field_name = SF_Shortcode::ireplace( $form['text_field']['name'] );

            //Lowercase Capitalize letters.
            $text_field_name = strtolower( $text_field_name );

            //Text Field Label.
            $text_field_label = $form['text_field']['label'];

            //Text Field Style Required.
            $text_field_style_required = $form['text_field']['styles']['required'];
          ?>

          <?php
            /***************
            * Theme Style.
            ****************/
          ?>
          <?php if ( $text_field_style_required == 0 ): ?>
            <li class="SF_fields SF_text_field_<?php echo $text_field_count; ?>">
              <label for="<?php echo $text_field_name; ?>"><?php _e( $text_field_label ); ?></label>
              <input type="text" id="<?php echo $text_field_name; ?>" class="SF_name_field_<?php echo $text_field_count; ?>" />
              <div class="<?php echo $text_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php elseif ( $text_field_style_required == 1 ): ?>
            <?php
              /***************
              * Custom Style.
              ****************/

              //Field Label Font Color.
              $text_field_label_font_color = $form['text_field']['styles']['label_font_color'];

              //Field Label Font Size Types.
              if ( $form['text_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
                $text_field_label_font_size_type = 'px';
              } else if ( $form['text_field']['styles']['label_font_size_type']['pixels'] == 0 ) {
                $text_field_label_font_size_type = '%';
              }

              //Field Label Font Size.
              $text_field_label_font_size = $form['text_field']['styles']['label_font_size_type']['size'];

              //Field Border color.
              $text_field_border_color = $form['text_field']['styles']['border_color'];

              //Field Border Size.
              $text_field_border_size = $form['text_field']['styles']['border_size'];

              //Field Background Color.
              $text_field_background_color = $form['text_field']['styles']['background_color'];

              //Field Font Color.
              $text_field_font_color = $form['text_field']['styles']['font-color'];

              //Field Padding X.
              $text_field_padding_x = $form['text_field']['styles']['padding-x'];

              //Field Padding Y.
              $text_field_padding_y = $form['text_field']['styles']['padding-y'];

              //Field Placeholder.
              $text_field_placeholder = $form['text_field']['styles']['placeholder'];

              //Field Width Types.
              if ( $form['text_field']['styles']['width_type']['pixels'] == 1 ) {
                $text_field_width_type = 'px';
              } else if ( $form['text_field']['styles']['width_type']['percent'] == 1 ) {
                $text_field_width_type = '%';
              }

              //Field Width.
              $text_field_width = $form['text_field']['styles']['width_type']['width'];
            ?>
            <li class="SF_fields SF_text_field_<?php echo $text_field_count; ?>">
              <label style="color: <?php echo $text_field_label_font_color; ?>; font-size: <?php echo $text_field_label_font_size . $text_field_label_font_size_type; ?>;" for="<?php echo $text_field_name; ?>"><?php _e( $text_field_label ); ?></label>
              <input type="text" id="<?php echo $text_field_name; ?>" class="SF_name_field_<?php echo $text_field_count; ?>" style="border: <?php echo $text_field_border_size . 'px solid ' . $text_field_border_color; ?>; background-color: <?php echo $text_field_background_color; ?>; color: <?php echo $text_field_font_color; ?>; padding: <?php echo $text_field_padding_y . 'px ' .$text_field_padding_x .'px'; ?>; width: <?php echo $text_field_width . $text_field_width_type; ?>;" placeholder="<?php echo $text_field_placeholder; ?>" />
              <div class="<?php echo $text_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Number Value has Text Fields.
        ?>
        <?php if ( ! empty( $form['number_field'] ) ): ?>
          <?php

            //Increment Text Fields Count.
            $text_field_count += count( $form );

            //Replace Space to Dash.
            $number_field_name = SF_Shortcode::ireplace( $form['number_field']['name'] );

            //Lowercase Capitalize letters.
            $number_field_name = strtolower( $number_field_name );

            //Text Field Label.
            $number_field_label = $form['number_field']['label'];

            //Number Field Style Required.
            $number_field_style_required = $form['number_field']['styles']['required'];
          ?>
          <?php
            /***************
            * Theme Style.
            ****************/
          ?>
          <?php if ( $number_field_style_required == 0 ): ?>
            <li class="SF_fields SF_number_field_<?php echo $text_field_count; ?>">
              <label for="<?php echo $number_field_name; ?>"><?php _e( $number_field_label ); ?></label>
              <input type="number" id="<?php echo $number_field_name; ?>" class="SF_name_field_<?php echo $number_field_count; ?>" />
              <div class="<?php echo $number_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php elseif ( $number_field_style_required == 1 ): ?>
            <?php
              /***************
              * Custom Style.
              ****************/

              //Field Label Font Color.
              $number_field_label_font_color = $form['number_field']['styles']['label_font_color'];

              //Field Label Font Size Types.
              if ( $form['number_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
                $number_field_label_font_size_type = 'px';
              } else if ( $form['number_field']['styles']['label_font_size_type']['pixels'] == 0 ) {
                $number_field_label_font_size_type = '%';
              }

              //Field Label Font Size.
              $number_field_label_font_size = $form['number_field']['styles']['label_font_size_type']['size'];

              //Field Border color.
              $number_field_border_color = $form['number_field']['styles']['border_color'];

              //Field Border Size.
              $number_field_border_size = $form['number_field']['styles']['border_size'];

              //Field Background Color.
              $number_field_background_color = $form['number_field']['styles']['background_color'];

              //Field Font Color.
              $number_field_font_color = $form['number_field']['styles']['font-color'];

              //Field Padding X.
              $number_field_padding_x = $form['number_field']['styles']['padding-x'];

              //Field Padding Y.
              $number_field_padding_y = $form['number_field']['styles']['padding-y'];

              //Field Placeholder.
              $number_field_placeholder = $form['number_field']['styles']['placeholder'];

              //Field Width Types.
              if ( $form['number_field']['styles']['width_type']['pixels'] == 1 ) {
                $number_field_width_type = 'px';
              } else if ( $form['number_field']['styles']['width_type']['percent'] == 1 ) {
                $number_field_width_type = '%';
              }

              //Field Width.
              $number_field_width = $form['number_field']['styles']['width_type']['width'];
            ?>
            <li class="SF_fields SF_number_field_<?php echo $text_field_count; ?>">
              <label style="color: <?php echo $number_field_label_font_color; ?>; font-size: <?php echo $number_field_label_font_size . $number_field_label_font_size_type; ?>;" for="<?php echo $number_field_name; ?>"><?php _e( $number_field_label ); ?></label>
              <input type="number" id="<?php echo $number_field_name; ?>" class="SF_name_field_<?php echo $number_field_count; ?>" style="border: <?php echo $number_field_border_size . 'px solid ' . $number_field_border_color; ?>; background-color: <?php echo $number_field_background_color; ?>; color: <?php echo $number_field_font_color; ?>; padding: <?php echo $number_field_padding_y . 'px ' .$number_field_padding_x .'px'; ?>; width: <?php echo $number_field_width . $number_field_width_type; ?>;" placeholder="<?php echo $number_field_placeholder; ?>" />
              <div class="<?php echo $number_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Form Value has Email Fields.
        ?>
        <?php if ( $form['email_field'] ): ?>
          <?php

            //Increment Email Fields Count.
            $email_field_count += count( $form );

            //Replace Space to Dash.
            $email_field_name = SF_Shortcode::ireplace( $form['email_field']['name'] );

            //Lowercase Capitalize letters.
            $email_field_name = strtolower( $email_field_name );

            //Email Fields Label.
            $email_field_label = $form['email_field']['label'];

            //Email Field Style Required.
            $email_field_style_required = $form['email_field']['styles']['required'];
          ?>
          <?php
            /**************
            * Theme Style.
            ***************/
          ?>
          <?php if ( $email_field_style_required == 0 ): ?>
            <li class="SF_fields SF_email_field_<?php echo $email_field_count; ?>">
              <label for="<?php echo $email_field_name; ?>"><?php _e( $email_field_label ); ?></label>
              <input type="text" id="<?php echo $email_field_name; ?>" class="SF_email_field_<?php echo $email_field_count; ?>" />
              <div class="<?php echo $email_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php elseif ( $email_field_style_required == 1 ): ?>
            <?php
              /***************
              * Custom Style.
              ****************/

              //Field Label Font Color.
              $email_field_label_font_color = $form['email_field']['styles']['label_font_color'];

              //Field Label Font Size Types.
              if ( $form['email_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
                $email_field_label_font_size_type = 'px';
              } else if ( $form['email_field']['styles']['label_font_size_type']['pixels'] == 0 ) {
                $email_field_label_font_size_type = '%';
              }

              //Field Label Font Size.
              $email_field_label_font_size = $form['email_field']['styles']['label_font_size_type']['size'];

              //Field Border color.
              $email_field_border_color = $form['email_field']['styles']['border_color'];

              //Field Border Size.
              $email_field_border_size = $form['email_field']['styles']['border_size'];

              //Field Background Color.
              $email_field_background_color = $form['email_field']['styles']['background_color'];

              //Field Font Color.
              $email_field_font_color = $form['email_field']['styles']['font-color'];

              //Field Padding X.
              $email_field_padding_x = $form['email_field']['styles']['padding-x'];

              //Field Padding Y.
              $email_field_padding_y = $form['email_field']['styles']['padding-y'];

              //Field Placeholder.
              $email_field_placeholder = $form['email_field']['styles']['placeholder'];

              //Field Width Types.
              if ( $form['email_field']['styles']['width_type']['pixels'] == 1 ) {
                $email_field_width_type = 'px';
              } else if ( $form['email_field']['styles']['width_type']['percent'] == 1 ) {
                $email_field_width_type = '%';
              }

              //Field Width.
              $email_field_width = $form['email_field']['styles']['width_type']['width'];
            ?>
            <li class="SF_fields SF_email_field_<?php echo $email_field_count; ?>">
              <label style="color: <?php echo $email_field_label_font_color; ?>; font-size: <?php echo $email_field_label_font_size . $email_field_label_font_size_type; ?>;" for="<?php echo $email_field_name; ?>"><?php _e( $email_field_label ); ?></label>
              <input type="text" id="<?php echo $email_field_name; ?>" class="SF_email_field_<?php echo $email_field_count; ?>" style="border: <?php echo $email_field_border_size . 'px solid ' . $email_field_border_color; ?>; background-color: <?php echo $email_field_background_color; ?>; color: <?php echo $email_field_font_color; ?>; padding: <?php echo $email_field_padding_y . 'px ' .$email_field_padding_x .'px'; ?>; width: <?php echo $email_field_width . $email_field_width_type; ?>;" placeholder="<?php echo $email_field_placeholder; ?>" />
              <div class="<?php echo $email_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Form Value has Dropdown Fields.
        ?>
        <?php if ( ! empty( $form['dropdown_field'] ) ): ?>
          <?php

            //Increment Dropdown Fields Count.
            $dropdown_field_count += count( $form );

            //Replace Space to Dash.
            $dropdown_field_name = SF_Shortcode::ireplace( $form['dropdown_field']['name'] );

            //Lowercase Capitalize letters.
            $dropdown_field_name = strtolower( $dropdown_field_name );

            //Dropdown Fields Label.
            $dropdown_field_label = $form['dropdown_field']['label'];

            //Dropdown Fields Options. array()
            $dropdown_field_options = $form['dropdown_field']['options'];

            //Dropdown Field Style Required.
            $dropdown_field_style_required = $form['dropdown_field']['styles']['required'];
          ?>
          <?php
            /**************
            * Theme Style.
            ***************/
          ?>

          <?php if ( $dropdown_field_style_required == 0 ): ?>
            <li class="SF_fields SF_dropdown_field_<?php echo $dropdown_field_count; ?>">
              <label for="<?php echo $dropdown_field_name; ?>"><?php _e( $dropdown_field_label ); ?></label>
              <select id="<?php echo $dropdown_field_name ?>" class="SF_dropdown_field_<?php echo $dropdown_field_count; ?>">
                <option value="">Select <?php echo $dropdown_field_label ?></option>
                <?php foreach ( $dropdown_field_options as $option ): ?>
                  <?php if ( $option['checked'] == 1 ): ?>
                    <option value="<?php echo $option['value']; ?>" selected="selected"><?php echo $option['value']; ?></option>
                  <?php else: ?>
                    <option value="<?php echo $option['value']; ?>"><?php echo $option['value']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
              <div class="<?php echo $dropdown_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php elseif ( $dropdown_field_style_required == 1 ): ?>
            <?php
              /***************
              * Custom Style.
              ****************/

              //Field Label Font Color.
              $dropdown_field_label_font_color = $form['dropdown_field']['styles']['label_font_color'];

              //Field Label Font Size Types.
              if ( $form['dropdown_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
                $dropdown_field_label_font_size_type = 'px';
              } else if ( $form['dropdown_field']['styles']['label_font_size_type']['pixels'] == 0 ) {
                $dropdown_field_label_font_size_type = '%';
              }

              //Field Label Font Size.
              $dropdown_field_label_font_size = $form['dropdown_field']['styles']['label_font_size_type']['size'];

              //Field Border color.
              $dropdown_field_border_color = $form['dropdown_field']['styles']['border_color'];

              //Field Border Size.
              $dropdown_field_border_size = $form['dropdown_field']['styles']['border_size'];

              //Field Background Color.
              $dropdown_field_background_color = $form['dropdown_field']['styles']['background_color'];

              //Field Font Color.
              $dropdown_field_font_color = $form['dropdown_field']['styles']['font-color'];

              //Field Padding X.
              $dropdown_field_padding_x = $form['dropdown_field']['styles']['padding-x'];

              //Field Padding Y.
              $dropdown_field_padding_y = $form['dropdown_field']['styles']['padding-y'];

              //Field Width Types.
              if ( $form['dropdown_field']['styles']['width_type']['pixels'] == 1 ) {
                $dropdown_field_width_type = 'px';
              } else if ( $form['dropdown_field']['styles']['width_type']['percent'] == 1 ) {
                $dropdown_field_width_type = '%';
              }

              //Field Width.
              $dropdown_field_width = $form['dropdown_field']['styles']['width_type']['width'];
            ?>
            <li class="SF_fields SF_dropdown_field_<?php echo $dropdown_field_count; ?>">
              <label style="color: <?php echo $dropdown_field_label_font_color; ?>; font-size: <?php echo $dropdown_field_label_font_size . $dropdown_field_label_font_size_type; ?>;" for="<?php echo $dropdown_field_name; ?>"><?php _e( $dropdown_field_label ); ?></label>
              <select id="<?php echo $dropdown_field_name ?>" class="SF_dropdown_field_<?php echo $dropdown_field_count; ?>" style="border: <?php echo $dropdown_field_border_size . 'px solid ' . $dropdown_field_border_color; ?>; background-color: <?php echo $dropdown_field_background_color; ?>; color: <?php echo $dropdown_field_font_color; ?>; padding: <?php echo $dropdown_field_padding_y . 'px ' .$dropdown_field_padding_x .'px'; ?>; width: <?php echo $dropdown_field_width . $dropdown_field_width_type; ?>; height: auto;">
                <option value="">Select <?php echo $dropdown_field_label ?></option>
                <?php foreach ( $dropdown_field_options as $option ): ?>
                  <?php if ( $option['checked'] == 1 ): ?>
                    <option value="<?php echo $option['value']; ?>" selected="selected"><?php echo $option['value']; ?></option>
                  <?php else: ?>
                    <option value="<?php echo $option['value']; ?>"><?php echo $option['value']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
              <div class="<?php echo $dropdown_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Form Value has Radio Fields.
        ?>
        <?php if ( ! empty( $form['radio_button'] ) ): ?>
          <?php

            //Increment Radio Fields Count.
            $radio_button_count += count( $form );

            //Replace Space to Dash.
            $radio_button_name = SF_Shortcode::ireplace( $form['radio_button']['name'] );

            //Lowercase Capitalize letters.
            $radio_button_name = strtolower( $radio_button_name );

            //Radio Fields Label.
            $radio_button_label = $form['radio_button']['label'];

            //Radio Fields Bullets. array()
            $radio_button_bullets = $form['radio_button']['bullets'];

            //Radio Fields Display.
            $radio_field_display = $form['radio_button']['display'];

            //Dropdown Field Style Required.
            $radio_field_style_required = $form['radio_button']['styles']['required'];
          ?>
          <?php
            /**************
            * Theme Style.
            ***************/
          ?>

          <?php if ( $form['radio_button']['styles']['required'] == 0 ): ?>
            <li class="SF_fields SF_radio_field_<?php echo $radio_button_count; ?>">
              <label for="<?php echo $radio_button_name; ?>"><?php _e( $radio_button_label ); ?></label>
              <ul class="<?php if ( $radio_field_display  == 'horizontal' ) echo 'SF_display_horizontal'; elseif ( $radio_field_display == 'vertical' ) echo 'SF_display_vertical'; ?>">
                <?php $b = 0; foreach ( $radio_button_bullets as $bullet ): ?>
                  <?php if ( $bullet['checked'] == 1 ): ?>
                    <li><input type="radio" name="<?php echo $radio_button_name; ?>" class="SF_radio_<?php echo $radio_button_name . '_' . $b; ?>" checked="checked" value="<?php echo $bullet['bullet_label']; ?>" style="padding: 10px 10px;"  /> <?php echo $bullet['bullet_label']; ?></li>
                  <?php else: ?>
                    <li><input type="radio" name="<?php echo $radio_button_name; ?>" class="SF_radio_<?php echo $radio_button_name . '_' . $b; ?>" value="<?php echo $bullet['bullet_label']; ?>" /> <?php echo $bullet['bullet_label']; ?></li>
                  <?php endif; ?>
                <?php $b++; endforeach; ?>
              </ul>
            </li>
          <?php elseif ( $form['radio_button']['styles']['required'] == 1 ): ?>
            <?php
              /***************
              * Custom Style.
              ****************/

              //Field Label Font Color.
              $radio_field_label_font_color = $form['radio_button']['styles']['label_font_color'];

              //Field Label Size Types.
              if ( $form['radio_button']['styles']['label_font_size_type']['pixels'] == 1 ) {
                $radio_field_label_font_size_type = 'px';
              } else if ( $form['radio_button']['styles']['label_font_size_type']['percent'] == 1 ) {
                $radio_field_label_font_size_type = '%';
              }

              //Field Label Size.
              $radio_field_label_font_size = $form['radio_button']['styles']['label_font_size_type']['size'];

              //Field Border color.
              $radio_field_border_color = $form['radio_button']['styles']['border_color'];

              //Field Bullet Color.
              $radio_field_bullet_color = $form['radio_button']['styles']['bullet_color'];

              //Field Background Color.
              $radio_field_background_color = $form['radio_button']['styles']['background_color'];

              //Field Font Color.
              $radio_field_font_color = $form['radio_button']['styles']['font-color'];


            ?>

            <style>
              .SF_<?php echo $post_name; ?> .SF_radio_field_preview_<?php echo $c_main; ?> {
                visibility: hidden;
              }

              .SF_<?php echo $post_name; ?> .SF_radio_check_<?php echo $c_main; ?> {
                display: block;
                float: left;
                border: 5px solid <?php echo $radio_field_border_color; ?>;
                border-radius: 100%;
                height: 25px !important;
                width: 25px !important;
                background: <?php echo $radio_field_background_color; ?>;
                cursor: pointer;
              }

              .SF_<?php echo $post_name; ?> .SF_check_label_<?php echo $c_main; ?> {
                float: left;
                margin-top: 3px;
                margin-left: 5px;
              }

              .SF_<?php echo $post_name; ?> .SF_radio_field_preview_<?php echo $c_main; ?>:checked ~ .SF_radio_check_<?php echo $c_main; ?> {
                background: <?php echo $radio_field_bullet_color ?>;
              }
            </style>
            <li class="SF_fields SF_radio_field_<?php echo $radio_button_count; ?>">
              <label for="<?php echo $radio_button_name; ?>" style="font-size: <?php echo $radio_field_label_font_size . $radio_field_label_font_size_type; ?>; color: <?php echo $radio_field_label_font_color; ?>;"><?php _e( $radio_button_label ); ?></label>
                <ul class="<?php if ( $radio_field_display  == 'horizontal' ) echo 'SF_display_horizontal'; elseif ( $radio_field_display == 'vertical' ) echo 'SF_display_vertical'; ?>">
                  <?php $bc = 0; foreach ( $radio_button_bullets as $bullet ): ?>
                    <li>
                      <?php if ( $bullet['checked'] == 1 ): ?>
                        <input type="radio" name="SF_radio_<?php echo $c_main; ?>" class="SF_radio_field_preview SF_radio_<?php echo $radio_button_name . '_' . $bc; ?> SF_radio_field_preview_<?php echo $c_main; ?> SF_radio_field_for_js_<?php echo $c_main . '_' . $bc; ?> SF_field_preview" value="<?php echo $bullet['bullet_label']; ?>" checked="checked" />
                      <?php else: ?>
                        <input type="radio" name="SF_radio_<?php echo $c_main; ?>" class="SF_radio_field_preview SF_radio_<?php echo $radio_button_name . '_' . $bc; ?> SF_radio_field_preview_<?php echo $c_main; ?> SF_radio_field_for_js_<?php echo $c_main . '_' . $bc; ?> SF_field_preview" value="<?php echo $bullet['bullet_label']; ?>" />
                      <?php endif; ?>
                      <span class="SF_radio_check_<?php echo $c_main; ?> SF_radio_check_for_js_<?php echo $c_main . '_' . $bc; ?>"></span>
                      <span class="SF_check_label_<?php echo $c_main; ?>" style="color: <?php echo $radio_field_font_color; ?>;"><?php echo $bullet['bullet_label']; ?></span>
                    </li>
                  <?php $bc++; endforeach; ?>
                </ul>

                <script type="text/javascript">
                  <?php $bc = 0; foreach ( $radio_button_bullets as $bul ): ?>
                    jQuery(".SF_<?php echo $post_name; ?> .SF_radio_check_for_js_<?php echo $c_main . '_' . $bc; ?>").on("click", function() {
                      jQuery(".SF_radio_field_for_js_<?php echo $c_main . '_' . $bc; ?>").attr("checked", "checked");
                    });
                  <?php $bc++; endforeach; ?>
                </script>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Form Value has Checkbox Fields.
        ?>
        <?php if ( ! empty( $form['checkbox'] ) ): ?>
          <?php

            //Increment Radio Fields Count.
            $checkbox_field_count += count( $form );

            //Replace Space to Dash.
            $checkbox_field_name = SF_Shortcode::ireplace( $form['checkbox']['name'] );

            //Lowercase Capitalize letters.
            $checkbox_field_name = strtolower( $checkbox_field_name );

            //Checkbox Fields Label.
            $checkbox_field_label = $form['checkbox']['label'];

            //Checkbox Header or Main Label of the Checkbox Field.
            $checkbox_field_header = $form['checkbox']['hide_header'];

            //Checkbox Display Position.
            $checkbox_field_display = $form['checkbox']['display'];

            //Field Style Required.
            $checkbox_field_style_required = $form['checkbox']['styles']['required'];
          ?>
          <?php
            /***************
            * Theme Style.
            ****************/
          ?>
          <?php if ( $checkbox_field_style_required == 0 ): ?>
            <li class="SF_fields SF_checkbox_field_<?php echo $checkbox_field_count; ?>">
              <?php if ( $checkbox_field_header == 0 ): ?>
                <label for="<?php echo $checkbox_field_name ?>"><?php _e( $checkbox_field_label ); ?></label>
              <?php endif; ?>
              <ul class="<?php if ( $form['checkbox']['display'] == 'horizontal' ) echo 'SF_display_horizontal'; elseif ( $form['checkbox']['display'] == 'vertical' ) echo 'SF_display_vertical'; ?>">
                <?php $chx = 0; foreach( $form['checkbox']['checkboxes'] as $ch ): ?>
                  <?php

                    //CH Label.
                    $ch_label = SF_Shortcode::ireplace( $ch['checkbox_label'] );

                    //Lowercase Capitalize Letters.
                    $ch_label = strtolower( $ch_label );
                  ?>
                  <li>
                    <input type="checkbox" class="<?php echo $ch_label . '_' . $c_main . '_' . $chx; ?> <?php echo $ch_label . '_' . $chx; ?>" value="<?php echo $ch['checkbox_label'] ?>" <?php if ( $ch['checked'] == 1 ) echo 'checked="checked"';  ?> /> <?php echo $ch['checkbox_label'] ?>
                  </li>
                <?php $chx++; endforeach; ?>
              </ul>

              <div class="<?php echo $checkbox_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php elseif ( $checkbox_field_style_required == 1 ): ?>
            <?php
              /***************
              * Custom Style.
              ****************/

              //Field Label Font Color
              $checkbox_label_font_color = $form['checkbox']['styles']['label_font_color'];

              //Field Label Font Size Types.
              if ( $form['checkbox']['styles']['label_font_size_type']['pixels'] == 1 ) {
                $checkbox_label_font_size_type = 'px';
              } else if ( $form['checkbox']['styles']['label_font_size_type']['percent'] == 1 ) {
                $checkbox_label_font_size_type = '%';
              }

              //Field Label Font Size.
              $checkbox_label_font_size = $form['checkbox']['styles']['label_font_size_type']['size'];

              //Field Border Color.
              $checkbox_field_border_color = $form['checkbox']['styles']['border_color'];

              //Field Background Color.
              $checkbox_field_background_color =  $form['checkbox']['styles']['background_color'];

              //Field Check Sign Color.
              $checkbox_field_check_color = $form['checkbox']['styles']['check_color'];

              //Field Font Color.
              $checkbox_field_font_color = $form['checkbox']['styles']['font-color'];
            ?>
            <li class="SF_fields SF_checkbox_field_<?php echo $checkbox_field_count; ?>">
              <style>
                .SF_<?php echo $post_name; ?> .SF_checkbox_form_<?php echo $c_main; ?> input[type=checkbox] {
                  display: none;
                }

                .SF_<?php echo $post_name; ?> .SF_checkbox_form_<?php echo $c_main; ?> input[type=checkbox] + .SF_label_<?php echo $c_main; ?> {
                  display: block;
                  margin-bottom: 10px;
                  position: relative;
                  cursor:  pointer;
                }

                .SF_<?php echo $post_name; ?> .SF_checkbox_form_<?php echo $c_main; ?> input[type=checkbox] + .SF_label_<?php echo $c_main; ?>:before {
                  content: "";
                  border: 1px solid <?php echo $checkbox_field_border_color; ?>;
                  display: inline-block;
                  width: 20px;
                  height: 20px;
                  border-radius: 3px;
                  background-color: <?php echo $checkbox_field_background_color; ?>;
                  float: left;
                  position: relative;
                  right: 5px;
                }

                .SF_<?php echo $post_name; ?> .SF_checkbox_form_<?php echo $c_main; ?> input[type=checkbox]:checked + .SF_label_<?php echo $c_main; ?>:before {
                  content: "\2714";
                  color: <?php echo $checkbox_field_check_color; ?>;
                  text-align: center;
                  line-height: 20px
                }
              </style>

              <?php if ( $checkbox_field_header == 0 ): ?>
                <label for="<?php echo $checkbox_field_name ?>" style="color: <?php echo $checkbox_label_font_color ?>; font-size: <?php echo $checkbox_label_font_size . $checkbox_label_font_size_type; ?>;"><?php _e( $checkbox_field_label ); ?></label>
              <?php endif; ?>
              <form class="SF_checkbox_form SF_checkbox_form_<?php echo $c_main; ?>">
                <ul class="<?php if ( $form['checkbox']['display'] == 'horizontal' ) echo 'SF_display_horizontal'; elseif ( $form['checkbox']['display'] == 'vertical' ) echo 'SF_display_vertical'; ?>">
                  <?php $chx = 0; foreach( $form['checkbox']['checkboxes'] as $ch ): ?>
                    <?php

                      //CH Label.
                      $ch_label = SF_Shortcode::ireplace( $ch['checkbox_label'] );

                      //Lowercase Capitalize Letters.
                      $ch_label = strtolower( $ch_label );
                    ?>
                    <li>
                      <input type="checkbox" class="SF_checkbox <?php echo $ch_label . '_' . $c_main . '_' . $chx; ?> SF_checkbox_field_<?php echo $c_main; ?> SF_checkbox_field_<?php echo $c_main . '_' . $chx; ?>" value="<?php echo $ch['checkbox_label']; ?>" <?php if ( $ch['checked'] == 1 ) echo 'checked="checked"'; ?> />
                      <label class="SF_label SF_label_<?php echo $c_main; ?> SF_label_<?php echo $c_main . '_' . $chx; ?>" for="<?php echo $ch['checkbox_label']; ?>" style="color: <?php echo $checkbox_field_font_color; ?>;"><?php echo $ch['checkbox_label']; ?></label>
                    </li>
                  <?php $chx++; endforeach; ?>
                </ul>
              </form>

              <script type="text/javascript">
                <?php $chx = 0; foreach ( $form['checkbox']['checkboxes'] as $chjs ): ?>
                  <?php if ( $chjs['checked'] == 1 ): ?>
                    var SF_<?php echo $post_name; ?>_ch_toggle_<?php echo $c_main . '_' . $chx; ?> = true;
                  <?php elseif ( $chjs['checked'] == 0 ): ?>
                    var SF_<?php echo $post_name; ?>_ch_toggle_<?php echo $c_main . '_' . $chx; ?> = false;
                  <?php endif; ?>

                  jQuery(".SF_<?php echo $post_name; ?> .SF_label_<?php echo $c_main . '_' . $chx; ?>").on("click", function() {
                    if ( SF_<?php echo $post_name; ?>_ch_toggle_<?php echo $c_main . '_' . $chx; ?> == false ) {
                      SF_<?php echo $post_name; ?>_ch_toggle_<?php echo $c_main . '_' . $chx; ?> = true;

                      jQuery(".SF_<?php echo $post_name; ?> .SF_checkbox_field_<?php echo $c_main . '_' . $chx; ?>").attr("checked", "checked");
                    } else {
                      SF_<?php echo $post_name; ?>_ch_toggle_<?php echo $c_main . '_' . $chx; ?> = false;

                      jQuery(".SF_<?php echo $post_name; ?> .SF_checkbox_field_<?php echo $c_main . '_' . $chx; ?>").attr("checked", false);
                    }
                  });
                <?php $chx++; endforeach; ?>
              </script>
              <div class="<?php echo $checkbox_field_name; ?>-error">&nbsp;</div>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Form Value has Textarea Fields.
        ?>
        <?php if ( ! empty( $form['textarea'] ) ): ?>
          <?php

            //Increment Textarea Fields Count.
            $textarea_field_count += count( $form );

            //Replace Space to Dash.
            $textarea_field_name = SF_Shortcode::ireplace( $form['textarea']['name'] );

            //Lowercase Capitalize letters.
            $textarea_field_name = strtolower( $textarea_field_name );

            //Checkbox Fields Label.
            $textarea_field_label = $form['textarea']['label'];

            //Textarea Column size.
            $textarea_field_cols = $form['textarea']['cols'];

            //Textarea Rows size.
            $textarea_field_rows = $form['textarea']['rows'];

            //Textarea Field Style Required.
            $textarea_field_style_required = $form['textarea']['styles']['required'];
          ?>
          <?php
            /***************
            * Theme Style.
            ****************/
           ?>
           <?php if ( $textarea_field_style_required == 0 ): ?>
              <li class="SF_fields SF_textarea_field_<?php echo $textarea_field_count; ?>">
                <label for="<?php echo $textarea_field_name; ?>"><?php _e( $textarea_field_label ); ?></label>
                <textarea id="<?php echo $textarea_field_name; ?>" class="SF_textarea_field_<?php echo $textarea_field_count; ?>"></textarea>
                <div class="<?php echo $textarea_field_name; ?>-error">&nbsp;</div>
              </li>
            <?php elseif ( $textarea_field_style_required == 1 ): ?>
              <?php
                /***************
                * Custom Style.
                ***************/

                //Field Label Font Color.
                $textarea_field_label_font_color = $form['textarea']['styles']['label_font_color'];

                //Field Label Font Size Types.
                if ( $form['textarea']['styles']['label_font_size_type']['pixels'] == 1 ) {
                  $textarea_field_label_font_size_type = 'px';
                } else if ( $form['textarea']['styles']['label_font_size_type']['pixels'] == 0 ) {
                  $textarea_field_label_font_size_type = '%';
                }

                //Field Label Font Size.
                $textarea_field_label_font_size = $form['textarea']['styles']['label_font_size_type']['size'];

                //Field Label Size.
                $textarea_field_label_size = $form['textarea']['styles']['label_font_size_type']['size'];

                //Field Border color.
                $textarea_field_border_color = $form['textarea']['styles']['border_color'];

                //Field Border Size.
                $textarea_field_border_size = $form['textarea']['styles']['border_size'];

                //Field Background Color.
                $textarea_field_background_color = $form['textarea']['styles']['background_color'];

                //Field Font Color.
                $textarea_field_font_color = $form['textarea']['styles']['font-color'];

                //Field Padding X.
                $textarea_field_padding_x = $form['textarea']['styles']['padding-x'];

                //Field Padding Y.
                $textarea_field_padding_y = $form['textarea']['styles']['padding-y'];

                //Field Placeholder.
                $textarea_field_placeholder = $form['textarea']['styles']['placeholder'];

                //Field Width Types.
                if ( $form['textarea']['styles']['width_type']['pixels'] == 1 ) {
                  $textarea_field_width_type = 'px';
                } else if ( $form['textarea']['styles']['width_type']['percent'] == 1 ) {
                  $textarea_field_width_type = '%';
                }

                //Field Width.
                $textarea_field_width = $form['textarea']['styles']['width_type']['width'];

                //Field Height Types
                if ( $form['textarea']['styles']['height_type']['pixels'] == 1 ) {
                  $textarea_field_style_height_type = 'px';
                } else if ( $form['textarea']['styles']['height_type']['percent'] == 1 ) {
                  $textarea_field_style_height_type = '%';
                }

                //Field Height.
                $textarea_field_style_height = $form['textarea']['styles']['height_type']['height'];
              ?>
              <li class="SF_fields SF_textarea_field_<?php echo $textarea_field_count; ?>">
                <label style="color: <?php echo $textarea_field_label_font_color; ?>; font-size: <?php echo $textarea_field_label_font_size . $textarea_field_label_font_size_type; ?>;" for="<?php echo $textarea_field_name; ?>"><?php _e( $textarea_field_label ); ?></label>
                <textarea id="<?php echo $textarea_field_name; ?>" class="SF_textarea_field_<?php echo $textarea_field_count; ?>"  style="border: <?php echo $textarea_field_border_size . 'px solid ' . $textarea_field_border_color; ?>; background-color: <?php echo $textarea_field_background_color; ?>; color: <?php echo $textarea_field_font_color; ?>; padding: <?php echo $textarea_field_padding_y . 'px ' .$textarea_field_padding_x .'px'; ?>; width: <?php echo $textarea_field_width . $textarea_field_width_type; ?>; height: <?php echo $textarea_field_style_height . $textarea_field_style_height_type; ?>;" placeholder="<?php echo $textarea_field_placeholder; ?>"></textarea>
                <div class="<?php echo $textarea_field_name; ?>-error">&nbsp;</div>
              </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ( $form['file_attachments'] ): ?>
          <?php

            //Has File Attachments.
            $has_file_attachments = true;

            //Increment File Attachments Fields Count.
            $fa_field_count += count( $form );

            //Replace Space to Dash.
            $fa_field_name = SF_Shortcode::ireplace( $form['file_attachments']['name'] );

            //Lowercase Capitalize letters.
            $fa_field_name = strtolower( $fa_field_name );

            //File Attachments Label.
            $fa_field_label = $form['file_attachments']['label'];

            //File Attachments Max Size.
            $fa_field_max_size = $form['file_attachments']['max_size'];

            //File Attachments File Types.
            $fa_field_file_types = $form['file_attachments']['file_types'];

            //Textarea Field Style Required.
            $fa_field_style_required = $form['file_attachments']['styles']['required'];
          ?>
          <?php
            /***************
            * Theme Style.
            ****************/
           ?>
           <?php if ( $form['file_attachments']['styles']['required'] == 0 ): ?>
              <li class="SF_fields_<?php echo $fa_field_count; ?>">
                <label for="<?php echo $fa_field_name; ?>"><?php _e( $fa_field_label ); ?></label>
                <input type="file" id="<?php echo $fa_field_name ?>" name="<?php echo $fa_field_name; ?>" class="SF_file_attachments_<?php _e( $fa_field_count ); ?>" />
                <div class="<?php echo $fa_field_name; ?>-error">&nbsp;</div>
              </li>
            <?php elseif ( $form['file_attachments']['styles']['required'] == 1 ): ?>
              <?php
                /***************
                * Custom Style.
                ***************/

                //Field Label Font Color.
                $fa_field_label_font_color = $form['file_attachments']['styles']['label_font_color'];

                //Field Label Font Size Types.
                if ( $form['file_attachments']['styles']['label_font_size_type']['pixels'] == 1 ) {
                  $fa_field_label_font_size_type = 'px';
                } else if ( $form['file_attachments']['styles']['label_font_size_type']['pixels'] == 0 ) {
                  $fa_field_label_font_size_type = '%';
                }

                //Field Label Font Size.
                $fa_field_label_font_size = $form['file_attachments']['styles']['label_font_size_type']['size'];

                //Field Label Size.
                $fa_field_label_size = $form['file_attachments']['styles']['label_font_size_type']['size'];

                //Field Border color.
                $fa_field_border_color = $form['file_attachments']['styles']['border_color'];

                //Field Border Size.
                $fa_field_border_size = $form['file_attachments']['styles']['border_size'];

                //Field Background Color.
                $fa_field_background_color = $form['file_attachments']['styles']['background_color'];

                //Field Font Color.
                $fa_field_font_color = $form['file_attachments']['styles']['font-color'];

                //Field Padding X.
                $fa_field_padding_x = $form['file_attachments']['styles']['padding-x'];

                //Field Padding Y.
                $fa_field_padding_y = $form['file_attachments']['styles']['padding-y'];

                //Field Placeholder.
                $fa_field_placeholder = $form['file_attachments']['styles']['placeholder'];

                //Field Width Types.
                if ( $form['file_attachments']['styles']['width_type']['pixels'] == 1 ) {
                  $fa_field_width_type = 'px';
                } else if ( $form['file_attachments']['styles']['width_type']['percent'] == 1 ) {
                  $fa_field_width_type = '%';
                }

                //Field Width.
                $fa_field_width = $form['file_attachments']['styles']['width_type']['width'];
              ?>
              <li class="SF_fields_<?php echo $fa_field_count; ?>">
                <label style="color: <?php echo $fa_field_label_font_color; ?>; font-size: <?php echo $fa_field_label_font_size . $fa_field_label_font_size_type; ?>;" for="<?php echo $fa_field_name; ?>"><?php _e( $fa_field_label ); ?></label>
                <input type="file" id="<?php echo $fa_field_name ?>" name="<?php echo $fa_field_name; ?>" class="SF_file_attachments_<?php echo $fa_field_count; ?>" style="border: <?php echo $fa_field_border_size . 'px solid ' . $fa_field_border_color; ?>; background-color: <?php echo $fa_field_background_color; ?>; color: <?php echo $fa_field_font_color; ?>; padding: <?php echo $fa_field_padding_y . 'px ' .$fa_field_padding_x .'px'; ?>; width: <?php echo $fa_field_width . $fa_field_width_type; ?>;" />
                <div class="<?php echo $fa_field_name; ?>-error">&nbsp;</div>
              </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Form Value has Captcha Fields.
        ?>
        <?php if ( $form['captcha'] ): ?>

          <?php

            //Length Value of Captcha.
            $length = $form['captcha']['length'];

            //Set Captcha Length Value.
            $_SESSION['captcha'][$post_name]['len'] = $length;

            //`Captcha` Background Color.
            $captcha_background_color = $form['captcha']['styles']['captcha_background_color'];

            //Captcha Font Color.
            $captcha_font_color = $form['captcha']['styles']['captcha_font-color'];

            //Captcha Line Color.
            $captcha_line_color = $form['captcha']['styles']['captcha_line_color'];

            //Set Captcha Background Color.
            $_SESSION['captcha'][$post_name]['background_color'] = $captcha_background_color;

            //Set Captcha Font Color.
            $_SESSION['captcha'][$post_name]['font-color'] = $captcha_font_color;

            //Set Captcha Line Color
            $_SESSION['captcha'][$post_name]['line_color'] = $captcha_line_color;

            //Captcha Field Style Required.
            $captcha_field_style_required = $form['captcha']['styles']['required'];
          ?>
          <?php
            /***************
            * Theme Style.
            ****************/
           ?>
           <?php if ( $form['captcha']['styles']['required'] == 0 ): ?>

              <li class="SF_fields SF_captcha_field">
                <div>
                  <img src="/wp-content/plugins/shogo-forms/includes/captcha.php?post_name=<?php echo $post_name; ?>" />
                </div>
                <div>
                  <input type="text" id="captcha" class="SF_captcha_field" placeholder="Enter image code here" />
                </div>
                <div class="captcha-error">&nbsp;</div>
              </li>
            <?php elseif ( $form['captcha']['styles']['required'] == 1 ): ?>
              <?php
                /***************
                * Custom Style.
                ***************/

                //Captcha Background Color.
                $captcha_background_color = $form['captcha']['styles']['captcha_background_color'];

                //Captcha Font Color.
                $captcha_font_color = $form['captcha']['styles']['captcha_font-color'];

                //Captcha Line Color.
                $captcha_line_color = $form['captcha']['styles']['captcha_line_color'];

                //Field Label Size.
                $captcha_field_label_size = $form['captcha']['styles']['label_font_size_type']['size'];

                //Field Border color.
                $captcha_field_border_color = $form['captcha']['styles']['border_color'];

                //Field Border Size.
                $captcha_field_border_size = $form['captcha']['styles']['border_size'];

                //Field Background Color.
                $captcha_field_background_color = $form['captcha']['styles']['background_color'];

                //Field Font Color.
                $captcha_field_font_color = $form['captcha']['styles']['font-color'];

                //Field Padding X.
                $captcha_field_padding_x = $form['captcha']['styles']['padding-x'];

                //Field Padding Y.
                $captcha_field_padding_y = $form['captcha']['styles']['padding-y'];

                //Field Placeholder.
                $captcha_field_placeholder = $form['captcha']['styles']['placeholder'];

                //Field Width Types.
                if ( $form['captcha']['styles']['width_type']['pixels'] == 1 ) {
                  $captcha_field_width_type = 'px';
                } else if ( $form['captcha']['styles']['width_type']['percent'] == 1 ) {
                  $captcha_field_width_type = '%';
                }

                //Field Width.
                $captcha_field_width = $form['captcha']['styles']['width_type']['width'];

                //Length Value of Captcha.
                $length = $form['captcha']['length'];

                //Set Captcha Length Value.
                $_SESSION['captcha'][$post_name]['len'] = $length;

                //Set Captcha Background Color.
                $_SESSION['captcha'][$post_name]['background_color'] = $captcha_background_color;

                //Set Captcha Font Color.
                $_SESSION['captcha'][$post_name]['font-color'] = $captcha_font_color;

                //Set Captcha Line Color
                $_SESSION['captcha'][$post_name]['line_color'] = $captcha_line_color;
              ?>
              <li class="SF_fields SF_captcha_field">
                <div>
                  <img src="/wp-content/plugins/shogo-forms/includes/captcha.php?post_name=<?php echo $post_name; ?>" />
                </div>
                <div>
                  <input type="text" id="captcha" class="SF_captcha_field" placeholder="<?php echo $captcha_field_placeholder; ?>" style="border: <?php echo $captcha_field_border_size . 'px solid ' . $captcha_field_border_color; ?>; background-color: <?php echo $captcha_field_background_color; ?>; color: <?php echo $captcha_field_font_color; ?>; padding: <?php echo $captcha_field_padding_y . 'px ' .$captcha_field_padding_x .'px'; ?>; width: <?php echo $captcha_field_width . $captcha_field_width_type; ?>;" />
                </div>
                <div class="captcha-error">&nbsp;</div>
              </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php
          //If Form Value has Submit Button.
        ?>
        <?php if ( ! empty( $form['submit'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $submit_field_name = SF_Shortcode::ireplace( $form['submit']['name'] );

            //Lowercase Capitalize letters.
            $submit_field_name = strtolower( $submit_field_name );

            //Submit Button Value.
            $submit_field_value = $form['submit']['value'];

            //Text Field Style Required.
            $submit_field_style_required = $form['submit']['styles']['required'];
          ?>
          <?php
            /***************
            * Theme Style.
            ****************/
          ?>
          <?php if ( $form['submit']['styles']['required'] == 0 ): ?>
            <li class="SF_fields SF_submit_field">
              <input type="button" id="<?php echo $submit_field_name ?>" value="<?php echo $submit_field_value; ?>" />
            </li>
          <?php elseif ( $form['submit']['styles']['required'] == 1 ): ?>
            <?php
              /***************
              * Custom Style.
              ****************/

              //Field Border color.
              $submit_field_border_color = $form['submit']['styles']['border_color'];

              //Field Border Size.
              $submit_field_border_size = $form['submit']['styles']['border_size'];

              //Field Background Color.
              $submit_field_background_color = $form['submit']['styles']['background_color'];

              //Field Font Color.
              $submit_field_font_color = $form['submit']['styles']['font-color'];

              //Field Padding X.
              $submit_field_padding_x = $form['submit']['styles']['padding-x'];

              //Field Padding Y.
              $submit_field_padding_y = $form['submit']['styles']['padding-y'];

              //Field Border Radius.
              $submit_field_border_radius = $form['submit']['styles']['border_radius'];
            ?>
            <li class="SF_fields SF_submit_field">
              <style>
                .SF_<?php echo $post_name; ?> .SF_submit_button {
                  border: <?php echo $submit_field_border_size . 'px solid '. $submit_field_border_color; ?> !important;
                  background: <?php echo $submit_field_background_color; ?> !important;
                  color: <?php echo $submit_field_font_color; ?> !important;
                  padding: <?php echo $submit_field_padding_y . 'px ' . $submit_field_padding_x . 'px'; ?> !important;
                  border-radius: <?php echo $submit_field_border_radius . 'px'; ?> !important;
                }

                .SF_<?php echo $post_name; ?> .SF_submit_button:active {
                  position: relative;
                  top: 1px;
                  left: 1px;
                }
              </style>

              <input type="button" id="<?php echo $submit_field_name ?>" class="SF_submit_button" value="<?php echo $submit_field_value; ?>" />
            </li>
          <?php endif; ?>
        <?php endif; ?>

      <?php $c_main++; endforeach; ?>
      <li>
        <div class="SF_saving_entries">
          <img alt="ajax-loader" src="<?php echo plugins_url() . '/shogo-forms/img/ajax_loader/ajax-' . $success_settings['ajax_loader'] . '.gif'; ?>" />
        </div>
      </li>
    </ul>

    <?php
      /******************************************
      * File Attachment Progress Bar Properties.
      *******************************************/
    ?>
    <?php foreach ( $forms as $f1 ): ?>
      <?php if ( ! empty( $f1['file_attachments'] ) ): ?>
        <?php

          //Progress Bar Border Color.
          $fa_prog_border_color = $f1['file_attachments']['progress_bar_layout']['border_color'];

          //Progress Bar Background Color.
          $fa_prog_background_color = $f1['file_attachments']['progress_bar_layout']['background_color'];

          //Progress Bar Progress Color.
          $fa_prog_progress_color = $f1['file_attachments']['progress_bar_layout']['progress_color'];

          //Progress Bar Font Color.
          $fa_prog_font_color = $f1['file_attachments']['progress_bar_layout']['font-color'];

          //Progress Bar Filename Color.
          $fa_prog_filename_color = $f1['file_attachments']['progress_bar_layout']['filename_color'];

          $fa0_field_name = SF_Shortcode::ireplace( $f1['file_attachments']['name'] );
          $fa0_field_name = strtolower( $fa0_field_name );
        ?>

        <style>
          .SF_<?php echo $post_name; ?> .SF_upload_prog_<?php echo $fa0_field_name; ?> {
            border: 1px solid <?php echo $fa_prog_border_color; ?> !important;
            background-color: <?php echo $fa_prog_background_color; ?> !important;
          }

          .SF_<?php echo $post_name; ?> .SF_prog_<?php echo $fa0_field_name; ?> {
            background-color: <?php echo $fa_prog_progress_color; ?> !important;
          }

          .SF_<?php echo $post_name; ?> .SF_percent_<?php echo $fa0_field_name; ?> {
            color: <?php echo $fa_prog_font_color; ?> !important;
          }
        </style>

        <ul>
          <li>
            <div class="SF_upload_container SF_upload_<?php echo $fa0_field_name; ?>">
              <span class="SF_upload_filename_label SF_upload_filename_<?php echo $fa0_field_name; ?>"></span>
              <div class="SF_upload_progress SF_upload_prog_<?php echo $fa0_field_name; ?>">
                <div class="SF_progress_percent SF_percent_<?php echo $fa0_field_name; ?>"></div>
                <div class="SF_progress SF_prog_<?php echo $fa0_field_name; ?>"></div>
              </div>
            </div>
            <div class="SF_upload_success SF_upload_suc_<?php echo $fa0_field_name; ?>"></div>
          </li>
        </ul>
      <?php endif; ?>

    <?php endforeach; ?>
  </div>


  <script type="text/javascript">

    //If Captcha Field is Present or not Hanlder.
    var <?php echo $post_name; ?>_has_capctha = false;

    <?php
    /***********************************
    * Loop Form Fields for Validation.
    ************************************/
    ?>
    <?php foreach ( $forms as $form2 ): ?>

        <?php if ( ! empty( $form2['submit'] ) ): ?>
        <?php
          //If Submit Button is present from the field.
        ?>
        <?php
          //Replace Space to Dash.
          $submit_field_name = SF_Shortcode::ireplace( $form['submit']['name'] );

          //Lowercase Capitalize letters.
          $submit_field_name = strtolower( $submit_field_name );
        ?>

        //Submit Button on Click Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $submit_field_name; ?>").on("click", function() {

          //Form Validation Method.
          SF_form_validation_<?php echo $post_name; ?>();
        });
      <?php endif; ?>

    <?php endforeach; ?>

    function SF_form_validation_<?php echo $post_name; ?>() {

      //If Form Field has error it will be mark as true. otherwise as false if no errors found.
      var <?php echo $post_name; ?>_has_error = false;

      <?php
      /*
      * var <?php echo $post_name; ?>_array_error = [] Array Handler collects validation boolean status. See <?php echo $post_name; ?>_array_error[$int position] = $boolean
      * And //Array Error Loop Boolean Below. (for Loop)
      */
      ?>
      var <?php echo $post_name; ?>_array_error = [];

      <?php
        /*
        * Loop the forms to get validation values of every fields.
        */
      ?>
      <?php $c = 0; foreach ( $forms as $form3 ): ?>

        <?php
          //If has Text Fields.
        ?>
        <?php if ( ! empty( $form3['text_field'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $text_field_name = SF_Shortcode::ireplace( $form3['text_field']['name'] );

            //Lowercase Capitalize letters.
            $text_field_name = strtolower( $text_field_name );

            //Text Fields Label.
            $text_field_label = $form3['text_field']['label'];

            //Text Fields Validation Required.
            $text_field_validation = $form3['text_field']['validation']['enabled'];
          ?>

          <?php
            //If Text Fields has Validation.
          ?>
          <?php if ( $text_field_validation == 1 ): ?>

            //Text Field Error Handler.
            var <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error = [];

            <?php
              /***********************************
              * Text Field Validation Properties.
              ************************************/

              //Text Field Validation Message.
              $text_field_validation_required_message = $form3['text_field']['validation']['required']['message'];

              //Text Field Validation Font Color.
              $text_field_validation_required_font_color = $form3['text_field']['validation']['required']['font-color'];

              //Text Field Validation Minimum String Length.
              $text_field_validation_min_len = $form3['text_field']['validation']['min_length']['length'];

              //Text Field Validation Minimum String Length Message.
              $text_field_validation_min_len_val_msg = $form3['text_field']['validation']['min_length']['message'];

              //Text Field Validation Minimum String Length Message Font Color.
              $text_field_validation_min_len_val_font_color = $form3['text_field']['validation']['min_length']['font-color'];

              //Text Field Validation Maximum String Length.
              $text_field_validation_max_len = $form3['text_field']['validation']['max_length']['length'];

              //Text Field Maximum String Length Message.
              $text_field_validation_max_len_val_msg = $form3['text_field']['validation']['max_length']['message'];

              //Text Field Validation Maximum String Length Message Font Color.
              $text_field_validation_max_len_val_font_color = $form3['text_field']['validation']['max_length']['font-color'];
            ?>

            //If Text Fields Value is empty.
            if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").val() == "" ) {

              //Set Validation Message.
              jQuery(".SF_<?php echo $post_name; ?> .<?php echo $text_field_name; ?>-error").css("color", "<?php echo $text_field_validation_required_font_color ?>").html("<?php echo $text_field_validation_required_message; ?>");

              //Focus on the Field.
              jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").focus();

              //Set value to true.
              <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error[0] = true;
            } else {

              <?php
                //Mimimum String Length Validation.
                if ( $text_field_validation_min_len !== 0 && $text_field_validation_min_len !== '' ):
              ?>

              if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").val().length <= <?php echo $text_field_validation_min_len; ?> ) {

                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $text_field_name; ?>-error").css("color", "<?php echo $text_field_validation_min_len_val_font_color ?>").html("<?php echo $text_field_validation_min_len_val_msg; ?>");

                //Focus on the Field.
                jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").focus();

                //Set value to false.
                <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error[1] = true;
              } else {
                //Set value to false.
                <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error[1] = false;
              }
              <?php else: ?>
                <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error[0] = false;
              <?php endif; ?>

              <?php
                //Maximum String Length Validation.
                if ( $text_field_validation_max_len !== 0 && $text_field_validation_max_len !== '' ):
              ?>

              if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").val().length >= <?php echo $text_field_validation_max_len; ?> ) {

                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $text_field_name; ?>-error").css("color", "<?php echo $text_field_validation_max_len_val_font_color ?>").html("<?php echo $text_field_validation_max_len_val_msg; ?>");

                //Focus on the Field.
                jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").focus();

                //Set value to false.
                <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error[2] = true;
              } else {
                //Set value to false.
                <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error[2] = false;
              }
              <?php endif; ?>
            }

            <?php
            /*
            * Text Field Boolean Handler.
            * During for loop of $post_name . '_' . $text_field_name_text_field_error collects all true statememts.
            * _text_field_error has true statements, set _text_field_c to the last increment number.
            */
            ?>
            var <?php echo $post_name . '_' . $text_field_name; ?>_text_field_c = null;

            <?php
              /*
              * Get all _text_field_error with true statements.
              * If there is no true statements means no validation errors.
              */
            ?>
            for ( var i = 0; i < <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error.length; i++ ) {
              if ( <?php echo $post_name . '_' . $text_field_name; ?>_text_field_error[i] == true ) {
                <?php echo $post_name . '_' . $text_field_name; ?>_text_field_c = i;
              }
            }

            /*
            * If _text_field_c is not null means it has a validation error.
            * array_error[pos] will be mark as true.
            */
            if ( <?php echo $post_name . '_' . $text_field_name; ?>_text_field_c == null ) {
              <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false
            } else {
              <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
            }

          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If has Number Fields.
        ?>
        <?php if ( ! empty( $form3['number_field'] ) ): ?>
          <?php

            //Number Space to Dash.
            $number_field_name = SF_Shortcode::ireplace( $form3['number_field']['name'] );

            //Number Capitalize letters.
            $number_field_name = strtolower( $number_field_name );

            //Number Fields Label.
            $number_field_label = $form3['number_field']['label'];

            //Number Fields Validation.
            $number_field_validation = $form3['number_field']['validation']['enabled'];
          ?>

          <?php
            //If Number Fields has Validation.
          ?>
          <?php if ( $number_field_validation == 1 ): ?>

            //Number Field Error Handler.
            var <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error = [];

            <?php
              /*************************************
              * Number Field Validation Properties.
              **************************************/

              //Number Field Validation Message.
              $number_field_validation_required_message = $form3['number_field']['validation']['required']['message'];

              //Number Field Validation Font Color.
              $number_field_validation_required_font_color = $form3['number_field']['validation']['required']['font-color'];

              //Number Field Minumum String Length.
              $number_field_validation_min_len = $form3['number_field']['validation']['min_length']['length'];

              //Number Field Minimum String Length Validation Message.
              $number_field_validation_min_len_val_msg = $form3['number_field']['validation']['min_length']['message'];

              //Number Field Minimum String Length Validation Message Font Color.
              $number_field_validation_min_len_font_color = $form3['number_field']['validation']['min_length']['font-color'];

              //Number Field Maximum String Length.
              $number_field_validation_max_len = $form3['number_field']['validation']['max_length']['length'];

              //Number Field Maximum String Length Validation Message.
              $number_field_validation_max_len_val_msg = $form3['number_field']['validation']['max_length']['message'];

              //Number Field Maximum String Length Validation Message Font Color.
              $number_field_validation_max_len_val_font_color = $form3['number_field']['validation']['max_length']['font-color'];
            ?>

            //If Number Fields Value is not empty.
            if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").val() == "" ) {

              //Set Validation Message.
              jQuery(".SF_<?php echo $post_name; ?> .<?php echo $number_field_name; ?>-error").css("color", "<?php echo $number_field_validation_required_font_color; ?>").html("<?php echo $number_field_validation_required_message; ?>");

              //Focus on the Field.
              jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").focus();

              //Set value to true.
              <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error[0] = true;
            } else {

              <?php
                //Mimimum String Length Validation.
                if ( $number_field_validation_min_len !== 0 && $number_field_validation_min_len !== '' ):
              ?>

              if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").val().length <= <?php echo $number_field_validation_min_len; ?> ) {
                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $number_field_name; ?>-error").css("color", "<?php echo $number_field_validation_min_len_font_color; ?>").html("<?php echo $number_field_validation_min_len_val_msg; ?>");

                //Focus on the Field.
                jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").focus();

                //Set value to true.
                <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error[1] = true;
              }

              <?php else: ?>
                //Set value to false.
                <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error[1] = false;
              <?php endif; ?>

              <?php
                //Maximum String Length Validation.
                if ( $number_field_validation_max_len !== 0 && $number_field_validation_max_len !== '' ):
              ?>

              if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").val().length >= <?php echo $number_field_validation_max_len; ?> ) {

                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $number_field_name; ?>-error").css("color", "<?php echo $number_field_validation_max_len_val_font_color ?>").html("<?php echo $text_field_validation_max_len_val_msg; ?>");

                //Focus on the Field.
                jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").focus();

                //Set value to false.
                <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error[2] = true;
              } else {
                //Set value to false.
                <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error[2] = false;
              }

              <?php endif; ?>
            }

            <?php
            /*
            * Number Field Boolean Handler.
            * During for loop of $post_name . '_' . $number_field_name_text_field_error collects all true statememts.
            * _text_field_error has true statements, set _text_field_c to the last increment number.
            */
            ?>
            var <?php echo $post_name . '_' . $number_field_name; ?>_number_field_c = null;

            /*
            * Get all _number_field_error with true statements.
            * If there is no true statements means no validation errors.
            */
            for ( var i = 0; i < <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error.length; i++ ) {
              if ( <?php echo $post_name . '_' . $number_field_name; ?>_number_field_error[i] == true ) {
                <?php echo $post_name . '_' . $number_field_name; ?>_number_field_c = i;
              }
            }

            /*
            * If _number_field_c is not null means it has a validation error.
            * array_error[pos] will be mark as true.
            */
            if ( <?php echo $post_name . '_' . $number_field_name; ?>_number_field_c == null ) {
              <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false
            } else {
              <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
            }
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If has Email Fields.
        ?>
        <?php if ( ! empty( $form3['email_field'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $email_field_name = SF_Shortcode::ireplace( $form3['email_field']['name'] );

            //Lowercase Capitalize letters.
            $email_field_name = strtolower( $email_field_name );

            //Email Fields Label.
            $email_field_label = $form3['email_field']['label'];

            //Email Fields Validation.
            $email_field_validation = $form3['email_field']['validation']['enabled'];
          ?>

          <?php
            //If Email Fields has Validation.
          ?>
          <?php if ( $email_field_validation == 1 ): ?>

            //Email Field Error Handler.
            var <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error = [];

            <?php
              /*************************************
              * Email Field Validation Properties.
              **************************************/

              //Email Field Validation Required Message.
              $email_field_validation_required_message = $form3['email_field']['validation']['required']['message'];

              //Email Field Validation Required Font Color.
              $email_field_validation_required_font_color = $form3['email_field']['validation']['required']['font-color'];

              //Email Field Validation Invalid Email Format Message.
              $email_field_validation_format_message = $form3['email_field']['validation']['invalid_format']['message'];

              //Email Validation Invalid Email Format Font Color.
              $email_field_validation_format_message_font_color = $form3['email_field']['validation']['invalid_format']['font-color'];

              //Email Field Validation Minimum String Length.
              $email_field_validation_min_len = $form3['email_field']['validation']['min_length']['length'];

              //Email Field Validation Minimum String Length Message.
              $email_field_validation_min_len_val_msg = $form3['email_field']['validation']['min_length']['message'];

              //Email Field Validation Minimum String Length Font Color.
              $email_field_validation_min_len_msg_font_color = $form3['email_field']['validation']['min_length']['font-color'];

              //Email Field Validation Maximum String Length.
              $email_field_validation_max_len = $form3['email_field']['validation']['max_length']['length'];

              //Email FIeld Validation Maximum String Length Message.
              $email_field_validation_max_len_val_msg = $form3['email_field']['validation']['max_length']['message'];

              //Email Field Validation Maximum String Font Color.
              $email_field_validation_max_len_msg_font_color = $form3['email_field']['validation']['max_length']['font-color'];
            ?>

            //If Email Fields Value is empty.
            if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name ?>").val() == "" ) {

              //Set Validation Message.
              jQuery(".SF_<?php echo $post_name; ?> .<?php echo $email_field_name; ?>-error").css("color", "<?php echo $email_field_validation_required_font_color; ?>").html("<?php echo $email_field_validation_required_message; ?>");

              //Focus on the Field.
              jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name ?>").focus();

              //Set value to true.
              <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[0] = true;
            } else {

              //If Email Format is incorrect.
              if ( ! jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name ?>").val().match(/([a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4})/gi) ) {

                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $email_field_name; ?>-error").css("color", "<?php echo $email_field_validation_format_message_font_color; ?>").html("<?php echo $email_field_validation_format_message; ?>");

                //Set value to true.
                <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[1] = true;
              } else {

                <?php
                  //Mimimum String Length Validation.
                  if ( $email_field_validation_min_len !== 0 && $email_field_validation_min_len !== '' ):
                ?>

                if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name; ?>").val().length <= <?php echo $email_field_validation_min_len; ?> ) {

                  //Set Validation Message.
                  jQuery(".SF_<?php echo $post_name; ?> .<?php echo $email_field_name; ?>-error").css("color", "<?php echo $email_field_validation_min_len_msg_font_color ?>").html("<?php echo $email_field_validation_min_len_val_msg; ?>");

                  //Focus on the Field.
                  jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name; ?>").focus();

                  //Set value to false.
                  <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[2] = true;
                } else {
                  //Set value to false.
                  <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[2] = false;
                }
                <?php else: ?>
                  <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[0] = false;
                <?php endif; ?>

                <?php
                  //Maximum String Length Validation.
                  if ( $email_field_validation_max_len !== 0 && $email_field_validation_max_len !== '' ):
                ?>

                if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name; ?>").val().length >= <?php echo $email_field_validation_max_len; ?> ) {

                  //Set Validation Message.
                  jQuery(".SF_<?php echo $post_name; ?> .<?php echo $email_field_name; ?>-error").css("color", "<?php echo $email_field_validation_max_len_msg_font_color ?>").html("<?php echo $email_field_validation_max_len_val_msg; ?>");

                  //Focus on the Field.
                  jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name; ?>").focus();

                  //Set value to false.
                  <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[3] = true;
                } else {
                  //Set value to false.
                  <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[3] = false;
                }
                <?php endif; ?>
              }
            }

            <?php
            /*
            * Email Field Boolean Handler.
            * During for loop of $post_name . '_' . $text_field_name_text_field_error collects all true statememts.
            * _email_field_error has true statements, set _text_field_c to the last increment number.
            */
            ?>
            var <?php echo $post_name . '_' . $email_field_name; ?>_email_field_c = null;

            <?php
              /*
              * Get all _email_field_error with true statements.
              * If there is no true statements means no validation errors.
              */
            ?>
            for ( var i = 0; i < <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error.length; i++ ) {
              if ( <?php echo $post_name . '_' . $email_field_name; ?>_email_field_error[i] == true ) {
                <?php echo $post_name . '_' . $email_field_name; ?>_email_field_c = i;
              }
            }

            <?php
              /*
              * If _email_field_c is not null means it has a validation error.
              * array_error[pos] will be mark as true.
              */
            ?>
            if ( <?php echo $post_name . '_' . $email_field_name; ?>_email_field_c == null ) {
              <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false;
            } else {
              <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
            }

          <?php else: ?>
          <?php
            //Email Field Validation Invalid Email Format Message.
            $email_field_validation_format_message = $form3['email_field']['validation']['invalid_format']['message'];

            //Email Validation Invalid Email Format Font Color.
            $email_field_validation_format_message_font_color = $form3['email_field']['validation']['invalid_format']['font-color'];
          ?>

          //If Email Format is incorrect.
          if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name ?>").val() !== "" && ! jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name ?>").val().match(/([a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4})/gi) ) {

            //Set Validation Message.
            jQuery(".SF_<?php echo $post_name; ?> .<?php echo $email_field_name; ?>-error").css("color", "<?php echo $email_field_validation_format_message_font_color; ?>").html("<?php echo $email_field_validation_format_message; ?>");

            //Set value to true.
            <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
          } else {

            //Set value to false.
            <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false;
          }
          <?php endif; ?>

        <?php endif; ?>

        <?php
          //If has Dropdown Fields.
        ?>
        <?php if ( ! empty( $form3['dropdown_field'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $dropdown_field_name = SF_Shortcode::ireplace( $form3['dropdown_field']['name'] );

            //Lowercase Capitalize letters.
            $dropdown_field_name = strtolower( $dropdown_field_name );

            //Dropdown Fields Label.
            $dropdown_field_label = $form3['dropdown_field']['label'];

            //Dropdown Fields Validation.
            $dropdown_field_validation = $form3['dropdown_field']['validation']['required'];
          ?>

            <?php
              //If Dropdown Fields has Validation.
            ?>
            <?php if ( $dropdown_field_validation == 1 ): ?>
              <?php
                /**************************************
                * Dropdowm Field Validation Properties.
                ***************************************/

                //Dropdown Field Validation Message.
                $dropdown_field_validation_message = $form3['dropdown_field']['validation']['message'];

                //Dropdown Field Validation Font Color.
                $dropdown_field_validation_font_color = $form3['dropdown_field']['validation']['font-color'];
              ?>
              //If Dropdown Fields Value is not empty.
              if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $dropdown_field_name; ?>").val() == "" ) {

                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $dropdown_field_name; ?>-error").css("color", "<?php echo $dropdown_field_validation_font_color; ?>").html("<?php echo $dropdown_field_validation_message; ?>");

                //Focus on the Field.
                jQuery(".SF_<?php echo $post_name; ?> #<?php echo $dropdown_field_name; ?>").focus();

                //Set value to true.
                <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
              } else {

                //Set value to false.
                <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false;
              }
            <?php endif; ?>
        <?php endif; ?>

        <?php
          //If has Checkbox Fields.
        ?>
        <?php if ( ! empty( $form3['checkbox'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $checkbox_field_name = SF_Shortcode::ireplace( $form3['checkbox']['name'] );

            //Lowercase Capitalize letters.
            $checkbox_field_name = strtolower( $checkbox_field_name );

            //Checkbox Fields Label.
            $checkbox_field_label = $form3['checkbox']['label'];

            //Checkbox Fields Validation
            $checkbox_field_validation = $form3['checkbox']['validation']['required'];
          ?>

          <?php
            //If Checkbox Fields has Validation.
          ?>
          <?php if ( $checkbox_field_validation == 1 ): ?>
            <?php
              /***************************************
              * Checkbox Field Validation Properties.
              ****************************************/

              //Checkbox Field Validation Message.
              $checkbox_field_validation_message = $form3['checkbox']['validation']['message'];

              //Checkbox Field Validation Font Color.
              $checkbox_field_validation_font_color = $form3['checkbox']['validation']['font-color'];
            ?>

            var count_check_<?php echo $c; ?> = 0;

            <?php $chx = 0; foreach ( $form3['checkbox']['checkboxes'] as $ch3 ): ?>
              <?php
                $ch3_label = SF_Shortcode::ireplace( $ch3['checkbox_label'] );
                $ch3_label = strtolower( $ch3_label );
              ?>

              if ( jQuery(".SF_<?php echo $post_name; ?> .<?php echo $ch3_label . '_' . $c . '_' . $chx; ?>").is(":checked") ) {
                count_check_<?php echo $c; ?> = count_check_<?php echo $c; ?> + 1;
              }
            <?php $chx++; endforeach; ?>

            if ( count_check_<?php echo $c; ?> == 0 ) {
              jQuery(".SF_<?php echo $post_name; ?> .<?php echo $checkbox_field_name; ?>-error").css("color", "<?php echo $checkbox_field_validation_font_color; ?>").html("<?php echo $checkbox_field_validation_message; ?>");
              <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
            }
          <?php endif; ?>
        <?php endif; ?>

        <?php
          //If has Textarea Fields.
        ?>
        <?php if ( ! empty( $form3['textarea'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $textarea_field_name = SF_Shortcode::ireplace( $form3['textarea']['name'] );

            //Lowercase Capitalize letters.
            $textarea_field_name = strtolower( $textarea_field_name );

            //Textarea Fields Label.
            $textarea_field_label = $form3['textarea']['label'];

            //Textarea Fields Validation.
            $textarea_field_validation = $form3['textarea']['validation']['enabled'];
          ?>

          <?php if ( $textarea_field_validation == 1 ): ?>

            //Text Field Error Handler.
            var <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error = [];

            <?php
              /***************************************
              * Textarea Field Validation Properties.
              ****************************************/

              //Teextarea Field Validation Required Message.
              $textarea_field_validation_required_message = $form3['textarea']['validation']['required']['message'];

              //Textarea Field Validation Required Font Color.
              $textarea_field_validation_required_font_color = $form3['textarea']['validation']['required']['font-color'];

              //Textarea Field Validation Minimum String Length.
              $textarea_field_validation_min_len = $form3['textarea']['validation']['min_length']['length'];

              //Textarea Field Validation Minimum String Length Message.
              $textarea_field_validation_min_len_val_msg = $form3['textarea']['validation']['min_length']['message'];

              //Textarea Field Validation Minimum String Massage Font Color.
              $textarea_field_validation_min_len_val_font_color = $form3['textarea']['validation']['min_length']['font-color'];

              //Textarea Field Validation Maximum String Length.
              $textarea_field_validation_max_len = $form3['textarea']['validation']['max_length']['length'];

              //Textarea Field Validation Maximum String Length Message.
              $textarea_field_validation_max_len_val_msg = $form3['textarea']['validation']['max_length']['message'];

              //Textarea Field Validation Maximum String Length Message Font Color.
              $textarea_field_validation_max_len_val_font_color = $form3['textarea']['validation']['max_length']['font-color'];
            ?>
            //If Textarea Field is empty.
            if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name; ?>").val() == "" ) {

              //Set Validation Message.
              jQuery(".SF_<?php echo $post_name; ?> .<?php echo $textarea_field_name; ?>-error").css("color", "<?php echo $textarea_field_validation_required_font_color; ?>").html("<?php echo $textarea_field_validation_required_message; ?>");

              //Focus on the Field.
              jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name ?>").focus();

              //Set value to true.
              <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error[0] = true;
            } else {

              <?php
                //Mimimum String Length Validation.
                if ( $textarea_field_validation_min_len !== 0 && $textarea_field_validation_min_len !== '' ):
              ?>

                if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name; ?>").val().length <= <?php echo $textarea_field_validation_min_len; ?> ) {

                  //Set Validation Message.
                  jQuery(".SF_<?php echo $post_name; ?> .<?php echo $textarea_field_name; ?>-error").css("color", "<?php echo $textarea_field_validation_min_len_val_font_color ?>").html("<?php echo $textarea_field_validation_min_len_val_msg; ?>");

                  //Focus on the Field.
                  jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name; ?>").focus();

                  //Set value to false.
                  <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error[1] = true;
                } else {
                  //Set value to false.
                  <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error[1] = false;
                }
              <?php else: ?>
                <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error[0] = false;
              <?php endif; ?>

              <?php
                //Maximum String Length Validation.
                if ( $textarea_field_validation_max_len !== 0 && $textarea_field_validation_max_len !== '' ):
              ?>

              if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name; ?>").val().length >= <?php echo $textarea_field_validation_max_len; ?> ) {

                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $textarea_field_name; ?>-error").css("color", "<?php echo $textarea_field_validation_max_len_val_font_color ?>").html("<?php echo $textarea_field_validation_max_len_val_msg; ?>");

                //Focus on the Field.
                jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name; ?>").focus();

                //Set value to false.
                <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error[2] = true;
              } else {
                //Set value to false.
                <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error[2] = false;
              }
              <?php endif; ?>
            }
          <?php endif; ?>

          <?php
          /*
          * Text Field Boolean Handler.
          * During for loop of $post_name . '_' . $text_field_name_text_field_error collects all true statememts.
          * _textarea_field_error has true statements, set _text_field_c to the last increment number.
          */
          ?>
          var <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_c = null;

          <?php
            /*
            * Get all _text_field_error with true statements.
            * If there is no true statements means no validation errors.
            */
          ?>
          for ( var i = 0; i < <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error.length; i++ ) {
            if ( <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_error[i] == true ) {
              <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_c = i;
            }
          }

          /*
          * If _textarea_field_c is not null means it has a validation error.
          * array_error[pos] will be mark as true.
          */
          if ( <?php echo $post_name . '_' . $textarea_field_name; ?>_textarea_field_c == null ) {
            <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false
          } else {
            <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
          }
        <?php endif; ?>

        <?php if ( $form3['file_attachments'] ): ?>
          <?php

            //Replace Space to Dash.
            $fa_field_name = SF_Shortcode::ireplace( $form3['file_attachments']['name'] );

            //Lowercase Capitalize letters.
            $fa_field_name = strtolower( $fa_field_name );

            //File Attachments File Size.
            $fa_field_max_size = $form3['file_attachments']['max_size'];

            //File Attachments File Types.
            $fa_field_file_types = $form3['file_attachments']['file_types'];

            //File Attachments Validation.
            $fa_field_validation = $form3['file_attachments']['validation']['required'];

            //Remove Spaces in file types fields.
            $fa_field_file_types = str_ireplace( ' ', '', $fa_field_file_types );

            //File Attachment Error Message File Size.
            $fa_field_error_message_file_size = $form3['file_attachments']['error_message']['file_size'];

            //File Attachment Error Message File Type.
            $fa_field_error_message_file_type = $form3['file_attachments']['error_message']['file_type'];

            //File Attachment Error Message Font Color.
            $fa_field_error_message_font_color = $form3['file_attachments']['error_message']['font-color'];
          ?>

          <?php
            //If File attachments has file types validation, otherwise all file types are allowed.
          ?>
          <?php if ( ! empty( $fa_field_file_types ) ): ?>

            //If File Attachments Field has file attached.
            if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa_field_name; ?>").val() !== "" ) {

              //File Types Allowed to upload.
              var file_types = "<?php echo $fa_field_file_types; ?>";

              //Split File Types via comma.
              var types_split = file_types.split(",");

              //Filename. Browsed.
              var upload_file_name = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa_field_name; ?>").val();

              //Split Filename via dot to get the file extension.
              var upload_split = upload_file_name.split(".");

              //Get the last value of array.
              var upload_pos = upload_split.length - 1;

              //The File extension.
              var upload_ext = upload_split[upload_pos];

              //Check if Extension is found from types_split.
              if ( jQuery.inArray( upload_ext, types_split ) <= -1 ) {

                //Set value to true.
                <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;

                //Set Validation Message.
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $fa_field_name; ?>-error").css("color", "<?php echo $fa_field_error_message_font_color; ?>").html("<?php echo $fa_field_error_message_file_type; ?>");
              } else {

                //Max File size.
                var max_size = <?php echo $fa_field_max_size; ?> * 1000;

                //File Size
                var upload_file_size = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa_field_name; ?>")[0].files[0].size;

                //If Filesize is greater than Max File Size.
                if ( upload_file_size > max_size ) {

                  //Set value to true.
                  <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;

                  //Set Validation Message
                  jQuery(".SF_<?php echo $post_name; ?> .<?php echo $fa_field_name; ?>-error").css("color", "<?php echo $fa_field_error_message_font_color; ?>").html("<?php echo $fa_field_error_message_file_size; ?>.");
                } else {

                  //Set value to false.
                  <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false;
                }
              }

            } else {
              <?php
                //If $fa_field_validation == 1 means user is requied to upload file.
               ?>
              <?php if ( $fa_field_validation == 1 ): ?>
                <?php
                  /*****************************************
                  * File Attachments Validation Properties.
                  ******************************************/

                  //File Attachments Validation Message.
                  $fa_field_validation_message = $form3['file_attachments']['validation']['message'];

                  //File Attachments Validation Font Color.
                  $fa_field_validation_message_font_color = $form3['file_attachments']['validation']['font-color'];
                ?>

                <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;

                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $fa_field_name; ?>-error").css("color", "<?php echo $fa_field_validation_message_font_color; ?>").html("<?php echo $fa_field_validation_message; ?>");
              <?php endif; ?>
            }
          <?php else: ?>

            //If File Attachments Field has file attached.
            if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa_field_name; ?>").val() !== "" ) {
              //File Size.
              var fa_file_size = jQuery("#<?php echo $fa_field_name; ?>")[0].files[0].size;

              //Max File size.
              var max_size = <?php echo $fa_field_max_size; ?> * 1000;

              //If file is too large.
              if ( fa_file_size > max_size ) {

                //Value set to true.
                <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;

                //Set Validation Message
                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $fa_field_name; ?>-error").css("color", "<?php echo $fa_field_error_message_font_color; ?>").html("<?php echo $fa_field_error_message_file_size; ?>.");
              } else {

                //Value set to false.
                <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = false;
              }
            } else {
              <?php
                //If $fa_field_validation == 1 means user is requied to upload file.
               ?>
              <?php if ( $fa_field_validation == 1 ): ?>
                <?php
                  /*****************************************
                  * File Attachments Validation Properties.
                  ******************************************/

                  //File Attachments Validation Message.
                  $fa_field_validation_message = $form3['file_attachments']['validation']['message'];

                  //File Attachments Validation Font Color.
                  $fa_field_validation_message_font_color = $form3['file_attachments']['validation']['font-color'];
                ?>

                <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;

                jQuery(".SF_<?php echo $post_name; ?> .<?php echo $fa_field_name; ?>-error").css("color", "<?php echo $fa_field_validation_message_font_color; ?>").html("<?php echo $fa_field_validation_message; ?>");
              <?php endif; ?>
            }

          <?php endif; ?>

        <?php endif; ?>

        <?php
          //If has Captcha Field.
        ?>
        <?php if ( ! empty( $form3['captcha'] ) ): ?>

          <?php echo $post_name; ?>_has_capctha = true;

          <?php

            //Get Captcha Field String.
            $captcha_str = $_SESSION['captcha']['string'];

            /********************************
            * Captcha Validation Properties.
            ********************************/

            //Captcha Required Message.
            $captcha_validation_message = $form3['captcha']['validation']['message'];

            //Captcha Validation Font Color.
            $captcha_validation_font_color = $form3['captcha']['validation']['font-color'];
          ?>

          //If Captcha Field is not empty.
          if ( jQuery(".SF_<?php echo $post_name; ?> #captcha").val() == "" ) {

            //Set Validation Message.
            jQuery(".SF_<?php echo $post_name; ?> .captcha-error").css("color", "<?php echo $captcha_validation_font_color; ?>").html("<?php echo $captcha_validation_message; ?>");

            //Focus on the Fied.
            jQuery(".SF_<?php echo $post_name; ?> #captcha").focus();

            //Set Value to true.
            <?php echo $post_name; ?>_array_error[<?php echo $c; ?>] = true;
          }

        <?php endif; ?>

      <?php $c++; endforeach; ?>

      <?php
        /***************************************
        * If <?php echo $post_name; ?>_has_error is false, save entries.
        ****************************************/
       ?>

      //<?php echo $post_name; ?>_array_error handler value.
      var <?php echo $post_name; ?>_i2 = null;

      <?php
      /*
      * Array Error Loop Boolean
      */
      ?>
      for ( var i = 0; i < <?php echo $post_name; ?>_array_error.length; i++ ) {

        //Get array errors with true statements.
        if ( <?php echo $post_name; ?>_array_error[i] == true ) {
          <?php echo $post_name; ?>_i2 = i;
        }
      }

      <?php
      /*
      * If <?php echo $post_name; ?>_i2 is null means no validation error. else, has validation error.
      */
      ?>
      if ( <?php echo $post_name; ?>_i2 == null ) {

        //Set to false.
        <?php echo $post_name; ?>_has_error = false;
      } else {

        //Set to true.
        <?php echo $post_name; ?>_has_error = true;
      }

      <?php
      /*
      * If no validation errors. Save data as entry.
      */
      ?>
      if ( <?php echo $post_name; ?>_has_error == false ) {

        if ( <?php echo $post_name; ?>_has_capctha ) {

          <?php
          /*
          * Loop the form and check if captcha field is present.
          * If present validated captcha if the image code is correct or not.
          */
          ?>
          <?php $fc = 0; foreach ( $forms as $ff ): ?>

            <?php
              //If Captcha Field is present.
            ?>
            <?php if ( ! empty( $ff['captcha'] ) ): ?>
              <?php
                /********************************
                * Captcha Validation Properties.
                ********************************/

                //Captcha Not Match Message.
                $captcha_validation_not_match_message = $ff['captcha']['validation']['not_match_message'];

                //Captcha Validation Font Color.
                $captcha_validation_font_color = $ff['captcha']['validation']['font-color'];
              ?>

              //Ajax Request Properties.
              var captcha_data = {
                "action": "SF_forms",
                "operation": "captcha_validation",
                "post_name": "<?php echo $post_name; ?>",
                "captcha": jQuery(".SF_<?php echo $post_name; ?> #captcha").val()
              };

              //Initiate Ajax Request.
              jQuery.post("/wp-admin/admin-ajax.php", captcha_data, function( r ) {

                //If Image Code is correct.
                if ( r !== "match" ) {

                  //Set Validation Message.
                  jQuery(".SF_<?php echo $post_name; ?> .captcha-error").css("color", "<?php echo $captcha_validation_font_color; ?>").html("<?php echo $captcha_validation_not_match_message; ?>");

                  //Foucus on the Field.
                  jQuery(".SF_<?php echo $post_name; ?> #captcha").focus();
                } else {

                  //Save data.
                  SF_save_form_<?php echo $post_name; ?>();
                }
              });
            <?php endif; ?>
          <?php $fc++; endforeach; ?>
        } else {
          SF_save_form_<?php echo $post_name; ?>();
        }
      }
    }

    <?php
    /*
    * Method to save entry.
    */
    ?>
    function SF_save_form_<?php echo $post_name; ?>() {

      //Post Name or Form Name.
      var post_name = "<?php echo strtolower( SF_Shortcode::ireplace( $post_title ) ); ?>";

      //WP nonce csrf value.
      var csrf = jQuery("#SF_csrf").val();

      //Form Field Values Store in this array.
      var form_entries = [];

      <?php
        //Loop Form Fields to Get values.
      ?>
      <?php $c = 0; foreach ( $forms as $f ): ?>
        <?php
          //If Has Text Field.
        ?>
        <?php if ( ! empty( $f['text_field'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $text_field_name = SF_Shortcode::ireplace( $f['text_field']['name'] );

            //Lowercase Capitalize letters.
            $text_field_name = strtolower( $text_field_name );
          ?>

          //Value of Text Field.
          form_entries["<?php echo $text_field_name; ?>"] = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").val();
        <?php endif; ?>

        <?php
          //If Has Number Field.
        ?>
        <?php if ( ! empty( $f['number_field'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $number_field_name = SF_Shortcode::ireplace( $f['number_field']['name'] );

            //Lowercase Capitalize letters.
            $number_field_name = strtolower( $number_field_name );
          ?>

          //Value of Number Field.
          form_entries["<?php echo $number_field_name; ?>"] = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").val();
        <?php endif; ?>

        <?php
          //If Has Email Field.
        ?>
        <?php if ( ! empty( $f['email_field'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $email_field_name = SF_Shortcode::ireplace( $f['email_field']['name'] );

            //Lowercase Capitalize letters.
            $email_field_name = strtolower( $email_field_name );
          ?>

          //Value of Email Field.
          form_entries["<?php echo $email_field_name; ?>"] = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name ?>").val();
        <?php endif; ?>


        <?php
          //If Has Dropdown Field.
        ?>
        <?php if ( ! empty( $f['dropdown_field'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $dropdown_field_name = SF_Shortcode::ireplace( $f['dropdown_field']['name'] );

            //Lowercase Capitalize letters.
            $dropdown_field_name = strtolower( $dropdown_field_name );
          ?>

          //Value of Dropdown Field.
          form_entries["<?php echo $dropdown_field_name; ?>"] = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $dropdown_field_name; ?>").val();
        <?php endif; ?>

        <?php
          //If Has Radio Field.
        ?>
        <?php if ( ! empty( $f['radio_button'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $radio_field_name = SF_Shortcode::ireplace( $f['radio_button']['name'] );

            //Lowercase Capitalize letters.
            $radio_field_name = strtolower( $radio_field_name );
          ?>

          <?php
            //Loop Bullets and get selected bullet.
          ?>
          <?php $b = 0; foreach ( $f['radio_button']['bullets'] as $bullet ): ?>
            if ( jQuery(".SF_<?php echo $post_name; ?> .SF_radio_<?php echo $radio_field_name . '_' . $b; ?>").is(":checked") ) {
              form_entries["<?php echo $radio_field_name; ?>"] = jQuery(".SF_<?php echo $post_name; ?> .SF_radio_<?php echo $radio_field_name . '_' .$b; ?>").val();
            }
          <?php $b++; endforeach; ?>
        <?php endif; ?>

        <?php
          //If Has Checkbox Field.
        ?>
        <?php if ( ! empty( $f['checkbox'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $checkbox_field_name = SF_Shortcode::ireplace( $f['checkbox']['name'] );

            //Lowercase Capitalize letters.
            $checkbox_field_name = strtolower( $checkbox_field_name );
          ?>

          <?php
            /*
            * If checkbox checked get the value and place to var checkbox_vals.
            */
           ?>
          var checkbox_vals = "";

          <?php $chx = 0; foreach ( $f['checkbox']['checkboxes'] as $chf ): ?>
            <?php

              //Checkbox CH label.
              $chf_label = SF_Shortcode::ireplace( $chf['checkbox_label'] );

              //Lowercase Capitalize Letters.
              $chf_label = strtolower( $chf_label );
            ?>

            //If checkbox is checked
            if ( jQuery(".SF_<?php echo $post_name; ?> .<?php echo $chf_label . '_'. $c . '_' . $chx; ?>").is(":checked") ) {

              //Get the checkbox value. || <-- seperator.
              checkbox_vals += jQuery(".SF_<?php echo $post_name; ?> .<?php echo $chf_label . '_'. $c . '_' .$chx; ?>").val() + "||";
            }
          <?php $chx++; endforeach; ?>

          //Value of Checkbox Field.
          form_entries["<?php echo $checkbox_field_name ?>"] = checkbox_vals;
        <?php endif; ?>

        <?php
          //If Has Textarea Field.
        ?>
        <?php if ( ! empty( $f['textarea'] ) ): ?>
          <?php

            //Replace Space to Dash.
            $textarea_field_name = SF_Shortcode::ireplace( $f['textarea']['name'] );

            //Lowercase Capitalize letters.
            $textarea_field_name = strtolower( $textarea_field_name );
          ?>

          //Value of Textarea Field.
          form_entries["<?php echo $textarea_field_name; ?>"] = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name; ?>").val();
        <?php endif; ?>

      <?php $c++; endforeach; ?>

      //Default Entry Status.
      form_entries["status"] = jQuery(".SF_<?php echo $post_name; ?> #status").val();

      jQuery(".SF_<?php echo $post_name; ?> .SF_saving_entries").show();

      //Convert JS Array to Object.
      var entries = Object.assign( {}, form_entries );

      <?php
      /*
      * If has File Attachment Fields.
      */
      ?>
      <?php if ( $has_file_attachments ): ?>

        //Ajax properties.
        var data = {
          "action": "SF_forms",
          "operation": "save_form_enrties",
          "sf_csrf": csrf,
          "post_name": post_name,
          "form_entries": entries
        };

        //Initiate Ajax Request for saving entries.
        jQuery.post("/wp-admin/admin-ajax.php", data, function( r ) {

          //Make time interval for 3 seconds.
          setTimeout(function() {
            <?php
            /*
            * Loop form and get file attachments Field Name.
            */
            ?>
            <?php $fa_count = 0; /*File Attachments Field Count.*/ foreach ( $forms as $f2 ): ?>

              <?php
              //If File Attachments are present.
              ?>
              <?php if ( ! empty( $f2['file_attachments'] ) ): ?>
                <?php

                  //File Attachments Field Name. Replace spaces to dash.
                  $fa2_field_name = SF_Shortcode::ireplace( $f2['file_attachments']['name'] );

                  //Lower case all characters.
                  $fa2_field_name = strtolower( $fa2_field_name );

                  //File Attachments Field Count +1.
                  $fa_count++;
                ?>

                //If File Attachment Value is not empty.
                if ( jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa2_field_name; ?>").val() !== "" ) {

                  //Initiate Ajax Upload.
                  jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa2_field_name; ?>").upload("/wp-admin/admin-ajax.php", {
                    "action": "SF_forms",
                    "operation": "file_upload",
                    "field_name": "<?php echo $fa2_field_name; ?>",
                    "entry_name": r

                    //If Upload Successful.
                  }, function( a ) {

                    //Value of File Attachment Field.
                    var file_uploading = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa2_field_name; ?>").val();

                    //Remove Fake Path from webkit browsers.
                    var filename = file_uploading.replace(/^.*\\/, "");

                    //Show Upload Success Message.
                    jQuery(".SF_<?php echo $post_name; ?> .SF_upload_suc_<?php echo $fa2_field_name; ?>").show();

                    //Show Upload Success Message.
                    jQuery(".SF_<?php echo $post_name; ?> .SF_upload_suc_<?php echo $fa2_field_name; ?>").css("color", "<?php echo $f2['file_attachments']['success_message_settings']['font-color']; ?>").html( filename + " <?php echo $f2['file_attachments']['success_message_settings']['message']; ?>");

                    //Hide unnecessary elements.
                    jQuery(".SF_<?php echo $post_name; ?> .SF_upload_<?php echo $fa2_field_name; ?>").hide();
                    jQuery(".SF_<?php echo $post_name; ?> .SF_upload_filename_<?php echo $fa2_field_name; ?>").hide()
                    jQuery(".SF_<?php echo $post_name; ?> .SF_prog_<?php echo $fa2_field_name; ?>").hide();
                    jQuery(".SF_<?php echo $post_name; ?> .SF_percent_<?php echo $fa2_field_name; ?>").hide();

                    //Success Count
                    SF_fa_success_<?php echo $post_name; ?>( 1 );

                    //Upload Progress
                  }, function( prog, val ) {
                    //Show Elements for Upload Progress.
                    jQuery(".SF_<?php echo $post_name; ?> .SF_upload_<?php echo $fa2_field_name; ?>").show();
                      var file_uploading = jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa2_field_name; ?>").val();
                      var filename = file_uploading.replace(/^.*\\/, "");
                      jQuery(".SF_<?php echo $post_name; ?> .SF_upload_filename_<?php echo $fa2_field_name; ?>").show().html("Uploading " + filename);
                      jQuery(".SF_<?php echo $post_name; ?> .SF_upload_prog_<?php echo $fa2_field_name; ?>").show();
                      jQuery(".SF_<?php echo $post_name; ?> .SF_prog_<?php echo $fa2_field_name; ?>").show().css({
                        "width": val + "%"
                      });
                      jQuery(".SF_<?php echo $post_name; ?> .SF_percent_<?php echo $fa2_field_name; ?>").show().html( val + "%" );
                  });
                } else {
                  //Success Count
                  SF_fa_success_<?php echo $post_name; ?>( 1 );
                }
              <?php endif; ?>
            <?php endforeach; ?>
          }, 3000);
        });

        //Max File Attachments Count.
        var max_fa_count = <?php echo $fa_count; ?>;

        //Upload Count container.
        var upload_count = 0;

        <?php
          // This method is to calculate the number of upload success count.
          // If fa_count is equal to max_fa_count. A success message will appear
          // and redirect user to the main page.
        ?>
        function SF_fa_success_<?php echo $post_name; ?>( fa_count ) {

          //Increment upload count.
          upload_count = upload_count + fa_count;

          //If to values matches.
          if ( upload_count == max_fa_count ) {

            //Set Success Message.
            jQuery(".SF_<?php echo $post_name; ?> .SF_saving_entries").css({
              "color": "<?php echo $success_settings['font-color']; ?>",
              "font-weight": "bold"
            }).html("<?php echo $success_settings['message']; ?>");

            //Redirect user in main page in 4 seconds.
            setTimeout(function() {
              location = "<?php echo $success_settings['page_redirect']; ?>";
            }, 4000);
          }
        }

      //If File Attachments Field is not present.
      <?php else: ?>
        //Ajax Request Properties.
        var data = {
          "action": "SF_forms",
          "operation": "save_form_enrties",
          "sf_csrf": csrf,
          "post_name": post_name,
          "form_entries": entries
        };

        //Initiate Ajax Request for saving entries.
        jQuery.post("/wp-admin/admin-ajax.php", data, function( r ) {

          //Interval for 3 seconds.
          setTimeout(function() {

            //Set a Success Message.
            jQuery(".SF_<?php echo $post_name; ?> .SF_saving_entries").css("color", "<?php echo $success_settings['font-color'] ?>").html("<?php echo $success_settings['message']; ?>");

            //Redirect user in main page in 4 seconds.
            setTimeout(function() {
              location = "<?php echo $success_settings['page_redirect']; ?>";
            }, 3000);
          }, 3000);
        });
      <?php endif; ?>
    }


    <?php
      /*
      * Loop the forms. On this section removes the validation error message by JS event actions.
      */
    ?>
    <?php $c = 0; foreach ( $forms as $form4 ): ?>

      <?php
        //If Text Fields are present.
      ?>
      <?php if ( ! empty( $form4['text_field'] ) ): ?>
        <?php

          //Text Field Name.
          $text_field_name = SF_Shortcode::ireplace( $form4['text_field']['name'] );

          //Lower captitalize letters.
          $text_field_name = strtolower( $text_field_name );
        ?>

        //On Keyup Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $text_field_name; ?>").on("keyup", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $text_field_name; ?>-error").html("&nbsp;");
        });
      <?php endif; ?>

      <?php
        //If Number Field is present.
      ?>
      <?php if ( $form4['number_field'] ): ?>
      <?php

        //Number Field Name.
        $number_field_name = SF_Shortcode::ireplace( $form4['number_field']['name'] );

        //Lower captitalize letters.
        $number_field_name = strtolower( $number_field_name );
      ?>

        //On Keyup Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $number_field_name; ?>").on("keyup", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $number_field_name; ?>-error").html("&nbsp;");
        });
      <?php endif; ?>

      <?php
        //If Email Field is present.
      ?>
      <?php if ( ! empty( $form4['email_field'] ) ): ?>
        <?php

          //Email Field Name.
          $email_field_name = SF_Shortcode::ireplace( $form4['email_field']['name'] );

          //Lower capitalize letters.
          $email_field_name = strtolower( $email_field_name );
        ?>

        //On Keyup Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $email_field_name; ?>").on("keyup", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $email_field_name ?>-error").html("&nbsp;");
        });
      <?php endif; ?>

      <?php
        //If Dropdown Field is present.
      ?>
      <?php if ( ! empty( $form4['dropdown_field'] ) ): ?>
        <?php

          //Dropdown Field Name.
          $dropdown_field_name = SF_Shortcode::ireplace( $form4['dropdown_field']['name'] );

          //Lower capitalize letters.
          $dropdown_field_name = strtolower( $dropdown_field_name );
        ?>

        //On Change Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $dropdown_field_name; ?>").on("change", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $dropdown_field_name; ?>-error").html("&nbsp;");
        });
      <?php endif; ?>

      <?php
        //If Chexkbox Field is Present.
      ?>
      <?php if ( ! empty( $form4['checkbox'] ) ): ?>
        <?php

          //Checkbox Field Name.
          $checkbox_field_name = SF_Shortcode::ireplace( $form4['checkbox']['name'] );

          //Lower capitalize letters.
          $checkbox_field_name = strtolower( $checkbox_field_name );
        ?>

        <?php $ch_count = 0; foreach ( $form4['checkbox']['checkboxes'] as $ch4 ): ?>
          <?php
            $ch4_label = SF_Shortcode::ireplace( $ch4['checkbox_label'] );
            $ch4_label = strtolower( $ch4_label );
          ?>

          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $ch4_label . '_' . $c . '_' .$ch_count; ?>").on("change", function() {

            //Remove Error Validation Message.
            jQuery(".SF_<?php echo $post_name; ?> .<?php echo $checkbox_field_name; ?>-error").html("&nbsp;");
          });

          jQuery(".SF_<?php echo $post_name; ?> .SF_label_<?php echo $c . '_' . $ch_count; ?>").on("click", function() {

            //Remove Error Validation Message.
            jQuery(".SF_<?php echo $post_name; ?> .<?php echo $checkbox_field_name; ?>-error").html("&nbsp;");
          });
        <?php $ch_count++; endforeach; ?>

        //On Change Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $checkbox_field_name; ?>").on("change", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $checkbox_field_name; ?>-error").html("&nbsp;");
        });
      <?php endif; ?>

      <?php
        //If Textarea Field is present.
      ?>
      <?php if ( ! empty( $form4['textarea'] ) ): ?>
        <?php

          //Textarea Field Name.
          $textarea_field_name = SF_Shortcode::ireplace( $form4['textarea']['name'] );

          //Lower capitalize letters.
          $textarea_field_name = strtolower( $textarea_field_name );
        ?>

        //On Keyup Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $textarea_field_name; ?>").on("keyup", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $textarea_field_name; ?>-error").html("&nbsp;");
        });
      <?php endif; ?>

      <?php
        //If File Attachment Field is present.
      ?>
      <?php if ( ! empty( $form4['file_attachments'] ) ): ?>
        <?php

          //File Attachment Field Name.
          $fa_field_name = SF_Shortcode::ireplace( $form4['file_attachments']['name'] );

          //Lower capitalize letters.
          $fa_field_name = strtolower( $fa_field_name );
        ?>

        //On Change Event.
        jQuery(".SF_<?php echo $post_name; ?> #<?php echo $fa_field_name; ?>").on("change", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .<?php echo $fa_field_name; ?>-error").html("&nbsp;");
        });
      <?php endif; ?>

      <?php
        //If Captcha Field is present.
      ?>
      <?php if ( ! empty( $form4['captcha'] ) ): ?>

        //On Keyup Event.
        jQuery(".SF_<?php echo $post_name; ?> #captcha").on("keyup", function() {

          //Remove Error Validation Message.
          jQuery(".SF_<?php echo $post_name; ?> .captcha-error").html("&nbsp;");
        });
      <?php endif; ?>

    <?php $c++; endforeach; ?>

  </script>
  <!-- End Shogo Forms -->
<?php endif; ?>
