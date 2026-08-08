<?php
/**
 * Title: Two-Column Post List
 * Slug: al-hathaway/post-columns
 * Categories: al-hathaway
 * Block Types: core/query
 * Description: The ten most recent posts as a plain two-column list of links, matching the two-column link list.
 */
?>
<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"className":"post-columns","layout":{"type":"default"}} -->
<div class="wp-block-query post-columns">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|40"}}},"layout":{"type":"grid","minimumColumnWidth":"24rem"}} -->
		<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontWeight":"400","lineHeight":"1.65","textDecoration":"underline","letterSpacing":"normal"}},"fontSize":"medium","fontFamily":"serif"} /-->
	<!-- /wp:post-template -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php echo esc_html__( 'No posts have been published yet.', 'al-hathaway' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
