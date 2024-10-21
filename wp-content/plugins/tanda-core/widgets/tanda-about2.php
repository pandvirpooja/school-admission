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
class Elementor_tanda_about2_Widget extends \Elementor\Widget_Base {

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
        return 'about2';
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
        return esc_html__( 'About2 Section', 'tanda-core' );
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
                'label' => esc_html__( 'About 2 Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heroimg',
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

        $this->add_control(
            'des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'protitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'pronum', [
                'label'         => esc_html__( 'Number', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'About Progress Bar', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Progress Bar', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ protitle }}}',
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

        $about2_output = $this->get_settings_for_display(); ?>

         <!-- Star About Area
    ============================================= -->
    <div class="about-area relative reverse">
        <div class="container">
            <div class="row align-center">
                
                <div class="col-lg-6 info">
                    <h5><?php echo esc_html($about2_output['title']);?></h5>
                    <h2><?php echo esc_html($about2_output['sub']);?></h2>
                    <p>
                        <?php echo esc_html($about2_output['des']);?>
                    </p>
                    <div class="skill-items">
                        <!-- Progress Bar Start -->

                        <?php 
            if(!empty($about2_output['list1'])):
            foreach ($about2_output['list1'] as $about2_output_prog):?>

                        <div class="progress-box">
                            <h5><?php echo esc_html($about2_output_prog['protitle']);?></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo esc_attr($about2_output_prog['pronum']);?>">
                                     <span><?php echo esc_html($about2_output_prog['pronum']);?>%</span>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; endif;?>
      
                        <!-- End Progressbar -->
                    </div>
                </div>

                <div class="col-lg-6 thumbs">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $about2_output['heroimg']['id'], 'full' ));?>" alt="Thumb">
                </div>

            </div>
        </div>
    </div>
    <!-- End About Area -->

    <?php }

}