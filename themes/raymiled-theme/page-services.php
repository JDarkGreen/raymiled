<?php /* Template Name: Página Pistas Led Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Pistas Led
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
 * Variables de Paginación
 */
$posts_per_page = 6;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

/*
 * Obtener todos los servicios
 */ 
$args  = array(
	'posts_per_page' => $posts_per_page,
	'post_type'      => 'theme-services',
	'paged'          => $paged,
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'post_status'    => 'publish',
);
	
$the_query = new WP_Query( $args ); 

?>

<!-- Contenedor Sección -->
<section class="sectionContainerService">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">

		<?php if( $the_query->have_posts() ): ?>

		<div class="containerFlex">
	
			<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>

				<!-- Articles -->
				<article class="itemSingleServicePreview containerRelative">
					
					<!-- Imagen -->
					<?php  
						$feat_img = wp_get_attachment_url( get_post_thumbnail_id() );
					?>
					<figure class="featured-image">
						<a href="<?= get_permalink(); ?>">
							<img src="<?= $feat_img; ?>" alt="<?= get_the_title(); ?>" class="img-fluid d-block m-x-auto" />
						</a> <!-- / -->
					</figure>

					<!-- CONTENEDOR DE TEXTO -->
					<div class="container-text text-xs-center">
						
						<!-- Nombre -->
						<h2 class="text-capitalize"><?= get_the_title(); ?></h2>

						<!-- Extracto -->
						<p class="excerpt"> 
							<?php  
								$excerpt = wp_strip_all_tags( get_the_content() );
								$excerpt = wp_trim_words( $excerpt , 25 , '...' );
								echo $excerpt; ?>
						</p>
						
						<!-- Botón -->
						<a href="<?= get_permalink(); ?>" class="btn-show-more text-uppercase"><?= __('leer más' , LANG ); ?></a>
						
					</div> <!-- /.container-text -->

				</article> <!-- /.itemServicePreview -->

			<?php endwhile; ?>
			
		</div> <!-- /.containerFlex -->

		<!-- Limpiar Floats --> <div class="clearfix"></div>

		<!-- Paginación aquí -->
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
