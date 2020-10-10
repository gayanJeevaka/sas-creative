<?php

$projects = new WP_Query(
    ['posts_per_page' => 20,
        'post_type' => 'project',
        'post_status' => 'publish',
        'orderby' => 'rand',
    ]);
?>

<div class="container-fluid">

    <?php if(is_home()): ?>
    <!-- Portfolio title ====================================================-->
    <div class="my-5 col-lg-11 mx-auto p-1">
        <div class="mx-auto text-center">
            <h2 class="portfolio-title">
                <span> LATEST WORK </span>
            </h2>
        </div>
    </div>
    <!-- //Portfolio title ====================================================-->
    <?php endif; ?>

    <div class="col-xl-11 m-auto pb-4">
        <div class="row justify-content-center">

            <?php
            if ($projects->have_posts()) :
                while ($projects->have_posts()) :$projects->the_post();
                    ?>
                    <div class="col-lg-4 col-md-6  py-4"
                         onclick="window.location='<?php echo get_the_permalink(); ?>'">
                        <div class="project-info-container h-100 text-center">
                            <!-- only show if there is a image  -->
                            <?php if (has_post_thumbnail()): ?>
                                <div class="col-sm-12 mt-3">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="the project cover image"
                                         class="my-4">
                                </div>
                            <?php endif; ?>

                            <div class="py-2 project-title">
                                <h4 class="m-0 p-0"><?php echo strtoupper(get_the_title()); ?></h4>
                            </div>


                        </div>
                    </div>

                <?php
                endwhile;
            else:
                ?>
                <h4 class='text-danger pl-4 col'>404 : No Projects are found !</h4>
            <?php endif; ?>

        </div>
    </div>
</div>