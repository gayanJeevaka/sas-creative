<?php
/**
 * The archive page for displaying all services
 * @package WordPress
 * @subpackage sas-creative
 * @version  1.0.0
 *
 */

$services = new WP_Query(
    ['posts_per_page' => 30,
        'post_type' => 'service',
        'post_status' => 'publish',
        'orderby' => 'rand',
    ]);
get_header();
?>

<div class="container-fluid">
    <h1 class="text-headings-color py-4 text-center">OUR SERVICES</h1>
        <?php get_template_part("/template-parts/page/our-services"); ?>
</div>


<?php
get_footer();
