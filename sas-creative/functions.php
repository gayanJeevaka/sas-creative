<?php
/**
 * @Package wordpress
 * @subpackage sas-creative
 * @version  1.0.0
 *
 */

/* Theme path constants */
if ( ! defined( 'ABSPATH' ) ) {
    exit();
}
if ( ! defined( 'COMMON_TWENTY_DIR_PATH' ) ) {
    define( 'THEME_SAS_CREATIVE_DIR_PATH', get_template_directory() );
}
if ( ! defined( 'COMMON_TWENTY_DIR_URI' ) ) {
    define( 'THEME_SAS_CREATIVE_DIR_URI', get_template_directory_uri() );
}

/* Global variables */
$textDomain = "sas-creative";


require_once THEME_SAS_CREATIVE_DIR_PATH."/inc/theme-setup.php";
require_once THEME_SAS_CREATIVE_DIR_PATH."/inc/admin/theme-activation-setup.php";
require_once THEME_SAS_CREATIVE_DIR_PATH."/inc/admin/theme-options.php";
require_once THEME_SAS_CREATIVE_DIR_PATH."/inc/admin/custom-post-service.php";


