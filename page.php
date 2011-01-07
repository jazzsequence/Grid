<?php 
/*
	This is the default page template
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>      
<div class="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 				<div <?php post_class('post');?> id="post-<?php the_ID(); ?>">				

                <div class="the_title">
                <h2 class="the_title0"><?php the_title(); ?></h2>
				<span class="the_title1"><?php the_title(); ?></span>
				<span class="the_title2"><?php the_title(); ?></span>
				<span class="the_title3"><?php the_title(); ?></span> 
				<span class="the_title4"><?php the_title(); ?></span>
				<span class="the_title5"><?php the_title(); ?></span>
				<span class="the_title6"><?php the_title(); ?></span></div>
                <div class="clear"></div>
				<div class="entry">
					<?php the_content('Read more &raquo;'); ?>
                <div class="navigation"><?php wp_link_pages(); ?></div>                    
				</div>
    <div class="singlemeta">
    <p><?php edit_post_link('Edit this entry','','.'); ?></p></div>
    </div>
    	<div class="clear"></div>
	</div>

        <?php endwhile; endif; ?>
    
<div class="clear"></div>
<?php get_footer(); ?>