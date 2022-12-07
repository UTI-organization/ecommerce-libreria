<?php
/**
 * Libreria Starter Content and Block Patterns.
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Register Block Patterns.
 */
function libreria_register_block_patterns() {

	$block_patterns = array(
		'home'      => array(
			'title'       => 'Home',
			'description' => '',
			'content'     => '<!-- wp:cover {"customOverlayColor":"#f6ece5","isDark":false,"align":"full"} -->
			<div class="wp-block-cover alignfull is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim" style="background-color:#f6ece5"></span><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"93px"} -->
			<div style="height:93px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"20%"} -->
			<div class="wp-block-column" style="flex-basis:20%"></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"60%"} -->
			<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"48px"},"color":{"text":"#2c1810"}}} -->
			<h1 class="has-text-align-center has-text-color" style="color:#2c1810;font-size:48px;font-style:normal;font-weight:700">Best Seller of the Month</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#2c1810"}}} -->
			<p class="has-text-align-center has-text-color" style="color:#2c1810">Amet minim mollit non daceserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"align":"center"} -->
			<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="https://themegrilldemos.com/libreria/shop/">Shop now</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"20%"} -->
			<div class="wp-block-column" style="flex-basis:20%"></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"50px"} -->
			<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:cover {"url":"https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/banner_image_libreria.png","id":546,"dimRatio":0,"focalPoint":{"x":"0.50","y":"0.50"},"minHeight":500,"minHeightUnit":"px","contentPosition":"center center","align":"center"} -->
			<div class="wp-block-cover aligncenter" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-546" alt="" src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/banner_image_libreria.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover -->

			<!-- wp:spacer {"height":"40px"} -->
			<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:cover -->

			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:spacer {"height":"93px"} -->
			<div style="height:93px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"style":{"typography":{"fontSize":"40px"}}} -->
			<h2 style="font-size:40px">Browse By Category</h2>
			<!-- /wp:heading -->

			<!-- wp:spacer {"height":"40px"} -->
			<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:woocommerce/product-categories {"hasCount":false,"hasImage":true} /--></div>
			<!-- /wp:group -->

			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:spacer {"height":"45px"} -->
			<div style="height:45px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"fontSize":"40px"}}} -->
			<h2 style="font-size:40px">New Additions </h2>
			<!-- /wp:heading --></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right"} -->
			<p class="has-text-align-right"><a href="https://themegrilldemos.com/libreria/shop/" data-type="page" data-id="6">View All</a> </p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"50px"} -->
			<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:woocommerce/product-new {"columns":6,"rows":1,"stockStatus":["","instock","outofstock","onbackorder"]} /--></div>
			<!-- /wp:group -->

			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:spacer {"height":"65px"} -->
			<div style="height:65px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"fontSize":"40px"}}} -->
			<h2 style="font-size:40px">Best Seller</h2>
			<!-- /wp:heading --></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right"} -->
			<p class="has-text-align-right"><a href="https://themegrilldemos.com/libreria/shop/" data-type="page" data-id="6">View All</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"50px"} -->
			<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:woocommerce/product-best-sellers {"columns":6,"rows":1} /--></div>
			<!-- /wp:group -->

			<!-- wp:group {"align":"full"} -->
			<div class="wp-block-group alignfull"><!-- wp:spacer {"height":"70px"} -->
			<div style="height:70px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:media-text {"align":"full","mediaId":516,"mediaLink":"https://themegrilldemos.com/libreria/home/books-3/","mediaType":"image","verticalAlignment":"center","imageFill":false,"style":{"color":{"background":"#e1c698"}}} -->
			<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center has-background" style="background-color:#e1c698"><figure class="wp-block-media-text__media"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/books.jpg" alt="" class="wp-image-516 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:spacer {"height":"50px"} -->
			<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"style":{"typography":{"fontSize":"38px"}}} -->
			<h2 style="font-size:38px">2021 National Book Award</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Purus, vitae pretium, tortor nunc. Ante dui, maecenas orci aenean aenean dapibus orci consectetur orci. Enim ac pharetra morbi sit sit ultricies. Purus, vitae pretium, tortor nunc. Ante dui, maecenas orci aenean aenean dapibus orci consectetur orci. Enim ac pharetra morbi sit sit ultricies.</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"20px"} -->
			<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link" href="#">Explore more</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons -->

			<!-- wp:spacer {"height":"50px"} -->
			<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:media-text -->

			<!-- wp:spacer {"height":"93px"} -->
			<div style="height:93px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:group -->

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:group -->
			<div class="wp-block-group"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"style":{"typography":{"fontSize":"40px"}}} -->
			<h2 style="font-size:40px">Sales</h2>
			<!-- /wp:heading --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"40px"} -->
			<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:woocommerce/product-on-sale {"rows":2} /--></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:group -->
			<div class="wp-block-group"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"style":{"typography":{"fontSize":"40px"}}} -->
			<h2 style="font-size:40px">Recommended</h2>
			<!-- /wp:heading --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"40px"} -->
			<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:woocommerce/handpicked-products {"editMode":false,"products":[98,131,116,104,101,114]} /--></div>
			<!-- /wp:group --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:spacer {"height":"70px"} -->
			<div style="height:70px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"style":{"color":{"background":"#dbe8e5"}}} -->
			<div class="wp-block-column has-background" style="background-color:#dbe8e5"><!-- wp:media-text {"mediaId":517,"mediaLink":"https://themegrilldemos.com/libreria/home/books_for_all/","mediaType":"image"} -->
			<div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/books_for_all.png" alt="" class="wp-image-517 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"32px"}}} -->
			<h3 style="font-size:32px;font-style:normal;font-weight:700">Find Books for Everyone</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"20px"} -->
			<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link" href="#">Buy now</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons -->

			<!-- wp:spacer {"height":"40px"} -->
			<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:media-text --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:media-text {"mediaId":519,"mediaLink":"https://themegrilldemos.com/libreria/home/offer/","mediaType":"image","mediaSizeSlug":"full","style":{"color":{"background":"#e8cda0"}}} -->
			<div class="wp-block-media-text alignwide is-stacked-on-mobile has-background" style="background-color:#e8cda0"><figure class="wp-block-media-text__media"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/offer.png" alt="" class="wp-image-519 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"32px"}}} -->
			<h3 style="font-size:32px;font-style:normal;font-weight:700">30% off on Every Purchase</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Tgmet minim mollit non deserunt ullamco est sit aliqua dolor do amet</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"20px"} -->
			<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link" href="#">Buy now</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons -->

			<!-- wp:spacer {"height":"40px"} -->
			<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:media-text --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:group -->

			<!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:cover {"customOverlayColor":"#f6ece5","minHeight":287,"contentPosition":"center center","isDark":false,"align":"full"} -->
			<div class="wp-block-cover alignfull is-light" style="min-height:287px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim" style="background-color:#f6ece5"></span><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns {"align":"full"} -->
			<div class="wp-block-columns alignfull"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:image {"id":520,"sizeSlug":"full","linkDestination":"media"} -->
			<figure class="wp-block-image size-full"><a href="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_assured_purchase.png"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_assured_purchase.png" alt="" class="wp-image-520"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"}}} -->
			<h4 style="font-size:18px;font-style:normal;font-weight:700">Assured Purchase</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Provide genuine service and product</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:image {"id":521,"sizeSlug":"full","linkDestination":"media"} -->
			<figure class="wp-block-image size-full"><a href="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_easy_buy.png"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_easy_buy.png" alt="" class="wp-image-521"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"}}} -->
			<h4 style="font-size:18px;font-style:normal;font-weight:700">Easy To Buy &amp; Return</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Buy with a single click &amp; return product</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:image {"id":522,"sizeSlug":"full","linkDestination":"media"} -->
			<figure class="wp-block-image size-full"><a href="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_secure_purchase.png"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_secure_purchase.png" alt="" class="wp-image-522"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"}}} -->
			<h4 style="font-size:18px;font-style:normal;font-weight:700">Secure Payments</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Accepts debit and credit cards</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:image {"id":523,"sizeSlug":"full","linkDestination":"media"} -->
			<figure class="wp-block-image size-full"><a href="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_download.png"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/icon_download.png" alt="" class="wp-image-523"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"}}} -->
			<h4 style="font-size:18px;font-style:normal;font-weight:700">Download App</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Use mobile app &amp; get biggest discounts</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:cover -->',
		),
		'contact'   => array(
			'title'       => 'Contact',
			'description' => '',
			'content'     => '<!-- wp:image {"align":"center","id":535,"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image aligncenter size-full"><img src="https://themegrilldemos.com/libreria/wp-content/uploads/sites/185/2022/08/contact.jpg" alt="" class="wp-image-535"/></figure>
			<!-- /wp:image -->

			<!-- wp:cover {"dimRatio":0,"overlayColor":"black","minHeightUnit":"px","contentPosition":"center center"} -->
			<div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"40px"} -->
			<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:cover {"customOverlayColor":"#f6ece5","minHeight":140,"isDark":false,"className":"is-light"} -->
			<div class="wp-block-cover is-light" style="min-height:140px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim" style="background-color:#f6ece5"></span><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"color":{"text":"#111111"}},"fontSize":"medium"} -->
			<h3 class="has-text-align-left has-text-color has-medium-font-size" id="address" style="color:#111111;font-style:normal;font-weight:700">Address</h3>
			<!-- /wp:heading -->

			<!-- wp:separator {"style":{"color":{"background":"#efdfd2"}},"className":"is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#efdfd2;color:#efdfd2"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"16px"},"color":{"text":"#111111"}}} -->
			<p class="has-text-align-left has-text-color" style="color:#111111;font-size:16px">New York St. East Brunswick 08816</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:cover {"customOverlayColor":"#f6ece5","minHeight":140,"isDark":false,"className":"is-light"} -->
			<div class="wp-block-cover is-light" style="min-height:140px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim" style="background-color:#f6ece5"></span><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"color":{"text":"#111111"}},"fontSize":"medium"} -->
			<h3 class="has-text-align-left has-text-color has-medium-font-size" id="address" style="color:#111111;font-style:normal;font-weight:700">Phone</h3>
			<!-- /wp:heading -->

			<!-- wp:separator {"style":{"color":{"background":"#efdfd2"}},"className":"is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#efdfd2;color:#efdfd2"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"16px"},"color":{"text":"#111111"}}} -->
			<p class="has-text-align-left has-text-color" style="color:#111111;font-size:16px">+1 248-785-8545</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:cover {"customOverlayColor":"#f6ece5","minHeight":140,"isDark":false,"className":"is-light"} -->
			<div class="wp-block-cover is-light" style="min-height:140px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim" style="background-color:#f6ece5"></span><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"color":{"text":"#111111"}},"fontSize":"medium"} -->
			<h3 class="has-text-align-left has-text-color has-medium-font-size" id="address" style="color:#111111;font-style:normal;font-weight:700">E-mail</h3>
			<!-- /wp:heading -->

			<!-- wp:separator {"style":{"color":{"background":"#efdfd2"}},"className":"is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#efdfd2;color:#efdfd2"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"16px"},"color":{"text":"#111111"}}} -->
			<p class="has-text-align-left has-text-color" style="color:#111111;font-size:16px">name@libreria.com<br>libreria@example.com</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:cover {"customOverlayColor":"#f6ece5","minHeight":140,"isDark":false,"className":"is-light"} -->
			<div class="wp-block-cover is-light" style="min-height:140px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim" style="background-color:#f6ece5"></span><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"color":{"text":"#111111"}},"fontSize":"medium"} -->
			<h3 class="has-text-align-left has-text-color has-medium-font-size" id="address" style="color:#111111;font-style:normal;font-weight:700">Opening Hour</h3>
			<!-- /wp:heading -->

			<!-- wp:separator {"style":{"color":{"background":"#efdfd2"}},"className":"is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#efdfd2;color:#efdfd2"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"16px"},"color":{"text":"#111111"}}} -->
			<p class="has-text-align-left has-text-color" style="color:#111111;font-size:16px">Monday -Friday : 08:30 - 20:00<br>Saturday &amp; Sunday : 09:30 - 21:30</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"15px"} -->
			<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:cover -->',
		),
	);

	if ( function_exists( 'register_block_pattern' ) && function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'libreria',
			array( 'label' => _x( 'Libreria', 'Block Patterns Category', 'libreria' ) )
		);

		foreach ( $block_patterns as $key => $pattern ) {

			if ( class_exists( 'WP_Block_Patterns_Registry' ) && ! WP_Block_Patterns_Registry::get_instance()->is_registered( 'libreria/' . $key ) ) {
				register_block_pattern(
					'libreria/' . $key,
					array(
						'categories'  => array( 'libreria' ),
						'title'       => $pattern['title'],
						'description' => $pattern['description'],
						'content'     => $pattern['content'],
					)
				);
			}
		}
	}
}
add_action( 'init', 'libreria_register_block_patterns' );
