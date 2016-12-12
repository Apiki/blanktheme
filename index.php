<?php
// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

get_header();
?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
