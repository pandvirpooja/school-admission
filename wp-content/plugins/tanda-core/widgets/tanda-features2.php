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
class Elementor_tanda_features2_Widget extends \Elementor\Widget_Base {

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
        return 'features2';
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
        return esc_html__( 'Features2 Section', 'tanda-core' );
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
                'label' => esc_html__( 'Features2 Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Background Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hline1',
            [
                'label'         => esc_html__( 'Heading Line One','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hline2',
            [
                'label'         => esc_html__( 'Heading Line Two','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
       $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'         => esc_html__( 'Icon Class','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_title',
            [
                'label'         => esc_html__( 'Title','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link',
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
            'icon_des',
            [
                'label'         => esc_html__( 'Description','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'features2', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add features2', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
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

        $features2_output = $this->get_settings_for_display(); ?>

        <!-- Star Featured Services Area
    ============================================= -->
    <div class="featured-services-area text-center default-padding-bottom bottom-less">
        <!-- Fixed Shape  -->
        <div class="fixed-shape-left-top">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $features2_output['img1']['id'], 'full' ));?>" alt="Shape">
        </div>
        <!-- End Fixed Shape  -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($features2_output['title']);?></h4>
                        <h2><?php echo esc_html($features2_output['hline1']);?> <br> <?php echo esc_html($features2_output['hline2']);?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

        <?php 
                if(!empty($features2_output['list1'])):
                foreach ($features2_output['list1'] as $features2_slide):?>

                    <!-- Single Item -->
                <div class="single-item col-lg-3 col-md-6">
                    <div class="item">
                        <i class="<?php echo esc_attr($features2_slide['icon']);?>"></i>
                        <h5><a href="<?php echo esc_url($features2_slide['icon_link']['url']);?>"><?php echo esc_html($features2_slide['icon_title']);?></a></h5>
                        <p>
                             <?php echo esc_html($features2_slide['icon_des']);?>
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

        <?php endforeach; endif;?>

         </div>
        </div>
    </div>
    <!-- End Feature Services Area -->

    <?php }

}