
<?php get_header(); //include header.php ?>
      
      <!--start of content-->
      <?php 
      $query= new WP_Query(array(
        //set post type
        'post_type'=>'portfolio',
        'posts_per_page'=>30,
        ));



      //THE LOOP
          if( $query -> have_posts() ): ?>
        <?php while( $query -> have_posts() ): $query -> the_post(); ?>

        <!-- Thumbnail Image -->
        <div class="col-sm-6 col-md-4 photo">
            <?php the_post_thumbnail('custom-size'); 
            ?>
    
            <!-- Post description -->
            <div class="post-description">
              <!-- Taxonomy and Title of Post -->
              <span class="entry-date"><?php the_terms($post->ID, 'photo_type'); ?></span>
              <a href="<?php the_permalink(); ?>" class="single-link">
                <h2 class="entry-title"><?php the_title(); ?> </h2>
              </a>
            </div><!-- end description -->
          
        </div>


       
        <?php endwhile; ?>
        <?php endif; 
        wp_reset_postdata();
        //end THE LOOP ?>    


<?php get_footer(); //include footer.php ?>
