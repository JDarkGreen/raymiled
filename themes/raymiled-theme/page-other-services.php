<?php /* Template Name: Página Other Services Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Other Services
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
 * Obtener Galería de Imágenes
 */
$gallery_images = get_gallery_post( $post->ID ); ?>

<!-- Contenedor Sección -->
<section id="" class="containerBgAndCarousel">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">

		<div class="row">
			
			<!-- Slider / Carousel -->
			<div class="col-xs-12 col-sm-6">

				<?php if( count($gallery_images) >= 2 ): ?>

					<div class="containerRelative">
						
						<!-- Carousel De Imágenes -->
						<div id="carousel-services" class="js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="1" data-dots="false" data-autoplay="true" data-timeautoplay="5000">
						
							<?php foreach( $gallery_images as $image ) : ?>
								
								<!-- Imagen -->
								<?php 
									$url_img   = $image->guid; 
									$alt_img   = $image->post_content; 
									$title_img = $image->description; ?>

								<!-- Imágen -->
								<a href="<?= $url_img ?>" class="gallery-fancybox" title="<?= $title_img; ?>" rel="promotion">
									
									<img src="<?= $url_img; ?>" alt="<?= $alt_img; ?>" class="img-fluid d-block m-x-auto" />

								</a>

							<?php endforeach; ?>

						</div> <!-- /.carousel-promotions -->

						<!-- Flechas -->
						<div>
				
							<a href="#" class="arrowCarousel arrow-prev js-carousel-prev" data-slider="carousel-services">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>

							<a href="#" class="arrowCarousel arrow-next js-carousel-next" data-slider="carousel-services">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</div> <!-- /end of arrows -->

					</div> <!-- /.containerRelative -->

				<?php else: ?>

					<div class="alert alert-warning" role="alert">
						<strong> Ops!</strong> Por el momento este contenido está en mantenimiento. Gracias
					</div>

				<?php endif; ?>
				
			</div> <!-- /.col-xs-12 col-sm-6 -->
			
			<!-- Contenido -->
			<div class="col-xs-12 col-sm-6">

				<div class="content-information content-information--margin">
					<?= apply_filters( 'the_content' , $post->post_content ); ?>
				</div> <!-- content-information -->

			</div> <!-- /.col-xs-12 col-sm-6 -->
			
		</div> <!-- /.row -->


	</div> <!-- /.pageWrapperLayout -->

</section> <!-- /.mainContainerService -->


<?php  
	/*
	 * Importar partial de contacto
	 */
	include( locate_template('partials/section-contact-banner.php') );
?>


<!-- Footer -->
<?php get_footer(); ?>
