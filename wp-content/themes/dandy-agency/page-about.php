<?php
/**
 * Template name: About
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php global $q_config; ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="header parallax" style="background-image: url('<?php the_field('imagen_header'); ?>');" data-speed="10">
	<img class="pic" src="<?php the_field('imagen_header'); ?>" alt="" />
</div>

<div class="content">
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
</div>

<?php 
	//Staff 
	
	if( have_rows('the_boyz') ){
		// loop through the rows of data ?>
		<div class="staff clearfix"><?php
			while ( have_rows('the_boyz') ) : the_row();
				if( get_row_layout() == 'the_boyz_item' ) {
					if( get_sub_field('the_boyz_item_img') ) { ?>
						<div class="member" style="background-image: url('<?php the_sub_field('the_boyz_item_img'); ?>');">
							<img class="pic" src="<?php the_sub_field('the_boyz_item_img'); ?>" alt="" />
							<div class="txt">
								<?php if ($q_config['language']=='en') {
									the_sub_field('the_boyz_item_txt');
								} 
								if ($q_config['language']=='es') { 
									the_sub_field('the_boyz_item_txt_esp');
								} ?>
							</div>
						</div><?php
					};
				};
			endwhile; ?>
		</div> <?php
	};
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

<div class="content">
	<h2 style="font-size: 28px; padding-bottom: 30px;">
		<?php if ($q_config['language']=='en') { ?>
			Let's talk about your new project	
		<?php } ?>
		<?php if ($q_config['language']=='es') { ?>
			Hablemos sobre su nuevo proyecto
		<?php } ?>
	</h2>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/contact-form' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>