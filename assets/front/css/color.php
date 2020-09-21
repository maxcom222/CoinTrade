<?php
header ("Content-Type:text/css");
$color = "#ea0117"; // Change your Color Here

function checkhexcolor($color) {
  return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
  $color = "#" . $_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
  $color = "#ea0117";
}

?>


/*=========================
** Color Changer
=========================*/
background color
.navbar-area ul li.active,
.header-area .header-area-inner .boxed-btn,
.what-is-bcoin .boxed-btn,
.service-area .single-service-box:hover,
.team-area .single-team-box .team-pic .social-icons li a ,
.Investors-area .single-investor-box .content .social-icons li a,
.investment-cta-area .boxed-btn,
.back-to-top,
.road-map-section .roadmap-wrapper .now,
.contact-area .contact-wrapper .contact-form input[type=submit] ,
.subscription-area .subscription-form input[type=submit],
.footer-area .footer-social li a:hover,
.navbar-area ul li.active,
.navbar-area ul li:hover a,
.acc-cta-area{
  background-color: <?php echo $color; ?>;
}
/*box shadow color*/
.header-area .header-area-inner .boxed-btn,
.investment-cta-area .boxed-btn ,
.contact-area .contact-wrapper .contact-form input[type=submit],
.subscription-area .subscription-form input[type=submit]{
  box-shadow: inset 0 0 5px <?php echo $color; ?>;
}
/*border color*/
.header-area .header-area-inner .boxed-btn:hover,
.team-area .single-team-box .team-pic img,
.investment-cta-area .boxed-btn:hover,
.testimonial-area .single-testimonial-item .img-thumb img,
.contact-area .contact-wrapper .contact-form input[type=submit]:hover,
.subscription-area .subscription-form input[type=submit]:hover,
.subscription-area .subscription-form input[type=submit]{
  border-color: <?php echo $color; ?>;
}
 /*color*/
 .what-is-bcoin h2 span,
 .service-area .section-title h2 span,
 .team-area .section-title h2 span,
 .Investors-area .section-title span,
 .Investors-area .single-investor-box .content .social-icons li a:hover,
 .road-map-section .roadmap-wrapper .eventTitle,
 .section-title h2 span,
 .faq-area .panel-default .panel-heading a[aria-expanded="true"],
 .faq-area .panel-default .panel-heading a:after,
 .subscription-area .subscription-form h2 span{
   color: <?php echo $color; ?>;
 }
 
.road-map-section .roadmap-wrapper .now {
    box-shadow: 0 0 1px <?php echo $color; ?>;
}

.btn-own {
	background: <?php echo $color; ?>;
	color: #fff;
	text-transform: uppercase;
}

.slicknav_nav a:hover, .slicknav_nav .slicknav_row:hover {
	background: <?php echo $color; ?>;
	color: #fff;
}