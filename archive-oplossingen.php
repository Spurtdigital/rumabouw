<?php /* Template Name: Archive - Oplossingen */ get_header(); ?>

<?php get_template_part( 'template-parts/layouts/layout-archive-header' ); ?>

<section>
    <div class="container mb-6">
        <div class="row">
            <?php $solutions_query = new WP_Query( [
                'post_type'      => 'oplossingen',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
            ] ); ?>

            <?php while ( $solutions_query->have_posts() ) : $solutions_query->the_post(); ?>
                <div class="col-xl-4 col-md-6 mt-3">
                    <?php get_template_part( 'template-parts/blocks/block', 'project' ); ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
