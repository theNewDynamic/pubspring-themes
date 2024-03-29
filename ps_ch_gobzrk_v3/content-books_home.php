<?php  


$args = array(
'post_type' => 'sm_books',
'post_status' => array( 'publish', 'future'  ) ,
'order' => 'asc'
);

$thebooks = new WP_Query( $args );
    ?>

<?php books_page_opening_tags(); ?>

		
		<?php if ( $thebooks->have_posts() ) : ?>
				<?php while ( $thebooks->have_posts() ) : $thebooks->the_post(); ?>

<div id="books" class="row-fluid" style="padding-bottom: 3em;"> <?php //repeat the row for each book ?>
	<div class="span4">
	
<?php books_page_cat_tags(); ?>
	
	<a href="<?php the_permalink(); ?>">	
		<?php 
		
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('full', array('class' => 'image-shadow')); 
				echo '<hr class="space" />';
				} //close if has_post_thumnail 
				  else {   //We will transition out of  ?>

		<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />

<?php  }    ?>
	</a>

<?php  get_template_part('/inc/button', 'buy_retailers'); ?>		
				
									
				<div class="meta_box" style="margin: .75em 0;">
		<?php $publisher = get_post_meta($post->ID, 'publisher', true);	
			if($publisher) : ?>		
		<aside class="publisher" style="clear: both;">
			<p>
			Publisher: <?php the_field('publisher'); ?>				
			</p>
		</aside>	
			<?php endif; ?>
		<aside class="pubdate" style="clear: both;">
			<p>	
			
			
			<?php if($post->post_status == 'future') : ?>
					
					<span class="pubdate_future">Available 	<?php the_time('M d, Y') ?></span>
					
					<?php else : ?>
					
					<span class="pubdate_past">Published 	<?php the_time('M d, Y') ?></span>
					
					<?php endif; ?>  
								
			
			</p>
		</aside>	
		
		
		<?php $isbn = get_post_meta($post->ID, 'isbn', true);	
			if($isbn) : ?>
		<aside class="isbn" style="clear: both;">
			<p>
			ISBN: <?php the_field('isbn'); ?>			
			</p>
		</aside>
			<?php endif; ?>

		</div>
		

		<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?>
				<aside style="margin: .5em 0 2em 0;">
		        <?php echo get_post_meta($post->ID, 'meta_data', true) ?>
		        		</aside>
		<?php endif; ?>
	</div><!-- /four columns -->

	<div class="span8">
	
	
	<?php book_above_synopsis(); ?>	
	

	<br />	
<!--	END reviews -->
<article class="book_synopsis">
	<h1 class="book-title entry-title <?php  $slug = basename(get_permalink()); echo $slug;    ?>">
		<?php echo get_the_title($post->ID); ?> 
	</h1>
	
	<h2 class="subtitle"><?php the_field('subtitle'); ?></h2>

		<?php books_page_below_title(); ?>

		<?php the_field('synopsis'); 
				//get_template_part('content/books', 'related_extra');
		?>
		

		
		
		


		<?php  if (! is_single()) {   ?>	
					<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
			if($excerpt) : ?>
				<a href="<?php the_permalink(); ?>#excerpt" class="btn btn-inverse btn-small" style="line-height: 1.2;font-size: 11px;">
					Click to read an excerpt &raquo;
				</a>
		<?php endif; } ?>
		
		
		
		<hr />
		
					<?php book_below_synopsis(); ?>	
					
					
		<hr />			
		

<?php 
do_action('ps_book_sharing'); 				
do_action('ps_sharing'); 
?>

					<?php book_below_sharing(); ?>	


			<?php  if (is_single()) {   ?>	
			<?php //DISPLAY THE EXCERPT ?>
			<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
			if($excerpt) : ?>
			<hr />
			<div id="excerpt">
			<h2 class="entry-meta">
			Excerpt from <?php the_title(); ?>
			</h2>
			<?php the_field('excerpt'); ?>
			</div>
			<?php endif; }?>






</article>

	</div>	
</div><!-- /row -->
<hr style="width:60%;margin:0 auto 3em auto;" />
<?php endwhile; endif; ?>
<?php books_page_closing_tags(); ?>