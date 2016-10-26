<?php  
/**
  * Archivo que incluye el banner top de la página
  * 
  */

/**
  * Variables
  */

//El banner
$the_banner = isset($banner) && !empty($banner) ? $banner : get_queried_object();

//El título
$the_title = isset($banner_title) && !empty($banner_title) ? $banner_title : $the_banner->post_title;

//El id de banner
$id_banner = isset($banner) && !empty($banner) ? $banner->ID : get_queried_object_id();


/**
  * Renderizando el banner
  */
	
	if( has_banner_page( $id_banner ) ) :
?>

	<!-- Banner top de Página -->
	<section class="pageCommon__banner containerRelative">

		<!-- Imagen -->
		<img src="<?= get_banner_page( $id_banner ) ?>" alt="<?php bloginfo('description') ?>" class="img-fluid d-block m-x-auto" />
		
		<!-- Título -->
		<h2 class="title-page text-uppercase"> 
			<?= __( $the_title , 'LANG' ); ?> 
		</h2>

	</section> <!-- /.pageCommon__banner -->

<?php endif; ?>



