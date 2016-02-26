<?php get_header(); the_post();?>
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
							the_post_thumbnail('news-home');
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

<?php $html = do_shortcode(
		'[vc_row]'
		.'[vc_column]'
		.'[trx_gap]'
		.'[trx_section dedicated="no" pan="no" scroll="no" bg_color="#f6f6f6" bg_overlay="0" bg_texture="0" css="padding-bottom: 40px;"][trx_content][trx_columns fluid="no" count="2" top="55"]'
		.'[trx_column_item]'
		.'[trx_quote cite="#" title="Sir Tim Berners-Lee, inventor of the World Wide Web" bottom="0"]The international Open Data Charter has the potential to accelerate progress by placing actionable data in the hands of people.[/trx_quote]'
		.'[/trx_column_item]'
		.'[trx_column_item]'
		.'[trx_video url="https://youtu.be/dEa-hi44grY" ratio="16:9" autoplay="off" align="center" height="309"]'
		.'[/trx_column_item]'
		.'[/trx_columns]'
		.'[/trx_content][/trx_section]'
		.'[/trx_gap]'
		.'[/vc_column]'
		.'[vc_row][vc_column][trx_gap][trx_block bg_tint="dark" bg_color="#33ccff" bg_overlay="0.75" top="0" bottom="36"][trx_content top="3em" bottom="3em"][trx_section dedicated="no" align="center" pan="no" scroll="no" color="#ffffff" bg_overlay="0" bg_texture="0" font_size="18" font_weight="400" bottom="40" css="font-family: Montserrat;"][trx_image url="http://odcharter.staging.wpengine.com/wp-content/uploads/2015/01/testimonials_header.png" top="0"][/trx_section][trx_testimonials align="center" autoheight="yes" custom="no" width="70%"][vc_column_text]'
		.'[/vc_column_text][/trx_testimonials][/trx_content][/trx_block][/trx_gap][/vc_column][/vc_row]'
	);

echo ($html);

get_footer(); ?>