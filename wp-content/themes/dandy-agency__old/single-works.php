<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php
	$idPost = get_the_ID();
?>
<div class="header parallax" style="background-image: url('<?php the_field('imagen_header'); ?>');" data-speed="10">
	<img class="pic" src="<?php the_field('imagen_header'); ?>" alt="" />
	<div class="title">
		<div class="holder">
			<div>
				<h2><?php the_title(); ?></h2>
				<?php if ($q_config['language']=='en') { ?>
					<?php if (get_field('subtitle_eng')) { ?>
						<h3><?php the_field('subtitle_eng'); ?></h3>
					<?php } ?>
				<?php } ?>
				<?php if ($q_config['language']=='es') { ?>
					<?php if (get_field('subtitle_esp')) { ?>
						<h3><?php the_field('subtitle_esp'); ?></h3>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<?php the_content(); ?>
</div>

<?php
	if (get_field('middle_image')) {
		$middle_img = aq_resize( get_field('middle_image'), 1440, 684, true );
		
		if ($middle_img) { ?>
			<div id="parallax" class="parallax" style="background-image: url('<?php echo $middle_img; ?>');" data-speed="80">
				<img src="<?php echo $middle_img; ?>" alt="" />
			</div>
		<?php }
	}
?>

<?php endwhile; wp_reset_postdata(); ?>

<?php
	//Related Projects - 4
	
	$args = array(
		'post_type' => 'works',
		'posts_per_page' => 4,
		'orderby' => 'rand',
		'post__not_in' => array( $idPost )/*,
		'meta_query' => array(
			array(
				'key' => 'descatar_home', // name of custom field
				'value' => '"si"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare' => 'NOT LIKE'
			)
		)*/
	);
	query_posts( $args );
?>
<?php if ( have_posts() ) : ?>
	<h4 class="titleRelated">Related</h4>
<?php endif; ?>
<?php Starkers_Utilities::get_template_parts( array( 'projects-layout' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>