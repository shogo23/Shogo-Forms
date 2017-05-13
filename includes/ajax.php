<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/*********************
* Main Ajax Proccess.
* @version 1.0.0
**********************/
class SF_Ajax {
	public function init() {

    //Operation of ajax request.
    $operation = $_POST['operation'];

    switch ( $operation ) {

      //Display user create form in Create Form Page.
      case 'create_form':
        ob_start();
        include_once SF_PATH . 'includes/ajax_contents/create_form.php';
        echo ob_get_clean();
      break;

      /*************************************
      * Form Buttons from Create Form Page.
      **************************************/
      //When Text Field button clicked create session hanlder for Text Field.
      case "text_field":
      	$_SESSION['create_form'][]['text_field'] = array(
          'name' => '',       //Name of Text Field.
          'label' => '',      //Label of Text Field.
          'toggle' => 1,      //Window Field Minimizer.

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'border_size' => '1',             //Field Border Size.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
            'padding-x' => 3,                 //Field Padding Size X Cooridate.
            'padding-y' => 3,                 //Field Padding Size Y Coordinate.
            'border_radius' => 0,             //Field Border Radius.
            'placeholder' => '',              //Field Placeholder.

            //Width Types. (Pixels or Percent).
            'width_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'width' => 300                  //Field Width Size.
            )
          ),

          //Validation Options for Text Field.
          'validation' => array(                                //Field Validation.
            'enabled' => 0,                                     //Field is Required. zero(0) is not required and one(1) is required.
            'required' => array(                                //Field Required.
              'message' => 'This field is required.',           //Validation message.
              'font-color' => '#F60717'                         //Font color.
            ),
            'min_length' => array(                              //Minimum String Length Required.
              'length' => 0,                                    //String Length.
              'message' => 'Character field is too short.',     //Validation Message.
              'font-color' => '#F60717',                        //Font Color.
            ),
            'max_length' => array(                              //Maximum String Length.
              'length' => 0,                                    //String Length.
              'message' => 'Character field is too long.',      //Validation Message.
              'font-color' => '#F60717'                         //Font Color.
            )
          )
        );
      break;

      //When Number Field button clicked create session handler for Number Field.
      case 'number_field':
        $_SESSION['create_form'][]['number_field'] = array(
          'name' => '',                       //Name of Number Field.
          'label' => '',                      //Label of Number Field.,
          'toggle' => 1,                      //Window Field Minimizer.

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'border_size' => '1',             //Field Border Size.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
            'padding-x' => 3,                 //Field Padding Size X Cooridate.
            'padding-y' => 3,                 //Field Padding Size Y Coordinate.
            'border_radius' => 0,             //Field Border Radius.
            'placeholder' => '',              //Field Placeholder.

            //Width Types. (Pixels or Percent).
            'width_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'width' => 300                  //Field Width Size.
            )
          ),

          //Validation Options for Number Field.
          'validation' => array(
            'enabled' => 0,
            'required' => array(
              'message' => 'This field is required.',           //Validation message.
              'font-color' => '#F60717'                         //Font color.
            ),
            'min_length' => array(                              //Minimum String Length Required.
              'length' => 0,                                    //String Length.
              'message' => 'Character field is too short.',     //Validation Message.
              'font-color' => '#F60717',                        //Font Color.
            ),
            'max_length' => array(                              //Maximum String Length.
              'length' => 0,                                   //String Length.
              'message' => 'Character field is too long.',      //Validation Message.
              'font-color' => '#F60717'                         //Font Color.
            )
          )
        );
      break;

      //When Email Field button clicked create session handler for Email Field.
      case 'email_field':
      	$_SESSION['create_form'][]['email_field'] = array(
          'name' => '',       //Name of Email Field.
          'label' => '',      //Label of Email Field.
          'toggle' => 1,      //Window Field Minimizer.

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'border_size' => '1',             //Field Border Size.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
            'padding-x' => 3,                 //Field Padding Size X Cooridate.
            'padding-y' => 3,                 //Field Padding Size Y Coordinate.
            'border_radius' => 0,             //Field Border Radius.
            'placeholder' => '',              //Field Placeholder.

            //Width Types. (Pixels or Percent).
            'width_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'width' => 300                  //Field Width Size.
            )
          ),

          //Validation Options for Email Field.
          'validation' =>  array(
            'enabled' => 0,
            'required' => array(
              'message' => 'This field is required.',                   //Validation message.
              'font-color' => '#F60717'                                 //Font color.
            ),
            'invalid_format' => array(                                  //Invalid Email Format.
              'message' => 'Invalid Email Format.',                     //Invalid Email Format Message.
              'font-color' => '#F60717'                                 //Font Color.
            ),
            'min_length' => array(                                      //Minimum String Length Required.
              'length' => 0,                                            //String Length.
              'message' => 'Character field is too short.',             //Validation Message.
              'font-color' => '#F60717',                                //Font Color.
            ),
            'max_length' => array(                                      //Maximum String Length.
              'length' => 0,                                           //String Length.
              'message' => 'Character field is too long.',              //Validation Message.
              'font-color' => '#F60717'                                 //Font Color.
            )
          )
        );
      break;

      //When Dropdown button field clicked create session handler for Dropdown field.
      case 'dropdown_button':
        $_SESSION['create_form'][]['dropdown_field'] = array(
          'name' => '',       //Name of Dropdown Field.
          'label' => '',      //Label of Dropdown Field.
          'options' => '',    //Dropdown Field Options. array()
          'toggle' => 1,      //Window Field Minimizer.

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'border_size' => '1',             //Field Border Size.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
            'padding-x' => 3,                 //Field Padding Size X Cooridate.
            'padding-y' => 3,                 //Field Padding Size Y Coordinate.
            'border_radius' => 0,             //Field Border Radius.

            //Width Types. (Pixels or Percent).
            'width_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'width' => 300                  //Field Width Size.
            )
          ),

          //Validation Options for Dropdown Field.
          'validation' => array(
            'required' => 0,                          //Field is Required. zero(0) is not required and one(1) is required.
            'message' => 'This field is required.',    //Validation message.
            'font-color' => '#F60717'                     //Font color.
          )
        );
      break;

      //When Radio Field button clicked create session hander for Dropdown field.
      case 'radio_button':
      	$_SESSION['create_form'][]['radio_button'] = array(
          'name' => '',               //Name of Radio Field.
          'label' => '',              //Label of Radio Field.
          'bullets' => '',            //Radio Field Bullets. array()
          'toggle' => 1,
          'display' => 'horizontal',  //Display Position of Bullets.

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'bullet_color' => '#0DFF92',      //Bullet Color.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
          )
        );
      break;

      //When Checkbox Field button clicked create session handler for Checkbox field.
      case 'checkbox':
      	$_SESSION['create_form'][]['checkbox'] = array(
          'name' => '',             //Name of Checkbox Field.
          'label' => '',            //Label of Checkbox Field.
          'checkboxes' => '',       //Checkbox Field checkboxes. array()
          'hide_header' => 0,       //Hide Header or Main Label.
          'toggle' => 1,

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'check_color' => '#000000',       //Check Sign Color.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color
          ),

          //Validation Options for Checkbox Field.
          'validation' => array(
            'required' => 0,                          //Field is Required. zero(0) is not required and one(1) is required.
            'message' => 'This field is required.',   //Validation message.
            'font-color' => '#F60717'                 //Font color.
          ),
          'display' => 'horizontal'                   //Display Position of Checkboxes.
        );
      break;

      //When Textarea Field button clicked create session handler for Textarea field.
      case 'textarea':
      	$_SESSION['create_form'][]['textarea'] = array(
          'name' => '',       //Name of Textarea Field.
          'label' => '',      //Label of Checkbox Field.
          'toggle' => 1,

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'border_size' => '1',             //Field Border Size.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
            'border_radius' => 0,             //Field Border Radius.
            'padding-x' => 3,                 //Field Padding Size X Cooridate.
            'padding-y' => 3,                 //Field Padding Size Y Coordinate.

            //Width Types. (Pixels or Percent).
            'width_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'width' => 300                  //Field Width Size.
            ),

            //Height Types.
            'height_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'height' => 250                 //Field Height Size.
            ),
          ),

          //Validation Options for Textarea Field.
          'validation' => array(
            'enabled' => 0,
            'required' => array(
              'message' => 'This field is required.',                   //Validation message.
              'font-color' => '#F60717'                                 //Font color.
            ),
            'min_length' => array(                                      //Minimum String Length Required.
              'length' => 0,                                            //String Length.
              'message' => 'Character field is too short.',             //Validation Message.
              'font-color' => '#F60717',                                //Font Color.
            ),
            'max_length' => array(                                      //Maximum String Length.
              'length' => 0,                                           //String Length.
              'message' => 'Character field is too long.',              //Validation Message.
              'font-color' => '#F60717'                                 //Font Color.
            )
          )
        );
      break;

      //When File Attachment Field clicked create session handler for File Attachment.
      case 'file_attachments':
        $_SESSION['create_form'][]['file_attachments'] = array(
          'name' => '',               //Name of File Attachment Field.
          'label' => '',              //Label of File Attatchment Field.
          'max_size' => 1000,         //Max File Size.
          'file_types' => 'pdf,doc',  //File Types.
          'toggle' => 1,

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'label_font_color' => '#000000',  //Label Font Color.

            //Label Font Size Types.
            'label_font_size_type' => array(
              'pixels' => 1,                  //Size Pixel Type.
              'percent' => 0,                 //Size Percent Type.
              'size' => 16,                   //Label Font Size,
            ),

            'border_color' => '#CCCCCC',      //Field Border Color.
            'border_size' => '1',             //Field Border Size.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
            'padding-x' => 3,                 //Field Padding Size X Cooridate.
            'padding-y' => 3,                 //Field Padding Size Y Coordinate.

            //Width Types. (Pixels or Percent).
            'width_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'width' => 300                  //Field Width Size.
            )
          ),

          //Validation Options for File Attachments Field.
          'validation' => array(
            'required' => 0,                            //Field is Required. zero(0) is not required and one(1) is required.
            'message' => 'This field is required.',     //Validation message.
            'font-color' => '#F60717'                   //Font color.
          ),
          'progress_bar_layout' => array(               //Progress bar layout.
            'border_color' => '#7f8383',                //Progress bar border: color.
            'background_color' => '#7f8383',            //Progress bar background color.
            'progress_color' => '#3a3737',              //Progress bar progress color.
            'font-color' => '#ffffff',                  //Progress bar font color.
            'filename_color' => '#000000'               //Progress filename font color.
          ),

          'error_message' => array(
            'file_size' => 'File is too large.',
            'file_type' => 'File Type is not allowed.',
            'font-color' => '#F60717'
          ),

          'success_message_settings' => array(
            'message' => 'Upload Complete.',
            'font-color' => '#04BC2A'
          )
        );
      break;

      //When Captcha Field is clicked create session handler for Captcha.
      case 'captcha':
        $_SESSION['create_form'][]['captcha'] = array(
          'length' => 10,
          'toggle' => 1,

          //Styling Field.
          'styles' => array(
            'required' => 0,                                  //Custom Style Selected.
            'captcha_background_color' => 'rgb(255, 0, 1)',   //Captcha Background Color.
            'captcha_font-color' => 'rgb(255, 255, 255)',     //Captcha Font Color.
            'captcha_line_color' => 'rgb(150, 150, 150)',     //Line Color.
            'border_color' => '#CCCCCC',                      //Field Border Color.
            'border_size' => '1',                             //Field Border Size.
            'background_color' => '#FFFFFF',                  //Field Background Color.
            'font-color' => '#000000',                        //Field Font Color.
            'padding-x' => 3,                                 //Field Padding X.
            'padding-y'=> 3,                                  //Field Padding Y.
            'placeholder' => 'Enter image code here',                              //Field Place Holder.

            //Width Types. (Pixels or Percent).
            'width_type' => array(
              'pixels' => 1,                  //Field Pixel Type.
              'percent' => 0,                 //Field Percent Type.
              'width' => 300                  //Field Width Size.
            )
          ),

          //Validation Options for File Attachments Field.
          'validation' => array(
            'required' => 1,                                    //Field is Required. zero(0) is not required and one(1) is required.
            'message' => 'This field is required.',             //Validation message.
            'not_match_message' => 'Image code did not match.', //Captcha not match message.
            'font-color' => '#F60717'                           //Font color.
          )
        );
      break;

      //When Submit Button button clicked create session handler for Submit Button field.
      case 'submit':
      	$_SESSION['create_form'][]['submit'] = array(
          'name' => '',     //Name of Submit Button.
          'value' => '',     //Value of Submit Button.
          'toggle' => 1,

          //Styling Field.
          'styles' => array(
            'required' => 0,                  //Custom Style Selected.
            'border_color' => '#CCCCCC',      //Field Border Color.
            'border_size' => '1',             //Field Border Size.
            'background_color' => '#FFFFFF',  //Field Background Color.
            'font-color' => '#000000',        //Field Font Color.
            'padding-x' => 3,                 //Field Padding Size X Cooridate.
            'padding-y' => 3,                 //Field Padding Size Y Coordinate.
            'border_radius' => 5             //Field Border Radius.
          )
        );
      break;

      //Update Text Field Toggle.
      case 'update_text_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Text Field Name Session.
        $_SESSION['create_form'][$pos]['text_field']['toggle'] = $content;
      break;

      //Update Text Field Name keyup.
      case 'update_text_field_name':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Name keyup value.
        $data = esc_html( $_POST['data'] );

        //Update Text Field Name Session.
        $_SESSION['create_form'][$pos]['text_field']['name'] = $data;
      break;

      //Update Text Field Label keyup.
      case 'update_text_field_label':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Label keyup value.
        $data = esc_html( $_POST['data'] );

        //Update Text Field Label Session.
        $_SESSION['create_form'][$pos]['text_field']['label'] = $data;
      break;

      //Update Text Field Style Required.
      case 'update_text_field_style_required':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['required'] = $content;
      break;

      //Update Text Field Label Font Color.
      case 'update_text_field_label_font_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_color'] = $content;
      break;

      //Update Text Field Label Font Size Types.
      case 'update_text_field_label_font_size_type':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        //Label Font Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update Text Field Font Size.
      case 'update_text_field_label_font_width':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update Text Field Border Color.
      case 'update_text_field_border_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['border_color'] = $content;
      break;

      //Update Text Field Border Size.
      case 'update_text_field_border_size':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['border_size'] = $content;
      break;

      //Update Text Field Background Color.
      case 'update_text_field_background_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['background_color'] = $content;
      break;

        //Update Text Field Font Color.
        case 'update_text_field_font_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['font-color'] = $content;
      break;

      //Update Text Field Padding X.
      case 'update_text_field_padding_x':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['padding-x'] = $content;
      break;

      //Update Text Field Padding Y.
      case 'update_text_field_padding_y':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['padding-y'] = $content;
      break;

      //Update Text Field Border Radius.
      case 'update_text_field_border_radius':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['border_radius'] = $content;
      break;

      //Update Text Field Width.
      case 'update_text_field_width':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['width'] = $content;

        echo $content;
      break;

      //Update Text Field Width Type.
      case 'update_text_field_width_type':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['percent'] = 0;
          break;

          case 'percent':
          $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['pixels'] = 0;
          $_SESSION['create_form'][$pos]['text_field']['styles']['width_type']['percent'] = 1;
          break;
        }
      break;

      //Update Text Field Placeholder.
      case 'update_text_field_placeholder':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['text_field']['styles']['placeholder'] = $content;
      break;

      //Text Field Name validation.
      case 'update_text_field_validation_required':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Validation value of Name Field.
        $data = esc_html( $_POST['data'] );

        //Upate Text Field Validation Session.
        $_SESSION['create_form'][$pos]['text_field']['validation']['enabled'] = $data;
      break;

      //Update Text Field Validation Message.
      case 'update_text_field_validation_required_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Text Field Validation Font Color.
        $_SESSION['create_form'][$pos]['text_field']['validation']['required']['message'] = $content;
      break;

      //Update Text Field Validation Font Color.
      case 'update_text_field_validation_required_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Text Field Validation Font Color.
        $_SESSION['create_form'][$pos]['text_field']['validation']['required']['font-color'] = $content;
      break;

      //Update Text Field Minimum String Length.
      case 'update_text_field_min_len':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['text_field']['validation']['min_length']['length'] = $content;
      break;

        //Update Text Field Minimum String Length Validation Message.
      case 'update_text_field_min_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['text_field']['validation']['min_length']['message'] = $content;
      break;

      //Update Text Field Minimum Length Validation Message Font Color.
      case 'update_text_field_min_len_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['text_field']['validation']['min_length']['font-color'] = $content;
      break;

      //Update Text Field Maximum Length.
      case 'update_text_field_max_len':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['text_field']['validation']['max_length']['length'] = $content;
      break;

      //Update Text Field Maximum String Validation Message.
      case 'update_text_field_max_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['text_field']['validation']['max_length']['message'] = $content;
      break;

      //Update Text Field Maximum Length Validation Message Font Color.
      case 'update_text_field_max_len_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['text_field']['validation']['max_length']['font-color'] = $content;
      break;

      //Update Number Field Toggle.
      case 'update_number_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Number Field Name Session.
        $_SESSION['create_form'][$pos]['number_field']['toggle'] = $content;
      break;

      //Update Number Field Name keyup.
      case 'update_text_field_number':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Name keyup value.
        $data = esc_html( $_POST['data'] );

        //Update Text Field Name Session.
        $_SESSION['create_form'][$pos]['number_field']['name'] = $data;
      break;

      //Update Number Field Label keyup.
      case 'update_number_field_label':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Label keyup value.
        $data = esc_html( $_POST['data'] );

        //Update Text Field Label Session.
        $_SESSION['create_form'][$pos]['number_field']['label'] = $data;
      break;

      //Update Number Field Styles Required.
      case 'update_number_field_style_required':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['required'] = $content;
      break;

      //Update Number Field Label Font Color.
      case 'update_number_field_label_font_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_color'] = $content;
      break;

      //Update Number Field Label Font Size Types.
      case 'update_number_field_font_size_types':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        //Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update Number Field Label Font Size.
      case 'update_number_field_label_font_size':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update Number Field Border Color.
      case 'update_number_field_border_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['border_color'] = $content;
      break;

      //Update Number Field Border Size.
      case 'update_number_field_border_size':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['border_size'] = $content;
      break;

      //Update Number Field Background Color.
      case 'update_number_field_background_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['background_color'] = $content;
      break;

      //Update Number Field Font Color.
      case 'update_number_field_font_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['font-color'] = $content;
      break;

      //Update Number Field Padding X.
      case 'update_number_field_padding_x':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['padding-x'] = $content;
      break;

      //Update Number Field Padding Y.
      case 'update_number_field_padding_y':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['padding-y'] = $content;
      break;

      //Update Number Field Border Radius.
      case 'update_number_field_border_radius':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['border_radius'] = $content;
      break;

      //Update Number Field Width Type.
      case 'update_number_field_width_type':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        //Width Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['number_field']['styles']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['number_field']['styles']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['number_field']['styles']['width_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['number_field']['styles']['width_type']['percent'] = 1;
          break;
        }
      break;

      //Update Number Field Width.
      case 'update_number_field_width':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['width_type']['width'] = $content;
      break;

        //Update Number Field Placeholder.
        case 'update_number_field_placeholder':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Keyup value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['number_field']['styles']['placeholder'] = $content;
      break;

      //Number Field Validation.
      case 'update_number_field_validation':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Validation value of Name Field.
        $data = esc_html( $_POST['data'] );

        //Upate Text Field Validation Session.
        $_SESSION['create_form'][$pos]['number_field']['validation']['enabled'] = $data;
      break;

      //Update Number Field Validation Message.
      case 'update_number_field_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Text Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['required']['message'] = $content;
      break;

      //Update Number Field Validation Font Color.
      case 'update_number_field_validation_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['required']['font-color'] = $content;
      break;

      //Update Number Field Minimum String Length.
      case 'update_number_field_min_length':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['min_length']['length'] = $content;
      break;

      //Update Number Field Minimum String Length Validation Message.
      case 'update_number_field_min_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['min_length']['message'] = $content;
      break;

      //Update Number Field Minimum String Length Validation Message Font Color.
      case 'update_number_field_min_len_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['min_length']['font-color'] = $content;
      break;

      //Update Number Field Maximum String Length.
      case 'update_number_field_max_len':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['max_length']['length'] = $content;
      break;

      //Update Number Field Maximum String Length Validation Message.
      case 'update_number_field_max_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['max_length']['message'] = $content;
      break;

      //Update Number Field Maximum Length Validation Message Font Color.
      case 'update_number_field_max_len_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['number_field']['validation']['max_length']['font-color'] = $content;
      break;

      //Update Email Field Toggle.
      case 'update_email_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Email Field Name Session.
        $_SESSION['create_form'][$pos]['email_field']['toggle'] = $content;
      break;

      //Update Email Name Field keyup.
      case 'update_email_field_name':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Email Name Value.
        $data = esc_html( $_POST['data'] );

        //Update Email Field Name Session.
        $_SESSION['create_form'][$pos]['email_field']['name'] = $data;
      break;

      //Update Email Label keyup.
      case 'update_email_field_label':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Email Label Value.
        $data = esc_html( $_POST['data'] );

        //Update Email Field Label Session.
        $_SESSION['create_form'][$pos]['email_field']['label'] = $data;
      break;

      //Update Email Field Custom Style Required.
      case 'update_email_field_style_required':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['required'] = $content;
      break;

      //Update Email Field Label Font Color.
      case 'update_email_field_label_font_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_color'] = $content;
      break;

      //Update Email Label Font Size Types.
      case 'update_email_field_label_font_size_types':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        //Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update Email Field Label Font Size.
      case 'update_email_field_label_font_size':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update Email Field Border Color.
      case 'update_email_field_border_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['border_color'] = $content;
      break;

      //Update Email Field Border Size.
      case 'update_email_field_border_size':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['border_size'] = $content;
      break;

      //Update Email Field Background Color.
      case 'update_email_field_background_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['background_color'] = $content;
      break;

      //Update Email Field Font Color.
      case 'update_email_field_font_color':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['font-color'] = $content;
      break;

      //Update Email Field Padding X.
      case 'update_email_field_padding_x':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['padding-x'] = $content;
      break;

      //Update Email Field Width Types.
      case 'update_email_field_width_types':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        //Width Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['percent'] = 1;
          break;
        }
      break;

      //Update Email Field Width.
      case 'update_email_field_width':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['width_type']['width'] = $content;
      break;

      //Update Email Field Placehoder.
      case 'update_email_placeholder':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['placeholder'] = $content;
      break;

      //Update Email Field Padding Y.
      case 'update_email_field_padding_y':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['padding-y'] = $content;
      break;

      //Update Email Field Border Radius:
      case 'update_email_field_border_radius':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['email_field']['styles']['border_radius'] = $content;
      break;

      //Update Email validation.
      case 'update_email_field_validation':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Validation value of Email Field.
        $data = esc_html( $_POST['data'] );

        //Update Email Field Validation Session.
        $_SESSION['create_form'][$pos]['email_field']['validation']['enabled'] = $data;
      break;

      //Update Email Field Validation Message.
      case 'update_email_field_validation_required_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['required']['message'] = $content;
      break;

      //Update Email Field Validation Font Color.
      case 'update_email_field_validation_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['required']['font-color'] = $content;
      break;

      //Update Email Field Invalid Email Format.
      case 'update_email_field_validation_email_format_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['invalid_format']['message'] = $content;
      break;

      //Update Email Field Invalid Email Fornat Message Font Color.
      case 'update_email_field_invalid_email_format_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['invalid_format']['font-color'] = $content;
      break;

      //Update Email Field Minimum String Length.
      case 'update_email_field_min_len':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['min_length']['length'] = $content;
      break;

      //Update Email Field Minimum Length Validation Message.
      case 'update_email_field_min_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['min_length']['message'] = $content;
      break;

      //Update Email Field Minimum String Length Validation Font Color.
      case 'update_email_field_min_len_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['min_length']['font-color'] = $content;
      break;

      //Update Email Field Maximum String Length.
      case 'update_email_field_max_len':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['max_length']['length'] = $content;
      break;

      //Update Email Field Maximum Length Validation Message.
      case 'update_email_field_max_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['max_length']['message'] = $content;
      break;

      //Update Email Field Maximum String Length Validation Message Font Color.
      case 'update_email_field_max_len_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Email Field Validation Font Color.
        $_SESSION['create_form'][$pos]['email_field']['validation']['max_length']['font-color'] = $content;
      break;

      //Update Dropdown Field Toggle.
      case 'update_dropdown_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Dropdown Field Name Session.
        $_SESSION['create_form'][$pos]['dropdown_field']['toggle'] = $content;
      break;

      //Update Dropdown Name Field.
      case 'update_dropdown_field_name':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Dropdown Value of Email Field Name.
        $data = esc_html( $_POST['data'] );

        //Update Dropdown Field Name Session.
        $_SESSION['create_form'][$pos]['dropdown_field']['name'] = $data;
      break;

      //Update Dropdown Field Label.
      case 'update_dropdown_field_label':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Dropdown Value of Label Field.
        $data = esc_html( $_POST['data'] );

        //Update Dropdown Label Field Session.
        $_SESSION['create_form'][$pos]['dropdown_field']['label'] = $data;
      break;

      //Add Dropdown Option.
      case 'add_dropdown_option':

        //Current position of Main Dropdown Field.
        $pos = (int)( $_POST['pos'] );

        //Create Session for Dropdown Option.
        $_SESSION['create_form'][$pos]['dropdown_field']['options'][] = array(
          'value' => '',    //Value of Dropdown Option.
          'checked' => 0    //Selected Option.
        );
      break;

      //Update Option Values.
      case 'update_dropdown_option_value':

        //Current position of Main Dropdown Field.
        $pos = (int)$_POST['pos'];

        //Dropdown Option Position.
        $dropdown_pos = (int)$_POST['dropdown_pos'];

        //Value of Dropdown Option.
        $content = esc_html( $_POST['content'] );

        //Update Option Value Session.
        $_SESSION['create_form'][$pos]['dropdown_field']['options'][$dropdown_pos]['value'] = $content;
      break;

      //Update Dropdown Option Selected.
      case 'update_dropdown_option_selected':

      	//Current position of Main Dropdown Field.
        $pos = (int)$_POST['pos'];

        //Dropdown Option Position.
        $dropdown_pos = (int)$_POST['dropdown_pos'];

        //Value of Dropdown Selected.
        $content = esc_html( $_POST['content'] );

        //Count Dropdown Options.
        $c = count( $_SESSION['create_form'][$pos]['dropdown_field']['options'] );

        //Reset the value of checked to zero.
        for ( $i = 0; $i < $c; $i++ ) {
          $_SESSION['create_form'][$pos]['dropdown_field']['options'][$i]['checked'] = 0;
        }

        //Update Dropdown Option Selected.
        $_SESSION['create_form'][$pos]['dropdown_field']['options'][$dropdown_pos]['checked'] = $content;
      break;

      //Dropdown Field Remove Option.
      case 'update_dropdown_remove_option':

        //Current position of Main Dropdown Field.
        $pos = (int)$_POST['pos'];

        //Dropdown Option Position.
        $dropdown_pos = (int)$_POST['dropdown_pos'];

        //Count Options.
        $c = count( $_SESSION['create_form'][$pos]['dropdown_field']['options'] );

        //If the number of option is greater than 1.
        if ( $c > 1 ) {

          //Unset Specific Option.
          unset( $_SESSION['create_form'][$pos]['dropdown_field']['options'][$dropdown_pos] );

          //Reorder array count.
          self::option_reorder( $pos );
        } else {

          //Remove all Options.
          $_SESSION['create_form'][$pos]['dropdown_field']['options'] = '';
        }

        print_r($_POST);
      break;

      //Update Dropdown Field Style Required.
      case 'update_dropdown_field_style_required':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['required'] = $content;
      break;

      //Update Dropdown Field Label Font Color.
      case 'update_dropdown_field_label_font_color':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_color'] = $content;
      break;

      //Update Dropdown Field Label Size Types.
      case 'update_dropdown_field_label_size_types':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        //Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update Dropdown Field Label Size.
      case 'update_dropdown_field_label_size':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update Dropdown Field Border Color.
      case 'update_dropdown_field_border_color':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['border_color'] = $content;
      break;

        //Update Dropdown Field Border Size.
        case 'update_dropdown_field_border_size':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['border_size'] = $content;
      break;

        //Update Dropdown Field Background Color.
        case 'update_dropdown_field_background_color':

      //Update Dropdown Field Border Size.
      case 'update_dropdown_field_border_size':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['background_color'] = $content;
      break;

      //Update Dropdown Field Font Color.
      case 'update_dropdown_field_font_color':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['font-color'] = $content;
      break;

      //Update Dropdown Field Padding X.
      case 'update_dropdown_field_padding_x':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['padding-x'] = $content;
      break;

      //Update Dropdown Field Padding Y.
      case 'update_dropdown_field_padding_y':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['padding-y'] = $content;
      break;

      //Update Dropdown Field Border Radius.
      case 'update_dropdown_field_border_radius':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['border_radius'] = $content;
      break;

      //Update Dropdown Field Width Types on Change Event.
      case 'update_dropdown_field_width_types':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        //Width Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['percent'] = 1;
          break;
        }
      break;

      //Update Dropdown Field Width.
      case 'update_dropdown_field_width':

        //Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['dropdown_field']['styles']['width_type']['width'] = $content;
      break;

      //Update Option Required.
      case 'update_dropdown_required':

      	//Current position of Main Dropdown Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Dropdown Option Required.
        $data = esc_html( $_POST['data'] );

        //Update Option Required.
        $_SESSION['create_form'][$pos]['dropdown_field']['validation']['required'] = $data;
      break;

      //Update Dropdown Field Validation Message.
      case 'update_dropdown_field_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Text Field Validation Font Color.
        $_SESSION['create_form'][$pos]['dropdown_field']['validation']['message'] = $content;
      break;

      //Update Dropdown Field Validation Font Color.
      case 'update_dropdown_field_validation_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Number Field Validation Font Color.
        $_SESSION['create_form'][$pos]['dropdown_field']['validation']['font-color'] = $content;
      break;

      //Update Radio Field Toggle.
      case 'update_radio_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Radio Field Name Session.
        $_SESSION['create_form'][$pos]['radio_button']['toggle'] = $content;
      break;

      //Update Radio Field Name.
      case 'update_radio_field_name':

      	//Current position of Radio Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Radio Field Name.
        $data = esc_html( $_POST['data'] );

        //Update Radio Field Name.
        $_SESSION['create_form'][$pos]['radio_button']['name'] = $data;
      break;

      //Update Radio Field Label
      case 'update_radio_main_label':

      	//Current position of Radio Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Radio Field Label.
        $data = esc_html( $_POST['data'] );

        //Update Radio Field Label
        $_SESSION['create_form'][$pos]['radio_button']['label'] = $data;
      break;

      //Add Radio Buttun or Bullet.
      case 'add_radio_button':

      	//Current position of Radio Field.
        $pos = (int)( $_POST['pos'] );

        //Count Radio Bullets.
        $count = $_SESSION['create_form'][$pos]['radio_button']['bullets'];

        //Making a Default Selected Bullet. if there is no bullet added, the first bullet added will be the default selected.
        if ( $count == 0 ) {
          $check = 1;
        } else {
          $check = 0;
        }

        //Create Radio Button or Bullet Session.
        $_SESSION['create_form'][$pos]['radio_button']['bullets'][] = array(
          'bullet_label' => '',		//Bullet Label.
          'checked' => $check			//Bullet Selected.
        );
      break;

      //Update Radio Bullet Label.
      case 'update_radio_bullet_label':

      	//Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Bullet Position.
        $bullet_pos = (int)$_POST['bullet_pos'];

        //Bullet Label Value.
        $content = esc_html( $_POST['content'] );

        //Update Radio Bullet Label.
        $_SESSION['create_form'][$pos]['radio_button']['bullets'][$bullet_pos]['bullet_label'] = $content;
      break;

      //Update Radio Select.
      case 'radio_select':

      	//Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Bullet Position.
        $bullet_pos = (int)$_POST['bullet_pos'];

        //Bullet Checked Value.
        $checked = (int)$_POST['checked'];

        //Bullet Count.
        $c = count( $_SESSION['create_form'][$pos]['radio_button']['bullets'] );

        //Reset checked value to zero.
        for ( $i = 0; $i < $c; $i++ ) {
          $_SESSION['create_form'][$pos]['radio_button']['bullets'][$i]['checked'] = 0;
        }

        //Update Radio Select.
        $_SESSION['create_form'][$pos]['radio_button']['bullets'][$bullet_pos]['checked'] = $checked;
      break;

      //Radio Field Remove Bullet.
      case 'remove_radio_bullet':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Bullet Position.
        $bullet_pos = (int)$_POST['bullet_pos'];

        //Count Bullet.
        $c = count( $_SESSION['create_form'][$pos]['radio_button']['bullets'] );

        if ( $c > 1 ) {

          //Unset Specific Bullet.
          unset( $_SESSION['create_form'][$pos]['radio_button']['bullets'][$bullet_pos] );

          //Reorder Bullet List.
          self::bullet_reorder( $pos );

          //Count checked bullets.
          $c1 = 0;

          foreach ( $_SESSION['create_form'][$pos]['radio_button']['bullets'] as $bullet ) {
            if ( $bullet['checked'] == 1 ) {
              $c1++;
            }
          }

          //If no checked bullet make the first 1 as default checked.
          if ( $c1 == 0 ) {
            $_SESSION['create_form'][$pos]['radio_button']['bullets'][0]['checked'] = 1;
          }
        } else {

          //Unset Bullets.
          $_SESSION['create_form'][$pos]['radio_button']['bullets'] = '';
        }
      break;

      //Update Radio Bullet Display.
      case 'radio_display':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $value = esc_html( $_POST['value'] );

        //Update Radio Bullet Display.
        $_SESSION['create_form'][$pos]['radio_button']['display'] = $value;
      break;

      //Update Radio Field Style Required.
      case 'update_radio_field_style_required':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['radio_button']['styles']['required'] = $content;
      break;

      //Update Radio Field Label Font Color.
      case 'update_radio_field_label_font_color':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_color'] = $content;
      break;

      //Update Radio Field Label Font Size Types.
      case 'update_radio_field_label_font_size_types':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        //Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update Radio Field Label Font Size.
      case 'update_radio_field_label_font_size':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['radio_button']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update Radio Field Border Color.
      case 'update_radio_field_border_color':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['radio_button']['styles']['border_color'] = $content;
      break;

      //Update Radio Field Bullet Color.
      case 'update_radio_field_bullet_color':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['radio_button']['styles']['bullet_color'] = $content;
      break;

      //Update Radio Field Background Color.
      case 'update_radio_field_background_color':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['radio_button']['styles']['background_color'] = $content;
      break;

      //Update Radio Field Font Color.
      case 'update_radio_field_font_color':

        //Current position of Main Radio Field.
        $pos = (int)$_POST['pos'];

        //Value of Bullet Display.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['radio_button']['styles']['font-color'] = $content;
      break;

      //Update Checkbox Field Toggle.
      case 'update_checkbox_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Checkbox Field Name Session.
        $_SESSION['create_form'][$pos]['checkbox']['toggle'] = $content;
      break;

      //Update Checkbox Field Name.
      case 'update_checkbox_name':

      	//Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Position of Checkbox Field.
        $data = esc_html( $_POST['data'] );

        //Update Checkbox Field Name.
        $_SESSION['create_form'][$pos]['checkbox']['name'] = $data;
      break;

      //Update Checkbox Field Label.
      case 'update_checkbox_label':

      	//Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checkbox Field Label.
        $data = esc_html( $_POST['data'] );

        //Update Checkbox Field Label.
        $_SESSION['create_form'][$pos]['checkbox']['label'] = $data;
      break;

      //Add Checkbox.
      case 'checkbox_add':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );


        //Update Added Checkbox.
        $_SESSION['create_form'][$pos]['checkbox']['checkboxes'][] = array(
          'checkbox_label' => '',
          'checked' => 0
        );
      break;

      //Update Checkbox ch Label
      case 'update_checkbox_ch_label':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Checkbox ch Position
        $ch_pos = (int)$_POST['ch_pos'];

        //Checkbox ch Label Value.
        $content = $_POST['content'];

        //Update Checkbox ch Label.
        $_SESSION['create_form'][$pos]['checkbox']['checkboxes'][$ch_pos]['checkbox_label'] = $content;
      break;

      //Update Checkbox Checked.
      case 'checkbox_checked':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Checkbox ch Position
        $ch_pos = (int)$_POST['ch_pos'];

        //Checkbox ch Label Value.
        $checked = $_POST['checked'];

        //Update Checkbox ch Label.
        $_SESSION['create_form'][$pos]['checkbox']['checkboxes'][$ch_pos]['checked'] = $checked;
      break;

      //Checkbox Remove ch.
      case 'remove_checkbox_ch':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Checkbox ch Position
        $ch_pos = (int)$_POST['ch_pos'];

        //Count Checbox ch.
        $c = count( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] );

        //If $c is greaterthan 1 unset Specific ch. Otherwise unset bullets to null.
        if ( $c > 0 ) {

          //Unset Specific ch.
          unset( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'][$ch_pos] );

          //Reorder List.
          self::ch_reordering( $pos );
        } else {
          //Unset ch.
          $_SESSION['create_form'][$pos]['checkbox']['checkboxes'][$ch_pos] = '';
        }
      break;

      //Checkbox Header or Label Display.
      case 'checkbox_header':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Checkbox Display Value.
        $content = $_POST['content'];

        //Update Checkbox Display.
        $_SESSION['create_form'][$pos]['checkbox']['hide_header'] = $content;
      break;

      //Update Checkbox Display.
      case 'checkbox_display':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Checkbox Display Value.
        $content = $_POST['content'];

        //Update Checkbox Display.
        $_SESSION['create_form'][$pos]['checkbox']['display'] = $content;
      break;

      //Update Checkbox Field Style Required.
      case 'update_checkbox_field_style_required':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['checkbox']['styles']['required'] = $content;
      break;

      //Update Checkbox Field Label Font Color.
      case 'update_checkbox_field_label_font_color':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_color'] = $content;
      break;

      //Update Checkbox Field Label Font Size Types.
      case 'update_checkbox_field_label_size_types':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['pixels'] = 1;
        $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['percent'] = 0;

        //Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update Checkbox Field Label Font Size.
      case 'update_checkbox_field_label_font_size':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['checkbox']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update Checkbox Field Boder Color.
      case 'update_checkbox_field_border_color':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['checkbox']['styles']['border_color'] = $content;
      break;

      //Update Checkbox Field Background Color.
      case 'update_checkbox_field_background_color':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['checkbox']['styles']['background_color'] = $content;
      break;

      //Update Checkbox Field Check Sign Color.
      case 'update_checkbox_check_color':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['checkbox']['styles']['check_color'] = $content;
      break;

      //Update Checkbox Fields Font Color.
      case 'update_checkbox_field_font_color':

        //Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['checkbox']['styles']['font-color'] = $content;
      break;

      //Update Checkbox Field Validation.
      case 'update_checkbox_required':

      	//Checkbox Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Checbox Field Validation.
        $data = esc_html( $_POST['data'] );

        //Update Checkbox Field Validation.
        $_SESSION['create_form'][$pos]['checkbox']['validation']['required'] = $data;

        print_r($_POST);
      break;

      //Update Checkbox Field Validation Message.
      case 'update_checkbox_field_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Checkbox Field Validation Message.
        $_SESSION['create_form'][$pos]['checkbox']['validation']['message'] = $content;
      break;

      //Update Checkbox Field Validation Font Color.
      case 'update_checkbox_field_validation_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Checkbox Field Validation Font Color.
        $_SESSION['create_form'][$pos]['checkbox']['validation']['font-color'] = $content;
      break;

      //Update Textarea Field Toggle.
      case 'update_textarea_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Textarea Field Name Session.
        $_SESSION['create_form'][$pos]['textarea']['toggle'] = $content;
      break;

      //Update Textarea Field Name.
      case 'update_textarea_name':

      	//Textarea Field Position.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Name.
        $data = esc_html( $_POST['data'] );

        //Update Textarea Field Name.
        $_SESSION['create_form'][$pos]['textarea']['name'] = $data;
      break;

      //Update Textarea Field Label.
      case 'update_textarea_label':

      	//Position of Textarea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Label.
        $data = esc_html( $_POST['data'] );

        //Update Textarea Field Label.
        $_SESSION['create_form'][$pos]['textarea']['label'] = $data;
      break;

      //Update Textrea Cols.
      case 'update_textarea_cols':

      	//Position of Textarea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Label.
        $data = esc_html( $_POST['data'] );

        //Update Textrea Cols.
        $_SESSION['create_form'][$pos]['textarea']['cols'] = $data;
      break;

      //Update Textarea Field Rows.
      case 'update_textarea_rows':

      	//Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $data = esc_html( $_POST['data'] );

        //Update Textarea Field Rows.
        $_SESSION['create_form'][$pos]['textarea']['rows'] = $data;
      break;

      //Update Textarea Style Required.
      case 'update_textarea_style_required':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['required'] = $content;
      break;

      //Update Textarea Field Label Font Color.
      case 'update_textarea_field_label_font_color':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_color'] = $content;
      break;

      //Update Textarea Field Label Font Size Types.
      case 'update_textarea_field_label_font_size_types':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        //Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update Textarea Label Font Size.
      case 'update_textarea_field_label_font_size':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update Textarea Field Border Color.
      case 'update_textarea_field_border_color':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['border_color'] = $content;
      break;

      //Update Textarea Field Border Size.
      case 'update_textarea_field_border_size':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['border_size'] = $content;
      break;

      //Update Textarea Field Background Color.
      case 'update_textarea_field_background_color':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['background_color'] = $content;
      break;

      //Update Textarea Field Font Color.
      case 'update_textarea_field_font_color':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['font-color'] = $content;
      break;

      //Update Textarea Field Padding X.
      case 'update_textarea_field_padding_x':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['padding-x'] = $content;
      break;

      //Update Textarea Field Padding Y.
      case 'update_textarea_field_padding_y':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['padding-y'] = $content;
      break;

      //Update Textarea Field Border Radius.
      case 'update_textarea_field_border_radius':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['border_radius'] = $content;
      break;

      //Update Textarea Field Width Types.
      case 'update_textarea_field_width_types':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        //Width Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['percent'] = 1;
          break;
        }
      break;

      //Update Textarea Field Width.
      case 'update_textarea_field_width':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['width_type']['width'] = $content;
      break;

      //Update Textarea Field Height Types.
      case 'update_textarea_field_height_types':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        //Width Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['percent'] = 1;
          break;
        }
      break;

      //Update Text Field Height.
      case 'update_textarea_field_height':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['height_type']['height'] = $content;
      break;

      //Update Textarea Field Placeholder.
      case 'update_textarea_placehoder':

        //Position of Textrea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Rows.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['textarea']['styles']['placeholder'] = $content;
      break;

      //Update Textarea Validation.
      case 'update_textarea_validation':

      	//Position of Textarea Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Textarea Field Validation.
        $data = esc_html( $_POST['data'] );

        //Update Textarea Validation.
        $_SESSION['create_form'][$pos]['textarea']['validation']['enabled'] = $data;
      break;

      //Update Textarea Field Validation Message.
      case 'update_textarea_field_required_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Checkbox Field Validation Message.
        $_SESSION['create_form'][$pos]['textarea']['validation']['required']['message'] = $content;
      break;

      //Update Textarea Field Validation Font Color.
      case 'update_textarea_field_required_validation_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Checkbox Field Validation Font Color.
        $_SESSION['create_form'][$pos]['textarea']['validation']['required']['font-color'] = $content;
      break;

      //Update Textarea Field Minimum String Length.
      case 'update_textarea_field_min_len':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Checkbox Field Validation Font Color.
        $_SESSION['create_form'][$pos]['textarea']['validation']['min_length']['length'] = $content;
      break;

      //Update Textarea Field Minimum String Length Validation Message.
      case 'update_textarea_field_min_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Checkbox Field Validation Font Color.
        $_SESSION['create_form'][$pos]['textarea']['validation']['min_length']['message'] = $content;
      break;

      //Update Textarea Field Minimum String Length Validation Message Font Color.
      case 'update_textarea_field_min_length_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Checkbox Field Validation Font Color.
        $_SESSION['create_form'][$pos]['textarea']['validation']['min_length']['font-color'] = $content;
      break;

      //Update Textarea Field Maximum String Length.
      case 'update_textarea_field_max_len':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['textarea']['validation']['max_length']['length'] = $content;
      break;

      //Update Textarea Field Maximum String Length Validation Message.
      case 'update_textarea_field_max_len_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['textarea']['validation']['max_length']['message'] = $content;
      break;

      //Update Textarea Field Maximum String Length Validation Message Font Color.
      case 'update_textarea_field_max_len_validation_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['textarea']['validation']['max_length']['font-color'] = $content;
      break;

      //Update File Attachments Field Toggle.
      case 'update_fa_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update File Attachments Field Name Session.
        $_SESSION['create_form'][$pos]['file_attachments']['toggle'] = $content;
      break;

      //Update File Attachments Name.
      case 'update_file_att_name':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of File Attachments Name.
        $data = esc_html( $_POST['data'] );

        //Update File Attachments Name.
        $_SESSION['create_form'][$pos]['file_attachments']['name'] = $data;
      break;

      //Update File Attachments Label.
      case 'update_file_att_label':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of File Attachments Label.
        $data = esc_html( $_POST['data'] );

        //Update File Attachments Label.
        $_SESSION['create_form'][$pos]['file_attachments']['label'] = $data;
      break;

      //Update File Attachments Max File Size.
      case 'update_file_att_max_size':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of File Attachments Max File Size.
        $data = esc_html( $_POST['data'] );

        //Update File Attachments Max File Size.
        $_SESSION['create_form'][$pos]['file_attachments']['max_size'] = $data;
      break;

      //Update File Attachments File Types.
      case 'update_file_att_file_types':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of File Attachments File Types.
        $data = esc_html( $_POST['data'] );

        //Update File Attachments File Types.
        $_SESSION['create_form'][$pos]['file_attachments']['file_types'] = $data;
      break;

      //Update Progress Border Color.
      case 'update_progress_border_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        //Update Progress Bar Value.
        $_SESSION['create_form'][$pos]['file_attachments']['progress_bar_layout']['border_color'] = $content;
      break;

      //Update Progress Backgroud Color.
      case 'update_progress_background_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        //Update Progress Bar Value.
        $_SESSION['create_form'][$pos]['file_attachments']['progress_bar_layout']['background_color'] = $content;
      break;

      //Update Progress Font Color.
      case 'update_progress_font_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        //Update Progress Bar Value.
        $_SESSION['create_form'][$pos]['file_attachments']['progress_bar_layout']['font-color'] = $content;
      break;

      //Update Progress progress Font Color.
      case 'update_progress_progress_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        //Update Progress Bar Value.
        $_SESSION['create_form'][$pos]['file_attachments']['progress_bar_layout']['progress_color'] = $content;
      break;

      //Update Upload Filename Font Color.
      case 'update_upload_filename_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        //Update Upload Filename Font Color.
        $_SESSION['create_form'][$pos]['file_attachments']['progress_bar_layout']['filename_color'] = $content;
      break;

      //Update File Attachments Error Message File Size.
      case 'update_fa_error_message_file_size':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['error_message']['file_size'] = $content;
      break;

      //Update File Attachments Error Message File Type.
      case 'update_fa_error_message_file_type':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['error_message']['file_type'] = $content;
      break;

      //Update File Attachments Error Message Font Color.
      case 'update_fa_error_message_font_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['error_message']['font-color'] = $content;
      break;

      //Update Upload Success Message.
      case 'update_upload_success_message':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        //Update Progress Bar Value.
        $_SESSION['create_form'][$pos]['file_attachments']['success_message_settings']['message'] = $content;
      break;

      //Update Upload Success Font Color.
      case 'update_upload_success_font_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Progress data.
        $content = esc_html( $_POST['content'] );

        //Update Progress Bar Value.
        $_SESSION['create_form'][$pos]['file_attachments']['success_message_settings']['font-color'] = $content;
      break;

      //Update File Attachments Style Require.
      case 'update_fa_style_required':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['required'] = $content;
      break;

      //Update File Attachments Label Font Color.
      case 'update_fa_label_font_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_color'] = $content;
      break;

      //Update File Attachments Label Font Size Types.
      case 'update_fa_label_fonr_size_types':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        //Size Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['percent'] = 1;
          break;
        }
      break;

      //Update File Attachments Label Font Size.
      case 'update_fa_label_font_size':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['label_font_size_type']['size'] = $content;
      break;

      //Update File Attachments Border Color.
      case 'update_fa_border_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['border_color'] = $content;
      break;

      //Update File Attachments Border Size.
      case 'update_fa_border_size':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['border_size'] = $content;
      break;

      //Update File Attachments Background Color.
      case 'update_fa_background_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['background_color'] = $content;
      break;

      //Update File Attachments Font Color.
      case 'update_fa_font_color':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['font-color'] = $content;
      break;

      //Update File Attachments Padding X.
      case 'update_fa_padding_x':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['padding-x'] = $content;
      break;

      //Update File Attachments Padding Y.
      case 'update_fa_padding_y':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['padding-y'] = $content;
      break;

      //Update File Attachments Width Types.
      case 'update_fa_width_types':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        //Width Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['percent'] = 1;
          break;
        }
      break;

      //Update File Attachments Width.
      case 'update_fa_width':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['file_attachments']['styles']['width_type']['width'] = $content;
      break;

      //Update File Attachments Validation.
      case 'update_file_att_required':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of File Attachments Validation.
        $data = esc_html( $_POST['data'] );

        //Update File Attachments Validation.
        $_SESSION['create_form'][$pos]['file_attachments']['validation']['required'] = $data;
      break;

      //Update File Attachments Field Validation Message.
      case 'update_fa_field_validation_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update File Attachments Field Validation Message.
        $_SESSION['create_form'][$pos]['file_attachments']['validation']['message'] = $content;
      break;

      //Update File Attachments Field Validation Font Color.
      case 'update_fa_field_validation_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update File Attachments Field Validation Font Color.
        $_SESSION['create_form'][$pos]['file_attachments']['validation']['font-color'] = $content;
      break;

      //Update Captcha Style Required.
      case 'update_captcha_style_required':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['required'] = $content;


        //Unset Captcha Session.
        if ( $content == 0 ) {
          unset( $_SESSION['captcha'] );

          $_SESSION['create_form'][$pos]['captcha']['styles']['captcha_background_color'] = 'rgb(255, 0, 1)';
          $_SESSION['create_form'][$pos]['captcha']['styles']['captcha_font-color'] = 'rgb(255, 255, 255)';
          $_SESSION['create_form'][$pos]['captcha']['styles']['captcha_line_color'] = 'rgb(150, 150, 150)';
        }
      break;

      //Update Captcha Image Background Color.
      case 'update_captcha_image_background_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['captcha_background_color'] = $content;

        //Set Value to captcha session.
        $_SESSION['captcha']['dev']['background_color'] = $content;
      break;

      //Update Captcha Image Font Color.
      case 'update_captcha_image_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['captcha_font-color'] = $content;

        //Set Value to captcha session.
        $_SESSION['captcha']['dev']['font-color'] = $content;
      break;

      //Update Captcha Image Line Color.
      case 'update_captcha_image_line_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['captcha_line_color'] = $content;

        //Set Value to captcha session.
        $_SESSION['captcha']['dev']['line_color'] = $content;
      break;

      //Update Captcha Field Font Color.
      case 'update_captcha_field_border_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['border_color'] = $content;
      break;

      //Update Captcha Field Border Size.
      case 'update_captcha_field_border_size':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['border_size'] = $content;
      break;

      //Update Captcha Field Background Color.
      case 'update_captcha_field_background_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['background_color'] = $content;
      break;

      //Update Captcha Field Font Color.
      case 'update_capcha_field_font_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['font-color'] = $content;
      break;

      //Update Captcha Field Padding X.
      case 'update_captcha_field_padding_x':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['padding-x'] = $content;
      break;

      //Update Captcha Field Padding Y.
      case 'update_captcha_field_padding_y':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['padding-y'] = $content;
      break;

      //Update Captcha Field Width Types.
      case 'update_captcha_field_width_types':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        //Width Types.
        switch ( $content ) {
          case 'pixels':
            $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['pixels'] = 1;
            $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['percent'] = 0;
          break;

          case 'percent':
            $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['pixels'] = 0;
            $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['percent'] = 1;
          break;
        }
      break;

      //Update Captcha Field Width.
      case 'update_captcha_field_width':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['width_type']['width'] = $content;
      break;

      //Update Captcha Field Placeholder.
      case 'update_captcha_field_placeholder':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = $_POST['content'];

        $_SESSION['create_form'][$pos]['captcha']['styles']['placeholder'] = $content;
      break;

      //Update Captcha Field Validation Required Message.
      case 'update_captcha_required_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Captcha Field Validation Required Message.
        $_SESSION['create_form'][$pos]['captcha']['validation']['message'] = $content;
      break;

      //Update Captcha Field Validation Not Match Message.
      case 'update_captcha_not_match_message':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update Captcha Field Validation Required Message.
        $_SESSION['create_form'][$pos]['captcha']['validation']['not_match_message'] = $content;
      break;

      //Update Captcha Field Validation Font Color.
      case 'update_captcha_field_validation_color':

        //Position number of the session array.
        $pos = (int)esc_html( $_POST['pos'] );

        //Font color Value.
        $content = $_POST['content'];

        //Update File Attachments Field Validation Font Color.
        $_SESSION['create_form'][$pos]['captcha']['validation']['font-color'] = $content;
      break;

      //Update Captcha Field Toggle.
      case 'update_captcha_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Captcha Field Name Session.
        $_SESSION['create_form'][$pos]['captcha']['toggle'] = $content;
      break;

      //Update Captcha String Length.
      case 'update_captcha_length':

        //Position of File Attachments Field.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of File Attachments Validation.
        $data = esc_html( $_POST['data'] );

        //Update File Attachments Validation.
        $_SESSION['create_form'][$pos]['captcha']['length'] = $data;
      break;

      //Update Submit Field Toggle.
      case 'update_submit_field_toggle':

        //Position number of the session array.
        $pos = (int)( $_POST['pos'] );

        //Value of Toggle.
        $content = esc_html( $_POST['content'] );

        //Update Submit Field Name Session.
        $_SESSION['create_form'][$pos]['submit']['toggle'] = $content;
      break;

      //Update Submit Button Name.
      case 'update_submit_name':

      	//Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Submit Button Name.
        $data = esc_html( $_POST['data'] );

        //Update Submit Button Name.
        $_SESSION['create_form'][$pos]['submit']['name'] = $data;
      break;

      //Update Submit Button Value.
      case 'update_submit_value':

      	//Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //Value of Submit Button Value.
        $data = esc_html( $_POST['data'] );

        //Update Submit Button Value.
        $_SESSION['create_form'][$pos]['submit']['value'] = $data;
      break;

      //Update Submit Field Style Required.
      case 'update_submit_style_required':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['required'] = $content;
      break;

      //Update Submit Button Border Color.
      case 'update_submit_boder_color':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['border_color'] = $content;
      break;

      //Update Submit Button Border Size.
      case 'update_submit_border_size':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['border_size'] = $content;
      break;

      //Update Submit Button Background Color.
      case 'update_submit_background_color':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['background_color'] = $content;
      break;

      //Update Submit Font Color.
      case 'update_submit_font_color':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['font-color'] = $content;
      break;

      //Update SUbmit Button Padding X.
      case 'update_submit_padding_x':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['padding-x'] = $content;
      break;

      //Update Submit Button Padding X.
      case 'update_submit_padding_y':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['padding-y'] = $content;
      break;

      //Update Submit Button Border Radius on Change or Keyup Event.
      case 'update_submit_button_border_radius':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //The Value.
        $content = esc_html( $_POST['content'] );

        $_SESSION['create_form'][$pos]['submit']['styles']['border_radius'] = $content;
      break;

      //Remove Field.
      case 'remove_field':

        //Position of Submit Button.
        $pos = (int)esc_html( $_POST['pos'] );

        //Count Fields.
        $c = count( $_SESSION['create_form'] );

        //If the number of fields is greater than 1.
        if ( $c > 1 ) {

          //Unset Specific Position Session Array.
          unset( $_SESSION['create_form'][$pos] );

          //Reordering Field. Positions.
          self::reorder();
        } else {

          //Clear Session Create Form.
        	unset( $_SESSION['create_form'] );
        }
      break;

      //Update Fields Position.
      case 'field_sortable':

        //Field Sortable Positions.
        $pos = $_POST['pos'];

        //Update Field Positions.
        self::sort( $pos );
      break;

      case 'clear_form':

      	//Clear Session Create Form.
      	unset( $_SESSION['create_form'] );
      break;

      //Update Main Success Message.
      case 'update_main_success_message':

        //Message.
        $data = $_POST['data'];

        //Update Main Success Massage.
        $_SESSION['success_settings']['message'] = $data;
      break;

      //Update Main Success Massage Font Color.
      case 'update_main_success_message_font_color':

        //Font Color.
        $data = $_POST['data'];

        //Update Main Success Massage Font Color.
        $_SESSION['success_settings']['font-color'] = $data;
      break;

      //Update Ajax Loader.
      case 'update_ajax_loader':

        $content = esc_html( $_POST['content'] );

        $_SESSION['success_settings']['ajax_loader'] = $content;
      break;

      //Update Page Redirect.
      case 'update_ajax_page_redirect':

        $content = esc_html( $_POST['content'] );

        //If $content is blank.
        if ( $content == '' ) {

          //Redirect to home page
          $_SESSION['success_settings']['page_redirect'] = get_home_url();
        } else {

          //If no http or https provided.
          if ( substr( $content, 0, 7 ) !== 'http://' && substr( $content, 0, 8 ) !== 'https://' ) {

            //Redirect to page.
            $_SESSION['success_settings']['page_redirect'] = 'http://' . $content;
          } else {

            //Redirect to page.
            $_SESSION['success_settings']['page_redirect'] = $content;
          }
        }
      break;

      //Form Field Validation.
      case 'form_validation':

        $captcha_count = 0;

        $submit_count = 0;

        //If There is a Form Field.
        if ( empty( $_SESSION['create_form'] ) ) {

          //Validation Error Message.
          echo '<div>Please Select a Form Field.</div>';
        } else {

          //Has Error. I there is a validation error boolean set to true.
          $has_error = false;

          //Array Count.
          $c = 1;

          //Loop Form Fields.
          foreach ( $_SESSION['create_form'] as $form ) {

            //If Text Fields are present.
            if ( ! empty( $form['text_field'] ) ) {

              //If Text Field Name is filled up.
              if ( empty( $form['text_field']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Name is required on Name Field at #' . $c . '.</div>';
              } else if ( $form['text_field']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>You cannot use "status" as name at field #' . $c . '.</div>';
              }

              //If Text FIeld Label is filled up.
              if ( empty( $form['text_field']['label'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If Text Field Validation is required.
              if ( $form['text_field']['validation']['required'] == 1 ) {

                //If Text Field Validation is empty.
                if ( empty( $form['text_field']['validation']['message'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message at #' . $c . '.</div>';

                //If Text Field Validation font-color is empty.
                } else if ( empty( $form['text_field']['validation']['font-color'] ) ) {
                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message font color at #' . $c . '.</div>';
                }
              }
            }

            //If Number Fields are present.
            if ( ! empty( $form['number_field'] ) ) {

              //If Number Field Name is filled up.
              if ( empty( $form['number_field']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Name is required on Name Field at #' . $c . '.</div>';
              } else if ( $form['number_field']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>You cannot use "status" as name at field #' . $c . '.</div>';
              }

              //If Number Field Label is filled up.
              if ( empty( $form['number_field']['label'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If Number Field Validation is required.
              if ( $form['number_field']['validation']['required'] == 1 ) {

                //If Number Field Validation is empty.
                if ( empty( $form['number_field']['validation']['message'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message at #' . $c . '.</div>';

                //If Email Field Validation font-color is empty.
              } else if ( empty( $form['number_field']['validation']['font-color'] ) ) {
                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message font color at #' . $c . '.</div>';
                }
              }
            }

            //If Email Fields are present.
            if ( ! empty( $form['email_field'] ) ) {

              //If Email Field Name is filled up.
              if ( empty( $form['email_field']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Name is required on Email Field at #' . $c . '.</div>';
              } else if ( $form['email_field']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If Email Field Label is filled up.
              if ( empty( $form['email_field']['label'] ) ) {
                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Email Field at #' . $c . '.</div>';
              }

              //If Email Field Validation is required.
              if ( $form['email_field']['validation']['required'] == 1 ) {

                //If Email Field Validation is empty.
                if ( empty( $form['email_field']['validation']['message'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message at #' . $c . '.</div>';

                //If Email Field Validation font-color is empty.
              } else if ( empty( $form['email_field']['validation']['font-color'] ) ) {
                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message font color at #' . $c . '.</div>';
                }
              }
            }

            //If Dropdown Fields are present.
            if ( ! empty( $form['dropdown_field'] ) ) {

              //If Dropdown Field Name is filled up.
              if ( empty( $form['dropdown_field']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Name is required on Dropdown Field at #' . $c . '.</div>';
              } else if ( $form['dropdown_field']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If Dropdown Field Label is filled up.
              if ( empty( $form['dropdown_field']['label'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Dropdown Field at #' . $c . '.</div>';
              }

              //If Dropdown Field has Options.
              if ( empty( $form['dropdown_field']['options'] ) ) {
                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Options are required on Dropdown Field at #' . $c . '.</div>';
              } else {

                //Loop Dropdown Options.
                foreach ( $form['dropdown_field']['options'] as $option ) {

                  //If Dropdown Options Field Value is filled up.
                  if ( empty( $option['value'] ) ) {

                    //Set $has_error to true.
                    $has_error = true;

                    //Validation Error Message.
                    echo '<div>Dropdown Option Value is required at #' . $c . '.</div>';
                  }
                }
              }

              //If Dropdown Field Validation is required.
              if ( $form['dropdown_field']['validation']['required'] == 1 ) {

                //If Email Field Validation is empty.
                if ( empty( $form['dropdown_field']['validation']['message'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message at #' . $c . '.</div>';

                //If Email Field Validation font-color is empty.
              } else if ( empty( $form['dropdown_field']['validation']['font-color'] ) ) {
                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message font color at #' . $c . '.</div>';
                }
              }
            }

            //If Radio Fields are present.
            if ( ! empty( $form['radio_button'] ) ) {

              //If Radio Field Name is filled up.
              if ( empty( $form['radio_button']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Radio Name is required at #' . $c . '.</div>';
              } else if ( $form['radio_button']['name'] == 'status' ) {
                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }
            }

            //If Checkbox Fields are present.
            if ( ! empty( $form['checkbox'] ) ) {

              //If Checkbox Field Name is filled up.
              if ( empty( $form['checkbox']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Checkbox Name is required at #' . $c . '.</div>';
              } else if ( $form['checkbox']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If Checkbox Label is filled up.
              if ( empty( $form['checkbox']['label'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Checkbox Label is required at #' . $c . '.</div>';
              }

              //If has checkboxes
              if ( $form['checkbox']['checkboxes'] ) {

                //Loop Checkboxes.
                foreach ( $form['checkbox']['checkboxes'] as $ch ) {
                  if ( empty( $ch['checkbox_label'] ) ) {

                    //Set $has_error to true.
                    $has_error = true;

                    //Validation Error Message.
                    echo '<div>Checkbox Label is required at #' . $c . '.</div>';
                  }
                }
              } else {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Please add checkbox at #' . $c . '.</div>';
              }

              //If Checkbox Field Validation is required.
              if ( $form['checkbox']['validation']['required'] == 1 ) {

                //If Checkbox Field Validation is empty.
                if ( empty( $form['checkbox']['validation']['message'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message at #' . $c . '.</div>';

                //If Email Field Validation font-color is empty.
                } else if ( empty( $form['checkbox']['validation']['font-color'] ) ) {
                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message font color at #' . $c . '.</div>';
                }
              }
            }

            //If Textarea Fields are present.
            if ( ! empty( $form['textarea'] ) ) {

              //If Textarea Field Name is filled up.
              if ( empty( $form['textarea']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Textarea Name is required at #' . $c . '.</div>';
              } else if ( $form['textarea']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If Textarea Field Label is filled up.
              if ( empty( $form['textarea']['label'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Textarea Label is required at #' . $c . '.</div>';
              }

              //If Textarea Field Validation is required.
              if ( $form['textarea']['validation']['required'] == 1 ) {

                //If Checkbox Field Validation is empty.
                if ( empty( $form['textarea']['validation']['message'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message at #' . $c . '.</div>';

                //If Textarea Field Validation font-color is empty.
                } else if ( empty( $form['textarea']['validation']['font-color'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message font color at #' . $c . '.</div>';
                }
              }
            }

            //If File Attachment Fields are present.
            if ( ! empty( $form['file_attachments'] ) ) {

              //If File Attachment Field Name is filled up.
              if ( empty( $form['file_attachments']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>File Attachment Name is required at #' . $c . '.</div>';
              } else if ( $form['file_attachments']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If File Attachment Field Label is filled up.
              if ( empty( $form['file_attachments']['label'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>File Attachment Label is required at #' . $c . '.</div>';
              }

              //If File Attachment Field File Size is lessthan 100kb.
              if ( $form['file_attachments']['max_size'] <= 100 ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>File Attachment File Size is too small at #' . $c . '.</div>';
              }

              //If progress bar border color is empty.
              if ( empty( $form['file_attachments']['progress_bar_layout']['border_color'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Please set a progress border color at #' . $c . '.</div>';
              }

              //If progress bar backgroind color is empty.
              if ( empty( $form['file_attachments']['progress_bar_layout']['border_color'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Please set a progress background color at #' . $c . '.</div>';
              }

              //If Progress progress color is empty.
              if ( empty( $form['file_attachments']['progress_bar_layout']['progress_color'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Please set a progress color at #' . $c . '.</div>';
              }

              //If progress font color is empty.
              if ( empty( $form['file_attachments']['progress_bar_layout']['font-color'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Please set a progress font color at #' . $c . '.</div>';
              }

              //If Upload success message is empty.
              if ( empty( $form['file_attachments']['success_message_settings']['message'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Please set a success message at #' . $c . '.</div>';
              }

              //If Upload success message font color is empty.
              if ( empty( $form['file_attachments']['success_message_settings']['font-color'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Please set a success message font color at #' . $c . '.</div>';
              }

              //If File Attachments Field Validation is required.
              if ( $form['file_attachments']['validation']['required'] == 1 ) {

                //If Checkbox Field Validation is empty.
                if ( empty( $form['file_attachments']['validation']['message'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message at #' . $c . '.</div>';

                //If File Attachments Field Validation font-color is empty.
                } else if ( empty( $form['file_attachments']['validation']['font-color'] ) ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set a validation message font color at #' . $c . '.</div>';
                }
              }
            }

            //If Captcha Field is present.
            if ( ! empty( $form['captcha'] ) && $form['captcha'] ) {

              //Append Captcha Field Count.
              $captcha_count += count( $form );

              //If Captcha Field is morethan 1.
              if ( $captcha_count > 1 && $captcha_count <= 2 ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Only 1 Captcha Field is required.</div>';
              } else {

                //If Capctha String Length is lessthan 5.
                if ( $form['captcha']['length'] < 5 ) {

                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Captcha String Length should be 5 or more.</div>';
                }

                //If Validation message font color is empty.
                if ( empty( $form['captcha']['validation']['font-color'] ) ) {
                  //Set $has_error to true.
                  $has_error = true;

                  //Validation Error Message.
                  echo '<div>Please set Captcha validation message font color.</div>';
                }
              }
            }

            //If Submit Button Field is present.
            if ( ! empty( $form['submit'] ) && $form['submit'] ) {

              //Append Submit Count.
              $submit_count += count( $form );

              //If Submit Field is morethan 1.
              if ( $submit_count > 1 && $submit_count <= 2 ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Only 1 Submit Button Field is required.</div>';
              }

              //If Submit Button Field Name is filled up.
              if ( empty( $form['submit']['name'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Submit Button Name is required.</div>';
              } else if ( $form['submit']['name'] == 'status' ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Label is required on Name Field at #' . $c . '.</div>';
              }

              //If Submit Button Value is filled up.
              if ( empty( $form['submit']['value'] ) ) {

                //Set $has_error to true.
                $has_error = true;

                //Validation Error Message.
                echo '<div>Submit Button Value is required.</div>';
              }
            }

            //Increment count.
            $c++;
          }

          //Submit Button is required. Check if is present.
          if ( $submit_count == 0 ) {

            //Set $has_error to true.
            $has_error = true;

            //Validation Error Message.
            echo '<div>Submit Button is required.</div>';
          }

          //If No Validation Error.
          if ( $has_error == false ) {
            echo 'ok';
          }
        }
      break;

      //Form Name Validation.
      case 'form_name':

        //Form Name Value. Convert Strings to lowercase.
        $form_name = esc_html( strtolower( $_POST['form_name'] ) );

        //Replace spaces to dash.
        $form_name = str_ireplace( ' ', '-', $form_name );

        //If Form Name or Post Type Exists.
        if ( post_type_exists( $form_name ) ) {

          //Ajax Response String.
          echo 'exists';
        } else {

          //Ajax Response String.
          echo 'not_exists';
        }
      break;

      //Save Form.
      case 'save_form':

        //Value of Form Name.
        $form_name = esc_html( $_POST['form_name'] );

        //Special Characters to filter.
        $char = array();
        $char[] = '.';
        $char[] = ',';
        $char[] = '/';
        $char[] = ';';
        $char[] = "'";
        $char[] = '"';
        $char[] = '||';

        //Replacing Special Characters.
        $new = array();
        $new[] = '';
        $new[] = '';
        $new[] = '';
        $new[] = '';
        $new[] = '';
        $new[] = '';
        $new[] = '';

        //Initiate Replacing Characters.
        $form_name = str_ireplace( $char, $new, $form_name );

        //Form Fields. Encode to JSON.
        $form = json_encode( $_SESSION['create_form'] );
        $success_settings = json_encode( $_SESSION['success_settings'] );

        //Insert Post Properties.
        $args = array(
          'post_title'      => $form_name,                    //Form Name.
          'post_type'       => 'shogo-forms',  //Post Type.
          'post_status'     => 'publish',                     //Status Publish
          'meta_input'      => array(                         //Post Meta.
            'form_content'  => $form,                         //Form Content.
            'success_settings' => $success_settings           //Success Settings.
          )
        );

        //Initiate WP Insert Post.
        wp_insert_post( $args );

        //Clear Session Create Form.
      	unset( $_SESSION['create_form'] );

        //Ajax Response String.
        echo 'ok';
      break;

      //Edit Form Page.
      case 'edit_form':

        //Post ID.
        $id = (int)$_POST['id'];

        //WP_Query properties.
        $args = array(
        	'post_type'               => 'shogo-forms',
        	'order'                   => 'DESC',
        	'no_found_rows'           => true,
        	'update_post_term_cache'  => false
        );

        //Initiate WP_Query.
        $forms = new WP_Query( $args );

        //Get Post Meta Values.
        $meta = get_post_meta( $id );

        //Form Fields.
        $form_content = $meta['form_content'][0];

        //If has session form. To prevent realoading form content ones Clear Button clicked.
        if ( empty( $_SESSION['has_form'] ) ) {

          //Set has form to 1 if $_SESSION['create_form'] is empty.
          $_SESSION['has_form'] = 1;

          //Put Form Content to SESSION.
          $_SESSION['create_form'] = json_decode( $form_content, true );
        }

        //Display Form List.
        ob_start();
        include_once SF_PATH . 'includes/ajax_contents/create_form.php';
        echo ob_get_clean();
      break;

      //Delete Form.
      case 'delete_form':

        //Post ID.
        $id = (int)$_POST['id'];

        $entry_title = get_post_title( $id );

        //Initiate WP delete post.
        wp_delete_post( $id );
      break;

      //Update form.
      case 'update_form':

        //Post ID.
        $id = (int)$_POST['post_id'];

        //Meta Key of form contents.
        $meta_key = 'form_content';

        //Meta Key for success settings.
        $meta_key2 = 'success_settings';

        //Encode to JSON.
        $form_content = json_encode( $_SESSION['create_form'] );

        //Encode to JSON
        $success_settings = json_encode( $_SESSION['success_settings'] );

        //Update Form Content Post Meta.
        update_post_meta( $id, $meta_key, $form_content );

        //Update Success Settings Post Meta.
        update_post_meta( $id, $meta_key2, $success_settings );

        //Unset has_form.
        unset( $_SESSION['has_form'] );

        //unset create_form.
        unset( $_SESSION['create_form'] );

        //Unset success_settings
        unset( $_SESSION['success_settings'] );
      break;

      //Captcha Validation.
      case 'captcha_validation':

        //Captcha Value via ajax request.
        $captcha = $_POST['captcha'];

        //Captch Post Name or Form Name.
        $post_name = $_POST['post_name'];

        //Captcha Session.
        $captcha_session = $_SESSION['captcha'][$post_name]['string'];

        //Validating captcha if match or not.
        if ( $captcha == $captcha_session ) {
          echo 'match';
        } else {
          echo 'not_match!';
        }
      break;

      //Save user form entries.
      case 'save_form_enrties':

        //Csrf Value via ajax request.
        $sf_csrf = $_POST['sf_csrf'];

        //Verifying CSRF.
        if ( wp_verify_nonce( $sf_csrf, 'sf-nonce' ) ) {

          //Post Type Name or Form Name.
          $post_name = rtrim( SF_Methods::replace_sep( $_POST['post_name'] ), ', ' );

          //User's form entries.
          $form_entries = $_POST['form_entries'];

          //Generating Post Title.
          //Random Strings
          $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxwz1234567890';
          srand( ( double )microtime() * 1000000 );

          //Title value container.
          $str = '';

          //Generate Strings.
          for ( $i = 0; $i < 10; $i++ ) {
            $num = rand() % 33;
            $tmp = substr( $chars, $num, 1 );
            $str = $str . $tmp;
          }

          //wp_insert_post properties.
          $args = array(
            'post_title'      => $str,          //Post Name or Title.
            'post_type'       => $post_name,    //Post Type.
            'post_status'     => 'publish',     //Publish when inserted.
            'meta_input'      => $form_entries  //User's Form Entries.
          );

          //Initiate WP Insert Post.
          wp_insert_post( $args );

          //Return Entry Name for File Attachments If
          echo $str;
        }
      break;

      //Delete Entry.
      case 'delete_entry':

        //Post ID.
        $id = (int)$_POST['id'];

        //Get Post Type.
        $post_type = esc_html( $_POST['post_type'] );

        //Get Post Title or Entry ID.
        $post_title = SF_Methods::get_entry_name( $id, $post_type );

        //If Entry Has File Attachments.
        if ( SF_Methods::has_file_attachments( $post_title ) ) {

          //Get File List.
          $files = SF_Methods::get_file_attachements( $post_title );

          //File Location of Attachments.
          $location = ABSPATH . '/wp-content/uploads/sf_forms/';

          //Loop File Lists.
          foreach ( $files as $file ) {

            //Dir Name of File Container.
            $dir_name = $file->dir_name;

            //Filename.
            $filename = $file->filename;

            //If File Exists from Location.
            if ( file_exists( $location . $dir_name . '/' . $filename ) ) {
              //Delete File.
              if ( unlink( $location . $dir_name . '/' . $filename ) ) {

                //Remove Dir Container.
                if ( rmdir( $location . $dir_name ) ) {

                  //Global Wordpress Database Query Class.
                  global $wpdb;

                  //Database Prefix.
                  $prefix = $wpdb->prefix;

                  //Database Table.
                  $table = $prefix . 'sf_forms_uploads';

                  //Delete Record from the Database.
                  $wpdb->delete( $table, array( 'entry_name' => $post_title ) );
                }
              }
            }
          }
        }

        //Initiate WP delete post.
        wp_delete_post( $id );
      break;

      //Mark Entry as Unread.
      case 'mark_unread':

        //Post ID.
        $id = (int)$_POST['id'];

        //Initiate Update Post Meta.
        update_post_meta( $id, 'status', 'unread' );
      break;

      //File Upload
      case 'file_upload':

        //Field Name.
        $field_name = esc_html( $_POST['field_name'] );

        //Entry ID.
        $entry_name = esc_html( $_POST['entry_name'] );

        //Filename to Upload.
        $filename = esc_html( $_FILES[$field_name]['name'] );

        //File Size.
        $filesize = $_FILES[$field_name]['size'];

        //File from tmp dir in php.
        $file = $_FILES[$field_name]['tmp_name'];

        //If no upload error.
        if ( $error == 0 ) {

          //Global the Wordpress WPDB Database Query.
          global $wpdb;

          //WP Prefix.
          $prefix = $wpdb->prefix;

          //Generating Dir Name.
          //Random Strings
          $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxwz1234567890';
          srand( ( double )microtime() * 1000000 );

          //Dir Name value container.
          $str = '';

          //Generate Strings for File Dir Name.
          for ( $i = 0; $i < 10; $i++ ) {
            $num = rand() % 33;
            $tmp = substr( $chars, $num, 1 );
            $str = $str . $tmp;
          }

          //The DIR name generated.
          $dir = $str;

          //Path to move the uploaded file.
          $location = ABSPATH . '/wp-content/uploads/sf_forms/' . $dir.'/';

          //Make Dir from /wp-content/uploads/sf_forms.
          mkdir($location, 0777, true);

          //Making sure the directory has full permission.
          chmod( $location, 0777 );

          //Move file from tmp dir.
          if ( move_uploaded_file( $file, $location . $filename ) ) {
            echo 'moved';
            //Insert upload information to the database.
            $wpdb->insert( $prefix . 'sf_forms_uploads', array(
              'entry_name'    => $entry_name,
              'dir_name'      => $dir,
              'field_name'    => $field_name,
              'file_size'     => $filesize,
              'filename'      => $filename
            ), array( '%s', '%s', '%s', '%d', '%s' ) );
          } else {
            echo 'failed to move.' ;
          }

        }
      break;

      //Field Preview.
      case 'field_preview':

        //Field Type.
        $field_type = esc_html( $_POST['field_type'] );

        //Field Position.
        $pos = esc_html( $_POST['pos'] );

        ob_start();
        include_once SF_PATH . '/includes/ajax_contents/ajax_field_preview.php';
        echo ob_get_clean();
      break;

      //Custom Field Style Checker.
      case 'custom_field_style':

        //Field Type.
        $field_type = esc_html( $_POST['field_type'] );

        //Field Position.
        $pos = esc_html( $_POST['pos'] );

        if ( $_SESSION['create_form'][$pos][$field_type]['styles']['required'] == 1 ) {
          echo 1;
        } else {
          echo 0;
        }
      break;

      //Field Validation Checker.
      case 'field_validation':

        //Field Type.
        $field_type = esc_html( $_POST['field_type'] );

        //Field Position.
        $pos = esc_html( $_POST['pos'] );

        if ( $_SESSION['create_form'][$pos][$field_type]['validation']['enabled'] == 1 ) {
          echo 1;
        } else {
          echo 0;
        }
      break;

      case 'field_required':

        //Field Type.
        $field_type = esc_html( $_POST['field_type'] );

        //Field Position.
        $pos = esc_html( $_POST['pos'] );

        if ( $_SESSION['create_form'][$pos][$field_type]['validation']['required'] == 1 ) {
          echo 1;
        } else {
          echo 0;
        }
      break;

      //Field Attributes
      case 'field_attributes':

        //Field Type.
        $field_type = esc_html( $_POST['field_type'] );

        //Field Position.
        $pos = esc_html( $_POST['pos'] );

        ob_start();
        include_once SF_PATH . '/includes/ajax_contents/field_attr_view.php';
        echo ob_get_clean();
      break;
    }

		wp_die();
	}

  /****************************************************************************
  * Reorder Field Position of $_SESSION['create_form'] when Field was deleted.
  * @version 1.0.0
  *****************************************************************************/
  private static function reorder() {

    //Increment count. depends on the number of session fields.
    $c = 0;

    //Loop $_SESSION['create_form']
    foreach ( $_SESSION['create_form'] as $form ) {

      //Create a backup session.
      $_SESSION['backup_form'][$c] = $form;

      //Increment number.
      $c++;
    }

    //Replace $_SESSION['create_form']
    $_SESSION['create_form'] = $_SESSION['backup_form'];

    //Unset $_SESSION['backup_form'].
    unset( $_SESSION['backup_form'] );
  }

  /**********************************
  * Update Sortable Position order.
  * @version 1.0.0
  ***********************************/
  private static function sort( $pos ) {

    //Increment count. depends on the number of session fields.
    $c = 0;

    //Loop $pos value.
    foreach ( $pos as $p => $val ) {

      //Create a backup session.
      $_SESSION['backup_form'][$c] = $_SESSION['create_form'][$val];

      //Increment number.
      $c++;
    }

    //Replace $_SESSION['create_form']
    $_SESSION['create_form'] = $_SESSION['backup_form'];

    //Unset $_SESSION['backup_form'].
    unset( $_SESSION['backup_form'] );
  }

  /************************************
  * Reordering Dropdown Field Options.
  * @version 1.0.0.
  *************************************/
  private function option_reorder( $pos ) {

    //Increment count. depends on the number of option fields.
    $c = 0;

    //Loop  $_SESSION['create_form'][$pos]['dropdown_field']['options']
    foreach ( $_SESSION['create_form'][$pos]['dropdown_field']['options'] as $option ) {

      //Create a backup session.
      $_SESSION['backup_form'][$c] = $option;

      //Increment number.
      $c++;
    }

    //Replace $_SESSION['create_form'][$pos]['dropdown_field']['options']
    $_SESSION['create_form'][$pos]['dropdown_field']['options'] = $_SESSION['backup_form'];

    //Unset $_SESSION['backup_form'].
    unset( $_SESSION['backup_form'] );
  }

  /************************************
  * Reordering Radio Field Bullets.
  * @version 1.0.0.
  *************************************/
  private function bullet_reorder( $pos ) {

    //Increment count. depends on the number of option fields.
    $c = 0;

    //Loop $_SESSION['create_form'][$pos]['radio_field']['bullets']
    foreach ( $_SESSION['create_form'][$pos]['radio_button']['bullets'] as $bullet ) {

      //Create a backup session.
      $_SESSION['backup_form'][$c] = $bullet;

      //Increment number.
      $c++;
    }

    //Replace $_SESSION['create_form'][$pos]['radio_button']['bullets']
    $_SESSION['create_form'][$pos]['radio_button']['bullets'] = $_SESSION['backup_form'];

    //Unset $_SESSION['backup_form'].
    unset( $_SESSION['backup_form'] );
  }

  /************************************
  * Reordering Checkbox Field Checkboxes.
  * @version 1.0.0.
  *************************************/
  private function ch_reordering( $pos ) {

    //Increment count. depends on the number of option fields.
    $c = 0;

    //Loop $_SESSION['create_form'][$pos]['checkbox']['checkboxes']
    foreach ( $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] as $checkbox ) {

      //Create a backup session.
      $_SESSION['backup_form'][$c] = $checkbox;

      //Increment number.
      $c++;
    }

    //Replace $_SESSION['create_form'][$pos]['checkbox']['checkboxes']
    $_SESSION['create_form'][$pos]['checkbox']['checkboxes'] = $_SESSION['backup_form'];

    //Unset $_SESSION['backup_form'].
    unset( $_SESSION['backup_form'] );
  }
}
