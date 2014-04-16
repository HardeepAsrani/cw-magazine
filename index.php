<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cw-magazine
 */
get_header(); ?>

	<div class="hp-slider-wrap">
   		<?php cw_magazine_slider(); ?>
	</div>
    
	<div id="content" class="content-area" role="main">
		<?php 
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				echo '<div class="front-page-boxes">';
					echo '<ul>';	
						echo '<li class="title-categ"><span><a href="'.get_permalink().'">'.get_the_title().'</a></span></li>';
						echo '<li>';
							echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
								the_post_thumbnail(array(75,75), array('class' => 'alignleft'));
							echo '</a>';
							echo get_the_time('F j, Y');
							echo '<a href="'.get_comments_link().'">';
									comments_number( ' - No comments ', ' - One comment ', ' - % comments ' );
							echo '</a>';
							$cat = get_the_category();
							if(!empty($cat)) :
								_e(' - In: ','cwp');
								foreach($cat as $cat_item):
									echo '<a class="sub-link" href="'.get_category_link($cat_item->cat_ID).'">'.$cat_item->cat_name.'</a> ';
								endforeach;
							endif;
							
							echo '<p>'.get_the_excerpt().'</p>';
							echo '<p><a href="'.get_permalink().'" title="'.get_the_title().'" class="readmore">'.__('Read more','cw-magazine').'</a></p>';
						echo '</li>';
					echo '</ul>';
				echo '</div>';	
			endwhile; ?>
				
			        <div class="navigation">
						<?php if (function_exists("pagination")) {
    						pagination();
						}else{ 
                        	cwp_content_nav( 'nav-below' ); 
						} ?>
					</div> <!-- end navigation --> 
					
		<?php else : ?>
			<?php get_template_part( 'no-results', 'index' ); ?>
		<?php endif; ?>
	</div><!-- .content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>