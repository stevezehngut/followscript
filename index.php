<?php
/*
Plugin Name: Follow Script
*/

add_action( 'wp_enqueue_scripts', 'my_enqueue' );

function my_enqueue() {
	wp_enqueue_script( 'ajax-script', plugins_url( 'follow.js', __FILE__ ), array('jquery'));
	wp_localize_script( 'ajax-script', 'ajax_object',
    	array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
}


add_action('wp_ajax_my_action', 'my_action_callback');
add_action('wp_ajax_nopriv_my_action', 'my_action_callback');

function my_action_callback() {
	
	global $wpdb;
	
	error_log(print_r($post, 1));
	$data = intval( $_POST['data'] );
	
	
	
    echo 'success';

	die(); // this is required to return a proper result
}


add_filter('the_content', 'add_post_content');

function add_post_content($content) {
	if(!is_feed() && !is_home()) {
		global $post;
		$content .= '<p><input type="button" class="follow" value="Follow" data="' . $post->ID . '" /></p>';
	}
	return $content;
}

?>
