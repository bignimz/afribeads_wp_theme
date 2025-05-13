<?php


function afri_bead_import_files() {
    return [
        [
            'import_file_name'           => 'Afri-Bead Demo',
            'local_import_file'          => trailingslashit( get_template_directory() ) . 'demo-content/demo-content.xml',
            'local_import_widget_file'   => trailingslashit( get_template_directory() ) . 'demo-content/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-content/customizer.dat',
            'import_preview_image_url'   => get_template_directory_uri() . '/screenshot.png', // optional
            'import_notice'              => __( 'Make sure all required plugins are installed before importing.', 'your-theme' ),
        ],
    ];
}
add_filter( 'ocdi/import_files', 'afri_bead_import_files' );

function afri_bead_after_import_setup() {
    // Assign menus to locations
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', [ 'primary' => $main_menu->term_id ] );

    // Assign front and blog pages
    $front_page = get_page_by_title( 'Home' );
    $blog_page  = get_page_by_title( 'Blog' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page->ID );
    update_option( 'page_for_posts', $blog_page->ID );
}
add_action( 'ocdi/after_import', 'afri_bead_after_import_setup' );