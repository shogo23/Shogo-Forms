<div class="SF_about_main">
  <div class="SF_about_banner"></div>
  <div class="SF_about_description">
    Shogo Forms is a form submission for worpdress websites and blogs. User can customize any form field they want to display in the
    front end and with custom field layout to match the layout of the websites and blog. Shogo Forms can also embed to your theme widgets.
  </div>
  <div class="SF_customize_field_text">
    Customize Your Form
  </div>
  <div class="SF_about_customize_bg"></div>
  <div class="SF_about_customize_front_end">
    Your Form would be look like this
  </div>
  <div class="SF_about_customize_bg2"></div>
  <div class="SF_about_create_form">
    Easy to create form fields by clicking and writing
  </div>
  <div class="SF_about_customize_bg3"></div>
  <div class="SF_about_author_header">
    Author's Details
  </div>
  <div class="SF_about_author_details">
    <table>
      <tbody>
        <tr>
          <td>Author:</td>
          <td>Victor Caviteno</td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>gervic@gmx.com</td>
        </tr>
        <tr>
          <td>Facebook:</td>
          <td><a target="_blank" href="https://www.facebook.com/gervic23">https://www.facebook.com/gervic23</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="SF_about_mobile">
  <div class="SF_about_banner_mobile"></div>
  <div class="SF_about_description_mobile">
    Shogo Forms is a form submission for worpdress websites and blogs. User can customize any form field they want to display in the
    front end and with custom field layout to match the layout of the websites and blog. Shogo Forms can also embed to your theme widgets.
  </div>
  <div class="SF_about_customize_header_mobile">
    Customize Your Form
  </div>
  <div class="SF_about_customize_bg_mobile"></div>
  <div class="SF_about_front_end_header_mobile">
    Your Form would be look like this
  </div>
  <div class="SF_about_customize_bg2_mobile"></div>
  <div class="SF_about_create_form_mobile">
    Easy to create form fields by clicking and writing
  </div>
  <div class="SF_about_customize_bg3_mobile"></div>
  <div class="SF_about_author_details_header_mobile">Author's Details</div>
  <div class="SF_about_author_details_mobile">
    <ul>
      <li>Author:<br />Victor Caviteno</li>
      <li>Email:<br />gervic@gmx.com</li>
      <li>Facebook:<br .><a target="_blank" href="https://www.facebook.com/gervic23">https://www.facebook.com/gervic23</a></li>
    </ul>
  </div>
</div>

<script type="text/javascript" src="/wp-content/plugins/shogo-forms/js/viewportchecker.js"></script>

<script type="text/javascript">

  if ( jQuery(window).width() > 500 ) {
    SF_about_banner_size();
    SF_about_customize_bg();

    jQuery(window).resize(function() {
      SF_about_banner_size();
      SF_about_customize_bg();
    });

    function SF_about_banner_size() {
      var win_height = jQuery(window).height() - 100;

      jQuery(".SF_about_banner").css({
        "height": win_height + "px"
      });
    }

    function SF_about_customize_bg() {
      var win_height = jQuery(window).height() - 400;

      jQuery(".SF_about_customize_bg, .SF_about_customize_bg2, .SF_about_customize_bg3").css({
        "height": win_height + "px"
      });
    }

    jQuery(document).ready(function() {
      jQuery('.SF_about_description, .SF_about_author_details').addClass("SF_hidden").viewportChecker({
        classToAdd: 'SF_visible animated fadeInDown', // Class to add to the elements when they are visible
        offset: 100
      });

       jQuery('.SF_customize_field_text, .SF_about_customize_front_end, .SF_about_create_form, .SF_about_author_header').addClass("SF_hidden").viewportChecker({
        classToAdd: 'SF_visible animated bounceInLeft', // Class to add to the elements when they are visible
        offset: 100
      });
    });
  } else {

    SF_about_banner_size();
    SF_about_customize_bg()

    jQuery(window).resize(function() {
      SF_about_banner_size();
      SF_about_customize_bg();
    });

    jQuery(document).ready(function() {
      jQuery('.SF_about_description_mobile').addClass("SF_hidden").viewportChecker({
        classToAdd: 'SF_visible animated fadeInDown', // Class to add to the elements when they are visible
        offset: 100
      });

      jQuery('.SF_about_customize_header_mobile, .SF_about_front_end_header_mobile, .SF_about_create_form_mobile, .SF_about_author_details_header_mobile').addClass("SF_hidden").viewportChecker({
        classToAdd: 'SF_visible animated bounceInLeft', // Class to add to the elements when they are visible
        offset: 100
      });
    });

    function SF_about_banner_size() {
      var win_height = jQuery(window).height() - 500;

      jQuery(".SF_about_banner_mobile").css({
        "height": win_height + "px"
      });
    }

    function SF_about_customize_bg() {
      var win_height = jQuery(window).height() - 400;

      jQuery(".SF_about_customize_bg_mobile, .SF_about_customize_bg2_mobile, .SF_about_customize_bg3_mobile").css({
        "height": win_height + "px"
      });
    }
  }
</script>
