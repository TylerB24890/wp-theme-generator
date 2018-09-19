<div class="post-block">
	<div class="media">
		<?php if(has_post_thumbnail()) : ?>
			<div class="media-left">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<div class="media-body">
			<h2 class="post-title"><?php the_title(); ?></h2>
			<?php the_excerpt(); ?>
		</div>
	</div>
</div>
