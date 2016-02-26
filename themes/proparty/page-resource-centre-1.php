<?php get_header(); ?>

<h3 class="post__title text-center [ no-margin ]">FIND RESOURCES BY</h3>

<h5 class="sub-title-centre">OPEN TO CONTRIBUTION</h5>

<div class="[ posts-centre ]">

	<?php $resources_args = array('post_type' => 'resource','posts_per_page' => 3,'meta_key' => '_open_contribution_meta','meta_value' => 'yes');

	$query_resources = new WP_Query( $resources_args );
	if ( $query_resources->have_posts()) : 
		$count = 1;
		while ( $query_resources->have_posts() ) : $query_resources->the_post(); 
			$class = $count == 3 ? 'ultimo' : ''; 
			$working_group = wp_get_post_terms($post->ID, 'working_group', array("fields" => "all"));
			$sector = wp_get_post_terms($post->ID, 'sector', array("fields" => "all"));
			$resource_type = wp_get_post_terms($post->ID, 'resource_type', array("fields" => "all")); ?>
			
			<div class="[ sc_column_item ][ post-centre <?php echo $class; ?> ]">
				<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
					<img class="circle-img" src="<?php echo THEMEPATH.'/images/circle-azul.jpg' ?>" alt="">
					<h4 class="[ post__title ]"><?php echo get_the_title() ?></h4>
					<p class="[ post__author ]">Author: <?php the_author(); ?></p>
					<hr>
					<div class="[ cajita ][ working ] ">
						<p class="[ taxonomy ]">Working Group</p>
						<p class="[ term ]"><?php echo $working_group[0]->name; ?></p>
					</div>
					<div class="[ cajita ][ sector ] ">
						<p class="[ taxonomy ]">Sector</p>
						<p class="[ term ]"><?php echo $sector[0]->name; ?></p>
					</div>
					<div class="[ cajita ][ type ] ">
						<p class="[ taxonomy ]">Type</p>
						<p class="[ term ]"><?php echo $resource_type[0]->name; ?></p>
					</div>
					<hr>
					<div class="[ cajita ][ working ] ">
						<p class="[ taxonomy ]">Open untill</p>
						<p class="[ date ]">July 5</p>
					</div>
				
				</a>
			</div>
		
			<?php $count++; 
		endwhile; 
	endif; ?>
	
</div>

<h5 class="sub-title-centre">Working Group</h5>

<div class="[ posts-centre ]">

	<?php  $implementation = getPostCentre('working_group', 'implementation');
	if ( $implementation ) :  
		$sector = wp_get_post_terms($post->ID, 'sector', array("fields" => "all"));
		$resource_type = wp_get_post_terms($post->ID, 'resource_type', array("fields" => "all"));
		$user = get_user_by( 'id', $implementation->post_author );?>
		
		<div class="[ sc_column_item ][ post-centre ]">
			<p class="name-term">Implementation</p>
			<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
				<h4 class="[ post__title ]"><?php echo $implementation->post_title ?></h4>
				<p class="[ post__author ]">Author: <?php echo $user->user_login; ?></p>
				<hr>
				<div class="[ cajita ][ working ] ">
					<p class="[ taxonomy ]">Working Group</p>
					<p class="[ term ]">Implementation</p>
				</div>
				<div class="[ cajita ][ sector ] ">
					<p class="[ taxonomy ]">Sector</p>
					<p class="[ term ]"><?php echo $sector[0]->name; ?></p>
				</div>
				<div class="[ cajita ][ type ] ">
					<p class="[ taxonomy ]">Type</p>
					<p class="[ term ]"><?php echo $resource_type[0]->name; ?></p>
				</div>
			</a>
		</div>
	<?php endif; ?>

	<?php  $incentive = getPostCentre('working_group', 'incentive-mechanisms');
	if ( $incentive ) :  
		$sector = wp_get_post_terms($incentive->ID, 'sector', array("fields" => "all"));
		$resource_type = wp_get_post_terms($incentive->ID, 'resource_type', array("fields" => "all"));
		$user = get_user_by( 'id', $incentive->post_author ); ?>
		
		<div class="[ sc_column_item ][ post-centre ]">
			<p class="name-term">Incentive Mechanisms</p>
			<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
				<h4 class="[ post__title ]"><?php echo $incentive->post_title ?></h4>
				<p class="[ post__author ]">Author: <?php echo $user->user_login; ?></p>
				<hr>
				<div class="[ cajita ][ working ] ">
					<p class="[ taxonomy ]">Working Group</p>
					<p class="[ term ]">Incentive Mechanisms</p>
				</div>
				<div class="[ cajita ][ sector ] ">
					<p class="[ taxonomy ]">Sector</p>
					<p class="[ term ]"><?php echo $sector[0]->name; ?></p>
				</div>
				<div class="[ cajita ][ type ] ">
					<p class="[ taxonomy ]">Type</p>
					<p class="[ term ]"><?php echo $resource_type[0]->name; ?></p>
				</div>
			</a>
		</div>
	<?php endif; ?>

	<?php  $subnational = getPostCentre('working_group', 'subnational-governments');
	if ( $subnational ) :  
		$sector = wp_get_post_terms($subnational->ID, 'sector', array("fields" => "all"));
		$resource_type = wp_get_post_terms($subnational->ID, 'resource_type', array("fields" => "all"));
		$user = get_user_by( 'id', $subnational->post_author ); ?>
		
		<div class="[ sc_column_item ][ post-centre ultimo ]">
			<p class="name-term">Subnational Governments</p>
			<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
				<h4 class="[ post__title ]"><?php echo $subnational->post_title ?></h4>
				<p class="[ post__author ]">Author: <?php echo $user->user_login; ?></p>
				<hr>
				<div class="[ cajita ][ working ] ">
					<p class="[ taxonomy ]">Working Group</p>
					<p class="[ term ]">Subnational Governments</p>
				</div>
				<div class="[ cajita ][ sector ] ">
					<p class="[ taxonomy ]">Sector</p>
					<p class="[ term ]"><?php echo $sector[0]->name; ?></p>
				</div>
				<div class="[ cajita ][ type ] ">
					<p class="[ taxonomy ]">Type</p>
					<p class="[ term ]"><?php echo $resource_type[0]->name; ?></p>
				</div>
			</a>
		</div>
	<?php endif; ?>
	
</div>

<h5 class="sub-title-centre">SECTOR</h5>

<div class="[ posts-centre ]">

	<?php $resources_args = array(
		'post_type' => 'resource',
		'posts_per_page' => 3,
		'meta_key' => '_open_contribution_meta',
		'meta_value' => 'no', 
		'tax_query' => array(
			array(
				'taxonomy' => 'sector',
				'field' => 'slug',
				'terms' => array('agriculture', 'anticorruption', 'education', 'private-sector', 'entrepeneurship', 'terrorism') )
			)
		);

	$query_resources = new WP_Query( $resources_args );
	if ( $query_resources->have_posts()) : 
		$count = 1;
		while ( $query_resources->have_posts() ) : $query_resources->the_post(); 
			$class = $count == 3 ? 'ultimo' : ''; 
			$working_group = wp_get_post_terms($post->ID, 'working_group', array("fields" => "all"));
			$sector = wp_get_post_terms($post->ID, 'sector', array("fields" => "all"));
			$resource_type = wp_get_post_terms($post->ID, 'resource_type', array("fields" => "all")); ?>
			
			<div class="[ sc_column_item ][ post-centre <?php echo $class; ?> ]">
				<p class="name-term"><?php echo $sector[0]->name; ?></p>
				<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
					<h4 class="[ post__title ]"><?php echo get_the_title() ?></h4>
					<p class="[ post__author ]">Author: <?php the_author(); ?></p>
					<hr>
					<div class="[ cajita ][ working ] ">
						<p class="[ taxonomy ]">Working Group</p>
						<p class="[ term ]"><?php echo $working_group[0]->name; ?></p>
					</div>
					<div class="[ cajita ][ sector ] ">
						<p class="[ taxonomy ]">Sector</p>
						<p class="[ term ]"><?php echo $sector[0]->name; ?></p>
					</div>
					<div class="[ cajita ][ type ] ">
						<p class="[ taxonomy ]">Type</p>
						<p class="[ term ]"><?php echo $resource_type[0]->name; ?></p>
					</div>
				
				</a>
			</div>
		
			<?php $count++; 
		endwhile; 
	endif; ?>
	
</div>

<h5 class="sub-title-centre">TYPE</h5>

<div class="[ posts-centre ]">

	<?php $resources_args = array(
		'post_type' => 'resource',
		'posts_per_page' => 3,
		'meta_key' => '_open_contribution_meta',
		'meta_value' => 'no', 
		'tax_query' => array(
			array(
				'taxonomy' => 'resource_type',
				'field' => 'slug',
				'terms' => array('datasets', 'graphics', 'educaplatformstion') 
				)
			)
		);

	$query_resources = new WP_Query( $resources_args );
	if ( $query_resources->have_posts()) : 
		$count = 1;
		while ( $query_resources->have_posts() ) : $query_resources->the_post(); 
			$class = $count == 3 ? 'ultimo' : ''; 
			$working_group = wp_get_post_terms($post->ID, 'working_group', array("fields" => "all"));
			$sector = wp_get_post_terms($post->ID, 'sector', array("fields" => "all"));
			$resource_type = wp_get_post_terms($post->ID, 'resource_type', array("fields" => "all")); ?>
			
			<div class="[ sc_column_item ][ post-centre <?php echo $class; ?> ]">

				<a class="[ post__card ]" href="<?php echo the_permalink(); ?>">
					<h4 class="[ post__title ]"><?php echo get_the_title() ?></h4>
					<p class="[ post__author ]">Author: <?php the_author(); ?></p>
					<hr>
					<div class="[ cajita ][ working ] ">
						<p class="[ taxonomy ]">Working Group</p>
						<p class="[ term ]"><?php echo $working_group[0]->name; ?></p>
					</div>
					<div class="[ cajita ][ sector ] ">
						<p class="[ taxonomy ]">Sector</p>
						<p class="[ term ]"><?php echo $sector[0]->name; ?></p>
					</div>
					<div class="[ cajita ][ type ] ">
						<p class="[ taxonomy ]">Type</p>
						<p class="[ term ]"><?php echo $resource_type[0]->name; ?></p>
					</div>
				
				</a>
			</div>
		
			<?php $count++; 
		endwhile; 
	endif; ?>
	
</div>

<?php get_footer(); ?>