<?php  
/***
*--------------------------------------------------------------
* Este archivo registra las nuevas taxonomías agregadas
*---------------------------------------------------------------
***/

//create a custom taxonomy
add_action( 'init', 'create_category_taxonomy', 0 );

function create_category_taxonomy() 
{

  /**
  * Categoría Imágenes
  */
  $labels_images = array(
    'name'             => __( 'Categoría Imágenes'),
    'singular_name'    => __( 'Categoría Imágenes'),
    'search_items'     => __( 'Buscar Categoría Imágenes'),
    'all_items'        => __( 'Todas Categorías de Imágenes' ),
    'parent_item'      => __( 'Categoría padre de Imágenes' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Imágenes' ), 
    'update_item'      => __( 'Actualizar categoría de Imágenes' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Imágenes' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Imágenes' ),
    'menu_name'        => __( 'Categoria Imágenes' ),
  ); 

  // Ahora registramos esta taxonomia
  register_taxonomy('images_category',array('theme-images'), array(
    'hierarchical'     => true,
    'labels'           => $labels_images,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'images-category' ),
  ));  


}


?>