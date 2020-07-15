<?php
/**
 * Template for Blog Default
 *
 * @package seolounge
 */

?>
<!-- wraper_blog_main -->
<div class="wraper_blog_main style-default">
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<!-- blog_main -->
				<div class="blog_main">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content-default', get_post_format() );
						endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
					<?php seolounge_pagination(); ?>
				</div>
				<!-- blog_main -->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 right-sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<!-- row -->
	</div>
</div>
<!-- wraper_blog_main -->
