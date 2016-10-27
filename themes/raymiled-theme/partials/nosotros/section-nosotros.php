<?php  
/**
  * Template Parcial que muestra 
  * el horario y contenido de la página Nosotros
  */

/*
 * Obtener Página de Nosotros
 */
$page_nosotros = get_page_by_title('Nosotros');

//Link de Página
$page_nosotros_link = !empty($page_nosotros) ? get_permalink($page_nosotros->ID) : '#';

/*
 * Extraer opciones del tema
 */
$options = get_option("theme_settings");

?>

<?php if( $page_nosotros ) : ?>

<!-- Section -->
<section id="sectionAboutUs">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">
		
		<div class="row containerFlex">
			
			<!-- Apertura -->
			<div class="col-xs-12 col-sm-3">

				<!-- titulo -->
				<h2 class="title text-capitalize"> 
					Raymi <br/> Led
				</h2>

				<!-- Contenido -->
				<?= apply_filters( 'the_content' , $page_nosotros->post_content ); ?>

				<!-- Botón ver Más -->
				<a href="<?= $page_nosotros_link; ?>" class="btn-show-more text-uppercase"> 
				<?= __('leer más'); ?> </a>

			</div> <!-- /.col-xs-12 col-sm-3 -->

			<!-- Imágen Destacada -->
			<div class="col-xs-12 col-sm-6">
				
				<figure class="featured-image">
					<?php if( has_post_thumbnail($page_nosotros->ID) ) : ?>
					
					<?= get_the_post_thumbnail( $page_nosotros->ID , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>	
					
					<?php else: ?>

						<img src="<?= IMAGES ?>/backgrounds/nosotros_fondo_foto.jpg" alt="<?= $page_nosotros->post_name; ?>" class="img-fluid d-block m-x-auto" />

					<?php endif; ?>
				</figure> <!-- /.featured-image -->

			</div> <!-- /.col-xs-12 col-sm-6 -->

			<div class="col-sm-2 hidden-xs-down"></div>

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

<?php endif; ?>