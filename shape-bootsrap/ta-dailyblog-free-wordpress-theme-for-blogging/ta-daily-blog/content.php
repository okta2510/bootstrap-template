<?php
/**
 * @package TA DailyBlog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-thumbnail">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'featured-images', array( 'class' => 'featured' )); ?>
			</a>
		<?php endif; ?>
	</div>

	<div class="post-inner-content well">
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if (ta_option('disable_meta') =='1') { ?>
				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php ta_daily_blog_posted_on(); ?>
						<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages ?>
						<?php
							/* translators: used between list items, there is a space after the comma */
							$categories_list = get_the_category_list( __( ', ', 'ta-dailyblog' ) );
							if ( $categories_list && ta_daily_blog_categorized_blog() ) :
						?>
							<span class="cat-links">
								<?php printf( __( '<i class="fa fa-folder-o"></i> %1$s', 'ta-dailyblog' ), $categories_list ); ?>
							</span>
						<?php endif; // End if categories ?>
						<?php endif; // End if 'post' == get_post_type() ?>

						<?php if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'stats' ) ) : ?>
							<?php jp_get_post_views( $post->ID ); ?>
						<?php endif; ?>

						<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<span class="comments-link"><i class="fa fa-comments-o"></i><?php comments_popup_link( __( 'Leave a comment', 'ta-dailyblog' ), __( '1 Comment', 'ta-dailyblog' ), __( '% Comments', 'ta-dailyblog' ) ); ?></span>
						<?php endif; ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			<?php } ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ta-dailyblog' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'ta-dailyblog' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<p><?php edit_post_link( __( 'Edit', 'ta-dailyblog' ), '<span class="edit-link">', '</span>' ); ?></p>
		</footer><!-- .entry-footer -->
	</div><!-- .post-inner-content -->
</article><!-- #post-## -->