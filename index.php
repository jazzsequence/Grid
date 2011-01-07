<?php 
/*
	This is the main index template
*/
?>
<?php include (TEMPLATEPATH.'/get-theme-options.php'); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="content">
	
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php if (in_category('asides')) { the_content(); } else { ?>
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
				<div class="the_date"><h3><?php the_time('j F Y') ?></h3></div>
				<div class="entry">					
					<?php switch($grid_blogtype) {
							case "Posts" : the_content('Read more &raquo;'); ?>
			                <div class="navigation"><?php wp_link_pages(); ?></div>
                            <?php break;
							case "Excerpts" : ?><div class="alignleft"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a></div><?php the_excerpt(); break;
							default : the_content('Read more &raquo;'); ?>
			                <div class="navigation"><?php wp_link_pages(); ?></div>												
					<?php } ?>
				</div>

				<div class="postmetadata">
                Posted in <?php the_category(',&nbsp;'); ?> <?php the_tags('| Tags: ',', ',''); ?><br />
                <?php comments_popup_link('No Comments &#187;', 'One Comment &#187;', '% Comments &#187;'); ?>       
                </div>
				</div>
                <div class="clear"></div>
	<?php } ?>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php endif; ?>

</div>
<div class="clear"></div>
<?php get_footer(); ?>