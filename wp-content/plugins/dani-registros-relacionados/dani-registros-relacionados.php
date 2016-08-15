<?php
/*
Plugin Name: daniel-registros-relacionados
Plugin URI: www.wordpress.com/plugins
Description: Plugin para practicar plugins bro
Author: Daniel Moreno López
Version: 1.0
License: GL2


*/

add_filter("the_content",
"dani_post_contenido_relacionado" );

if(!function_exists("dani-post-contenido-relacionado")){
function dani_post_contenido_relacionado($pokemon){
	if(!is_singular('post')){
		return $pokemon;
	}else{
		$categorias = get_the_terms(get_the_ID(),"category");
		$array = array();
		foreach ($categorias as $categoria) {
			# code...
			$array[] = $categoria->term_id;
		}

		$loop= new WP_Query(
			array(
				'category__in'=>$array,
			'posts_per_page'=>2,
			'posts_not_in'=>array(get_the_ID()),
			'orderby'=>'rand'
			)
		);
		if($loop->have_posts()){
			$pokemon.="Post Relacionados";
			$pokemon.="<hr/>";
			$pokemon.="<ul>";
				while($loop->have_posts()){
					$loop->the_post();
					$pokemon.= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
				}

			$pokemon.="</ul>";
		

	
	

	
}
wp_reset_query();
return $pokemon;

}

}




}



?>