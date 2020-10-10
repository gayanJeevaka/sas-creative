<?php
/**
 * The template for displaying the post, pages are categorized and tagged in the sas-creative theme.
 *
 * @package WordPress
 * @subpackage sas-creative
 * @author Jeevala
 * @version 1.0.0
 */
?>

<?php get_header(); ?>

    <div class="col-xl-11  row w-100 my-5 mx-auto p-0">

        <div class="col-xl-10 pt-2">

            <?php
            if (have_posts()) {
                while (have_posts()):the_post();
                    ?>

                    <div>
                        <h4 class="p-1 widget-title text-justify"><?php the_title(); ?></h4>
                        <p>
                            <!-- Brief content of the post is displayed ================-->
                            <?php the_excerpt(); ?>
                        </p>

                    </div>
                <?php
                endwhile;
            } else {
                echo "<div class='mt-4 p-4 bg-danger text-white'> <h2> 404 : No content Found !</h2> </div>";
            }
            ?>
        </div>

    </div>

<?php
get_footer();
