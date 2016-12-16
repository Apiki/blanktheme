<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

get_header();
?>

<chosen-multiple>
	<option value="1">Item 1</option>
	<option value="2">Item 2</option>
	<option value="3">Item 3</option>
</chosen-multiple>

<chosen>
	<option value="1">Item 1</option>
	<option value="2">Item 2</option>
	<option value="3">Item 3</option>
</chosen>

<slider space="30">
	<div class="swiper-slide">
		<img src="https://placeholdit.imgix.net/~text?txtsize=55&txt=800%C3%97220&w=800&h=220" alt="" />
	</div>
	<div class="swiper-slide">
		<img src="https://placeholdit.imgix.net/~text?txtsize=55&txt=800%C3%97220&w=800&h=220" alt="" />
	</div>
	<div class="swiper-slide">
		<img src="https://placeholdit.imgix.net/~text?txtsize=55&txt=800%C3%97220&w=800&h=220" alt="" />
	</div>
</slider>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
