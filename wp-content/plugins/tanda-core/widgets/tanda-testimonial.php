<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda Testimonial Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_testimonial_Widget extends \Elementor\Widget_Base {

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
        return 'testimonial';
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
        return esc_html__( 'Testimonial Section', 'tanda-core' );
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
    public function get_script_depends() {
        return array('main');
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
                'label' => esc_html__( 'Testimonial Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default'         => esc_html__( 'testimonials-area carousel-shadow default-padding', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,

            ]
        );
        
        $this->add_control(
            'heading', [
                'label'         => esc_html__( 'Heading', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,

            ]
        );

        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Hero Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label'         => esc_html__( 'Icon Class','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'des',
            [
                'label'         => esc_html__( 'Description','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label'         => esc_html__( 'Name','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'job',
            [
                'label'         => esc_html__( 'Job','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon1',
            [
                'label'         => esc_html__( 'Rating Icon One','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon2',
            [
                'label'         => esc_html__( 'Rating Icon Two','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon3',
            [
                'label'         => esc_html__( 'Rating Icon Three','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon4',
            [
                'label'         => esc_html__( 'Rating Icon Four','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon5',
            [
                'label'         => esc_html__( 'Rating Icon Five','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Testimonial', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Testimonial', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
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

        $testimonial_output = $this->get_settings_for_display(); ?>

        <!-- Start Testimonials 
    ============================================= -->
    <div class="<?php echo esc_html($testimonial_output['class']); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($testimonial_output['heading']); ?></h4>
                        <h2><?php echo esc_html($testimonial_output['title']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="testimonial-items">
                <div class="testimonial-carousel owl-carousel owl-theme">

        <?php 
            if(!empty($testimonial_output['list1'])):
            foreach ($testimonial_output['list1'] as $testimonial_slider):?>

         <!-- Single Item -->
            <div class="item">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="thumb">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $testimonial_slider['img1']['id'], 'full' ));?>" alt="Thumb">
                            <i class="<?php echo esc_attr($testimonial_slider['icon']);?>"></i>
                        </div>
                    </div>
                    <div class="info col-lg-7">
                        <p>
                            <?php echo esc_html($testimonial_slider['des']);?>
                        </p>
                        <div class="rating">
                            <i class="<?php echo esc_attr($testimonial_slider['icon1']);?>"></i>
                            <i class="<?php echo esc_attr($testimonial_slider['icon2']);?>"></i>
                            <i class="<?php echo esc_attr($testimonial_slider['icon3']);?>"></i>
                            <i class="<?php echo esc_attr($testimonial_slider['icon4']);?>"></i>
                            <i class="<?php echo esc_attr($testimonial_slider['icon5']);?>"></i>
                        </div>
                        <div class="provider">
                            <h4><?php echo esc_html($testimonial_slider['name']);?></h4>
                            <span><?php echo esc_html($testimonial_slider['job']);?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->

        <?php endforeach; endif;?>

         </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials Area -->
       

    <?php }

}