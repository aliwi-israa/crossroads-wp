<?php
/**
 * regiter hierarchical categories
 */

function register_service_category_taxonomy() {
register_taxonomy('service-category', 'service', [
  'label' => 'Service Categories',
  'hierarchical' => true,
  'rewrite' => ['slug' => 'service-category'],
  'public' => true,
  'show_in_rest' => true,
]);
}
add_action('init', 'register_service_category_taxonomy');
/**
 * register services post type
 */
function register_services_post_type() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'archives'              => 'Service Archives',
        'attributes'            => 'Service Attributes',
        'parent_item_colon'     => 'Parent Service:',
        'all_items'             => 'All Services',
        'add_new_item'          => 'Add New Service',
        'add_new'               => 'Add New',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'update_item'           => 'Update Service',
        'view_item'             => 'View Service',
        'view_items'            => 'View Services',
        'search_items'          => 'Search Services',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into service',
        'uploaded_to_this_item' => 'Uploaded to this service',
        'items_list'            => 'Services list',
        'items_list_navigation' => 'Services list navigation',
        'filter_items_list'     => 'Filter services list',
    );

    $args = array(
        'label'                 => 'Service',
        'description'           => 'Custom Post Type for services offered',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields','excerpt'),
        'taxonomies'            => array('service-category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'services', 'with_front' => false),
        'show_in_rest'          => true,
    );

    register_post_type('service', $args);
}
add_action('init', 'register_services_post_type');
/**
 * register team member post type
 */
function register_team_member_post_type() {
    $labels = array(
        'name'               => 'Team Members',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Our Team',
        'name_admin_bar'     => 'Team Member',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team Member',
        'new_item'           => 'New Team Member',
        'edit_item'          => 'Edit Team Member',
        'view_item'          => 'View Team Member',
        'all_items'          => 'All Team Members',
        'search_items'       => 'Search Team Members',
        'not_found'          => 'No team members found.',
        'not_found_in_trash' => 'No team members in trash.',
    );

    $args = array(
        'label'               => 'Team Members',
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'team'),
        'show_in_rest'        => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-groups',
    );

    register_post_type('team_member', $args);
}
add_action('init', 'register_team_member_post_type');
/**
 * register FAQ post type
 */
function register_faq_post_type() {
    register_post_type('faq', [
        'labels' => [
            'name'          => 'FAQs',
            'singular_name' => 'FAQ',
            'add_new'       => 'Add New FAQ',
            'add_new_item'  => 'Add New FAQ',
            'edit_item'     => 'Edit FAQ',
            'new_item'      => 'New FAQ',
            'view_item'     => 'View FAQ',
            'search_items'  => 'Search FAQs',
        ],
        'public'          => true,
        'show_in_rest'    => true,
        'supports'        => ['title', 'editor'],
        'rewrite'         => ['slug' => 'faq'],
        'has_archive'     => true,
        'menu_icon'       => 'dashicons-editor-help',
    ]);
}
add_action('init', 'register_faq_post_type');