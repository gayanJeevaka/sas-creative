<?php
/**
 * @package wordpress
 * @subpackage sas-creative
 * @author Jeevaka
 * @version 1.0.0
 * @description Handle service (custom post) details
 *
 */


add_action("init", "register_custom_post_type_service");
function register_custom_post_type_service()
{

    $labels = [
        'name' => _x('Services', ''),
        'singular_name' => _x('Service', ''),
        'menu_name' => _x('Services', ''),
        'name_admin_bar' => _x('Service', ''),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Service'),
        'new_item' => __('New Service'),
        'edit_item' => __('Edit Service'),
        'view_item' => __('View Service'),
        'all_items' => __('All Services'),
        'search_items' => __('Search Service'),
        'parent_item_colon' => __('Parent Service:'),
        'not_found' => __('No services found.'),
        'not_found_in_trash' => __('No service found in Trash.'),
        'featured_image' => _x('Service Cover Image', ''),
        'set_featured_image' => _x('Set cover image', ''),
        'remove_featured_image' => _x('Remove cover image', ''),
        'use_featured_image' => _x('Use as cover image', ''),
        'archives' => _x('Service archives', ''),
        'insert_into_item' => _x('Insert into service', ''),
        'uploaded_to_this_item' => _x('Uploaded to this Service', ''),
        'filter_items_list' => _x('Filter services list', ''),
        'items_list_navigation' => _x('Services list navigation', ''),
        'items_list' => _x('Service list', ''),

    ];

    $args = array(
        'labels' => $labels,
        'description' => 'Manage all our services',
        'public' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'service', 'with_front' => true], //'with_front' => true // work with font-end
        'capability_type' => 'post',
        'has_archive' => true, // for all services
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail'),
        'exclude_from_search' => false, // Search with other post from front-end search form

    );

    register_post_type("service", $args);
}

add_filter('post_row_actions', 'remove_quick_edit_service_custom_post__hover_action');
function remove_quick_edit_service_custom_post__hover_action($actions)
{
    global $post;
    if ($post->post_type == "service") {
        unset($actions['inline hide-if-no-js']);
    }
    return $actions;
}

/* add columns for custom post type */
function set_table_columns_for_service_custom_post()
{
    return [
        'cb' => "<input type='checkbox'/>",
        'title' => 'Service Name',
        'description' => 'Description',
        'date' => 'Date',
        'author' => 'Author'];
}

/* action {manage_{new post type}_posts_columns} */
add_action('manage_service_posts_columns', 'set_table_columns_for_service_custom_post');

function show_additional_columns_custom_post_service($column,  $post_id) {
    $postObj = get_post($post_id);
    switch ($column) {
        case 'description':
            echo wp_trim_words($postObj->post_content, 10);
            break;
        default:
            return "No value is present";
    }
}
/* action {manage_{new post type}_posts_custom_column} */
add_action('manage_service_posts_custom_column', 'show_additional_columns_custom_post_service', 10, 2);


/* sorting columns
 Filter name :- manage_{custom-post type}-item_sortable_columns ==================================================*/
add_filter('manage_edit-service_sortable_columns', 'sort_service_post_data_by_columns');
function sort_service_post_data_by_columns($columns)
{
    $columns['author'] = "author"; // sort by author
    return $columns;
}


/* Custom post type service , service details editor meta-box  ================================= */
function add_meta_box_custom_post_service()
{
    add_meta_box('service_data', "Service Details", "set_service_details_meta_box_callback", 'service', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_meta_box_custom_post_service');

function set_service_details_meta_box_callback(WP_Post $post)
{
    $args = [
        'media_buttons' => false,
        'textarea_name' => 'service_details',
        'textarea_rows' => 15,];
    wp_editor($post->post_content, 'txtServiceDetails', $args);
}

function save_meta_box_value_custom_post_service($post_id, $post)
{
    $serviceDetails = $_POST['service_details'] ?? null;
    if ($post->post_type == 'service' && isset($serviceDetails)) {

        if (!wp_is_post_revision($post_id)) {

            // unhook this function so it doesn't loop infinitely for revisions
            remove_action('save_post', 'save_meta_box_value_custom_post_service');

            // update the post, which calls save_post again
            $postUpdatedData = ['ID' => $post_id, 'post_content' => $serviceDetails];
            wp_update_post($postUpdatedData);

            // re-hook this function
            add_action('save_post', 'save_meta_box_value_custom_post_service');
        }
    }
}
add_action('save_post', 'save_meta_box_value_custom_post_service', 10, 2);

