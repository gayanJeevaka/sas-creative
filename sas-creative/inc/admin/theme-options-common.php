<?php
/**
 * Theme Options admin view
 *
 * @package WordPress
 * @subpackage sas-creative
 * @author Wijesinghe
 * @version 1.0.0
 */

function get_common_theme_options() {

	?>
    <style>
        .form-table th {
            display: none !important;
        }
        .table-no-border tr td {
            border: none !important;
        }
    </style>
    <nav class="nav-tab-wrapper wp-clearfix" aria-label="Secondary menu">
        <a style="background: #ffffff; border-bottom-color: transparent"
           href="<?php echo admin_url( 'admin.php?page=theme-options-common' ); ?>" class="nav-tab nav-tab-active"
           aria-current="page">Common Options
        </a>
    </nav>
    <div class="col-md-10 mx-auto">
        <span> <?php settings_errors(); ?></span>
        <form action="<?php echo admin_url( 'options.php' ); ?>" method="POST" enctype="multipart/form-data">
			<?php
			settings_fields( "common_settings_section" );
			do_settings_sections( "common-theme-options" );
			?>
            <div class="text-left">
                <button type="submit" class="btn btn-success"> Update Theme Options</button>
            </div>
        </form>
    </div>
	<?php
}


function display_common_settings() {
	global $textDomain;
	$commonSettings = (object) get_option( 'common_settings' );
	?>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-sm">

                <!-- home page cover image setting ================================ -->
                <tr>
                    <td class="w-25">
			            <?php generate_controller_label( 'Company Logo' ); ?>
                    </td>
                    <td>
			            <?php generate_image_controller('common_settings[company_logo]', 'txtCompanyLogo',
				            'previewCompanyLogo',  $commonSettings->company_logo ?? '', 'Company Logo image');?>
                    </td>
                </tr>
                <!-- ## home page cover image setting ================================ -->

                <!-- home page cover image setting ================================ -->
                <tr>
                    <td class="w-25">
						<?php generate_controller_label( 'Home Page Cover Image' ); ?>
                    </td>
                    <td>
                        <?php generate_image_controller('common_settings[home_page_cover_image]', 'txtHomePageCoverImage',
                        'previewHomePageCoverImage',  $commonSettings->home_page_cover_image ?? '', 'Home Page cover image');?>
                    </td>
                </tr>
                <!-- ## home page cover image setting ================================ -->

                <!-- Header bg-color setting =========================================== -->
                <tr>
                    <td>
	                    <?php generate_controller_label( 'Header Background Color' , 'clrHeaderBackground' ); ?>
                    </td>
                    <td>
                        <?php generate_input_controller('color', 'common_settings[header_bg_color]' ,
                            'clrHeaderBackground', $commonSettings->header_bg_color ?? '#2C1468');?>

                    </td>
                </tr>
                <!-- ## Header bg-color setting ================================================= -->

                <!-- Header text-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Header Menu Text Color' , 'clrHeaderText' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[header_text_color]' ,
				            'clrHeaderText', $commonSettings->header_text_color ?? '#ffffff');?>

                    </td>
                </tr>
                <!-- ## Header text-color setting =========================================== -->

                <!-- Body bg-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Body Background Color' , 'clrBodyBackground' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[body_bg_color]' ,
				            'clrBodyBackground', $commonSettings->body_bg_color ?? '#19153F');?>
                    </td>
                </tr>
                <!-- ## Body bg-color setting ================================================= -->

                <!--  highlights-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Highlights Color' , 'clrHighlights' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[highlights_color]' ,
				            'clrHighlights', $commonSettings->highlights_color ?? '#74C48E');?>
                    </td>
                </tr>
                <!-- ##  highlights-color setting ================================================= -->

                <!--  content text-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Content Text Color' , 'clrContentText' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[content_text_color]' ,
				            'clrContentText', $commonSettings->content_text_color ?? '#989898');?>
                    </td>
                </tr>
                <!-- ##  content text-color setting ================================================= -->

                <!--  button text-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Button Text Color' , 'clrButtonText' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[button_text_color]' ,
				            'clrButtonText', $commonSettings->button_text_color ?? '#ffffff');?>
                    </td>
                </tr>
                <!-- ##  button text-color setting ================================================= -->

                <!--  highlights-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Headings Text Color' , 'clrHeadingText' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[headings_text_color]' ,
				            'clrHeadingText', $commonSettings->headings_text_color ?? '#ffffff');?>
                    </td>
                </tr>
                <!-- ##  highlights-color setting ================================================= -->

                <!-- Footer bg-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Footer Background Color' , 'clrFooterBackground' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[footer_bg_color]' ,
				            'clrFooterBackground', $commonSettings->footer_bg_color ?? '#19153F');?>
                    </td>
                </tr>
                <!-- ## Footer bg-color setting ================================================= -->

                <!-- Footer copyright bg-color setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Footer Copyright Background Color' , 'clrFooterCopyrightBackground' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('color', 'common_settings[footer_copyright_bg_color]' ,
				            'clrFooterCopyrightBackground', $commonSettings->footer_copyright_bg_color ?? '#2B2B2B');?>
                    </td>
                </tr>
                <!-- ## Footer copyright bg-color setting ================================================= -->

                <!--  Footer copyright msg setting =========================================== -->
                <tr>
                    <td>
			            <?php generate_controller_label( 'Footer Copyright Text' , 'txtCopyright' ); ?>
                    </td>
                    <td>
			            <?php generate_input_controller('text', 'common_settings[footer_copyright_text]' ,
				            'txtCopyright', $commonSettings->footer_copyright_text ?? '' ,'Copyright Text',
                            'form-control form-control-sm');?>
                    </td>
                </tr>
                <!-- ##  Footer copyright msg setting ================================================= -->


            </table>
        </div>
    </div>

	<?php

}
