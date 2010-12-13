<?php include (TEMPLATEPATH.'/get-theme-options.php'); ?>
<div class="footer">
	<div class="footerwrap">
        <div class="leftbox span-8 colborder">
		  <ul>
        	 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Footer Box') ) : ?>
             <?php endif; ?>        
          </ul>         
        </div>
        <div class="middlebox span-7 colborder">
          <ul>
			 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Middle Left Footer Box') ) : ?>
             <?php endif; ?>                
          </ul>
        </div>
        <div class="middlebox span-7 colborder">
          <ul>
			 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Middle Right Footer Box') ) : ?>
             <?php endif; ?>                
          </ul>
        </div>        
        <div class="rightbox span-7 last">
			<?php if (($grid_tweets != null ) && ($grid_foottwit == "true")) { ?>
                <div id="twitter_div">
                <?php if ($grid_twitter != null ) { ?>
                <div class="heading"><h2 class="the_heading"><?php echo $grid_twithead ?></h2></div>
                <?php } ?>
                <ul id="twitter_update_list"></ul>
                </div>    
            <?php } else {?>
		 <ul>
			 <?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Footer Box') ) : ?>
             <?php endif; }?>                
          </ul>      
        </div>
        <div class="spacer-10"></div>
		<div class="credit">&copy; <?php echo date('Y'); ?> <?php bloginfo('title'); ?> | <a href="http://museumthemes.com/blog/free-themes/grid/" title="Grid | A free WordPress theme by Arcane Palete" target="_blank">Grid</a> is a <a href="http://museumthemes.com/category/free-themes/" target="_blank" title="Museum Themes | Fine Art WordPress Themes">free WordPress theme</a> by <a href="http://www.arcanepalette.com/" title="arcane palette creative design | artistic website design" target="_blank">Arcane Palette</a></div>
        </div>
</div>
</div>
		<?php do_action('wp_footer'); ?>
</div>

<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $grid_twitter; ?>.json?callback=twitterCallback2&amp;count=<?php echo $grid_tweets; ?>"></script>
</body>
</html>
