<?php
/**
 * The template for displaying  single service post
 *
 * @package WordPress
 * @subpackage sas-creative
 * @version  1.0.0
 * @author  Jeevaka
 *
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
                                    <div class="p-1 text-headings-color">
                                        <h1><?php echo strtoupper(get_the_title()); ?></h1>
                                    </div>
                                    <!--Post Content-->
                                    <div class="post-content py-2 text-content-color">
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
            echo 'No service is found';
        }
        ?>
    </div>

<?php
get_footer();
