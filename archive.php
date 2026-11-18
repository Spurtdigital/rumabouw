<?php /*Template Name: Archive - Nieuws */ get_header(); ?>

<?php get_template_part( 'template-parts/layout/archive-header' ); ?>



<section>
    <div class="container mb-6">
        <div class="row">
        <?php $loop = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'post_status' => 'publish',
				'orderby' => 'menu_order'
            ));?>

            <?php $projectcount = 0; while ( $loop->have_posts() ) : $loop->the_post(); $projectcount++; ?>
            <div class="<?php if($projectcount == 3){?>col-lg-12 b-block<?php } else { ?>col-lg-6 <?php }?> mt-3">
                <?php get_template_part( 'template-parts/blocks/block','project' ); ?>
            </div>

            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>