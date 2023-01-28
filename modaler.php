<?php

/*
 * Plugin Name: @ Modaler
 * Description: Modal and Offcanfas layouts
 * Author: uptimizt
 * GitHub Plugin URI: https://github.com/uptimizt/content-kit
 * Text Domain: modaler
 * Domain Path: /languages
 * Version: 0.230128
 */

 namespace Modaler;

 defined('ABSPATH') || die;

add_shortcode('modaler', function () {
  ob_start();
  include __DIR__ . "/templates/modal.php";
  include __DIR__ . "/templates/offcanvas.php";
  ?>

  <?php
    return ob_get_clean();
});


add_action('wp_enqueue_scripts', function () {
  $css_path = 'frontend/main.css';
  $css_fullpath = __DIR__ . '/frontend/main.css';
  $css_version = filemtime($css_fullpath);
  $css_url = plugins_url($css_path, __FILE__);
	wp_enqueue_style('modaler-style', $css_url, [], $css_version);
  $js_path = 'frontend/main.js';
  $js_fullpath = __DIR__ . '/' . $js_path;
  $js_version = filemtime($js_fullpath);
  $js_url = plugins_url($js_path, __FILE__);
	wp_enqueue_script('modaler-js', $js_url, [], $js_version);
});


$files = glob(__DIR__ . '/includes/*.php');
foreach ($files as $file) {
  require_once $file;
}


