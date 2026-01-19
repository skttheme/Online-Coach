<?php
add_action( 'admin_menu', 'online_coach_abouttheme' );
function online_coach_abouttheme() {    	
	add_theme_page( __('About Theme', 'online-coach'), __('About Theme', 'online-coach'), 'edit_theme_options', 'online_coach_guide', 'online_coach_mostrar_guide');   
} 

//guidline for about theme
function online_coach_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_html_e('About Theme Info', 'online-coach'); ?>
		   </div>
          <p><?php esc_html_e('Online Coach is a coaching WordPress theme which can be used for coaches, personal trainers, speakers, motivators, and other personal users. It is simple and easy to use and is compatible with a lot of plugins like WooCommerce for ecommerce use, contact form 7, SEO plugins and qTranslate X for multilanguage.','online-coach'); ?></p>
		  <a href="<?php echo esc_url(SKT_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo esc_url(SKT_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'online-coach'); ?></a> | 
				<a href="<?php echo esc_url(SKT_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'online-coach'); ?></a> | 
				<a href="<?php echo esc_url(SKT_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'online-coach'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>