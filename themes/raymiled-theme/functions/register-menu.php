<?php  
/** 
* Archivo muestra o contiene los menus del tema 
**/

function register_my_menus(){
	register_nav_menus(

		array(
			'main-menu'  => __('Menu Principal', LANG ),
		)
	);
}
add_action('init', 'register_my_menus');


?>