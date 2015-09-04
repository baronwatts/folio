
<?php get_header(); //include header.php ?>
      
      <!--start of content-->
      <?php //THE LOOP
          if( have_posts() ): ?>
        <?php while( have_posts() ): the_post(); ?>


        <!-- Container for post -->
        <div class="container">
         <?php the_content(); ?>
        </div>


       
      <?php endwhile; ?>
      <?php endif;  //end THE LOOP ?>    


<?php get_footer(); //include footer.php ?>
