<?php  
/**
 *  Archivo Partial que muestra las redes 
 *  sociales en la barra inferior footer
**/

/**
  * Todas las funciones se encuentran en functions/custom-functions.php
  */

?>

<ul id="menu-footer-social-link">
	
	<!-- Si existe facebook -->
	<?php if( has_facebook() ) : ?>
		<li class="facebook">
			<a href="<?= get_facebook(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
		</li>
	<?php endif; ?>	

	<!-- Si existe twitter -->
	<?php if( has_twitter() ) : ?>
		<li class="twitter">
			<a href="<?= get_twitter(); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
		</li>
	<?php endif; ?>	

	<!-- Si existe linkedin -->
	<?php if( has_linkedin() ) : ?>
		<li class="linkedin">
			<a href="<?= get_linkedin(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
		</li>
	<?php endif; ?>	

	<!-- Si existe gplus -->
	<?php if( has_gplus() ) : ?>
		<li class="gplus">
			<a href="<?= get_gplus(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
		</li>
	<?php endif; ?>		

	<!-- Si existe pinterest -->
	<?php if( has_pinterest() ) : ?>
		<li class="pinterest">
			<a href="<?= get_pinterest(); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
		</li>
	<?php endif; ?>		

	<!-- Si existe instragram -->
	<?php if( has_instagram() ) : ?>
		<li class="instagram">
			<a href="<?= get_instagram(); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
		</li>
	<?php endif; ?>	

</ul> <!-- /.menu-social-link -->
                                                                                                                                        </ul>