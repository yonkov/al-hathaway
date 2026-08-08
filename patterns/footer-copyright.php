<?php
/**
 * Title: Footer Copyright
 * Slug: al-hathaway/footer-copyright
 * Categories: al-hathaway
 * Inserter: no
 * Description: Legal disclaimer note and dynamic copyright line used inside the footer template part.
 */
?>
<!-- wp:paragraph {"align":"center","fontSize":"normal"} -->
<p class="has-text-align-center has-normal-font-size">
	<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php echo esc_html__( 'Legal Disclaimer', 'al-hathaway' ); ?></a>
	&nbsp;&middot;&nbsp;
	<?php
	printf(
		/* translators: 1: copyright symbol, 2: current year, 3: site name. */
		esc_html__( 'Copyright %1$s %2$s %3$s', 'al-hathaway' ),
		'&copy;',
		esc_html( gmdate( 'Y' ) ),
		esc_html( get_bloginfo( 'name' ) )
	);
	?>
</p>
<!-- /wp:paragraph -->
