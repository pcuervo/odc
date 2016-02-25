<?php get_header(); ?>
		<div style="text-align: center;">
			<a class="sc_button sc_button_square sc_button_style_filled sc_button_bg_user sc_button_size_medium" style="margin: 40px 4px 0 4px; transition: all 0.2s ease-out 0s; display: inline-block;" href="/adopt-the-charter/">ADOPT THE CHARTER</a>
			<!-- <a class="sc_button sc_button_square sc_button_style_filled sc_button_bg_user sc_button_size_medium" style="margin: 40px 4px 0 4px; transition: all 0.2s ease-out 0s; display: inline-block; color: #ffffff; background-color: #2b3242; border-color: #2b3242;" href="https://docs.google.com/document/d/1bFD4xtK7NaHKgxYCIXHNlCjuUCLNFkrK0FVXewe4xYg/edit?usp=sharing" target="_blank">Collaborate</a> -->
			<!-- <a class="sc_button sc_button_square sc_button_style_filled sc_button_bg_user sc_button_size_large" style="margin: 40px 4px 0 4px; transition: all 0.2s ease-out 0s; display: inline-block;" href="#thisisthevideoid">WATCH VIDEO</a> -->
		</div>
	</div>

</div>
<div class="sc_gap_home">
	<div class="content_wrap content_home">
		<h1 style="margin-top:25px;margin-bottom:25px;">Principles</h1>
		
		<!-- Principales nuevos -->
		
		<div class="caja-principal">
		   	<a href="<?php echo site_url('/'); ?>principles/">
		   		<img class="candado" src="<?php echo site_url('/'); ?>wp-content/uploads/2015/04/unlock-278x300.png" alt="">
		   		<h5>1. Open by Default</h5>
		   	</a>
		</div>
		<div class="caja-principal">
		   	<a href="<?php echo site_url('/'); ?>principles/">
		   		<img class="reloj" src="<?php echo site_url('/'); ?>wp-content/uploads/2015/04/clock-278x300.png" alt="" />
		   		<h5>2. Timely and Comprehensive</h5>
		   	</a>
		</div>
		<div class="caja-principal ultimo">
		   	<a href="<?php echo site_url('/'); ?>principles/">
		   		<img class="llave" src="<?php echo site_url('/'); ?>wp-content/uploads/2015/04/key-278x300.png" alt="" />
		   		<h5>3. Accessible and Usable</h5>
		   	</a>
		</div>
		<div class="caja-principal">
		   	<a href="<?php echo site_url('/'); ?>principles/">
		   		<img class="join" src="<?php echo site_url('/'); ?>wp-content/uploads/2015/04/overlap-278x300.png" alt="" />
		   		<h5>4. Comparable and Interoperable</h5>
		   	</a>
		</div>
		<div class="caja-principal">
		   	<a href="<?php echo site_url('/'); ?>principles/">
		   		<img class="estructura" src="<?php echo site_url('/'); ?>wp-content/uploads/2015/04/bank-278x300.png" alt="" />
		   		<h5>5. For Improved Governance and Citizen Engagement</h5>
		   	</a>
		</div>
		<div class="caja-principal ultimo">
		   	<a href="<?php echo site_url('/'); ?>principles/">
		   		<img class="foco" src="<?php echo site_url('/'); ?>wp-content/uploads/2015/04/bulb-278x300.png" alt="" />
		   		<h5>6. For Inclusive Development and Innovation</h5>
		   	</a>
		</div>

	</div>
	<div class="content_wrap">
		<h1 style="margin-top:25px;margin-bottom:25px;">Newsfeed</h1>
		<?php $news = new WP_Query(array( 'posts_per_page' => 3, 'post_type' => array('post'), 'cat' => 30 ) );
		if ( $news->have_posts() ) : 
			while( $news->have_posts() ) : $news->the_post();
				$date = getDateTransform($post->post_date); ?>			
				<div class="content_home_newsfeed">
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ):
							the_post_thumbnail('large');
						else:
							echo '<img src="http://placehold.it/443x240" />';
						endif; ?>
						<h3><?php the_title(); ?></h3>
						<p><?php echo wp_trim_words( get_the_excerpt(), 16 ) ?></p>
						<span class="date-news"><?php echo $date[5].' '.$date[4]; ?><span> | <?php echo $date[2]; ?> </span></span>

					</a>
				</div>
				<?php $postCounter++; 
			endwhile; 	
		endif; 
		wp_reset_query(); ?>
		

	</div>
</div>
<div class="content_wrap">
	<h1 style="margin-top:25px;margin-bottom:25px;">Mission</h1>
	<p class="text-mision">The overarching goal is to foster greater coherence and collaboration for the increased adoption and implementation of shared open data principles, standards and good practices across sectors around the world.</p>
</div>

<?php the_content();

get_footer(); ?>