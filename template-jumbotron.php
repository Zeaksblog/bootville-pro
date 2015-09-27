<?php
/**
 * The template for displaying full width pages.
 Template Name: Jumbotron
 *
 * @package bootville
 */

get_header(); ?>


<div class="row">		
	<div id="primary" class="col-lg-12 col-md-12">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="jumbotron">	
					<div class="container">
								
							<div class="col-md-6 col-lg-6 col-lg-push-6">	
									<div class="img-responsive thumbnail featured-jumbo-image"><?php the_post_thumbnail('jumbotron-image'); ?></div>
							</div><!-- .col -->
							
								<div class="col-md-6 col-lg-6 col-lg-pull-6">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
								
								</article><!-- #post-## -->
							</div> <!-- .col -->			
					</div> <!-- container -->
				</div><!-- .jumbotron -->	
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .row -->

<!-- POSTS SECTION -->
	<!-- Customizer control for layout -->
		<?php
		if ( 'option1' == fifteen_plus_sanitize_latest_posts( get_theme_mod( 'fifteen_plus_latest_posts' ) ) ) : ?>
<div class="row panel panel-default">
<!-- first post -->
<div class="jumbo panel-heading">
		<h4><?php echo get_theme_mod( 'latest_posts_textbox', 'No Title Set' ); ?></h4>
</div>
<?php
	query_posts('showposts=1');
	$ids = array();
	while (have_posts()) : the_post();
	$ids[] = get_the_ID();
?>
	<div class="col-md-6 col-lg-6 col-lg-push-6">
		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
			<div class="img-responsive thumbnail featured-jumbo-image alignleft"><?php the_post_thumbnail(); ?></div>
		<?php the_excerpt(); ?>
	</div><!--col-->
<?php
endwhile;
?>
<!-- end first post -->

<!-- second post -->
<?php
	query_posts(array('post__not_in' => $ids, 'showposts' => 1));
	while (have_posts()) : the_post();
?>
	<div class="col-md-6 col-lg-6 col-lg-pull-6">
		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
			<div class="img-responsive thumbnail featured-jumbo-image alignleft"><?php the_post_thumbnail(); ?></div>
		<?php the_excerpt(); ?>
	</div><!--col-->
<?php
endwhile;
?>
<!-- end second post -->
</div><!--.row-->
		<?php else : ?>

		<?php endif; ?>
	<!-- End customizer control -->	
<!-- END POSTS SECTION -->



<!-- PORTFOLIO POSTS SECTION -->
				<?php 
				//$pcount = 4;	// Columns -1
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args = array(
				'posts_per_page' => 4,
				'post_type' => 'portfolio',
				'paged' => $paged,
				);
				$the_query = new WP_Query( $args );
				?>
	<!-- Customizer control for portfolio section -->
		<?php
		if ( 'option1' == fifteen_plus_sanitize_portfolio_section( get_theme_mod( 'fifteen_plus_portfolio_section' ) ) ) : ?>
				<div class="row panel panel-default">
		
<div class="jumbo panel-heading">
		<h4><?php echo get_theme_mod( 'portfolio_title_textbox', 'No Title Set' ); ?></h4>
</div>

					<div id="portfolio-items panel-body">
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					  <?php
		                $terms = get_the_terms( $post->ID, 'portfolio_tags' );
		                                     
		                if ( $terms && ! is_wp_error( $terms ) ) : 
		                    $links = array();
		 
		                    foreach ( $terms as $term ) 
		                    {
		                        $links[] = $term->name;
		                    }
		                    $links = str_replace(' ', '-', $links); 
		                    $tax = join( " ", $links );     
		                else :  
		                    $tax = '';  
		                endif;
		                ?>
						
					<div class="col-sm-3 col-md-3 item <?php echo strtolower($tax); ?>">
						
						<div class="portfolio-item">
						
							<a class="thumbnail jumbo-portfolio-iframe" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
							<div class="portfolio-button btn btn-primary btn-block"><?php the_title() ;?></div>
							</a>					

						</div>
					</div>
					<?php endwhile; ?>
					<!-- end of the loop -->
				</div> <!-- #portfolio-items -->
				</div> <!-- .row -->
<!-- END PORTFOLIO POSTS SECTION -->
		<?php else : ?>

		<?php endif; ?>
	<!-- End customizer control -->	

	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer-widgets widget-area row">
				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-1' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-2' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-3' ); ?>
				</div>
			</div><!--row-->
			
		<!-- second Jumbotron template widget row -->
			<div class="footer-widgets widget-area row">
				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-4' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-5' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-6' ); ?>
				</div>
			</div><!--row-->			
			
	
			<div class="row">
				<div class="footer-menu">
						<div class="col-lg-12 col-md-12">
							<?php if (has_nav_menu('footer-menu', 'bootville')) { ?>
								<nav role="navigation">
								<?php wp_nav_menu(array(
								  'container'       => '',
								  'menu_class'      => 'footer-menu',
								  'theme_location'  => 'footer-menu')
								); 
								?>
							  </nav>
							<?php } ?>
						</div>
					</div><!-- .footer-menu-->
			</div><!-- .row -->	
		
		<div class="row">
			<div class="credits">
		
			<div class="col-md-6 col-lg-6 col-lg-push-6">
			<div class="copyright">
				<p class="copyright">&copy; <?php _e('Copyright', 'bootville'); ?> <?php echo date('Y'); ?> - <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
			</div>
			</div>
			
			<div class="col-md-6 col-lg-6 col-lg-pull-6">
				<div class="site-info">

					<!-- Theme credits -->
					<a href="<?php echo esc_url( __( 'http://zeaks.org/bootville-lite/', 'bootville' ) ); ?>" title="<?php esc_attr_e( 'Bootville Lite', 'bootville' ); ?>"> <?php printf( 'Bootville Lite', 'bootville' ); ?></a>
					<?php printf( 'Theme ', 'bootville' ); ?> 
					
					<!-- WordPress credits -->
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bootville' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'bootville' ); ?>"><?php printf( __( 'Powered by %s', 'bootville' ), 'WordPress' ); ?></a>
				</div><!-- .site-info -->	
			</div>	
			</div><!-- .credits -->
		</div><!-- .row -->
		
	</footer><!-- #colophon -->
</div><!-- #wrap -->

<?php wp_footer(); ?>