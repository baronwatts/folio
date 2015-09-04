<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?php wp_title(''); ?></title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

      <!-- Masthead -->
      <div class="masthead">
        <!--Where the logo will be uploaded-->
        <?php if ( get_theme_mod( 'folio_logo' ) ) : ?>
        <div class='site-logo'>
            <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name') ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'folio_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name') ); ?>'></a>
        </div>
        <p class="site-description"><?php bloginfo('description'); ?></p>
        <?php else : ?>

        <!--If no logo then the default title will be loaded-->
        <h1 class="site-name">
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home">
        		<?php bloginfo('name'); ?> 
        	</a>
    	  </h1>
        <!--Site Description-->
        <p class="site-description"><?php bloginfo('description'); ?></p>
        <?php endif; ?><!--End Logo-->
        

        <nav><!-- Nav -->
           <a href="javascript:;"><span class="glyphicon glyphicon-align-justify"></span><span class="nav-icon-text">MENU</span></a>
            <!--Search Button -->
              <div class="search-toggle">
                <a href="javascript:;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
              </div><!-- End Search Button -->

              <!--Navigation menu links -->
              <?php wp_nav_menu(array(
                'theme_location'=>'main_menu'
              )); ?><!--End Navigation links -->

        </nav><!-- End Nav-->
      </div><!--end masthead-->

      <!--Search form -->
          <div id="search-container" class="search-box-wrapper hide">

            <!--Search Box -->
            <div class="search-box">
              <?php get_search_form(); ?>
            </div><!--End Search Box -->

          </div><!-- End Search form -->
