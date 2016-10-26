<?php /* Name: Single Template */
/**
 * Esta es la plantilla que despliega la informacion de
 *	single template de blog 
 *
 */

/**
  * Objeto actual
  */
global $post , $wp_query;

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

?>

<!-- Contenedor Sección -->
<section class="sectionContainerBlog">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">

		<div class="row">
			
			<!-- Contenedor principal -->
			<div class="col-xs-12 col-sm-8">

				<main class="mainSingleArticle">
	
					<!-- Titulo -->
					<h2 class="this-title">
						<?= $post->post_title; ?>
					</h2> <!--  -->

					<!-- Espacio --> <br />

					<!-- Imagen Destacada -->
					<figure class="featured-image">
						<?= get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid d-block') ); ?>
					</figure> <!-- /.featured-image -->

					<!-- Espacio --> <br />

					<?= apply_filters( 'the_content' , $post->post_content ); ?>

					<!-- Espacio --> <br />

					<!-- Compartir -->
					<h5 class="text-uppercase"> <b> Compartir: </b> </h5>
					<!-- Facebook -->
					<a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink($post->ID) ?>' , '_blank' , 'width=400 , height=500' ); void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					
				</main> <!-- /.mainSingleArticle -->

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
