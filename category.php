<?php /*Template Name: Archive - News */ get_header(); ?>

<div class="archive-header">
    <div class="container mb-5">
        <h1 class="display-1">
            <?php single_cat_title(); ?>
            </h1>
            <?php $term_description = term_description();
                if ( ! empty( $term_description ) ) :
                    printf( '<div class="taxonomy-description">%s</div>', $term_description );
                endif;
			?>
    </div>
</div>

<div class="archive-content mb-lg-10 mb-5">
    <div class="container">
        <div class="row g-3">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                <?php get_template_part( 'template-parts/blocks/block','project' ); ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>