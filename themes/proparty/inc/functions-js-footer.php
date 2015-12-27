<?php

/**
* Here we add all the javascript that needs to be run on the footer.
**/
function footer_scripts(){
	global $post;

	if( wp_script_is( 'functions', 'done' ) ) :

?>
		<script type="text/javascript">
			$( document ).ready(function() {

				<?php if( is_page( 'resource-centre-results' ) ) : ?>

					initCheckBoxFilters();
					$('.js-sort').click( function(e){
						e.preventDefault();
						var data = $(this).data('sort');
						var asc = parseInt( $(this).data('asc') );
						if( asc ){
							$(this).data('asc', 0);
						} else {
							$(this).data('asc', 1);
						}
						$('.posts-container').isotope({ 
							sortBy : data,
							sortAscending : asc
						});
					})
				<?php endif; ?>

				<?php if( is_page( 'network' ) ) : ?>
					addAllMarkers();
				<?php endif; ?>

			});
		</script>
<?php
	endif;
}// footer_scripts
?>