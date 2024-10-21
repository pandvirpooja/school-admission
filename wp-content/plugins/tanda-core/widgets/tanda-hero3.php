<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda Hero Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_hero3_Widget extends \Elementor\Widget_Base {

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
        return 'hero3';
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
        return esc_html__( 'Hero 3 Section', 'tanda-core' );
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
                'label' => esc_html__( 'Hero Three Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'heroimg',
            [
                'label'     => esc_html__( 'Background Image', 'tanda-core' ),
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

        $this->add_control(
            'des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'btlink',
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
            'form1_section',
            [
                'label' => esc_html__( 'Form Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'ftitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'fdes', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contactform_shortcode',
            [
                'label'         => esc_html__( 'Contact Form Shortcode', 'dustra-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'rows'          => 2,
                'placeholder'   => esc_html__( 'Put your shortcode Here', 'dustra-core' ),
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

        $hero3_output = $this->get_settings_for_display(); ?>

        <!-- Start Banner 
    ============================================= -->
    <div class="banner-area home2-banner-fix shadow heading-border dark bg-cover text-light" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $hero3_output['heroimg']['id'], 'full' ));?>">
        <div class="item-box">
            <div class="item">
                <div class="container">
                    <div class="row align-center">
                                        
                        <div class="col-lg-6">
                            <div class="content">
                                <h4 class="wow fadeInUp"><?php echo esc_html($hero3_output['title']); ?> </h4>
                                <h2 class="wow fadeInDown"><?php echo esc_html($hero3_output['sub']); ?> <strong><?php echo esc_html($hero3_output['bold']); ?></strong></h2>
                                <p class="wow fadeInLeft">
                                    <?php echo esc_html($hero3_output['des']); ?>
                                </p>

                                <?php if(!empty($hero3_output['bttext'] )): ?>
                                <a class="btn btn-light effect btn-md wow fadeInUp" href="<?php echo esc_url($hero3_output['btlink']['url']); ?>"><?php echo esc_html($hero3_output['bttext']); ?></a>
                                <?php endif;?>
                                
                                
                            </div>
                        </div>
                        <!-- Start Appoinment Form -->
                        <div class="col-lg-5 offset-lg-1 appoinment">
                            <div class="appoinment-box text-center">
                                <div class="heading">
                                    <h4><?php echo esc_html($hero3_output['ftitle']); ?></h4>
                                    <p>
                                        <?php echo esc_html($hero3_output['fdes']); ?>
                                    </p>
                                </div>
                        <?php echo do_shortcode($hero3_output['contactform_shortcode']);?>
                    </div>
                        </div>
                        <!-- End Appoinment Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->


    <?php }

}