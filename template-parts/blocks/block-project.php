<?php $project_image = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
<a class="block-project" href="<?php the_permalink(); ?>">
    <div class="block-project__media">
        <div class="block-project__image"<?php if ( $project_image ) : ?> style="background-image:url('<?php echo esc_url( spurt_image( $project_image, 600, 600 ) ); ?>')"<?php endif; ?>></div>
    </div>
    <div class="block-project__content">
        <h2 class="display-3 mb-0 text-white"><?php the_title(); ?></h2>
    </div>
</a>
