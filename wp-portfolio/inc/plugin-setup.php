<?php
/**
 * @package wordpress
 * @subpackage sas-creative
 * @author Jeevaka
 * @version 1.0.0
 * @description Manage plugin setup features
 *
 */

add_filter( 'single_template', 'override_wp_portfolio_single_templates' );
function override_wp_portfolio_single_templates( $single_template ){
    global $post;
   if($post->post_type == 'project'){
       $single_template = PLUGIN_WP_PORTFOLIO_DIR_PATH."/templates/single-project.php";
   }
    return $single_template;
}

add_filter( 'archive_template', 'override_wp_portfolio_archive_templates' );
function override_wp_portfolio_archive_templates( $archive_template ){
    global $post;
    if($post->post_type == 'project'){
        $archive_template = PLUGIN_WP_PORTFOLIO_DIR_PATH."/templates/archive-project.php";
    }
    return $archive_template;
}

add_shortcode('view_wp_portfolio_details', 'generate_shortcode_for_portfolio_details');
function generate_shortcode_for_portfolio_details()
{
    ob_start();
    require_once PLUGIN_WP_PORTFOLIO_DIR_PATH .'/template-parts/project-details.php';
    $readTemplate = ob_get_contents();
    ob_end_clean();
    echo $readTemplate;

}

add_action('wp_enqueue_scripts', 'enqueue_styles_scripts_with_portfolio_plugin');
function enqueue_styles_scripts_with_portfolio_plugin(){
    global $post;
    if(is_home() ||  $post->post_type == 'project'  ){
        wp_enqueue_style('wp-port-folio-css',PLUGIN_WP_PORTFOLIO_URI_PATH.'/assets/css/wp-portfolio.css',[],'1.0.0');

    }
}

add_action('activate_wp-portfolio/wp-portfolio.php', 'activate_wp_portfolio_plugin');
function activate_wp_portfolio_plugin() {
	// plugin initial activities for activation
}

add_action('deactivate_wp-portfolio/wp-portfolio.php', 'deactivate_wp_portfolio_plugin');
function deactivate_wp_portfolio_plugin()
{
	// plugin clean-up activities for  deactivation
}

