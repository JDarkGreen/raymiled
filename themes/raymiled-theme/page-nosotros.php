<?php /* Template Name: Página Nosotros Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Nosotros
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

?>

<section id="sectionAboutUs">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">
		
		<div class="row containerFlex">
			
			<!-- Apertura -->
			<div class="col-xs-12 col-sm-4">

				<!-- titulo -->
				<h2 class="title title--gray text-capitalize"> 
					Raymi <br/> Led
				</h2>

				<!-- Contenido -->
				<?= apply_filters( 'the_content' , $post->post_content ); ?>
				
			</div> <!-- /.col-xs-12 col-sm-3 -->

			<!-- Imágen Destacada -->
			<div class="col-xs-12 col-sm-5">
				
				<figure class="featured-image">
					<?php if( has_post_thumbnail($post->ID) ) : ?>
					
					<?= get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>	
					
					<?php else: ?>

						<img src="<?= IMAGES ?>/backgrounds/foto_nosotros_raymi_pisos_led_peru.jpg" alt="<?= $post->post_name; ?>" class="img-fluid d-block m-x-auto" />

					<?php endif; ?>
				</figure> <!-- /.featured-image -->

			</div> <!-- /.col-xs-12 col-sm-4 -->

			<div class="col-sm-3 hidden-xs-down"></div>

		</div> <!-- /.row -->

		<!-- Comentario Extra -->
		<div id="comment-extra">

			<!--span class="date d-block"> <em> <?php the_modified_date('d F, Y'); ?> 
			</em> </span> <br/-->

			<h3 class="text-uppercase"> 
				<?= !empty($page_nosotros->post_excerpt) ? $page_nosotros->post_excerpt : 'Dale vida a tu evento y contrata nuestra pista iluminada !!!'; ?> 
			</h3>
			
		</div> <!-- /.comment-extra -->

	</div> <!-- /.pageWrapperLayout containerRelative -->
	
</section> <!-- /.sectionStaffMembers -->


<?php  
	/*
	 * Importar partial de contacto
	 */
	include( locate_template('partials/section-contact-banner.php') );
?>

<!-- Footer -->
<?php get_footer(); ?>