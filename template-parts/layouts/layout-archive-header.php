<section class="archive-header bg-light py-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-10 col-md-12">
                <?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
                    <?php yoast_breadcrumb( '<div class="archive-header__breadcrumbs">', '</div>' ); ?>
                <?php endif; ?>
                <h1 class="display-2 mb-lg-3 mb-1 mt-lg-8"><?php echo get_field( 'titel' ) ?: get_the_title(); ?></h1>
                <p class="lead mb-5"><?php the_field( 'tekst' ); ?></p>
            </div>
        </div>
    </div>
</section>
