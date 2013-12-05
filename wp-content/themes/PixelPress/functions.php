<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'emjm2f5tzwyaoqq3bh02l211yyq8qb3n5' );

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );	

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php'			// Theme widgets
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
				
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

// Load WooCommerce functions, if applicable.
if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/
register_nav_menus( array(
	'footer_menu' => 'Footer Menu',
	'foo_sobre' => 'Footer Sobre',
	'foo_loja' => 'Footer Loja',
	'foo_suporte' => 'Footer Suporte',
	'foo_central' => 'Footer Central',
	'head_principal' => 'Principal Menu',
	'head_cart' => 'Carrinho Menu'
) );









/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>