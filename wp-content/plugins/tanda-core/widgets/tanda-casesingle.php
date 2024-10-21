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
class Elementor_tanda_casesingle_Widget extends \Elementor\Widget_Base {

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
        return 'casesingle';
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
        return esc_html__( 'Case Single Section', 'tanda-core' );
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
                'label' => esc_html__( 'Case Single Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Hero Image', 'tanda-core' ),
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
            'icon_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'List', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
            ]
        );

        $this->add_control(
            'details_case', [
                'label'         => esc_html__( 'Details', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image One', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img3',
            [
                'label'     => esc_html__( 'Image Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
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

        $casesingle_output = $this->get_settings_for_display(); ?>

        <!-- Start Case Details 
    ============================================= -->
    <div class="case-details-area services-details-area default-padding">
        <div class="container">
            <div class="case-content">
                <div class="top-info">
                    <div class="row">
                        <div class="col-lg-7 thumb">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $casesingle_output['img1']['id'], 'full' ));?>" alt="Thumb">
                        </div>
                        <div class="col-lg-5 left-info">
                            <h2><?php echo esc_html($casesingle_output['title']);?></h2>
                            <p>
                                <?php echo esc_html($casesingle_output['des']);?>
                            </p>
                         <ul class="project-info">

        <?php 
            if(!empty($casesingle_output['list'])):
            foreach ($casesingle_output['list'] as $casesingle_list):?>
                
                <li>
                    <div class="title"><h5><?php echo esc_html($casesingle_list['icon_title']);?></h5></div>
                <div class="details"><?php echo esc_html($casesingle_list['icon_des']);?></div>
                </li>

        <?php endforeach; endif;?>

                </ul>
                        </div>
                    </div>
                </div>

        <?php echo $casesingle_output['details_case'];?>

        <div class="row thumbs">
                        <div class="col-lg-6 col-md-6">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $casesingle_output['img2']['id'], 'full' ));?>" alt="Thumb">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $casesingle_output['img3']['id'], 'full' ));?>" alt="Thumb">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Case Details -->

    <?php }

}