<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

add_action( 'wp_enqueue_scripts', 'theme_scripts');
add_action('after_setup_theme', 'theme_setup');
add_action('customize_register', 'theme_custom_setup');

// ACF / CPT UI
include('theme_config.php');

// Helpers
include('helpers/autoload.php');

function theme_setup() {
  add_theme_support('custom-logo', array(
    'height' => 100, 
    'width' => 300,  
    'flex-height' => true, 
    'flex-width' => true,  
  ));
}

function theme_custom_setup($theme) {  

  $theme->add_section('theme_custom_settings', array(
    'title' => 'Custom settings',
    'priority' => 30,
  ));

  $theme->add_setting('theme_footer_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $theme->add_control('theme_footer_text', array(
    'label' => 'Footer Text',
    'section' => 'theme_custom_settings',
    'type' => 'text',
  ));
}

function theme_scripts() {

  // CSS
  wp_register_style('global', get_template_directory_uri().'/public/css/global.css', false, NULL, 'all' );
  wp_enqueue_style('global');

  wp_register_style('owl.carousel', get_template_directory_uri().'/assets/owl.carousel/owl.carousel.min.css', false, NULL, 'all' );
  wp_enqueue_style('owl.carousel');

  wp_register_style('owl.style', get_template_directory_uri().'/assets/owl.carousel/owl.style.css', false, NULL, 'all' );
  wp_enqueue_style('owl.style');

  // JS
  wp_register_script('jquery-3.5.1.min', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', '', '');
  wp_enqueue_script('jquery-3.5.1.min');
  
  wp_register_script('owl.carousel', get_template_directory_uri() . '/assets/owl.carousel/owl.carousel.min.js', '', '');
  wp_enqueue_script('owl.carousel');
  
  wp_register_script('owl.script', get_template_directory_uri() . '/assets/owl.carousel/owl.script.js', '', '');
  wp_enqueue_script('owl.script'); 
  
  wp_register_script('script', get_template_directory_uri() . '/public/js/script.js', '', '');
  wp_enqueue_script('script'); 
}

function autoload_($directory = __DIR__){  
  $files = glob($directory . '/*.php');;
  
  foreach ($files as $file) {    
    if (is_dir($file) || strpos($file, '.') === 0 || strpos($file, 'autoload') !== false) {
      continue;
    }

    include( $file );
  }
}
