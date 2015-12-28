<?php 
	global $post;
	get_header(); 
?>


	<div class="content_wrap">
		<div class="content">

			<p><em>By <?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?>, <?php echo get_the_date(); ?>. <?php echo get_country( $post->ID ); ?></em></p>

			<article class="itemscope post_item post_item_single post_featured_default post_format_standard post-3356 resource type-resource status-publish has-post-thumbnail hentry language-espanol sector-anticorruption sector-agriculture country-usa country-france country-guatemala resource_type-platforms resource_type-graphics working_group-private-sector working_group-accountability" itemscope="" itemtype="http://schema.org/Article">

				<section class="post_featured">
					<div class="post_thumb" data-title="<?php echo get_the_title(); ?>">
						<?php the_post_thumbnail( 'medium', array( 'class' => '[ wp-post-image ]' ) ); ?>
					</div>
				</section>

				<section class="post_content" itemprop="articleBody">
					<?php the_content(); ?>
				</section>

			</article>

		</div>
		<aside class="sidebar bg_tint_light sidebar_style_light [ padding--small ]" role="complementary">
			<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Working group</h5>
			<p><?php echo get_working_group( $post->ID ); ?></p>

			<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Language</h5>
			<p><?php echo get_language( $post->ID ); ?></p>

			<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Sector(s)</h5>
			<p><?php echo get_sector( $post->ID ); ?></p>

			<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Country</h5>
			<p><?php echo get_country( $post->ID ); ?></p>

			<h5 class="sc_title sc_title_regular sc_align_center [ no-margin ]">Type</h5>
			<p><?php echo get_res_type( $post->ID ); ?></p>
		</aside> <!-- /.sidebar -->
	</div>

<?php get_footer(); ?>