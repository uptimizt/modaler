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

add_shortcode('modaler-modal', function ($args = []) {
  ob_start();
  $args['a'] = 58490;
  include __DIR__ . "/templates/modal.php";
  ?>
  <?php
  return ob_get_clean();
});


add_shortcode('modaler', function ($args = []) {
  ob_start();
  $anchor = $args['a'] ?? null;
  if ($anchor) {
    $data = explode('-', $anchor);

    if (isset($data[1])) {
      $post = get_post($data[1]);
    } else {
      return '';
    }
  } else {
    return '';
  }
  if(empty($post)){
    return;
  }

  $type = $data[0];
  switch ($type) {
    case "#modal":
      include __DIR__ . "/templates/modal.php";
      break;
    case "#offcanvas":
      include __DIR__ . "/templates/offcanvas.php";
      break;
    default:
      return '';
}
  // include __DIR__ . "/templates/modal-test.php";
  // include __DIR__ . "/templates/offcanvas-test.php";
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
