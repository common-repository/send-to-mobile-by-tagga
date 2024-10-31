<?php
/*
Plugin name: Tagga (Send to mobile)
Version: 1.0
Plugin URI: http://tagga.com/
Description: The "Send to mobile" plugin allows blog viewers to send post content by SMS to their phone 
Author: Tristen Georgiou and Jerome Cantin
*/


class tagga_send_to_mobile {

	function tagga_send_to_mobile(){
		add_filter('the_content', array(&$this, 'add_link'), 999999999);
		add_action('wp_head', array(&$this, 'add_js'));
	}

	function add_js() {
		echo "\r\n<script type=\"text/javascript\" src=\"http://www.tagga.com/js/taggawebtoolkit.js\"></script>\r\n";
	}

	function add_link($text){
		
		// the send to mobile button
		$sendToMobileContent = get_the_title(get_the_ID()) . "\n\n" . get_the_content();
		$sendToMobileContent = html_entity_decode(strip_tags($sendToMobileContent), ENT_QUOTES);
		$sendToMobileContent = substr($sendToMobileContent, 0, 80);
		return $text.'<div name="tagga_custom">' . $sendToMobileContent . '</div>';
	}
}

$tagstm &= new tagga_send_to_mobile();
?>