<?php
get_header();
$themeOptions = (object) get_option( 'common_settings' );
$services     = new WP_Query(
	[
		'posts_per_page' => 20,
		'post_type'      => 'service',
		'post_status'    => 'publish',
		'orderby'        => 'rand',
	] );
?>
    <!--  Website Banner images ===================================================================================== -->
    <div class="container-fluid header-banner-container content-overflow-hidden">
        <div class="col-xl-8  col-lg-10 mx-auto">
            <div class="row pb-5 pt-4 align-items-center ">
                <div class="col-md-6  col-sm-6">
					<?php get_template_part( "/template-parts/page/service-details-slider" ); ?>
                </div>

                <div class="col-md-6 col-sm-6 d-sm-block d-none text-center header-banner-image">
                    <img src="<?php echo $themeOptions->home_page_cover_image ?? THEME_SAS_CREATIVE_DIR_URI . '/assets/images/outsource.png' ?>"
                         alt="Web site banner image">

                </div>
            </div>
        </div>
    </div>



    <!-- company services template part ==========================================================================-->
    <div class="container-fluid my-5">
		<?php get_template_part( "/template-parts/page/our-services" ); ?>
    </div>
    <!-- //company services template part-->


    <!--Company portfolio shortcode  ========================================================================-->

    <div class="container-fluid">
		<?php do_shortcode( "[view_wp_portfolio_details]" ) ?>
    </div>
    <!-- //Company portfolio shortcode --->



<?php
get_footer();
