<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Online Coach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>		
	</div><!-- .entry-content -->
	<?php edit_post_link( esc_attr_e( 'edit', 'online-coach' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
