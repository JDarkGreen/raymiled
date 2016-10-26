<?php  
/** 
* Archivo contiene los nuevos tipos de post registrados
**/

function create_post_type(){

	/*|-----SLIDER HOME ----------------------|*/
	
	$labels = array(
		'name'               => __('Slider Home'),
		'singular_name'      => __('Slider'),
		'add_new'            => __('Nuevo Slider'),
		'add_new_item'       => __('Agregar nuevo Slider Principal'),
		'edit_item'          => __('Editar Slider'),
		'view_item'          => __('Ver Slider'),
		'search_items'       => __('Buscar Slider'),
		'not_found'          => __('Slider no encontrado'),
		'not_found_in_trash' => __('Slider no encontrado en la papelera'),
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => true,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'show_ui' => true,
		'taxonomies'  => array('post-tag','banner_category'),
		'menu_icon'   => 'dashicons-nametag',
	);

	/*|-----SERVICIOS ----------------------|*/
	
	$labels_services = array(
		'name'               => __('Servicios'),
		'singular_name'      => __('Servicio'),
		'add_new'            => __('Nuevo Servicio'),
		'add_new_item'       => __('Agregar nuevo Servicio'),
		'edit_item'          => __('Editar Servicio'),
		'view_item'          => __('Ver Servicio'),
		'search_items'       => __('Buscar Servicios'),
		'not_found'          => __('Servicio no encontrado'),
		'not_found_in_trash' => __('Servicio no encontrado en la papelera'),
	);

	$args_services = array(
		'labels'      => $labels_services,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-chart-pie',
	);

	/*|-----PRODUCTOS ----------------------|*/
	
	$labels_products = array(
		'name'               => __('Productos'),
		'singular_name'      => __('Productos'),
		'add_new'            => __('Nuevo Producto'),
		'add_new_item'       => __('Agregar nuevo Producto'),
		'edit_item'          => __('Editar Producto'),
		'view_item'          => __('Ver Producto'),
		'search_items'       => __('Buscar Productos'),
		'not_found'          => __('Producto no encontrado'),
		'not_found_in_trash' => __('Producto no encontrado en la papelera'),
	);

	$args_products = array(
		'labels'      => $labels_products,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-cart',
	);


	/*|-----IMAGENES ----------------------|*/
	
	$labels_images = array(
		'name'               => __('Gal. Imágenes'),
		'singular_name'      => __('Imágen'),
		'add_new'            => __('Nueva Imágen'),
		'add_new_item'       => __('Agregar nueva Imágen'),
		'edit_item'          => __('Editar Imágen'),
		'view_item'          => __('Ver Imágen'),
		'search_items'       => __('Buscar Imágen'),
		'not_found'          => __('Imágen no encontrada'),
		'not_found_in_trash' => __('Imágen no encontrada en la papelera'),
	);

	$args_images = array(
		'labels'      => $labels_images,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-images-alt2',
	);

	/*|-----VIDEOS ----------------------|*/
	
	$labels_videos = array(
		'name'               => __('Gal. Videos'),
		'singular_name'      => __('Video'),
		'add_new'            => __('Nuevo Video'),
		'add_new_item'       => __('Agregar nuevo Video'),
		'edit_item'          => __('Editar Video'),
		'view_item'          => __('Ver Video'),
		'search_items'       => __('Buscar Video'),
		'not_found'          => __('Video no encontrado'),
		'not_found_in_trash' => __('Video no encontrado en la papelera'),
	);

	$args_videos = array(
		'labels'      => $labels_videos,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-video-alt2',
	);

	/*|-----PROMOCIONES ----------------------|*/
	
	$labels_promotions = array(
		'name'               => __('Promociones'),
		'singular_name'      => __('Promoción'),
		'add_new'            => __('Nueva Promoción'),
		'add_new_item'       => __('Agregar nueva Promoción'),
		'edit_item'          => __('Editar Promoción'),
		'view_item'          => __('Ver Promoción'),
		'search_items'       => __('Buscar Promoción'),
		'not_found'          => __('Promoción no encontrada'),
		'not_found_in_trash' => __('Promoción no encontrada en la papelera'),
	);

	$args_promotions = array(
		'labels'      => $labels_promotions,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-thumbs-up',
	);

	/*|-----STAFF ----------------------|*/
	
	$labels_staff = array(
		'name'               => __('Staff'),
		'singular_name'      => __('Integrante'),
		'add_new'            => __('Nuevo Integrante'),
		'add_new_item'       => __('Agregar nuevo Integrante'),
		'edit_item'          => __('Editar Integrante'),
		'view_item'          => __('Ver Integrante'),
		'search_items'       => __('Buscar Integrante'),
		'not_found'          => __('Integrante no encontrado'),
		'not_found_in_trash' => __('Integrante no encontrado en la papelera'),
	);

	$args_staff = array(
		'labels'      => $labels_staff,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-groups',
	);


	/*|REGISTRAR|*/
	
	#SLIDER HOME
	register_post_type( 'slider-home' , $args  );

	#SERVICIOS
	register_post_type( 'theme-services' , $args_services );

	#PRODUCTOS
	register_post_type( 'theme-products' , $args_products );

	#IMÁGENES
	register_post_type( 'theme-images' , $args_images );

	#VIDEOS
	register_post_type( 'theme-videos' , $args_videos );

	#PROMOCIONES
	register_post_type( 'theme-promotions' , $args_promotions );

	#STAFF
	register_post_type( 'theme-staff' , $args_staff );


	flush_rewrite_rules();
}

add_action( 'init', 'create_post_type' );


?>