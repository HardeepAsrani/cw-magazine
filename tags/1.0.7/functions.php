<?php
/**
 * cw-magazine functions and definitions
 *
 * @package cw-magazine
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

function cw_magazine_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on cw-magazine, use a find and replace
	 * to change 'cw-magazine' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cw-magazine', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'cw_magazine_custom_background_args', array(
		'default-color' => 'fcfcfc',
		'default-image' => '',
	) ) );
 
    
    /* Post Thumbnails */
    add_theme_support( 'post-thumbnails' );
    
    /**
     * Implement the Custom Header feature.
     */
    require get_template_directory() . '/inc/custom-header.php';
    
    /**
     * Custom template tags for this theme.
     */
    require get_template_directory() . '/inc/template-tags.php';
    
    /**
     * Custom functions that act independently of the theme templates.
     */
    require get_template_directory() . '/inc/extras.php';
    
    /**
     * Customizer additions.
     */
    require get_template_directory() . '/inc/customizer.php';
    
    /**
     * Load Jetpack compatibility file.
     */
    require get_template_directory() . '/inc/jetpack.php';
	
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main-menu-header' => __( 'Main Menu', 'cw-magazine' ),
		'top-menu-header' => __( 'Top Menu', 'cw-magazine' )
	) );
	
	add_editor_style( 'editor-style.css' );
    
} 
add_action( 'after_setup_theme', 'cw_magazine_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function cw_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cw-magazine' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Ad Banner header', 'cw-magazine' ),
		'id'            => 'ad-banner',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer1', 'cw-magazine' ),
		'id'            => 'footer1',
		'before_widget' => '<div class="widget-footer footer1">',
		'after_widget'  => '</div><!-- .widget-footer --> ',
		'before_title'  => '<div class="footer-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer2', 'cw-magazine' ),
		'id'            => 'footer2',
		'before_widget' => '<div class="widget-footer footer2">',
		'after_widget'  => '</div><!-- .widget-footer --> ',
		'before_title'  => '<div class="footer-title">',
		'after_title'   => '</div>'
	) );
	register_sidebar( array(
		'name'          => __( 'Footer3', 'cw-magazine' ),
		'id'            => 'footer3',
		'before_widget' => '<div class="widget-footer footer3">',
		'after_widget'  => '</div><!-- .widget-footer --> ',
		'before_title'  => '<div class="footer-title">',
		'after_title'   => '</div>'
	) );
	register_sidebar( array(
		'name'          => __( 'Footer4', 'cw-magazine' ),
		'id'            => 'footer4',
		'before_widget' => '<div class="widget-footer footer4">',
		'after_widget'  => '</div><!-- .widget-footer --> ',
		'before_title'  => '<div class="footer-title">',
		'after_title'   => '</div>'
	) );
}
add_action( 'widgets_init', 'cw_magazine_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function cw_magazine_scripts() {
	wp_enqueue_style( 'cw-magazine-style', get_stylesheet_uri() );
	
    wp_enqueue_style( 'cw-magazine-style-custom', get_template_directory_uri() . '/css/custom-style.php');
    
    wp_enqueue_style( 'cw-magazine-style-responsiveslides', get_template_directory_uri() . '/css/responsiveslides.css');

    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'cw-magazine-responsiveslides', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'cw-magazine-tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'cw-magazine-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20130806', true );
    
	wp_enqueue_script( 'cw-magazine-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'cw-magazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'cw-magazine-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'cw_magazine_scripts' );


/* comments list */
function cw_magazine_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
            	<div class="avarat_comment">
					<?php echo get_avatar($comment,$size='48'); ?>
				</div>
                <div class="commentmeta_wrap">
				<?php printf(__('<p class="fn">%s</p> <span class="says">on</span>'), get_comment_author_link()) ?>
                <p class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s','cw-magazine'), get_comment_date(),  get_comment_time()) ?></a><span class="says"> <?php _e('says:','cw-magazine'); ?></span><?php edit_comment_link(__('(Edit)','cw-magazine'),'  ','') ?></p>
      			</div>
            </div>
      		<?php if ($comment->comment_approved == '0') : ?>
        		<em><?php _e('Your comment is awaiting moderation.','cw-magazine') ?></em>
         		<br />
      		<?php endif; ?>
			<div class="clear"></div>

      		<?php 
			if (get_comment_type() == "comment") :
				comment_text(); 
			endif;	
			?>

      		<div class="reply">
         	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      		</div>
     	</div>
<?php
}
 

/* get slide */
function cw_magazine_slider(){
	
	/* link */
	
	if(get_theme_mod('cwp_slide_link1')):
		$cwp_slide_link1 = get_theme_mod('cwp_slide_link1');
	else:
		$cwp_slide_link1 = '#';
	endif;
	if(get_theme_mod('cwp_slide_link2')):
		$cwp_slide_link2 = get_theme_mod('cwp_slide_link2');
	else:
		$cwp_slide_link2 = '#';	
	endif;
	if(get_theme_mod('cwp_slide_link3')):
		$cwp_slide_link3 = get_theme_mod('cwp_slide_link3');
	else:
		$cwp_slide_link3 = '#';	
	endif;
	if(get_theme_mod('cwp_slide_link4')):
		$cwp_slide_link4 = get_theme_mod('cwp_slide_link4');
	else:
		$cwp_slide_link4 = '#';	
	endif;
	
	/* title */
	
	if(get_theme_mod('cwp_slide_caption_title1')):
		$cwp_slide_caption_title1 = get_theme_mod('cwp_slide_caption_title1');
	else:
		$cwp_slide_caption_title1 = '';	
	endif;
	if(get_theme_mod('cwp_slide_caption_title2')):
		$cwp_slide_caption_title2 = get_theme_mod('cwp_slide_caption_title2');
	else:
		$cwp_slide_caption_title2 = '';	
	endif;
	if(get_theme_mod('cwp_slide_caption_title3')):
		$cwp_slide_caption_title3 = get_theme_mod('cwp_slide_caption_title3');
	else:
		$cwp_slide_caption_title3 = '';	
	endif;
	if(get_theme_mod('cwp_slide_caption_title4')):
		$cwp_slide_caption_title4 = get_theme_mod('cwp_slide_caption_title4');
	else:
		$cwp_slide_caption_title4 = '';	
	endif;
	
	/* text */
	if(get_theme_mod('cwp_slide_caption_text1')):
		$cwp_slide_caption_text1 = get_theme_mod('cwp_slide_caption_text1');
	else:
		$cwp_slide_caption_text1 = '';
	endif;
	if(get_theme_mod('cwp_slide_caption_text2')):
		$cwp_slide_caption_text2 = get_theme_mod('cwp_slide_caption_text2');
	else:
		$cwp_slide_caption_text2 = '';
	endif;
	if(get_theme_mod('cwp_slide_caption_text3')):
		$cwp_slide_caption_text3 = get_theme_mod('cwp_slide_caption_text3');
	else:
		$cwp_slide_caption_text3 = '';
	endif;
	if(get_theme_mod('cwp_slide_caption_text4')):
		$cwp_slide_caption_text4 = get_theme_mod('cwp_slide_caption_text4');
	else:
		$cwp_slide_caption_text4 = '';
	endif;
	
	echo '<div class="callbacks_container">';
		echo '<ul class="rslides" id="slider4">';
			
			if(get_theme_mod('cwp_slide_img1')):
				echo '<li>';
					echo '<a href="'.$cwp_slide_link1.'" title="'.$cwp_slide_caption_title1.'" >';
						echo '<img src="'.get_theme_mod('cwp_slide_img1').'" alt="'.$cwp_slide_caption_title1.'" />';
						
						if(($cwp_slide_caption_text1 != '') && ($cwp_slide_caption_title1 != '')):
							echo '<p class="caption">';
								echo '<span class="title-c">'.$cwp_slide_caption_title1.'</span>';
								echo '<span class="content-c">'.$cwp_slide_caption_text1.'</span>';
								echo '<br>';
								echo '<span class="btn-slider">Read more</span>';
							echo '</p>';
						endif;
					echo '</a>';
				echo '</li>';
			endif;	
			
			if(get_theme_mod('cwp_slide_img2')):
				echo '<li>';
					echo '<a href="'.$cwp_slide_link2.'" title="'.$cwp_slide_caption_title2.'" >';
						echo '<img src="'.get_theme_mod('cwp_slide_img2').'" alt="'.$cwp_slide_caption_title2.'" />';
						
						if(($cwp_slide_caption_text2 != '') && ($cwp_slide_caption_title2 != '')):
							echo '<p class="caption">';
								echo '<span class="title-c">'.$cwp_slide_caption_title1.'</span>';
								echo '<span class="content-c">'.$cwp_slide_caption_text1.'</span>';
								echo '<br>';
								echo '<span class="btn-slider">Read more</span>';
							echo '</p>';
						endif;
					echo '</a>';
				echo '</li>';
			endif;	
			
			if(get_theme_mod('cwp_slide_img3')):
				echo '<li>';
					echo '<a href="'.$cwp_slide_link3.'" title="'.$cwp_slide_caption_title3.'" >';
						echo '<img src="'.get_theme_mod('cwp_slide_img3').'" alt="'.$cwp_slide_caption_title3.'" />';
						
						if(($cwp_slide_caption_text3 != '') && ($cwp_slide_caption_title3 != '')):
							echo '<p class="caption">';
								echo '<span class="title-c">'.$cwp_slide_caption_title1.'</span>';
								echo '<span class="content-c">'.$cwp_slide_caption_text1.'</span>';
								echo '<br>';
								echo '<span class="btn-slider">Read more</span>';
							echo '</p>';
						endif;
					echo '</a>';
				echo '</li>';
			endif;	
			
			if(get_theme_mod('cwp_slide_img4')):
				echo '<li>';
					echo '<a href="'.$cwp_slide_link4.'" title="'.$cwp_slide_caption_title4.'" >';
						echo '<img src="'.get_theme_mod('cwp_slide_img4').'" alt="'.$cwp_slide_caption_title4.'" />';
						
						if(($cwp_slide_caption_text4 != '') && ($cwp_slide_caption_title4 != '')):
							echo '<p class="caption">';
								echo '<span class="title-c">'.$cwp_slide_caption_title1.'</span>';
								echo '<span class="content-c">'.$cwp_slide_caption_text1.'</span>';
								echo '<br>';
								echo '<span class="btn-slider">Read more</span>';
							echo '</p>';
						endif;
					echo '</a>';
				echo '</li>';
			endif;	
			
		echo '</ul>';
	echo '</div>';

}
	
/* show category frontpage */
function cw_magazine_show_category_frontpage(){

	if(get_theme_mod('cat1_slug')):
		$cat1 = get_category(get_theme_mod('cat1_slug'));
		$cat1_id = $cat1->cat_ID;
		$cat1_name = $cat1->cat_name;
		
		cw_magazine_show_posts($cat1_name, $cat1_id );
	else:
		cw_magazine_show_posts('','');
	endif;	
	
	if(get_theme_mod('cat2_slug')):
		$cat2 = get_category(get_theme_mod('cat2_slug'));
		$cat2_id = $cat2->cat_ID;
		$cat2_name = $cat2->cat_name;
		
		cw_magazine_show_posts($cat2_name, $cat2_id );
	else:
		cw_magazine_show_posts('','');	
	endif;
	
	if(get_theme_mod('cat3_slug')):
		$cat3 = get_category(get_theme_mod('cat3_slug'));
		$cat3_id = $cat3->cat_ID;
		$cat3_name = $cat3->cat_name;
		
		cw_magazine_show_posts($cat3_name, $cat3_id );
	else:
		cw_magazine_show_posts('','');	
	endif;
	
	if(get_theme_mod('cat4_slug')):
		$cat4 = get_category(get_theme_mod('cat4_slug'));
		$cat4_id = $cat4->cat_ID;
		$cat4_name = $cat4->cat_name;
		
		cw_magazine_show_posts($cat4_name, $cat4_id );
	else:
		cw_magazine_show_posts('','');	
	endif;    

}

function cw_magazine_show_posts($name_categ, $id_cat){
	
	if($name_categ):
        echo '<div class="half-page front-page-boxes customfp">';
			echo '<ul>';	
				echo '<li class="title-categ"><span>'.$name_categ.'</span></li>';
			
				$args = array('showposts' => 5, 'cat' => $id_cat);
				$cw_query = new WP_Query( $args );

				if ( $cw_query->have_posts() ):
					while ( $cw_query->have_posts() ):
						$cw_query->the_post();
			
						echo '<li>';
							echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
								the_post_thumbnail(array(75,75), array('class' => 'alignleft'));
							echo '</a>';
							echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
								the_title();
							echo '</a>';
							echo '<p class=""> - '.the_time('F j, Y').' '.comments_number().'</p>';
						echo '</li>';
	
					endwhile;
				endif;
				/* Restore original Post Data */
				wp_reset_postdata();
			echo '</ul>';
        echo '</div>'; 
	else:
		$categories = get_categories();
		
		if(isset($categories) && !empty($categories)):
			echo '<div class="half-page front-page-boxes">';
				echo '<ul>';	
					echo '<li class="title-categ"><span>'.$categories[0]->name.'</span></li>';
				
					$args = array('showposts' => 5, 'cat' => $categories[0]->cat_ID);
					$cw_query = new WP_Query( $args );

					if ( $cw_query->have_posts() ):
						while ( $cw_query->have_posts() ):
							$cw_query->the_post();
				
							echo '<li>';
								echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
									the_post_thumbnail(array(75,75), array('class' => 'alignleft'));
								echo '</a>';
								echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
									the_title();
								echo '</a>';
								echo '<p class=""> - '.the_time('F j, Y').' '.comments_number().'</p>';
							echo '</li>';
			
						endwhile;
					endif;
					/* Restore original Post Data */
					wp_reset_postdata();
				echo '</ul>';
			echo '</div>'; 
		endif;
	endif;
        
} 

add_filter( 'the_title', 'cw_no_title'); 
function cw_no_title ($title) { 
    if( $title == "" ){ 
        $title = "(No title)"; 
    } 
    return $title; 
}