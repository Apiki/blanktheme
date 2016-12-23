<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Helper\Utils;
use GB\Theme\Core;
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( Utils::get_site_url() ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Type here to search:', Core::SLUG ); ?>" value="<?php the_search_query(); ?>" name="s" required />
	</label>

	<input type="submit" class="search-submit btn-secondary" value="<?php esc_html_e( 'Search', Core::SLUG ); ?>">
</form>
