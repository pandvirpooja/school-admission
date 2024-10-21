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
class Elementor_tanda_choose_Widget extends \Elementor\Widget_Base {

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
        return 'choose';
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
        return esc_html__( 'Why Choose Section', 'tanda-core' );
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
            'section1',
            [
                'label' => esc_html__( 'Choose Us Left Section', 'tanda-core' ),
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
            'des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'bticon', [
                'label'         => esc_html__( 'Button Icon', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Choose Us Right Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'repeater_heading_section1',
            [
                'label'         => esc_html__( 'Icon Box One', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'after',
            ]
        );

        $repeater->add_control(
            'icon1',
            [
                'label'         => esc_html__( 'Icon Class','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_title1',
            [
                'label'         => esc_html__( 'Title','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link1',
            [
                'label'         => esc_html__( 'Link','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_des1',
            [
                'label'         => esc_html__( 'Description','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'repeater_heading_section2',
            [
                'label'         => esc_html__( 'Icon Box Two', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'after',
            ]
        );

        $repeater->add_control(
            'icon2',
            [
                'label'         => esc_html__( 'Icon Class','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_title2',
            [
                'label'         => esc_html__( 'Title','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link2',
            [
                'label'         => esc_html__( 'Link','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_des2',
            [
                'label'         => esc_html__( 'Description','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'Twin Grid Icon Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Icon Box', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title1 }}}',
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'choose_design_option',
            [
                'label'         => esc_html__( 'Content Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'choose_title_option',
            [
                'label'         => esc_html__( 'Content Options', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'choose_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .why-us > h5'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'choose_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .why-us > h5',
            ]
        );

        $this->add_control(
            'choose_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .why-us h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'choose_title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .why-us h2',
            ]
        );

        $this->add_control(
            'choose_btbg_color',
            [
                'label'         => esc_html__( 'Button BG Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .video-play-button.relative::after'=> 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'choose_bt_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .video-play-button.relative span'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'choose_bt_typography',
                'label'         => esc_html__( 'Button Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .video-play-button.relative span',
            ]
        );

        $this->add_control(
            'choose_des_color',
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
                'name'          => 'choose_des_typography',
                'label'         => esc_html__( 'Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} p',
            ]
        );

        $this->add_control(
            'choose_icontitle1_color',
            [
                'label'         => esc_html__( 'Icon Title Color One', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .features-area .item-grid:first-child .item:first-child i, .features-area .item-grid:first-child .item:first-child a, .features-area .item-grid:first-child .item:first-child p, .features-area .item-grid:last-child .item:last-child i, .features-area .item-grid:last-child .item:last-child a, .features-area .item-grid:last-child .item:last-child p, .features-area .item-grid .item:hover i, .features-area .item-grid .item:hover a, .features-area .item-grid .item:hover p'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'choose_icontitle1_typo',
                'label'         => esc_html__( 'Icon Title Typography One', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .features-area .item-grid:first-child .item:first-child i, .features-area .item-grid:first-child .item:first-child a, .features-area .item-grid:first-child .item:first-child p, .features-area .item-grid:last-child .item:last-child i, .features-area .item-grid:last-child .item:last-child a, .features-area .item-grid:last-child .item:last-child p, .features-area .item-grid .item:hover i, .features-area .item-grid .item:hover a, .features-area .item-grid .item:hover p',
            ]
        );

        $this->add_control(
            'choose_icontitle2_color',
            [
                'label'         => esc_html__( 'Icon Title Color Two', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} h5'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'choose_icontitle2_typo',
                'label'         => esc_html__( 'Icon Title Typography Two', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} h5',
            ]
        );

        $this->add_control(
            'choose_iconbox_bg',
            [
                'label'         => esc_html__( 'Icon Box Background', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .features-area .item-grid:first-child .item:first-child, .features-area .item-grid:last-child .item:last-child, .features-area .item-grid .item:hover'=> 'background: {{VALUE}}',
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

        $choose_output = $this->get_settings_for_display(); ?>

        <!-- Start Features 
    ============================================= -->
    <div class="features-area overflow-hidden bg-gray default-padding">
        <!-- Fixed Shpae  -->
        <div class="fixed-shape shape left bottom">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $choose_output['img1']['id'], 'full' ));?>" alt="Shape">
        </div>
        <!-- End Fixed Shpae  -->
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5 why-us">
                    <h5><?php echo esc_html($choose_output['heading']); ?></h5>
                    <h2><?php echo esc_html($choose_output['title']); ?></h2>
                    <p>
                        <?php echo esc_html($choose_output['des']); ?>
                    </p>
                    <?php if(!empty($choose_output['bttext'])):?>
                    <a class="popup-youtube relative theme video-play-button" href="<?php echo esc_url($choose_output['btlink']['url']); ?>">
                        <i class="<?php echo esc_attr($choose_output['bticon']); ?>"></i> <span><?php echo esc_html($choose_output['bttext']); ?></span>
                    </a>
                <?php endif;?>
                </div>
                <div class="col-lg-7 features-box text-center">
                    <div class="row">
                        <?php 
                            if(!empty($choose_output['list'])):
                            foreach ($choose_output['list'] as $icon_box):?>

                        <!-- Item Grid -->
                        <div class="col-lg-6 col-md-6 item-grid">
                            <!-- Single Item -->
                            <div class="item">
                                <i class="<?php echo esc_attr($icon_box['icon1']);?>"></i>
                                <h5><a href="#"><?php echo esc_html($icon_box['icon_title1']);?></a></h5>
                                <p>
                                     <?php echo esc_html($icon_box['icon_des1']);?>
                                </p>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <i class="<?php echo esc_attr($icon_box['icon2']);?>"></i>
                                <h5><a href="#"><?php echo esc_html($icon_box['icon_title2']);?></a></h5>
                                <p>
                                     <?php echo esc_html($icon_box['icon_des2']);?>
                                </p>
                            </div>
                            <!-- End Single Item -->
                        </div>
                        <!-- End Item Grid -->

                        <?php endforeach; endif;?>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Features Area -->
       

    <?php }

}