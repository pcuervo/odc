<?php get_header(); 
$search = isset($_GET['search-resources']) ? $_GET['search-resources'] : '';?>
<section class="[ column-11_12 column sc_column_item ][ resource-centre-results__section ] [ margin-bottom ]">
	<article class="[ article ][ resource-centre__search-wrapper ][ margin-bottom ]">
		<div class="[ search_wrap search_wrap search_style_regular search_opened ][ width-100 ]" title="Open/close search form">
			<div class="[ search_form_wrap ]">
				<form role="search" method="get" class="[ search_form ]" action="">
					<button type="submit" class="[ search_submit icon-search-1 ][ right-0 ]" title="Start search"></button>
					<input type="text" class="[ search_field ][ width-100 ]" placeholder="Search" value="" name="search-resources" title="">
				</form>
			</div>
			<div class="[ select-search ]">
				<input class="input-checkbox" type="checkbox" name="vehicle" value="Car"> I´M FROM A
				<select>
				  	<option value="volvo">Civil Society Organization</option>
				</select>
			</div>
		</div>
	</article>

	<div class="datos-busquedas-centre [ margin-bottom ]">
		<?php if ($search != '') : ?>
			<span>Search results for “<?php echo $search; ?>”<img src="<?php echo THEMEPATH.'/images/cruz-azul-marca.png' ?>"></span>
		<?php endif; ?>
		<span>Implementation<img src="<?php echo THEMEPATH.'/images/cruz-azul-marca.png' ?>"></span>
	</div>
	
	<div class="cont-order-centre">
		<p class="text-right">ORDER BY</p>
		<a href="#" class="[ sc_button sc_button_size_mini ][ color-light ][ js-sort ]" data-asc="1" data-sort="date"><span class="[ sc_button_iconed ][ inline-block ]">Date</span> <span class="[ sc_button_iconed icon-angle-down-1 ][ inline-block ]"></span></a>
		<a href="#" class="[ sc_button sc_button_size_mini ][ color-light ][ js-sort ]" data-asc="1" data-sort="title"><span class="[ sc_button_iconed ][ inline-block ]">Name</span> <span class="[ sc_button_iconed icon-angle-down-1 ][ inline-block ]"></span></a>
		<a href="#" class="[ sc_button sc_button_size_mini ][ color-light ][ js-sort ]" data-asc="1" data-sort="languaje"><span class="[ sc_button_iconed ][ inline-block ]">Languaje</span> <span class="[ sc_button_iconed icon-angle-down-1 ][ inline-block ]"></span></a>
	</div>
</section>
<section class="[ columns_wrap sc_columns sc_columns_count_12 columns_fluid ][ margin-bottom--large ][ resource-centre-results ]">

	<aisde class="[ column-3_12 column sc_column_item ][ resource-centre-results__filters ]">

		<article class="[ article ][ resource-centre__filters-wrapper ][ js-filter-container ]">
			<h5 class="title-sup-filters">FILTER RESOURCES BY</h5>
			<section class="[ resource-centre__filter ][ js-filter ]">
				<h6 class="[ resource-centre__filter__title ]">Working groups:</h6>
				<?php show_filters( 'working_group' ); ?>
				<h6 class="[ resource-centre__filter__title ]">Sectors:</h6>
				<?php show_filters( 'sector' ); ?>
				<h6 class="[ resource-centre__filter__title ]">Type:</h6>
				<?php show_filters( 'resource_type' ); ?>
				<h6 class="[ resource-centre__filter__title ]">Contribution:</h6>
				<div class="option-set" data-group="contribution">
					<input type="checkbox" value="" id="contribution-all" class="all" checked /><label for="contribution-all">all</label><br />
					<input type="checkbox" value=".no-contribution" id="no-contribution" /><label for="no-contribution">Closed</label><br />
					<input type="checkbox" value=".yes-contribution" id="yes-contribution" /><label for="yes-contribution">Open</label>

				</div>
			</section>
		</article>


	</aisde>

	<section class="[ column-9_12 column sc_column_item ][ resource-centre-results__section ]">
		
		<?php $group_active = isset($_POST['group']) ? $_POST['group'] : 'ninguno'; ?>
		<article class="[ columns_wrap sc_columns sc_columns_count_12 columns_fluid ][ posts-container ]" data-group_active=".<?php echo $group_active; ?>">
	
			<?php 
			$query_resources = getResources($search);
			if ( ! empty($query_resources) ) : 
				foreach ( $query_resources as  $post ) :
					setup_postdata( $post );
					$meta = get_post_meta( $post->ID, '_open_contribution_meta', true );
					
					$class_contri = $meta == 'yes' ?  $meta.'-contribution ' : 'no-contribution ';

					$resource_info = get_resource_info( $post->ID );
					$resource_filter_classes = $class_contri;
					foreach ( $resource_info as $key => $value ) :

						$resource_filter_classes .= $value . ' ';
					endforeach;?>
					<div class="[ column-4_12 sc_column_item ][ post ][ <?php echo $resource_filter_classes; ?>]">
						<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
							<h4 class="[ post__title ]">
								<?php echo get_the_title() ?>
							</h4>
							<?php the_post_thumbnail( 'medium', array( 'class' => '[ post__image ][ image-responsive ]' ) ); ?>
							<p class="[ post__excerpt ]"><?php echo  get_the_excerpt(); ?></p>
							<p class="[ post__info ]">Sector: <?php echo get_sector( $post->ID ); ?></p>
							<p class="[ post__info post__country ][ hidden ]"><?php echo get_country( $post->ID ); ?></p>
							<p class="[ post__info post__date ][ hidden ]" ><?php echo get_the_time('U') ?></p>
							<p class="[ post__info  ]" >by: <span class="[ post__author ]"><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></span></p>
						</a>
					</div>
				<?php endforeach; 
			endif; ?>

		</aticle>

	</section>

</section>

<?php get_footer(); ?>