<?php
/**
 *
 * The template for displaying all projects
 * @package WordPress
 * @subpackage wp-portfolio
 * @version  1.0.0
 * @author  Jeevaka
 */

get_header(); ?>

    <div class="m-0 p-0">
        <h1 class="text-light py-4 text-center">LATEST PROJECTS</h1>
        <?php do_shortcode("[view_wp_portfolio_details]") ?>
    </div>

<?php get_footer();?>
