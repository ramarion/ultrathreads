<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UltraThreads
 */


?>
    <!-- footer top -->
	<footer id="colophon" class="site-footer">
	<!-- conditional tag for footer menu widgets -->	
	<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : ?>
			<!-- footer widgets -->
			<div class="site-footer-top"><!-- site footer top -->
				<div class="ultrathread-wrapper">
					<div class="footer-widgets-wrapper"> 
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget' ); ?>
						</div>
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget-2' ); ?>
						</div>
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget-3' ); ?>
						</div>
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget-4' ); ?>
						</div>
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget-5' ); ?>
						</div>
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget-6' ); ?>
						</div>
					</div>

					<?php
			$event_args = array( 
				'post_type'   => array( 'ultrathread_event' ),
				'post_status' => 'publish',
				'post_per_page' => '4',
				'orderby' => 'rand'
			);

			$event_query = new WP_Query(  $event_args );

			if (  $event_query->have_posts ( ) ) {
			?>	
			<div class="grid-container">
			<div class="grid-x grid-margin-x ">
			<?php
			/* Start the Loop */
			while ( $event_query->have_posts() ) {
				$event_query->the_post();
				?>
				<div class="cell small-4">
					<?php
					the_post_thumbnail();
					the_title( '<h2 class="post-title-heading">', '</h2>' );
					the_excerpt();
					echo '<a class="post_link" href="'.get_permalink( $id ).'">'."Read More".'</a>';
					
					?>
				</div>
				<?php
				}
				wp_reset_postdata();
				?>
			</div>
			</div>
		<?php } ?>	

				</div>
			</div><!-- .footer-top -->
		<?php endif; ?>
	<div class="site-footer-bottom">
			<div class="ascendoor-wrapper">
				<div class="site-footer-bottom-wrapper">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ultrathread' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'ultrathread' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ultrathread' ), 'ultrathread', '<a href="https://raoulexnurse.com">Raoulex Nurse</a>' );
				?>
		</div><!-- .site-info -->

		<div class="social-icons">
						<?php
						if ( has_nav_menu( 'social' ) ) {
							wp_nav_menu(
								array(
									'menu_class'     => 'menu social-links',
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
									'theme_location' => 'social',
								)
							);
						}
						?>
					</div>
				</div>
			</div>	
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
