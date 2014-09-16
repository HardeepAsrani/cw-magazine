<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package cw-magazine
 */
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
		<div class="header-top">
			<div class="container">
  
			<?php
			wp_nav_menu( 
				array( 
					'theme_location' => 'top-menu-header',
					'container' => 'div', 
					'container_class' => 'main-navigation',
					'menu_id' => 'nav2'
				)
			); 
			?>
        	<div class="social-icons-header">
            
            	<?php 
				
				if(  get_theme_mod('facebook_link') )
					echo '<a href="'.get_theme_mod("facebook_link").'" title="facebook" target="_blank"><span class="symbol">facebook</span></a>';
				if(  get_theme_mod('twitter_link') )
					echo '<a href="'.get_theme_mod("twitter_link").'" title="Twitter" target="_blank"><span class="symbol">twitterbird</span></a>';
				if(  get_theme_mod('gplus_link') )
					echo '<a href="'.get_theme_mod("gplus_link").'" title="Google+" target="_blank"><span class="symbol">googleplus</span></a>';
				if(  get_theme_mod('linkedin_link') )
					echo '<a href="'.get_theme_mod("facebook_link").'" title="Linkedin" target="_blank"><span class="symbol">linkedin</span></a>';
				if(  get_theme_mod('youtube_link') )
					echo '<a href="'.get_theme_mod("youtube_link").'" title="Youtube" target="_blank"><span class="symbol">youtube</span></a>';
				if(  get_theme_mod('rss_link') )
					echo '<a href="'.get_theme_mod("rss_link").'" title="RSS" target="_blank"><span class="symbol">rss</span></a>';
				if(  get_theme_mod('vimeo_link') )
					echo '<a href="'.get_theme_mod("vimeo_link").'" title="Vimeo" target="_blank"><span class="symbol">vimeo</span></a>';
				if(  get_theme_mod('yelp_link') )
					echo '<a href="'.get_theme_mod("yelp_link").'" title="Yelp" target="_blank"><span class="symbol">yelp</span></a>';
				if(  get_theme_mod('stumbleupon_link') )
					echo '<a href="'.get_theme_mod("stumbleupon_link").'" title="Stumbleupon" target="_blank"><span class="symbol">stumbleupon</span></a>';
				if(  get_theme_mod('pinterest_link') )
					echo '<a href="'.get_theme_mod("pinterest_link").'" title="Pinterest" target="_blank"><span class="symbol">pinterest</span></a>';
				if(  get_theme_mod('tumblr_link') )
					echo '<a href="'.get_theme_mod("tumblr_link").'" title="Tumblr" target="_blank"><span class="symbol">tumblr</span></a>';
				?>
			</div><!-- .social-icons-header -->
		
			</div><!-- .container -->
		</div><!-- .header-top -->
        
	<div class="header-middle-wrap">
		<div class="container">
            <div class="logo">
    
    
					<?php 

						if( get_theme_mod('logo_header') ):

							echo '<a class="site-logo-a" href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';

								echo '<img src="'.get_theme_mod('logo_header').'" alt="'.get_bloginfo( 'name' ).'" />';

							echo '</a>';

						else:    

							echo '<a class="site-title-a" href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home"><h1 class="site-title">'.get_bloginfo( 'name' ).'</h1></a>'; 

							echo '<a class="site-description-a" href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';

							echo '<span class="site-description">'.get_bloginfo( 'description' ).'</span>'; 

							echo '</a>';

						endif;

					?>
            </div><!-- .logo -->
    
            <?php if ( is_active_sidebar( 'ad-banner' ) ) : ?>
				<?php echo '<div class="ad-header">'; ?>
                <?php dynamic_sidebar( 'ad-banner' ); ?>
				<?php echo '</div>'; ?>
            <?php endif; ?>
				
            <div class="main-menu">
                <?php wp_nav_menu( 
						array(	
							'theme_location' => 'main-menu-header', 
                            'container' => 'div', 
                            'container_class' => 'main-navigation',
                            'menu_id' => 'nav',
                            'fallback_cb' => false
						) 
					); 
				?>

                <?php get_search_form(); ?>
   
            </div><!-- .main-menu -->
		</div><!-- .container -->
	</div><!-- .header-middle-wrap -->
        
        <div class="clear"></div>
    </div><!-- .container -->
</header><!-- .site-header -->
<div class="wrapper template-page">
	<div class="container">
