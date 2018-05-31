<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content(
						sprintf(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
							get_the_title()
						)
					);
				?>
				<!-- Custom Hat Code --> 
				<div class='tom-work-grid' >
				<?php
					$args = array(
				    'posts_per_page' => '5',
			      'post_type' => 'hats',
						'order' => 'ASC'
			    );
				  $myHats = new WP_Query( $args );
					// The Loop
					$counter = 5;
					while ($myHats->have_posts()): 
						$myHats->the_post();
						$meta = get_post_meta( $post->ID, $key = '', $single = false );
						$color = $meta['color'][0];
						if ($counter-- < 0) break;
						if (has_post_thumbnail()): ?>
							<img class="tom-image" src="<?php the_post_thumbnail_url(120); ?>" alt="" width="120" height="120">
							<?php endif; ?>
							<div class='tom-content' style='border:2px solid <?php echo $color; ?>'>
								<h2 style='border-bottom: 1px dashed <?php echo $color; ?>'> <?php the_title(); ?> </h2>
								<p><?php the_content(); ?></p>
							</div>
					  <?php
		    	endwhile;
					wp_reset_postdata();		
		    	// Reset Post Data
				?>
				</div>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
