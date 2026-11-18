<?php /*Template Name: Page - Contact */ get_header(); ?>
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
        <?php $headerimg = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

        <div class="col-lg-12">
            <img src="<?php echo spurtImage($headerimg, 1400,300)?>" alt="" class="img-wide">
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?>
            </div>
            <div class="col-xl-4 col-lg-6 offset-xl-1">
                <div class="block-contact">
                    <ul class="block-contact__menu">
                    <h3 class="display-4 text-white mb-1">Ruma Bouw B.V</h3>
                        <li><?php the_field( 'straatnaam', 'options' );?></li>
                        <li><?php the_field( 'postcode', 'options' );?> <?php the_field( 'plaats', 'options' );?></li>
                        <li><span class="me-1">KvK.</span><?php the_field( 'kvk_nummer', 'options' );?></li>
                        <li><span class="me-1">BTW nr.</span><?php the_field( 'btw_nummer', 'options' );?></li>
                        <small class="d-block mt-1 fw-bold">Contactgegevens</small>
                        <?php if ( have_rows('contact_telefoonnummers','options') ) : while( have_rows('contact_telefoonnummers','options') ) : the_row(); ?>
                                <li><span class="me-1">T.</span><a href="tel:<?php the_sub_field( 'telefoonnummer', 'options' );?>"><?php the_sub_field( 'telefoonnummer', 'options' );?></a> <small><?php the_sub_field( 'label' );?></small> </li>
                        <?php endwhile; endif; ?>
                        <li><span class="me-1">M.</span><a href="mailto:<?php the_field( 'mailadres', 'options' );?>"><?php the_field( 'mailadres', 'options' );?></a></li>
                        <small class="d-block mt-1 fw-bold">Administratie</small>
                        <li><span class="me-1">M.</span><a href="mailto:<?php the_field( 'factuur_emailadres', 'options' );?>"><?php the_field( 'factuur_emailadres', 'options' );?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>