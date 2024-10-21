<?php
global $tanda_options;
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tanda
 */
?>
 <!-- Start Footer 
    ============================================= -->
    <footer class="bg-dark text-light">
		<?php if (isset($tanda_options['footer_switch']) && $tanda_options['footer_switch']) { ?>
        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/map.svg'); ?>" alt="<?php echo esc_attr__( 'Shape', 'tanda' )?>">
        </div>
        <!-- Fixed Shape -->
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item about">
                            <img src="<?php echo esc_url($tanda_options['footerlogo']['url']); ?>" alt="<?php echo esc_attr__( 'Logo', 'tanda' )?>">
                            <p>
                                <?php echo esc_html($tanda_options['footerdes']); ?>
                            </p>
                       <form action="#">
                                <input type="email" placeholder="Your Email" class="form-control" name="email">
                                <button type="submit"> <i class="fa fa-paper-plane"></i></button>  
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title"><?php echo esc_html($tanda_options['companylinks']); ?></h4>
                            <?php 
                                wp_nav_menu( array(
                                'theme_location'  => 'footer-menu1',
                                ) );
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title"><?php echo esc_html($tanda_options['solutionlinks']); ?></h4>
                            <?php 
                                wp_nav_menu( array(
                                'theme_location'  => 'footer-menu2',
                                ) );
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 item">
                    <div class="f-item">
                        <h4 class="widget-title"><?php echo esc_html($tanda_options['contactinfo1']); ?></h4>
                        <div class="address">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="<?php echo esc_html($tanda_options['c_icon1']); ?>"></i>
                                    </div>
                                    <div class="info">
                                        <?php echo esc_html($tanda_options['c_text1']); ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="<?php echo esc_attr($tanda_options['c_icon2']); ?>"></i>
                                    </div>
                                    <div class="info">
                                        <a href="mailto:<?php echo rawurlencode($tanda_options['c_text2']); ?>"><?php echo esc_html($tanda_options['c_text2']); ?></a> <br> <a href="mailto:<?php echo rawurlencode($tanda_options['c_text22']); ?>"><?php echo esc_html($tanda_options['c_text22']); ?></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="<?php echo esc_attr($tanda_options['c_icon3']); ?>"></i>
                                    </div>
                                    <div class="info">
                                        <a href="tel:<?php echo rawurlencode($tanda_options['c_text3']); ?>"><?php echo esc_html($tanda_options['c_text3']); ?></a> <br> <a href="tel:<?php echo rawurlencode($tanda_options['c_text33']); ?>"><?php echo esc_html($tanda_options['c_text33']); ?></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
		<?php } ?> 
		<?php if (isset($tanda_options['footer_bottom_switch']) && $tanda_options['footer_bottom_switch']) { ?>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p><?php echo esc_html($tanda_options['copyright']); ?></p>
                    </div>
                    <div class="col-md-6 text-right link">
                        <?php 
                                wp_nav_menu( array(
                                'theme_location'  => 'footer-menu',
                                ) );
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
		<?php } ?> 
    </footer>
    <!-- End Footer -->
    <!--color-customizer start-->
    <div class="color-customizer closed">
  <div class="color-button">
    <a class="opener" href="#"> <i class="fas fa-spinner fa-spin"></i>
    </a>
  </div>
  <div class="clearfix color-chooser text-center">
    <h4 class="text-theme font-w-8 mb-4">Tanda With <span class="text-black font-w-5">Awesome Colors</span></h4>
    <ul class="colorChange clearfix">
      <li class="theme-default selected" title="theme-default" data-style="color-1"></li>
      <li class="theme-2" title="theme-2" data-style="color-2"></li>
      <li class="theme-3" title="theme-3" data-style="color-3"></li>
      <li class="theme-4" title="theme-4" data-style="color-4"></li>
      <li class="theme-5" title="theme-5" data-style="color-5"></li>
      <li class="theme-6" title="theme-6" data-style="color-6"></li>
    </ul>
    
  </div>
</div>
<!--color-customizer end-->
<?php wp_footer(); ?>

</body>
</html>