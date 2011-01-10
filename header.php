<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />	
	<title><?php  
	$category = get_the_category();
	if (is_home () ) { bloginfo('name'); }
	elseif ( is_category() ) { single_cat_title(); echo ' | ' ; bloginfo('name'); }
	elseif (is_single() ) { single_post_title(); echo ' | '; echo $category[0]->cat_name; }
	elseif (is_page() ) { single_post_title();}
	else { wp_title('',true); } ?> | <?php bloginfo('description'); ?></title>
	<link rel="Shortcut Icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/print.css" type="text/css" media="print" /> 
    <!--[if lt IE 8]>
      <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/ie.css" type="text/css" media="screen, projection" />
    <![endif]-->	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/museo.css" type="text/css" media="screen, projection" />    
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  	<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/suckerfish.js" type="application/javascript"></script>
  	<?php wp_get_archives('type=monthly&format=link'); ?>
	<!-- this activates Twitter @anywhere hovercards -->
	  <script src="http://platform.twitter.com/anywhere.js?id=3O4tZx3uFiEPp5fk2QGq1A&v=1">
      </script>
      <script type="text/javascript">
         twttr.anywhere(function(twitter) {
                  twitter.hovercards();
         });
      </script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
<div class="header">
	<div class="siteinfo">
        <h1><a href="<?php home_url(); ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></h1>
		<h2><span class="desc"><?php bloginfo('description'); ?></span></h2>
    </div>              

<div class="clear"></div>
		<?php wp_nav_menu( array( 'container_class' => 'navbar', 'theme_location' => 'primary' ) ); ?>
</div>		
<div class="clear"></div>