<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tanda
 */

if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_header('v1');
}
else {
    get_header();
}
?>
<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-light less-background">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <h2><?php
                        if ( is_day() ) :
                            esc_html_e( 'Daily Archives: ', 'tanda' );

                        elseif ( is_month() ) :
                            esc_html_e( 'Monthly Archives: ', 'tanda' );

                        
                        elseif ( is_year() ) :
                            esc_html_e( 'Yearly Archives: ', 'tanda' );

                        endif;

                        if ( is_day() ) :
                            echo esc_html( get_the_date('F j, Y') );

                        elseif ( is_month() ) :
                            echo esc_html( get_the_date('F Y') );

                        elseif ( is_year() ) :
                            echo esc_html( get_the_date('Y') );
 
                        else :
                            esc_html_e( 'Archives', 'tanda' );

                        endif;

                    ?></h2>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> <?php esc_html_e( 'Home', 'tanda' )?></a></li>
                    <li class="active"><?php esc_html_e( 'Archives', 'tanda' )?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Blog
============================================= -->
<div class="blog-area full-blog right-sidebar full-blog default-padding">
<div class="container">
    <div class="blog-items">
        <div class="row">
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
            <div class="blog-content col-lg-8 col-md-12">
                <?php } else : ?>
                <div class="blog-content col-lg-10 offset-lg-1 col-md-12">
                <?php endif; ?>
                <div class="blog-item-box">
                    <?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'single' );

    endwhile; 
    endif; 
    ?>
                </div>
                
                <!-- Pagination -->
                <div class="row">
                    <div class="col-md-12 pagi-area text-center">
                        <?php echo tanda_pagination(); ?>
                    </div>
                </div>
            </div>
            <!-- Start Sidebar -->
            <div class="sidebar wow fadeInLeft col-lg-4 col-md-12">
                <aside>
                    <?php get_sidebar(); ?>
                </aside>
            </div>
            <!-- End Start Sidebar -->
        </div>
    </div>
</div>
</div>
<!-- End Blog -->

<?php
get_footer();