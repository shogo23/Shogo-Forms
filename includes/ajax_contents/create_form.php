<?php

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( ! empty( $_SESSION['create_form'] ) ): ?>

<div class="SF_ajax_create_form_container">
	<ul class="SF_field_list">
		<?php $c = 0; foreach( $_SESSION['create_form'] as $form ): ?>
			<?php $c1 = $c + 1; ?>
			<?php if ( $form['text_field'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_name_field"></span>
						<span title="Delete Field" class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_text_field_input_toggle" value="<?php echo $form['text_field']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Text Field #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_text_fields_contents">
						<p>
							<label for="SF_field_name">Name:</label><br />
							<input type="text" class="SF_name_field_name" value="<?php if ( $form['text_field']['name'] ) echo $form['text_field']['name']; ?>" />
						</p>
						<p>
							<label for="SF_name_field_label">Label:</label><br />
							<input type="text" class="SF_name_field_label" value="<?php if ( $form['text_field']['label'] ) echo $form['text_field']['label']; ?>" />
						</p>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_text_field_use_theme_style" value="0" <?php if ( $form['text_field']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_text_field_use_custom_style" value="1" <?php if ( $form['text_field']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>
						<?php

							//Field Label Font Color.
							$text_field_label_font_color = $form['text_field']['styles']['label_font_color'];

							//Field Label Size Type.
							if ( $form['text_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
								$text_field_label_size_type = 'px';
							} else if ( $form['text_field']['styles']['label_font_size_type']['percent'] == 1 ) {
								$text_field_label_size_type = '%';
							}

							//Field Label Size.
							$text_field_label_font_size = $form['text_field']['styles']['label_font_size_type']['size'];

							//Field Border Color.
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

							//Field Border Radius.
							$text_field_border_radius = $form['text_field']['styles']['border_radius'];

							//Field Placeholder.
							$text_field_placeholder = $form['text_field']['styles']['placeholder'];

							//Field Width.
							$text_field_width = $form['text_field']['styles']['width_type']['width'];

							//Field Width Type.
							if ( $form['text_field']['styles']['width_type']['pixels'] == 1 ) {
								$text_field_width_type = 'px';
							} else if ( $form['text_field']['styles']['width_type']['percent'] == 1 ) {
								$text_field_width_type = '%';
							}
						?>
						<div class="SF_text_field_custom_style_contents SF_custom_field_style" <?php if ( $form['text_field']['styles']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
							<h3>Text Field Preview</h3>
							<div class="SF_text_field_preview"></div>
							<div class="SF_text_field_prev_btn_container SF_field_prev_btn_container">
								<span class="SF_text_field_preview_btn SF_field_preview_btn button">Preview</span>
							</div>
							<ul>
								<li>
									<label>Label Font Color:</label><br />
									<input type="text" class="SF_text_field_label_font_color SF_field_label_font_color" value="<?php echo $text_field_label_font_color; ?>" />
								</li>
								<li><label>Label Font Size:</label><br />
									<input type="number" class="SF_text_field_label_size SF_field_label_size" value="<?php echo $text_field_label_font_size; ?>" />
									<select class="SF_text_field_label_size_types SF_field_label_size_types">
										<option value="pixels" <?php if ( $form['text_field']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
										<option value="percent" <?php if ( $form['text_field']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Border Color:</label><br />
									<input type="text" class="SF_text_field_border_color SF_field_border_color" value="<?php echo $text_field_border_color; ?>" />
								</li>
								<li>
									<label>Border Size:</label><br />
									<input type="number" class="SF_text_field_border_size SF_field_border_size" value="<?php echo $text_field_border_size; ?>" />
								</li>
								<li>
									<label>Background Color:</label><br />
									<input type="text" class="SF_text_field_background_color SF_field_background_color" value="<?php echo $text_field_background_color; ?>" />
								</li>
								<li>
									<label>Font Color:</label><br />
									<input type="text" class="SF_text_field_font_color SF_field_font_color" value="<?php echo $text_field_font_color; ?>" />
								</li>
								<li>
									<label>Padding X:</label><br />
									<input type="number" class="SF_text_fields_padding_x SF_field_padding_x" value="<?php echo $text_field_padding_x; ?>" />
								</li>
								<li>
									<label>Padding Y:</label><br />
									<input type="number" class="SF_text_fields_padding_y SF_field_padding_y" value="<?php echo $text_field_padding_y; ?>" />
								</li>
								<li>
									<label>Border Radius:</label><br />
									<input type="number" class="SF_text_fields_border_radius SF_field_border_radius" value="<?php echo $text_field_border_radius; ?>" />
								</li>
								<li>
									<label>Width:</label><br />
									<input type="number" class="SF_text_field_width SF_field_width" value="<?php echo $text_field_width; ?>" />
									<select class="SF_text_field_width_type SF_field_width_type">
										<option value="pixels" <?php if ( $form['text_field']['styles']['width_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
										<option value="percent" <?php if ( $form['text_field']['styles']['width_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Placeholder:</label><br />
									<input type="text" class="SF_text_field_placeholder SF_field_placeholder" value="<?php echo $text_field_placeholder; ?>"  />
								</li>
							</ul>
						</div>
						<div class="SF_field_name_validation">
							<input type="checkbox" class="SF_text_field_validation_required" <?php if ( $form['text_field']['validation']['enabled'] == 1 ) echo 'checked="checked"' ?> /> Enable Field Validation
						</div>

						<div class="SF_validation_contents" <?php if ( $form['text_field']['validation']['enabled'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
							<ul>
								<li>
									<label>Required Validation Message:</label><br />
									<input type="text" class="SF_text_field_required_validation_message" style="color: <?php echo $form['text_field']['validation']['required']['font-color']; ?>;" value="<?php echo $form['text_field']['validation']['required']['message']; ?>" />
								</li>
								<li>
									<label>Required Font Color:</label><br />
									<input type="text" class="SF_text_field_error_color" value="<?php echo $form['text_field']['validation']['required']['font-color']; ?>">
								</li>
								<li>
									<label>Minimum Character Field Length:</label><br />
									<input type="number" class="SF_text_field_min_len" value="<?php echo $form['text_field']['validation']['min_length']['length']; ?>" />
									<br /><span>To disable put zero(0) or leave blank.</span>
								</li>
								<li>
									<label>Minimum Character Field Validation Message:</label><br />
									<input type="text" class="SF_text_field_min_validation_message" style="color: <?php echo $form['text_field']['validation']['min_length']['font-color']; ?>;" value="<?php echo $form['text_field']['validation']['min_length']['message']; ?>" />
								</li>
								<li>
									<label>Minimun Character Field Validation Font Color:</label><br />
									<input type="text" class="SF_text_field_min_validation_font_color" value="<?php echo $form['text_field']['validation']['min_length']['font-color']; ?>" />
								</li>
								<li>
									<label>Maximum Character Field Length:</label><br />
									<input type="number" class="SF_text_field_max_len" value="<?php echo $form['text_field']['validation']['max_length']['length']; ?>" />
									<br /><span>To disable put zero(0) or leave blank.</span>
								</li>
								<li>
									<label>Maximum Character Field Validation Message</label><br />
									<input type="text" class="SF_text_field_max_len_validation_message" style="color: <?php echo $form['text_field']['validation']['max_length']['font-color']; ?>;" value="<?php echo $form['text_field']['validation']['max_length']['message']; ?>" />
								</li>
								<li>
									<label>Maximum Character Field Validation Font Color:</label><br />
									<input type="text" class="SF_text_field_max_len_validation_font_color" value="<?php echo $form['text_field']['validation']['max_length']['font-color'] ?>" />
								</li>
							</ul>
						</div>

					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['number_field'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_number_field"></span>
						<span title="Delete Field" class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_number_input_toggle" value="<?php echo $form['number_field']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Number Field #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_number_fields_contents">
						<p>
							<label for="SF_name_field_number">Name:</label><br />
							<input type="text" class="SF_name_field_number" value="<?php if ( $form['number_field']['name'] ) echo $form['number_field']['name']; ?>" />
						</p>
						<p>
							<label for="SF_number_field_label">Label:</label><br />
							<input type="text" class="SF_number_field_label" value="<?php if ( $form['number_field']['label'] ) echo $form['number_field']['label']; ?>" />
						</p>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_number_field_use_theme_style" value="0" <?php if ( $form['number_field']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_number_field_use_custom_style" value="1" <?php if ( $form['number_field']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>
							<?php

								//Field Label Font Color.
								$number_field_label_font_color = $form['number_field']['styles']['label_font_color'];

								//Field Label Size Type.
								if ( $form['number_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
									$number_field_label_size_type = 'px';
								} else if ( $form['number_field']['styles']['label_font_size_type']['percent'] == 1 ) {
									$number_field_label_size_type = '%';
								}

								//Field Label Font Size.
								$number_field_label_font_size = $form['number_field']['styles']['label_font_size_type']['size'];

								//Field Border Color.
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

								//Field Border Radius.
								$number_field_border_radius = $form['number_field']['styles']['border_radius'];

								//Field Width.
								$number_field_width = $form['number_field']['styles']['width_type']['width'];

								//Field Width Type.
								if ( $form['number_field']['styles']['width_type']['pixels'] == 1 ) {
									$number_field_width_type = 'px';
								} else if ( $form['number_field']['styles']['width_type']['percent'] == 1 ) {
									$number_field_width_type = '%';
								}
							?>
							<div class="SF_number_field_custom_style_contents SF_custom_field_style" <?php if ( $form['number_field']['styles']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
								<h3>Number Field Preview</h3>
								<div class="SF_number_field_preview"></div>
								<div class="SF_number_field_prev_btn_container SF_field_prev_btn_container">
									<span class="SF_number_field_preview_btn SF_field_preview_btn button">Preview</span>
								</div>
								<ul>
									<li>
										<label>Label Font Color:</label><br />
										<input type="text" class="SF_number_field_label_font_color SF_field_label_font_color" value="<?php echo $number_field_label_font_color; ?>" />
									</li>
									<li><label>Label Font Size:</label><br />
										<input type="number" class="SF_number_field_label_size SF_field_label_size" value="<?php echo $number_field_label_font_size; ?>" />
										<select class="SF_number_field_label_size_types SF_field_label_size_types">
											<option value="pixels" <?php if ( $form['number_field']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
											<option value="percent" <?php if ( $form['number_field']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
										</select>
									</li>
									<li>
										<label>Border Color:</label><br />
										<input type="text" class="SF_number_field_border_color SF_field_border_color" value="<?php echo $number_field_border_color; ?>" />
									</li>
									<li>
										<label>Border Size:</label><br />
										<input type="number" class="SF_number_field_border_size SF_field_border_size" value="<?php echo $number_field_border_size; ?>" />
									</li>
									<li>
										<label>Background Color:</label><br />
										<input type="text" class="SF_number_field_background_color SF_field_background_color" value="<?php echo $number_field_background_color; ?>" />
									</li>
									<li>
										<label>Font Color:</label><br />
										<input type="text" class="SF_number_field_font_color SF_field_font_color" value="<?php echo $number_field_font_color; ?>" />
									</li>
									<li>
										<label>Padding X:</label><br />
										<input type="number" class="SF_number_fields_padding_x SF_field_padding_x" value="<?php echo $number_field_padding_x; ?>" />
									</li>
									<li>
										<label>Padding Y:</label><br />
										<input type="number" class="SF_number_fields_padding_y SF_field_padding_y" value="<?php echo $number_field_padding_y; ?>" />
									</li>
									<li>
										<label>Border Radius:</label><br />
										<input type="number" class="SF_number_field_border_radius SF_field_border_radius" value="<?php echo $number_field_border_radius; ?>" />
									</li>
									<li>
										<label>Width:</label><br />
										<input type="number" class="SF_number_field_width SF_field_width" value="<?php echo $number_field_width; ?>" />
										<select class="SF_number_field_width_type SF_field_width_type">
											<option value="pixels" <?php if ( $form['number_field']['styles']['width_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
											<option value="percent" <?php if ( $form['number_field']['styles']['width_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
										</select>
									</li>
									<li>
										<label>Placeholder:</label><br />
										<input type="text" class="SF_number_field_placeholder SF_field_placeholder" value="<?php echo $number_field_placeholder; ?>"  />
									</li>
								</ul>
							</div>
						<div class="SF_number_field_validation">
							<input type="checkbox" class="SF_number_field_validation" <?php if ( $form['number_field']['validation']['enabled'] == 1 ) echo 'checked="checked"' ?> /> Enable Field Validation
						</div>

						<div class="SF_validation_contents" <?php if ( $form['number_field']['validation']['enabled'] == 1 ) { echo 'style="display: block; !important;"'; } ?>>
							<ul>
								<li>
									<label>Required Validation Message:</label><br />
									<input type="text" class="SF_number_field_validation_message" style="color: <?php echo $form['number_field']['validation']['required']['font-color']; ?>;" value="<?php echo $form['number_field']['validation']['required']['message']; ?>" />
								</li>
								<li>
									<label>Required Font Color:</label><br />
									<input type="text" class="SF_number_field_error_color" value="<?php echo $form['number_field']['validation']['required']['font-color']; ?>">
								</li>
								<li>
									<label>Minimum Character Field Length:</label><br />
									<input type="number" class="SF_number_field_min_len" value="<?php echo $form['number_field']['validation']['min_length']['length']; ?>" />
									<br /><span>To disable put zero(0) or leave blank.</span>
								</li>
								<li>
									<label>Minimum Character Field Validation Message:</label><br />
									<input type="text" class="SF_number_field_min_len_validation_message" style="color: <?php echo $form['number_field']['validation']['min_length']['font-color']; ?>;" value="<?php echo $form['number_field']['validation']['min_length']['message']; ?>" />
								</li>
								<li>
									<label>Minimum Character Field Validation Font Color:</label><br />
									<input type="text" class="SF_number_field_min_len_validation_font_color" value="<?php echo $form['number_field']['validation']['min_length']['font-color']; ?>" />
								</li>
								<li>
									<label>Maximum Character Field Length:</label><br />
									<input type="number" class="SF_number_field_max_len" value="<?php echo $form['number_field']['validation']['max_length']['length']; ?>" />
									<br /><span>To disable put zero(0) or leave blank.</span>
								</li>
								<li>
									<label>Maximum Character Field Validation Message:</label><br />
									<input type="text" class="SF_number_field_max_len_validation_message" style="color: <?php echo $form['number_field']['validation']['max_length']['font-color']; ?>;" value="<?php echo $form['number_field']['validation']['max_length']['message']; ?>" />
								</li>
								<li>
									<label>Maximum Character Field Validation Font Color:</label><br />
									<input type="text" class="SF_number_field_max_len_validation_font_color" value="<?php echo $form['number_field']['validation']['max_length']['font-color']; ?>" />
								</li>
							</ul>
						</div>

					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['email_field'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_email_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_email_input_toggle" value="<?php echo $form['email_field']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Email Field #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_email_fields_contents">
						<p>
							<label for="SF_field_email">Name:</label><br />
							<input type="text" class="SF_name_field_email" value="<?php if ( $form['email_field']['name'] ) echo $form['email_field']['name']; ?>" />
						</p>
						<p>
							<label for="SF_email_field_label">Label:</label><br />
							<input type="text" class="SF_email_field_label" value="<?php if ( $form['email_field']['label'] ) echo $form['email_field']['label']; ?>" />
						</p>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_email_field_use_theme_style" value="0" <?php if ( $form['email_field']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_email_field_use_custom_style" value="1" <?php if ( $form['email_field']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>
						<?php

							//Field Label Font Color.
							$email_field_label_font_color = $form['email_field']['styles']['label_font_color'];

							//Field Label Size Type.
							if ( $form['email_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
								$email_field_label_size_type = 'px';
							} else if ( $form['email_field']['styles']['label_font_size_type']['percent'] == 1 ) {
								$email_field_label_size_type = '%';
							}

							//Field Label Font Size.
							$email_field_label_font_size = $form['email_field']['styles']['label_font_size_type']['size'];

							//Field Border Color.
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

							//Field Width.
							$email_field_width = $form['email_field']['styles']['width_type']['width'];

							//Field Width Type.
							if ( $form['email_field']['styles']['width_type']['pixels'] == 1 ) {
								$email_field_width_type = 'px';
							} else if ( $form['email_field']['styles']['width_type']['percent'] == 1 ) {
								$email_field_width_type = '%';
							}
						?>
						<div class="SF_email_field_custom_style_contents SF_custom_field_style" <?php if ( $form['email_field']['styles']['required'] == 1 ) { echo 'style="display: block; !important;"'; } ?>>
							<h3>Email Field Preview</h3>
							<div class="SF_email_field_preview"></div>
							<div class="SF_email_field_prev_btn_container SF_field_prev_btn_container">
								<span class="SF_email_field_preview_btn SF_field_preview_btn button">Preview</span>
							</div>
							<ul>
								<li>
									<label>Label Font Color:</label><br />
									<input type="text" class="SF_email_field_label_font_color SF_field_label_font_color" value="<?php echo $email_field_label_font_color; ?>" />
								</li>
								<li><label>Label Font Size:</label><br />
									<input type="number" class="SF_email_field_label_size SF_field_label_size" value="<?php echo $email_field_label_font_size; ?>" />
									<select class="SF_email_field_label_size_types SF_field_label_size_types">
										<option value="pixels" <?php if ( $form['email_field']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
										<option value="percent" <?php if ( $form['email_field']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Border Color:</label><br />
									<input type="text" class="SF_email_field_border_color SF_field_border_color" value="<?php echo $email_field_border_color; ?>" />
								</li>
								<li>
									<label>Border Size:</label><br />
									<input type="number" class="SF_email_field_border_size SF_field_border_size" value="<?php echo $email_field_border_size; ?>" />
								</li>
								<li>
									<label>Background Color:</label><br />
									<input type="text" class="SF_email_field_background_color SF_email_background_color" value="<?php echo $email_field_background_color; ?>" />
								</li>
								<li>
									<label>Font Color:</label><br />
									<input type="text" class="SF_email_field_font_color SF_field_font_color" value="<?php echo $email_field_font_color; ?>" />
								</li>
								<li>
									<label>Padding X:</label><br />
									<input type="number" class="SF_email_fields_padding_x SF_field_padding_x" value="<?php echo $email_field_padding_x; ?>" />
								</li>
								<li>
									<label>Padding Y:</label><br />
									<input type="number" class="SF_email_fields_padding_y SF_field_padding_y" value="<?php echo $email_field_padding_y; ?>" />
								</li>
								<li>
									<label>Border Radius:</label><br />
									<input type="number" class="SF_email_field_border_radius SF_field_border_radius" value="<?php echo $form['email_field']['styles']['border_radius']; ?>" />
								</li>
								<li>
									<label>Width:</label><br />
									<input type="number" class="SF_email_field_width SF_field_width" value="<?php echo $email_field_width; ?>" />
									<select class="SF_email_field_width_type SF_field_width_type">
										<option value="pixels" <?php if ( $form['email_field']['styles']['width_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
										<option value="percent" <?php if ( $form['email_field']['styles']['width_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Placeholder:</label><br />
									<input type="text" class="SF_email_field_placeholder SF_field_placeholder" value="<?php echo $email_field_placeholder; ?>"  />
								</li>
							</ul>
						</div>
						<div class="SF_field_email_validation">
							<input type="checkbox" class="SF_email_vaidation" <?php if ( $form['email_field']['validation']['enabled'] == 1 ) echo 'checked="checked"' ?> /> Enable Field Validation.
						</div>

						<div class="SF_validation_contents" <?php if ( $form['email_field']['validation']['enabled'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
							<ul>
								<li>
									<label>Required Validation Message:</label><br />
									<input type="text" class="SF_email_field_validation_required_message" style="color: <?php echo $form['email_field']['validation']['required']['font-color']; ?>;" value="<?php echo $form['email_field']['validation']['required']['message']; ?>" />
								</li>
								<li>
									<label>Required Font Color:</label><br />
									<input type="text" class="SF_email_field_error_color" value="<?php echo $form['email_field']['validation']['required']['font-color']; ?>">
								</li>
								<li>
									<label>Invalid Email Format Message:</label><br />
									<input type="text" class="SF_email_field_validation_email_format" style="color: <?php echo $form['email_field']['validation']['invalid_format']['font-color']; ?>;" value="<?php echo $form['email_field']['validation']['invalid_format']['message']; ?>" />
								</li>
								<li>
									<label>Invalid Email Format Font Color:</label><br />
									<input type="text" class="SF_email_field_validation_email_format_font_color" value="<?php echo $form['email_field']['validation']['invalid_format']['font-color'] ?>" />
								</li>
								<li>
									<label>Minimum Character Field Length:</label><br />
									<input type="number" class="SF_email_field_min_length" value="<?php echo $form['email_field']['validation']['min_length']['length']; ?>" />
									<br /><span>To disable put zero(0) or leave blank.</span>
								</li>
								<li>
									<label>Minimum Character Field Validation Message:</label><br />
									<input type="text" class="SF_email_field_min_len_validation_message" style="color: <?php echo $form['email_field']['validation']['min_length']['font-color']; ?>;" value="<?php echo $form['email_field']['validation']['min_length']['message']; ?>" />
								</li>
								<li>
									<label>Minimum Character Field Validation Font Color:</label><br />
									<input type="text" class="SF_email_field_min_len_validation_font_color" value="<?php echo $form['email_field']['validation']['min_length']['font-color']; ?>" />
								</li>
								<li>
									<label>Maximum Character Field Length:</label><br />
									<input type="text" class="SF_email_field_max_len" value="<?php echo $form['email_field']['validation']['max_length']['length']; ?>" />
									<br /><span>To disable put zero(0) or leave blank.</span>
								</li>
								<li>
									<label>Maximum Character Field Validation Message:</label><br />
									<input type="text" class="SF_email_field_max_len_validation_message" style="color: <?php echo $form['email_field']['validation']['max_length']['font-color']; ?>;" value="<?php echo $form['email_field']['validation']['max_length']['message']; ?>" />
								</li>
								<li>
									<label>Maximum Character Field Validation Font Color:</label><br />
									<input type="text" class="SF_email_field_max_len_validation_font_color" value="<?php echo $form['email_field']['validation']['max_length']['font-color']; ?>" />
								</li>
							</ul>
						</div>

					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['dropdown_field'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_dropdown_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_dropdown_input_toggle" value="<?php echo $form['dropdown_field']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Dropdown Field #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_dropdown_fields_contents">
						<p>
							<input type="hidden" class="SF_dropdown_option_pos" value="<?php echo $c; ?>" />
							<label for="SF_field_dropdown">Name:</label><br />
							<input type="text" class="SF_name_field_dropdown" value="<?php if ( $form['dropdown_field']['name'] ) echo $form['dropdown_field']['name']; ?>" /><br />
							<label for="">Label:</label><br />
							<input type="text" class="SF_label_field_dropdown" value="<?php if ( $form['dropdown_field']['label'] ) echo $form['dropdown_field']['label']; ?>" /><br />
							<input type="button" class="SF_dropdown_add" value="Add Option" />
						</p>
						<div class="SF_dropdown_attr"></div>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_dropdown_field_use_theme_style" value="0" <?php if ( $form['dropdown_field']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_dropdown_field_use_custom_style" value="1" <?php if ( $form['dropdown_field']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>
							<?php

								//Field Label Font Color.
								$dropdown_field_label_font_color = $form['dropdown_field']['styles']['label_font_color'];

								//Field Label Size Type.
								if ( $form['dropdown_field']['styles']['label_font_size_type']['pixels'] == 1 ) {
									$dropdown_field_label_size_type = 'px';
								} else if ( $form['dropdown_field']['styles']['label_font_size_type']['percent'] == 1 ) {
									$dropdown_field_label_size_type = '%';
								}

								//Field Label Font Size.
								$dropdown_field_label_font_size = $form['dropdown_field']['styles']['label_font_size_type']['size'];

								//Field Border Color.
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

								//Field Border Radius
								$dropdown_field_border_radius = $form['dropdown_field']['styles']['border_radius'];

								//Field Width.
								$dropdown_field_width = $form['dropdown_field']['styles']['width_type']['width'];

								//Field Width Type.
								if ( $form['dropdown_field']['styles']['width_type']['pixels'] == 1 ) {
									$dropdown_field_width_type = 'px';
								} else if ( $form['dropdown_field']['styles']['width_type']['percent'] == 1 ) {
									$dropdown_field_width_type = '%';
								}
							?>
							<div class="SF_dropdown_field_custom_style_contents SF_custom_field_style" <?php if ( $form['dropdown_field']['styles']['required'] == 1 ) { echo 'style="display: block; !important;"';  } ?>>
								<h3>Dropdown Field Preview</h3>
								<div class="dropdown_field_preview"></div>
								<div class="SF_dropdown_field_prev_btn_container SF_field_prev_btn_container">
									<span class="SF_dropdown_field_preview_btn SF_field_preview_btn button">Preview</span>
								</div>
								<ul>
									<li>
										<label>Label Font Color:</label><br />
										<input type="text" class="SF_dropdown_field_label_font_color SF_field_label_font_color" value="<?php echo $dropdown_field_label_font_color; ?>" />
									</li>
									<li><label>Label Font Size:</label><br />
										<input type="number" class="SF_dropdown_field_label_size SF_field_label_size" value="<?php echo $dropdown_field_label_font_size; ?>" />
										<select class="SF_dropdown_field_label_size_types SF_field_label_size_types">
											<option value="pixels" <?php if ( $form['dropdown_field']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
											<option value="percent" <?php if ( $form['dropdown_field']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
										</select>
									</li>
									<li>
										<label>Border Color:</label><br />
										<input type="text" class="SF_dropdown_field_border_color SF_field_border_color" value="<?php echo $dropdown_field_border_color; ?>" />
									</li>
									<li>
										<label>Border Size:</label><br />
										<input type="number" class="SF_dropdown_field_border_size SF_field_border_size" value="<?php echo $dropdown_field_border_size; ?>" />
									</li>
									<li>
										<label>Background Color:</label><br />
										<input type="text" class="SF_dropdown_field_background_color SF_email_background_color" value="<?php echo $dropdown_field_background_color; ?>" />
									</li>
									<li>
										<label>Font Color:</label><br />
										<input type="text" class="SF_dropdown_field_font_color SF_field_font_color" value="<?php echo $dropdown_field_font_color; ?>" />
									</li>
									<li>
										<label>Padding X:</label><br />
										<input type="number" class="SF_dropdown_fields_padding_x SF_field_padding_x" value="<?php echo $dropdown_field_padding_x; ?>" />
									</li>
									<li>
										<label>Padding Y:</label><br />
										<input type="number" class="SF_dropdown_fields_padding_y SF_field_padding_y" value="<?php echo $dropdown_field_padding_y; ?>" />
									</li>
									<li>
										<label>Border Radius:</label><br />
										<input type="number" class="SF_dropdown_field_border_radius SF_field_border_radius" value="<?php echo $dropdown_field_border_radius; ?>" />
									</li>
									<li>
										<label>Width:</label><br />
										<input type="number" class="SF_dropdown_field_width SF_field_width" value="<?php echo $dropdown_field_width; ?>" />
										<select class="SF_dropdown_field_width_type SF_field_width_type">
											<option value="pixels" <?php if ( $form['dropdown_field']['styles']['width_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
											<option value="percent" <?php if ( $form['dropdown_field']['styles']['width_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
										</select>
									</li>
								</ul>
							</div>
						<div class="SF_field_dropdown_validation">
							<input type="checkbox" class="SF_dropdown_required" <?php if ( $form['dropdown_field']['validation']['required'] == 1 ) echo 'checked="checked"' ?> /> Required.
						</div>
							<div class="SF_validation_contents" <?php if ( $form['dropdown_field']['validation']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
								<ul>
									<li>
										<label>Validation Message:</label>
										<input type="text" class="SF_dropdown_field_validation_message" style="color: <?php echo $form['dropdown_field']['validation']['font-color']; ?>;" value="<?php echo $form['dropdown_field']['validation']['message']; ?>" />
									</li>
									<li>
										<label>Font Color:</label><br />
										<input type="text" class="SF_dropdown_field_error_color" value="<?php echo $form['dropdown_field']['validation']['font-color']; ?>">
									</li>
								</ul>
							</div>
					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['radio_button'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_radio_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_radio_input_toggle" value="<?php echo $form['radio_button']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Radio Button #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_radio_fields_contents">
						<p>
							<input type="hidden" class="SF_radio_pos" value="<?php echo $c ?>" />
							<label for="SF_name_field_radio">Name:</label><br />
							<input type="text" class="SF_name_field_radio" value="<?php if ( $form['radio_button']['name'] ) echo $form['radio_button']['name']; ?>" /><br />
							<label for="SF_radio_main_label">Label:</label><br />
							<input type="text" class="SF_radio_main_label" value="<?php if ( $form['radio_button']['label'] ) echo $form['radio_button']['label'] ?>" />
						</p>
						<div class="SF_radio_contents">
							<input type="button" class="SF_add_radio" value="Add Radio Button" />
							<div class="SF_radio_attr"></div>
						</div>
						<div class="SF_radio_display_contents">
							<label>Bullet Display:</label><br />
							<ul>
								<li>
									<input type="radio" name="SF_bullet_display_<?php echo $c; ?>"  class="SF_radio_field_horizontal" value="horizontal" <?php if ( $form['radio_button']['display'] == 'horizontal' ) echo 'checked="checked"'; ?> /> Horizontal
								</li>
								<li>
									<input type="radio" name="SF_bullet_display_<?php echo $c; ?>" class="SF_radio_field_vertical" value="vertical" <?php if ( $form['radio_button']['display'] == 'vertical' ) echo 'checked="checked"'; ?> /> Vertical
								</li>
							</ul>
						</div>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_radio_field_use_theme_style" value="0" <?php if ( $form['radio_button']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_radio_field_use_custom_style" value="1" <?php if ( $form['radio_button']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>
							<?php

								//Field Label Font Color.
								$radio_field_label_font_color = $form['radio_button']['styles']['label_font_color'];

								//Field Label Size Type.
								if ( $form['radio_button']['styles']['label_font_size_type']['pixels'] == 1 ) {
									$radio_field_label_size_type = 'px';
								} else if ( $form['radio_button']['styles']['label_font_size_type']['percent'] == 1 ) {
									$radio_field_label_size_type = '%';
								}

								//Field Label Font Size.
								$radio_field_label_font_size = $form['radio_button']['styles']['label_font_size_type']['size'];

								//Field Border Color.
								$radio_field_border_color = $form['radio_button']['styles']['border_color'];

								//Bullet Color.
								$radio_field_bullet_color = $form['radio_button']['styles']['bullet_color'];

								//Field Background Color.
								$radio_field_background_color = $form['radio_button']['styles']['background_color'];

								//Field Font Color.
								$radio_field_font_color = $form['radio_button']['styles']['font-color'];

							?>
							<div class="SF_radio_field_custom_style_contents SF_custom_field_style" <?php if ( $form['radio_button']['styles']['required'] == 1  ) { echo 'style="display: block !important;"'; } ?>>
								<div class="radio_field_preview"></div>
								<h3>Radio Field Preview</h3>

								<div class="SF_radio_field_prev_btn_container SF_field_prev_btn_container">
									<span class="SF_radio_field_preview_btn SF_field_preview_btn button">Preview</span>
								</div>
								<ul>
									<li>
										<label>Label Font Color:</label><br />
										<input type="text" class="SF_radio_field_label_font_color SF_field_label_font_color" value="<?php echo $radio_field_label_font_color; ?>" />
									</li>
									<li><label>Label Font Size:</label><br />
										<input type="number" class="SF_radio_field_label_size SF_field_label_size" value="<?php echo $radio_field_label_font_size; ?>" />
										<select class="SF_radio_field_label_size_types SF_field_label_size_types">
											<option value="pixels" <?php if ( $form['radio_button']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
											<option value="percent" <?php if ( $form['radio_button']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
										</select>
									</li>
									<li>
										<label>Border Color:</label><br />
										<input type="text" class="SF_radio_field_border_color SF_field_border_color" value="<?php echo $radio_field_border_color; ?>" />
									</li>
									<li>
										<label>Bullet Color:</label><br />
										<input type="text" class="SF_radio_field_bullet_color SF_field_bullet_color" value="<?php echo $radio_field_bullet_color; ?>" />
									</li>
									<li>
										<label>Background Color:</label><br />
										<input type="text" class="SF_radio_field_background_color SF_email_background_color" value="<?php echo $radio_field_background_color; ?>" />
									</li>
									<li>
										<label>Font Color:</label><br />
										<input type="text" class="SF_radio_field_font_color SF_field_font_color" value="<?php echo $radio_field_font_color; ?>" />
									</li>
								</ul>
							</div>
					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['checkbox'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_checkbox_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_checkbox_input_toggle" value="<?php echo $form['checkbox']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Checkbox #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_checkbox_fields_contents">
						<p>
							<label for="SF_field_checkbox">Name:</label><br />
							<input type="text" class="SF_name_field_checkbox" value="<?php if ( $form['checkbox']['name'] ) echo $form['checkbox']['name']; ?>" /><br />
							<label for="SF_field_checkbox_label">Label</label><br />
							<input type="text" class="SF_checkbox_label" value="<?php if ( $form['checkbox']['label'] ) echo $form['checkbox']['label']; ?>" />
						</p>
						<div class="SF_checkbox_chk_container">
							<input type="button" class="SF_add_checkbox" value="Add Checkbox" />
							<div class="SF_checkbox_attr"></div>

						</div>
						<div class="SF_checkbox_header_opt">
							<label>Header Display (Label):</label><br />
							<ul>
								<li>
									<input type="radio" name="SF_checkbox_header_<?php echo $c; ?>" class="SF_checbox_header_hide" value="1" <?php if ( $form['checkbox']['hide_header'] == 1 ) echo 'checked="checked"' ?> /> Hide Header
								</li>
								<li>
									<input type="radio" name="SF_checkbox_header_<?php echo $c; ?>" class="SF_checbox_header_show" value="0" <?php if ( $form['checkbox']['hide_header'] == 0 ) echo 'checked="checked"' ?> /> Show Header
								</li>
							</ul>
						</div>
						<div class="SF_checkbox_display_contents">
							<label>Checkbox Display:</label><br />
							<ul>
								<li>
									<input type="radio" name="SF_checkbox_display_<?php echo $c; ?>"  class="SF_checkbox_field_horizontal" value="horizontal" <?php if ( $form['checkbox']['display'] == 'horizontal' ) echo 'checked="checked"'; ?> /> Horizontal
								</li>
								<li>
									<input type="radio" name="SF_checkbox_display_<?php echo $c; ?>" class="SF_checkbox_field_vertical" value="vertical" <?php if ( $form['checkbox']['display'] == 'vertical' ) echo 'checked="checked"'; ?> /> Vertical
								</li>
							</ul>
						</div>
						<div class="SF_field_name_styling">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_checkbox_field_use_theme_style" value="0" <?php if ( $form['checkbox']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_checkbox_field_use_custom_style" value="1" <?php if ( $form['checkbox']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>
							<?php

								//Field Label Font Color.
								$checkbox_field_label_font_color = $form['checkbox']['styles']['label_font_color'];

								//Field Label Size Type.
								if ( $form['checkbox']['styles']['label_font_size_type']['pixels'] == 1 ) {
									$checkbox_field_label_size_type = 'px';
								} else if ( $form['checkbox']['styles']['label_font_size_type']['percent'] == 1 ) {
									$checkbox_field_label_size_type = '%';
								}

								//Field Label Font Size.
								$checkbox_field_label_font_size = $form['checkbox']['styles']['label_font_size_type']['size'];

								//Field Border Color.
								$checkbox_field_border_color = $form['checkbox']['styles']['border_color'];

								//Field Check Color.
								$checkbox_field_check_color = $form['checkbox']['styles']['check_color'];

								//Field Background Color.
								$checkbox_field_background_color = $form['checkbox']['styles']['background_color'];

								//Field Font Color.
								$checkbox_field_font_color = $form['checkbox']['styles']['font-color'];
							?>
							<div class="SF_checkbox_field_custom_style_contents SF_custom_field_style" <?php if ( $form['checkbox']['styles']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
							<div class="SF_checkbox_preview"></div>
							<div class="SF_checkbox_field_prev_btn_container SF_field_prev_btn_container">
								<span class="SF_checkbox_field_preview_btn SF_field_preview_btn button">Preview</span>
							</div>
							<ul>
								<?php if ( $form['checkbox']['hide_header'] == 0 ): ?>
									<li>
										<label>Label Font Color:</label><br />
										<input type="text" class="SF_checkbox_field_label_font_color SF_field_label_font_color" value="<?php echo $checkbox_field_label_font_color; ?>" />
									</li>
									<li><label>Label Font Size:</label><br />
										<input type="number" class="SF_checkbox_field_label_size SF_field_label_size" value="<?php echo $checkbox_field_label_font_size; ?>" />
										<select class="SF_checkbox_field_label_size_types SF_field_label_size_types">
											<option value="pixels" <?php if ( $form['checkbox']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
											<option value="percent" <?php if ( $form['checkbox']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
										</select>
									</li>
								<?php endif; ?>
								<li>
									<label>Border Color:</label><br />
									<input type="text" class="SF_checkbox_field_border_color SF_field_border_color" value="<?php echo $checkbox_field_border_color; ?>" />
								</li>
								<li>
									<label>Background Color:</label><br />
									<input type="text" class="SF_checkbox_field_background_color SF_background_color" value="<?php echo $checkbox_field_background_color; ?>" />
								</li>
								<li>
									<label>Check Sign Color:</label><br />
									<input type="text" class="SF_checkbox_field_check_color SF_check_color" value="<?php echo $checkbox_field_check_color; ?>" />
								</li>
								<li>

									<label>Font Color:</label><br />
									<input type="text" class="SF_checkbox_field_font_color SF_field_font_color" value="<?php echo $checkbox_field_font_color; ?>" />
								</li>
							</ul>
						</div>
						<div class="SF_field_name_validation">
							<input type="checkbox" class="SF_checkbox_required" <?php if ( $form['checkbox']['validation']['required'] == 1 ) echo 'checked="checked"' ?> /> Required.
						</div>

							<div class="SF_validation_contents" <?php if ( $form['checkbox']['validation']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
								<ul>
									<li>
										<label>Validation Message:</label>
										<input type="text" class="SF_checkbox_field_validation_message" style="color: <?php echo $form['checkbox']['validation']['font-color']; ?>;" value="<?php echo $form['checkbox']['validation']['message']; ?>" />
									</li>
									<li>
										<label>Font Color:</label><br />
										<input type="text" class="SF_checkbox_field_error_color" value="<?php echo $form['checkbox']['validation']['font-color']; ?>">
									</li>
								</ul>
							</div>

					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['textarea'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_textarea_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_textarea_input_toggle" value="<?php echo $form['textarea']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Textarea #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_textarea_fields_contents">
						<p>
							<label for="SF_field_textarea">Name:</label><br />
							<input type="text" class="SF_name_field_textarea" value="<?php if ( $form['textarea']['name'] ) echo $form['textarea']['name']; ?>" />
						</p>
						<p>
							<label for="">Label:</label><br />
							<input type="text" class="SF_field_textarea_label" value="<?php if ( $form['textarea']['label'] ) echo $form['textarea']['label']; ?>" />
						</p>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_textarea_field_use_theme_style" value="0" <?php if ( $form['textarea']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_textarea_field_use_custom_style" value="1" <?php if ( $form['textarea']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>
						<?php

							//Field Label Font Color.
							$textarea_field_label_font_color = $form['textarea']['styles']['label_font_color'];

							//Field Label Size Type.
							if ( $form['textarea']['styles']['label_font_size_type']['pixels'] == 1 ) {
								$textarea_field_label_size_type = 'px';
							} else if ( $form['textarea']['styles']['label_font_size_type']['percent'] == 1 ) {
								$textarea_field_label_size_type = '%';
							}

							//Field Label Font Size.
							$textarea_field_label_font_size = $form['textarea']['styles']['label_font_size_type']['size'];

							//Field Border Color.
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

							//Field Border Radius.
							$textarea_field_border_radius = $form['textarea']['styles']['border_radius'];

							//Field Placeholder.
							$textarea_field_placeholder = $form['textarea']['styles']['placeholder'];

							//Field Width.
							$textarea_field_width = $form['textarea']['styles']['width_type']['width'];

							//Field Height.
							$textarea_field_height = $form['textarea']['styles']['height_type']['height'];

							//Field Width Type.
							if ( $form['textarea']['styles']['width_type']['pixels'] == 1 ) {
								$textarea_field_width_type = 'px';
							} else if ( $form['textarea']['styles']['width_type']['percent'] == 1 ) {
								$textarea_field_width_type = '%';
							}

							//Field Height Type.
							if ( $form['textarea']['styles']['height_type']['pixels'] == 1 ) {
								$textarea_field_height_type = 'px';
							} else if ( $form['textarea']['styles']['height_type']['percent'] == 1 ) {
								$textarea_field_height_type = '%';
							}
						?>
						<div class="SF_textarea_field_custom_style_contents SF_custom_field_style" <?php if ( $form['textarea']['styles']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
							<h3>Textarea Field Preview</h3>
							<div class="textarea_field_preview"></div>
							<div class="SF_textarea_field_prev_btn_container SF_field_prev_btn_container">
								<span class="SF_textarea_field_preview_btn SF_field_preview_btn button">Preview</span>
							</div>
							<ul>
								<li>
									<label>Label Font Color:</label><br />
									<input type="text" class="SF_textarea_field_label_font_color SF_field_label_font_color" value="<?php echo $textarea_field_label_font_color; ?>" />
								</li>
								<li>
									<label>Label Font Size:</label><br />
									<input type="number" class="SF_textarea_field_label_size SF_field_label_size" value="<?php echo $textarea_field_label_font_size; ?>" />
									<select class="SF_textarea_field_label_size_types SF_field_label_size_types">
										<option value="pixels" <?php if ( $form['textarea']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
										<option value="percent" <?php if ( $form['textarea']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Border Color:</label><br />
									<input type="text" class="SF_textarea_field_border_color SF_border_color" value="<?php echo $textarea_field_border_color; ?>" />
								</li>
								<li>
									<label>Border Size:</label><br />
									<input type="number" class="SF_textarea_field_border_size SF_field_border_size" value="<?php echo $textarea_field_border_size; ?>" />
								</li>
								<li>
									<label>Background Color:</label><br />
									<input type="text" class="SF_textarea_field_background_color SF_background_color" value="<?php echo $textarea_field_background_color; ?>" />
								</li>
								<li>
									<label>Font Color:</label><br />
									<input type="text" class="SF_textarea_field_font_color SF_field_font_color" value="<?php echo $textarea_field_font_color; ?>" />
								</li>
								<li>
									<label>Padding X:</label><br />
									<input type="number" class="SF_textarea_fields_padding_x SF_field_padding_x" value="<?php echo $textarea_field_padding_x; ?>" />
								</li>
								<li>
									<label>Padding Y:</label><br />
									<input type="number" class="SF_textarea_fields_padding_y SF_field_padding_y" value="<?php echo $textarea_field_padding_y; ?>" />
								</li>
								<li>
									<label>Border Radius:</label><br />
									<input type="text" class="SF_textarea_fields_border_radius SF_field_border_radius" value="<?php echo $textarea_field_border_radius; ?>" />
								</li>
								<li>
									<label>Width:</label><br />
									<input type="number" class="SF_textarea_field_width SF_field_width" value="<?php echo $textarea_field_width; ?>" />
									<select class="SF_textarea_field_width_type SF_field_width_type">
										<option value="pixels" <?php if ( $form['textarea']['styles']['width_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
										<option value="percent" <?php if ( $form['textarea']['styles']['width_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Height:</label><br />
									<input type="number" class="SF_textarea_field_height SF_field_width" value="<?php echo $textarea_field_height; ?>" />
									<select class="SF_textarea_field_height_type SF_field_height_type">
										<option value="pixels" <?php if ( $form['textarea']['styles']['height_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
										<option value="percent" <?php if ( $form['textarea']['styles']['height_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Placeholder:</label><br />
									<input type="text" class="SF_textarea_field_placeholder SF_field_placeholder" value="<?php echo $textarea_field_placeholder; ?>"  />
								</li>
							</ul>
						</div>
						<div class="SF_field_name_validation">
							<input type="checkbox" class="SF_textarea_validation" <?php if ( $form['textarea']['validation']['enabled'] == 1 ) echo 'checked="checked"'; ?> /> Enable Field Validation.
						</div>

							<div class="SF_validation_contents" <?php if ( $form['textarea']['validation']['enabled'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
								<ul>
									<li>
										<label>Required Validation Message:</label>
										<input type="text" class="SF_textarea_field_validation_required_message" style="color: <?php echo $form['textarea']['validation']['required']['font-color']; ?>;" value="<?php echo $form['textarea']['validation']['required']['message']; ?>" />
									</li>
									<li>
										<label>Required Font Color:</label><br />
										<input type="text" class="SF_textarea_field_required_font_color" value="<?php echo $form['textarea']['validation']['required']['font-color']; ?>">
									</li>
									<li>
										<label>Minimum Character Field Length:</label><br />
										<input type="number" class="SF_textarea_field_min_len" value="<?php echo $form['textarea']['validation']['min_length']['length']; ?>" />
										<br /><span>To disable put zero(0) or leave blank.</span>
									</li>
									<li>
										<label>Minimum Characer Field Validation Message:</label><br />
										<input type="text" class="SF_textarea_field_min_len_validation_message" style="color: <?php echo $form['textarea']['validation']['min_length']['font-color']; ?>" value="<?php echo $form['textarea']['validation']['min_length']['message']; ?>" />
									</li>
									<li>
										<label>Minimum Character Field Validation Font Color:</label><br />
										<input type="text" class="SF_textarea_min_len_validation_font_color" value="<?php echo $form['textarea']['validation']['min_length']['font-color']; ?>" />
									</li>
									<li>
										<label>Maximum Character Field Length:</label><br />
										<input type="text" class="SF_textarea_max_len" value="<?php echo $form['textarea']['validation']['max_length']['length']; ?>" />
										<br /><span>To disable put zero(0) or leave blank.</span>
									</li>
									<li>
										<label>Maximum Character Field Validation Message:</label><br />
										<input type="text" class="SF_textarea_max_len_validation_message" style="color: <?php echo $form['textarea']['validation']['max_length']['font-color']; ?>;" value="<?php echo $form['textarea']['validation']['max_length']['message']; ?>" />
									</li>
									<li>
										<label>Maximum Character Field Validation Font Color:</label><br />
										<input type="text" class="SF_textarea_max_len_validation_font_color" value="<?php echo $form['textarea']['validation']['max_length']['font-color']; ?>" />
									</li>
								</ul>
							</div>

					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['file_attachments'] ): ?>
				<?php
					//Max Post Size.
					$max_upload_size = ini_get('post_max_size');

					//Remove M Last Character.
					$max_upload_size = chop( $max_upload_size, 'M' );

					//Convert MB to KB.
					$max_upload_size = $max_upload_size * 1024;
				?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_fa_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_fa_input_toggle" value="<?php echo $form['file_attachments']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">File Attachment #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_fa_fields_contents">
						<p>
							<label for="SF_file_attachment_name">Name:</label><br />
							<input type="text" class="SF_file_attachment_name" value="<?php if ( $form['file_attachments']['name'] ) echo $form['file_attachments']['name']; ?>" />
						</p>
						<p>
							<label for="SF_file_attachment_label">Label:</label><br />
							<input type="text" class="SF_file_attachment_label" value="<?php if ( $form['file_attachments']['label'] ) echo $form['file_attachments']['label']; ?>" />
						</p>
						<div class="SF_file_attachments_validation">
							<ul>
								<li>
									<label for="SF_file_attachment_file_size">Max File Size (kb):</label><br />
									<input type="number" class="SF_file_attachment_file_size" value="<?php if ( $form['file_attachments']['max_size'] ) echo $form['file_attachments']['max_size']; ?>" />
									<br /><label>Server PHP Post Max Size is <?php echo $max_upload_size; ?> KB.</label>
								</li>
								<li>
									<label>File Types Extension Allowed (Ex. doc pdf jpg and etc):</label><br />
									<span>File extension allowed should be sperarated by comas. Ex (doc,pdf,jpg) Leaving this field blank means all file types are allowed.</span><br />
									<input type="text" class="SF_file_attachment_file_types" value="<?php if ( $form['file_attachments']['file_types'] ) echo $form['file_attachments']['file_types']; ?>" />
								</li>
							</ul>
							<div class="SF_file_attachment_progress_layout">
								<div class="SF_progress_preview">
									<h4>Upload Progress Bar Preview</h4>
									<div class="SF_upload_container">
						        <span class="SF_upload_filename_label" style="color: <?php echo $form['file_attachments']['progress_bar_layout']['filename_color']; ?>;">Uploading SampleFile.mp4</span>
						        <div class="SF_upload_progress" style="border: 1px solid <?php echo $form['file_attachments']['progress_bar_layout']['border_color']; ?>; background-color: <?php echo $form['file_attachments']['progress_bar_layout']['background_color']; ?>;">
						          <div class="SF_progress_percent" style="color: <?php echo $form['file_attachments']['progress_bar_layout']['font-color']; ?>">70%</div>
						          <div class="SF_progress" style="background-color: <?php echo $form['file_attachments']['progress_bar_layout']['progress_color']; ?>;"></div>
						        </div>
						      </div>
						      <div class="SF_upload_success SF_upload_suc"></div>
								</div>
								<ul>
									<li>
										<label>Border Color:</label>
										<input type="text" class="SF_fa_border_color" value="<?php echo $form['file_attachments']['progress_bar_layout']['border_color']; ?>" />
									</li>
									<li>
										<label>Background Color:</label>
										<input type="text" class="SF_fa_background_color" value="<?php echo $form['file_attachments']['progress_bar_layout']['background_color']; ?>" />
									</li>
									<li>
										<label>Font Color:</label>
										<input type="text" class="SF_fa_font_color" value="<?php echo $form['file_attachments']['progress_bar_layout']['font-color']; ?>" />
									</li>
									<li>
										<label>Progress Color:</label>
										<input type="text" class="SF_fa_progress_color" value="<?php echo $form['file_attachments']['progress_bar_layout']['progress_color']; ?>" />
									</li>
									<li>
										<label>Filename Font Color:</label>
										<input type="text" class="SF_fa_filename_color" value="<?php echo $form['file_attachments']['progress_bar_layout']['filename_color']; ?>" />
									</li>
								</ul>
								<div class="SF_fa_error_message">
									<h4 class="SF_fa_error_message_preview">Error Message Notification</h4>
									<label>File Size Error Preview:</label><br />
									<span class="SF_fa_error_file_size_preview" style="color: <?php echo $form['file_attachments']['error_message']['font-color']; ?>;"><?php echo $form['file_attachments']['error_message']['file_size']; ?></span><br />
									<label>File Type Error:</label><br />
									<span class="SF_fa_error_file_type_preview" style="color: <?php echo $form['file_attachments']['error_message']['font-color']; ?>;"><?php echo $form['file_attachments']['error_message']['file_type']; ?></span>
									<ul>
										<li>
											<label>File Size Error Message:</label><br />
											<input type="text" class="SF_file_size_error_message" value="<?php echo $form['file_attachments']['error_message']['file_size']; ?>" />
										</li>
										<li>
											<label>File Type Error Message:</label><br />
											<input type="text" class="SF_file_type_error_message" value="<?php echo $form['file_attachments']['error_message']['file_type']; ?>" />
										</li>
										<li>
											<label>File Error Message Font Color:</label><br />
											<input type="text" class="SF_file_error_font_color" value="<?php echo $form['file_attachments']['error_message']['font-color']; ?>" />
										</li>
									</ul>
								</div>
								<div class="SF_fa_success_message">
									<div class="SF_fa_afer_upload_message_preview">
										<h4>Message after file upload</h4>
										<label>Success Message:</label><br />
										<span style="color: <?php echo $form['file_attachments']['success_message_settings']['font-color']; ?>;"><?php echo $form['file_attachments']['success_message_settings']['message']; ?></span>
									</div>
									<ul>
										<li>
											<label>Success Message:</label><br />
											<input type="text" class="SF_fa_after_upload_message" value="<?php echo $form['file_attachments']['success_message_settings']['message']; ?>" />
										</li>
										<li>
											<label>Message Font Color:</label><br />
											<input type="text" class="SF_fa_after_upload_font_color" value="<?php echo $form['file_attachments']['success_message_settings']['font-color']; ?>" />
										</li>
									</ul>
								</div>
							</div>
							<div class="SF_field_name_styling_radio">
								<ul>
									<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_fa_field_use_theme_style" value="0" <?php if ( $form['file_attachments']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
									<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_fa_field_use_custom_style" value="1" <?php if ( $form['file_attachments']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
								</ul>
							</div>
								<?php

									//Field Label Font Color.
									$fa_field_label_font_color = $form['file_attachments']['styles']['label_font_color'];

									//Field Label Size Type.
									if ( $form['file_attachments']['styles']['label_font_size_type']['pixels'] == 1 ) {
										$fa_field_label_size_type = 'px';
									} else if ( $form['file_attachments']['styles']['label_font_size_type']['percent'] == 1 ) {
										$fa_field_label_size_type = '%';
									}

									//Field Label Font Size.
									$fa_field_label_font_size = $form['file_attachments']['styles']['label_font_size_type']['size'];

									//Field Border Color.
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

									//Field Width.
									$fa_field_width = $form['file_attachments']['styles']['width_type']['width'];

									//Field Height.
									$fa_field_height = $form['file_attachments']['styles']['height_type']['height'];

									//Field Width Type.
									if ( $form['file_attachments']['styles']['width_type']['pixels'] == 1 ) {
										$fa_field_width_type = 'px';
									} else if ( $form['file_attachments']['styles']['width_type']['percent'] == 1 ) {
										$fa_field_width_type = '%';
									}
								?>
								<div class="SF_fa_field_custom_style_contents SF_custom_field_style" <?php if ( $form['file_attachments']['styles']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
									<h3>File Attachment Field Preview</h3>
									<div class="SF_fa_preview"></div>
									<div class="SF_fa_field_prev_btn_container SF_field_prev_btn_container">
										<span class="SF_fa_field_preview_btn SF_field_preview_btn button">Preview</span>
									</div>
									<ul>
										<li>
											<label>Label Font Color:</label><br />
											<input type="text" class="SF_fa_field_label_font_color SF_field_label_font_color" value="<?php echo $fa_field_label_font_color; ?>" />
										</li>
										<li>
											<label>Label Font Size:</label><br />
											<input type="number" class="SF_fa_field_label_size SF_field_label_size" value="<?php echo $fa_field_label_font_size; ?>" />
											<select class="SF_fa_field_label_size_types SF_field_label_size_types">
												<option value="pixels" <?php if ( $form['file_attachments']['styles']['label_font_size_type']['pixels'] == 1 ) echo 'selected'; ?>>Pixels</option>
												<option value="percent" <?php if ( $form['file_attachments']['styles']['label_font_size_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
											</select>
										</li>
										<li>
											<label>Border Color:</label><br />
											<input type="text" class="SF_fa_field_border_color SF_border_color" value="<?php echo $fa_field_border_color; ?>" />
										</li>
										<li>
											<label>Border Size:</label><br />
											<input type="number" class="SF_fa_field_border_size SF_field_border_size" value="<?php echo $fa_field_border_size; ?>" />
										</li>
										<li>
											<label>Background Color:</label><br />
											<input type="text" class="SF_fa_field_background_color SF_background_color" value="<?php echo $fa_field_background_color; ?>" />
										</li>
										<li>
											<label>Font Color:</label><br />
											<input type="text" class="SF_fa_field_font_color SF_field_font_color" value="<?php echo $fa_field_font_color; ?>" />
										</li>
										<li>
											<label>Padding X:</label><br />
											<input type="number" class="SF_fa_fields_padding_x SF_field_padding_x" value="<?php echo $fa_field_padding_x; ?>" />
										</li>
										<li>
											<label>Padding Y:</label><br />
											<input type="number" class="SF_fa_fields_padding_y SF_field_padding_y" value="<?php echo $fa_field_padding_y; ?>" />
										</li>
										<li>
											<label>Width:</label><br />
											<input type="number" class="SF_fa_field_width SF_field_width" value="<?php echo $fa_field_width; ?>" />
											<select class="SF_fa_field_width_type SF_field_width_type">
												<option value="pixels" <?php if ( $form['file_attachments']['styles']['width_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
												<option value="percent" <?php if ( $form['file_attachments']['styles']['width_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
											</select>
										</li>
									</ul>
								</div>
							<div class="SF_field_name_validation">
								<input type="checkbox" class="SF_file_attachment_required" <?php if ( $form['file_attachments']['validation']['required'] == 1 ) echo 'checked="checked"'; ?> /> Required.
							</div>

							<div class="SF_validation_contents" <?php if ( $form['file_attachments']['validation']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
								<ul>
									<li>
										<label>Validation Message:</label>
										<input type="text" class="SF_fa_field_validation_message" style="color: <?php echo $form['file_attachments']['validation']['font-color']; ?>;" value="<?php echo $form['file_attachments']['validation']['message']; ?>" />
									</li>
									<li>
										<label>Font Color:</label><br />
										<input type="text" class="SF_fa_field_error_color" value="<?php echo $form['file_attachments']['validation']['font-color']; ?>">
									</li>
								</ul>
							</div>

						</div>
					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['captcha'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_captcha_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_captcha_input_toggle" value="<?php echo $form['captcha']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Captcha #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_captcha_fields_contents">
						<p>
							<label for="SF_captcha_field_length">String Length:</label><br />
							<input type="number" class="SF_captcha_field_length" value="<?php if ( $form['captcha']['length'] ) echo $form['captcha']['length']; ?>" />
						</p>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_captcha_field_use_theme_style" value="0" <?php if ( $form['captcha']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_captcha_field_use_custom_style" value="1" <?php if ( $form['captcha']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>


						</div>
						<?php

							//Field Background Color.
							$captcha_background_color = $form['captcha']['styles']['captcha_background_color'];

							//Field Font Color.
							$captcha_font_color = $form['captcha']['styles']['captcha_font-color'];

							//Captcha Line Color.
							$captcha_line_color = $form['captcha']['styles']['captcha_line_color'];

							//Field Border Color.
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

							//Field Width.
							$captcha_field_width = $form['captcha']['styles']['width_type']['width'];

							//Field Placeholder.
							$captcha_field_placeholder = $form['captcha']['styles']['placeholder'];

							//Field Width Types.
							if ( $form['captcha']['styles']['width_type']['pixels'] == 1 ) {
								$captcha_field_width_type = 'px';
							} else if ( $form['captcha']['styles']['width_type']['percent'] == 1 ) {
								$captcha_field_width_type = '%';
							}
						?>
						<div class="SF_fa_field_custom_style_contents SF_custom_field_style" <?php if ( $form['captcha']['styles']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
							<h3>Captcha Field Preview</h3>
							<div class="SF_captcha_preivew"></div>
							<div class="SF_captcha_field_prev_btn_container SF_field_prev_btn_container">
								<span class="SF_captcha_field_preview_btn SF_field_preview_btn button">Preview</span>
							</div>
							<ul>
								<li>
									<label>Captcha Background Color:</label><br />
									<input type="text" class="SF_captcha_background_color" value="<?php echo $captcha_background_color; ?>" />
									<br /><label>(RGB colors only)</label>
								</li>
								<li>
									<label>Captcha Font Color:</label><br />
									<input type="text" class="SF_captcha_font_color" value="<?php echo $captcha_font_color; ?>" />
									<br /><label>(RGB colors only)</label>
								</li>
								<li>
									<label>Captcha Line Color:</label><br />
									<input type="text" class="SF_captcha_line_color" value="<?php echo $captcha_line_color; ?>" />
									<br /><label>(RGB colors only)</label>
								</li>
								<li>
									<label>Border Color:</label><br />
									<input type="text" class="SF_captcha_field_border_color SF_border_color" value="<?php echo $captcha_field_border_color; ?>" />
								</li>
								<li>
									<label>Border Size:</label><br />
									<input type="number" class="SF_captcha_field_border_size SF_field_border_size" value="<?php echo $captcha_field_border_size; ?>" />
								</li>
								<li>
									<label>Background Color:</label><br />
									<input type="text" class="SF_captcha_field_background_color SF_background_color" value="<?php echo $captcha_field_background_color; ?>" />
								</li>
								<li>
									<label>Font Color:</label><br />
									<input type="text" class="SF_captcha_field_font_color SF_field_font_color" value="<?php echo $captcha_field_font_color; ?>" />
								</li>
								<li>
									<label>Padding X:</label><br />
									<input type="number" class="SF_captcha_fields_padding_x SF_field_padding_x" value="<?php echo $captcha_field_padding_x; ?>" />
								</li>
								<li>
									<label>Padding Y:</label><br />
									<input type="number" class="SF_captcha_fields_padding_y SF_field_padding_y" value="<?php echo $captcha_field_padding_y; ?>" />
								</li>
								<li>
									<label>Width:</label><br />
									<input type="number" class="SF_captcha_field_width SF_field_width" value="<?php echo $captcha_field_width; ?>" />
									<select class="SF_captcha_field_width_type SF_field_width_type">
										<option value="pixels" <?php if ( $form['captcha']['styles']['width_type']['pixels'] == 1 ) echo 'selected'; ?> >Pixels</option>
										<option value="percent" <?php if ( $form['captcha']['styles']['width_type']['percent'] == 1 ) echo 'selected'; ?>>Percent</option>
									</select>
								</li>
								<li>
									<label>Placeholder:</label><br />
									<input type="text" class="SF_captcha_field_placeholder SF_field_placeholder" value="<?php echo $captcha_field_placeholder; ?>"  />
								</li>
							</ul>
						</div>
						<div class="SF_validation_contents">
							<ul>
								<li>
									<label>Validation Required Message:</label><br />
									<input type="text" class="SF_captcha_field_validation_message" style="color: <?php echo $form['captcha']['validation']['font-color']; ?>;" value="<?php echo $form['captcha']['validation']['message']; ?>" />
								</li>
								<li>
									<label>Validation Not Match Message:</label><br />
									<input type="text" class="SF_captcha_field_validation_not_match_message" style="color: <?php echo $form['captcha']['validation']['font-color']; ?>;" value="<?php echo $form['captcha']['validation']['not_match_message']; ?>" />
								</li>
								<li>
									<label>Validation Font Color:</label><br />
									<input type="text" class="SF_captcha_field_error_color" value="<?php echo $form['captcha']['validation']['font-color']; ?>">
								</li>
							</ul>
						</div>
					</div>
				</li>
			<?php endif; ?>

			<?php if ( $form['submit'] ): ?>
				<li class="SF_ajax_form_text" id="<?php echo $c; ?>">
					<div class="SF_cf_top">
						<span title="Minimize" class="dashicons dashicons-arrow-down-alt2 SF_minimizer SF_toggle_submit_field"></span>
						<span class="dashicons dashicons-no SF_del" onclick="javascript: SF_delete_field(<?php echo $c; ?>)"></span>
					</div>
					<input type="hidden" class="SF_submit_input_toggle" value="<?php echo $form['submit']['toggle']; ?>" />
					<h4 class="SF_cf_main_header">Sumbit Button #<?php echo $c1; ?></h4>
					<div class="SF_cf_field_contents SF_submit_fields_contents">
						<p>
							<label for="SF_field_submit">Name:</label><br />
							<input type="text" class="SF_name_field_submit" value="<?php if ( $form['submit']['name'] ) echo $form['submit']['name']; ?>" /><br />
							<label for="SF_field_submit_value">Value:</label><br />
							<input type="text" class="SF_name_field_submit_value" value="<?php if ( $form['submit']['value'] ) echo $form['submit']['value']; ?>" />
						</p>
						<div class="SF_field_name_styling_radio">
							<ul>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_submit_field_use_theme_style" value="0" <?php if ( $form['submit']['styles']['required'] == 0 ) echo 'checked="checked"'; ?> /> Use Theme Style</li>
								<li><input type="radio" name="SF_style_<?php echo $c; ?>" class="SF_submit_field_use_custom_style" value="1" <?php if ( $form['submit']['styles']['required'] == 1 ) echo 'checked="checked"'; ?> /> Custom Style</li>
							</ul>
						</div>

						<?php

							//Field Border Color.
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

							//Field Width.
							$submit_field_border_radius = $form['submit']['styles']['border_radius'];
						?>
						<div class="SF_submit_field_custom_style_contents SF_custom_field_style" <?php if ( $form['submit']['styles']['required'] == 1 ) { echo 'style="display: block !important;"'; } ?>>
							<h3>Submit Button Preview</h3>
							<div class="SF_submit_preview"></div>
							<div class="SF_submit_field_prev_btn_container SF_field_prev_btn_container">
								<span class="SF_submit_field_preview_btn SF_field_preview_btn button">Preview</span>
							</div>
							<ul>
								<li>
									<label>Border Color:</label><br />
									<input type="text" class="SF_submit_field_border_color SF_field_border_color" value="<?php echo $submit_field_border_color; ?>" />
								</li>
								<li>
									<label>Border Size:</label><br />
									<input type="number" class="SF_submit_field_border_size SF_field_border_size" value="<?php echo $submit_field_border_size; ?>" />
								</li>
								<li>
									<label>Background Color:</label><br />
									<input type="text" class="SF_submit_field_background_color SF_field_background_color" value="<?php echo $submit_field_background_color; ?>" />
								</li>
								<li>
									<label>Font Color:</label><br />
									<input type="text" class="SF_submit_field_font_color SF_field_font_color" value="<?php echo $submit_field_font_color; ?>" />
								</li>
								<li>
									<label>Padding X:</label><br />
									<input type="number" class="SF_submit_fields_padding_x SF_field_padding_x" value="<?php echo $submit_field_padding_x; ?>" />
								</li>
								<li>
									<label>Padding Y:</label><br />
									<input type="number" class="SF_submit_fields_padding_y SF_field_padding_y" value="<?php echo $submit_field_padding_y; ?>" />
								</li>
								<li>
									<label>Border Radius:</label><br />
									<input type="number" class="SF_submit_field_border_radius SF_field_border_radius" value="<?php echo $submit_field_border_radius; ?>" />
								</li>
							</ul>
						</div>
					</div>
				</li>
			<?php endif; ?>
		<?php $c++; endforeach; ?>
	</ul>
</div>

<script type="text/javascript">

	//Loop User's Created Form Fields.
	jQuery(".SF_ajax_form_text").each(function( c ) {

		//Add 1 for nth-child element referencing.
		var c1 = c + 1;

		/************************************
		*  TextField Field Functionalities.
		*  @version 1.0.0.
		*************************************/
		//If Name Field elements are present.
		if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_name") ) {

			//Initiate Field Preview View.
			SF_field_preview( c, "text_field" );

			//Toggle variable. (Boolean).
			var text_field_toggle;

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_input_toggle").val() == 1 ) {

				//Toggle set to true.
				text_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_contents").show();
			} else {

				//Togge set to false.
				text_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_name_field").on("click", function() {

				//If boolean is true.
				if ( text_field_toggle == true ) {

					//Set to false.
					text_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_contents").slideUp(500);
				} else {

					//Set to true.
					text_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( text_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				};

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_name").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_text_field_name",  c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_name").val() );
			});

			//Text Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_label").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_text_field_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_label").val() );
			});

			//Use Theme Style Radio Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_use_theme_style").on("click", function() {
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_style_required",
					"pos": c,
					"content": 0
				};

				jQuery.post(ajaxurl, data, function() {

					//Check if Custom Style is enabled.
					SF_custom_style_required( c, "text_field" );
				});
			})

			//Use Custom Style Radio Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_use_custom_style").on("click", function() {
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_style_required",
					"pos": c,
					"content": 1
				};

				jQuery.post(ajaxurl, data, function() {

					//Check if Custom Style is enabled.
					SF_custom_style_required( c, "text_field" );
				});
			});

			//Text Field Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_preview_btn").on("click", function() {

				//Initiate Field Preview View.
				SF_field_preview( c, "text_field" );
			});

			//Text Field Label Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_text_field_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_label_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Label Font Size Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_label_font_size_type",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Label Font Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_label_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_label_font_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_text_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
		}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_text_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Font Color on Change Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled == false) {
						///
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_text_field_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Padding X on Change or Keyup Event
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_padding_x").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Padding Y on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_padding_y").on("change keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_padding_y").val()
				};

				jQuery.post(ajaxurl, data);
			});

			//Text Field Border Radius on Keyup Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_border_radius").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_border_radius",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_fields_border_radius").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_width").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_width").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Width Type on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_width_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_width_type",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_width_type").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Placeholder on Keyup or Input Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_placeholder").on("input keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_placeholder",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_placeholder").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Checkbox Validation Required on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_validation_required").on("change", function() {

				//if checked.
				if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_validation_required").is(":checked") ) {

					//Value is 1.
					var required = 1;
				} else {

					//Value is 0.
					required = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_validation_required",
					"pos": c,
					"data": required
				};

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Check if Field Validation is enabled.
					SF_field_validation( c, "text_field" );
				});
			});

			//Text Field Validation Required Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_required_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_validation_required_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_required_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Validation Required Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_error_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_required_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_text_field_validation_required_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_required_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_error_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_validation_required_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_error_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Minimum String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_len").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_min_len",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_len").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Minimum String Length Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_min_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Minimum String Length Validation Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_text_field_min_len_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_min_len_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_min_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Maximum String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len").on("change keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_max_len",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Maximum String Length Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_max_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Maximum String Length Validation Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_text_field_max_len_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_text_field_max_len_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_max_len_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/************************************
		*  Number Field Functionalities.
		*  @version 1.0.0.
		*************************************/
		//If Name Field elements are present.
		if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_number") ) {

			//Toggle variable. (Boolean).
			var number_field_toggle;

			//Initiate Field Preview View.
			SF_field_preview( c, "number_field" );

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_input_toggle").val() == 1 ) {

				//Toggle set to true.
				number_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_fields_contents").show();
			} else {

				//Togge set to false.
				number_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_number_field").on("click", function() {
				if ( number_field_toggle == true ) {

					//If boolean is true.
					number_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_fields_contents").slideUp(500);
				} else {

					//Set to true.
					number_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( number_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_number").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_text_field_number",  c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_number").val() );
			});

			//Number Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_number_field_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label").val() );
			});

			//Number Field Checkbox Validation Require on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_validation").on("change", function() {

				//if checked.
				if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_validation").is(":checked") ) {

					//Value is 1.
					var required = 1;
				} else {

					//Value is 0.
					required = 0;
				}

				//Ajax Properties
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_validation",
					"pos": c,
					"data": required
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Check if Field Validation is enabled.
					SF_field_validation( c, "number_field" );
				});
			});

			//Use Theme Style Style Radio Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Check if Custom Style is enabled.
					SF_custom_style_required( c, "number_field" );
				});
			});

			//Use Custom Style Radio Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_use_custom_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Check if Custom Style is enabled.
					SF_custom_style_required( c, "number_field" );
				});
			});

			//Number Field Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_preview_btn").on("click", function() {

				//Initiate Field Preview View.
				SF_field_preview( c, "number_field" );
			});

			//Number Field Label Font Color on Change Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled == true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_number_field_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_label_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Label Font Size Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_font_size_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Label Font Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_label_font_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Border Color on Change or Keyup.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation":"update_number_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation":"update_number_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_number_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_background_color").val()
				};

				jQuery.post(ajaxurl, data);
			});

			//Number Field Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_number_field_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Padding X on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_fields_padding_x").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Padding Y on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_fields_padding_y").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_fields_padding_y").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Border Radius on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_border_radius").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_border_radius",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_border_radius").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Width Type on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_width_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_width_type",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_width_type").val()
				};

				//Initiate Ajax Properties.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_width").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_width").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Placeholder on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_placeholder").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_placeholder",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_placeholder").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_number_field_validation_message").on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_error_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Apply Font Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_validation_message").attr("style", "color: " + $elm["text"]);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_number_field_validation_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_validation_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_error_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Minimun Character String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_min_length",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Minimum String Length Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_min_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Minimum String Length Validation Message Font Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						///
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_number_field_min_len_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_min_len_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_min_len_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Maximum String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_max_len",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Maximum String Length Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_max_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Number Field Maximum String Length Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_number_field_max_len_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_number_field_max_len_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_max_len_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/************************************
		*  Email Field Functionalities.
		*  @version 1.0.0.
		*************************************/
		//If Email Field elements are present.
		if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_email") ) {

			//Toggle variable. (Boolean).
			var email_field_toggle;

			//Initiate Field Preview View.
			SF_field_preview( c, "email_field" );

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_input_toggle").val() == 1 ) {

				//Toggle set to true.
				email_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_contents").show();
			} else {

				//Togge set to false.
				email_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_email_field").on("click", function() {
				if ( email_field_toggle == true ) {

					//If boolean is true.
					email_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_contents").slideUp(500);
				} else {

					//Set to true.
					email_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( email_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_email").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_email_field_name", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_email").val() );
			});

			//Email Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_email_field_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label").val() );
			});

			//Email Field Checkbox Validation Require on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_vaidation").on("change", function() {

				//if checked.
				if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_vaidation").is(":checked") ) {

					//Value is 1.
					var required = 1;
				} else {

					//Value is 0.
					required = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_validation",
					"pos": c,
					"data": required
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Check if Field Validation is enabled.
					SF_field_validation( c, "email_field" );
				});
			});

			//Use Theme Style Radio Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Check if Custom Style is enabled.
					SF_custom_style_required( c, "email_field" );
				});
			});

			//Use Theme Custom Style Radio Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_use_custom_style").on("click", function() {
				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					//Check if Custom Style is enabled.
					SF_custom_style_required( c, "email_field" );
				});
			});

			//Email Field Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_preview_btn").on("click", function() {

				//Initiate Field Preview View.
				SF_field_preview( c, "email_field" );
			});

			//Email Field Label Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_label_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Label Font Size Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_label_font_size_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Label Font Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_label_font_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Font Color on Change Keyup.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate AJax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_font_color").val()
				};

				//Initiate AJax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Padding X on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_padding_x").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Padding Y on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_padding_y").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_fields_padding_y").val()
				};

				//Initate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Border Radius on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_border_radius").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_border_radius",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_border_radius").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Width Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_width_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_width_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_width_type").val()
				};

				//Initiate Ajax Reuquest.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_width").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_width").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Place Holder on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_placeholder").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_placeholder",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_placeholder").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_required_message").on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_validation_required_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_required_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_error_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Apply Font Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_required_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_validation_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {

				//Apply Font Color.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_required_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_error_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_validation_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_error_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Validation Invalid Email Format Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_email_format").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_validation_email_format_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_email_format").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Invalid Email Format Message Font Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_email_format_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_email_format").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_invalid_email_format_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Key Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_email_format").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_email_format_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_invalid_email_format_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_validation_email_format_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Minimum String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_length").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_min_len",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_length").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Minimum String Length Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_len_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_min_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_len_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Minimum String Length Validation Message Font Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_len_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_len_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_min_len_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_len_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_len_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_min_len_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_min_len_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Maximum String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_max_len",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Maximum String Length Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_max_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Maximum String Length Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_email_field_max_len_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_email_field_max_len_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_max_len_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/************************************
		*  Dropdown Field Functionalities.
		*  @version 1.0.0.
		*************************************/
		//If Dropdown Fields are present.
		if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_dropdown") ) {

			//Toggle variable. (Boolean).
			var dropdown_field_toggle;

			//Initiate Field Preview View.
			SF_field_preview( c, "dropdown_field" );

			//Initiate Field Attribute View.
			SF_field_attr( c, "dropdown_field" );

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_input_toggle").val() == 1 ) {

				//Toggle set to true.
				dropdown_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_contents").show();
			} else {

				//Togge set to false.
				dropdown_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_dropdown_field").on("click", function() {
				if ( dropdown_field_toggle == true ) {

					//If boolean is true.
					dropdown_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_contents").slideUp(500);
				} else {

					//Set to true.
					dropdown_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( dropdown_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_dropdown").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_dropdown_field_name", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_dropdown").val() );
			});

			//Dropdown Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_label_field_dropdown").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_dropdown_field_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_label_field_dropdown").val() );
			});

			//Dropdown Field Checkbox Require on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_dropdown_required").on("change", function() {

				//if checked
				if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + " ) .SF_dropdown_required").is(":checked") ) {

					//Value is 1.
					var required = 1;
				} else {

					//Value is 0.
					var required = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_required",
					"pos": c,
					"data": required
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_required( c, "dropdown_field" );
				});
			});

			//Dropdown Add Button to create Option fields.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_add").on("click", function() {

				//Ajax Request values.
				var data = {
					"action": "SF_forms",	//WP-ajax action,
					"operation": "add_dropdown_option",	//Ajax Request Operation.
					"pos": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_option_pos").val() //Ajax Request Value to past.
				};

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_attr( c, "dropdown_field" );
				});
			});

			//Dropdown Field Use Theme Style on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "dropdown_field" );
				});
			});

			//Dropdown Field Custom Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_use_custom_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "dropdown_field" );
				});
			});

			//Dropdown Field Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_preview_btn").on("click", function() {

				//Initiate Field Preview View.
				SF_field_preview( c, "dropdown_field" );
			});

			//Dropdown Label Font Color on Change or Keyup.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_dropdown_field_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_label_font_color",
					"pos":c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Label Size Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_label_size_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Label Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_label_size").on("change keyup input",function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_label_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Border Color on Change and Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_dropdown_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_dropdown_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_dropdown_field_font_color",
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_font_color",
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_validation_message").on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Padding X on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_padding_x").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Padding Y on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_padding_y").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_fields_padding_y").val()
				};

				//Initiate Ajax Reuquest.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Border Radius on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_border_radius").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_border_radius",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_border_radius").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Width Type on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_width_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_width_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_width_type").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_width").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_width").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Dropdown Field Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_error_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Apply Font Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_validation_message").attr("style", "color: " + $elm["text"]);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_dropdown_field_validation_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {
				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_dropdown_field_validation_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_field_error_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/************************************
		*  Radio Field Functionalities.
		*  @version 1.0.0.
		*************************************/
		//If Radio Fields are present.
		if ( jQuery(".SF_name_field_radio") ) {

			//Toggle variable. (Boolean).
			var dropdown_field_toggle;

			//Initiate Field Preview.
			SF_field_preview( c, "radio_button" );

			//Initiate Field Attributes View.
			SF_field_attr( c, "radio_button" );

			//If Field Toggle value is 1,
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_input_toggle").val() == 1 ) {

				//Toggle set to true.
				radio_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_fields_contents").show();
			} else {

				//Togge set to false.
				radio_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_radio_field").on("click", function() {
				if ( radio_field_toggle == true ) {

					//If boolean is true.
					radio_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_fields_contents").slideUp(500);
				} else {

					//Set to true.
					radio_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( radio_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Radio Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_radio").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_radio_field_name", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_radio").val() );
			});

			//Radio Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_main_label").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_radio_main_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_main_label").val() );
			});

			//Radio Field Add Bullet Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_add_radio").on("click", function() {

				//Ajax Request Values.
				var data = {
					"action": "SF_forms",								//WP-ajax action.
					"operation": "add_radio_button",		//Ajax Request Operation.
					"pos": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_pos").val() //Array position of bullet.
				}

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_attr( c, "radio_button" );
				});
			});

			//On Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_horizontal").on("click", function() {

				//Ajax Request Values.
				var data = {
					"action": "SF_forms",
					"operation": "radio_display",
					"pos": c,
					"value": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_horizontal").val()
				};

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_preview( c, "radio_button" );
				});
			});

			//On Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_vertical").on("click", function() {

				//Ajax Request Values.
				var data = {
					"action": "SF_forms",
					"operation": "radio_display",
					"pos": c,
					"value": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_vertical").val()
				};

				//Ajax Request Values.
				jQuery.post(ajaxurl, data, function(r) {

					SF_field_preview( c, "radio_button" );
				});
			});

			//Radio Field Theme Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "radio_button" );
				});
			});

			//Radio Field Custom Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_use_custom_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "radio_button" );
				});
			});

			//Radio Field Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_preview_btn").on("click", function() {

				SF_field_preview( c, "radio_button" );
			});

			//Radio Field Label Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled == false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_radio_field_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_label_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Radio Field Label Size Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_label_font_size_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Radio Field Label Font Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_label_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_label_font_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Radio Field Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_radio_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Radio Field Bullet Color
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_bullet_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_radio_field_bullet_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_bullet_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_bullet_color").val()
				};

				//console.log(data);

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Radio Field Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_radio_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Change Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Radio Field Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled == false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_radio_field_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_radio_field_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_field_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/************************************
		*  Checkbox Field Functionalities.
		*  @version 1.0.0.
		*************************************/
		//If Checkbox Field Elements are present.
		if ( jQuery(".SF_name_field_checkbox") ) {

			//Toggle variable. (Boolean).
			var checkbox_field_toggle;

			//Initiate Checkbox Preview.
			SF_field_preview( c, "checkbox" );

			//Initiate Field Attr View.
			SF_field_attr( c, "checkbox" );

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_input_toggle").val() == 1 ) {

				//Toggle set to true.
				checkbox_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_fields_contents").show();
			} else {

				//Togge set to false.
				checkbox_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_checkbox_field").on("click", function() {
				if ( checkbox_field_toggle == true ) {

					//If boolean is true.
					checkbox_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_fields_contents").slideUp(500);
				} else {

					//Set to true.
					checkbox_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( checkbox_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_checkbox").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_checkbox_name", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_checkbox").val() );
			});

			//Checkbox Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_label").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_checkbox_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_label").val() );
			});

			//Checkbox Add on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_add_checkbox").on("click", function() {
				var data = {
					"action": "SF_forms",
					"pos": c,
					"operation": "checkbox_add"
				};

				jQuery.post(ajaxurl, data, function(r) {

					SF_field_attr( c, "checkbox" );
				});
			});

			//Checkbox Header Display on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checbox_header_hide").on("click", function() {

				//Ajax Request Values.
				var data = {
					"action": "SF_forms",
					"operation": "checkbox_header",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checbox_header_hide").val()
				};

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_preview( c, "checkbox" );
				});
			});

			//Checkbox Header Display on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checbox_header_show").on("click", function() {

				//Ajax Request Values.
				var data = {
					"action": "SF_forms",
					"operation": "checkbox_header",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checbox_header_show").val()
				};

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_preview( c, "checkbox" );
				});
			});

			//Checkbox Horizontal Display on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_horizontal").on("click", function() {

				//Ajax Request Values.
				var data = {
					"action": "SF_forms",
					"operation": "checkbox_display",
					"pos": c,
					"content": "horizontal"
				};

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_preview( c, "checkbox" );
				});
			});

			//Checkbox Vertical Display on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_vertical").on("click", function() {

				//Ajax Request Values.
				var data = {
					"action": "SF_forms",
					"operation": "checkbox_display",
					"pos": c,
					"content": "vertical"
				};

				//Execute Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_preview( c, "checkbox" );
				});
			});

			//Checkbox Field Theme Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "checkbox" );
				});
			});

			//Checkbox Field Custom Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_use_custom_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "checkbox" );
				});
			});

			//Checkbox Field Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_preview_btn").on("click", function() {

				SF_field_preview( c, 'checkbox' );
			});

			//Checkbox Field Label Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_checkbox_field_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_label_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Label Size Types on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_label_size_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Label Font Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_label_size").on("change input input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_label_font_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_checkbox_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_checkbox_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Check Sign Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_check_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_checkbox_check_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_check_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_check_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_checkbox_field_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Required on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_required").on("change", function() {

				//If Checkbox is checked.
				if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_required").is(":checked") ) {

					//Value is 1.
					var required = 1;
				} else {

					//Value is 0.
					required = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_required",
					"pos": c,
					"data": required
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_required( c, "checkbox" );
				});
			});

			//Checkbox Field Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Checkbox Field Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_error_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Apply Font Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_validation_message").attr("style", "color: " + $elm["text"]);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_checkbox_field_validation_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_checkbox_field_validation_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_field_error_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/************************************
		*  Textarea Field Functionalities.
		*  @version 1.0.0.
		*************************************/
		//If Textarea Field Elements are present.
		if ( jQuery(".SF_name_field_textarea") ) {

			//Toggle variable. (Boolean).
			var textarea_field_toggle;

			//Initiate Field Preview View.
			SF_field_preview( c, "textarea" );

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_input_toggle").val() == 1 ) {

				//Toggle set to true.
				textarea_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_contents").show();
			} else {

				//Togge set to false.
				textarea_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_textarea_field").on("click", function() {
				if ( textarea_field_toggle == true ) {

					//If boolean is true.
					textarea_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_contents").slideUp(500);
				} else {

					//Set to true.
					textarea_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( textarea_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Text Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_textarea").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_textarea_name", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_textarea").val() );
			});

			//Text Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_field_textarea_label").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_textarea_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_field_textarea_label").val() );
			});

			//Text Field Column on Keyup or Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_col").on("change keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_textarea_cols", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_col").val() );
			});

			//Text Field Rows on Keyup or Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_row").on("change keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_textarea_rows", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_row").val() );
			});

			//Textarea Field Theme Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "textarea" );
				});
			});

			//Textarea Custom Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_use_custom_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "textarea" );
				});
			});

			//Textarea Preview Buttom on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_preview_btn").on("click", function() {

				//Initiate Field Preview View.
				SF_field_preview( c, "textarea" );
			});

			//Textarea Field Label Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_textarea_field_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_label_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Label Font Size Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_label_font_size_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Label Font Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_label_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_label_font_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_textarea_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Click Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_textarea_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_background_color").val()
				};

				//Initiate Ajax.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_textarea_field_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Padding X on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_padding_x").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Padding Y on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_padding_y").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_padding_y").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Border Radius on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_border_radius").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_border_radius",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_fields_border_radius").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Width Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_width_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_width_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_width_type").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textatrea Field Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_width").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_width").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Height Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_height_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_height_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_height_type").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Height on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_height").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_height",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_height").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Placeholder on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_placeholder").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_placehoder",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_placeholder").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Required on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_validation").on("change", function() {

				//If checkbox is checked.
				if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_validation").is(":checked") ) {

					//Value is 1.
					var required = 1;
				} else {

					//Value is 0.
					var required = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_validation",
					"pos": c,
					"data": required
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_validation( c, "textarea" );
				});
			});

			//Textarea Field Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_validation_required_message").on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_required_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_validation_required_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_required_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Apply Font Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_validation_required_message").attr("style", "color: " + $elm["text"]);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_textarea_field_required_validation_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_required_validation_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_required_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Minimum String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_min_len").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_min_len",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_min_len").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Minimum String Length Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_min_len_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_min_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_min_len_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Minimun String Length Validation Message Font Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_min_len_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_min_len_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_textarea_field_min_length_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_field_min_len_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_min_len_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_min_length_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_min_len_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Maximum String Length on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len").on("chanhe keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_max_len",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Email Field Maximum String Length on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len_validation_message").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_max_len_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Textarea Field Maximum String Length Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len_validation_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len_validation_message").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_textarea_field_max_len_validation_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len_validation_message").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len_validation_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_textarea_field_max_len_validation_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_textarea_max_len_validation_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/******************************************
		*  File Attachments Field Functionalities.
		*  @version 1.0.0.
		*******************************************/
		//If File Attachment Field Elements are present.
		if ( jQuery(".SF_file_attachment_name") ) {

			//Toggle variable. (Boolean).
			var fa_field_toggle;

			//Initiate Field Preivew View.
			SF_field_preview( c, "file_attachments" );

			//If Field Toggle value is 1, show content.

			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_input_toggle").val() == 1 ) {

				//Toggle set to true.
				fa_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_contents").show();
			} else {

				//Togge set to false.
				fa_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_fa_field").on("click", function() {
				if ( fa_field_toggle == true ) {

					//If boolean is true.
					fa_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_contents").slideUp(500);
				} else {

					//Set to true.
					fa_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( fa_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_name").on("keyup input", function() {
				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_file_att_name", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_name").val() );
			});

			//File Attachment Field Label on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_label").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_file_att_label", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_label").val() );
			});

			//File Attachment Field File Size on Keyup or Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_file_size").on("keyup change", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_file_att_max_size", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_file_size").val() );
			});

			//File Attachment Field File Types on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_file_types").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_file_att_file_types", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_file_types").val() );
			});

			//Progress Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) { // simple, lightweight check
						//
					} else if (toggled === false) {
						//
					} else {

						//Apply Border Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_upload_progress").css("border", 1 + "px solid " + $elm["text"]);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_progress_border_color",
							"pos": c,
							"content": $elm['text']
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Apply Border Color.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_upload_progress").css("border", 1 + "px solid " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_border_color").val());

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_progress_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Progress Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) { // simple, lightweight check
						//
					} else if (toggled === false) {
						//
					} else {

						//Apply Border Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_upload_progress").css("background-color", $elm['text']);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_progress_background_color",
							"pos": c,
							"content": $elm['text']
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Apply Border Color.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_upload_progress").css("background-color", jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_background_color").val());

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_progress_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Progress Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) { // simple, lightweight check
						//
					} else if (toggled === false) {
						//
					} else {

						//Apply Border Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_progress_percent").attr("style", "color:" + $elm['text'] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_progress_font_color",
							"pos": c,
							"content": $elm['text']
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Apply Border Color.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_progress_percent").attr("style", "color:" + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_progress_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Progress progress color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_progress_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) { // simple, lightweight check
						//
					} else if (toggled === false) {
						//
					} else {

						//Apply Border Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_progress").attr("style", "background-color: " + $elm['text'] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_progress_progress_color",
							"pos": c,
							"content": $elm['text']
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Apply Background Color.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_progress").attr("style", "background-color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_progress_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_progress_progress_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_progress_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Progress Filename color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_filename_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) { // simple, lightweight check
						//
					} else if (toggled === false) {
						//
					} else {

						//Apply Border Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_upload_filename_label").attr("style", "color: " + $elm['text'] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_upload_filename_color",
							"pos": c,
							"content": $elm['text']
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Apply Border Color.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_upload_filename_label").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_filename_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_upload_filename_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_filename_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Size Error Message.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_size_error_message").on("keyup input", function() {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_error_file_size_preview").html( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_size_error_message").val() );

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_error_message_file_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_size_error_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Type Error Message.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_type_error_message").on("keyup input", function() {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_error_file_type_preview").html( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_type_error_message").val() );

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_error_message_file_type",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_type_error_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Error Font Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_error_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_error_file_size_preview, .SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_error_file_type_preview").attr("style", "color: " + $elm["text"] + ";");

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_fa_error_message_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_error_file_size_preview, .SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_error_file_type_preview").attr("style", "color: " + jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_error_font_color").val() + ";");

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_error_message_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_error_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//After Upload Message Set on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_after_upload_message").on("keyup input", function() {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_afer_upload_message_preview span").html( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_after_upload_message").val() );

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_upload_success_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_after_upload_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//After Upload Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_after_upload_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) { // simple, lightweight check
						//
					} else if (toggled === false) {
						//
					} else {

						//Apply Border Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_afer_upload_message_preview span").attr("style", "color: " + $elm['text']);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_upload_success_font_color",
							"pos": c,
							"content": $elm['text']
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_upload_success_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_after_upload_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Theme Style Required on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_use_theme_style").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "file_attachments" );
				});
			});

			//File Attachment Custom Style Required on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_use_custom_style").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "file_attachments" );
				});
			});

			//File Attachment Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_preview_btn").on("click", function() {

				SF_field_preview( c, "file_attachments" );
			});

			//File Attachment Label Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_label_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_fa_label_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_label_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_label_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Label Font Size Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_label_size_types").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_label_fonr_size_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_label_size_types").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Label Font Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_label_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_label_font_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_label_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_fa_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Background Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_fa_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_background_color").val()
				};

				//Initate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_fa_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Padding X on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_padding_x").val()
				}

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Padding Y on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_padding_y").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_fields_padding_y").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Width Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_width_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_width_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_width_type").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_width").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_width").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachment Field Required on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_required").on("change", function() {

				//If checkbox is checked.
				if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_file_attachment_required").is(":checked") ) {

					//Value is 1.
					var required = 1;
				} else {

					//Value is 0.
					var required = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_file_att_required",
					"pos": c,
					"data": required
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_field_required( c, "file_attachments" );
				});
			});

			//File Attachments Field Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_validation_message").on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_field_validation_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//File Attachments Field Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_error_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Apply Font Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_validation_message").attr("style", "color: " + $elm["text"]);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_fa_field_validation_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_fa_field_validation_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_field_error_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/***************************************
		*  Captcha Field Functionalities.
		*  @version 1.0.0.
		****************************************/
		//If Captcha Field Elements are present.
		if ( jQuery(".SF_captcha_field_length") ) {

			//Toggle variable. (Boolean).
			var captcha_field_toggle;

			//Initiate Field Preview View.
			SF_field_preview( c, "captcha" );

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_input_toggle").val() == 1 ) {

				//Toggle set to true.
				captcha_field_toggle = true;

				//Initiate Field Preview View.
				SF_field_preview( c, "captcha" );

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_contents").show();
			} else {

				//Togge set to false.
				captcha_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_captcha_field").on("click", function() {
				if ( captcha_field_toggle == true ) {

					//If boolean is true.
					captcha_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_contents").slideUp(500);
				} else {

					//Set to true.
					captcha_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( captcha_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha String Length Field Name on Keyup or Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_length").on("keyup input change", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_captcha_length", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_length").val() );
			});

			//Captcha Theme Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "captcha" );
				});
			});

			//Captcha Custom Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_use_custom_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "captcha" );
				});
			});

			//Captcha Preview Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_preview_btn").on("click", function() {

				SF_field_preview( c, "captcha" );
			});

			//Captcha Image Background Color on Change or Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_captcha_image_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_image_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Image Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_captcha_image_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_image_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_font_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Image Line Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_line_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_captcha_image_line_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_image_line_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_line_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Border Color on Change and Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_captcha_field_border_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_border_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Background Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_captcha_field_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_capcha_field_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_capcha_field_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_font_color").val()
				};

				//Initiate Ajax Request
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Padding X on Change Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_padding_x").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Padding Y on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_padding_y").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_fields_padding_y").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Width Types on Change Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_width_type").on("change", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_width_types",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_width_type").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Width on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_width").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_width",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_width").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Placeholder on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_placeholder").on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_placeholder",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_placeholder").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Required Validation Message on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_validation_message").on("keyup", function() {
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_required_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_validation_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Validation Message Not Match on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_validation_not_match_message").on("keyup", function() {
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_not_match_message",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_validation_not_match_message").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Captcha Field Validation Message Font Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_error_color").colorPicker({
				renderCallback: function($elm, toggled) {
			    if (toggled === true) { // simple, lightweight check
						//
			    } else if (toggled === false) {
			      //
			    } else {

						//Apply Font Color.
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_validation_message").attr("style", "color: " + $elm["text"]);
						jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_validation_not_match_message").attr("style", "color: " + $elm["text"]);

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_captcha_field_validation_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_captcha_field_validation_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_field_error_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}

		/***************************************
		*  Submit Button Field Functionalities.
		*  @version 1.0.0.
		****************************************/
		//If Submit Field Elements are present.
		if ( jQuery(".SF_name_field_submit") ) {

			//Toggle variable. (Boolean).
			var submit_field_toggle;

			//Initiate Field Preivew.
			SF_field_preview( c, "submit" );

			//If Field Toggle value is 1, show content.
			if ( jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_input_toggle").val() == 1 ) {

				//Toggle set to true.
				submit_field_toggle = true;

				//Show Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_contents").show();
			} else {

				//Togge set to false.
				submit_field_toggle = false;

				//Hide Content.
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_contents").hide();
			}

			//If Toggle or Minimizer Clicked, Show and Hide Content.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_toggle_submit_field").on("click", function() {
				if ( submit_field_toggle == true ) {

					//If boolean is true.
					submit_field_toggle = false;

					//Slide Up to hide contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_contents").slideUp(500);
				} else {

					//Set to true.
					submit_field_toggle = true;

					//Slide Down to show contents.
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_contents").slideDown(500);
				}

				//Default content value.
				var content;

				//If boolean is true.
				if ( submit_field_toggle == true ) {

					//Set to 1.
					content = 1;
				} else {

					//Set to 0.
					content = 0;
				}

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_field_toggle",
					"pos": c,
					"content": content
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Submit Field Name on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_submit").on("keyup input", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_submit_name", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_submit").val() );
			});

			//Submit Field Value on Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_submit_value").on("keyup", function() {

				//Send Keyup information to this method.
				//Params SF_form_data( $ajax_operation_name, $field_position, $value );
				SF_form_data( "update_submit_value", c, jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_name_field_submit_value").val() );
			});

			//Submit Theme Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_use_theme_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_use_theme_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "submit" );
				});
			});

			//Submit Custom Style Required on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_use_custom_style").on("click", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_style_required",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_use_custom_style").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data, function() {

					SF_custom_style_required( c, "submit" );
				});
			});

			//Submit Preivew Button on Click Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_preview_btn").on("click", function() {

				SF_field_preview( c, "submit" );
			});

			//Submit Border Color on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_border_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_submit_boder_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_boder_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_border_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Submit Button Border Size on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_border_size").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_border_size",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_border_size").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Submit Button Background Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_background_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_submit_background_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Request.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("key input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_background_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_background_color").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Submit Button Font Color.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_font_color").colorPicker({
				renderCallback: function($elm, toggled) {
					if (toggled === true) {
						//
					} else if (toggled === false) {
						//
					} else {

						//Ajax Properties.
						var data = {
							"action": "SF_forms",
							"operation": "update_submit_font_color",
							"pos": c,
							"content": $elm["text"]
						};

						//Initiate Ajax Properties.
						jQuery.post(ajaxurl, data);
					}
				}

			//On Keyup Event.
			}).on("keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_font_color",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_font_color").val()
				};

				//Initiate Ajax Properties.
				jQuery.post(ajaxurl, data);
			});

			//Submit Button Padding X on Change Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_padding_x").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_padding_x",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_padding_x").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Submit Button Padding Y on Change Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_padding_y").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_padding_y",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_fields_padding_y").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});

			//Submit Button Border Radius on Change or Keyup Event.
			jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_border_radius").on("change keyup input", function() {

				//Ajax Properties.
				var data = {
					"action": "SF_forms",
					"operation": "update_submit_button_border_radius",
					"pos": c,
					"content": jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_field_border_radius").val()
				};

				//Initiate Ajax Request.
				jQuery.post(ajaxurl, data);
			});
		}
	});
	//dito
	//Field Preview Callback.
	function SF_field_preview( pos, field_type ) {

		//Field Preview Data.
		var text_field_preview_data = {
			"action": "SF_forms",
			"operation": "field_preview",
			"pos": pos,
			"field_type": field_type
		};

		var c1 = pos + 1;

		var l = "<img src='/wp-content/plugins/shogo-forms/img/ajax-loader.gif' /> Loading...";

		switch ( field_type ) {
			case "text_field":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_preview").html( l );
			break;

			case "number_field":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_preview").html( l );
			break;

			case "email_field":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_preview").html( l );
			break;

			case "dropdown_field":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .dropdown_field_preview").html( l );
			break;

			case "radio_button":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .radio_field_preview").html( l );
			break;

			case "checkbox":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_preview").html( l );
			break;

			case "textarea":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .textarea_field_preview").html( l );
			break;

			case "file_attachments":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_preview").html( l );
			break;

			case 'captcha':
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_preivew").html( l );
			break;

			case "submit":
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_preview").html( l );
			break;
		}

		jQuery.post(ajaxurl, text_field_preview_data, function( r ) {
			switch ( field_type ) {
				case "text_field":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_text_field_preview").html( r );
				break;

				case "number_field":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_number_field_preview").html( r );
				break;

				case "email_field":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_email_field_preview").html( r );
				break;

				case "dropdown_field":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .dropdown_field_preview").html( r );
				break;

				case "radio_button":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .radio_field_preview").html( r );
				break;

				case "checkbox":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_preview").html( r );
				break;

				case "textarea":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .textarea_field_preview").html( r );
				break;

				case "file_attachments":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_fa_preview").html( r );
				break;

				case 'captcha':
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_captcha_preivew").html( r );
				break;

				case "submit":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_submit_preview").html( r );
				break;
			}
		});
	}

	//Check if field custom post style is enabled. If enabled show custom field options.
	function SF_custom_style_required( pos, field_type ) {
		var data = {
			"action": "SF_forms",
			"operation": "custom_field_style",
			"pos": pos,
			"field_type": field_type
		};

		jQuery.post(ajaxurl, data, function( r ) {
			var c1 = pos + 1;

			if ( r == 1 ) {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_custom_field_style").show();
			} else {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_custom_field_style").hide();
			}
		});
	}

	//Check if Field Validation is enable or not. if enable show validation options.
	function SF_field_validation( pos, field_type ) {
		var data = {
			"action": "SF_forms",
			"operation": "field_validation",
			"pos": pos,
			"field_type": field_type
		};

		jQuery.post(ajaxurl, data, function( r ) {
			var c1 = pos + 1;
			if ( r == 1 ) {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_validation_contents").show();
			} else {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_validation_contents").hide();
			}
		});
	}

	//Check if Field Required is enable or not. if enable show validation options.
	function SF_field_required( pos, field_type ) {
		var data = {
			"action": "SF_forms",
			"operation": "field_required",
			"pos": pos,
			"field_type": field_type
		};

		//Check if Field Required is enable or not. if enable show validation options.
		jQuery.post(ajaxurl, data, function( r ) {
			var c1 = pos + 1;
			if ( r == 1 ) {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_validation_contents").show();
			} else {
				jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_validation_contents").hide();
			}
		});
	}

	//Field Attributes/
	function SF_field_attr( pos, field_type ) {
		var data = {
			"action": "SF_forms",
			"operation": "field_attributes",
			"pos": pos,
			"field_type": field_type
		};

		//Execute Ajax Request.
		jQuery.post(ajaxurl, data, function( r ) {
			var c1 = pos + 1;

			switch ( field_type ) {
				case "dropdown_field":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_dropdown_attr").html( r );
				break;

				case "radio_button":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_radio_attr").html( r );
				break;

				case "checkbox":
					jQuery(".SF_ajax_form_text:nth-child( " + c1 + ") .SF_checkbox_attr").html( r );
				break;
			}
		});
	}

	//Ajax Request Method.
	function SF_form_data( operation, pos, data ) {
		var data = {
			"action": "SF_forms",			//WP-ajax action.
			"operation": operation,		//Ajax Request Operation.
			"pos": pos,								//Field Array Position.
			"data": data							//Value of Data.
		};

		//Execute Ajax Request.
		jQuery.post(ajaxurl, data);
	}

	//Remove Field.
	function SF_delete_field( pos ) {

		//Ajax Request Values.
		var data = {
			"action": "SF_forms",
			"operation": "remove_field",
			"pos": pos
		};

		//Execute Ajax Request.
		jQuery.post(ajaxurl, data, function(r) {

			//Reload create form window.
			SF_load_create_form();
		});
	}

	//Sortable Event.
	jQuery(".SF_ajax_create_form_container .SF_field_list").sortable({
		containment: "document",
		tolerance: "pointer",
		cursor: "move",
		revert: true,
		opacity: 0.6,
		update: function( event, ui ) {
			var sort = jQuery(this).sortable("toArray");
			var data = {
				"action": "SF_forms",
				"operation": "field_sortable",
				"pos": sort
			};

			jQuery.post(ajaxurl, data, function() {

				//Reload create form window.
				SF_load_create_form();
			});
		}
	});
</script>

<?php endif; ?>
