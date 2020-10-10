<?php
/**
 * The template for displaying the 404 template in the sas-creative theme.
 *
 * @package WordPress
 * @subpackage sas-creative
 * @since 1.0.0
 */
get_header();
?>

    <div class="m-auto">
        <div class="container col-lg-10 col-md-12 error-msg w-100  p-4">

            <h2 class="text-secondary p-3 font-weight-bold"><span class="text-danger">404</span> : Page Not Found&nbsp;!!</h2>
            <h6 class="text-muted text-center">The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place</h6>

        </div>
    </div>

    <script>
        $(function () {
            setTimeout(()=>{
                /* Redirect after 10s*/
                window.location.replace("<?php echo home_url(); ?>")
            },10000);
        });

    </script>
<?php
get_footer();
