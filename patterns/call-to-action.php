<?php
/**
 * Title: Call to Action
 * Slug: al-hathaway/call-to-action
 * Categories: al-hathaway
 * Description: A quiet, ruled call-to-action notice for a promotion or free quote.
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"},"border":{"color":"var(--wp--preset--color--contrast)","width":"1px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:var(--wp--preset--color--contrast);border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"align":"center","fontSize":"medium","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
	<p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'For a free, no-obligation quote that could save you substantial money', 'al-hathaway' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"align":"center","fontSize":"normal"} -->
	<p class="has-text-align-center has-normal-font-size"><a href="#"><?php echo esc_html__( 'Request a Quote', 'al-hathaway' ); ?></a> <?php echo esc_html__( 'or call 1-888-000-0000, 24 hours a day.', 'al-hathaway' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
