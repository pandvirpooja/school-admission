<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda Work Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_work_Widget extends \Elementor\Widget_Base {

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
        return 'work';
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
        return esc_html__( 'Work Section', 'tanda-core' );
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
                'label' => esc_html__( 'Work Section Title', 'tanda-core' ),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Work Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_number',
            [
                'label'         => esc_html__( 'Number','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

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
            'icon_des',
            [
                'label'         => esc_html__( 'Description','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'Work Process', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Works', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'hero_design_option',
            [
                'label'         => esc_html__( 'Content Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hero_title_option',
            [
                'label'         => esc_html__( 'Content Options', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'work_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .site-heading h4'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'work_title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h4',
            ]
        );

        $this->add_control(
            'work_sub_color',
            [
                'label'         => esc_html__( 'Sub Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .site-heading h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'work_sub_typography',
                'label'         => esc_html__( 'Sub Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h2',
            ]
        );

        $this->add_control(
            'work_icon_color',
            [
                'label'         => esc_html__( 'Icon Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .work-process-area .work-pro-items .item i'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'work_icontitle_color',
            [
                'label'         => esc_html__( 'Icon Title Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .work-process-area .work-pro-items .item h5'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'work_icontitle_typography',
                'label'         => esc_html__( 'Icon Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .work-process-area .work-pro-items .item h5',
            ]
        );

        $this->add_control(
            'work_icondes_color',
            [
                'label'         => esc_html__( 'Icon Description Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .work-process-area .work-pro-items .item p'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'work_icondes_typography',
                'label'         => esc_html__( 'Icon Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .work-process-area .work-pro-items .item p',
            ]
        );

        $this->add_control(
            'work_iconbox_color',
            [
                'label'         => esc_html__( 'Icon Box Border Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .work-process-area .work-pro-items .item'=> 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'work_iconboxhover_color',
            [
                'label'         => esc_html__( 'Icon Box Border Hover Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .work-process-area .work-pro-items .item .item-inner::before, 
                    .work-process-area .work-pro-items .item .item-inner::after,
                    .work-process-area .work-pro-items .item::before, 
                    .work-process-area .work-pro-items .item::after'=> 'background: {{VALUE}}',
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

        $work_output = $this->get_settings_for_display(); ?>

        <!-- Start Work Process 
    ============================================= -->
    <div class="work-process-area overflow-hidden default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($work_output['title']); ?></h4>
                        <h2><?php echo esc_html($work_output['sub']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-full">
            <div class="work-pro-items">
                <div class="row">
                    <?php 
                        if(!empty($work_output['list'])):
                        foreach ($work_output['list'] as $work_box):?>
                    <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="<?php echo esc_attr($work_box['icon']); ?>"></i>
                                    <span><?php echo esc_html($work_box['icon_number']); ?></span>
                                </div>
                                <h5><?php echo esc_html($work_box['icon_title']); ?></h5>
                                <p>
                                    <?php echo esc_html($work_box['icon_des']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                <?php endforeach; endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Work Process Area -->

    <?php }

}