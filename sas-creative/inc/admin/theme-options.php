<?php
/**
 * Manage Theme Options
 *
 * @package WordPress
 * @subpackage sas-creative
 * @version  1.0.0
 * @author WIjesinghe
 */

require_once THEME_SAS_CREATIVE_DIR_PATH . "/inc/admin/theme-options-utility-functions.php";
require_once THEME_SAS_CREATIVE_DIR_PATH . "/inc/admin/theme-options-common.php";

add_action( 'admin_menu', "register_theme_options_in_menu" );
function register_theme_options_in_menu() {
    //  add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function, $position)
    add_menu_page( "Theme Options", "Theme Options", "manage_options", "theme-options-common", "get_common_theme_options", "dashicons-rest-api", 25 );

}

add_action("admin_init", "register_all_theme_setting_sections_with_admin_setting");
function register_all_theme_setting_sections_with_admin_setting()
{
    /* Register the common settings */
    register_theme_setting_section('common_settings_section', 'common-theme-options', '<h4>Common Theme Options </h4>',
    'common_settings','display_common_settings');

}

