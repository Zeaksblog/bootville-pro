<?php
/**
 * Template Name: Portfolio
 *
 */

get_header(); ?>


	<div class="row">

	<div id="primary" class="col-md-12 col-lg-12">
		<main id="main" class="site-main portfolio" role="main">

			<?php


				    $terms = get_terms("portfolio_tags");
				    $count = count($terms);
				    echo '<div id="filters" class="btn-group btn-group-'.$filter_btn_size.'">';
				    echo '<button type="button" class="btn btn-danger'.$filter_btn_color.'" data-filter="*">'. __('All', 'bootville') .'</button>';
				        if ( $count > 0 )
				        {   
				            foreach ( $terms as $term ) {
				                $termname = strtolower($term->name);
				                $termname = str_replace(' ', '-', $termname);
				                echo '<button type="button" class="btn btn-primary'.$filter_btn_color.'" data-filter=".'.$termname.'">'.$term->name.'</button>';
				            }
				        }
				    echo "</div>";
	//			}
			?>
				<?php 
				$pcount = 4;	// Columns -1
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args = array(
				'posts_per_page' => -1,
				'post_type' => 'portfolio',
				'paged' => $paged,
				);
				$the_query = new WP_Query( $args );
				?>


				<div class="row">
					<div id="portfolio-items">

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
						
					<div class="col-sm-6 col-md-<?php echo $pcount; ?> item <?php echo strtolower($tax); ?>">
						
						<div class="portfolio-item">
						
							<a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
							<div class="portfolio-button btn btn-primary btn-block"><?php the_title() ;?></div>
							</a>					

						</div>
					</div>
					<?php endwhile; ?>
					<!-- end of the loop -->

				</div> <!-- #portfolio-items -->

				</div> <!-- .row -->
				

				<?php wp_reset_postdata(); ?>

			
		</main><!-- #main -->
	</div><!-- #primary -->

	</div><!-- .row -->

<?php get_footer(); ?>