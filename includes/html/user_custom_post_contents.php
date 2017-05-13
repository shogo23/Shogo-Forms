<?php

/*
* Admin Page Contents.
* This is the front end of the Admin Pages.
* @version 1.0.0
*/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

?>

<!-- SF Admin Page Contents Start -->
<div class="SF_form_entries_container">
  <?php if ( ! isset( $_GET['sf'] ) ): ?>
    <div class="SF_entries_options">
      <span class="button SF_entries_check_all_1">Check All</span> <span class="button SF_entries_delete_1">Delete</span>
    </div>
    <div class="SF_entries_contents">
      <?php
        //If have entries.
      ?>
      <?php if ( $forms->have_posts() ): ?>
        <?php $count = 0; while ( $forms->have_posts() ): $forms->the_post(); ?>
          <?php
            $id = get_the_id();           //Entry ID.
            $ident = get_the_title();     //Entry ID.
            $meta = get_post_meta( $id ); //Entry Fields.
            $unread_count = 0;            //Unread Count Container.
          ?>

          <?php
            //The Unread Entries.
          ?>
          <?php if ( $meta['status']['0'] == 'unread' ): ?>
            <div class="SF_form_entry SF_unread">
              <div class="SF_entries_checkbox">
                <input type="checkbox" class="SF_entries_ch" value="<?php echo $id; ?>" />
              </div>
              <h4><a href="<?php echo admin_url( 'admin.php' ) ?>?page=<?php echo $_GET['page'] ?>&sf=read&id=<?php echo $id; ?>"><strong>Entry ID: <?php echo $ident; ?></strong></a></h4>
              <?php $c = 0; foreach ( $meta as $m => $v ): ?>
                <?php if ( $c < 2 && $m !== 'status' ): ?>
                    <ul>
                      <li><strong><?php echo ucfirst( str_ireplace( '_', ' ', $m ) ); ?>: <?php echo rtrim( SF_Methods::replace_sep( $v[0] ), ', ' ); ?></strong></li>
                    </ul>
                <?php endif; ?>
              <?php $c++; endforeach; ?>
              <div><a href="<?php echo admin_url( 'admin.php' ) ?>?page=<?php echo $_GET['page'] ?>&sf=read&id=<?php echo $id; ?>">Read More</a></div>
            </div>
          <?php else: //The Readed Contents. ?>
            <div class="SF_form_entry">
              <div class="SF_entries_checkbox">
                <input type="checkbox" class="SF_entries_ch" value="<?php echo $id; ?>" />
              </div>
              <h4><a href="<?php echo admin_url( 'admin.php' ) ?>?page=<?php echo $_GET['page'] ?>&sf=read&id=<?php echo $id; ?>">Entry ID: <?php echo $ident; ?></a></h4>
              <?php $c = 0; foreach ( $meta as $m => $v ): ?>
                <?php if ( $c < 2 && $m !== 'status' ): ?>
                    <ul>
                      <li><?php echo ucfirst( str_ireplace( '_', ' ', $m ) ); ?>: <?php echo rtrim( SF_Methods::replace_sep( $v[0] ), ', ' ); ?></li>
                    </ul>
                <?php endif; ?>
              <?php $c++; endforeach; ?>
              <div class="SF_entry_date">
                Date of Submit: <?php echo get_the_date("F n Y g:i:s A"); ?>
              </div>
              <div><a href="<?php echo admin_url( 'admin.php' ) ?>?page=<?php echo $_GET['page'] ?>&sf=read&id=<?php echo $id; ?>">Read More</a></div>
            </div>
          <?php endif; ?>
        <?php $count++; endwhile; ?>
      <?php else: ?>
        There are no entries at this time.
      <?php endif; ?>
    </div>
    <div class="SF_entries_options">
      <span class="button SF_entries_check_all_2">Check All</span> <span class="button SF_entries_delete_2">Delete</span>
    </div>

    <script type="text/javascript">

      //Boolean Option for Check All Buttons and Checkbox Fields.
      var check_all_bool = false;

      SF_entries_content();

      jQuery(".SF_entries_check_all_1, .SF_entries_check_all_2").on("click", function() {
        if ( check_all_bool == false ) {
          check_all_bool = true;
          jQuery(".SF_entries_check_all_1, .SF_entries_check_all_2").html("Uncheck All");
          jQuery(".SF_entries_ch").each(function() {
            jQuery(".SF_entries_ch").attr("checked", "checked");
          });
        } else {
          check_all_bool = false;
          jQuery(".SF_entries_check_all_1, .SF_entries_check_all_2").html("Check All");
          jQuery(".SF_entries_ch").each(function() {
            jQuery(".SF_entries_ch").attr("checked", false);
          });
        }
      });

      jQuery(".SF_entries_delete_1, .SF_entries_delete_2").on("click", function() {
        jQuery(".SF_form_entry .SF_entries_ch").each(function( c ) {
          var c1 = c + 1;

          if ( jQuery(".SF_form_entry:nth-child( " + c1 + " ) .SF_entries_ch").is(":checked")  ) {
            var id = jQuery(".SF_form_entry:nth-child( " + c1 + " ) .SF_entries_ch").val();
            SF_delete_entry( id );
          }
        });
      });

      jQuery(window).resize(function() {
        SF_entries_content();
      });

      function SF_entries_content() {
        var win_height = jQuery(window).height() - 180;

        jQuery(".SF_entries_contents").css({
          "height": win_height + "px"
        });
      }

      function SF_delete_entry( id ) {
        var data = {
          "action": "SF_forms",
          "operation": "delete_entry",
          "post_type": "<?php echo $slug; ?>",
          "id": id
        };

        jQuery.post(ajaxurl, data, function() {
          location.reload();
        });
      }
    </script>

  <?php else: ?>

    <?php if ( $_GET['sf'] == 'read' && isset( $_GET['id'] ) ): ?>
      <?php
        $id = (int)$_GET['id'];
        $meta = get_post_meta( $id );

        if ( $meta['status']['0'] == 'unread' ) {
          update_post_meta( $id, 'status', '' );
        }

        $ident = '';

        while ( $forms->have_posts() ) {
          $forms->the_post();

          if ( get_the_id() == $id ) {
            $ident = get_the_title();
          }
        }
      ?>

      <div class="SF_single_entry_container">
        <div class="SF_singe_entry_header">Entry ID: <?php echo $ident; ?></div>
        <ul>
          <?php foreach ( $meta as $val => $m ): ?>
            <?php if ( $val !== 'status' ): ?>
              <li>
                <label><?php echo ucfirst( str_ireplace( '_', ' ', $val ) ); ?>:</label>
                <div class="SF_entry_vals">
                  <?php echo rtrim( SF_Methods::replace_sep( $m[0] ), ', ' ); ?>
                </div>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>

          <?php if ( SF_Methods::has_file_attachments( $ident ) ): ?>
            <?php
              $files = SF_Methods::get_file_attachements( $ident );

              foreach ( $files as $file ):
                $field_name = $file->field_name;
                $dir_name = $file->dir_name;
                $file_size = $file->file_size;
                $filename = $file->filename;

                $file_size = number_format($file_size / 1048576, 2 );
            ?>

              <li>
                <label><?php echo ucfirst( str_ireplace( '_', ' ', $field_name ) ); ?>:</label>
                <ul>
                  <li>
                    <div>Filename:</div>
                    <a href="<?php echo '/wp-content/uploads/sf_forms/' . $dir_name. '/' . $filename ?>"><?php echo $filename; ?></a>
                  </li>
                  <li>
                    File Size: <?php echo $file_size; ?> MB. <a href="<?php echo '/wp-content/uploads/sf_forms/' . $dir_name. '/' . $filename ?>"><span class="button-primary">Download</span></a>
                  </li>
                </ul>
              </li>

            <?php endforeach; ?>
          <?php endif; ?>
          <div class="SF_entry_date">
            Date of Submit: <?php echo get_the_date("F n Y g:i:s A"); ?>
          </div>
        </ul>

        <div class="SF_single_entry_btns">
          <span class="button SF_go_back">Go Back</span> <span class="button SF_unread_mark">Mark as Unread</span> <span class="button SF_single_entry_delete">Delete</span>
        </div>
      </div>

      <script type="text/javascript">
        jQuery(".SF_go_back").on("click", function() {
          location = "<?php echo admin_url( 'admin.php' ) ?>?page=<?php echo $_GET['page'] ?>";
        });

        jQuery(".SF_unread_mark").on("click", function() {
          var data = {
            "action": "SF_forms",
            "operation": "mark_unread",
            "id": <?php echo $id; ?>
          };

          jQuery.post(ajaxurl, data, function() {
            location = "<?php echo admin_url( 'admin.php' ) ?>?page=<?php echo $_GET['page'] ?>";
          });
        });

        jQuery(".SF_single_entry_delete").on("click", function() {
          var data = {
            "action": "SF_forms",
            "operation": "delete_entry",
            "post_type": "<?php echo $slug; ?>",
            "id": <?php echo $id; ?>
          };

          jQuery.post(ajaxurl, data, function() {
            location = "<?php echo admin_url( 'admin.php' ) ?>?page=<?php echo $_GET['page'] ?>";
          });
        });
      </script>
    <?php endif; ?>
  <?php endif; ?>
</div>
<!-- End of Admin Page Contents -->
