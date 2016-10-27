<?php /*Single Name: Archivo Single Servicios*/ ?>
<?php 

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

/** PÁGINA DE PISTAS **/
$page_pistas = get_page_by_title('pistas led');
$banner      = $page_pistas;

include( locate_template('partials/banner-top-page.php') );

?>

<main class="mainContainerService">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">

		<div class="row">
			
			<!-- Imágen -->
			<div class="col-xs-12 col-sm-6">
				
				<?php $img_url = wp_get_attachment_url( get_post_thumbnail_id(  $post->ID ) ); ?>

				<figure class="featured-image" style="background-image : url(<?= $img_url; ?>)"></figure>
				
			</div> <!-- /.col-xs-12 col-sm-6 -->

			<!-- Contenido o Información -->
			<div class="col-xs-12 col-sm-6">

				<div class="container-text">

					<!-- Título -->
					<h2 class="titleCommon__section text-xs-center"> 
					<?= $post->post_title; ?> </h2>

					<!-- Espacio --> <br/>

					<!-- Información -->
					<?= apply_filters( 'the_content' , $post->post_content ); ?>

					<!-- Espacio --> <br/>

					<!-- Boton ver servicios -->
					<div class="text-xs-center">
						<a href="<?= get_permalink($page_servicios->ID) ?>" class="btn-show-more text-uppercase"> ver servicios </a>
					</div> <!-- /. -->

				</div> <!-- /.container-text -->
			
			</div> <!-- /.col-xs-12 col-sm-6 -->

		</div> <!-- /.row -->
	
	</div> <!-- /.pageWrapperLayout containerRelative -->	

</main> <!-- /.mainContainerService -->

<!-- Linea Separadora -->
<div id="separator-line"></div>

<?php  
	/*
	 * Importar partial de contacto
	 */
	include( locate_template('partials/section-contact-banner.php') );
?>

<!-- Footer -->
<?php get_footer(); ?>
