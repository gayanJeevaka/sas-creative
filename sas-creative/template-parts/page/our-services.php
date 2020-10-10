<?php
global $services;
/* Rewind the posts and reset post index ================== */
$services->rewind_posts();

?>
<div class="container-fluid " id="containerOurServices">

    <div class="col-xl-11 m-auto pb-4">
        <div class="row justify-content-center">

            <?php
            if ($services->have_posts()) :
                while ($services->have_posts()) :$services->the_post();
            ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 py-4" onclick="window.location='<?php echo get_the_permalink();?>'">
                        <div class="service-info-container p-1 h-100 text-center">
                            <!-- only show if there is a image  -->
                            <?php if (has_post_thumbnail()): ?>
                                <div class="col-sm-12 mt-3">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="the service image" class="my-2">
                                </div>
                            <?php endif; ?>

                            <div>
                                <div class="py-2 service-title">
                                    <h4><?php echo strtoupper(get_the_title()); ?></h4>
                                </div>

                                <div class="px-4 pt-2 pb-4 text-center text-justify">
                                    <?php echo wp_trim_words(get_the_content(), 30); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;
            else:
                ?>
                <h4 class='text-danger pl-4 col'>404 : No services are found !</h4>
            <?php endif; ?>


        </div> <!-- ## end services row -->
    </div>
</div>




