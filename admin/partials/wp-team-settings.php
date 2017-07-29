<?php
screen_icon(); 
?>

<form method="post" action="options.php">
	<?php settings_fields( 'wp_team_options_group' ); ?>
	<h3>Wp Team Settings</h3>
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Title</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="text" name="title" id="title" value="<?php echo get_option('title')?>" placeholder="Team title" />
		</div>
	</div>
	<!-- Start Autoplay -->
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Autoplay</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<?php
				$true_checked = "";
				$false_checked = "";
				if (get_option('autoplay') == 'true') {
				 	$true_checked = 'checked';
				 }elseif (get_option('autoplay') == 'false'){
				 	$false_checked = "checked";
				 }
			?>
			<input type="radio" name="autoplay" value="true" <?php echo $true_checked;?> checked> Yes
	  		<input type="radio" name="autoplay" value="false" <?php echo $false_checked;?> > No
		</div>
	</div><!-- End Autoplay -->
	<!-- Start Infinite -->
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Infinite</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<?php
				$true_checked = "";
				$false_checked = "";
				if (get_option('infinite') == 'true') {
				 	$true_checked = 'checked';
				 }elseif (get_option('infinite') == 'false'){
				 	$false_checked = "checked";
				 }
			?>
			<input type="radio" name="infinite" value="true" <?php echo $true_checked;?> checked> Yes
	  		<input type="radio" name="infinite" value="false" <?php echo $false_checked;?> > No
		</div>
	</div><!-- End Infinite -->
	<!-- Start Dots -->
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Dots</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<?php
				$true_checked = "";
				$false_checked = "";
				if (get_option('dots') == 'true') {
				 	$true_checked = 'checked';
				 }elseif (get_option('dots') == 'false'){
				 	$false_checked = "checked";
				 }
			?>
			<input type="radio" name="dots" value="true" <?php echo $true_checked;?> checked> Yes
	  		<input type="radio" name="dots" value="false" <?php echo $false_checked;?> > No
		</div>
	</div><!-- End Dots -->
	<!-- Start Prev -->
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Prev</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="text" id="prev" name="prev" value="<?php echo (get_option('prev') != '') ? get_option('prev') : 'none' ; ?>" />
		</div>
	</div><!-- End Prev -->
	<!-- Start Next -->
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Next</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="text" id="next" name="next" value="<?php echo (get_option('next') != '') ? get_option('next') : 'none'; ?>" />
		</div>
	</div><!-- End Next -->

	<div class="settings-form-group">
		<div class="settings_label">
			<label>Slides</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="slides" value="<?php echo (get_option('slides') != '') ? get_option('slides') : '2'; ?>">
		</div>
	</div>

	<div class="settings-form-group">
		<div class="settings_label">
			<label>Medium Device Slides</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="md_slides" value="<?php echo (get_option('md_slides') != '') ? get_option('md_slides') : '2'; ?>">
		</div>
	</div>

	<div class="settings-form-group">
		<div class="settings_label">
			<label>Small Device Slides</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="sm_slides" value="<?php echo (get_option('sm_slides') != '') ? get_option('sm_slides') : '2'; ?>">
		</div>
	</div>

	<div class="settings-form-group">
		<div class="settings_label">
			<label>Xtra Small Device Slides</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="xs_slides" value="<?php echo (get_option('xs_slides') != '') ? get_option('xs_slides') : '1'; ?>">
		</div>
	</div>

	<div class="settings-form-group">
		<div class="settings_label">
			<label>Scroll</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="scroll" value="<?php echo (get_option('scroll') != '') ? get_option('scroll') : '2'; ?>">
		</div>
	</div>
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Medium Device Scroll</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="md_scroll" value="<?php echo (get_option('md_scroll') != '') ? get_option('md_scroll') : '2'; ?>">
		</div>
	</div>
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Small Device Scroll</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="sm_scroll" value="<?php echo (get_option('sm_scroll') != '') ? get_option('sm_scroll') : '2'; ?>">
		</div>
	</div>
	<div class="settings-form-group">
		<div class="settings_label">
			<label>Xtra Small Device Scroll</label>
			<span>:</span>
		</div>
		<div class="settings_field">
			<input type="number" min="1" name="xs_scroll" value="<?php echo (get_option('xs_scroll') != '') ? get_option('xs_scroll') : '1'; ?>">
		</div>
	</div>
	<?php wp_nonce_field( plugin_basename( __FILE__ ), 'wp-team-setting' );?>
	<div class="settings-form-group">
		<?php  submit_button(); ?>
	</div>
</form>
<?php