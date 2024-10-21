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
class Elementor_tanda_experience_Widget extends \Elementor\Widget_Base {

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
        return 'experience';
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
        return esc_html__( 'Experience Section', 'tanda-core' );
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
                'label' => esc_html__( 'Experience Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default'         => esc_html__( 'feature-area overflow-hidden default-padding', 'tanda-core' ),
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
            'heading', [
                'label'         => esc_html__( 'Heading', 'tanda-core' ),
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
            'img1',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title1', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon', [
                'label'         => esc_html__( 'Button Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
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

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'Custom Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Custom Box', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ title1 }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'design_option',
            [
                'label'         => esc_html__( 'Top Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title-co',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .heading-left h5'=> 'color: {{VALUE}}',
                    '{{WRAPPER}} .heading-left h5::after'=> 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'title-ty',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .heading-left h5',
            ]
        );

        $this->add_control(
            'heading-co',
            [
                'label'         => esc_html__( 'Heading Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .heading-left h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'heading-ty',
                'label'         => esc_html__( 'Heading Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .heading-left h2',
            ]
        );

        $this->add_control(
            'des-co',
            [
                'label'         => esc_html__( 'Description Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} p'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'des-ty',
                'label'         => esc_html__( 'Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} p',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'design_option1',
            [
                'label'         => esc_html__( 'Custom Box Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'customt-co',
            [
                'label'         => esc_html__( 'Title Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .feature-area .features-box .item .overlay h4'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'customt-ty',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .feature-area .features-box .item .overlay h4',
            ]
        );

        $this->add_control(
            'customicon-co',
            [
                'label'         => esc_html__( 'Icon Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .feature-area .features-box .item .overlay i'=> 'color: {{VALUE}}',
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

        $exp_output = $this->get_settings_for_display(); ?>

         <!-- Start Features Area 
    ============================================= -->
    <div class="<?php echo esc_html($exp_output['class']);?>">
        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-6">
                        <h5><?php echo esc_html($exp_output['title']); ?></h5>
                        <h2>
                            <?php echo esc_html($exp_output['heading']); ?>
                        </h2>
                    </div>
                    <div class="col-lg-6">
                        <p>
                            <?php echo esc_html($exp_output['des']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="features-box text-light">
                <div class="row">

        <?php 
            if(!empty($exp_output['list'])):
            foreach ($exp_output['list'] as $custom_box):?>

            <!-- Single Item -->
            <div class="single-item col-lg-4 col-md-6">
                <div class="item">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $custom_box['img1']['id'], 'full' ));?>" alt="Thumb">
                    <div class="overlay">
                        <div class="info">
                            <h4><?php echo esc_html($custom_box['title1']);?></h4>
                            <a href="<?php echo esc_url($custom_box['link']['url']);?>"><i class="<?php echo esc_attr($custom_box['icon']);?>"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->

        <?php endforeach; endif;?>

         </div>
            </div>
        </div>
    </div>
    <!-- End Features Area -->
       

    <?php }

}