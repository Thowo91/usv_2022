<?php get_header(); ?>
<div class="bg-white">
	<article>
		<header>
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</header>
		<div>
			<?php the_content(); ?>
		</div>
	</article>
</div>
<?php get_footer(); ?>
