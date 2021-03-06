<?php
/**
 * Color: Footer Widgets Body
 *
 * @since 3.5.0
 */

if ( ! defined( 'ABSPATH' ) || ! $wp_customize instanceof WP_Customize_Manager ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_setting( 'color-footer-widgets-text', array(
	'default' => astoundify_themecustomizer_get_colorscheme_mod_default( 'color-footer-widgets-text' ),
	'transport' => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize,
	'color-footer-widgets-text',
	array(
		'label'   => __( 'Text', 'jobify' ),
		'section' => 'colors-footer-widgets',
		'priority' => 0,
	)
) );
