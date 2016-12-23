<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Core;

get_header();
the_post();
?>
<article class="the-content-wrap">
	<header class="the-content-header container">
		<div class="the-content-top">
			<a class="back" href="#" title=""><i class="icon-g-arrow-left"></i> <?php esc_html_e( 'back', Core::SLUG ); ?></a>
			<a class="the-content-top-category middle" href="" title="">category</a>
			<button class="the-content-top-comment"><i class="icon-g-message"></i> 3</button>
		</div>

		<h1 class="title">
			<?php the_title(); ?>
		</h1>

		<div class="the-content-summary">
			<p><?php the_excerpt(); ?></p>
		</div>

		<div class="social-share">
			<ul class="social-share-list">
				<li class="facebook"><a href="#" title=""><i class="icon-g-facebook"></i></a></li>
				<li class="linkedin"><a href="#" title=""><i class="icon-g-linkedin"></i></a></li>
				<li class="google-plus"><a href="#" title=""><i class="icon-g-google-plus"></i></a></li>
				<li class="whatsapp"><a href="#" title=""><i class="icon-g-whatsapp"></i></a></li>
				<li class="twitter"><a href="#" title=""><i class="icon-g-twitter"></i></a></li>
			</ul>
		</div>

		<div class="the-content-author">
			<div class="the-content-author-wrap">
				<figure class="the-content-author-thumb">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
				</figure>

				<div class="the-content-author-content">
					<strong class="the-content-author-name"><?php the_author(); ?></strong>
					<time class="the-content-author-date"><?php the_time( get_option( 'date_format' ) ); ?></time>
				</div>
			</div>
		</div>
	</header>

	<div class="the-content content">
		<?php the_content(); ?>
	</div>

	<div class="social-share footer content">
		<span class="social-share-text"><?php esc_html_e( 'share', Core::SLUG ); ?></span>

		<ul class="social-share-list">
			<li class="facebook"><a href="#" title=""><i class="icon-g-facebook"></i></a></li>
			<li class="linkedin"><a href="#" title=""><i class="icon-g-linkedin"></i></a></li>
			<li class="google-plus"><a href="#" title=""><i class="icon-g-google-plus"></i></a></li>
			<li class="whatsapp"><a href="#" title=""><i class="icon-g-whatsapp"></i></a></li>
			<li class="twitter"><a href="#" title=""><i class="icon-g-twitter"></i></a></li>
		</ul>
	</div>

	<?php comments_template(); ?>
</article>

<?php get_footer(); ?>
