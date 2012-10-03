<?php
/*
Plugin Name: Wordpress Tag Search
Plugin URI: http://martyspellerberg.com/wordpress-tag-search/
Description: 
Version: 0.1
Author: Marty Spellerberg
Author URI: http://martyspellerberg.com
License: GPLv2+
*/


// Load TDOTF
require_once(dirname(__FILE__) . '/tdotf/tdotf.php');


// Load assets
define('MY_PLUGIN_FOLDER',str_replace("\\",'/',dirname(__FILE__)));

function mca_gallery_scripts_method() {

	wp_enqueue_script("jquery");

    $tagsearchcss = plugins_url( '/assets/tagsearch.css' , __FILE__ );
    wp_register_style('tagsearchcss',$tagsearchcss);
    wp_enqueue_style( 'tagsearchcss');

	$tagsearchjs = plugins_url( '/assets/tagsearch.js' , __FILE__ );
	wp_register_script('tagsearchjs',$tagsearchjs);
	wp_enqueue_script( 'tagsearchjs',array('jquery'));
}

add_action('wp_enqueue_scripts', 'mca_gallery_scripts_method');


function wp_tag_search() {
 
	$tags = get_tags();
	$html = '<div class="taxonomies"><h3>Tags</h3><div class="taglist">';
	foreach ($tags as $tag){
		$tag_link = get_tag_link($tag->term_id);
 
		$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
		$html .= "{$tag->name}</a>";
	}
	
	$html .= '</div></div>';

	echo $html;
 
}


?>