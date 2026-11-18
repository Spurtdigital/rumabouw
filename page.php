<?php get_header();?>
<section class="breadcumb py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<div class="single-header__breadcrumbs">','</div>' ); }?>
            </div>
            <div class="col-lg-8 mt-5">
                <h1 class="display-2"><?php the_title();?></h1>
                <p class="lead mb-5"><?php the_field( 'tekst' );?></p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/layout/builder' ); ?>

<?php get_footer();?>