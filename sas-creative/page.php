<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage sas-creative
 * @version  1.0.0
 * @author  Jeevaka
 */
get_header();
?>

    <div class="row col-xl-10 col-lg-10 col-md-12 mx-auto mt-3">

        <?php
        if (have_posts()) {
            while (have_posts()) : the_post();
                ?>
                <div class="col-12">
                    <div class="row">
                        <!-- news content -->
                        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">

                            <div class="row">
                                <!-- only show if there is a image  -->
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="col-sm-12 mt-3">
                                        <img src="<?php the_post_thumbnail_url();?>" alt="the post image" class="post-featured-image">
                                    </div>
                                <?php endif; ?>

                                <div class="text-justify col-sm-12 mt-3">
                                    <!--Post Title-->
                                    <h1 class="p-1 text-white">
                                        <?php the_title(); ?>
                                    </h1>
                                    <!--Post Content-->
                                    <div class="post-content p-1 text-light">
                                        <?php the_content(); ?>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- news widget -->
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                            <?php
                            if (is_active_sidebar('page_widget')) {
                                dynamic_sidebar('page_widget');
                            }
                            ?>
                        </div>
                        <!-- \\news widget -->

                    </div>
                </div>
            <?php
            endwhile;
        } else {
            _e("No content Found !");
        }
        ?>
    </div>

<?php
get_footer();
