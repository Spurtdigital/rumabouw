<?php get_header(); ?>
<?php $header_image = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>

<section class="single-header"<?php if ( $header_image ) : ?> style="background-image:url('<?php echo esc_url( spurt_image( $header_image, 1920, 9999 ) ); ?>')"<?php endif; ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-1 text-white"><?php echo get_field( 'titel' ) ?: get_the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="page-header my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <?php if ( function_exists( 'yoast_breadcrumb' ) ) { yoast_breadcrumb( '<div class="single-header__breadcrumbs">', '</div>' ); } ?>
            </div>
            <div class="col-lg-8 mt-5">
                <p class="lead mb-5"><?php the_field( 'tekst' ); ?></p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/layouts/layout-builder' ); ?>

<?php get_footer(); ?>
