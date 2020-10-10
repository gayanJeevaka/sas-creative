<?php
/* theme settings attributes */
$themeOptions = (object) get_option('common_settings');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="m-0">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>

    <!--  load wp plugins and css scripts enqueued   -->
    <?php wp_head(); ?>
    <style>
        :root{
            --header-bg-color: <?php echo $themeOptions->header_bg_color ?? '#2C1468'; ?>;
            --header-text-color:  <?php echo $themeOptions->header_text_color ?? '#ffffff'; ?>;
            --body-bg-color: <?php echo $themeOptions->body_bg_color ?? '#19153F'; ?>;

            --footer-bg-color: <?php echo $themeOptions->footer_bg_color ?? '#333333'; ?>;
            --footer-copyright-bg-color: <?php echo $themeOptions->footer_copyright_bg_color ?? '#2B2B2B'; ?>;
            --highlights-bg-and_text-color: <?php echo $themeOptions->highlights_color ?? '#74C48E'; ?>;
            --headings-text-color: <?php echo $themeOptions->headings_text_color ?? '#ffffff'; ?>;
            --content-text-color: <?php echo $themeOptions->content_text_color ?? '#989898'; ?>;
            --theme-btn-text-color: <?php echo $themeOptions->button_text_color ?? '#ffffff'; ?>;
        }
    </style>
</head>

<body <?php body_class(); ?> >

<header id="header" class="w-100 ">

    <div class="w-100"  id="divNavMenuStatic">

        <!-- Menu ribbon ===================================================== -->
        <div class="p-0 mb-1  bg-highlights-color w-100" style="height: 5px"> </div>
        <!--  ## Menu ribbon ===================================================== -->

        <nav class="navbar navbar-expand-lg navbar-light p-0">

            <!-- Home icon will be displayed on middle size displays onwards =========================== -->
            <a class="opacity-65 navbar-toggler p-1 pl-2 pr-2" href="<?php echo home_url(); ?>">
                <span class="fa fa-home text-highlights-color" style=" font-size: 1.4em;"></span>
            </a>
            <!-- Site logo =================================================================== -->
            <div class="col-lg-4 col-md-6 col-6 text-center">
                <img src="<?php echo esc_url( $themeOptions->company_logo ?? THEME_SAS_CREATIVE_DIR_URI.'/assets/images/wordpress-logo.png'); ?>"
                     alt="Company Logo image"
                     style="max-width: 125px; width: 100%" class="text-center d-none d-sm-inline">
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarStatic"
                    aria-controls="navbarStatic" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars opacity-65 p-1 text-highlights-color"
                      style=" font-size: 1em;"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarStatic">
                <?php
                wp_nav_menu( [
                    'theme_location' => 'header',
                    'container'      => 'ul',
                    'menu_class'     => 'nav navbar-nav text-center m-auto',
                ] );
                ?>
            </div>
        </nav>
    </div>

</header>

<!--scroll button template part-->
<?php get_template_part( "/template-parts/header/scroll_up_button" ); ?>
<!--/scroll button template part-->


<!--page body goes here-->
<div class="col-xl-12 m-auto p-0" id="body" >

