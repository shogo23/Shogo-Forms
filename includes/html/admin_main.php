<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

//Unset has_form.
unset( $_SESSION['has_form'] );

//Unset create_form.
unset( $_SESSION['create_form'] );

//WP_Query Properties.
$args = array(
	'post_type'               => 'shogo-forms',
	'order'                   => 'DESC',
	'no_found_rows'           => true,
	'update_post_term_cache'  => false
);

//Initiate WP_Query.
$forms = new WP_Query( $args );

?>

<div class="SF_admin_container">
  <div class="SF_form_list">
    <?php if ( $forms->have_posts() ): ?>
      <?php if ( ! isset( $_GET['sf_page'] ) ): ?>
        <table cellpadding="0" cellspacing="0">
          <thead>
            <tr>
              <th>Form Name</th>
              <th>Date Created</th>
              <th>Shortcodes</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php while ( $forms->have_posts() ): $forms->the_post(); ?>
              <?php $id = get_the_id(); ?>
              <tr>
                <td><?php echo get_the_title(); ?></td>
                <td><?php echo get_the_date(); ?></td>
                <td>[shogo_forms id="<?php echo get_the_id(); ?>"]</td>
                <td><a href="<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page&sf_page=edit&id=<?php echo $id; ?>">Edit</a></td>
                <td><a href="<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page&sf_page=delete&id=<?php echo $id; ?>">Delete</a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

        <ul class="SF_mobile_admin_container">
          <?php while ( $forms->have_posts() ): $forms->the_post(); ?>
            <li>
              <div class="SF_mobile_form_container">
                <div class="SF_mobile_form_label"><span class="dashicons dashicons-no-alt"></span></div>
                <div class="SF_mobile_form_contents">
                  <ul>
                    <li><?php echo get_the_title(); ?></li>
                    <li><?php echo get_the_date(); ?></li>
                    <li><span class="SF_shortcode_item_<?php echo get_the_id(); ?>">[shogo_forms id="<?php echo get_the_id(); ?>"]</span></li>
                    <li><span class="button SF_copy_shortcode" onclick="javascript: SF_copyToClipboard(<?php echo get_the_id(); ?>)">Copy Shortcode</span></li>
                    <li><span class="SF_flash SF_flash_<?php echo get_the_id() ?>">Copied!</span>&nbsp;</li>
                  </ul>
                  <div class="SF_mobile_form_opt">
                    <ul>
                      <li><a href="<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page&sf_page=edit&id=<?php echo $id; ?>"><span class="button">Edit</span></a></li>
                      <li><a href="<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page&sf_page=delete&id=<?php echo $id; ?>"><span class="button">Delete</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>

        <script type="text/javascript">

          function SF_copyToClipboard(id) {
            var temp = jQuery("<input>");

            jQuery("body").append(temp);

            temp.val(jQuery(".SF_shortcode_item_" + id).text()).select();

            document.execCommand("copy");

            jQuery(".SF_flash_" + id).fadeIn(500, function() {
              setTimeout(function() {
                jQuery(".SF_flash_" + id).fadeOut();
              }, 3000);
            });
          }
        </script>
      <?php else: ?>
        <?php if ( $_GET['sf_page'] == 'edit' && $_GET['id'] ): ?>
          <?php include SF_PATH . 'includes/admin_edit_form.php' ?>
        <?php elseif ( $_GET['sf_page'] == 'delete' && $_GET['id'] ): ?>
          <?php
            $id = (int)$_GET['id'];
            $title = SF_Methods::get_post_title( $id );

            if ( SF_Methods::has_entries( $title ) ) {
              $entries = SF_Methods::get_entries( $title );

              foreach ( $entries as $entry ) {
                $entry_id = $entry->ID;
                $ident = $entry->post_title;

                if ( SF_Methods::has_file_attachments( $ident ) ) {
                  $files = SF_Methods::get_file_attachements( $ident );

                  //File Location of Attachments.
                  $location = ABSPATH . '/wp-content/uploads/sf_forms/';

                  foreach ( $files as $file ) {
                    $dir_name = $file->dir_name;
                    $filename = $file->filename;

                    if ( file_exists( $location . $dir_name. '/' . $filename ) ) {
                      unlink( $location . $dir_name. '/' . $filename );
                      rmdir( $location . $dir_name );
                    }
                  }
                }

                wp_delete_post( $entry_id );
              }
            }

            //Delete Form.
            wp_delete_post( $id );
          ?>
          <script type="text/javascript">
            //Back to form list.
            location = "<?php echo admin_url( 'admin.php' ); ?>?page=shogo-forms-page";
          </script>
        <?php endif; ?>
      <?php endif; ?>
    <?php else: ?>
      <div class="SF_empty_form">No Forms at this time. Create one.</div>
    <?php endif; ?>
  </div>
</div>
