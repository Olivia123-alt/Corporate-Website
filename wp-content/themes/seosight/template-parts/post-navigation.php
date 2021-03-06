<?php
/**
 * Template part for displaying section with previous / next posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seosight
 */

$swap_posts_direction = seosight_get_option_value('flip-prev-next-order', false, array('bool_val' => 'yes'));

if ( $swap_posts_direction ) {
	$prev_post = get_next_post();
	$next_post = get_previous_post();
} else {
	$prev_post = get_previous_post();
	$next_post = get_next_post();
}

$taxonomy    = get_query_var( 'taxonomy', 'category' );
$parent_page = get_query_var( 'navigation_page', 0 );
?>
<div class="pagination-arrow">
	<?php if ( ! empty( $prev_post ) ) {
		$id = $prev_post->ID; ?>
        <a href="<?php echo esc_url( get_permalink( $id ) ); ?>" class="btn-nav btn-prev-wrap">
            <svg class="crumina-icon">
                <use xlink:href="#arrow-left"></use>
            </svg>
            <div class="btn-content">
                <div class="btn-content-title"><?php esc_html_e( 'Previous Post', 'seosight' ); ?></div>
                <p class="btn-content-subtitle"><?php echo esc_html( $prev_post->post_title ); ?></p>
            </div>
        </a>
	<?php }

	if ( ! empty( $next_post ) ) {
		$id = $next_post->ID; ?>

        <a href="<?php echo esc_url( get_permalink( $id ) ); ?>" class="btn-nav btn-next-wrap">
            <div class="btn-content">
                <div class="btn-content-title"><?php esc_html_e( 'Next Post', 'seosight' ); ?></div>
                <p class="btn-content-subtitle"><?php echo esc_html( $next_post->post_title ); ?></p>
            </div>
            <svg class="crumina-icon">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </a>

	<?php } ?>
</div>