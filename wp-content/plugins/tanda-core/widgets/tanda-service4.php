<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda about2 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_service9_Widget extends \Elementor\Widget_Base {

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
        return 'service9';
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
        return esc_html__( 'Home 9 Service Section', 'tanda-core' );
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
                'label' => esc_html__( 'Service Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'servicetitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'servicelink',
            [
                'label'         => esc_html__( 'Link', 'tanda-core' ),
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

        $repeater->add_control(
            'serviceicon', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'servicedes', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );        

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Home9 Service Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service Box', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ servicetitle }}}',
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

        $service9_output = $this->get_settings_for_display(); ?>

       <!-- Start Services 
============================================= -->
<div class="standard-services-area bg-gray carousel-shadow default-padding">
    <!-- Fixed Shape -->
    <div class="shape" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $service9_output['img1']['id'], 'full' ));?>"></div>
    <!-- End Fixed Shape -->
    <?php if(!empty($service9_output['title'] )): ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4><?php echo esc_html($service9_output['title']);?></h4>
                    <h2><?php echo esc_html($service9_output['sub']);?></h2>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="standard-services-items standard-services-carousel owl-carousel owl-theme">
                <?php 
    if(!empty($service9_output['list1'])):
    foreach ($service9_output['list1'] as $service9_output_box):?>
                    <!-- Single item -->
                    <div class="item">
                        <div class="info">
                            <i class="<?php echo esc_attr($service9_output_box['serviceicon']);?>"></i>
                            <h4><a href="<?php echo esc_url($service9_output_box['servicelink']['url']);?>"><?php echo esc_html($service9_output_box['servicetitle']);?></a></h4>
                            <p>
                                <?php echo esc_html($service9_output_box['servicedes']);?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <?php endforeach; endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services Area -->

    <?php }

}