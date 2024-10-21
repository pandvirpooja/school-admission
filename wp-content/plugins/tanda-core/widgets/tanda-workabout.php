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
class Elementor_tanda_workabout_Widget extends \Elementor\Widget_Base {

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
        return 'work_about';
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
        return esc_html__( 'Work About Section', 'tanda-core' );
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
                'label' => esc_html__( 'Work About Left Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->add_control(
            'title2', [
                'label'         => esc_html__( 'Title Two', 'tanda-core' ),
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
            'list1',
            [
                'label'         => esc_html__( 'List','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'List Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ list1 }}}',
            ]
        );

        $this->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'btlink',
            [
                'label'         => esc_html__( 'Button Link', 'dustra-core' ),
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

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Work About Right Section', 'tanda-core' ),
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
            'counter_title', [
                'label'         => esc_html__( 'Counter Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
         );

        $this->add_control(
            'counter_number', [
                'label'         => esc_html__( 'Counter Number', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
         );

        $this->end_controls_section();

        $this->start_controls_section(
            'aboutwork_design_option',
            [
                'label'         => esc_html__( 'Content Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'aboutwork_title_option',
            [
                'label'         => esc_html__( 'Content Options', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .works-about-items .info > h5'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .works-about-items .info > h5',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .works-about-items .info h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'heading_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .works-about-items .info h2',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} p'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'description_typography',
                'label'         => esc_html__( 'Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} p',
            ]
        );

        $this->add_control(
            'listicon_color',
            [
                'label'         => esc_html__( 'List Icon Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .works-about-items ul li::after'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'list_color',
            [
                'label'         => esc_html__( 'List Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .works-about-items ul li h5'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'list_typography',
                'label'         => esc_html__( 'List Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .works-about-items ul li h5',
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

        $workabout_output = $this->get_settings_for_display(); ?>


        <!-- Start Works About 
    ============================================= -->
    <div class="works-about-area overflow-hidden">
        <div class="container">
            <div class="works-about-items default-padding">
                <div class="row align-center">
                    <div class="col-lg-6 info">
                        <h5><?php echo esc_html($workabout_output['heading']); ?></h5>
                        <h2><?php echo esc_html($workabout_output['title']); ?><br><?php echo esc_html($workabout_output['title2']); ?></h2>
                        <p>
                             <?php echo esc_html($workabout_output['des']); ?></p>
                        <ul>
                            <?php 
                            if(!empty($workabout_output['list'])):
                            foreach ($workabout_output['list'] as $worklist):?>
                            <li>
                                <h5><?php echo esc_html($worklist['list1']);?></h5>
                            </li>
                            <?php endforeach; endif;?>
                        </ul>
                        <?php if(!empty($workabout_output['bttext'])):?>
                        <a href="<?php echo esc_url($workabout_output['btlink']['url']); ?>" class="btn btn-theme effect btn-sm"><?php echo esc_html($workabout_output['bttext']); ?></a>
                         <?php endif;?>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $workabout_output['img1']['id'], 'full' ));?>" alt="Thumb">
                            <div class="fun-fact">
                                <div class="timer" data-to="<?php echo esc_attr($workabout_output['counter_number']); ?>" data-speed="5000"><?php echo esc_attr($workabout_output['counter_number']); ?></div>
                                <span class="medium"><?php echo esc_html($workabout_output['counter_title']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Works About Area -->
       

    <?php }

}