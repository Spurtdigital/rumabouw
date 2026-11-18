<?php /* Template Name: Archive - Nieuws */ get_header(); ?>

<?php get_template_part( 'template-parts/layouts/layout-archive-header' ); ?>

<section>
    <div class="container mb-6">
        <div class="row">
            <?php $posts_query = new WP_Query( [
                'post_type'      => 'post',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order',
            ] ); ?>

            <?php $project_count = 0; while ( $posts_query->have_posts() ) : $posts_query->the_post(); $project_count++; ?>
                <?php $item_class = ( $project_count === 3 ) ? 'block-project-wide col-lg-12 mt-3' : 'col-lg-6 mt-3'; ?>
                <div class="<?php echo esc_attr( $item_class ); ?>">
                    <?php get_template_part( 'template-parts/blocks/block', 'project' ); ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
