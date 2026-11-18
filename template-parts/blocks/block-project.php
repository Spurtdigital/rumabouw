<?php $projectimg = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
<a class="block-project <?php if($projectcount == 3){?>block-project--big<?php } else{ ?> 1 <?php }?>" href="<?php the_permalink();?>">
    <div class="block-project__media">
        <div class="block-project__image" style="background-image:url('<?php echo spurt_image($projectimg, 600,600)?>')">

        </div>
    </div>
    <div class="block-project__content">
        <h2 class="display-3 mb-0 text-white"><?php the_title();?></h2>
    </div>
</a>