<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( isset( $_GET[ 'second' ] ) AND $_GET[ 'second' ] != '' ) {
    $second = "#".$_GET[ 'second' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}

if( !$second OR !checkhexcolor( $second ) ) {
    $second = "#746EF1";
}

?>

.back-to-top {
background-color: <?php echo  $color ?>;
color: <?php echo  $second ?>;
border: 2px solid <?php echo  $color ?>;
}
.back-to-top:hover {
color: <?php echo  $color ?>;
border: 2px solid <?php echo  $second ?>;
}

.navbar-area.nav-fixed,
.navbar-area .boxed-btn.blank:hover,
.header-area:after,
.about-us-area .content h2,
.about-app-area .single-about-app-box:hover,
.feature-area .featured-left-item .single-featured-box .icon .icon-inner, .feature-area .featured-right-item .single-featured-box .icon .icon-inner,
.introduce-with-area:after,
.introduce-with-area .video-play-btn:hover,
.subscribe-area .subscription-form  button[type=button],
.team-member-area .single-team-member .thumb .hover,
.user-review-area,
.pricing-area .single-pricing-plan:after,
.pricing-area .single-pricing-plan .footer .boxed-btn,
.get-in-touch-area .get-in-touch-form-wrapper .left-content .single-get-in-touch-box .icon i,
.get-in-touch-area .get-in-touch-form-wrapper .contact-form input[type=submit],
.footer-area:after
{
background-image: -moz-linear-gradient(0deg, <?php echo  $color ?> 0%, <?php echo  $second ?> 100%);
background-image: -webkit-linear-gradient(0deg, <?php echo  $color ?> 0%, <?php echo  $second ?> 100%);
background-image: -ms-linear-gradient(0deg, <?php echo  $color ?> 0%, <?php echo $color ?>  100%);
}

.pricing-area .single-pricing-plan:hover:after,
.get-in-touch-area .get-in-touch-form-wrapper .contact-form input[type=submit]:hover{
background-image: -moz-linear-gradient(0deg, <?php echo  $second ?> 0%, <?php echo  $color ?> 100%);
background-image: -webkit-linear-gradient(0deg, <?php echo  $second ?> 0%, <?php echo  $color ?> 100%);
background-image: -ms-linear-gradient(0deg, <?php echo  $second ?> 0%, <?php echo  $color ?>  100%);
}

.frame{
linear-gradient( <?php echo  $color ?>, <?php echo $color ?>), url(https://dl.dropboxusercontent.com/u/22006283/preview/codepen/clouds-cloudy-forest-mountain.jpg) no-repeat center center;
}

