<footer class="footer">
	<div class="container">
		<div class="row ">
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
				<div class="footer__logo mb-3 order-1"></div>
				<ul class="footer__menu">
					<li><?php the_field( 'straatnaam', 'options' );?></li>
					<li><?php the_field( 'postcode', 'options' );?> <?php the_field( 'plaats', 'options' );?></li>
				</ul>
				<ul class="footer__menu">
						<?php if ( have_rows('contact_telefoonnummers','options') ) : while( have_rows('contact_telefoonnummers','options') ) : the_row(); ?>
                        <li><span class="me-1">T.</span><a href="tel:<?php the_sub_field( 'telefoonnummer', 'options' );?>"><?php the_sub_field( 'telefoonnummer', 'options' );?></a> <small><?php the_sub_field( 'label' );?></small> </li>
                        <?php endwhile; endif; ?>
					<li><span class="me-1">M.</span><a href="mailto:<?php the_field( 'mailadres', 'options' );?>"><?php the_field( 'mailadres', 'options' );?></a></li>
				</ul>
				<div class="footer__social">
					<strong class="d-block mt-1">Volg ons op:</strong>
					<?php do_action( 'spurt_social' );?>
				</div>
			</div>
			<div class="col-xl-6 col-lg-12 mt-5 order-3 order-lg-3 order-xl-2">
				<h5 class="display-4 mb-4"><?php the_field( 'diensten_menu_titel', 'options' );?></h5>
				<ul class="footer__menu footer__menu--two">
					<?php $loop = new WP_Query( array(
					'post_type' => 'oplossingen',
					'posts_per_page' => -1
				));?>

				<?php $projectcount = 0; while ( $loop->have_posts() ) : $loop->the_post(); $projectcount++; ?>
				<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
				<?php endwhile; wp_reset_query(); ?>
				</ul>
			</div>
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mt-5 order-2 order-lg-2 order-xl-4">
				<h5 class="display-4 mb-4"><?php the_field( 'openingtijden_titel', 'options' );?></h5>
				<dl class="footer__times clearfix">
					<?php if ( have_rows('openingstijden','options') ) : while( have_rows('openingstijden','options') ) : the_row(); ?>
					
						<dt><?php the_sub_field('dag'); ?></dt><dd><?php the_sub_field('tijd'); ?></dd>	
					
					<?php endwhile; endif; ?>
					
				</dl>
			</div>
		</div>
		<div class="row d-flex justify-content-between align-items-center mt-10 mb-3">
			<div class="col-xl-6 col-lg-12 d-md-flex align-items-center">
				<span><?php the_field( 'aangesloten_bij_tekst', 'options' );?></span>
				<ul class="footer__bottommenu d-flex align-items-center mt-2 mt-md-0">
					<?php if ( have_rows('logos','options') ) : while( have_rows('logos','options') ) : the_row(); $footerlogo = get_sub_field( 'logo');?>
						<li><div class="footer__img" style="background-image:url('<?php echo spurt_image($footerlogo['url'],100,100);?>')"></div></li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
			<div class="col-xl-6 col-lg-12 text-start text-xl-end d-md-flex justify-content-start justify-content-xl-end mt-3 mt-xl-0 clearfix">
				<?php creators_privacymenu(); ?>
				<?php do_action( 'spurt_branding' );?>
			</div>
		</div>
	</div>
</footer>