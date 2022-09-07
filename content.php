<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<span><?php echo get_the_date('l, j. F Y'); ?></span>
	</header>
	<div>
		<?php the_content(); ?>
    </div>
	<hr />
</article>