<?php  
/*
 * ARCHIVO PARTIAL QUE MUESTRA LOS SERVICIOS DE LA EMPRESA
 */
?>

<section id="pageInicioServices" class="containerCommonSection text-xs-center">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">

		<!-- Título -->
		<h2 class="titleCommon__section text-uppercase"> 
		<span> Servicios </span> </h2>
		
		<div class="containerRelative">

			<!-- Carousel Galeria de Servicios -->
			<div id="carousel-single-services" class="section__single_gallery js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="21" data-dots="false" data-autoplay="true" data-timeautoplay="5000">

				<?php  
					#Obtener todos los servicios
					$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'theme-services',
						'posts_per_page' => -1,
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
					);

					$services = get_posts( $args );
				
					foreach( $services as $service ):
				?> <!-- Item preview de servicio -->
					<article class="itemServicePreview containerRelative">
						
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

			</div> <!-- /carousel-single-services -->

			<!-- Flechas de Carousel -->
			<div class="hidden-xs-down">


				
			</div> <!-- /.hidden-xs-down -->

		</div> <!-- /containerRelative -->

	</div> <!-- /.pageWrapperLayout containerRelative -->
	
</section> <!-- /.pageInicioServices -->