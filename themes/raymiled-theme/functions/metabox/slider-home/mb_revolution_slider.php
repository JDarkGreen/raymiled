<?php  
/**
** Metabox que agregar un campo personalizado para todos 
** los producto en el cual setea el código 
**/

/*|-------------------------------------------------------------------------|*/
/*|---------------------- METABOX DE SLIDER REVOLUTION  --------------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_mb_slider_revolution' );

//llamar funcion 
function cd_mb_slider_revolution()
{	
	$array_custom_types = array('slider-home');

	//Solo en productos
	add_meta_box( 'mb-slider-revolution', 'Efecto de Slider', 'cd_mb_slider_revolution_cb', $array_custom_types , 'side', 'high' );
}

//customizar box
function cd_mb_slider_revolution_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

    $values         = get_post_custom( $post->ID );
    $current_effect = isset( $values['mb_rev_slider_select'] ) ? $values['mb_rev_slider_select'][0] : '';

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
        <label for="mb_rev_slider_select"> Efectos: </label> <br/>

        <select name="mb_rev_slider_select">

            <!-- Efecto 1 -->
            <option value="boxslide" <?php selected( $current_effect , 'boxslide' ); ?> > boxslide </option> 
            <!-- Efecto 1 -->
            <option value="boxfade" <?php selected( $current_effect , 'boxfade' ); ?> > boxfade </option> 
            <!-- Efecto 1 -->
            <option value="slotzoom-horizontal" <?php selected( $current_effect , 'slotzoom-horizontal' ); ?> > slotzoom-horizontal </option> 
            <!-- Efecto 1 -->
            <option value="slotzoom-vertical" <?php selected( $current_effect , 'slotzoom-vertical' ); ?> > slotzoom-vertical </option> 
            <!-- Efecto 1 -->
            <option value="curtain-1" <?php selected( $current_effect , 'curtain-1' ); ?> > curtain-1 </option> 
            <!-- Efecto 1 -->
            <option value="curtain-2" <?php selected( $current_effect , 'curtain-2' ); ?> > curtain-2 </option> 
            <!-- Efecto 1 -->
            <option value="curtain-3" <?php selected( $current_effect , 'curtain-3' ); ?> > curtain-3 </option> 
            <!-- Efecto 1 -->
            <option value="slideleft" <?php selected( $current_effect , 'slideleft' ); ?> > slideleft </option> 
            <!-- Efecto 1 -->
            <option value="slideright" <?php selected( $current_effect , 'slideright' ); ?> > slideright </option> 
            <!-- Efecto 1 -->
            <option value="slideup" <?php selected( $current_effect , 'slideup' ); ?> > slideup </option> 
            <!-- Efecto 1 -->
            <option value="slidedown" <?php selected( $current_effect , 'slidedown' ); ?> > slidedown </option> 
            <!-- Efecto 1 -->
            <option value="fade" <?php selected( $current_effect , 'fade' ); ?> > fade </option> 

        </select> <!-- /.mb_rev_slider_select -->

    <?php    
}
//guardar la data
add_action( 'save_post', 'cd_mb_slider_select_save' );

function cd_mb_slider_select_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if ( !current_user_can( 'edit_post', $post_id ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mb_rev_slider_select'] ) )
        update_post_meta( $post_id, 'mb_rev_slider_select', wp_kses( $_POST['mb_rev_slider_select'], $allowed ) );
}