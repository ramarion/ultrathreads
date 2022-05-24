function wpdocs_kantbtrue_init() {
    $labels = array(
        'name'                  => _x( 'Events', 'Post type general name', 'ultrathread' ),
        'singular_name'         => _x( 'Event', 'Post type singular name', 'ultrathread' ),
        'menu_name'             => _x( 'Events', 'Admin Menu text', 'ultrathread' ),
        'name_admin_bar'        => _x( 'Event', 'Add New on Toolbar', 'ultrathread' ),
        'add_new'               => __( 'Add New', 'ultrathread' ),
        'add_new_item'          => __( 'Add New event', 'ultrathread' ),
        'new_item'              => __( 'New event', 'ultrathread' ),
        'edit_item'             => __( 'Edit event', 'ultrathread' ),
        'view_item'             => __( 'View event', 'ultrathread' ),
        'all_items'             => __( 'All eventss', 'ultrathread' 
        'search_items'          => __( 'Search events', 'ultrathread' ),
        'parent_item_colon'     => __( 'Parent events:', 'ultrathread' ),
        'not_found'             => __( 'No events found.', 'ultrathread' ),
        'not_found_in_trash'    => __( 'No events found in Trash.', 'ultrathread' ),
        'featured_image'        => _x( 'Event Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ultrathread' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ultrathread' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ultrathread' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ultrathread' ),
        'archives'              => _x( 'Event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ultrathread' ),
        'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'ultrathread' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'ultrathread' ),
        'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'ultrathread' ),
        'items_list_navigation' => _x( 'Events list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ultrathread' ),
        'items_list'            => _x( 'Events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'ultrathread' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Event custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'event' ),
        'capability_type'    => 'post',
        'has_archive'        => 'events',
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );

    register_post_type( 'ultrathread_event', $args );
}
add_action( 'init', 'wpdocs_kantbtrue_init' );