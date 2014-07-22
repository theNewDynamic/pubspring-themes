<?php get_header(); ?>
<?php //template: Front Page ?>

<div class="container page_body">

<style>
.padding-bottom{
			padding-bottom: 3em;
}

</style>
	<div class="row padding-bottom">
		<div class="five phone-four columns pull-up" >

	<section id="content" style="margin-bottom: 3em;">
			
			
<?php		
	//Pull the most recent book post type and get related reviews and a synopsis
	$post_permalink = get_permalink();
	$args = array( 'post_type' => 'sm_books','posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future') );
	$query = new WP_Query( $args );
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	?>
		


			
		<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 2px 0 10px 0;" />
		</a>	
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	

<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >
<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	


<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?>
		<aside class="quote" style="margin: .5em 0 2em 0;">
        <?php echo get_post_meta($post->ID, 'meta_data', true) ?>
        		</aside>
<?php endif; ?>



							<?php endwhile; endif;wp_reset_query(); ?>
			
	
		</section>

	</div><!-- /four columns -->



	<div class="seven phone-four columns">
	
	
	

			
		
		
		
<section style="margin-bottom: 3em;">
<div class="six phone-four columns">
<?php
	dynamic_sidebar('sidebar-frontpage'); 
?>

</div>

<div class="three phone-four columns">

<!-- AddThis Follow BEGIN -->
<p>Find me on...</p>
<div class="addthis_toolbox addthis_32x32_style addthis_default_style">
<a class="addthis_button_facebook_follow" addthis:userid="readsusanisaacs"></a>
<a class="addthis_button_twitter_follow" addthis:userid="pageandscreen"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f6b87be4180e916"></script>
<!-- AddThis Follow END -->
</div>




</section>

		
				<hr />
		<h3><a href="/category/news/" class="grayDark">Latest News</a></h3>		
		
		
		<style>
				ul.post_list {
					margin-left: 0;
				}
		ul.post_list li
		{
			list-style-type: none;
			line-height: 22px;
			margin-bottom: 1em;
		}
				ul.post_list li a{
					font-size: 18px;
				}
		</style>
		
		
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							'cat' => 7,
							'posts_per_page' => 3,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


		<?php the_excerpt(); ?>
<!--<hr />-->

		
							<?php endwhile; 
								echo	"<h6 style='margin-top:16px;'><a href='/category/news/' class='grayDark'>More News &raquo;</a></h6>";		
							endif; ?>		

		
		
		
					
		
		
	</div>





</div><!-- /row -->

		</div><!--  /container page_body  -->		



		
<?php get_footer(); ?>