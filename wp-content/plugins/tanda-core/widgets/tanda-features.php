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
class Elementor_tanda_features_Widget extends \Elementor\Widget_Base {

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
        return 'features';
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
        return esc_html__( 'Features Section', 'tanda-core' );
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
                'label' => esc_html__( 'Features Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'label'     => esc_html__( 'Features', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'tanda-core' ),
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

        $features_output = $this->get_settings_for_display(); ?>

        <!-- Start Features Area 
    ============================================= -->
    <div class="top-features-area default-padding bg-gray bottom-less">
        <div class="container">
            <div class="feature-items text-center">
                <div class="row">

        <?php 
                if(!empty($features_output['list1'])):
                foreach ($features_output['list1'] as $features_slide):?>

                <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item">
                            <div class="icon">
                                <i class="<?php echo esc_attr($features_slide['icon']);?>"></i>
                            </div>
                            <h5><a href="<?php echo esc_url($features_slide['icon_link']['url']);?>"><?php echo esc_html($features_slide['icon_title']);?></a></h5>
                            <p>
                                <?php echo esc_html($features_slide['icon_des']);?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->

        <?php endforeach; endif;?>

       </div>
            </div>
        </div>
        <!-- Fixed Shpae Bottom -->
        <div class="fixed-shape-bottom">
            <img src="../wp-content/themes/tanda/img/shape/2.svg" alt="Shape">
        </div>
        <!-- Fixed Shpae Bottom -->
    </div>
    <!-- End Features Area -->

    <?php }

}