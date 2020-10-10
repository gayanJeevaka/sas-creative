<?php
/**
 * @package wordpress
 * @subpackage sas-creative
 * @author Jeevaka
 * @version 1.0.0
 * @description Handle Projects (custom post) type projects data
 *
 */


add_action("init", "register_custom_post_type_project");
function register_custom_post_type_project() {

    $labels = [
        'name' => _x('Projects', ''),
        'singular_name' => _x('Project', ''),
        'menu_name' => _x('Projects', ''),
        'name_admin_bar' => _x('Project', ''),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Project'),
        'new_item' => __('New Project'),
        'edit_item' => __('Edit Project'),
        'view_item' => __('View Project'),
        'all_items' => __('All Projects'),
        'search_items' => __('Search Project'),
        'parent_item_colon' => __('Parent Project:'),
        'not_found' => __('No projects are found.'),
        'not_found_in_trash' => __('No project found in Trash.'),
        'featured_image' => _x('Project Cover Image', ''),
        'set_featured_image' => _x('Set cover image', ''),
        'remove_featured_image' => _x('Remove cover image', ''),
        'use_featured_image' => _x('Use as cover image', ''),
        'archives' => _x('Project archives', ''),
        'insert_into_item' => _x('Insert into project', ''),
        'uploaded_to_this_item' => _x('Uploaded to this Project', ''),
        'filter_items_list' => _x('Filter projects list', ''),
        'items_list_navigation' => _x('Projects list navigation', ''),
        'items_list' => _x('Project list', ''),

    ];

    $args = array(
        'labels' => $labels,
        'description'=> 'Manage all our projects',
        'public' => true,
        'menu_icon' => 'dashicons-tide',
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'project', 'with_front' => true], //'with_front' => true // work with font-end
        'capability_type' => 'post',
        'has_archive' => true, // has archive pages for all projects
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail'),
        'exclude_from_search' =>false, // Search with other post from front-end search form

    );

    register_post_type("project", $args);
}

add_filter('post_row_actions', 'remove_quick_edit_custom_post_project_hover_action');
function remove_quick_edit_custom_post_project_hover_action($actions) {
    global $post;
    if ($post->post_type == "project") {
        unset($actions['inline hide-if-no-js']);
    }
    return $actions;
}

/* add columns for custom post type */
function set_table_columns_for_custom_post_project() {
    return [
        'cb' => "<input type='checkbox'/>",
        'title' => 'Project Name',
        'description'=> 'Description',
        'date' => 'Date',
        'author' => 'Author'];
}

/* action {manage_{new post type}_posts_columns} */
add_action('manage_project_posts_columns', 'set_table_columns_for_custom_post_project');

function show_additional_columns_custom_post_project($column,  $post_id) {
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
add_action('manage_project_posts_custom_column', 'show_additional_columns_custom_post_project', 10, 2);

/* sorting columns
 Filter name :- manage_{custom-post type}-item_sortable_columns ==================================================*/
add_filter('manage_edit-project_sortable_columns', 'sort_data_by_columns_custom_post_project');
function sort_data_by_columns_custom_post_project($columns) {
    $columns['author'] = "author"; // sort by author
    return $columns;
}

/* Custom post type project , project details editor meta-box  ================================= */
function add_meta_box_custom_post_project()
{
    add_meta_box('project_data', "Project Details", "set_project_details_meta_box_callback", 'project', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_meta_box_custom_post_project');

function set_project_details_meta_box_callback(WP_Post $post)
{
    $args = [
        'media_buttons' => false,
        'textarea_name' => 'project_details',
        'textarea_rows' => 15,];
    wp_editor($post->post_content, 'txtProjectDetails', $args);
}

function save_meta_box_value_custom_post_project($post_id, $post)
{
    $projectDetails = $_POST['project_details'] ?? null;
    if ($post->post_type == 'project' && isset($projectDetails)) {

        if (!wp_is_post_revision($post_id)) {

            $postUpdatedData = ['ID' => $post_id, 'post_content' => $projectDetails];

            // unhook this function so it doesn't loop infinitely for revisions
            remove_action('save_post', 'save_meta_box_value_custom_post_project');

            // update the post, which calls save_post again
            wp_update_post($postUpdatedData);

            // re-hook this function
            add_action('save_post', 'save_meta_box_value_custom_post_project');
        }
    }
}
add_action('save_post', 'save_meta_box_value_custom_post_project', 10, 2);

