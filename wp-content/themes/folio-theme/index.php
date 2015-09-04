
<?php get_header(); //include header.php ?>
      
      <!--start of content-->
      <?php //THE LOOP
          if( have_posts() ): ?>
        <?php while( have_posts() ): the_post(); ?>

        <!-- Thumbnail Images -->
        <div class="col-sm-6 col-md-4 photo">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('custom-size'); 
            ?>
          </a>

          <!-- Description -->
          <div class="post-description">
            <span class="entry-date"><?php echo get_the_date(); ?></span>
            <h2 class="entry-title"><?php the_title(); ?> </h2>
            <?php the_excerpt(); ?>
          </div>
        </div>

        <?php endwhile; ?>

        <!-- Pagination -->
        <div class="pagination">
          <?php
          //check to see if pagenavi plugin is running

          if(function_exists('wp_pagenavi') && !wp_is_mobile()):
            wp_pagenavi();
          else:
            previous_posts_link('&larr; Newer Posts'); 
            next_posts_link('Older Posts &rarr;');
          endif;
          ?>
        </div>
  
        <?php endif;  //end THE LOOP ?>    

<?php get_footer(); //include footer.php ?>
