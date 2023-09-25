<?php 

// ACF
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
    'key' => 'group_6511b42f628ca',
    'title' => 'Vídeo post',
    'fields' => array(
      array(
        'key' => 'field_6511b430b48a6',
        'label' => 'Tempo de Duração',
        'name' => 'bx_play_video_duration',
        'aria-label' => '',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'maxlength' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
      ),
      array(
        'key' => 'field_6511b47ab48a7',
        'label' => 'Embed de Vídeo',
        'name' => 'bx_play_video_ID',
        'aria-label' => '',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'maxlength' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'video',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));
});
// END ACF

// Post Types
function cptui_register_my_cpts() {
	/**
	 * Post Type: Vídeos.
	 */

	$labels = [
		"name" => esc_html__( "Vídeos", "bx-desafio" ),
		"singular_name" => esc_html__( "Vídeo", "bx-desafio" ),
	];

	$args = [
		"label" => esc_html__( "Vídeos", "bx-desafio" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "video", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"taxonomies" => [ "video" ],
		"show_in_graphql" => false,
	];

	register_post_type( "video", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );

// Post Taxonomies
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Gêneros.
	 */

	$labels = [
		"name" => esc_html__( "Gêneros", "bx-desafio" ),
		"singular_name" => esc_html__( "Gênero", "bx-desafio" ),
	];

	
	$args = [
		"label" => esc_html__( "Gêneros", "bx-desafio" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "video_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "video_type", [ "video" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


