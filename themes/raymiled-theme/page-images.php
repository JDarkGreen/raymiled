<?php /* Template Name: Página Imágenes Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Imágenes
 *
 */

/**
  * Objeto actual
  */
global $post;

/*
 * Obtener Header
 */
get_header(); 

/*
 * Extraer opciones del tema
 */
$options = get_option("theme_settings");

/*
 * Importar banner de Página
 */

include( locate_template('partials/banner-top-page.php') );

/*
 * Obtener todos las galerías
 */ 
$args  = array(
	'posts_per_page' => -1,
	'post_type'      => 'theme-images',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'post_status'    => 'publish'
);

$gal_images = get_posts( $args );

?>

<!-- Contenedor Sección -->
<section class="sectionContainerMultimedia">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">

		<?php if( count($gal_images) > 0 ) : ?>
			
			<div class="containerFlex">
				<?php foreach( $gal_images as $image ) : ?>

				<?php if( has_post_thumbnail($image->ID) ) : ?>

					<?php  
						$url_image = wp_get_attachment_url( get_post_thumbnail_id($image->ID) );
					?>
				
				<!-- Imagen -->
				<a href="<?= $url_image; ?>" class="itemPreviewImage containerRelative gallery-fancybox" title="<?= $image->post_title; ?>" rel="galeria-images">
					
					<figure class="featured-image" style="background-image : url(<?= $url_image; ?>)"></figure> <!-- /itemPreviewImage -->

					<!-- Icono on hover -->
					<span class="icon-zoom containerFlex containerAlignContent">
						<!-- Icon -->
						<i class="fa fa-search" aria-hidden="true"></i>
					</span>

				</a> <!-- /gallery fancybox -->

				<?php endif; ?>

				<?php endforeach; ?>
			
			</div> <!-- /. -->

		<?php endif; ?>

	</div> <!-- /.pageWrapperLayout -->

</section> <!-- /.sectionContainerMultimedia -->


<?php  
	/*
	 * Importar partial de contacto
	 */
	include( locate_template('partials/section-contact-banner.php') );
?>


<!-- Footer -->
<?php get_footer(); ?>
