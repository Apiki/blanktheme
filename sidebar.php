<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Model\Sidebar;
?>
<div class="sidebar">
	<?php dynamic_sidebar( Sidebar::HOME ); ?>
</div>
