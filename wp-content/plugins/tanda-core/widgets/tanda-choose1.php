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
class Elementor_tanda_choose10_Widget extends \Elementor\Widget_Base {

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
        return 'choose10';
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
        return esc_html__( 'Home 10 Choose Section', 'tanda-core' );
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
                'label' => esc_html__( 'Choose Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'img2',
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
            'des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'chooseicon', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'choosetitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'choosedes', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );


        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Home11 choose Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add choose Box', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ choosetitle }}}',
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

        $choose10_output = $this->get_settings_for_display(); ?>

       <!-- Start Choose Us
============================================= -->
<div class="choose-us-style-ten-area default-padding-top">
    <!-- Fixed Shape  -->
    <div class="fixed-shape-right-bottom" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/img/software/page-header-bg.svg'); ?>);"></div>
    <!-- End Fixed Shape  -->
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6 choose-us-style-ten-item">
                <div class="thumb">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $choose10_output['img2']['id'], 'full' ));?>" alt="Software">
                </div>
            </div>
            <div class="col-lg-6 choose-us-style-ten-item">
                <h2><?php echo esc_html($choose10_output['title']);?></h2>
                <p>
                    <?php echo esc_html($choose10_output['des']);?>
                </p>
                <ul>

    <?php 
    if(!empty($choose10_output['list1'])):
    foreach ($choose10_output['list1'] as $choose10_output_box):?>

    <li>
    <div class="icon">
        <i class="<?php echo esc_html($choose10_output_box['chooseicon']);?>"></i>
    </div>
    <div class="content">
        <h4><?php echo esc_html($choose10_output_box['choosetitle']);?></h4>
        <p>
            <?php echo esc_html($choose10_output_box['choosedes']);?>
        </p>
    </div>
    </li>

    <?php endforeach; endif;?>

    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Choose Us -->

    <?php }

}