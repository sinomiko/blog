<?php
/**
 * The archive template file.
 * @package WinterDream
 * @since WinterDream 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="container">
  <div id="main-content">
    <div class="content-headline">
      <h1 class="entry-headline"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archive: %s', 'winterdream' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive: %s', 'winterdream' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'winterdream' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive: %s', 'winterdream' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'winterdream' ) ) . '</span>' );
					else :
						_e( 'Archive', 'winterdream' );
					endif;
				?></h1>
<?php winterdream_get_breadcrumb(); ?>
    </div>
    <div id="content"<?php if (get_theme_mod('winterdream_post_entry_format', $winterdream_defaults['winterdream_post_entry_format']) == 'Grid - Masonry') { ?> class="js-masonry"<?php } ?>> 
<?php while (have_posts()) : the_post(); ?>      
<?php if (get_theme_mod('winterdream_post_entry_format', $winterdream_defaults['winterdream_post_entry_format']) == 'Grid - Masonry') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; endif; ?>
    </div> <!-- end of content -->
<?php winterdream_content_nav( 'nav-below' ); ?>
  </div>
<?php if (get_theme_mod('winterdream_display_sidebar_archives', $winterdream_defaults['winterdream_display_sidebar_archives']) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>