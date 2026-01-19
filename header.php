<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Online Coach
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="headertop"> 
  <div class="header-inner">
     <?php if(!dynamic_sidebar('top-left-widget')): ?>                    
		 	 <?php if ( has_nav_menu( 'loginmenu' ) ) { ?>
                  <div class="topbar-container">
                     <div class="widget-left">
		                 <?php wp_nav_menu(array('theme_location' => 'loginmenu')); ?>
                     </div>
   				 </div>
    		<?php } ?>
     <?php endif; ?>            
      
        
    <div class="topright">
         <div class="toggle"><a class="toggleMenu" href="<?php echo esc_url('#');?>" style="display:none;"><?php esc_html_e('Menu','online-coach'); ?></a></div> 
        <div class="sitenav">
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>         
        </div><!-- .sitenav-->    
    </div><!-- .topright -->    
    <div class="clear"></div>
    
   </div><!-- .header-inner -->
</div><!-- .headertop -->

<div class="header">
  <div class="container">
    <div class="logo">     
     <?php online_coach_the_custom_logo(); ?>
      <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo('name'); ?>
        </a></h2>
      <p><?php bloginfo('description'); ?></p>
    
    </div><!-- logo -->
    
  <?php if( get_theme_mod( 'hide_footer' ) == '') { ?>
<div class="widget-right">
    <ul>
		<?php $contact_no = get_theme_mod('contact_no');?>
        <?php if( !empty($contact_no) ){ ?>
        <li>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-phone.png" alt="" /> 
            <span><?php esc_html_e('Call us today', 'online-coach');?> <strong><?php echo esc_html($contact_no); ?></strong></span>
        </li>
        <?php } ?> 
		<?php 
	 	$contact_mail = get_theme_mod('contact_mail');
		if( !empty($contact_mail) ){ ?>
        <li>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-email.png" alt="" style="margin-top:12px;" /> 
            <span><?php esc_html_e('Email us on ', 'online-coach');?> <strong><a href="mailto:<?php echo esc_attr( antispambot(sanitize_email( $contact_mail ) )); ?>"><?php echo esc_html( antispambot( $contact_mail ) ); ?></a></strong></span>
        </li>
        <?php } ?>  
    </ul>
</div><!--.widget-right-->
   <?php } ?>
    <div class="clear"></div>
  </div> <!-- container -->
</div><!--.header -->
<?php if ( is_front_page() && ! is_home() ) { ?>
<?php if( get_theme_mod( 'hide_slides' ) == '') { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
     <?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
		<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
        $img_arr[] = $image;
        $id_arr[] = $post->ID;
        endwhile; wp_reset_postdata();
  	  }
    }
?>
<?php if(!empty($id_arr)){ ?>

<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php 
	$i=1;
	foreach($img_arr as $url){ ?>
      <img src="<?php echo esc_url($url);?>" title="#slidecaption<?php echo esc_html($i); ?>" />
      <?php $i++; }  ?>
    </div>
		<?php 
        $i=1;
        foreach($id_arr as $id){ // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
        $title = get_the_title( $id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
        $post = get_post($id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
        $content = apply_filters('get_the_content', substr(strip_tags($post->post_content), 0, 100)); 
        ?>
    <div id="slidecaption<?php echo esc_html($i); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo esc_html($content); ?></p>
        <div class="clear"></div>
         <a class="slide_more" href="<?php the_permalink(); ?>">
          <?php esc_attr_e('Read More', 'online-coach');?>
          </a>
      </div>
    </div>
    <?php $i++; } ?>
  </div>
  <div class="clear"></div>
</section>
<?php } else { ?>
<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
<section id="home_slider">
   <div class="nullslide"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/slide-info.jpg" /></div>
</section>
<?php } ?>
<!-- Slider Section -->
<?php } } } ?>

<?php if ( is_front_page() && ! is_home() ) { ?>
<?php if( get_theme_mod( 'hide_welcomesection' ) == '') { ?>
<section id="wrapfirst">
  <div class="container">
    <div class="welcomewrap">    
      <?php if( get_theme_mod('page-setting1')) { ?>
      <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
      <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?>
     
      <h2 class="section-title">
        <?php the_title(); ?>
      </h2>      
      <p><?php the_excerpt(); ?></p>      
      <div class="clear"></div>
      <?php endwhile; wp_reset_postdata(); } else { ?>     
 	  <div class="nullslide"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/welcome-info.jpg" /></div>    
      <?php } ?>
    </div> <!-- welcomewrap-->
    <div class="clear"></div>
  </div><!-- container -->
</section>
<div class="clear"></div>
<?php } ?>

<?php if( get_theme_mod( 'hide_pagefourboxes' ) == '') { ?>

<section id="pagearea">
  <div class="container">
    <?php
$pages = array(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
for ( $count = 1; $count<5; $count++ ) {
	$mod = get_theme_mod( 'page-column' . $count );
	if ( 'page-none-selected' != $mod ) {
		$pages[] = $mod; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	}
}
$filterArray = array_filter($pages);
if(count($filterArray) == 0){ ?>
	<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
    <p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/home-boxes.jpg" /></p>
    <?php } ?>
    <?php 	
}else{

$filled_array=array_filter($pages);
	
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'page',
	'post__in' => $pages,
	'orderby' => 'post__in'
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	$count = 1;
	while ( $query->have_posts() ) : $query->the_post();
	?>
    <div class="fourbox <?php if($count % 4 == 0) { echo "last_column"; } ?>"> <a href="<?php echo esc_url( get_permalink() ); ?>">
      <?php if ( has_post_thumbnail() ) : ?>
      <div class="thumbbx">
        <?php the_post_thumbnail( array(30,30, true) );?>
      </div>
      <?php endif; ?>
      <h3>
        <?php the_title(); ?>
      </h3>
      </a> <?php the_excerpt(); ?> </div>
    <?php if($count == 0) { ?>
    <div class="clear"></div>
    <?php } ?>
    <?php
	$count++;
	endwhile;
 endif;
}
 
?>
    <div class="clear"></div>
  </div>
  <!-- container --> 
</section>
<!-- #pagearea -->
<?php } ?>
<div class="clear"></div>
<?php } ?>