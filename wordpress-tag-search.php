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

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( !is_plugin_active('tdo-tag-fixes/tdotf.php') ) {
	require_once(dirname(__FILE__) . '/tdotf/tdotf.php');
}


// Load assets

function mca_gallery_scripts_method() {

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

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