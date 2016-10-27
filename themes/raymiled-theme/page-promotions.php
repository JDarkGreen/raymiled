<?php /* Template Name: Página Promociones Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Promociones
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
 * Obtener todos las promociones
 */ 
	$args  = array(
		'posts_per_page' => -1,
		'post_type'      => 'theme-promotions',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_status'    => 'publish'
	);
	
	$promotions = get_posts( $args );
?>

<!-- Contenedor Sección -->
<section id="sectionContainerPromotions" class="containerBgAndCarousel">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">


		<!-- Contenedor de Carousel y flechas -->
		<div class="content-information containerRelative pull-sm-right">

			<?php if( count($promotions) >= 2 ): ?>

			<!-- Carousel De Promociones -->
			<div id="carousel-promotions" class="js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="1" data-dots="false" data-autoplay="true" data-timeautoplay="5000">
			
				<?php foreach( $promotions as $promotion ) : ?>
					
					<!-- Imagen -->
					<?php if( has_post_thumbnail( $promotion->ID ) ): 

						$url_img = wp_get_attachment_url( get_post_thumbnail_id( $promotion->ID ) );
					?>
						<!-- Galeria -->
						<a href="<?= $url_img ?>" class="gallery-fancybox" title="<?= $promotion->post_title; ?>" rel="promotion">
							<?= get_the_post_thumbnail( $promotion->ID , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>
						</a>

					<?php endif; ?>

				<?php endforeach; ?>

			</div> <!-- /.carousel-promotions -->

			<!-- Flechas -->
			<div class="">
	
				<a href="#" class="arrowCarousel arrow-prev js-carousel-prev" data-slider="carousel-promotions">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
				</a>

				<a href="#" class="arrowCarousel arrow-next js-carousel-next" data-slider="carousel-promotions">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
				</a>
			</div> <!-- /end of arrows -->

			<?php else: ?>

				<div class="alert alert-warning" role="alert">
					<strong> Ops!</strong> Por el momento este contenido está en mantenimiento. Gracias
				</div>

			<?php endif; ?>

		</div> <!-- #containerPromotion -->

		<!-- Limpiar floats --> <div class="clearfix"></div>

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
