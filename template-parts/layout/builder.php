<?php if ( have_rows( 'contentbuilder' ) ) : ?>
<section class="builder">
    <?php while ( have_rows('contentbuilder' ) ) : the_row(); ?>

        <?php if ( get_row_layout() == 'layout01' ) : // textarea ?>
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 col-md-12">
                        <?php the_sub_field( 'tekstvlak' ); ?>
                    </div>
                </div>
            </div>

        <?php elseif ( get_row_layout() == 'layout02' ) : // single img ?>    
            <?php $image = get_sub_field( 'afbeelding' ); $imagevideo = get_sub_field( 'video' );?>
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 col-md-12">
                        <div class="builder-media <?php if ( get_sub_field('video_link') ) : ?>builder-media--video<?php endif;?>">
                            <div class="builder-media__image">
                                <?php if ( $imagevideo ) : ?>
                                    <video autoplay muted loop playsinline <?php if ( $image ) : ?>poster="<?php echo $image['url'];?>"<?php endif;?>>
                                        <source src="<?php echo esc_url( $imagevideo );?>" type="video/mp4">
                                    </video>
                                <?php else : ?>
                                    <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                                <?php endif; ?>
                            </div>
                            <?php if ( get_sub_field('omschrijving') ) : ?>
                            <div class="builder-media__content">
                                <?php the_sub_field( 'omschrijving' ); ?>
                            </div>
                            <?php endif; ?>
                            <?php if ( get_sub_field('video_link') ) : ?>
                                <a href="<?php the_sub_field( 'video_link' ); ?>" class="stretched-link" data-fancybox></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ( get_row_layout() == 'layout03' ) : // form ?>   
            <div class="col-12 mb-5">
                <?php $posts = get_sub_field('formulier');
                if( $posts ): 
                    foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) 
                    $cf7_id= $p->ID;
                    echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                    endforeach;
                endif; ?>
            </div> 

        <?php elseif ( get_row_layout() == 'layout04' ) : // quote ?>    
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 col-md-12">
                        <div class="builder-quote">
                            <div class="builder-quote__quote">
                                <p class="lead"><?php the_sub_field( 'quote' );?></p>
                            </div>
                            <div class="builder-quote__quoter">
                                <p><small><?php the_sub_field( 'quoter' );?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ( get_row_layout() == 'layout05' ) : // buttons ?>    
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 col-md-12">
                    <?php if ( have_rows('buttons') ) : $btncount = 0; while( have_rows('buttons') ) : the_row(); $btncount++;?>
                        <a href="<?php the_sub_field('button_link'); ?>" class="btn <?php if($btncount < 2){ ?> btn-primary<?php } else { ?> btn-secondary  mt-2 mt-md-0 ms-0 ms-lg-2  <?php } ?>"><?php the_sub_field('button_tekst'); ?></a>
                    <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        <?php elseif ( get_row_layout() == 'layout06' ) : // gallery ?>   
            <div class="container mb-5 slide-container">
                <div class="row justify-content-center">
                    <div class="col-12 mb-5">
                        <div class="builder-slider js-builder-slider">
                            <?php if ( have_rows('afbeeldingen') ) : while( have_rows('afbeeldingen') ) : the_row(); $buildersliderimg = get_sub_field( 'afbeelding' );?>
                                <div class="builder-slider__slide">
                                    <div class="builder-slide__media">
                                        <img class="img-wide" src="<?php echo spurtImage($buildersliderimg['url'],900,500);?>" alt="<?php echo $buildersliderimg['alt']?>">
                                        <a href="<?php echo $buildersliderimg['url'];?>" class="stretched-link" data-fancybox="gallery"></a>
                                    </div>
                                </div>
                            <?php endwhile;endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-10 col-md-12">
                        <div class="js-slider-line slider__line" data-number="0"></div>
                    </div>
                </div>
            </div>
        <?php elseif ( get_row_layout() == 'layout07' ) : // faq ?>   
            <div class="col-12 mb-5">
                <h2 class="display-3 fw-bold text-secondary mb-5"><?php the_sub_field( 'titel_faq' );?></h2>
                <?php if ( have_rows('faq') ) : while( have_rows('faq') ) : the_row(); ?>
                    <div class="builder-faq-item js-faq">
                        <header class="builder-faq-item__header js-faq-toggle">
                            <span class="builder-faq-item__title"><?php the_sub_field( 'titel' );?></span>
                            <span class="builder-faq-item__toggler"></span>
                        </header>
                        <main class="builder-faq-item__content js-faq-content">
                            <?php the_sub_field( 'omschrijving' );?>
                        </main>
                    </div>
                <?php endwhile;  endif; ?>
              
            </div>
       <?php elseif ( get_row_layout() == 'layout08' ) : // faq ?>   
        <div class="container">
            <?php if ( get_sub_field('titel') ) : ?>
                <div class="col-lg-8 offset-lg-2">
                    <h3 class="display-3 mb-2 mb-lg-4"><?php echo get_sub_field('titel'); ?></h3>
                </div>
            <?php endif; ?>
            
            <div class="row g-3">
                <?php $posts = get_sub_field('berichten_of_paginas'); ?>
                <?php if ( $posts ): ?>
             
                        <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                            <div class="col-lg-4 col-md-6">
                                <?php get_template_part( 'template-parts/blocks/block','project' ); ?>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                
                <?php endif; ?>
                
            </div>
        </div>
       <?php elseif ( get_row_layout() == 'layout09' ) : // split content ?>
        <?php
            $splitafb    = get_sub_field( 'afbeelding' );
            $splitvideo  = get_sub_field( 'video' );
            $imageleft   = ( get_sub_field( 'positie' ) == 'links' );
        ?>
        <div class="container mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6 order-first <?php echo $imageleft ? 'order-lg-first' : 'order-lg-last'; ?>">
                    <div class="builder-split__media">
                        <?php if ( $splitvideo ) : ?>
                            <video autoplay muted loop playsinline <?php if ( $splitafb ) : ?>poster="<?php echo $splitafb['url'];?>"<?php endif;?>>
                                <source src="<?php echo esc_url( $splitvideo );?>" type="video/mp4">
                            </video>
                        <?php elseif ( $splitafb ) : ?>
                            <img src="<?php echo spurtImage( $splitafb['url'], 1200, 900 );?>" alt="<?php echo $splitafb['alt'];?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 order-last <?php echo $imageleft ? 'order-lg-last' : 'order-lg-first'; ?>">
                    <div class="builder-split__content">
                        <?php if ( get_sub_field( 'titel' ) ) : ?>
                            <h2 class="display-2"><?php the_sub_field( 'titel' );?></h2>
                        <?php endif; ?>
                        <?php the_sub_field( 'tekst' );?>
                    </div>
                </div>
            </div>
        </div>
       <?php elseif ( get_row_layout() == 'layout10' ) : // image grid ?>
        <?php $gridweergave = get_sub_field( 'weergave' ); ?>
        <div class="container mb-5">
            <?php if ( have_rows( 'afbeeldingen' ) ) : ?>
                <?php if ( $gridweergave == 'masonry' ) : ?>
                    <div class="builder-grid builder-grid--masonry">
                        <?php while ( have_rows( 'afbeeldingen' ) ) : the_row(); $gridimg = get_sub_field( 'afbeelding' ); ?>
                            <?php if ( $gridimg ) : ?>
                            <div class="builder-grid__item">
                                <img src="<?php echo spurtImage( $gridimg['url'], 900 );?>" alt="<?php echo $gridimg['alt'];?>">
                                <a href="<?php echo $gridimg['url'];?>" class="stretched-link" data-fancybox="gallery"></a>
                            </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <?php $gridcol = ( $gridweergave == '2' ) ? 'col-md-6' : 'col-md-4';?>
                    <div class="row g-3 builder-grid builder-grid--columns">
                        <?php while ( have_rows( 'afbeeldingen' ) ) : the_row(); $gridimg = get_sub_field( 'afbeelding' ); ?>
                            <?php if ( $gridimg ) : ?>
                            <div class="<?php echo $gridcol;?>">
                                <div class="builder-grid__item">
                                    <img src="<?php echo spurtImage( $gridimg['url'], 900, 700 );?>" alt="<?php echo $gridimg['alt'];?>">
                                    <a href="<?php echo $gridimg['url'];?>" class="stretched-link" data-fancybox="gallery"></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endif; // end builder ?> 


    <?php endwhile; // end while main builder?>
        </div>
</section>
<?php endif; ?>
