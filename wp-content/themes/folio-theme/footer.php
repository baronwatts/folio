

 <!--Site footer-->
      <footer>
         	<div class="footer container">
		          <?php dynamic_sidebar('Footer Widget Area');//must match a sidebared register in functions ?>
	    	</div> <!--end container-->
      </footer>
    
<?php 
//must call wp_footer right before </body> for JS and plugins to run!
wp_footer();  ?>
 </body>
</html>


