<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package incise
 */

get_header();
$incise_sidebar = esc_attr(get_theme_mod( 'incise-sidebar-options', 'no-sidebar' ));
?>
<div class="container">
<div class="row">
	<main id="primary"  class="col-lg-8 col-md-8 col-sm-7 mx-auto">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
			 
			<?php the_posts_navigation(); ?>
			
			<?php
			else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
if( $incise_sidebar == 'right-sidebar'){
  get_sidebar(); 
}
?>
</div><!-- #row -->
</div><!-- #container -->
<?php get_footer();