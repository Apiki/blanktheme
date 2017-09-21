<?php
if ( ! function_exists( 'add_action' ) ) {
	exit(0);
}
?>

<div class="card-post">
	<?php if( has_post_thumbnail() ) : ?>
	<figure class="card-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'card-post' ); ?>
		</a>
	</figure>
	<?php endif; ?>
	<div class="card-content">
		<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<?php the_excerpt(); ?>
	</div>
</div>
