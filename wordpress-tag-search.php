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