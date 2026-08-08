<?php
/**
 * Title: Two-Column Link List
 * Slug: al-hathaway/link-columns
 * Categories: al-hathaway
 * Description: A plain two-column table of important company links, in the spirit of a no-frills corporate home page.
 */
?>
<!-- wp:columns {"className":"link-columns","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns link-columns">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<ul class="wp-block-list">
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'A Message from the Chairman', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Financial Reports &amp; Filings', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Letters to Shareholders', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Board &amp; Leadership', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Responsibility &amp; Impact', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
		</ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<ul class="wp-block-list">
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'News Releases', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Annual Meeting Information', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Investor Relations', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Links to Operating Companies', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Contact Us', 'al-hathaway' ); ?></a></li>
			<!-- /wp:list-item -->
		</ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
