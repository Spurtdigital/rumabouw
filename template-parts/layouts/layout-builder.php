<?php
// Field name 'contentbuilder' is data-coupled; renaming it would require an ACF migration.
if ( have_rows( 'contentbuilder' ) ) : ?>
<section class="builder">
    <?php while ( have_rows( 'contentbuilder' ) ) : the_row(); ?>

        <?php if ( get_row_layout() === 'layout01' ) : // text ?>
            <section class="builder-row">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10 col-md-12">
                            <?php the_sub_field( 'tekstvlak' ); ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ( get_row_layout() === 'layout02' ) : // image / video ?>
            <?php $image = get_sub_field( 'afbeelding' ); $image_video = get_sub_field( 'video' ); ?>
            <section class="builder-row">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10 col-md-12">
                            <div class="builder-media<?php if ( get_sub_field( 'video_link' ) ) : ?> builder-media--video<?php endif; ?>">
                                <div class="builder-media__image">
                                    <?php if ( $image_video ) : ?>
                                        <video autoplay muted loop playsinline<?php if ( $image ) : ?> poster="<?php echo esc_url( $image['url'] ?? '' ); ?>"<?php endif; ?>>
                                            <source src="<?php echo esc_url( $image_video ); ?>" type="video/mp4">
                                        </video>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url( $image['url'] ?? '' ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>">
                                    <?php endif; ?>
                                </div>
                                <?php if ( get_sub_field( 'omschrijving' ) ) : ?>
                                    <div class="builder-media__content">
                                        <?php the_sub_field( 'omschrijving' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( get_sub_field( 'video_link' ) ) : ?>
                                    <a href="<?php echo esc_url( get_sub_field( 'video_link' ) ); ?>" class="stretched-link" data-fancybox></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ( get_row_layout() === 'layout03' ) : // form ?>
            <section class="builder-row">
                <?php $forms = get_sub_field( 'formulier' ); ?>
                <?php if ( $forms ) : ?>
                    <?php foreach ( $forms as $form ) : $cf7_id = $form->ID; ?>
                        <?php echo do_shortcode( '[contact-form-7 id="' . $cf7_id . '"]' ); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>

        <?php elseif ( get_row_layout() === 'layout04' ) : // quote ?>
            <section class="builder-row">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10 col-md-12">
                            <div class="builder-quote">
                                <div class="builder-quote__quote">
                                    <p class="lead"><?php the_sub_field( 'quote' ); ?></p>
                                </div>
                                <div class="builder-quote__quoter">
                                    <p><small><?php the_sub_field( 'quoter' ); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ( get_row_layout() === 'layout05' ) : // buttons ?>
            <section class="builder-row">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10 col-md-12">
                            <?php if ( have_rows( 'buttons' ) ) : $button_count = 0; while ( have_rows( 'buttons' ) ) : the_row(); $button_count++; ?>
                                <a href="<?php echo esc_url( get_sub_field( 'button_link' ) ); ?>" class="btn<?php if ( $button_count < 2 ) : ?> btn-primary<?php else : ?> btn-secondary mt-2 mt-md-0 ms-0 ms-lg-2<?php endif; ?>"><?php the_sub_field( 'button_tekst' ); ?></a>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ( get_row_layout() === 'layout06' ) : // gallery ?>
            <section class="builder-row">
                <div class="slide-container container">
                    <div class="row justify-content-center">
                        <div class="col-12 mb-5">
                            <div class="builder-slider swiper js-builder-slider">
                                <div class="swiper-wrapper">
                                    <?php if ( have_rows( 'afbeeldingen' ) ) : while ( have_rows( 'afbeeldingen' ) ) : the_row(); $slider_image = get_sub_field( 'afbeelding' ); ?>
                                        <div class="builder-slider__slide swiper-slide">
                                            <div class="builder-slide__media">
                                                <img class="img-wide" src="<?php echo spurt_image( $slider_image['url'] ?? '', 900, 500 ); ?>" alt="<?php echo esc_attr( $slider_image['alt'] ?? '' ); ?>">
                                                <a href="<?php echo esc_url( $slider_image['url'] ?? '' ); ?>" class="stretched-link" data-fancybox="gallery"></a>
                                            </div>
                                        </div>
                                    <?php endwhile; endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-10 col-md-12">
                            <div class="slider__line js-slider-line" data-number="0"></div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ( get_row_layout() === 'layout07' ) : // faq ?>
            <section class="builder-row">
                <h2 class="display-3 text-secondary mb-5"><?php the_sub_field( 'titel_faq' ); ?></h2>
                <?php if ( have_rows( 'faq' ) ) : while ( have_rows( 'faq' ) ) : the_row(); ?>
                    <div class="builder-faq-item js-faq">
                        <header class="builder-faq-item__header fw-bold js-faq-toggle">
                            <span class="builder-faq-item__title"><?php the_sub_field( 'titel' ); ?></span>
                            <span class="builder-faq-item__toggler"></span>
                        </header>
                        <main class="builder-faq-item__content js-faq-content">
                            <?php the_sub_field( 'omschrijving' ); ?>
                        </main>
                    </div>
                <?php endwhile; endif; ?>
            </section>

        <?php elseif ( get_row_layout() === 'layout08' ) : // posts grid ?>
            <section class="builder-row">
                <div class="container">
                    <?php if ( get_sub_field( 'titel' ) ) : ?>
                        <div class="col-lg-8 offset-lg-2">
                            <h3 class="display-3 mb-2 mb-lg-4"><?php the_sub_field( 'titel' ); ?></h3>
                        </div>
                    <?php endif; ?>

                    <div class="row g-3">
                        <?php $selected_posts = get_sub_field( 'berichten_of_paginas' ); ?>
                        <?php if ( $selected_posts ) : ?>
                            <?php foreach ( $selected_posts as $post ) : setup_postdata( $post ); ?>
                                <div class="col-lg-4 col-md-6">
                                    <?php get_template_part( 'template-parts/blocks/block', 'project' ); ?>
                                </div>
                            <?php endforeach; wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif ( get_row_layout() === 'layout09' ) : // split content ?>
            <?php
            $split_image = get_sub_field( 'afbeelding' );
            $split_video = get_sub_field( 'video' );
            $image_left  = ( get_sub_field( 'positie' ) === 'links' );
            ?>
            <section class="builder-row">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-first <?php echo $image_left ? 'order-lg-first' : 'order-lg-last'; ?>">
                            <div class="builder-split__media">
                                <?php if ( $split_video ) : ?>
                                    <video autoplay muted loop playsinline<?php if ( $split_image ) : ?> poster="<?php echo esc_url( $split_image['url'] ?? '' ); ?>"<?php endif; ?>>
                                        <source src="<?php echo esc_url( $split_video ); ?>" type="video/mp4">
                                    </video>
                                <?php elseif ( $split_image ) : ?>
                                    <img src="<?php echo spurt_image( $split_image['url'] ?? '', 1200, 900 ); ?>" alt="<?php echo esc_attr( $split_image['alt'] ?? '' ); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 order-last <?php echo $image_left ? 'order-lg-last' : 'order-lg-first'; ?>">
                            <div class="builder-split__content">
                                <?php if ( get_sub_field( 'titel' ) ) : ?>
                                    <h2 class="display-2"><?php the_sub_field( 'titel' ); ?></h2>
                                <?php endif; ?>
                                <?php the_sub_field( 'tekst' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ( get_row_layout() === 'layout10' ) : // image grid ?>
            <?php $grid_view = get_sub_field( 'weergave' ); ?>
            <section class="builder-row">
                <div class="container">
                    <?php if ( have_rows( 'afbeeldingen' ) ) : ?>
                        <?php if ( $grid_view === 'masonry' ) : ?>
                            <div class="builder-grid builder-grid--masonry">
                                <?php while ( have_rows( 'afbeeldingen' ) ) : the_row(); $grid_image = get_sub_field( 'afbeelding' ); ?>
                                    <?php if ( $grid_image ) : ?>
                                        <div class="builder-grid__item">
                                            <img src="<?php echo spurt_image( $grid_image['url'] ?? '', 900 ); ?>" alt="<?php echo esc_attr( $grid_image['alt'] ?? '' ); ?>">
                                            <a href="<?php echo esc_url( $grid_image['url'] ?? '' ); ?>" class="stretched-link" data-fancybox="gallery"></a>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>
                            <?php $grid_col = ( $grid_view === '2' ) ? 'col-md-6' : 'col-md-4'; ?>
                            <div class="builder-grid builder-grid--columns row g-3">
                                <?php while ( have_rows( 'afbeeldingen' ) ) : the_row(); $grid_image = get_sub_field( 'afbeelding' ); ?>
                                    <?php if ( $grid_image ) : ?>
                                        <div class="<?php echo esc_attr( $grid_col ); ?>">
                                            <div class="builder-grid__item">
                                                <img src="<?php echo spurt_image( $grid_image['url'] ?? '', 900, 700 ); ?>" alt="<?php echo esc_attr( $grid_image['alt'] ?? '' ); ?>">
                                                <a href="<?php echo esc_url( $grid_image['url'] ?? '' ); ?>" class="stretched-link" data-fancybox="gallery"></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

    <?php endwhile; ?>
</section>
<?php endif; ?>
