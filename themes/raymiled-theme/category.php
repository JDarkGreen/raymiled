<?php /* Name: Category Template */
/**
 * Esta es la plantilla que despliega la informacion 
 * de la categoria del blog
 *
 */

/**
  * Objeto actual
  */

$current_category = get_queried_object();


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

//Página blog 
$page_blog = get_page_by_title('Blog');
$banner    = $page_blog;

include( locate_template('partials/banner-top-page.php') );

/*
 * Variables a utilizar
 */ 

//Items por página
$posts_per_page = 9; 
//Variable de paginación
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

//Argumentos
$args = array(
	'order'          =>'ASC',
	'orderby'        =>'menu_order',
	'paged'          => $paged,
	'post_status'    =>'publish',
	'post_type'      =>'post',
	'cat'            => $current_category->term_id,
	'posts_per_page' => $posts_per_page,
);

//The query
$the_query = new WP_Query( $args );

?>

<!-- Contenedor Sección -->
<section class="sectionContainerBlog">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">

		<div class="row">
			
			<!-- Contenedor principal -->
			<div class="col-xs-12 col-sm-8">
				
				<!-- Titulo -->
				<h2 class="this-title">
					<?= $current_category->name; ?>
				</h2> <!--  -->

				<!-- Espacio --> <br />
		
				<?php if( $the_query->have_posts() ): ?>
				
				<!-- Contenedor Flexible -->
				<div class="containerFlex">
					
					<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
						
					<!-- Article Preview -->
					<article class="itemPreviewPost">

						<!-- Imagen -->
						<figure class="featured-image">
							<a href="<?= get_permalink( get_the_ID() ); ?>">
								<?= get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid m-x-auto d-block') ); ?>
							</a>
						</figure> <!-- /. -->

						<!-- Título -->
						<h2 class=""> <?= get_the_title(); ?> </h2>

						<!-- Extracto -->
						<?php 
							$limit_words = 35;
							
							$content     = wp_strip_all_tags( get_the_content() );
							$content     = apply_filters( 'the_content' , $content  );
							
							$content     = array_slice( explode(' ' , $content ) , 0 , $limit_words );
							$content     = implode( ' ' , $content ) . '...<br/>';

							echo $content;
						?>

						<a href="<?= get_permalink( get_the_ID() ); ?>" class="read-more"> Leer Más </a>
						
					</article> <!-- /.itemPreviewPost -->

					<?php endwhile; ?>
					
				</div> <!-- /.containerFlex -->

				<!-- Paginación -->
				<section class="sectionPagination text-xs-center">

					<?php $max_pages = $the_query->max_num_pages; ?>
					
					<?php for( $i = 1 ; $i <= $max_pages ; $i++ ) { ?>
					
					<!-- Link -->
					<a href="<?= get_pagenum_link($i); ?>" class="<?= $paged == $i ? 'active' : '' ?>"> <?= $i ?></a>

					<?php } ?>
					
					<!-- Next -->
					<a href="<?= get_pagenum_link($paged+1); ?>" class="<?= $paged == $max_pages ? 'disabled' : '' ?>" role="button" aria-disabled="<?= $paged == $max_pages ? 'true' : '' ?>">
						<!-- Icon --><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>
					
				</section> <!-- /.sectionPagination -->

				<?php endif; wp_reset_postdata(); ?>
				
			</div> <!-- /.col-xs-12 col-sm-8 -->

			<!-- AsideBar -->
			<div class="col-sm-4 hidden-xs-down">
				
				<?php include( locate_template('partials/categories-sidebar.php') ); ?>

			</div> <!-- /. -->
			
		</div> <!-- /.row -->

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
