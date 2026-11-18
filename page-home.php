<?php /*Template Name: Page - Home */ get_header(); ?>

<section class="home-hero">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8">
                <div class="home-hero__content">
                    <h1 class="display-1"><?php the_field( 'hero_titel' );?></h1>
                    <p><?php the_field( 'hero_tekst' );?></p>
                </div>
            </div>
        </div>
    </div>
    <?php if ( get_field( 'hero_video' ) ) : ?>
    <div class="home-hero__image home-hero__image--video">
        <video autoplay muted loop playsinline poster="<?php echo spurt_image(get_field( 'hero_afbeelding' )['url'],1920,600);?>">
            <source src="<?php echo esc_url( get_field( 'hero_video' ) );?>" type="video/mp4">
        </video>
    </div>
    <?php else : ?>
    <div class="home-hero__image" style="background-image:url('<?php echo spurt_image(get_field( 'hero_afbeelding' )['url'],1920,600);?>')">
    </div>
    <?php endif; ?>
</section>

<section class="home-about my-lg-10 my-md-3 mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-lg-8 pe-lg-3 order-last order-lg-first mt-2 mt-md-0">
                <h2 class="display-2"><?php the_field( 'intro_titel' );?></h2>
                <p><?php the_field( 'intro_tekst' );?></p>
            </div>
            <div class="col-lg-6 order-first order-lg-last">
                <div class="home-about__media">
                    <div class="home-about__image" style="background-image:url('<?php echo spurt_image(get_field( 'intro_afbeelding' )['url'],1920,600);?>')"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="home-service">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 py-lg-5">
                <h2 class="display-2 text-white pe-md-3"><?php the_field( 'diensten_titel' );?></h2>
                <ul class="home-service__list">
                <?php $loop = new WP_Query( array(
                'post_type' => 'oplossingen',
                'posts_per_page' => -1
            ));?>

            <?php $projectcount = 0; while ( $loop->have_posts() ) : $loop->the_post(); $projectcount++; ?>
            <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>

            <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="home-service__media">
                    <div class="home-service__image"style="background-image:url('<?php echo spurt_image(get_field( 'diensten_afbeelding' )['url'],1920,600);?>')"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="home-projects my-lg-10 my-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="display-2">De laatste projecten.</h2>
            </div>
            <div class="col-lg-12">
                <div class="project-slider">
                    <div class="swiper js-project-slider">
                    <div class="swiper-wrapper">
                    <?php $loop = new WP_Query( array(
                        'post_type' => 'project',
                        'posts_per_page' => -1
                    ) );?>

                    <?php $projectcount = 0; while ( $loop->have_posts() ) : $loop->the_post(); $projectcount++; ?>
                    <div class="swiper-slide project-slider__slide">
                        <?php get_template_part( 'template-parts/blocks/block','project' ); ?>
                    </div>

                    <?php endwhile; wp_reset_query(); ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>
