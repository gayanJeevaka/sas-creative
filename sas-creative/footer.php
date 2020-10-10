<?php
 $themeOptions = (object) get_option('common_settings');

$latestPosts = wp_get_recent_posts(
    ['numberposts' => 1,
        'post_type' => 'post',
        'post_status' => 'publish',
    ], OBJECT);
?>
</div>
<!-- div body container -->

<footer id="footer" class="mt-5 footer-container p-0 pt-2">
    <div class="col-xl-11 mx-auto">
        <div class="row justify-content-center mx-auto">

            <!-- Latest post ============================================================= -->
            <div class="col-lg-3 col-md-4 col-sm-6 ">
                <div class="my-4">
                    <h4 class="text-headings-color">From The Blog</h4>
                </div>
                <!-- Latest post content-->
                <div>
                    <?php foreach ($latestPosts as $latestPost):
                        $postUser = get_userdata($latestPost->post_author);
                    ?>
                    <div class="mb-3 text-highlights-color">
                        <h5><?php echo $latestPost->post_title; ?></h5>
                    </div>
                    <div class="mb-2">
                      <span class="text-highlights-color"> <?php echo ucfirst($postUser->roles[0] ); ?></span>,
                        <?php echo $postUser->display_name; ?>
                    </div>
                        <div class="mb-2">
                            <?php echo $latestPost->post_date; ?>
                        </div>
                    <div class="mb-2 text-justify">
                        <?php echo wp_trim_words($latestPost->post_content, 30); ?>
                    </div>
                    <div class="mb-2">
                        <a class="text-highlights-color" href="<?php echo get_the_permalink($latestPost); ?>">Read More &#187;</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!--Quick links =============================================================== -->
            <div class="col-lg-3  col-md-4 col-sm-6 ">
                <div class="my-4">
                    <h4 class="text-headings-color">Quick Links</h4>
                </div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container' => 'div',
                    'menu_class' => 'footer-menu-items',
                ]);
                ?>
            </div>

            <!-- Latest tweets ========================================================== -->
            <div class="col-lg-3  col-md-4 col-sm-6 ">
                <div class="my-4">
                    <h4 class="text-headings-color">Latest Tweets</h4>
                </div>

                <div class="text-justify">
                    <p><span class="text-highlights-color">@Name-unknown</span>
                        PHP is a popular general-purpose scripting language that is especially suited to web
                        development. Fast, flexible and pragmatic, PHP powers everything from your blog to the most
                        popular websites in the world.
                    </p>
                </div>
                <div class="text-justify">
                    <p>
                        <span class="text-highlights-color">@Name-unknown</span>
                        PHP is a popular general-purpose scripting language that is especially suited to web
                        development. Fast, flexible and pragmatic, PHP powers everything from your blog to the most
                        popular websites in the world.
                    </p>
                </div>
            </div>

            <!-- Contact us form ======================================================= -->
            <div class="col-lg-3  col-md-6 col-sm-6 ">
                <div class="my-4">
                    <h4 class="text-headings-color">Contact Us</h4>
                </div>

                <div class="contact-us-form-container mb-4">
                    <form action="" id="formContactUs">
                        <div class="form-group">
                            <input type="text" name="txtFullName" placeholder="Full Name" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <input type="email" name="txtEmail" placeholder="Email Address" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtSubject" placeholder="Subject" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <textarea name="txtMessage" id="txtMessage"  rows="4" placeholder="Message"
                                      class="form-control form-control-sm"></textarea>
                        </div>
                        <div>
                            <button class="btn-normal" type="submit" >
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--Copyright Message ============================================= -->
    <div class="copyright-container py-3">
        <div class="col-xl-11 mx-auto">
            <div class="row m-0 p-0">
                <div class="text-left col-sm-8">
                   <?php echo  $themeOptions->footer_copyright_text ?? "Footer Copyright Message"; ?>
                </div>
                <div class="text-right col-sm-4">
                    <?php bloginfo(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
