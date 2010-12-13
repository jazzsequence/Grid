<?php 
/*
	This is the archives template
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="content">

				<?php if (have_posts()) : ?>

								 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
								  <?php /* If this is a category archive */ if (is_category()) { ?>
                                    <div class="heading"><h2 class="the_heading">Posts filed under <?php single_cat_title(); ?></h2></div>
								  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                                    <div class="the_title">
                                    <h2 class="the_title0">Posts filed under <?php single_tag_title(); ?></h2>
                                    <span class="the_title1">Posts filed under <?php single_tag_title(); ?></span>
                                    <span class="the_title2">Posts filed under <?php single_tag_title(); ?></span>
                                    <span class="the_title3">Posts filed under <?php single_tag_title(); ?></span> 
                                    <span class="the_title4">Posts filed under <?php single_tag_title(); ?></span>
                                    <span class="the_title5">Posts filed under <?php single_tag_title(); ?></span>
                                    <span class="the_title6">Posts filed under <?php single_tag_title(); ?></span></div>
								  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                                    <div class="the_title">                                  
                                    <h2 class="the_title0">Archive for <?php the_time('j F Y'); ?></h2>
                                    <span class="the_title1">Archive for <?php the_time('j F Y'); ?></span>
                                    <span class="the_title2">Archive for <?php the_time('j F Y'); ?></span>
                                    <span class="the_title3">Archive for <?php the_time('j F Y'); ?></span> 
                                    <span class="the_title4">Archive for <?php the_time('j F Y'); ?></span>
                                    <span class="the_title5">Archive for <?php the_time('j F Y'); ?></span>
                                    <span class="the_title6">Archive for <?php the_time('j F Y'); ?></span></div>
								  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                                    <div class="the_title">                                  
                                    <h2 class="the_title0">Archive for <?php the_time('F Y'); ?></h2>
                                    <span class="the_title1">Archive for <?php the_time('F Y'); ?></span>
                                    <span class="the_title2">Archive for <?php the_time('F Y'); ?></span>
                                    <span class="the_title3">Archive for <?php the_time('F Y'); ?></span> 
                                    <span class="the_title4">Archive for <?php the_time('F Y'); ?></span>
                                    <span class="the_title5">Archive for <?php the_time('F Y'); ?></span>
                                    <span class="the_title6">Archive for <?php the_time('F Y'); ?></span></div>                                  
								  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                                    <div class="the_title">                                  
                                    <h2 class="the_title0">Archive for <?php the_time('Y'); ?></h2>
                                    <span class="the_title1">Archive for <?php the_time('Y'); ?></span>
                                    <span class="the_title2">Archive for <?php the_time('Y'); ?></span>
                                    <span class="the_title3">Archive for <?php the_time('Y'); ?></span> 
                                    <span class="the_title4">Archive for <?php the_time('Y'); ?></span>
                                    <span class="the_title5">Archive for <?php the_time('Y'); ?></span>
                                    <span class="the_title6">Archive for <?php the_time('Y'); ?></span></div>
								  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                                    <div class="the_title">                                  
                                    <h2 class="the_title0">Author Archive</h2>
                                    <span class="the_title1">Author Archive</span>
                                    <span class="the_title2">Author Archive</span>
                                    <span class="the_title3">Author Archive</span> 
                                    <span class="the_title4">Author Archive</span>
                                    <span class="the_title5">Author Archive</span>
                                    <span class="the_title6">Author Archive</span></div>                                                       
								  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                                    <div class="the_title">                                  
                                    <h2 class="the_title0">Blog Archives</h2>
                                    <span class="the_title1">Blog Archives</span>
                                    <span class="the_title2">Blog Archives</span>
                                    <span class="the_title3">Blog Archives</span> 
                                    <span class="the_title4">Blog Archives</span>
                                    <span class="the_title5">Blog Archives</span>
                                    <span class="the_title6">Blog Archives</span></div>                                                           
								  <?php } ?>

					<?php while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" class="the_single_post post">                    
              
                <div class="the_title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <h2 class="the_title0"><?php the_title(); ?></h2>
				<span class="the_title1"><?php the_title(); ?></span>
				<span class="the_title2"><?php the_title(); ?></span>
				<span class="the_title3"><?php the_title(); ?></span> 
				<span class="the_title4"><?php the_title(); ?></span>
				<span class="the_title5"><?php the_title(); ?></span>
				<span class="the_title6"><?php the_title(); ?></span></a></div>
    <span class="postmeta">Posted on <?php the_time( 'l j F Y' ) ?></span>
		<?php the_excerpt(); ?>
    </div>
    <div class="spacer-10"></div>                    
                    
                    
					<?php endwhile; ?>

						<div class="navigation clearfix">
							<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
							<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
						</div>
				
				<?php
					 else : 
				?>
				
				
	
				<?php
					endif;
				?>
	</div>


<div class="clear"></div>
<?php get_footer(); ?>