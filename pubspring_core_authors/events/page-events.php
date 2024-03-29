<?php 
//Template Name: SM Events Template
get_header(); ?>
<div class="container page_body index">
	<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row-fluid">

<?php  //CONTENT    ?>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
<div id="content" class="span7" role="main">
		<?php get_template_part('content', 'page'); ?>
</div>



				<?php endwhile; ?>
	
				<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
	
					<?php get_template_part( 'no-results', 'index' ); ?>
	
				<?php endif; ?>
				
				
<?php  //END CONTENT    ?>	


<div class="span3 offset1 hidden-tablet">
	<?php get_template_part('sidebar'); ?>
</div>




	</div><!-- /row -->
 </div> <!-- /container -->

<?php get_footer(); ?>