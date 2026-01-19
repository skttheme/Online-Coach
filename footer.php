<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Online Coach
 */
?>

<div id="footer-wrapper">
  <?php if( get_theme_mod( 'hide_footer' ) == '') { ?>
  <div class="footer">
    <div class="container">
      <div class="cols-4 widget-column-1">
        <?php 
                $about_title = get_theme_mod('about_title');
                if( !empty($about_title) ){ ?>
        <h5><?php echo esc_html($about_title); ?></h5>
        <?php } ?>
        <?php 
                $about_description = get_theme_mod('about_description');
                if( !empty($about_description) ){ ?>
        <p><?php echo wp_kses_post($about_description); ?></p>
        <?php } ?>
      </div>
      <!--end .widget-column-1-->
      
      <div class="cols-4 widget-column-2">
        <?php 
                $menu_title = get_theme_mod('menu_title');
                if( !empty($menu_title) ){ ?>
        <h5><?php echo esc_html($menu_title); ?></h5>
        <?php } ?>
        <div class="menu">
          <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
        </div>
      </div>
      <!--end .widget-column-2-->
      
      <div class="cols-4 widget-column-3">
        <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
        <?php 
                $newsfeed_title = get_theme_mod('newsfeed_title');
                if( !empty($newsfeed_title) ){ ?>
        <h5><?php echo esc_html($newsfeed_title); ?></h5>
        <?php } ?>
        <?php $args = array( 'posts_per_page' => 3, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
					$postquery = new WP_Query( $args );
					?>
        <?php while( $postquery->have_posts() ) : $postquery->the_post(); ?>
        <div class="recent-post"> <a href="<?php echo esc_url( get_permalink() ); ?>">
          <?php the_post_thumbnail('thumbnail'); ?>
          </a>
          <h6><a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php the_title(); ?>
            </a></h6>
          <p>
            <?php the_excerpt(); ?>
          </p>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
      <!--end .widget-column-3-->
      
      <div class="cols-4 widget-column-4">
        <?php 
                $contact_title = get_theme_mod('contact_title');
                if( !empty($contact_title) ){ ?>
        <h5><?php echo esc_html($contact_title);?></h5>
        <?php } ?>
        <div class="phone-no">
          <?php 
                $contact_add = get_theme_mod('contact_add');
                if( !empty($contact_add) ){ ?>
          <p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/location-icon.png" alt="" /><?php echo wp_kses_post($contact_add);?></p>
          <?php } ?>
          <?php 
                $contact_no = get_theme_mod('contact_no');
                if( !empty($contact_no) ){ ?>
          <p> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-footer-phone.png" alt="" /> <?php echo esc_html($contact_no);?></p>
          <?php } ?>
          <?php 
                $contact_mail = get_theme_mod('contact_mail');
                if( !empty($contact_mail) ){ ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-footer-email.png" alt="" /><a href="mailto:<?php echo esc_html(antispambot( sanitize_email( $contact_mail ) )); ?>"><?php echo esc_html(antispambot( sanitize_email( $contact_mail ) )); ?></a>
          <?php } ?>
        </div>
        <div class="social-icons">
          <?php 
                    $fb_link = get_theme_mod('fb_link');
                    if( !empty($fb_link) ){ ?>
          <a title="facebook" class="fb" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a>
          <?php } ?>
          <?php 
                    $twitt_link = get_theme_mod('twitt_link');
                    if( !empty($twitt_link) ){ ?>
          <a title="twitter" class="tw" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
          <?php } ?>
          <?php 
                    $insta_link = get_theme_mod('insta_link');
                    if( !empty($insta_link) ){ ?>
          <a title="instagram" class="gp" target="_blank" href="<?php echo esc_url($insta_link); ?>"></a>
          <?php } ?>
          <?php 
                    $linked_link = get_theme_mod('linked_link');
                    if( !empty($linked_link) ){ ?>
          <a title="linkedin" class="in" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
          <?php } ?>
        </div>
      </div>
      <!--end .widget-column-4-->
      
      <div class="clear"></div>
    </div>
    <!--end .container--> 
  </div>
  <!--end .footer-->
  <?php } ?>
  <div class="copyright-wrapper">
    <div class="container">
      <div class="copyright-txt">
        <?php bloginfo('name'); ?> <?php esc_html_e('Theme By ','online-coach');?><?php esc_html_e('SKT Themes','online-coach'); ?>
      </div>
      <div class="design-by"> <a href="<?php echo esc_url('https://www.sktthemes.org/product-category/education/');?>" target="_blank">
        <?php esc_html_e('SKT Education Themes','online-coach'); ?>
        </a></div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<!--end .footer-wrapper-->
<?php wp_footer(); ?>
</body></html>