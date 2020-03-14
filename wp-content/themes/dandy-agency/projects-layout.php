<?php global $q_config; ?>

<?php if ( have_posts() ) : ?>
	<ul id="projects" class="clearfix">
	
	<?php while ( have_posts() ) : the_post(); ?>	
		<li>
			<a href="<?php the_permalink(); ?>" class="callPageTransition">
				<?php if (has_post_thumbnail()){
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb, 'full'); //get img URL
					$image = aq_resize( $img_url, 588, 320, true ); //resize & crop img
					?><img src="<?php echo $image ?>" alt="" />
				<?php } ?>
				<div class="hover">
					<div class="holder">
						<h3><?php the_title(); ?></h3>
						<?php if ($q_config['language']=='en') { ?>
							<?php if (get_field('subtitle_eng')) { ?>
								<h4><?php the_field('subtitle_eng'); ?></h4>
							<?php } ?>
						<?php } ?>
						<?php if ($q_config['language']=='es') { ?>
							<?php if (get_field('subtitle_esp')) { ?>
								<h4><?php the_field('subtitle_esp'); ?></h4>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</a>
		</li>
	<?php endwhile; ?>
	
	</ul>
<?php endif; wp_reset_postdata(); ?>