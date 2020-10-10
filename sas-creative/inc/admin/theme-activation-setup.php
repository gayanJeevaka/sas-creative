<?php
/**
 * Manage default data once theme is activated.
 *
 * @Package wordpress
 * @subpackage sas-creative
 * @version  1.0.0
 * @author Gayan
 *
 */
add_action( 'after_switch_theme', 'activate_sas_creative_theme' );
function activate_sas_creative_theme() {
	$common_settings = [
		'company_logo'              => THEME_SAS_CREATIVE_DIR_URI . '/assets/images/wordpress-logo.png',
		'home_page_cover_image'     => THEME_SAS_CREATIVE_DIR_URI . '/assets/images/outsource.png',
		'header_bg_color'           => '#2C1468',
		'header_text_color'         => '#ffffff',
		'body_bg_color'             => '#19153F',
		'footer_bg_color'           => '#333333',
		'footer_copyright_bg_color' => '#2B2B2B',
		'footer_copyright_text'     => '©2020, Design by Unknown Team, All Rights Reserved',
		'highlights_color'          => '#74C48E',
		'headings_text_color'       => '#ffffff',
		'content_text_color'        => '#989898',
		'button_text_color'         => '#ffffff',
	];

	if ( ! get_option( 'common_settings' ) ) {
		update_option( 'common_settings', $common_settings );
	}

}

