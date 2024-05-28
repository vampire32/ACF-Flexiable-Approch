<?php
/**
 * diligent_technologies Theme Customizer
 *
 * @package diligent_technologies
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mytheme_customize_register( $wp_customize ) {
    // Add a new section for the Back to Top button
    $wp_customize->add_section( 'back_to_top_section', array(
        'title'       => __( 'Back to Top Button', 'mytheme' ),
        'priority'    => 160,
    ) );

    // Add a setting to enable or disable the button
    $wp_customize->add_setting( 'back_to_top_enable', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );

    // Add a control to the new setting
    $wp_customize->add_control( 'back_to_top_enable', array(
        'label'    => __( 'Enable Back to Top Button', 'mytheme' ),
        'section'  => 'back_to_top_section',
        'settings' => 'back_to_top_enable',
        'type'     => 'checkbox',
    ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function diligent_technologies_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function diligent_technologies_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function diligent_technologies_customize_preview_js() {
	wp_enqueue_script( 'diligent_technologies-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'diligent_technologies_customize_preview_js' );
