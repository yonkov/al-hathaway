<?php
/**
 * Title: Footer Comments
 * Slug: al-hathaway/footer-comments
 * Categories: al-hathaway
 * Inserter: no
 * Description: Homepage-only footer line pointing visitors to the theme author's site.
 */
?>
<!-- wp:paragraph {"align":"center","fontSize":"normal"} -->
<p class="has-text-align-center has-normal-font-size">
	<?php
	printf(
		/* translators: 1: opening anchor tag linking to the Nasio Themes site, 2: closing anchor tag. */
		esc_html__( 'If you have any comments about the design of this web page, you can write to %1$sNasio Themes%2$s.', 'al-hathaway' ),
		'<a href="https://nasiothemes.com" target="_blank" rel="noopener">',
		'</a>'
	);
	?>
</p>
<!-- /wp:paragraph -->
