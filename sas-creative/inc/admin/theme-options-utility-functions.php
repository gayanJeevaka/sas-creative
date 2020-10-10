<?php

/**
 * Register theme settings section
 *
 * @param string $sectionId
 * @param string $pageSlug
 * @param string $sectionTitle
 * @param string $settingsId
 * @param string $callback
 */

function register_theme_setting_section(string $sectionId, string $pageSlug, string $sectionTitle , string $settingsId , string $callback){


    /* 1. add Section with a slug ,theme_options=slug_name */
    add_settings_section( $sectionId,  $sectionTitle, null, $pageSlug );

    /* 2. add settings field */
    // add_settings_field($id, $title, $callback, $page, $section)

    add_settings_field( $settingsId, '', $callback, $pageSlug, $sectionId );

    /* 3. register the above setting field to the section
      4. define controllers inside setting's callback function */

    register_setting( $sectionId, $settingsId );
}

/**
 * Generate controller  label
 *
 * @param string $labelName
 * @param string $ctrlId
 * @param string $labelCssClasses
 */

function generate_controller_label(string $labelName, string $ctrlId ='', string $labelCssClasses='font-weight-bold text-muted'){
	?>
	<label for="<?php echo $ctrlId; ?>" class="<?php echo $labelCssClasses; ?>" >
		<?php echo $labelName; ?>
	</label>
<?php
}

/**
 * Generate image controller for theme options
 * @param string $ctrlName
 * @param string $ctrlId
 * @param string $imagePreviewId
 * @param string $ctrlValue
 * @param string $altText
 */

function generate_image_controller(string $ctrlName , string $ctrlId,  string $imagePreviewId, string $ctrlValue , string $altText){
	?>
    <div>
        <div class="col">
            <input type="hidden" name="<?php echo $ctrlName; ?>"
                   id="<?php echo $ctrlId ;?>"
                   value="<?php echo $ctrlValue ; ?>">
            <button type="button" class="button" onclick="uploadImage(this)"
                    data-cover_img_id="#<?php echo $imagePreviewId ;?>"
                    data-cover_img_hidden_field="#<?php echo $ctrlId ;?>">
                + Upload Image
            </button>
        </div>
        <div class="col mt-1">
            <img src="<?php echo $ctrlValue; ?>"
                 width="125" alt="<?php echo  $altText; ?>" id="<?php echo $imagePreviewId ;?>">
        </div>
    </div>
	<?php
}

/**
 * @param string $ctrlType
 * @param string $ctrlName
 * @param string $ctrlId
 * @param string $ctrlValue
 * @param string $placeHolder
 * @param string $cssClasses
 */

function generate_input_controller(string $ctrlType , string $ctrlName, string $ctrlId , string $ctrlValue , string $placeHolder ='', string $cssClasses = ''){
    ?>
    <div class="ml-2">
        <input class="<?php echo $cssClasses; ?>" type="<?php echo  $ctrlType; ?>" id="<?php echo $ctrlId ;?>"
               name="<?php echo $ctrlName; ?>" placeholder="<?php echo $placeHolder; ?>"
               value="<?php echo $ctrlValue; ?>">
    </div>
<?php
}