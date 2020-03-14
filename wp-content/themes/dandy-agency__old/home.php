<?php
/**
 * Template name: Home
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php
	//HOME
	if ( have_posts() ):
	
	if (get_field('middle_image')) {
		$middle_img = aq_resize( get_field('middle_image'), 1440, 684, true );
	}
?>	
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="flexslider">
			<ul class="slides">						
				<!-- Imagenes -->
				<?php
					$args = array(
					'post_type' => 'attachment',
					'post_mime_type' => 'image',
					'post_parent' => $post->ID,
					'posts_per_page'   => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC'
				);
				$images = get_posts( $args );
				foreach($images as $image) {
					$img_url = wp_get_attachment_url( $image->ID, 'full'); //get img URL
					$imageBig = aq_resize( $img_url, 1440, 800, true ); //resize & crop img ?>
					<li><img class="lazy" data-src="<?php echo $imageBig; ?>" alt="" /></li><?php
				} ?>
			</ul>
		</div>
	<?php endwhile; ?>
	
	<div class="content">
		<?php the_content(); ?>
	</div>
	
<?php endif; wp_reset_postdata(); ?>

<?php
	//Projects - 4
	
	$args = array(
		'post_type' => 'works',
		'posts_per_page' => 4,
		'meta_query' => array(
			array(
				'key' => 'descatar_home', // name of custom field
				'value' => '"si"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	);
	query_posts( $args );
?>
<?php Starkers_Utilities::get_template_parts( array( 'projects-layout' ) ); ?>

<?php if ($middle_img) { ?>
	<div id="parallax" class="parallax" style="background-image: url('<?php echo $middle_img; ?>');" data-speed="80">
		<img src="<?php echo $middle_img; ?>" alt="" />
	</div>
<?php } ?>

<?php
	//Projects - 2
	
	$args = array(
		'post_type' => 'works',
		'posts_per_page' => 2,
		'offset' => 4,
		'meta_query' => array(
			array(
				'key' => 'descatar_home', // name of custom field
				'value' => '"si"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	);
	query_posts( $args );
?>
<?php Starkers_Utilities::get_template_parts( array( 'projects-layout' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>