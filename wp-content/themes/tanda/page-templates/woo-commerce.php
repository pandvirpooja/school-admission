<?php
/*
 * Template Name: Woo-Commerce Pages
 */
get_header('shop'); ?>

<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/img/banner/6.jpg'); ?>);">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <h2><?php the_title(); ?></h2>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> <?php esc_html_e( 'Home', 'tanda' )?></a></li>
                    <li class="active"><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<div class="wp-river-woocommerce-other-pages">
<div class="container">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    
  <?php the_content(); ?>
  <?php endwhile; endif; //ends the loop
 ?>
    </div>
</div>
<?php get_footer('shop'); ?>