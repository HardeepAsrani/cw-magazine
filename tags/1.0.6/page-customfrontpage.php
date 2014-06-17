<?php
/*
Template Name: Custom frontpage template
*/

get_header(); ?>

	<div class="hp-slider-wrap">
   		<?php cw_magazine_slider(); ?>
	</div>
    
	<div id="content" class="content-area" role="main">
		<?php cw_magazine_show_category_frontpage(); ?>
	</div><!-- .content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>