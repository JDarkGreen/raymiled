<?php  
/*
 * ARCHIVO PARTIAL QUE MUESTRA LOS VIDEOS 
 * ADJUNTADOS
 */

/* Obtener Página de Videos */
$page_videos      = get_page_by_title('videos');
/* Obtener Link */
$page_videos_link = !empty($page_videos) ? get_permalink($page_videos->ID) : '#';

/* Argumentos */
$args = array(
	'posts_per_page' => 5,
	'post_type'      => 'theme-videos',
	'post_status'    => 'publish',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
);

/*Query*/
$all_videos = get_posts( $args );

?>

<section id="pageInicioVideos" class="">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">

		<!-- Título -->
		<h2 class="titleCommon__section text-uppercase text-xs-center"> 
		<span> <?= __( 'videos' , LANG ); ?> </span> </h2>
		
		<div class="containerRelative">

			<?php  
				//Si hay mas de dos post para hacer galería
				if( !empty($all_videos) && count($all_videos) > 1 ) :
			?>

				<!-- Carousel Galeria  -->
				<div id="carousel-home-videos" class="section__single_gallery js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="10" data-dots="false" data-autoplay="true" data-timeautoplay="8000">

				<?php foreach( $all_videos as $this_video ): ?>

					<!-- Video -->
					<?php  
					$link_video = $this_video->post_content; 
					$link_video = getidYoutube( $link_video );
					if($link_video) : ?>

					<div class="youtube" id="<?= $link_video; ?>" style="width: 100%; max-width:500px;height:192px;"></div>

					<?php endif; ?>

				<?php endforeach; ?>

				</div> <!-- /carousel-home-videos -->

			<?php endif; ?>

		</div> <!-- /containerRelative -->

		<!-- Botón ver Más -->
		<br/>

		<a href="<?= $page_videos_link ?>" class="btn-show-more text-uppercase pull-xs-right"> <?= __( 'ver más' , LANG )  ?> </a>

		<!-- Limpiar floats -->  <div class="clearfix"></div>

	</div> <!-- /.pageWrapperLayout containerRelative -->
	
</section> <!-- /.pageInicioServices -->