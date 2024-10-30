<?php
/*
Plugin Name: Custom fields in RSS
Description: add custom fields key/value to rss items
Plugin URI:  http://gonahkar.com/wordpress-plugins/custom-fields-in-rss/
Version:     0.1
Author:      Gonahkar
Author URI:  http://gonahkar.com
*/

function custom_fileds_in_rss($post_id) {
	$custom_fields_array = get_post_custom();
	if(count($custom_fields_array) > 2) {
		echo "\n<customfields>\n";
		foreach($custom_fields_array as $key => $custom) {
			if(!preg_match('~^_edit~i', $key)) echo "<$key>" . $custom[0] . "</$key>\n";
		}
		echo "</customfields>\n";
	}
}
add_action('rss2_item','custom_fileds_in_rss');
?>