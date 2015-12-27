<?php get_header(); ?>

<section class="[ columns_wrap sc_columns sc_columns_count_12 columns_fluid ][ margin-bottom--large ][ resource-centre-results ]">

	<aisde class="[ column-3_12 column sc_column_item ][ resource-centre-results__filters ]">

		<article class="[ article ][ resource-centre__search-wrapper ][ margin-bottom ]">
			<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Search</h5>
			<div class="[ search_wrap search_wrap search_style_regular search_ajax inited search_opened ][ width-100 ]" title="Open/close search form">
				<div class="[ search_form_wrap ]">
					<form role="search" method="get" class="[ search_form ]" action="http://proparty.axiomthemes.com/">
						<button type="submit" class="[ search_submit icon-search-1 ][ right-0 ]" title="Start search"></button>
						<input type="text" class="[ search_field ][ width-100 ]" placeholder="" value="" name="s" title="">
					</form>
				</div>
			</div>
		</article>

		<article class="[ article ][ resource-centre__filters-wrapper ][ js-filter-container ]">
			<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Categories</h5>
			<section class="[ resource-centre__filter ][ js-filter ]">
				<h6 class="[ resource-centre__filter__title ]">Working Groups:</h6>
				<?php show_filters( 'working_group' ); ?>
				<h6 class="[ resource-centre__filter__title ]">Languages:</h6>
				<?php show_filters( 'language' ); ?>
				<h6 class="[ resource-centre__filter__title ]">Sectors:</h6>
				<?php show_filters( 'sector' ); ?>
				<h6 class="[ resource-centre__filter__title ]">Countries:</h6>
				<?php show_filters( 'country' ); ?>
				<h6 class="[ resource-centre__filter__title ]">Type:</h6>
				<?php show_filters( 'resource_type' ); ?>
			</section>
		</article>


	</aisde>

	<section class="[ column-9_12 column sc_column_item ][ resource-centre-results__section ]">


		<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Results</h5>
		<h6 class="[ no-margin ][ color-intermediate ]"> <small>Order by</small> </h6>
		<article class="[ posts-sorting ]">
			<!-- @Micho: Hay que cambiar la clase "icon-angle-up-1" del span por "icon-angle-down-1" en el click para que cambie el icono de abajo hacia arriba -->
			<a href="#" class="[ sc_button sc_button_size_mini ][ color-light ][ js-sort ]" data-sort="date"><span class="[ sc_button_iconed ][ inline-block ]">Date</span> <span class="[ sc_button_iconed icon-angle-up-1 ][ inline-block ]"></span></a>
			<a href="#" class="[ sc_button sc_button_size_mini ][ color-light ][ js-sort ]" data-sort="title"><span class="[ sc_button_iconed ][ inline-block ]">Name</span> <span class="[ sc_button_iconed icon-angle-down-1 ][ inline-block ]"></span></a>
			<a href="#" class="[ sc_button sc_button_size_mini ][ color-light ][ js-sort ]" data-sort="country"><span class="[ sc_button_iconed ][ inline-block ]">Country</span> <span class="[ sc_button_iconed icon-angle-down-1 ][ inline-block ]"></span></a>
			<a href="#" class="[ sc_button sc_button_size_mini ][ color-light ][ js-sort ]"><span class="[ sc_button_iconed ][ inline-block ]">Author</span> <span class="[ sc_button_iconed icon-angle-down-1 ][ inline-block ]"></span></a>

		</article>

		<div class="clear"></div>

		<article class="[ columns_wrap sc_columns sc_columns_count_12 columns_fluid ][ posts-container ]">

			<?php
			$date = 3;
			$resources_args = array(
				'post_type' 		=> 'resource',
				'posts_per_page' 	=> -1,
			);
			$query_resources = new WP_Query( $resources_args );
			if ( $query_resources->have_posts()) : while ( $query_resources->have_posts() ) : $query_resources->the_post();
				$resource_info = get_resource_info( $post->ID );
				$resource_filter_classes = '';
				foreach ( $resource_info as $key => $value ) {
					$resource_filter_classes .= $value . ' ';
				}
			?>
				<div class="[ column-4_12 sc_column_item ][ post ][ <?php echo $resource_filter_classes; ?>]">
					<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
						<h4 class="[ post__title ]">
							<?php echo get_the_title() ?>
						</h4>
						<?php the_post_thumbnail( 'medium', array( 'class' => '[ post__image ][ image-responsive ]' ) ); ?>
						<p class="[ post__excerpt ]"><?php the_excerpt(); ?></p>
						<p class="[ post__sector ]">Working Group: <?php echo get_working_group( $post->ID ); ?></p>
						<p class="[ country ]">Country: <?php echo get_country( $post->ID ); ?></p>
						<p class="[ post__date ]" ><?php echo get_the_time('U') ?></p>
						<?php $date -= 1; ?>
					</a>
				</div>
			</div>
			<?php endwhile; endif; ?>

		</aticle>

	</section>

</section>

<?php get_footer(); ?>