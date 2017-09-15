<?php

/*************************************************
* Ajax Field Preview for customizing form fields.
* @version 1.0.0
**************************************************/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

?>

<?php
  /**********************
  * If has a Text Field.
  ***********************/
?>
<?php if ( $field_type == 'text_field' ): ?>
<?php

  //Field Label.
  $label = $_SESSION['create_form'][$pos]['text_field']['label'];

  //Field Label Color.
  $label_font_color = $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_color'];

  //Field Label Size.
  $label_size = $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['size'];

  //Field Label Size Types.
  if ( $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
    $label_font_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['percent'] == 1 ) {
    $label_font_size_type = '%';
  }

  //Field Border Color.
  $border_color = $_SESSION['create_form'][$pos]['text_field']['styles']['border_color'];

  //Field Border Size.
  $border_size = $_SESSION['create_form'][$pos]['text_field']['styles']['border_size'];

  //Field Background Color.
  $background_color = $_SESSION['create_form'][$pos]['text_field']['styles']['background_color'];

  //FIeld Font Color.
  $font_color = $_SESSION['create_form'][$pos]['text_field']['styles']['font-color'];

  //Field Padding X.
  $padding_x = $_SESSION['create_form'][$pos]['text_field']['styles']['padding-x'];

  //Field Padding Y.
  $padding_y = $_SESSION['create_form'][$pos]['text_field']['styles']['padding-y'];

  //Field Border Radius.
  $border_radius = $_SESSION['create_form'][$pos]['text_field']['styles']['border_radius'];

  //Field Placeholder.
  $placeholder = $_SESSION['create_form'][$pos]['text_field']['styles']['placeholder'];

  //Field Width.
  $width = $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['width'];

  //Field Width Types.
  if ( $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['pixels'] == 1 ) {
    $width_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['percent'] == 1 ) {
    $width_size_type = '%';
  }
?>

<label style="color: <?php echo $label_font_color; ?>; font-size: <?php echo $label_size . $label_font_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['text_field']['label'] ) ) echo  $_SESSION['create_form'][$pos]['text_field']['label'] . ':'; else echo 'The Label:'; ?></label><br />
<input type="text" class="SF_text_field_preview SF_field_preview" value="Some Text" placeholder="<?php echo $placeholder; ?>" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color:<?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; border-radius: <?php echo $border_radius; ?>px; width: <?php echo $width . $width_size_type; ?>;" />
<?php endif; ?>


<?php
  /*************************
  * If has a Number Field.
  **************************/
?>
<?php if ( $field_type == 'number_field' ): ?>
<?php

  //Field Label.
  $label = $_SESSION['create_form'][$pos]['number_field']['label'];

  //Field Label Color.
  $label_font_color = $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_color'];

  //Field Label Size.
  $label_size = $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['size'];

  //Field Label Size Types.
  if ( $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
    $label_font_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['percent'] == 1 ) {
    $label_font_size_type = '%';
  }

  //Field Border Color.
  $border_color = $_SESSION['create_form'][$pos]['number_field']['styles']['border_color'];

  //Field Border Size.
  $border_size = $_SESSION['create_form'][$pos]['number_field']['styles']['border_size'];

  //Field Background Color.
  $background_color = $_SESSION['create_form'][$pos]['number_field']['styles']['background_color'];

  //FIeld Font Color.
  $font_color = $_SESSION['create_form'][$pos]['number_field']['styles']['font-color'];

  //Field Padding X.
  $padding_x = $_SESSION['create_form'][$pos]['number_field']['styles']['padding-x'];

  //Field Padding Y.
  $padding_y = $_SESSION['create_form'][$pos]['number_field']['styles']['padding-y'];

  //Field Border Radius.
  $border_radius = $_SESSION['create_form'][$pos]['number_field']['styles']['border_radius'];

  //Field Placeholder.
  $placeholder = $_SESSION['create_form'][$pos]['number_field']['styles']['placeholder'];

  //Field Width.
  $width = $_SESSION['create_form'][$pos]['number_field']['styles']['width_type']['width'];

  //Field Width Types.
  if ( $_SESSION['create_form'][$pos]['number_field']['styles']['width_type']['pixels'] == 1 ) {
    $width_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['number_field']['styles']['width_type']['percent'] == 1 ) {
    $width_size_type = '%';
  }
?>

<label style="color: <?php echo $label_font_color; ?>; font-size: <?php echo $label_size . $label_font_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['number_field']['label'] ) ) echo $_SESSION['create_form'][$pos]['number_field']['label'] . ':'; else echo 'The Label:'; ?></label><br />
<input type="number" class="SF_number_field_preview SF_field_preview" value="11" placeholder="<?php echo $placeholder; ?>" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color:<?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; border-radius: <?php echo $border_radius; ?>px; width: <?php echo $width . $width_size_type; ?>;" />

<?php endif; ?>


<?php
  /*************************
  * If has a Email Field.
  **************************/
?>
<?php if ( $field_type == 'email_field' ): ?>
<?php

  //Field Label.
  $label = $_SESSION['create_form'][$pos]['email_field']['label'];

  //Field Label Color.
  $label_font_color = $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_color'];

  //Field Label Size.
  $label_size = $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['size'];

  //Field Label Size Types.
  if ( $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
    $label_font_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['percent'] == 1 ) {
    $label_font_size_type = '%';
  }

  //Field Border Color.
  $border_color = $_SESSION['create_form'][$pos]['email_field']['styles']['border_color'];

  //Field Border Size.
  $border_size = $_SESSION['create_form'][$pos]['email_field']['styles']['border_size'];

  //Field Background Color.
  $background_color = $_SESSION['create_form'][$pos]['email_field']['styles']['background_color'];

  //FIeld Font Color.
  $font_color = $_SESSION['create_form'][$pos]['email_field']['styles']['font-color'];

  //Field Padding X.
  $padding_x = $_SESSION['create_form'][$pos]['email_field']['styles']['padding-x'];

  //Field Padding Y.
  $padding_y = $_SESSION['create_form'][$pos]['email_field']['styles']['padding-y'];

  //Field Border Radius.
  $border_radius = $_SESSION['create_form'][$pos]['email_field']['styles']['border_radius'];

  //Field Placeholder.
  $placeholder = $_SESSION['create_form'][$pos]['email_field']['styles']['placeholder'];

  //Field Width.
  $width = $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['width'];

  //Field Width Types.
  if ( $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['pixels'] == 1 ) {
    $width_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['percent'] == 1 ) {
    $width_size_type = '%';
  }
?>

<label style="color: <?php echo $label_font_color; ?>; font-size: <?php echo $label_size . $label_font_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['email_field']['label'] ) ) echo $_SESSION['create_form'][$pos]['email_field']['label'] . ':'; else echo 'The Label:'; ?></label><br />
<input type="email" class="SF_number_field_preview SF_field_preview" value="yourname@domain.com" placeholder="<?php echo $placeholder; ?>" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color:<?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; border-radius: <?php echo $border_radius; ?>px; width: <?php echo $width . $width_size_type; ?>;" />
<?php endif; ?>

<?php
  /**************************
  * If has a Dropdown Field.
  ***************************/
?>
<?php if ( $field_type == 'dropdown_field' ): ?>
<?php

  //Field Label.
  $label = $_SESSION['create_form'][$pos]['dropdown_field']['label'];

  //Field Label Color.
  $label_font_color = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_color'];

  //Field Label Size.
  $label_size = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['size'];

  //Field Label Size Types.
  if ( $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
    $label_font_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['percent'] == 1 ) {
    $label_font_size_type = '%';
  }

  //Field Border Color.
  $border_color = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['border_color'];

  //Field Border Size.
  $border_size = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['border_size'];

  //Field Background Color.
  $background_color = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['background_color'];

  //FIeld Font Color.
  $font_color = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['font-color'];

  //Field Padding X.
  $padding_x = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['padding-x'];

  //Field Padding Y.
  $padding_y = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['padding-y'];

  //Field Border Radius.
  $border_radius = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['border_radius'];

  //Field Width.
  $width = $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['width'];

  //Field Width Types.
  if ( $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['pixels'] == 1 ) {
    $width_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['percent'] == 1 ) {
    $width_size_type = '%';
  }
?>

  <label style="color: <?php echo $label_font_color; ?>; font-size: <?php echo $label_size . $label_font_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['dropdown_field']['label'] ) ) echo $_SESSION['create_form'][$pos]['dropdown_field']['label'] . ':'; else echo 'The Label:'; ?></label><br />
  <select class="SF_dropdown_field_preview SF_field_preview" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color:<?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; width: <?php echo $width . $width_size_type; ?>; height: auto; border-radius: <?php echo $border_radius; ?>px;" >
    <option value=""><?php if ( ! empty( $_SESSION['create_form'][$pos]['dropdown_field']['label'] ) ) echo $_SESSION['create_form'][$pos]['dropdown_field']['label']; else echo 'Select Options'; ?></option>
    <?php if ( ! empty( $_SESSION['create_form'][$pos]['dropdown_field']['options'] ) ): ?>
      <?php foreach ( $_SESSION['create_form'][$pos]['dropdown_field']['options'] as $option ): ?>
        <?php if ( $option['checked'] == 1 ): ?>
          <option value="<?php echo $option['value']; ?>" selected><?php echo $option['value']; ?></option>
        <?php else: ?>
          <option value="<?php echo $option['value']; ?>"><?php echo $option['value']; ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </select>
<?php endif; ?>

<?php
  /************************
  * If has a Radio Button.
  *************************/
?>
<?php if ( $field_type == 'radio_button' ):  ?>
  <?php

    //Field Label Font Color.
    $label_font_color = $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_color'];

    //Field Label Size Type.
    if ( $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['pixels'] == 1 ) {
      $label_size_type = 'px';
    } else if ( $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['percent'] == 1 ) {
      $label_size_type = '%';
    }

    //Field Label Font Size.
    $label_size = $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['size'];

    //Field Border Color.
    $border_color = $_SESSION['create_form'][$pos]['radio_button']['styles']['border_color'];

    //Bullet Color.
    $bullet_color = $_SESSION['create_form'][$pos]['radio_button']['styles']['bullet_color'];

    //Field Background Color.
    $background_color = $_SESSION['create_form'][$pos]['radio_button']['styles']['background_color'];

    //Field Font Color.
    $font_color = $_SESSION['create_form'][$pos]['radio_button']['styles']['font-color'];
  ?>

  <h3>Radio Field Preview</h3>
  <label style="color: <?php echo $label_font_color; ?>; font-size: <?php echo $label_size . $label_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['radio_button']['label'] ) ) echo $_SESSION['create_form'][$pos]['radio_button']['label'] . ':'; else echo 'The Label:'; ?></label><br />
  <?php if ( empty( $_SESSION['create_form'][$pos]['radio_button']['bullets'] ) ): ?>
    <style>
      .SF_radio_field_preview_1, .SF_radio_field_preview_2 {
        visibility: hidden;
      }

      .SF_radio_check_1, .SF_radio_check_2 {
        display: block;
        float: left;
        border: 5px solid <?php echo $border_color; ?>;
        border-radius: 100%;
        height: 15px;
        width: 15px;
        background: <?php echo $background_color; ?>;
        cursor: pointer;
      }

      .SF_check_label_1, .SF_check_label_2 {
        float: left;
        margin-top: 3px;
        margin-left: 5px;
      }

      .SF_radio_field_preview_1:checked ~ .SF_radio_check_1, .SF_radio_field_preview_2:checked ~ .SF_radio_check_2 {
        background: <?php echo $bullet_color; ?>;
      }
    </style>
    <ul class="SF_radio_preview_group <?php if ( $_SESSION['create_form'][$pos]['radio_button']['display'] == 'horizontal' ) echo 'SF_display_horizontal'; else echo 'SF_display_vertical'; ?>">
      <li>
        <input type="radio" name="sf_radio" class="SF_radio_field_preview SF_radio_field_preview_1 SF_field_preview" value="1" checked="checked" />
        <span class="SF_radio_check_1"></span>
        <span class="SF_check_label_1" style="color: <?php echo $radio_field_font_color; ?>;">Radio 1</span>
      </li>
      <li>
        <input type="radio" name="sf_radio" class="SF_radio_field_preview SF_radio_field_preview_2 SF_field_preview" value="1" />
        <span class="SF_radio_check_2"></span>
        <span class="SF_check_label_2" style="color: <?php echo $radio_field_font_color; ?>;">Radio 2</span>
      </li>
    </ul>

    <script type="text/javascript">
      jQuery(".SF_radio_check_1").on("click", function() {
        jQuery(".SF_radio_field_preview_1").attr("checked", "checked");
      });

      jQuery(".SF_radio_check_2").on("click", function() {
        jQuery(".SF_radio_field_preview_2").attr("checked", "checked");
      });
    </script>
  <?php else: ?>
    <style>
      .SF_radio_field_preview {
        visibility: hidden;
      }

      .SF_radio_check {
        display: block;
        float: left;
        border: 5px solid <?php echo $border_color; ?>;
        border-radius: 100%;
        height: 15px !important;
        width: 15px !important;
        background: <?php echo $background_color; ?>;
        cursor: pointer;
      }

      .SF_check_label {
        float: left;
        margin-top: 3px;
        margin-left: 5px;
      }

      .SF_radio_field_preview:checked ~ .SF_radio_check {
        background: <?php echo $bullet_color; ?>;
      }
    </style>
    <ul class="SF_radio_preview_group <?php if ( $_SESSION['create_form'][$pos]['radio_button']['display'] == 'horizontal' ) echo 'SF_display_horizontal'; else echo 'SF_display_vertical'; ?>">
      <?php $bc = 0; foreach ( $_SESSION['create_form'][$pos]['radio_button']['bullets'] as $bul ): ?>
        <li>
          <?php if ( $bul['checked'] == 1 ): ?>
            <input type="radio" name="SF_radio" class="SF_radio_field_preview SF_radio_field_preview_<?php echo $bc; ?>" value="1" checked="checked" />
          <?php else: ?>
            <input type="radio" name="SF_radio" class="SF_radio_field_preview SF_radio_field_preview_<?php echo $bc; ?>" value="1" />
          <?php endif; ?>
          <span class="SF_radio_check SF_radio_check_<?php echo $bc; ?>"></span>
          <span class="SF_check_label" style="color: <?php echo $font_color; ?>;"><?php echo $bul['bullet_label']; ?></span>
        </li>
      <?php $bc++; endforeach; ?>
    </ul>

    <script type="text/javascript">
      <?php $bc = 0; foreach ( $_SESSION['create_form'][$pos]['radio_button']['bullets'] as $bul ): ?>
        jQuery(".SF_radio_check_<?php echo $bc; ?>").on("click", function() {
          jQuery(".SF_radio_field_preview_<?php echo $bc; ?>").attr("checked", "checked");
        });
      <?php $bc++; endforeach; ?>
    </script>
  <?php endif; ?>
<?php endif; ?>


<?php
  /**************************
  * If has a Checkbox Field.
  ***************************/
?>
<?php if ( $field_type == 'checkbox' ): ?>
  <?php

    //Field Label Font Color.
    $label_font_color = $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_color'];

    //Field Label Size.
    $label_size = $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['size'];

    //Field Label Size Type.
    if ( $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['pixels'] == 1 ) {
      $label_size_type = 'px';
    } else if ( $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['percent'] == 1 ) {
      $label_size_type = '%';
    }

    //Field Border Color.
    $border_color = $_SESSION['create_form'][$pos]['checkbox']['styles']['border_color'];

    //Field Check Color.
    $check_color = $_SESSION['create_form'][$pos]['checkbox']['styles']['check_color'];

    //Field Background Color.
    $background_color = $_SESSION['create_form'][$pos]['checkbox']['styles']['background_color'];

    //Field Font Color.
    $font_color = $_SESSION['create_form'][$pos]['checkbox']['styles']['font-color'];

  ?>
  <style type="text/css">
    .SF_checkbox_form input[type=checkbox] {
      display: none;
    }

    .SF_checkbox_form input[type=checkbox] + .SF_checkboxes_label {
      display: block;
      margin-bottom: 10px;
      position: relative;
    }

    .SF_checkbox_form input[type=checkbox] + .SF_checkboxes_label:before {
      content: "";
      border: 1px solid <?php echo $border_color; ?>;
      display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 3px;
      background-color: <?php echo $background_color; ?>;
      float: left;
      position: relative;
      right: 5px;
    }

    .SF_checkbox_form input[type=checkbox]:checked + .SF_checkboxes_label:before {
      content: "\2714";
      color: <?php echo $check_color; ?>;
      text-align: center;
      line-height: 20px;
    }
  </style>

  <h3>Checkbox Field Preview</h3>
  <?php if ( $_SESSION['create_form'][$pos]['checkbox']['hide_header'] == 0 ): ?>
    <label style="color: <?php echo $label_color; ?>; font-size: <?php echo $label_size . $label_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['checkbox']['label'] ) ) echo $_SESSION['create_form'][$pos]['checkbox']['label'] . ':'; else echo 'The Label:'; ?></label><br />
  <?php endif; ?>

  <?php if ( empty( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] ) ): ?>
    <form class="SF_checkbox_form">
      <ul class="SF_checkbox_preview_group <?php if ( $_SESSION['create_form'][$pos]['checkbox']['display'] == 'horizontal' ) echo 'SF_display_horizontal'; else echo 'SF_display_vertical'; ?>">
        <li>
          <input type="checkbox" name="sf_ch" class="SF_checkbox_field_preview SF_checkbox_field_preview_1" value="1" checked="checked" />
          <label class="SF_checkboxes_label SF_checkboxes_label_1" style="color: <?php echo $checkbox_field_font_color; ?>;">Checkbox 1</label>
        </li>
        <li>
          <input type="checkbox" name="sf_ch" class="SF_checkbox_field_preview_2 SF_field_preview" value="1" />
          <label class="SF_checkboxes_label SF_checkboxes_label_2" style="color: <?php echo $checkbox_field_font_color; ?>;">Checkbox 2</label>
        </li>
      </ul>
    </form>

    <script type="text/javascript">
      var SF_toggle_1 = true;

      jQuery(".SF_checkboxes_label_1").on("click", function() {
        if ( SF_toggle_1 == false ) {
          SF_toggle_1 = true;

          jQuery(".SF_checkbox_field_preview_1").attr("checked", "checked");
        } else {
          SF_toggle_1 = false;

          jQuery(".SF_checkbox_field_preview_1").attr("checked", false);
        }
      });

      SF_toggle_2 = false;

      jQuery(".SF_checkboxes_label_2").on("click", function() {
        if ( SF_toggle_2 == false ) {
          SF_toggle_2 = true;

          jQuery(".SF_checkbox_field_preview_2").attr("checked", "checked");
        } else {
          SF_toggle_2 = false;

          jQuery(".SF_checkbox_field_preview_2").attr("checked", false);
        }
      });
    </script>
  <?php else: ?>
    <form class="SF_checkbox_form">
    <ul class="SF_checkbox_preview_group <?php if ( $_SESSION['create_form'][$pos]['checkbox']['display'] == 'horizontal' ) echo 'SF_display_horizontal'; else echo 'SF_display_vertical'; ?>">
      <?php $chc = 0; foreach ( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] as $ch2 ): ?>
        <?php
          $ch_label = $ch2['checkbox_label'];
          $ch_checked = $ch2['checked'];
        ?>
        <li>
          <input type="checkbox" name="sf_ch" class="SF_checkbox_field_preview SF_checkbox_field_preview_chx_<?php echo $chc; ?>" value="1" <?php if ( $ch_checked == 1 ) echo 'checked="checked"'; ?> />
          <label class="SF_checkboxes_label SF_checkboxes_label_chx_<?php echo $chc; ?>" style="color: <?php echo $font_color; ?>;"><?php echo $ch_label; ?></label>
        </li>
      <?php $chc++; endforeach; ?>
    </ul>
    </form>

    <script type="text/javascript">
      <?php $chx = 0; foreach ( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] as $chj ): ?>
        <?php
          $ch3_checked = $chj['checked'];
        ?>

        <?php if ( $ch3_checked == 1 ): ?>
          var SF_toogle_chx_<?php echo $chx; ?> = true;
        <?php elseif ( $ch3_checked == 0 ): ?>
          var SF_toogle_chx_<?php echo $chx; ?> = false;
        <?php endif; ?>

        jQuery(".SF_checkboxes_label_chx_<?php echo $chx; ?>").on("click", function() {
          if ( SF_toogle_chx_<?php echo $chx; ?> == false ) {
            SF_toogle_chx_<?php echo $chx; ?> = true;

            jQuery(".SF_checkbox_field_preview_chx_<?php echo $chx; ?>").attr("checked", "checked");
          } else {
            SF_toogle_chx_<?php echo $chx; ?> = false;

            jQuery(".SF_checkbox_field_preview_chx_<?php echo $chx; ?>").attr("checked", false);
          }
        });
      <?php $chx++; endforeach; ?>
    </script>
  <?php endif; ?>

<?php endif; ?>


<?php
  /**************************
  * If has a Textarea Field.
  ***************************/
?>
<?php if ( $field_type == 'textarea' ): ?>
<?php

  //Field Label.
  $label = $_SESSION['create_form'][$pos]['textarea']['label'];

  //Field Label Color.
  $label_font_color = $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_color'];

  //Field Label Size.
  $label_size = $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['size'];

  //Field Label Size Types.
  if ( $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['pixels'] == 1 ) {
    $label_font_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['percent'] == 1 ) {
    $label_font_size_type = '%';
  }

  //Field Border Color.
  $border_color = $_SESSION['create_form'][$pos]['textarea']['styles']['border_color'];

  //Field Border Size.
  $border_size = $_SESSION['create_form'][$pos]['textarea']['styles']['border_size'];

  //Field Background Color.
  $background_color = $_SESSION['create_form'][$pos]['textarea']['styles']['background_color'];

  //FIeld Font Color.
  $font_color = $_SESSION['create_form'][$pos]['textarea']['styles']['font-color'];

  //Field Padding X.
  $padding_x = $_SESSION['create_form'][$pos]['textarea']['styles']['padding-x'];

  //Field Padding Y.
  $padding_y = $_SESSION['create_form'][$pos]['textarea']['styles']['padding-y'];

  //Field Border Radius.
  $border_radius = $_SESSION['create_form'][$pos]['textarea']['styles']['border_radius'];

  //Field Placeholder.
  $placeholder = $_SESSION['create_form'][$pos]['textarea']['styles']['placeholder'];

  //Field Width.
  $width = $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['width'];

  //Field Width Types.
  if ( $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['pixels'] == 1 ) {
    $width_size_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['percent'] == 1 ) {
    $width_size_type = '%';
  }

  //Field Height
  $height = $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['height'];

  //Field Height Type.
  if ( $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['pixels'] == 1 ) {
    $height_type = 'px';
  } else if ( $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['percent'] == 1 ) {
    $height_type = '%';
  }
?>

  <label style="color: <?php echo $label_font_color; ?>; font-size: <?php echo $label_size . $label_font_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['textarea']['label'] ) ) echo $_SESSION['create_form'][$pos]['textarea']['label'] . ':'; else echo 'The Label:'; ?></label><br />
  <textarea class="SF_textarea_field_preview SF_field_preview" placeholder="<?php echo $placeholder; ?>" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color:<?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; border-radius: <?php echo $border_radius; ?>px; width: <?php echo $width . $width_size_type; ?>; height: <?php echo $height . $height_type; ?>; ">Some Text...</textarea>
<?php endif; ?>

<?php
  /**************************
  * If Has File Attachments.
  ***************************/
?>
<?php if ( $field_type == 'file_attachments' ): ?>
  <?php

    //Field Label Font Color.
    $label_font_color = $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_color'];

    //Field Label Font Size.
    $label_font_size_type = $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['size'];

    //Field Label Font Size Type.
    if ( $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['pixels'] == 1 ) {
      $label_size_type = 'px';
    } else if ( $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['percent'] == 1 ) {
      $label_size_type = '%';
    }

    //Field Border Color.
    $border_color = $_SESSION['create_form'][$pos]['file_attachments']['styles']['border_color'];

    //Field Border Size.
    $border_size = $_SESSION['create_form'][$pos]['file_attachments']['styles']['border_size'];

    //Field Background Color.
    $background_color = $_SESSION['create_form'][$pos]['file_attachments']['styles']['background_color'];

    //Field Font Color.
    $font_color = $_SESSION['create_form'][$pos]['file_attachments']['styles']['font-color'];

    //Field Padding X.
    $padding_x = $_SESSION['create_form'][$pos]['file_attachments']['styles']['padding-x'];

    //Field Padding Y.
    $padding_y = $_SESSION['create_form'][$pos]['file_attachments']['styles']['padding-y'];

    //Field Width.
    $width = $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['width'];

    //Width Types.
    if ( $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['pixels'] == 1 ) {
      $width_type = 'px';
    } else if ( $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['percent'] == 1 ) {
      $width_type = '%';
    }
  ?>
  <label style="color: <?php echo $label_font_color; ?>; font-size: <?php echo $label_size . $label_size_type; ?>;"><?php if ( ! empty ( $_SESSION['create_form'][$pos]['file_attachments']['label'] ) ) echo $_SESSION['create_form'][$pos]['file_attachments']['label'] . ':'; else echo 'The Label:'; ?></label><br />
  <input type="file" class="SF_fa_field_preview SF_field_preview" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color:<?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; width: <?php echo $width . $width_type; ?>;" />
<?php endif; ?>

<?php
  /***********************
  * If Has Captcha Field.
  ************************/
?>
<?php if ( $field_type == 'captcha' ): ?>
  <?php

    //Field Border Color.
    $border_color = $_SESSION['create_form'][$pos]['captcha']['styles']['border_color'];

    //Field Border size.
    $border_size = $_SESSION['create_form'][$pos]['captcha']['styles']['border_size'];

    //Field Background Color.
    $background_color = $_SESSION['create_form'][$pos]['captcha']['styles']['background_color'];

    //Field Font Color.
    $font_color = $_SESSION['create_form'][$pos]['captcha']['styles']['font-color'];

    //Field Padding X.
    $padding_x = $_SESSION['create_form'][$pos]['captcha']['styles']['padding-x'];

    //Field Padding Y.
    $padding_y = $_SESSION['create_form'][$pos]['captcha']['styles']['padding-y'];

    //Field Placeholder.
    $placehoder = $_SESSION['create_form'][$pos]['captcha']['styles']['placehoder'];

    //Field Width.
    $width = $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['width'];

    //Field Width Types.
    if ( $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['pixels'] == 1 ) {
      $width_type = 'px';
    } else if ( $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['percent'] == 1 ) {
      $width_type = '%';
    }
  ?>

  <div>
    <?php $ExactBrowserNameUA = $_SERVER['HTTP_USER_AGENT']; ?>
    <?php if ( strpos(strtolower($ExactBrowserNameUA), "safari/") && strpos(strtolower($ExactBrowserNameUA), "chrome/") ): ?>
      <img src="/wp-content/plugins/shogo-forms/includes/captcha.php?post_name=dev" /><br />
    <?php else: ?>
    <p><a target="_blank" href="/wp-content/plugins/shogo-forms/includes/captcha.php?post_name=dev">  Click here for image preview.</a></p>
    <?php endif; ?>
    <input type="text" class="SF_captcha_field_preview SF_field_preview" value="Some Text" placeholder="<?php echo $placeholder; ?>" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color:<?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; width: <?php echo $width . $width_type; ?>;" />
  </div>
<?php endif; ?>

<?php
  /*********************
  * Has Submit Button.
  **********************/
?>
<?php if ( $field_type == 'submit' ): ?>
  <?php

    //Field Border Color.
    $border_color = $_SESSION['create_form'][$pos]['submit']['styles']['border_color'];

    //Field Border Size.
    $border_size = $_SESSION['create_form'][$pos]['submit']['styles']['border_size'];

    //Field Background Color
    $background_color = $_SESSION['create_form'][$pos]['submit']['styles']['background_color'];

    //Field Font
    $font_color = $_SESSION['create_form'][$pos]['submit']['styles']['font-color'];

    //Field Padding X.
    $padding_x = $_SESSION['create_form'][$pos]['submit']['styles']['padding-x'];

    //Field Padding Y.
    $padding_y = $_SESSION['create_form'][$pos]['submit']['styles']['padding-y'];

    //Field Border Radius.
    $border_radius = $_SESSION['create_form'][$pos]['submit']['styles']['border_radius'];
  ?>

  <input type="button" class="SF_text_field_preview SF_field_preview" value="<?php if ( ! empty( $_SESSION['create_form'][$pos]['submit']['value'] ) ) { echo $_SESSION['create_form'][$pos]['submit']['value']; } else { echo 'Submit'; } ?>" style="border-width: <?php echo $border_size; ?>px; border-style: solid; border-color: <?php echo $border_color; ?>; background-color: <?php echo $background_color; ?>; color: <?php echo $font_color; ?>; padding: <?php echo $padding_y; ?>px <?php echo $padding_x; ?>px; border-radius: <?php echo $border_radius; ?>px; cursor: pointer; " />
<?php endif; ?>
