<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_book_store_first_color = get_theme_mod('vw_book_store_first_color');

	$custom_css = '';

	if($vw_book_store_first_color != false){
		$custom_css .=' .search-bar, .more-btn a:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, input[type="submit"], #footer .tagcloud a:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer-2, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, nav.woocommerce-MyAccount-navigation ul li, .blogbutton-small, #comments input[type="submit"].submit, .pagination span, .pagination a, #comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($vw_book_store_first_color).';';
		$custom_css .='}';
	}
	if($vw_book_store_first_color != false){
		$custom_css .='a, .logo h1 a, button.product-btn, #footer h3, .woocommerce-message::before, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title,#footer li a:hover, .main-navigation ul.sub-menu a:hover, .page-template-custom-home-page .main-navigation .current_page_item > a, .page-template-custom-home-page .main-navigation .current-menu-item > a{';
			$custom_css .='color: '.esc_html($vw_book_store_first_color).';';
		$custom_css .='}';
	}
	if($vw_book_store_first_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($vw_book_store_first_color).';';
		$custom_css .='}';
	}
	if($vw_book_store_first_color != false){
		$custom_css .='.main-navigation ul ul{';
			$custom_css .='border-color: '.esc_html($vw_book_store_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_book_store_second_color = get_theme_mod('vw_book_store_second_color');

	if($vw_book_store_second_color != false){
		$custom_css .='.search-bar button[type="submit"], span.cart-value, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn a, .scrollup i, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar .custom-social-icons i:hover, #footer .custom-social-icons i:hover, .blogbutton-small:hover, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #sidebar .woocommerce-product-search button, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle{';
			$custom_css .='background-color: '.esc_html($vw_book_store_second_color).';';
		$custom_css .='}';
	}
	if($vw_book_store_second_color != false){
		$custom_css .='.search-box i, .top-bar .custom-social-icons i:hover, .post-main-box h3 a, .entry-content a, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation a:hover, .post-main-box h2 a, h2.section-title a, #footer .textwidget a{';
			$custom_css .='color: '.esc_html($vw_book_store_second_color).';';
		$custom_css .='}';
	}
	if($vw_book_store_second_color != false){
		$custom_css .='#sidebar h3{';
			$custom_css .='color: '.esc_html($vw_book_store_second_color).'!important;';
		$custom_css .='}';
	}
	if($vw_book_store_second_color != false){
		$custom_css .='
		@media screen and (max-width:1000px){
			.toggle-nav i, .main-navigation ul.sub-menu a:hover{';
			$custom_css .='color: '.esc_html($vw_book_store_second_color).';';
		$custom_css .='} }';
	}
	if($vw_book_store_second_color != false){
		$custom_css .='#header .nav ul.sub-menu li a:hover, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='border-left-color: '.esc_html($vw_book_store_second_color).';';
		$custom_css .='}';
	}
	if($vw_book_store_second_color != false){
		$custom_css .='#sidebar input[type="submit"]{
		box-shadow: 5px 5px 0 0 '.esc_html($vw_book_store_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_book_store_width_option','Full Width');

    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_book_store_slider_opacity_color','0.5');

	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_book_store_slider_content_option','Center');
	
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_book_store_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.post-main-box{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services .service-text p{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info, .content-bttn{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
		$custom_css .='.content-bttn{';
			$custom_css .='margin:20px;';
		$custom_css .='}';
	}else if($theme_lay == 'Left'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
		$custom_css .='.content-bttn{';
			$custom_css .='margin:20px 0;';
		$custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$topbar = get_theme_mod( 'vw_book_store_resp_topbar_hide_show',true);
    if($topbar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.top-bar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($topbar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.top-bar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'vw_book_store_stickyheader_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'vw_book_store_resp_slider_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$metabox = get_theme_mod( 'vw_book_store_metabox_hide_show',true);
    if($metabox == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($metabox == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sidebar = get_theme_mod( 'vw_book_store_sidebar_hide_show',true);
    if($sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}