<?php
/**
 * Al Hathaway functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Al Hathaway
 */

function al_hathaway_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'al-hathaway', get_template_directory() . '/languages' );

		// Add theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
		add_theme_support( 'responsive-embeds' );

		// Let businesses add their logo (Appearance > Editor, and the Site Logo block).
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 120,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		// Load the front-end stylesheet inside the block editor so links match.
		add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'al_hathaway_setup' );

/**
 * Enqueue scripts and styles
 */
function al_hathaway_scripts() {
		wp_enqueue_style( 'al-hathaway-styles', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'al_hathaway_scripts' );

// Add scripts and styles for backend
function al_hathaway_scripts_admin( $hook ) {
		// Styles
		wp_enqueue_style(
			'al_hathaway-style-admin',
			get_template_directory_uri() . '/admin/css/admin.css',
			'',
			filemtime( get_template_directory() . '/admin/css/admin.css' ),
			'all'
		);
}
add_action( 'admin_enqueue_scripts', 'al_hathaway_scripts_admin' );

function al_hathaway_excerpt_length( $length ) {
		return 25;
}
add_filter( 'excerpt_length', 'al_hathaway_excerpt_length' );

/**
 * Registers block patterns categories, and type.
 */

function al_hathaway_register_block_patterns() {
	$block_pattern_categories = array(
		'al-hathaway' => array( 'label' => esc_html__( 'Al Hathaway', 'al-hathaway' ) ),
	);
	$block_pattern_categories = apply_filters( 'al_hathaway_block_pattern_categories', $block_pattern_categories );
	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'al_hathaway_register_block_patterns', 9 );

/* Add custom body class based on the style variation */

function al_hathaway_body_classes( $classes ) {

	$style_variation = wp_get_global_settings( array( 'custom', 'variation' ) );
	$classes[] = 'variation-' . $style_variation;
	
	return $classes;
}

add_filter( 'body_class', 'al_hathaway_body_classes' );

function al_hathaway_call_to_action_markup() {

	global $current_user;
	$user_id        = $current_user->ID;
	$theme_homepage = 'https://nasiothemes.com/themes/al-hathaway';
	$theme_demo     = 'https://al-hathaway-demo.nasiothemes.com/';
	$theme_name     = wp_get_theme( get_template() )->get( 'Name' );

	if ( ! get_user_meta( $user_id, 'al_hathaway_hide_admin_notice2' ) ) : ?>
	<div id="message" class="notice notice-success nasiothemes-notice nasiothemes-welcome-notice">
		<a class="nasiothemes-message-close notice-dismiss" href="?al_hathaway_hide_admin_notice2=0"></a>

		<div class="nasiothemes-message-content">
			<div class="nasiothemes-message-image">
				<a href="<?php echo esc_url( $theme_homepage ); ?>"><img class="nasiothemes-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/theme-logo.jpg" alt="<?php echo esc_attr( $theme_name ); ?>" /></a>
			</div>

			<div class="nasiothemes-message-text">
				<h2 class="nasiothemes-message-heading">
					<?php
					/* translators: %s: theme name */
					printf( esc_html__( 'Thank you for choosing %s!', 'al-hathaway' ), esc_html( $theme_name ) );
					?>
				</h2>
				<?php
				echo '<p>';
					/* translators: %1$s: link to the theme homepage, %2$s: theme name */
					printf( wp_kses_post( __( 'To take advantage of everything that this theme can offer, please take a look at the <a href="%1$s">Get Started with %2$s</a> page.', 'al-hathaway' ) ), esc_url( $theme_homepage ), esc_html( $theme_name ) );
				echo '</p>';

				echo '<p class="notice-buttons"><a href="' . esc_url( $theme_homepage ) . '" target="_blank" rel="noopener" class="button button-primary">';

				/* translators: %s: theme name */
				printf( esc_html__( 'Get started with %s', 'al-hathaway' ), esc_html( $theme_name ) );
				echo '</a>';
				echo ' <a href="' . esc_url( $theme_demo ) . '" target="_blank" rel="noopener" class="button button-primary nasiothemes-button nasiothemes-button-preview"><span class="dashicons dashicons-visibility"></span> ';
				echo esc_html__( 'Live preview', 'al-hathaway' );
				echo '</a></p>';
				?>
			</div><!-- .nasiothemes-message-text -->
		</div><!-- .nasiothemes-message-content -->
	</div><!-- #message -->

		<?php
	endif;
}

add_action( 'admin_notices', 'al_hathaway_call_to_action_markup' );

function al_hathaway_dismiss_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	if ( isset( $_GET['al_hathaway_hide_admin_notice2'] ) && '0' === $_GET['al_hathaway_hide_admin_notice2'] ) {
		add_user_meta( $user_id, 'al_hathaway_hide_admin_notice2', 'true', true );
	}
}
add_action( 'admin_init', 'al_hathaway_dismiss_admin_notice' );

require get_template_directory() . '/tgm/plugin-activation.php';
require get_template_directory() . '/tgm/recommended-plugins.php';
