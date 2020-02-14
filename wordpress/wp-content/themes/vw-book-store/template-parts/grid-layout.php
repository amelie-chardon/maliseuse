<?php
/**
 * The template part for displaying Grid Layout
 *
 * @package VW Book Store
 * @subpackage vw-book-store
 * @since VW Book Store 1.0
 */
?>
<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>  
	        </div>
	        <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>      
	        <div class="new-text">
	          	<div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_book_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_book_store_excerpt_number','30')))); ?></p></div>
	        </div>
	        <?php if( get_theme_mod('vw_book_store_button_text','Read More') != ''){ ?>
		        <div class="content-bttn">
		          	<a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'vw-book-store' ); ?>"><?php echo esc_html(get_theme_mod('vw_book_store_button_text','Read More'));?><span class="screen-reader-text"><?php esc_html_e( 'Read More','vw-book-store' );?></span></a>
		        </div>
		    <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>