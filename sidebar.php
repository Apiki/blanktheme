<?php
// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use Apiki\Theme\Sidebar;
?>

<div class="sidebar">
	<?php dynamic_sidebar( Sidebar::HOME ); ?>
</div>
