$ = jQuery.noConflict();

function uploadImage(input) {

    let image = wp.media({
        title: 'Upload Images',
        library: {type: ['image']},
        multiple: false
    }).open().on('select', function () {

        let uploadedCoverImage = image.state().get("selection").first();
        let SelectedImage = uploadedCoverImage.toJSON().url;
        $(input.dataset.cover_img_id).prop("src", SelectedImage).css('display', 'block');
        $(input.dataset.cover_img_hidden_field).val(SelectedImage);
    });
}


$(function () {

    $('.checkbox-settings').change(function () {
        let isChecked = $(this).is(':checked');
        let ctrlName =  $(this).data('controller');
        $(ctrlName).val(isChecked.toString());
    });
});