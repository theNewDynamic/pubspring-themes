<?php 
/**
 * Template Name: Archive - Writings (bibliographic)
 */
get_header(); ?>

<div class="container page_body">
	<?php get_template_part('/inc/page_heading_title'); ?>
	
	
	<div class="row-fluid">
	<div class="span9">

<?php 

//pulls from the books post type for the books post type archive-books

$post_permalink = get_permalink(); 

		$args = array( 'post_type' => 'sm_writing', 'posts_per_page' => -1, 'orderby' => 'date' , 'order' => 'desc', 
//		'post_status' => array( 'publish', 'future'  )
		 );
	
	
	//'meta_key'        => 'related_book',
	//'meta_value'      => $post->ID,
	
	
	$query = new WP_Query( $args );
	
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>

	<?php get_template_part('/content_loops/sm', 'writing'); ?>
	
	
	
				<?php endwhile; endif; ?>
	</div>


	<div class="span3">

<aside class="sidebar" role="complementary">
<?php 
		if ( !dynamic_sidebar( 'sidebar-writing') ) : 
				dynamic_sidebar('sidebar-writing'); 
		 endif; 
 ?>

</aside><!-- /#sidebar -->
		









		<?php get_sidebar(); ?>

	</div>
		</div>
</div><!-- /container -->

<?php get_footer(); ?>