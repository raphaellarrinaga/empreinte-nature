<?php
/**
 * Registration logic for the new ACF field type.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'nature_include_acf_field_image_multiple' );
/**
 * Registers the ACF field type.
 */
function nature_include_acf_field_image_multiple() {
	if ( ! function_exists( 'acf_register_field_type' ) ) {
		return;
	}

	require_once __DIR__ . '/class-nature-acf-field-FIELD-NAME.php';

	acf_register_field_type( 'nature_acf_field_image_multiple' );
}
