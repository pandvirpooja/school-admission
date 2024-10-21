<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda hero5 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_hero5_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'hero5';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'hero5 Section', 'tanda-core' );
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'tanda' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Hero 5 Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'heroimg',
            [
                'label'     => esc_html__( 'Hero Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'bgimg2',
            [
                'label'     => esc_html__( 'Background Image Bottom', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'sub', [
                'label'         => esc_html__( 'Sub Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bold', [
                'label'         => esc_html__( 'Bold', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__( 'Button One', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bttext1', [
                'label'         => esc_html__( 'Button Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'btlink1',
            [
                'label'         => esc_html__( 'Button Link', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'tanda-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'button_section2',
            [
                'label' => esc_html__( 'Button Two', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'bticon2', [
                'label'         => esc_html__( 'Button Icon', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'btlink2',
            [
                'label'         => esc_html__( 'Button Link', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'tanda-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->end_controls_section();

         


    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $hero5_output = $this->get_settings_for_display(); ?>

       <!-- Start Banner 
    ============================================= -->
    <div class="banner-area content-less bottom-shape bg-gradient text-light center-item text-color">
        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/shape/waves-shape.svg'); ?>" alt="Shape">
        </div>
        <!-- End Fixed Shape -->
        <div class="item">
            <div class="container">
                <div class="row align-center">
                                    
                    <div class="col-lg-6">
                        <div class="content">
                            <h4 class="wow fadeInLeft"><?php echo esc_html($hero5_output['title']); ?></h4>
                            <h2 class="wow fadeInDown"><?php echo esc_html($hero5_output['sub']); ?> <strong><?php echo esc_html($hero5_output['bold']); ?></strong></h2>
                            <div class="bottom">
                                <?php if(!empty($hero5_output['bttext1'] )): ?>
                                <a class="wow fadeInUp btn circle btn-light border btn-md" href="<?php echo esc_url($hero5_output['btlink1']['url']); ?>"><?php echo esc_html($hero5_output['bttext1']); ?></a>
                                <?php endif;?>
                                <?php if(!empty($hero5_output['bticon2'] )): ?>
                                <a class="popup-youtube relative video-play-button" href="<?php echo esc_html($hero5_output['btlink2']['url']); ?>">
                                    <i class="<?php echo esc_attr($hero5_output['bticon2']); ?>"></i>
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 thumb">
                        <img class="wow fadeInUp" src="<?php echo esc_url(wp_get_attachment_image_url( $hero5_output['heroimg']['id'], 'full' ));?>" alt="Thumb">
                    </div>

                </div>
            </div>
        </div>
        <!-- Fixed Shape -->
        <div class="fixed-shape-bottom">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero5_output['bgimg2']['id'], 'full' ));?>" alt="Shape">
        </div>
        <!-- End Fixed Shape -->
    </div>
    <!-- End Banner -->

    <?php }

}