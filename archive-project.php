<?php /* Template Name: Archive - Projecten */ get_header(); ?>

<?php get_template_part( 'template-parts/layouts/layout-archive-header' ); ?>

<section>
    <div class="container mb-6">
        <div class="row gy-2">
            <?php $projects_query = new WP_Query( [
                'post_type'      => 'project',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
            ] ); ?>

            <?php $project_count = 0; while ( $projects_query->have_posts() ) : $projects_query->the_post(); $project_count++; ?>
                <?php $item_class = ( $project_count === 3 ) ? 'block-project-wide col-lg-12 mt-3' : 'col-lg-6 mt-3'; ?>
                <div class="<?php echo esc_attr( $item_class ); ?>">
                    <?php get_template_part( 'template-parts/blocks/block', 'project' ); ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
