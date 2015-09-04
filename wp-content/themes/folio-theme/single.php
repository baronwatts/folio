
<?php get_header(); //include header.php ?>
      
      <!--start of content-->
      <?php //THE LOOP
          if( have_posts() ): ?>
        <?php while( have_posts() ): the_post(); ?>

        <?php
        // initialize the thumbnail variable so we can store value in it
        $thumbnail = '';
        // Get the ID of the post_thumbnail (if it exists)
        $post_thumbnail_id = get_post_thumbnail_id($post->ID);
        // if it exists
        if ($post_thumbnail_id) {
        $size = apply_filters('post_thumbnail_size', 'post-thumbnail');
        $thumbnail = wp_get_attachment_image_src($post_thumbnail_id, $size, false);
        }
        ?>

        <!-- Hero Image -->
        <div class="hero_image" style="background-image: url('<?php echo $thumbnail[0]; ?>');">
        </div>
        <!-- Container for post -->
        <div class="container">
          <div  <?php post_class('post-description'); ?>>
            <span class="entry-date"><?php echo get_the_date(); ?></span>
            <h2 class="entry-title"><?php the_title(); ?> </h2>
            <?php the_content(); ?>

              <!-- Next & Previous Post-->
            <?php next_post_link('%link','<span class="glyphicon glyphicon-menu-left"></span>','TRUE'); ?>
            <?php previous_post_link('%link','<span class="glyphicon glyphicon-menu-right"></span>','TRUE'); ?>

            <!-- for theme check validation -->
             <?php the_tags(); ?>
             <?php wp_link_pages(  ); ?>
             <div class="hide-comments">
             <?php comments_template();  //add comments.php if you want to customize this ?>
             </div> <!-- End theme check validation -->

          </div><!-- End Post Description -->
        </div><!-- End Container -->
       
      <?php endwhile; ?>
      <?php endif;  //end THE LOOP ?>    


<?php get_footer(); //include footer.php ?>
