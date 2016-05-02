<?php
/**
 * @package WordPress
 * @subpackage Mercedes Trophy
 * @since Mercedes Trophy 1.0
 */
 get_header(); ?>

 	<div id="wrapper" class="container">
 		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="mt-seccion">
				<div class="row text-center">
					<div class="col-xs-14 col-md-10 col-md-offset-2">
						<h2><?php the_title(); ?></h2>
						<p>___________</p>
						<p class="anotation"><?php posted_on(); ?></p>
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
			</div>
			<div class="mt-galeria">
				<div class="row text-center">
					<div class="col-xs-14 col-md-12 col-md-offset-1">
						<div class="mt-fotos-wrapper">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>