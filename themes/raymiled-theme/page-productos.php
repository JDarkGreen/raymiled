<?php /* Template Name: Página Productos Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Productos
 *
 */

/**
  * Objeto actual
  */
global $post , $wp_query;

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
 * Variables a utilizar
 */ 

//Items por página
$posts_per_page = 16; 
//Variable de paginación
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

//Argumentos
$args = array(
	'order'          =>'ASC',
	'orderby'        =>'menu_order',
	'paged'          => $paged,
	'post_status'    =>'publish',
	'post_type'      =>'theme-products',
	'posts_per_page' => $posts_per_page,
);

//The query
$the_query = new WP_Query( $args );

?>

<!-- Contenedor Sección -->
<section class="sectionContainerProduct">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">

		<?php if( $the_query->have_posts() ): ?>
		
		<!-- Contenedor Flexible -->
		<div class="containerFlex">
			
			<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
				
				<!-- Item preview or article product -->
				<article class="itemProductPreview">
					
					<!-- Imágen -->
					<figure class="featured-image">
						<?php if( has_post_thumbnail( get_the_ID() ) ) : ?>
							
							<?= get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>

						<?php else: ?>
							
							<img src="https://unsplash.it/215/255" alt="<?= $last_product->post_name; ?>" class="img-fluid d-block m-x-auto" />

						<?php endif; ?>

						<!-- Calificación de Estrellas -->
						<div class="qualify-stars">
							
							<?php  
								$mb_stars = get_post_meta( get_the_ID() , 'product_qualify' , true );
								$mb_stars = !empty($mb_stars) ? intval($mb_stars) : 0;

								for( $i = 0 ; $i < $mb_stars ; $i++ ){
							?>
								<!-- Icon -->
								<i class="fa fa-star" aria-hidden="true"></i>
					
							<?php } ?>

						</div> <!-- /.qualify-stars -->
						
					</figure> <!-- /.featured-image -->

					<!-- Content Text -->
					<div class="content-text text-xs-center">

						<h2 class="text-uppercase"> <?= get_the_title(); ?> </h2>

						<?php 
							$current_price = get_post_meta( get_the_ID() , 'product_price' , true  ); 

							$class_price = !empty($current_price['offer']) ? 'strike-text' : '';
						?>
						
						<span class="price-normal <?= $class_price; ?>"> 
							<?= !empty($current_price['normal']) ? $current_price['normal'] : '' ?>
						</span> <!--  -->

						<span class="price-offer"> <?= !empty($current_price['offer']) ? $current_price['offer'] : ''; ?></span> <!--  -->

						<!-- Limpiar floats --> <div class="clearfix"></div>

					</div> <!-- /.content-text -->

				</article> <!-- /.itemProductPreview -->

			<?php endwhile; ?>
			
		</div> <!-- /.containerFlex -->

		<!-- Paginación -->
		<section class="sectionPagination text-xs-center">

			<?php $max_pages = $the_query->max_num_pages; ?>
			
			<?php for( $i = 1 ; $i <= $max_pages ; $i++ ) { ?>
			
			<!-- Link -->
			<a href="<?= get_pagenum_link($i); ?>" class="<?= $paged == $i ? 'active' : '' ?>"> <?= $i ?></a>

			<?php } ?>
			
			<!-- Next -->
			<a href="<?= get_pagenum_link($paged+1); ?>" class="<?= $paged == $max_pages ? 'disabled' : '' ?>" role="button" aria-disabled="<?= $paged == $max_pages ? 'true' : '' ?>">
				<!-- Icon --><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
			</a>
			
		</section> <!-- /.sectionPagination -->

		<?php endif; wp_reset_postdata(); ?>

	</div> <!-- /.pageWrapperLayout containerRelative -->

</section> <!-- /.mainContainerService -->


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
