<?php
/**
 * The template part for displaying navigation
 *
 * @package VW Book Store 
 * @subpackage vw_book_store
 * @since VW Book Store 1.0
 */
?>
<?php
  $vw_book_store_search_hide_show = get_theme_mod( 'vw_book_store_search_hide_show' );
  if ( 'Disable' == $vw_book_store_search_hide_show ) {
   $colmd = 'col-lg-9 col-md-7';
  } else { 
   $colmd = 'col-lg-8 col-md-6 col-6';
  } 
?>
<div id="header" class="menubar <?php if( get_theme_mod( 'vw_book_store_sticky_header',true) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <div class="container">
    <div class="row bg-home">
      <div class="logo col-lg-3 col-md-5">
        <?php if ( has_custom_logo() ) : ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php endif; ?>
        <?php $blog_info = get_bloginfo( 'name' ); ?>
          <?php if ( ! empty( $blog_info ) ) : ?>
            <?php if ( is_front_page() && is_home() ) : ?>
              <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
              <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php endif; ?>
          <?php endif; ?>
          <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
          ?>
          <p class="site-description">
            <?php echo $description; ?>
          </p>
        <?php endif; ?>
      </div>
      <div class="<?php echo esc_html( $colmd ); ?>">
        <div class="toggle-nav mobile-menu">
          <button onclick="menu_openNav()"><i class="<?php echo esc_html(get_theme_mod('vw_book_store_res_open_menus_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-book-store'); ?></span></button>
        </div>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-book-store' ); ?>">
            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="<?php echo esc_html(get_theme_mod('vw_book_store_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-book-store'); ?></span></a>
            <?php 
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) ); 
            ?>
          </nav>
        </div>
      </div>
      <?php if ( 'Disable' != $vw_book_store_search_hide_show ) {?>
        <div class="search-box col-lg-1 col-md-1 col-6">
          <span><a href="#"><i class="fas fa-search"></i></a></span>
        </div>
      <?php } ?>
    </div>
    <div class="serach_outer">
      <div class="closepop"><a href="#"><i class="far fa-window-close"></i></a></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>