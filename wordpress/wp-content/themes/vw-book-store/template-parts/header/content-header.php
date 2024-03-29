<?php
/**
 * The template part for displaying Top header
 *
 * @package VW Book Store 
 * @subpackage vw_book_store
 * @since VW Book Store 1.0
 */
?>
<?php if ( get_theme_mod('vw_book_store_topbar_hide_show',true) != "" ) {?>
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12">
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <?php if ( get_theme_mod('vw_book_store_my_account_text','') != "" ) {?>
                <i class="<?php echo esc_html(get_theme_mod('vw_book_store_header_my_account_icon','fas fa-user')); ?>"></i><a href="<?php echo esc_url( get_theme_mod('vw_book_store_my_account_link','') ); ?>"><?php echo esc_html( get_theme_mod('vw_book_store_my_account_text','') ); ?><span class="screen-reader-text"><?php esc_html_e( 'My Account','vw-book-store' );?></span></a>
              <?php }?>
            </div>
            <div class="col-lg-3 col-md-3">
              <?php if ( get_theme_mod('vw_book_store_help_text','') != "" ) {?>
                <i class="<?php echo esc_html(get_theme_mod('vw_book_store_help_icon','far fa-question-circle')); ?>"></i><a href="<?php echo esc_url( get_theme_mod('vw_book_store_help_link','') ); ?>"><?php echo esc_html( get_theme_mod('vw_book_store_help_text','') ); ?><span class="screen-reader-text"><?php esc_html_e( 'Help','vw-book-store' );?></span></a>
              <?php }?>
            </div>
            <div class="col-lg-6 col-md-6">
              <?php if ( get_theme_mod('vw_book_store_email','') != "" ) {?>
                <i class="<?php echo esc_html(get_theme_mod('vw_book_store_email_icon','far fa-envelope')); ?>"></i><span><?php echo esc_html( get_theme_mod('vw_book_store_email','') ); ?></span>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-12">
          <?php dynamic_sidebar('social-icon'); ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>