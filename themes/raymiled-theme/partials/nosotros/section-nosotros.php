<?php  
/**
  * Template Parcial que muestra 
  * el horario y contenido de la página Nosotros
  */

/*
 * Obtener Página de Nosotros
 */
$page_nosotros = get_page_by_title('Nosotros');

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
		
		<div class="row containerFlex containerAlignContent">
			
			<!-- Apertura -->
			<div class="col-xs-12 col-sm-3">

				<!-- titulo -->
				<h2 class="title text-uppercase"> <?= __('horarios de apertura:'); ?> 
				</h2>

				<!-- Contenido -->
				<?= apply_filters( 'the_content' , $page_nosotros->post_content ); ?>

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

			<span class="date d-block"> <em> <?php the_modified_date('d F, Y'); ?> 
			</em> </span> <br/>

			<h3 class="text-uppercase"> <?= $page_nosotros->post_excerpt ?> </h3>
			
		</div> <!-- /.comment-extra -->



	</div> <!-- /.pageWrapperLayout containerRelative -->
	
</section> <!-- /.sectionStaffMembers -->

<?php endif; ?>