<?php
/**
 * Title: Business Introduction
 * Slug: al-hathaway/business-intro
 * Categories: al-hathaway
 * Description: A centered address block and short statement, echoing a corporate home page masthead.
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--10)">
	<!-- wp:paragraph {"align":"center","fontSize":"normal"} -->
	<p class="has-text-align-center has-normal-font-size"><?php echo esc_html__( '3555 Farnam Street', 'al-hathaway' ); ?><br><?php echo esc_html__( 'Omaha, NE 68131', 'al-hathaway' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
