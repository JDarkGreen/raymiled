<?php  
/**
  * Archivo Parcial que muestra el staff del equipo.
  */

?>

<!-- Section -->
<section id="sectionStaffMembers">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">

		<!-- Titulo -->
		<h2 class="title text-xs-center"> <?= __( 'Nuestro Equipo' , LANG ); ?> </h2>

		<!-- Espacio --> <br />

		<!-- Equipo de Staff -->
		<?php  
			$args = array(
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_status'    => 'publish',
				'post_type'      => 'theme-staff',
				'posts_per_page' => -1,
			);

			$staff = get_posts( $args );
		?>

		<!-- Contenedor -->
		<div class="containerFlex containerAlignContent">
			<?php foreach( $staff as $member ) : ?>
				
				<?php if( has_post_thumbnail( $member->ID ) ): ?>
				<figure class="itemImageMember">
					
					<?= get_the_post_thumbnail( $member->ID , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>
					
				</figure> <!-- /.itemImageMember -->
				<?php endif; ?>

			<?php endforeach; ?>
		</div> <!-- / -->

	</div> <!-- /. -->
	
</section> <!-- /.sectionStaffMembers -->