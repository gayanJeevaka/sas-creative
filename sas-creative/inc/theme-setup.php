<?php
/**
 * Manage basic setup settings (hooks)
 *
 * @package WordPress
 * @subpackage sas-creative
 * @version  1.0.0
 *
 */

add_action('wp_enqueue_scripts', 'enqueue_styles_scripts_with_theme_sas_creative');
function enqueue_styles_scripts_with_theme_sas_creative()
{

    wp_enqueue_script("jquery-3.4.1", THEME_SAS_CREATIVE_DIR_URI . "/assets/js/jquery.min.js");
    wp_enqueue_style('bootstrap4-css', THEME_SAS_CREATIVE_DIR_URI . "/assets/css/bootstrap.min.css");
    wp_enqueue_script('bootstrap-4.7-js', THEME_SAS_CREATIVE_DIR_URI . "/assets/js/bootstrap.bundle.min.js");
    wp_enqueue_style('common-theme-css', get_stylesheet_uri());
    wp_enqueue_style('font-awesome-css', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_script('common-theme-js', THEME_SAS_CREATIVE_DIR_URI . "/assets/js/common-theme.js", [], '1.0.0', true);


    if (is_home()) {
        wp_enqueue_style('home-page-css', THEME_SAS_CREATIVE_DIR_URI . "/assets/css/home-page.css");
        wp_enqueue_style('swiper-styles', THEME_SAS_CREATIVE_DIR_URI . '/assets/css/swiper-bundle.min.css');
        wp_enqueue_script('swiper-script', THEME_SAS_CREATIVE_DIR_URI . '/assets/js/swiper-bundle.min.js');
        wp_enqueue_script('home-page-js', THEME_SAS_CREATIVE_DIR_URI . "/assets/js/home-page.js", [], '1.0.0', true);

    } elseif (is_single()) {
        wp_enqueue_style('single-post-css', THEME_SAS_CREATIVE_DIR_URI . "/assets/css/single-post.css");
    } else if (is_404()) {
        wp_enqueue_style('theme-404-css', THEME_SAS_CREATIVE_DIR_URI . "/assets/css/error-code-404.css");
    }elseif(is_archive()){
        wp_enqueue_style('our-services-css', THEME_SAS_CREATIVE_DIR_URI . "/assets/css/our-services.css");

    }
}

add_action('admin_enqueue_scripts', 'enqueue_styles_scripts_with_theme_sas_creative_admin');
function enqueue_styles_scripts_with_theme_sas_creative_admin()
{
    wp_enqueue_style('bootstrap4-css', THEME_SAS_CREATIVE_DIR_URI . "/assets/css/bootstrap.min.css");
    wp_enqueue_script('bootstrap-4.7-js', THEME_SAS_CREATIVE_DIR_URI . "/assets/js/bootstrap.bundle.min.js");
    wp_enqueue_script('admin-theme-options-js', THEME_SAS_CREATIVE_DIR_URI . "/assets/js/admin-theme-options.js");
    wp_enqueue_media();

}

//====================================================================================================
add_action('after_setup_theme', 'common_theme_setup');
function common_theme_setup()
{

    /* Register nav menus with wordpress theme template for back end user development */
    register_nav_menus([
        'header' => 'Header Menu Navigation',
        'footer' => 'Footer Menu Navigation',
    ]);
    /* Add featured image to admin panel */
    add_theme_support('post-thumbnails');

}

// Navigation header menu filters======================================================================

/* add css class to navigation list items */
add_filter('nav_menu_css_class', 'add_class_on_nav_menu_li_element', 1, 1);
function add_class_on_nav_menu_li_element($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

/* add css class to navigation list links <a> */
add_filter('wp_nav_menu', 'add_class_on_nav_menu_anchor_element');
function add_class_on_nav_menu_anchor_element($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link" style="margin:1px;"', $ulclass);
}

// =====================================================================================================

/* Set admin-ajax-url to js variable in html-head element======================================================== */
add_action('wp_head', 'hook_admin_url_in_head_element');
function hook_admin_url_in_head_element() {
    ?>
    <script>
       let ajaxUrl = "<?php  echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php
}
