<?php 
/*
	This is the single post template
*/
?>
<?php include (TEMPLATEPATH.'/get-theme-options.php'); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>      
<div class="content single">
<?php if (ls_getinfo('isref')) : ?>
   <div class="post">
   <h2>Looking for <em><?php ls_getinfo('terms'); ?></em>?</h2>
   <p>You came here from <?php ls_getinfo('referrer'); ?> searching for <em><?php ls_getinfo('terms'); ?></em>. These posts might also be of interest:</p>
   <ul>
     <?php ls_related(3, 10, '', '<br />', '', '', false, false); ?>
   </ul>
   </div>
<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">				

                <div class="the_title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <h2 class="the_title0"><?php the_title(); ?></h2>
				<span class="the_title1"><?php the_title(); ?></span>
				<span class="the_title2"><?php the_title(); ?></span>
				<span class="the_title3"><?php the_title(); ?></span> 
				<span class="the_title4"><?php the_title(); ?></span>
				<span class="the_title5"><?php the_title(); ?></span>
				<span class="the_title6"><?php the_title(); ?></span></a></div>
                <div class="clear"></div>
				<?php if ($tweet == true) { ?>
                <div class="tweetbox <?php if ($grid_tweetLeft != null) {?>alignleft<?php } else { ?>alignright<?php } ?>"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" <?php if ($zine_twitter != null) { ?>data-via="<?php echo $grid_twitter ?>"<?php } ?> data-related="ArcanePalette:Taking over the web with awesome graphic design">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
                <?php } ?>
                
				<div class="entry">
					<?php the_content('Read more &raquo;'); ?>
	                <div class="navigation"><?php wp_link_pages(); ?></div>                    
				</div>
                <div class="navigation"><?php wp_link_pages(); ?></div>
                Posted in <?php the_category(',&nbsp;'); ?> on <?php the_time('j F Y') ?><?php the_tags(', and tagged ',', ',''); ?><br />
                <div class="clear"></div>
				<p class="postmetadata">
                <?php comments_popup_link('No Comments &#187;', 'One Comment &#187;', '% Comments &#187;'); ?>       
                </p>
				<p class="linktous">
                <span class="diggs"><a href="javascript:var notes='';if(window.getSelection)notes=window.getSelection();else if(document.getSelection)notes=document.getSelection();else if(document.selection)notes=document.selection.createRange().text;if(notes.length>350)notes=notes.substring(0,349);location.href='http://digg.com/submit?phase=3&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)+'&bodytext='+encodeURIComponent(notes)" target="_blank">Digg This</a></span>&nbsp;|<span class="deliciouss"><a href="javascript:(function(){location.href='http://delicious.com/save?url='+encodeURIComponent(window.location.href)+'&title='+encodeURIComponent(document.title)+'&v=5&jump=yes'})()" target="_blank">Save to del.icio.us</a></span>&nbsp;|<span class="facebooks"><a href="javascript:var d=document,f='http://www.facebook.com/share',l=d.location,e=encodeURIComponent,p='.php?src=bm&v=4&i=1239647138&u='+e(l.href)+'&t='+e(d.title);1;try{if (!/^(.*\.)?facebook\.[^.]*$/.test(l.host))throw(0);share_internal_bookmarklet(p)}catch(z) {a=function() {if (!window.open(f+'r'+p,'sharer','toolbar=0,status=0,resizable=1,width=626,height=436'))l.href=f+p};if (/Firefox/.test(navigator.userAgent))setTimeout(a,0);else{a()}}void(0)" target="_blank">Share on Facebook</a></span>&nbsp;|<span class="twitters"><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script><a href="http://twitter.com/share?via=<?php echo $grid_twitter; ?>&amp;related=ArcanePalette&amp;text=<?php the_title(); ?>" target="_blank">Tweet This</a></span>&nbsp;|<span class="stumble"><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">Stumble This</a></span>&nbsp;|<span class="rss"><a href="<?php if ($grid_rss != null) { echo $grid_rss; } else { bloginfo('rss_url'); } ?>" target="_blank">Subscribe by RSS</a></span>
                </p>
    <p><?php edit_post_link('Edit this entry','','.'); ?></p>

    	<div class="clear"></div>
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
        <div class="spacer-10"></div>        
        <div class="spacer-10"></div>                
    	<div id="comments">
		<?php comments_template(); ?>
        </div>
				</div>
        <div class="spacer-10"></div>        
	</div>

		
        <?php endwhile; endif; ?>
            
<div class="clear"></div>
<?php get_footer(); ?>