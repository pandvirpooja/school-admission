<?php
global $tanda_options;
/**
 * Header file for the Tanda WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tanda
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="<?php echo esc_url($tanda_options['favicon']['url']); ?>" type="image/x-icon">
    
<?php } wp_head(); ?>
	<link href="#" data-style="styles" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <?php if ( isset($tanda_options['enable_preloader']) && $tanda_options['enable_preloader'] ) : ?>
    <!-- Preloader Start -->
    <div id="site-preloader" class="site-preloader">
        <div class="loader-wrap">
            <div class="ring">
                <span></span>
            </div>
        </div>
    </div>
    <!-- Preloader Ends -->
    <?php endif; ?>

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed dark no-background bootsnav">

            <!-- Start Top Search -->
            <div class="container-full">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container-full">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav inc-border">
                    <ul>
                        <li class="button"><a href="<?php echo esc_url($tanda_options['h_bt_2']); ?>"><?php echo esc_html($tanda_options['h_bt_1']); ?></li>
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($tanda_options['sticky-logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'Logo', 'tanda' )?>">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php 
					wp_nav_menu( array(
					'theme_location'  => 'main-menu',
					'depth'           => 8, // 1 = no dropdowns, 2 = with dropdowns.
				    'container'       => 'div',
				    'container_class' => 'collapse navbar-collapse',
				    'container_id'    => 'navbar-menu',
				    'menu_class'      => 'nav navbar-nav navbar-center',
				    'fallback_cb'     => 'tanda_Bootstrap_Navwalker::fallback',
                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>',
                    'walker'          => new tanda_Bootstrap_Navwalker(),
					) );
				?>
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->