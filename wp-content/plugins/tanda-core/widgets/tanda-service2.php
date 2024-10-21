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
class Elementor_tanda_service7_Widget extends \Elementor\Widget_Base {

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
        return 'service7';
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
        return esc_html__( 'Home 7 Service Section', 'tanda-core' );
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
            'img1',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'servicetitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'servicedes', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'bticon', [
                'label'         => esc_html__( 'Button Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
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

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Home7 Service Box', 'tanda-core' ),
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

        $service7_output = $this->get_settings_for_display(); ?>

       <!-- Start Services 
============================================= -->
<div class="thumb-services-area carousel-shadow relative bg-cover">
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="site-heading text-center">
                <h4><?php echo esc_html($service7_output['title']);?></h4>
                <h2><?php echo esc_html($service7_output['sub']);?></h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="services-items services-carousel owl-carousel owl-theme text-center">

<?php 
    if(!empty($service7_output['list1'])):
    foreach ($service7_output['list1'] as $service7_output_box):?>

<!-- Single Item -->
<div class="item">
    <div class="icon">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $service7_output_box['img1']['id'], 'full' ));?>" alt="Icon">
    </div>
    <div class="info">
        <h4><?php echo esc_html($service7_output_box['servicetitle']);?></h4>
        <p>
            <?php echo esc_html($service7_output_box['servicedes']);?>
        </p>
        <a href="<?php echo esc_url($service7_output_box['btlink']['url']);?>"><?php echo esc_html($service7_output_box['bttext']);?> <i class="<?php echo esc_attr($service7_output_box['bticon']);?>"></i></a>
    </div>
</div>
<!-- End Single Item -->

<?php endforeach; endif;?>

        </div>
    </div>
    <!-- Fixed Shpae Bottom -->
    <div class="fixed-shape-bottom">
        <img src="../wp-content/themes/tanda/img/shape/1.svg" alt="Shape">
    </div>
    <!-- Fixed Shpae Bottom -->
</div>
<!-- End Services Area -->

    <?php }

}