<?php get_header();?>
<?php $headerimg = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>



<section class="single-header" style="background-image:url('<?php echo spurt_image($headerimg, 1920,9999)?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-1 text-white"><?php if(get_field( 'titel' )){ the_field( 'titel' ); } else { the_title(); } ?></h1>
               
            </div>
        </div>
    </div>
</section>
<section class="breadcumb my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<div class="single-header__breadcrumbs">','</div>' ); }?>
            </div>
            <div class="col-lg-8 mt-5">
                <p class="lead mb-5"><?php the_field( 'tekst' );?></p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/layout/builder' ); ?>
<?php /* 
<section class="author mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <div class="author-block d-sm-flex align-items-center justify-content-between bt">

 
                <div class="author__img d-flex align-items-center">
                    <img width="67" height="67" src="https://first.moddit.dev/wp-content/webp-express/webp-images/uploads/moddit-fly-images/51/kevin-1-67x67-c.jpg.webp" class="me-2 d-md-block d-none" alt="Kevin Brinkman">        <div>
                    <strong class="d-block mb-0">Meer weten over dit project?</strong>
                    <span>Kevin Brinkman vertelt je graag meer</span>
                </div>
            </div>
            <a href="#" class="btn btn-primary mt-2 mt-md-0">Contact opnemen</a>
            </div>
        </div>
    </div>
</section> */ ?>

<?php get_footer();?>