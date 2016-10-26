<?php /* Template Name: Página Servicios Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Servicios
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
 * Obtener todos los servicios
 */ 
	$args        = array('posts_per_page'=>-1,'post_type' =>'theme-services','order'=>'ASC','orderby'=>'menu_order','post_status'=>'publish');
	
	$services    = get_posts( $args );
?>

<!-- Contenedor Sección -->
<section class="sectionContainerService">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerFlex">

		<?php foreach( $services as $service ): ?>

			<!-- Articles -->
			<article class="itemSingleServicePreview containerRelative">
				
				<!-- Imagen -->
				<?php  
					$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $service->ID ) );
				?>
				<figure class="featured-image">
					<a href="<?= get_permalink( $service->ID ); ?>">
						<img src="<?= $feat_img; ?>" alt="<?= $service->post_name; ?>" class="img-fluid d-block m-x-auto" />
					</a> <!-- / -->
				</figure>

				<!-- CONTENEDOR DE TEXTO -->
				<div class="container-text text-xs-center">
					
					<!-- Nombre -->
					<h2 class="text-capitalize"><?= $service->post_title; ?></h2>

					<!-- Extracto -->
					<p class="excerpt"> <?= $service->post_excerpt; ?> </p>
					
					<!-- Botón -->
					<a href="<?= get_permalink( $service->ID ); ?>" class="btn-show-more text-uppercase"><?= __('leer más' , LANG ); ?></a>
					
				</div> <!-- /.container-text -->

			</article> <!-- /.itemServicePreview -->

		<?php endforeach; ?>

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
