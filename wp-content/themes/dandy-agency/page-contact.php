<?php
/**
 * Template name: Contact
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="header parallax" style="background-image: url('<?php the_field('imagen_header'); ?>');" data-speed="10">
	<img class="pic" src="<?php the_field('imagen_header'); ?>" alt="" />
</div>

<div class="content">
	<!--<h2><?php the_title(); ?></h2>-->
	<?php the_content(); ?>
	
	<?php Starkers_Utilities::get_template_parts( array( 'parts/contact-form' ) ); ?>
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
	//Projects - 4
	
	$args = array(
		'post_type' => 'works',
		'posts_per_page' => 4,
		'orderby' => 'rand'/*,
		'meta_query' => array(
			array(
				'key' => 'descatar_home', // name of custom field
				'value' => '"si"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)*/
	);
	query_posts( $args );
?>
<?php Starkers_Utilities::get_template_parts( array( 'projects-layout' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>