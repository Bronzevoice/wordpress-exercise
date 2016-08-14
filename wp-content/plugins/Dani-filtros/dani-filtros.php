<?php
/*
Plugin Name: daniel-filtro con ñandú
Plugin URI: www.wordpress.com/plugins
Description: Plugin para practicar plugins bro
Author: Daniel Moreno López
Version: 1.0
License: GL2


*/

add_filter("the_title","dani_Filtros_EditTitulos");
add_filter("the_content", "dani_Filtros_EditCuerpo");

/**esta función agrega "hola" antes de cada título */

if(!function_exists("dani_Filtros_EditTitulos")){
	function dani_Filtros_EditTitulos($text){
		return "hola mamon    ".$text;
	}
}

/**esta función transforma a mayúscula el cuerpo tel texto */

if(!function_exists("dani_Filtros_EditCuerpo")){

	function dani_Filtros_EditCuerpo($text){
		return ucwords($text);


	}
}


?>