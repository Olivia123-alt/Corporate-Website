<?php

$ext = fw_ext( 'extended-search' );

if ( !is_admin() ) {
    wp_enqueue_style( 'extended-search', $ext->locate_URI( '/static/css/styles.css' ), array(), $ext->manifest->get_version() );
    wp_enqueue_script( 'extended-search', $ext->locate_URI( '/static/js/scripts.js' ), array(), $ext->manifest->get_version(), true );
    if ( class_exists( 'Youzify' ) && is_search() ) {
        wp_enqueue_style( 'youzify-directories', YOUZIFY_ASSETS . 'css/youzify-directories.min.css', array( 'dashicons' ), YOUZIFY_VERSION );
    }

    $config              = $ext->get_config();
    $config[ 'ajaxUrl' ] = admin_url( 'admin-ajax.php' );

    wp_localize_script( 'extended-search', 'extendedSearchConfig', $config );
} else {
    wp_enqueue_style( 'extended-search-admin', $ext->locate_URI( '/static/css/admin.css' ), array(), $ext->manifest->get_version() );
}