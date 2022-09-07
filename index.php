<?php get_header(); ?>


    <div class="row">
        <div class="col-md-9">
            <div class="bg-white">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
    


<?php get_footer(); ?>