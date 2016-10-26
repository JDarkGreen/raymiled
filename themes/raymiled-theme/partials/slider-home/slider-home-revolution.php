<?php  

/**
* Plantila Slider Home modificado para trabajar con libreria 
* SLIDER REVOLUTION
**/

	// The Query
	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_status'    => 'publish',
		'post_type'      => 'slider-home',
		'posts_per_page' => -1,
	);

	$the_query = new WP_Query( $args );

	//Control Loop
	$i = $j = $k = 0;

	// The Loop
	if ( $the_query->have_posts() ) : 
?>

<!-- Contenedor de bannner para responsive no full width  -->
<div class="banner-container containerRelative"> <span class="Apple-tab-span"> </span>

	<!-- Contenedor Wrapper for sliders -->
	<section id="carousel-home" class="pageInicio__slider containerRelative" >

		<ul style="padding:0; margin: 0; list-style-type:none;">

		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php
				#Extraer transición por slider o dejarlo por defecto
				$transition = get_post_meta( get_the_ID() , 'mb_rev_slider_select' , true );
				$transition = !empty($transition) ? $transition : 'boxslide';
			?>
			
			<li class="item-slider" data-transition="<?= $transition ?>" data-slotamount="10" data-delay="10000000">

				<!-- Imagen Destacada -->
				<?php if( has_post_thumbnail() ) :  ?>
					<?php the_post_thumbnail('full', array('class'=>'') ); ?>
				<?php endif; ?>

			</li> <!-- /.item-slider -->
			

		<?php $i++; endwhile; ?>
		</ul> <!-- /. ul -  -->
	</section> <!-- /.carousel-home -->


	<?php /*
	<!-- Flechas de Carousel -->
	<section id="pageInicio__slider__arrows" class="pageInicio__slider__arrows">
		<!-- Izquierda -->
		<a href="#" data-slider="carousel-home" data-move="prev" class="arrow-prev">
			<!-- Icon --> <i class="fa fa-angle-left" aria-hidden="true"></i>
		</a>
		<!-- Derecha -->
		<a href="#" data-slider="carousel-home" data-move="next" class="arrow-next">
			<!-- Icon --> <i class="fa fa-angle-right" aria-hidden="true"></i>
		</a>
	</section> <!-- /.pageInicio__slider__arrows -->

	<!-- Dots o indicadores -->
	<section id="pageInicio__slider__dots" class="pageInicio__slider__dots text-xs-center">
		<?php
			//variable j  
			while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<a href="#" data-slider="carousel-home" data-dot="<?= $j + 1; ?>"></a>
		<?php $j++; endwhile; wp_reset_postdata(); ?>
	</section> <!-- /.pageInicio__slider__dots -->
	*/ ?>

</div> <!-- /.banner-container relative -->


<?php endif; ?>