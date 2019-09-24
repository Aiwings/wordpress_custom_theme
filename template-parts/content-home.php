<?php
/**
 * Template part for displaying HomePage Content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<header class="entry-header" id="scrollbg">
    <div>
        <img class="portrait aligncenter wp-image-35 size-thumbnail"
                src="<?php echo get_theme_mod('header_portrait'); ?>"
                alt="Guillaume Roux" width="150" height="150">
                <?php echo _portfolio_homeformat(get_post_meta($post->ID, 'introduction_header', true)); ?>
        <!-- wp:columns -->
        <div class="wp-block-columns has-2-columns">
            <!-- wp:column {"className":"col-g"} -->
            <div class="wp-block-column col-g">
                <?php echo _portfolio_homeformat(get_post_meta($post->ID, 'introduction_col1', true));  ?>
            <!-- /wp:column -->
            </div>
            <!-- wp:column {"className":"col-d"} -->
            <div class="wp-block-column col-d">
                    <?php echo _portfolio_homeformat(get_post_meta($post->ID, 'introduction_col2', true)); ?>
                <!-- /wp:column -->
            </div>
                <!-- /wp:columns -->
        </div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'portfolio' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
