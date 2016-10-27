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

//Página contacto
$page_contact = get_page_by_title('Contacto');
$page_contact_link = !empty($page_contact) ? get_permalink($page_contact->ID) : '#'; 

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
				
				<!-- Caption Titulo -->
				<div class="caption sft big_white" data-x="400" data-y="340" data-speed="3000" data-start="900" data-easing="easeOutBack">

					<section class="pageInicio__slider__content">

						<h2><?php _e( get_the_title() , LANG ); ?>
						</h2> <!-- /.pageInicio__slider__title -->

						<!-- Botón  -->
						<a href="<?= $page_contact_link; ?>" class="button_contact text-uppercase">
							<?php _e( 'Contáctanos' , LANG ); ?>
						</a>

					</section> <!-- /.pageInicio__slider__content -->

				</div> <!-- /.caption sft big_white -->	


			</li> <!-- /.item-slider -->
			
		<?php $i++; endwhile; ?>

		</ul> <!-- /. ul -  -->
	</section> <!-- /.carousel-home -->

</div> <!-- /.banner-container relative -->


<?php endif; ?>