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
class Elementor_tanda_servicesingle_Widget extends \Elementor\Widget_Base {

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
        return 'servicesingle';
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
        return esc_html__( 'Service Single Section', 'tanda-core' );
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
                'label' => esc_html__( 'Service Single Section', 'tanda-core' ),
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
            'details_service', [
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


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sidebar_class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'sidebar_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'sidebar_link',
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

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'Sidebar List', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ sidebar_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Sidebar Section One', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img4',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'one_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'one_class', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'one_text', [
                'label'         => esc_html__( 'Icon Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Sidebar Section Two', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'two_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'two_des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'class1', [
                'label'         => esc_html__( 'Icon Class One', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'text1', [
                'label'         => esc_html__( 'Icon Text One', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'link1',
            [
                'label'         => esc_html__( 'Icon Link One', 'tanda-core' ),
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
            'class2', [
                'label'         => esc_html__( 'Icon Class Two', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'text2', [
                'label'         => esc_html__( 'Icon Text Two', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'link2',
            [
                'label'         => esc_html__( 'Icon Link Two', 'tanda-core' ),
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

        $servicesingle_output = $this->get_settings_for_display(); ?>

        <!-- Start Services Details 
    ============================================= -->
    <div class="services-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 content">
                    <div class="thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $servicesingle_output['img1']['id'], 'full' ));?>" alt="Thumb">
                    </div>
        <?php echo $servicesingle_output['details_service'];?>

        <div class="row thumbs">
                        <div class="col-lg-6 col-md-6">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $servicesingle_output['img2']['id'], 'full' ));?>" alt="Thumb">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $servicesingle_output['img3']['id'], 'full' ));?>" alt="Thumb">
                        </div>
                    </div>
                </div>

        <div class="col-lg-4 sidebar">
                    <div class="sidebar-item link">
                        <ul>

        <?php 
            if(!empty($servicesingle_output['list'])):
            foreach ($servicesingle_output['list'] as $servicesingle_sidebar):?>

            <li><a class="bt-sidebar <?php echo esc_attr($servicesingle_sidebar['sidebar_class']);?>" href="<?php echo esc_url($servicesingle_sidebar['sidebar_link']['url']);?>"><?php echo esc_html($servicesingle_sidebar['sidebar_title']);?></a></li>

        <?php endforeach; endif;?>

               </ul>
                    </div>

        <div class="sidebar-item banner">
                        <div class="thumb">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $servicesingle_output['img4']['id'], 'full' ));?>" alt="Thumb">
                            <div class="content">
                                <h5><?php echo esc_html($servicesingle_output['one_title']);?></h5>
                                <h3><i class="<?php echo esc_attr($servicesingle_output['one_class']);?>"></i> <?php echo esc_html($servicesingle_output['one_text']);?></h3>
                            </div>
                        </div>
                    </div>

        <div class="sidebar-item brochure">
                        <div class="title">
                            <h4><?php echo esc_html($servicesingle_output['two_title']);?></h4>
                        </div>
                        <p>
                            <?php echo esc_html($servicesingle_output['two_des']);?>
                        </p>
                        <a href="<?php echo esc_url($servicesingle_output['link1']['url']);?>"><i class="<?php echo esc_attr($servicesingle_output['class1']);?>"></i> <?php echo esc_html($servicesingle_output['text1']);?></a>
                        
                        <a href="<?php echo esc_url($servicesingle_output['link2']['url']);?>"><i class="<?php echo esc_attr($servicesingle_output['class2']);?>"></i> <?php echo esc_html($servicesingle_output['text2']);?></a>

                    </div>

    </div>
            </div>
        </div>
    </div>
    <!-- End Services Details -->

    <?php }

}