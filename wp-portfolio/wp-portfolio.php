<?php
/*
 * Plugin Name: WP-Portfolio
 * Description: This plugin is developed for manage portfolio details of the organization
 * Version: 1.0.0
 * Author: Jeevaka
 */

/* Plugin constants =============================================================== */

if (!defined('ABSPATH')) {
    exit();
}
if (!defined('PLUGIN_WP_PORTFOLIO_DIR_PATH')) {
    define('PLUGIN_WP_PORTFOLIO_DIR_PATH', plugin_dir_path(__FILE__));
}
if (!defined('PLUGIN_WP_PORTFOLIO_URI_PATH')) {
    define('PLUGIN_WP_PORTFOLIO_URI_PATH', plugin_dir_url(__FILE__));
}
require_once PLUGIN_WP_PORTFOLIO_DIR_PATH . '/inc/custom-post-project.php';
require_once PLUGIN_WP_PORTFOLIO_DIR_PATH . '/inc/plugin-setup.php';






