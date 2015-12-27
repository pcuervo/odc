<?php get_header(); ?>

<section class="[ columns_wrap sc_columns sc_columns_count_12 columns_fluid ][ margin-bottom--large ][ resource-centre-results ]">

	<aisde class="[ column-3_12 column sc_column_item ][ resource-centre-results__section ]">

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
				<h5 class="[ resource-centre__filter__title ]">Maturity level</h5>
				<div class="option-set" data-group="brand">
					<input type="checkbox" value="" id="brand-all" class="all" checked /><label for="brand-all">all</label><br />
					<input type="checkbox" value=".initial" id="initial" /><label for="initial">Initial</label><br />
					<input type="checkbox" value=".intermediate" id="intermediate" /><label for="intermediate">Intermediate</label><br />
					<input type="checkbox" value=".advanced" id="advanced" /><label for="advanced">Advanced</label><br />
				</div>
			</section>
		</article>


	</aisde>

	<section class="[ column-9_12 column sc_column_item ][ resource-centre-results__section ]">


		<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Results</h5>
		<h6>Order by</h6>
		<article class="[ posts-sorting ]">

			<a href="#" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_user sc_button_size_mini alignleft" style="margin-top:0.5em;margin-right:0px;margin-bottom:0.5em;margin-left:30px;"><span class="sc_button_iconed inherit">READ MORE</span></a>

		</article>

		<div class="clear"></div>

		<article class="[ columns_wrap sc_columns sc_columns_count_12 columns_fluid ][ posts-container ]">

			<div class="[ column-4_12 sc_column_item ][ post ]">
				<a class="[ post__card ]">
					<h4 class="[ post__title ]"> This is a test</h4>
					<img src="http://pcuervo.com/od4d/wp-content/uploads/2015/12/MSF-Yann-Libessart-Ebola-trial-Conakry-Guinea-300x141.jpg" class="[ post__image ][ image-responsive ]" alt="IDRC welcomes early Ebola&nbsp;vaccine trial results">
					<p class="[ post__excerpt ]">I am enim adesse poterit hoc non est positum in nostra actione duo reges constructio interrete minime vero inquit</p>
					<p class="[ post__sector ]">Policies</p>
				</a>
			</div>

		</aticle>

	</section>

</section>

<?php get_footer(); ?>