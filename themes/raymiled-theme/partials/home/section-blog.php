<?php  
/**
  * ARCHIVO PARTIAL QUE MUESTRA LAS ENTRADAS DEL BLOG DE LA WEB
***/

?>

<section class="pageInicioBlog text-xs-center">

	<!-- Título -->
	<h2 class="titleCommon__section"> Blog </h2>
	
	<h3 class="subtitleCommon__section"> 
		<span class="decoration"> // </span> Hacemos belleza
	</h3>
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">

		<!-- Slider main container -->
		<div id="carousel-blog" class="swiper-container" data-slides-per-view="3"
		data-space-between="30">

		    <!-- Additional required wrapper -->
		    <div class="swiper-wrapper">

		    	<?php  
					#Obtener todos las entradas del blog
					$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'post',
						'posts_per_page' => -1,
					);

					$posts = get_posts( $args );
				
					foreach( $posts as $entrada ):
				?> 

		        <!-- Slides de Libreria - contenedor -->
		        <div class="swiper-slide">
		    		
		    		<!-- Item preview de servicio -->
					<article class="itemPostPreview containerRelative">    	

						<!-- Imagen -->
						<?php  
							$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $entrada->ID ) );
						?>
						<a href="<?= get_permalink( $entrada->ID ); ?>">

							<figure class="featured-image containerRelative">

								<!--img src="<?= $feat_img; ?>" alt="<?= $entrada->post_name; ?>" class="img-fluid d-block m-x-auto" /-->	

								<img data-src="<?= $feat_img; ?>" class="swiper-lazy img-fluid d-block m-x-auto" />

            					<div class="swiper-lazy-preloader"></div>			

							</figure>
						
						</a><!-- /end of link -->

						<!-- Nombre -->
						<h2 class=""><?= $entrada->post_title; ?></h2>

					</article> <!-- /.itemServicePreview -->
			
		        </div> <!-- /.swipper-slide -->

		    	<?php endforeach; ?>
	
		    </div> <!-- /.swiper-wrapper -->
		    
		    <!-- If we need scrollbar -->
		    <div class="swiper-scrollbar"></div>

		</div> <!-- /.swiper-container -->

	</div> <!-- /pageWrapperLayout containerRelative -->
	
</section> <!-- /.pageInicioBlog -->