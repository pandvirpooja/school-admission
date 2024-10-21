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
class Elementor_tanda_why_Widget extends \Elementor\Widget_Base {

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
        return 'why';
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
        return esc_html__( 'Why Choose Us Section', 'tanda-core' );
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
                'label' => esc_html__( 'Why Choose Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default'         => esc_html__( 'choose-us-area default-padding-bottom', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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
            'img2',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
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
            'heading', [
                'label'         => esc_html__( 'Heading', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'heading_br', [
                'label'         => esc_html__( 'Break Heading', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'icon', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'link',
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
            'content_section1',
            [
                'label' => esc_html__( 'Box One', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

         $this->add_control(
            'title1', [
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
            'icon1', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'icon1_title', [
                'label'         => esc_html__( 'Icon Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'icon1_sub', [
                'label'         => esc_html__( 'Icon Sub Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Box Two', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

         $this->add_control(
            'title2', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

          $this->add_control(
            'des2', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

         $this->add_control(
            'icon2', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'icon2_title', [
                'label'         => esc_html__( 'Button Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'icon2_btlink',
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
            'design_option',
            [
                'label'         => esc_html__( 'Content Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .video-area h5'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .video-area h5',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .video-area h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .video-area h2',
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'         => esc_html__( 'Icon Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .video-play-button i'=> 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'design_option2',
            [
                'label'         => esc_html__( 'Box Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'box1title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .choose-us-area .item h4'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'box1title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .choose-us-area .item h4',
            ]
        );

        $this->add_control(
            'box1des_color',
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
                'name'          => 'box1des_typography',
                'label'         => esc_html__( 'Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} p',
            ]
        );

        $this->add_control(
            'icon_colorbox',
            [
                'label'         => esc_html__( 'Icon Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .choose-us-area .item .call i,.choose-us-area .item .icon i'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_title_color',
            [
                'label'         => esc_html__( 'Icon Title Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .choose-us-area .item .call span'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'icon_title_color_ty',
                'label'         => esc_html__( 'Icon Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .choose-us-area .item .call span',
            ]
        );

        $this->add_control(
            'icon_bt_color',
            [
                'label'         => esc_html__( 'Icon Button Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .choose-us-area .item a'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'icon_bt_ty',
                'label'         => esc_html__( 'Icon Button Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .choose-us-area .item a',
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

        $why_output = $this->get_settings_for_display(); ?>

        <!-- Start Video Area 
    ============================================= -->
    <div class="video-area extra-padding text-center default-padding faq-area bg-gray bg-fixed shadow dark text-light" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $why_output['img1']['id'], 'full' ));?>">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5><?php echo esc_html($why_output['title']); ?></h5>
                        <h2><?php echo esc_html($why_output['heading']); ?> <br> <?php echo esc_html($why_output['heading_br']); ?></h2>
                        <?php if(!empty($why_output['icon'])):?>
                        <a class="popup-youtube relative video-play-button" href="<?php echo esc_url($why_output['link']['url']); ?>">
                            <i class="<?php echo esc_attr($why_output['icon']); ?>"></i>
                        </a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fixed Shpae Bottom -->
        <div class="fixed-shape-bottom">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $why_output['img2']['id'], 'full' ));?>" alt="Shape">
        </div>
        <!-- Fixed Shpae Bottom -->
    </div>
    <!-- End Video Area -->

    <!-- Start Why Choose Us 
    ============================================= -->
    <div class="<?php echo esc_html($why_output['section_class']); ?>">
        <div class="container">
            <div class="items-box">
                <div class="row">
                    <!-- SIngle item-->
                    <div class="single-item col-lg-6 col-mg-6">
                        <div class="item">
                            <div class="info">
                                <h4><?php echo esc_html($why_output['title1']); ?></h4>
                                <p>
                                   <?php echo esc_html($why_output['des']); ?>
                                </p>
                                <div class="call">
                                    <div class="icons">
                                        <i class="<?php echo esc_attr($why_output['icon1']); ?>"></i>
                                    </div>
                                    <div class="info">
                                        <span><?php echo esc_html($why_output['icon1_title']); ?></span> <?php echo esc_html($why_output['icon1_sub']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End SIngle item-->
                    <!-- SIngle item-->
                    <div class="single-item col-lg-6 col-mg-6">
                        <div class="item">
                            <div class="icon">
                                <i class="<?php echo esc_attr($why_output['icon2']); ?>"></i>
                            </div>
                            <div class="info">
                                <h4><?php echo esc_html($why_output['title2']); ?></h4>
                                <p>
                                    <?php echo esc_html($why_output['des2']); ?>
                                </p>
                                <a href="<?php echo esc_url($why_output['icon2_btlink']['url']); ?>" class="btn-more"><?php echo esc_html($why_output['icon2_title']); ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- End SIngle item-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us Area -->
       

    <?php }

}