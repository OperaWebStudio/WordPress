<h1>Laser Theme Options</h1>
<?php settings_errors(); ?>
<?php 
	
	$picture = esc_attr( get_option( 'profile_picture' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'user_description' ) );
	
?>
<div class="lasertheme-sidebar-preview">
	<div class="lasertheme-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);">
			</div>
		</div>
	</div>
</div>

<form id="submitForm" method="post" action="options.php" class="lasertheme-general-form">
	<?php settings_fields( 'lasertheme-settings-group' ); ?>
	<?php do_settings_sections( 'lasertheme_ag' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>
