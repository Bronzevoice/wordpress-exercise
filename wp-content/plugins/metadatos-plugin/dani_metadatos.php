<?php

/*
Plugin Name: Agregar campo y guardar valor de input.
Plugin URI: www.wordpress.com/plugins
Description: Plugin para practicar plugins bro
Author: Daniel Moreno López
Version: 1.0
License: GL2


*/

add_action("add_meta_boxes", "dani_agregar_campo");
add_action("save_post", "guardar_campo");
add_filter("the_content","get_content");

/**
Cargamos los datos del post
*/
if(!function_exists("carga_data")){
	function carga_data(){
		$values= get_post_custom($post->ID);
		$campo = esc_attr($values["campo"][0]);
		return $campo;
	}
}


if(!function_exists("dani_agregar_campo")){
	function dani_agregar_campo(){
		add_meta_box("campo","Nuevo campo", "agregar_campo","post");
	}
}

if(!function_exists("agregar_campo")){
	function agregar_campo(){
		?>
		<label>Nuevo campo</label>
		<input type="text" name="campo" id="campo" value="<?php echo carga_data();?>" placeholder="Nuevo campo" />
		<?php
	}
}

/**
Guardamos lo que se escribió en el campo
*/
if(!function_exists("guardar_campo")){
	function guardar_campo($post_id){
		if(defined( 'DOING_AUTOSAVE')&& DOING_AUTOSAVE){
			return;
		}

		if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
        $dato=sanitize_text_field($_POST["campo"]);
        update_post_meta( $post_id, 'campo', $dato );
	}
}

/**
*Mostramos el detalle del campo
*/
if(!function_exists("get_content")){
		function get_content($content){
			if(!is_singular('post')){
				return $content;
			}else{
				$content.=" <hr/>Autor: ".carga_data();
				return $content;
			}

		}	
 

}

?>