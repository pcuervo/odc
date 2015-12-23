			<div class="post_info">
				<?php
				$info_parts = array_merge(array(
					'snippets' => false,	// For singular post/page/team etc.
					'date' => true,
					'author' => true,
					'terms' => true,
					'counters' => true
					), isset($info_parts) && is_array($info_parts) ? $info_parts : array());
									
				if ($info_parts['date']) {
					?>
					<span class="post_info_item post_info_posted"><?php _e('Posted', 'axiom'); ?> <a href="<?php echo esc_url($post_data['post_link']); ?>" class="post_info_date<?php echo esc_attr($info_parts['snippets'] ? ' date updated' : ''); ?>"<?php echo ($info_parts['snippets'] ? ' itemprop="datePublished" content="'.get_the_date('Y-m-d').'"' : ''); ?>><?php echo esc_html($post_data['post_date']); ?></a> <span>/</span> <?php the_category(', ') ?></span>
					<?php
				}
				if ($info_parts['terms'] && !empty($post_data['post_terms'][$post_data['post_taxonomy']]->terms_links)) {
					?>
					<span class="post_info_item post_info_tags"><?php _e('in', 'axiom'); ?> <?php echo join(', ', $post_data['post_terms'][$post_data['post_taxonomy']]->terms_links); ?></span>
					<?php
				}
				if ($info_parts['counters']) {
					?>
					<span class="post_info_item post_info_counters"><?php require(axiom_get_file_dir('templates/parts/counters.php')); ?></span>
					<?php
				}
				?>
			</div>
