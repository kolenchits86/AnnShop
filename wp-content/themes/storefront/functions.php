<?php

add_action('admin_menu', function(){
	add_theme_page('Настроить1', 'Настроить2', 'edit_theme_options', 'customize.php');
 });
 add_action('customize_register', function($customizer){
    $customizer->add_section(
        'example_section_one',
        array(
            'title' => 'Общие настройки',
            'description' => 'Данные магазина',
            'priority' => 11,
		)	
	);
	$customizer->add_setting(
		'phone',
		array('default' => '+79226511699')
	);
	$customizer->add_setting(
		'adress',
		array('default' => 'г. Югорск, ул. Мира 4-64')
	);
	$customizer->add_setting(
		'email',
		array('default' => 'kolenchits86@gmail.com')
	);
	$customizer->add_control(
		'phone',
		array(
			'label' => 'Телефон',
			'section' => 'example_section_one',
			'type' => 'text',
		)
	);
	$customizer->add_control(
		'adress',
		array(
			'label' => 'Адрес',
			'section' => 'example_section_one',
			'type' => 'text',
		)
	);
	$customizer->add_control(
		'email',
		array(
			'label' => 'E-mail',
			'section' => 'example_section_one',
			'type' => 'text',
		)
	);
});


/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
