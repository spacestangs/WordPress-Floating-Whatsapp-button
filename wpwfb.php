<?php
/*
Plugin Name:  WPGreen Floating button
Plugin URI:   https://github.com/spacestangs/WP-Floating-button/
Description:  this plugin will display a floting WhatsApp Button
Version:      1.0
Author:       spacestangs
Author URI:   https://www.anan.media
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpfwb-lang
Domain Path:  /languages
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

Copyright 2020-2023 AnanMedia.
*/

function wpwfb_init()
{
    load_plugin_textdomain(
        "wpwfb",
        false,
        "WPFloating-button/languages/"
    );
}
add_action("init", "wpwfb_init");

function addcssfiles()
{
    wp_enqueue_style(
        "new-style",
        plugins_url("/css/style.css", __FILE__),
        false,
        "1.0.2",
        "all"
    );
}
add_action("wp_enqueue_scripts", "addcssfiles");

add_action( 'wp_footer', 'ak_add_floating_info');
function ak_add_floating_info () {
$wordpress_floating_whatsapp_button_options = get_option( 'wordpress_floating_whatsapp_button_option_name' ); // Array of All Options
$enter_the_phone_number_with_country_code_but_without_0 = $wordpress_floating_whatsapp_button_options['enter_the_phone_number_with_country_code_but_without_0']; 
$enter_optional_text_near_the_button_1 = $wordpress_floating_whatsapp_button_options['enter_optional_text_near_the_button_1'];

    ?>
       <div class="sticky-slider">
		   
    <?php
	echo '<a class="sticky-slider" href=https://api.whatsapp.com/send?phone=' .
            $enter_the_phone_number_with_country_code_but_without_0 .
            '><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/WhatsApp_icon.png/598px-WhatsApp_icon.png" alt="Whatsapp" width="50" height="60">' . $enter_optional_text_near_the_button_1 . 
            "</a>";
		echo '</div>';
}


/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class WordPressFloatingWhatsappButton {
	private $wordpress_floating_whatsapp_button_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wordpress_floating_whatsapp_button_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'wordpress_floating_whatsapp_button_page_init' ) );
	}

	public function wordpress_floating_whatsapp_button_add_plugin_page() {
		add_menu_page(
			'WordPress Floating Whatsapp button', // page_title
			'Whatsapp button', // menu_title
			'manage_options', // capability
			'wordpress-floating-whatsapp-button', // menu_slug
			array( $this, 'wordpress_floating_whatsapp_button_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			65 // position
		);
	}

	public function wordpress_floating_whatsapp_button_create_admin_page() {
		$this->wordpress_floating_whatsapp_button_options = get_option( 'wordpress_floating_whatsapp_button_option_name' ); ?>

		<div class="wrap">
			<h2>WordPress Floating Whatsapp button</h2>
			<p>Made by <strong>alex reznik</strong> feel free to doante</p>
			<p>Set your button here</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'wordpress_floating_whatsapp_button_option_group' );
					do_settings_sections( 'wordpress-floating-whatsapp-button-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function wordpress_floating_whatsapp_button_page_init() {
		register_setting(
			'wordpress_floating_whatsapp_button_option_group', // option_group
			'wordpress_floating_whatsapp_button_option_name', // option_name
			array( $this, 'wordpress_floating_whatsapp_button_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'wordpress_floating_whatsapp_button_setting_section', // id
			'Settings', // title
			array( $this, 'wordpress_floating_whatsapp_button_section_info' ), // callback
			'wordpress-floating-whatsapp-button-admin' // page
		);

		add_settings_field(
			'enter_the_phone_number_with_country_code_but_without_0', // id
			'Enter the Phone number with country code but without +', // title
			array( $this, 'enter_the_phone_number_with_country_code_but_without_0_callback' ), // callback
			'wordpress-floating-whatsapp-button-admin', // page
			'wordpress_floating_whatsapp_button_setting_section' // section
		);

		add_settings_field(
			'enter_optional_text_near_the_button_1', // id
			'enter optional text near the button', // title
			array( $this, 'enter_optional_text_near_the_button_1_callback' ), // callback
			'wordpress-floating-whatsapp-button-admin', // page
			'wordpress_floating_whatsapp_button_setting_section' // section
		);
	}

	public function wordpress_floating_whatsapp_button_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['enter_the_phone_number_with_country_code_but_without_0'] ) ) {
			$sanitary_values['enter_the_phone_number_with_country_code_but_without_0'] = sanitize_text_field( $input['enter_the_phone_number_with_country_code_but_without_0'] );
		}

		if ( isset( $input['enter_optional_text_near_the_button_1'] ) ) {
			$sanitary_values['enter_optional_text_near_the_button_1'] = sanitize_text_field( $input['enter_optional_text_near_the_button_1'] );
		}

		return $sanitary_values;
	}

	public function wordpress_floating_whatsapp_button_section_info() {
		
	}

	public function enter_the_phone_number_with_country_code_but_without_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="wordpress_floating_whatsapp_button_option_name[enter_the_phone_number_with_country_code_but_without_0]" id="enter_the_phone_number_with_country_code_but_without_0" value="%s">',
			isset( $this->wordpress_floating_whatsapp_button_options['enter_the_phone_number_with_country_code_but_without_0'] ) ? esc_attr( $this->wordpress_floating_whatsapp_button_options['enter_the_phone_number_with_country_code_but_without_0']) : ''
		);
	}

	public function enter_optional_text_near_the_button_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="wordpress_floating_whatsapp_button_option_name[enter_optional_text_near_the_button_1]" id="enter_optional_text_near_the_button_1" value="%s">',
			isset( $this->wordpress_floating_whatsapp_button_options['enter_optional_text_near_the_button_1'] ) ? esc_attr( $this->wordpress_floating_whatsapp_button_options['enter_optional_text_near_the_button_1']) : ''
		);
	}

}
if ( is_admin() )
	$wordpress_floating_whatsapp_button = new WordPressFloatingWhatsappButton();

/* 
 * Retrieve this value with:
 * $wordpress_floating_whatsapp_button_options = get_option( 'wordpress_floating_whatsapp_button_option_name' ); // Array of All Options
 * $enter_the_phone_number_with_country_code_but_without_0 = $wordpress_floating_whatsapp_button_options['enter_the_phone_number_with_country_code_but_without_0']; // Enter the Phone number with country code but without +
 * $enter_optional_text_near_the_button_1 = $wordpress_floating_whatsapp_button_options['enter_optional_text_near_the_button_1']; // enter optional text near the button
 */
