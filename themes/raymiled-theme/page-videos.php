<?php /* Template Name: Página Videos Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Videos
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

/**
  * Obtener la imagen destacada de la página
  */

$featured_image = has_post_thumbnail( $post->ID ) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : '';


/**
  * Obtener todos los videos
  */ 
	$args  = array(
		'posts_per_page' => -1,
		'post_type'      => 'theme-videos',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_status'    => 'publish'
	);
	
	$videos = get_posts( $args );

?>

<!-- Contenedor Sección -->
<section class="sectionContainerMultimedia <?= $featured_image !== '' ? 'bgFeaturedImage' : '' ?>" style="background-image: url(<?= $featured_image; ?>);">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerFlex">

		<?php if( $videos ) : ?>
			
			<?php foreach( $videos as $video ): ?>
			
			<!-- Item Preview -->
			<?php 
				$link_video = str_replace( 'watch?v=' , 'embed/' , $video->post_content );
			?> 
			<div class="itemVideoPreview">

				<iframe src="<?= $link_video; ?>" frameborder="0" allowfullscreen ></iframe>

			</div> <!-- /.itemVideoPreview -->

			<?php endforeach; ?>

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
