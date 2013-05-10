<?php get_header(); ?>
<div class="content-wrap">
	<?php if (have_posts()) : ?>
	  <?php while (have_posts()) : the_post(); ?>
	  	<div class="row">
	  		<div class="large-12 columns">
	  			<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  the_post_thumbnail();
						}
					?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink(); ?>" 
						 rel="bookmark" 
						 title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php echo get_post_meta($post->ID, 'PostThumb', true); ?>
					<p class="meta">
					<span>Posted on</span> <?php the_time('F jS, Y'); ?> <span>by</span> <?php the_author(); ?>
					</p>
					<?php the_content('Read Full Article'); ?>
					<p><?php the_tags('Tags: ', ', ', '<br />'); ?> | Posted in <?php the_category(', '); ?>

					<?php comments_popup_link('No Comments;', '1 Comment', '% Comments'); ?></p>
					
					<?php comments_template(); ?>

				</div>
			</div>
		</div>
	  <?php endwhile; ?>
	  	<div class="row">
	  		<div class="large-6 small-6 columns older more-entries">
				  <?php next_posts_link('Older Entries'); ?>
			</div>
	  		<div class="large-6 small-6 columns newer more-entries">
				  <?php previous_posts_link('Newer Entries'); ?>
			</div>
		</div>
	<?php else : ?>
	  <h2>Nothing Found</h2>
	<?php endif; ?>
</div>
<?php get_footer(); ?>