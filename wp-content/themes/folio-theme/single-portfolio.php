
<?php get_header(); //include header.php ?>
      
      <!--start of content-->
      <?php //THE LOOP
          if( have_posts() ): ?>
        <?php while( have_posts() ): the_post(); ?>

        <!-- Portfolio Description -->
        <div class="row">
	        <div class="col-md-5">
	          <div class="post-description">
	            <span class="entry-date"><?php the_terms($post->ID, 'photo_type'); ?></span>
	            <h2 class="entry-title"><?php the_title(); ?> </h2>
	            <?php the_content(); ?>
	          </div>
	        </div>

	        <!--Image Gallery (Advanced custom fields plugin)-->
	        <?php $gallery =  get_post_meta( $post->ID, 'gallery', true );
	        if($gallery):?>

	        <div class="col-md-7">
	          <?php  echo do_shortcode($gallery); ?>
	        </div>
	        <?php endif;  ?>
        </div>

       
        <?php endwhile; ?>
        <?php endif;  //end THE LOOP ?>    


<?php get_footer(); //include footer.php ?>
