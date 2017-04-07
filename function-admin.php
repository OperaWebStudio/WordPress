<?php

/*
	
@package lasertheme
	
	========================
		ADMIN PAGE
	========================
*/

function lasertheme_add_admin_page() {
	
	//Generate Lasertheme Admin Page
	//создает страницу: 1.название в шапке 2.в меню 3.уровень доступа 4.слаг 5.определяет название функции, которая описана ниже 6.абсолютный путь к иконке в меню (можно просто указать название иконки dashicons-...) 7.позиция в меню
	add_menu_page( 'Laser Theme Options', 'Laser', 'manage_options', 'lasertheme_ag', 'lasertheme_create_page', get_template_directory_uri() . '/images/lasertheme-icon.png', 9 );
	
	//Generate Lasertheme Admin Sub Pages
	//создает субстраницу 1.родительский слаг 2.шапка старницы 3.название в меню 4.уровень доступа 5.слаг 6.коллбэк функция(создает структуру меню)
	add_submenu_page( 'lasertheme_ag', 'Laser Header Options', 'Header', 'manage_options', 'lasertheme_ag', 'lasertheme_create_page' );
	add_submenu_page( 'lasertheme_ag', 'Laser Footer Options', 'Footer', 'manage_options', 'lasertheme_ag_footer', 'lasertheme_footer_page' );
}
//хук для создания страницы
add_action( 'admin_menu', 'lasertheme_add_admin_page' );

//Activate custom settings
//активируем кастомные настройки, объявляем функцию
add_action( 'admin_init', 'lasertheme_custom_settings' );

function lasertheme_custom_settings() {
	//регистрирует и создает различные кастомные настройки

	///////////// header /////////////////////
	add_settings_section( 
		'lasertheme-header-options',  //$id, 
		'Header Options', //$title, 
		'lasertheme_header_options', //$callback, 
		'lasertheme_ag'); //$page

	register_setting( 
		'lasertheme-settings-group', // $option_group, 
		'profile_picture' ); //$option_name, 

	add_settings_field( 
		'header-profile-picture',  //$id, 
		'Logo Picture 150px/150px', //$title, 
		'lasertheme_header_profile', //$callback, 
		'lasertheme_ag', //$page, 
		'lasertheme-header-options'); //$section, 

	// Header Options Functions
	function lasertheme_header_options() {
		echo 'Customize your Header Information';
	}

	function lasertheme_header_profile() {
		$picture = esc_attr( get_option( 'profile_picture' ) );
		if( empty($picture) ){
			echo '<input type="button" class="button button-secondary" value="Upload Logo Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
		} else {
			echo '<input type="button" class="button button-secondary" value="Replace Logo Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
		}
		
	}

	///////////// footer /////////////////////

	add_settings_section( 
		'lasertheme-footer-options', 
		'Footer Options', 
		'lasertheme_footer_options', 
		'lasertheme_ag_footer');
	//1.создаем группу в БД 2.регистрируем конкретную опцию с именем, к которому потом можно обращаться
	register_setting( 
		'lasertheme-footer', 
		'facebook_handler' );
	register_setting( 
		'lasertheme-footer', 
		'twitter_handler', 'lasertheme_sanitize_twitter_handler' );
	register_setting( 
		'lasertheme-footer', 
		'instagram_handler' );
	register_setting( 
		'lasertheme-footer', 
		'youtube_handler' );
	register_setting( 
		'lasertheme-footer', 
		'footer_address' );
	register_setting( 
		'lasertheme-footer', 
		'footer_email' );
	register_setting( 
		'lasertheme-footer', 
		'footer_copyright' );
	register_setting( 
		'lasertheme-footer', 
		'footer_follow_text' );
	register_setting( 
		'lasertheme-footer', 
		'footer_agency' );
	//------------------------
	add_settings_field( 
		'footer-facebook', 
		'Facebook handler', 
		'lasertheme_footer_facebook', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
	add_settings_field( 
		'footer-twitter', 
		'Twitter handler', 
		'lasertheme_footer_twitter', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
	add_settings_field( 
		'footer-instagram', 
		'Instagram handler', 
		'lasertheme_footer_instagram', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
	add_settings_field( 
		'footer-youtube', 
		'Youtube handler', 
		'lasertheme_footer_youtube', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
	//--------- adding new fields
		add_settings_field( 
		'footer-address', 
		'Address', 
		'lasertheme_footer_address', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
		add_settings_field( 
		'footer-email', 
		'E-mail', 
		'lasertheme_footer_email', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
		add_settings_field( 
		'footer-copyright', 
		'Copyright', 
		'lasertheme_footer_copyright', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
		add_settings_field( 
		'footer-follow-text', 
		'Follow text', 
		'lasertheme_footer_follow_text', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
		add_settings_field( 
		'footer-agency', 
		'Agency', 
		'lasertheme_footer_agency', 
		'lasertheme_ag_footer', 
		'lasertheme-footer-options');
	//------------------------------

}
//---------------------------------------------------
	function image_callback() {
		$picture = esc_attr( get_option( 'wfm_options_theme' ) );
		if( empty($picture) ){
			echo '<input type="button" class="button button-secondary" value="Upload Logo Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
		} else {
			echo '<input type="button" class="button button-secondary" value="Replace Logo Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
		}
		
	}

////////////// Footer Options Functions
function lasertheme_footer_options() {
	echo 'Customize your Footer Information';
}

function lasertheme_footer_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function lasertheme_footer_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function lasertheme_footer_instagram() {
	$instagram = esc_attr( get_option( 'instagram_handler' ) );
	echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram handler" />';
}
function lasertheme_footer_youtube() {
	$youtube = esc_attr( get_option( 'youtube_handler' ) );
	echo '<input type="text" name="youtube_handler" value="'.$youtube.'" placeholder="Youtube handler" />';
}
//--------- adding new fields
function lasertheme_footer_address() {
	$address = esc_attr( get_option( 'footer_address' ) );
	echo '<input type="text" name="footer_address" value="'.$address.'" placeholder="Address" />';
}
function lasertheme_footer_email() {
	$email = esc_attr( get_option( 'footer_email' ) );
	echo '<input type="text" name="footer_email" value="'.$email.'" placeholder="E-mail" />';
}
function lasertheme_footer_copyright() {
	$copyright = esc_attr( get_option( 'footer_copyright' ) );
	echo '<input type="text" name="footer_copyright" value="'.$copyright.'" placeholder="copyright" />';
}
function lasertheme_footer_follow_text() {
	$followText = esc_attr( get_option( 'footer_follow_text' ) );
	echo '<input type="text" name="footer_follow_text" value="'.$followText.'" placeholder=" " />';
}
function lasertheme_footer_agency() {
	$agency = esc_attr( get_option( 'footer_agency' ) );
	echo '<input type="text" name="footer_agency" value="'.$agency.'" placeholder="agency" />';
}

//Sanitization settings
function lasertheme_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

//Template submenu functions
//создает страницу в меню, функция определена в самом начале, включает шаблон в папке шаблонов
//создаю первую страницу, она же главная
function lasertheme_create_page() {
	require_once( get_template_directory() . '/inc/templates/lasertheme-admin.php' );
}
//создаю вторую страницу
function lasertheme_footer_page() {
	require_once( get_template_directory() . '/inc/templates/lasertheme-footer.php' );
}
