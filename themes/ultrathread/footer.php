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

	<footer id="colophon" class="site-footer">
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

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Secondary Menu', 'ultrathread' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-secondary',
					'menu_id'        => 'secondary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
