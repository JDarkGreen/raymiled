<?php /**------ Plantilla Configuración del Tema ----------**/

/*------------------------------*
* SECCION REDES SOCIALES
*------------------------------*/
include('template-fields/social-fields.php');


/*------------------------------*
* SECCION EMPRESA
*------------------------------*/
include('template-fields/empresa-fields.php');

/*------------------------------*
* SECCION CONTACTO
*------------------------------*/
include('template-fields/contacto-fields.php');

/*------------------------------*
* SECCION FOOTER
*------------------------------*/
include('template-fields/footer-fields.php');



/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION HEADER

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_header" , __( 'Personalizar Información Header:' , 'LANG' ), 'custom_settings_section_header_callback', 'customThemePageHeader' );

function custom_settings_section_header_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//META LOGO
add_settings_field( 'theme_meta_logo_text', __( 'Personalizar Logo', 'LANG' ), 'custom_logo_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_logo_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	
    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_meta_logo_text" class="" name="theme_settings[theme_meta_logo_text]" size="25" value="<?= !empty($options['theme_meta_logo_text']) ? $options['theme_meta_logo_text'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_meta_logo_text']) && !is_null($options['theme_meta_logo_text']) ) : ?>
            <img src="<?= $options['theme_meta_logo_text']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_meta_logo_text" >
            <?php empty($options['theme_meta_logo_text']) || is_null($options['theme_meta_logo_text']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_meta_logo_text">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}

//META SLOGAN
add_settings_field( 'theme_meta_slogan_text', __( 'Slogan en Header', 'LANG' ), 'custom_slogan_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_slogan_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_slogan_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_slogan_text']) ? $options['theme_meta_slogan_text'] : "" ; ?> </textarea>
	<?php
}


//META INFO HEADER
add_settings_field( 'theme_meta_header_text', __( 'Data Información en Header', 'LANG' ), 'custom_header_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_header_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_header_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_header_text']) ? $options['theme_meta_header_text'] : "" ; ?> </textarea>
	<?php
}





/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION NOSOTROS

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_nosotros" , __( 'Personalizar Información Nosotros:' , 'LANG' ), 'custom_settings_section_nosotros_callback', 'customThemePageNosotros' );

function custom_settings_section_nosotros_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//META 
add_settings_field( 'theme_meta_presentacion', __( 'Presentación', 'LANG' ), 'custom_presentacion_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_presentacion_render() 
{ 
	#Opciones del Tema
	$options      = get_option( 'theme_settings' ); 
	#Variable Presentación
	$presentation = $options['theme_meta_presentacion'];

	#var_dump($presentation);

?>

	<!-- Parte 1 -->
	<p class="description"> Primera Parte </p> 

	<textarea name="theme_settings[theme_meta_presentacion][0]" style="width:450px;height:250px;max-height:300px;"><?= isset($presentation[0]) && !empty($presentation[0]) ? trim($presentation[0]) : ""; ?> 
	</textarea>	

	<?php /*
	<!-- Parte 2 -->
	<p class="description"> Segunda Parte </p>

	<textarea name="theme_settings[theme_meta_presentacion][1]" style="width:450px;height:250px;max-height:300px;"><?= isset($presentation[1]) && !empty($presentation[1]) ? trim($presentation[1]) : ""; ?> 
	</textarea>	

	*/?>
		
	<?php
}

//BROCHURE
/*add_settings_field( 'theme_meta_brochure', __( 'Brochure Empresa:', 'LANG' ), 'custom_theme_brochure_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_brochure_render() 
{ 
	#Opciones del Tema
	$options = get_option( 'theme_settings' ); 
	#Variable brochure
	$theme_brochure = isset($options['theme_meta_brochure']) && !empty($options['theme_meta_brochure']) ? $options['theme_meta_brochure'] : "";
	?>

	    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_meta_brochure" name="theme_settings[theme_meta_brochure]" size="25" value="<?= $theme_brochure; ?>" />

        <!-- Contenedor Agregar PDF Imágen Previa -->
        <div class="container-preview">
            <?php if( !empty( $theme_brochure ) && !is_null( $theme_brochure ) ) : ?>
            	<a href="<?= $theme_brochure; ?>" target="_blank">
            		<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSA4zxxkv13OnM5Iis67kokyEU4oXBjKdvRg14SDOyzpEBBH-be" style="width:50px; height:50px;" />
            	</a> 
            <?php endif ?>
        </div> 

        <!-- Botón agregar --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_meta_brochure" data-type="pdf">

            <?php empty( $theme_brochure ) || is_null( $theme_brochure ) ? _e( 'Agregar Archivo' , LANG ) : _e( 'Cambiar Archivo' , LANG ) ; ?>
        </button> 

        <!-- Botón remover -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_meta_brochure">
            <?php _e( 'Remover Archivo' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir un archivo pdf para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->	
		
	<?php
}


//GALERIA NOSOTROS
add_settings_field( 'theme_meta_gallery_nosotros', __( 'Galería Presentación:', 'LANG' ), 'custom_theme_gallery_nosotros__render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );

//Renderizado 
function custom_theme_gallery_nosotros__render() 
{

?>
	
	<section class="js-containerParentGallery">

		<?php
			#Opciones del Tema
			$options = get_option( 'theme_settings' ); 
			#Meta id de galeria de presentación
			$meta_img_ids = isset($options['theme_meta_gallery_nosotros']) && !empty($options['theme_meta_gallery_nosotros']) ? $options['theme_meta_gallery_nosotros'] : "-1";
		?>

		<!-- Input Oculto -->
		<input type="hidden" id="field_gallery_nosotros" name="theme_settings[theme_meta_gallery_nosotros]" value="<?= trim($meta_img_ids); ?>" />

		<!-- Contenedor Sorteable -->
		<section class="js-containerSortableGallery" data-field-id="field_gallery_nosotros" style="max-width:670px;">

			<?php 

				#Convertir en arreglo
				$meta_img_ids  = explode(',', $meta_img_ids ); 
				#Filtrar y Eliminar numeros negativos
				$remove_array = array(-1,'-1'," ","");
				$meta_img_ids = array_diff( $meta_img_ids , $remove_array ); 
				$meta_img_ids = array_filter( $meta_img_ids ); 

				#var_dump($meta_img_ids);
				$meta_img_ids = array_filter( $meta_img_ids , function( $item ) {
    				return array_filter( $item , 'strlen' );
    			});

				foreach ( $meta_img_ids as $meta_img_id ) : 

					#Eliminar nuevamente elementos negativos
					if( !empty($meta_img_id) or $meta_img_id !== "-1" or $meta_img_id !== -1 ) :

					//Conseguir todos los datos de este item
					$item = get_post( $meta_img_id ); 
			?>

				<!-- Nota: colocar data-id-img es referente al id de la imagen -->
				<figure data-id-element="<?= $item->ID ?>" style="width: 202px; height: 120px; margin: 0 10px 20px; display: inline-block; vertical-align: top; position: relative; float:left; ">

					<!--  Boton borrar Imagen -->
					<a href="#" class="js-remove-element-gallery" data-field-id="field_gallery_nosotros" data-id-element="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid red; color: red; position: absolute; top: -10px; right: -8px; text-decoration: none; text-align: center; background: black; font-weight: 700; z-index:999;">X</a>

					<!--  Boton Actualizar Imagen -->
					<a href="#" class="js-update-element-gallery" data-field-id="field_gallery_nosotros" data-id-element="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid green; color: green; position: absolute; top: -10px; right: 18px; text-decoration: none; text-align: center; background: white; font-weight: 700; z-index:999;">@</a>
					
					<!-- Abrir frame del contenedor de imagen -->
					<img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="" style="width: 100%; height: 100%; margin: 0 auto;" />

					<!-- Titulo que muestra el id de imagen que tiene la imagen -->
					<h2 style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;color: white;align-items: center; display: flex; justify-content: center; font-size: 50px; text-shadow: 1px 1px 4px black;"> <?= $item->ID; ?> </h2>

				</figure> <!-- end figure -->

			<?php endif; endforeach; ?>
	
		</section>

		<!-- Espacio -->
		<div style="clear:both; height: 1px;"> </div>
			<p class="description"> Deben ser más de dos o más Imágenes para ser galería </p>
		<div style="clear:both; height: 1px;"> </div>

		
		<!-- Boton Agregar Elemento -->
		<button class="button button-primary js-add-element-gallery" data-field-id="field_gallery_nosotros" >
            <?= __('Agregar Elemento' , LANG ); ?>
        </button> 

        <!-- Botón remover -->
        <button class="button button-primary js-remove-all-gallery" data-field-id="field_gallery_nosotros">
            <?php _e( 'Remover Todos Elementos' , LANG ); ?>
        </button>

		<!-- Input Oculto -->

 
	</section> <!-- /.js-containerParentGallery -->


<?php
}

*/


//MISION
add_settings_field( 'theme_mision', __( 'Misión Empresa:', 'LANG' ), 'custom_theme_mision_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_mision_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<!-- Campo Texto -->
	<textarea name="theme_settings[theme_mision][text]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_mision']['text']) ? $options['theme_mision']['text'] : "" ; ?> </textarea>   <br />

	<!-- Campo Imágen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_mision_image" class="" name='theme_settings[theme_mision][image]' size="25" value="<?= !empty($options['theme_mision']['image']) ? $options['theme_mision']['image'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_mision']['image']) && !is_null($options['theme_mision']['image']) ) : ?>
            <img src="<?= $options['theme_mision']['image']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_mision_image" >
            <?php empty($options['theme_mision']['image']) || is_null($options['theme_mision']['image']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_mision_image">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}

//VISION
add_settings_field( 'theme_vision', __( 'Visión Empresa:', 'LANG' ), 'custom_theme_vision_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_vision_render() 
{ 
	$options = get_option( 'theme_settings' ); 
?>

	<!-- Campo Texto -->
	<textarea name="theme_settings[theme_vision][text]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_vision']['text']) ? $options['theme_vision']['text'] : "" ; ?> </textarea>   <br />

	<!-- Campo Imágen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_vision_image" class="" name='theme_settings[theme_vision][image]' size="25" value="<?= !empty($options['theme_vision']['image']) ? $options['theme_vision']['image'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_vision']['image']) && !is_null($options['theme_vision']['image']) ) : ?>
            <img src="<?= $options['theme_vision']['image']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_vision_image" >
            <?php empty($options['theme_vision']['image']) || is_null($options['theme_vision']['image']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_vision_image">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->

	<?php
}


//ESTRUCTURA ORGANIZACIONAL
add_settings_field( 'theme_organizational_structure', __( 'Estructura Organizacional:', 'LANG' ), 'custom_theme_organizational_structure_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_organizational_structure_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<!-- Campo Texto -->
	<textarea name="theme_settings[theme_organizational_structure][text]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_organizational_structure']['text']) ? $options['theme_organizational_structure']['text'] : "" ; ?> </textarea>   <br />

	<!-- Campo Imágen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_organizational_structure_image" class="" name='theme_settings[theme_organizational_structure][image]' size="25" value="<?= !empty($options['theme_organizational_structure']['image']) ? $options['theme_organizational_structure']['image'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_organizational_structure']['image']) && !is_null($options['theme_organizational_structure']['image']) ) : ?>
            <img src="<?= $options['theme_organizational_structure']['image']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_organizational_structure_image" >
            <?php empty($options['theme_organizational_structure']['image']) || is_null($options['theme_organizational_structure']['image']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_organizational_structure_image">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}




//SECCIÓN CUSTOM URL
add_settings_section( PREFIX."_themePage_rewriteurl" , __( 'Personalizar Url:' , 'LANG' ), 'custom_settings_rewrite_url_callback', 'customThemeRewriteUrl' );

function custom_settings_rewrite_url_callback()
{ 
	echo __( 'Personaliza Url de Taxonomías:', 'LANG' );
}

//SECCIÓN DE SOBREESCRIBIR SLUG TAXONOMÍAS

add_settings_field( 'theme_rewriteurl', __( 'Customizar Url:', 'LANG' ), 'theme_rewriteurl_render', 'customThemeRewriteUrl', PREFIX."_themePage_rewriteurl" );
//Renderizado 
function theme_rewriteurl_render() 
{ 
	$options        = get_option( 'theme_settings' ); 
	#todas las taxonomias
	$all_taxonomies = get_taxonomies();
	#excluir taxonomias
	$exclude_tax    =  array("category","post_tag","nav_menu","link_category","post_format","wpmf-category");
	#solo quedar con las taxonomias necesarias
	$all_taxonomies = array_diff( $all_taxonomies , $exclude_tax );
?>
	<h3> TAXONOMÍAS PERSONALIZADAS </h3>

	<table>
		<?php foreach( $all_taxonomies as $tax ) : 
			#var_dump( get_taxonomy( $tax ) );
		?>
		<tr>
			<td> <label><b> <?= $tax ?> </b></label> </td>
			<td> 
				<input type='text' name='theme_settings[theme_rewriteurl][<?= $tax ?>]' value='<?= !empty($options['theme_rewriteurl'][$tax]) ? $options['theme_rewriteurl'][$tax] : $tax; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

	<h3> TIPOS DE POSTS </h3>

	<?php 
		#Obtener todos los custom post type
		$args = array(
			'public'   => true,
			'_builtin' => false
		);
			
		$output     = 'names'; // names or objects, note names is the default
		$operator   = 'and'; // 'and' or 'or'
		#Todos los tipos de posts
		$custom_post_types = get_post_types( $args, $output, $operator );
	?>

	<table>
		<?php foreach( $custom_post_types as $post_type ) : 
			#var_dump( get_taxonomy( $tax ) );
		?>
		<tr>
			<td> <label><b> <?= $post_type ?> </b></label> </td>
			<td> 
				<input type='text' name='theme_settings[theme_rewriteurl][<?= $post_type ?>]' value='<?= !empty($options['theme_rewriteurl'][$post_type]) ? $options['theme_rewriteurl'][$post_type] : $post_type; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

<?php
	
}



//SECCIÓN PROYECTOS EXTRA
add_settings_section( PREFIX."_themePage_proyectos" , __( 'Extra: Proyectos' , 'LANG' ), 'custom_settings_proyectos_callback', 'customThemeProyects' );

function custom_settings_proyectos_callback()
{ 
	echo __( 'Personaliza Página y Sección Proyectos', 'LANG' );
}

/** [ CAMPO PRESENTACION PROYECTOS ] **/
add_settings_field( 'theme_text_proyectos_presentation', __( 'Texto Presentación Proyectos:', 'LANG' ), 'custom_text_proyectos_presentation_render', 'customThemeProyects', PREFIX."_themePage_proyectos" );
//Renderizado 
function custom_text_proyectos_presentation_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Texto Presentación Proyectos" , "LANG" ); ?></p>

	<textarea name="theme_settings[theme_text_proyectos_presentation]" id="" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_text_proyectos_presentation']) ? $options['theme_text_proyectos_presentation'] : "" ; ?></textarea>
	<?php
}



/**
* PERSONALIZAR CUENTAS
**/
add_settings_section( PREFIX."_themePage_cuentas" , __( 'Personalizar Cuenta:' , 'LANG' ), 'custom_settings_cuenta_callback', 'customThemePageCuentas' );

function custom_settings_cuenta_callback()
{ 
	echo __( 'No te olvides de activar la opción de PERMITIR APLICACIONES MENOS SEGURAS', 'LANG' );
	echo "<a href='https://www.google.com/settings/security/lesssecureapps' target='_blank'> desde aquí </a>";
}

//EMAIL
add_settings_field( 'theme_email_cuenta', __( 'Email de Gmail:', 'LANG' ), 'custom_cuenta_email_render', 'customThemePageCuentas', PREFIX."_themePage_cuentas" );
//Renderizado 
function custom_cuenta_email_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Escribe Email de Gmail" , "LANG" ); ?></p>
	<input type='text' name='theme_settings[theme_email_cuenta]' value='<?= !empty($options['theme_email_cuenta']) ? $options['theme_email_cuenta'] : "" ; ?>' />
	<?php
}

//PASSWORD
add_settings_field( 'theme_email_password', __( 'Password de Gmail:', 'LANG' ), 'custom_cuenta_password_render', 'customThemePageCuentas', PREFIX."_themePage_cuentas"  );
//Renderizado 
function custom_cuenta_password_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Escribe Password de Gmail" , "LANG" ); ?></p>
	<input type='password' name='theme_settings[theme_email_password]' value='<?= !empty($options['theme_email_password']) ? $options['theme_email_password'] : "" ; ?>' />
	<?php
}


//COPIAS 
add_settings_field( 'theme_email_copias', __( 'Copias adjuntas:', 'LANG' ), 'custom_cuenta_copias_render', 'customThemePageCuentas', PREFIX."_themePage_cuentas"  );
//Renderizado 
function custom_cuenta_copias_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Escribe correos adjuntos , separados por comas !importante las comas." , "LANG" ); ?></p>

	<textarea name="theme_settings[theme_email_copias]" id="" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_email_copias']) ? $options['theme_email_copias'] : "" ; ?> </textarea>
	<?php
}