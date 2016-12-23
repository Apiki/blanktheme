<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

if ( post_password_required() ) {
	return;
}

use GB\Theme\Core;
?>
<div id="comments" class="comments-area">
	<div class="comments-wrap content">
		<?php
		comment_form(
			array(
				'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
				'title_reply_after'  => '</h2>',
			)
		);
		?>

		<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();

			if ( 1 === $comments_number ) {
				printf( esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', Core::SLUG ), get_the_title() );
			} else {
				printf(
					_nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						Core::SLUG
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ol>

		<?php the_comments_navigation(); ?>

		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', Core::SLUG ); ?></p>
		<?php endif; ?>
	</div>
</div>
