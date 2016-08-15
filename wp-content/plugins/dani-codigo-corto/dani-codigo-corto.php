<?php
/*
Plugin Name: daniel-codigo-corto
Plugin URI: www.wordpress.com/plugins
Description: Plugin para practicar plugins bro
Author: Daniel Moreno López
Version: 1.0
License: GL2


*/


add_action('init','dani_codigo_corto');

if(!function_exists('dani_codigo_corto')){

	function dani_codigo_corto(){

		add_shortcode('daniel','codigo_corto');
	}
}

if(!function_exists('codigo_corto')){
	function codigo_corto($args,$content){
		return "<strong>".$content."</strong>";
	}
}



?>