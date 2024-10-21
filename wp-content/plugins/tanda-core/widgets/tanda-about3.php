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
class Elementor_tanda_about3_Widget extends \Elementor\Widget_Base {

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
        return 'about3';
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
        return esc_html__( 'About3 Section', 'tanda-core' );
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
                'label' => esc_html__( 'About 3 Section', 'tanda-core' ),
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
            'icon', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icontitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'iconlink',
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

        $repeater->add_control(
            'icondes', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'About Icon Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Icon Box', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ icontitle }}}',
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

        $about3_output = $this->get_settings_for_display(); ?>

         <!-- Start Features Area 
============================================= -->
<div class="feature-area bg-half bg-gray overflow-hidden default-padding">
    <div class="container">
        <div class="heading-left">
            <div class="row">
                <div class="col-lg-6">
                    <h5><?php echo esc_html($about3_output['title']);?></h5>
                    <h2>
                        <?php echo esc_html($about3_output['sub']);?>
                    </h2>
                </div>
                <div class="col-lg-6">
                    <p>
                       <?php echo esc_html($about3_output['des']);?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="feature-box">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb wow">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about3_output['heroimg']['id'], 'full' ));?>" alt="Thumb">
                    </div>
                </div>
                <div class="col-lg-6 content">
                    <div class="content-box">
            <?php 
            if(!empty($about3_output['list1'])):
            foreach ($about3_output['list1'] as $about3_output_box):?>

                    <div class="item">
                        <div class="icon">
                            <i class="<?php echo esc_html($about3_output_box['icon']);?>"></i>
                        </div>
                        <div class="info">
                            <h5><a href="<?php echo esc_url($about3_output_box['iconlink']['url']);?>"><?php echo esc_html($about3_output_box['icontitle']);?></a></h5>
                            <p>
                                 <?php echo esc_html($about3_output_box['icondes']);?>
                            </p>
                        </div>
                    </div>

            <?php endforeach; endif;?>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features Area -->

    <?php }

}