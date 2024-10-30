<?php
/*
Plugin Name: Limit parameter for gallery shortcode
Plugin URI: https://wordpress.org/plugins/limit-parameter-for-gallery-shortcode/
Description: Add limit parameter to the gallery shortcode
Version: 2.0
Author: Nico Boehr
License: GPLv2 or later
Tested up to: 4.7
*/

class GalleryLimit {

	private $limit = null;
	private $offset = null;
	
	const LIMIT_PARAMETER_NAME = 'limit';
	const OFFSET_PARAMETER_NAME = 'offset';

	function setup() {
		// get the attributes passed to the gallery shortcode
		add_filter('shortcode_atts_gallery', array($this, 'getShortcodeAtts'), 20, 3);

		// limit the query to the given numer of images
		add_action('pre_get_posts', array($this, 'limitQuery'));

		// reset the limit parameter
		add_filter('gallery_style', array($this, 'resetLimit'), 20, 1);
	}

	function getShortcodeAtts($out, $pairs, $atts) {
		if (!empty($atts[self::LIMIT_PARAMETER_NAME]) && is_numeric($atts[self::LIMIT_PARAMETER_NAME])) {
			$this->limit = $atts[self::LIMIT_PARAMETER_NAME];
		} else {
			$this->limit = null;
		}
		
		if (!empty($atts[self::OFFSET_PARAMETER_NAME]) && is_numeric($atts[self::OFFSET_PARAMETER_NAME])) {
			$this->offset = $atts[self::OFFSET_PARAMETER_NAME];
		} else {
			$this->offset = null;
		}

		return $out;
	}

	function resetLimit($data) {
		$this->limit = null;
		return $data;
	}

	function limitQuery($q) {
		if ($this->limit != null) {
			$q->set('posts_per_page', $this->limit);
		}
		
		if ($this->offset != null) {
			$q->set('offset', $this->offset);
		}
	}
}

$gl = new GalleryLimit();
$gl->setup();
