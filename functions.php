<?php
if ( function_exists('register_sidebars') )
    register_sidebar(array(
		'name' => 'Sidebar',
		'description' => 'This is the regular, widgetized sidebar for everything else',	
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<div class="heading"><h2 class="the_heading widgettitle">',
        'after_title' => '</h2></div>'
    ));
    register_sidebar(array(
		'name' => 'Left Footer Box',
		'description' => 'This is the left box in the footer.',	
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<div class="heading"><h2 class="the_heading widgettitle">',
        'after_title' => '</h2></div>'
    ));
    register_sidebar(array(
		'name' => 'Middle Left Footer Box',
		'description' => 'This is the left center box in the footer.',	
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<div class="heading"><h2 class="the_heading widgettitle">',
        'after_title' => '</h2></div>'
    ));
    register_sidebar(array(
		'name' => 'Middle Right Footer Box',
		'description' => 'This is the right center box in the footer.',	
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<div class="heading"><h2 class="the_heading widgettitle">',
        'after_title' => '</h2></div>'
    ));	
    register_sidebar(array(
		'name' => 'Right Footer Box',
		'description' => 'This is the right box in the footer.',	
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<div class="heading"><h2 class="the_heading widgettitle">',
        'after_title' => '</h2></div>'
    ));

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 800;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'grid_setup' );

if ( ! function_exists( 'grid_setup' ) ):

function grid_setup() {

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// post thumbnail support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 175, 175 ); // 175 pixels wide by 175 pixels tall, box resize mode
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'grid' ),
	) );	

} 
endif;

// This adds a home link option in the Menus
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// clear shortcode
// a quick shortcode that clears floats
function clear() {
	return '<div class="clear"></div>';
}
add_shortcode('clear','clear');

// include Landing Sites by The undersigned 
// http://theundersigned.net 
if (function_exists('ls_get_delim')) { /* oh,  you already have landing sites installed...nevermind */ }
	else {
include (TEMPLATEPATH.'/plugins/landingsites.php');
	}
	
// this changes the output of the comments
function gridro_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar
($comment,$size='64',$default='<path_to_url>' ); ?>
On <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?>
     <?php printf(__('<cite>%s</cite> <span class="says">said:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>
      <?php comment_text() ?>
      <div class="comment-meta commentmetadata"><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
      <div class="reply"><h4>
         <?php comment_reply_link(array_merge
		 ( $args, array('depth' => $depth, 'reply_text' => 'Respond to this', 'max_depth' => $args['max_depth']))) ?>
      </h4></div>
     </div>
<?php
        }
		
// this changes the default [...] to be a read more hyperlink
function new_excerpt_more($more) {
	return '...&nbsp;(<a href="'. get_permalink($post->ID) . '">' . 'read more' . '</a>)';
}
add_filter('excerpt_more', 'new_excerpt_more');			

// Here we set the theme's options

$themename = "Grid";
$shortname = "grid";

// Here come the options!

$options = array (
	array ( "name" => "<h2>Grid Options</h2>",
		"type" => "title"),

// This theme uses various social networking links.  If they exist, an icon will appear in the sidebar that links to your profile
	array ( "type" => "open"),
	array ( "name" => "Twitter username",
			"desc" => __('Your Twitter username. If this exists, a Twitter icon will appear in the sidebar that links to your profile.'),
			"id" => $shortname."_twitter",
			"std" => "",
			"type" => "text"),
	array ( "name" => "Put Twitter in the footer?",
			"desc" => __('If activated, this will put your tweets in the right footer column rather than the sidebar.'),
			"id" => $shortname."_foottwit",
			"std" => "",
			"type" => "checkbox"),
	array ( "name" => "Use Twitter's official Tweet button in posts?",
			"desc" => "Put the official Tweet button, TweetMeme style, next to single posts. (Shows up on the right by default.)",			
			"id" => "tweet",
			"type" => "checkbox"),
	array ( "name" => "Put Tweet box on the left?",
			"desc" => "If this is activated, it will override the default and put the Tweet box on the left side.",
			"id" => $shortname."_tweetLeft",
			"std" => "",
			"type" => "checkbox"),			
	array ( "name" => "Tweets",
			"desc" => __('Number of tweets to display in the sidebar.  Enter a numeric value or leave blank to disable.'),
			"id" => $shortname."_tweets",
			"std" => "",
			"type" => "text"),
	array ( "name" => "Twitter feed heading",
			"desc" => __('Here you can change the heading that displays above your tweets (if enabled).'),
			"id" => $shortname."_twithead",
			"std" => "My Latest Updates",
			"type" => "text"),
	array ( "name" => "Facebook username",
			"desc" => __('Your Facebook username. If this exists, a Facebook icon will appear in the sidebar that links to your profile.<br />Note, this only works if you\'ve set up your custom URL.  To set your custom URL, click here: <em><a href="http://www.facebook.com/username/" target="_blank">http://www.facebook.com/username/</a></em>'),
			"id" => $shortname."_facebook",
			"std" => "",
			"type" => "text"),
	array ( "name" => "MySpace username",
			"desc" => __('Your MySpace username. If this exists, a MySpace icon will appear in the sidebar that links to your profile.'),
			"id" => $shortname."_myspace",
			"std" => "",
			"type" => "text"),	
	array ( "name" => "Hide social networking links?",
			"desc" => "You can fill in the values (which is necessary for Twitter if you want to include the feed in the sidebar or footer) but hide the links in the sidebar.",
			"id" => $shortname."_hidesocial",
			"std" => "",
			"type" => "checkbox"),					
	array (	"name" => "RSS",
			"desc" => __('If you use <a href="http://www.feedburner.com" target="_blank">FeedBurner</a>, enter your FeedBurner URL here.'),
			"id" => $shortname."_rss",
			"std" => "",
			"type" => "text"),			
	array ( "type" => "close"),
				
// we're going to let you choose which side the sidebar is on here

	array ( "type" => "open"),
	array ( "name" => "What side do you want your sidebar on?",
			"desc" => "From the dropdown menu, choose Left or Right to set which side the sidebar should appear on.",
			"id" => $shortname."_sidebar",
			"options" => array("Left","Right"),
			"type" => "select"),		
	array ( "name" => "Do you want excerpts or full posts on the blog page?",
			"type" => "select",
			"desc" => "From the dropdown menu, choose Excerpts or Posts to set whether you want the full post to display on the blog page or just post excerpts.",
			"options" => array("Excerpts","Posts"),
			"id" => $shortname."_blogtype"),				
	array (	"type" => "close"),

);



/*
	this code comes courtesy of Alex Denning from wpshout.com who based his off of the Arras and MiniBlog themes.  you can read all about it here:
	http://wpshout.com/create-an-awesome-wordpress-theme-options-page-part-1/
	this controls the styles and layout of the admin page
*/
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap" style="margin:0 auto; padding:20px 0px 0px;">

<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<div style="width:808px; background:#eee; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 30px;">

<?php break;

case "close":
?>

</div>

<?php break;

case "misc":
?>
<div style="width:808px; display: block; margin: 0px 0px 30px;">
	<?php echo $value['name']; ?>
</div>
<?php break;

case "title":
?>

<div style="width:810px; margin:0px; font-weight:normal;">
	<?php echo $value['name']; ?>
</div>

<?php break;

case 'text':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;

case 'textarea':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?></textarea>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;
/*Ralph Damiano*/
case 'select':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;

case "checkbox":
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="float:left; margin-right: 10px;" value="true" <?php echo $checked; ?> />
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;

case "background":
?>

<div style="width:145px; float:left; padding:0px 0px 10px; margin:0px 10px 10px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="float:left; margin-right: 10px;" value="true" <?php echo $checked; ?> />
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;

case "palette":
?>

<div style="width:300px; float:left; padding:0px 0px 10px; margin:0px 10px 10px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="float:left; margin-right: 10px;" value="true" <?php echo $checked; ?> />
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;

case "submit":
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>

<?php break;
}
}
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" class="button-primary" />
<input type="hidden" name="action" value="save" />
</form>
</p>
<?php
}

add_action('admin_menu', 'mytheme_add_admin');
/*End of Add a Theme Options Page*/

/*End of Theme Options =======================================*/

// enqueue a bunch of scripts
if ( !is_admin() ) { // instruction to only load if it is not the admin area
// enqueue twitter hovercards
   wp_register_script('hovercards_init','http://platform.twitter.com/anywhere.js?id=3O4tZx3uFiEPp5fk2QGq1A&v=1'); // this loads the dependencies from twitter
   wp_enqueue_script('hovercards_init');
   wp_register_script('hovercards_go', get_bloginfo('template_directory') . '/js/hovercards.js'); // this calls the actual hovercards script
   wp_enqueue_script('hovercards_go');
// enqueue suckerfish.js
   wp_register_script('suckerfish', get_bloginfo('template_directory') . '/js/suckerfish.js'); // this calls suckerfish.js for dropdowns
   wp_enqueue_script('suckerfish');
// enqueue twitter stream
/*   wp_register_script('twitterstream_init', 'http://twitter.com/javascripts/blogger.js'); // this is the initial script needed to display the twitter stream
   wp_enqueue_script('twitterstream_init'); */
   wp_register_script('twitterstream_init', 'http://twitter.com/javascripts/blogger.js','','',true);
   wp_enqueue_script('twitterstream_init');
}
$twitterstream_go = "<script type=\"text/javascript\" src=\"http://twitter.com/statuses/user_timeline/<?php echo $grid_twitter; ?>.json?callback=twitterCallback2&amp;count=<?php echo $grid_tweets; ?>\"></script>";
?>
