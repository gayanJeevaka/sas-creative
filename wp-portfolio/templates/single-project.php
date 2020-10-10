<?php
/**
 *
 * The template for displaying all single project
 * @package WordPress
 * @subpackage wp-portfolio
 * @version  1.0.0
 * @author  Jeevaka
 */
get_header();
?>

    <div class="container-fluid">
        <div class="row col-xl-10 col-lg-10 col-md-12 mx-auto mt-3">

            <?php
            if (have_posts()) {
                while (have_posts()) : the_post();
                    ?>
                    <div class="col-12">
                        <div class="row">
                            <!-- project content -->
                            <div class="col-12">

                                <div class="row">
                                    <!-- only show if there is a image  -->
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="col-sm-12 mt-3">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="the post image"
                                                 class="post-featured-image">
                                        </div>
                                    <?php endif; ?>

                                    <div class="text-justify col-sm-12 mt-3">
                                        <!--Post Title-->
                                        <div class="p-1 text-white">
                                            <h1><?php echo strtoupper(get_the_title()); ?></h1>
                                        </div>
                                        <!--Post Content-->
                                        <div class="post-content py-2 text-light">
                                            <?php the_content(); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                <?php
                endwhile;
            } else {
                echo "<h1 class='text-danger'>No projects are found !!</h1>";
            }
            ?>
        </div>
    </div>

<?php
get_footer();
