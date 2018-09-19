<?php

/**
 * Helper functions for themes based on the Lexi framework
 */

function lexi_partial($dir, array $params = array(), $output = true) {
  $lexi = new \Lexi\Core\Helper;
  $lexi->get_partial($dir, $params, $output);
}

function lexi_truncate($string, $limit, $break=".", $pad="...") {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->truncate($string, $limit, $break, $pad);
}

function lexi_is_child($parent = 0) {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->is_child($parent);
}

function lexi_get_subpages($id = 0) {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->get_subpages($id);
}

function lexi_make_links($content = '') {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->make_url_link($content);
}

function lexi_count_search_results() {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->search_results_count();
}

function lexi_attachment_id_from_url($url = '') {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->get_attachment_id_by_url($url);
}

function lexi_file_size($file) {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->get_file_size($file);
}

function lexi_svg($file) {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->get_svg_code($file);
}

function lexi_make_plural($str) {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->pluralize($str);
}

function lexi_beautify($str) {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->beautify_title($str);
}

function lexi_uglify($str) {
  $lexi = new \Lexi\Core\Helper;
  return $lexi->uglify_title($str);
}
