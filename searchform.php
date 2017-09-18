<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Core;
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-form-field" placeholder="<?php esc_attr_e( 'Type here to search:', 'gb-theme' ); ?>" value="<?php the_search_query(); ?>" name="s" required/>
	</label>

	<button class="search-form-btn" type="submit" value="<?php esc_html_e( 'Search', 'gb-theme' ); ?>">
		<i class="icon-g-search"></i>
	</button>
</form>
