<?php
/**
 * @package Wordpress
 * @subpackage sas-creative
 * @description display services inside a slider on home-page
 */

global $services;
$noOfServicesDisplay = 0;
?>

<div class="container-fluid">

    <!-- Service details slider ==================================================================================-->
    <div class="main-swiper-container m-0">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <?php
                if ($services->have_posts()):
                    while ($services->have_posts()): $services->the_post();

                        if ($noOfServicesDisplay == 4) {break;}
                        $noOfServicesDisplay++;

                        ?>

                        <div class="swiper-slide col-12">

                            <div class="service-details-slider-container w-100">

                                <!-- Service title ============================================== -->
                                <div class="py-2 text-headings-color">
                                    <h2><?php echo strtoupper(get_the_title()); ?></h2>
                                </div>

                                <!-- Service details ============================================== -->
                                <div class="text-content-color service-details-content">
                                        <?php echo wp_trim_words(get_the_content(), 30); ?>
                                </div>
                                <div class="mt-4" style="font-size: 1.05em;">
                                    <a class="btn-normal px-3 py-2" href="<?php the_permalink(); ?>">Read More Here &#187;</a>
                                </div>

                            </div>
                        </div>
                    <?php
                    endwhile;
                else: ?>
                    <div class="swiper-slide col-12">
                        No Services are found.
                    </div>

                <?php endif;?>
            </div>

            <div class="swiper-button-next text-highlights-color font-weight-bold"></div>
            <div class="swiper-button-prev text-highlights-color font-weight-bold"></div>


        </div>
    </div>
    <!-- \\service details slider ==================================================================================-->

</div>
