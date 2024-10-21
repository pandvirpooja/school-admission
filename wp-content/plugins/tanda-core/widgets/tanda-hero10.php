<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda hero10 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_hero10_Widget extends \Elementor\Widget_Base {

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
        return 'hero10';
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
        return esc_html__( 'Hero Ten Section', 'tanda-core' );
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
                'label' => esc_html__( 'Hero Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'heroimg',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__( 'Button', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'bticon', [
                'label'         => esc_html__( 'Button Icon', 'tanda-core' ),
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
            'hero_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .banner-area .content h4 '=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .banner-area .content h4',
            ]
        );

        $this->add_control(
            'hero_sub_color',
            [
                'label'         => esc_html__( 'Sub Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .banner-area .content h2 '=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_sub_typography',
                'label'         => esc_html__( 'Sub Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .banner-area .content h2',
            ]
        );

        $this->add_control(
            'hero_bold_color',
            [
                'label'         => esc_html__( 'Bold Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .banner-area.text-color .content h2 strong '=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_bold_typography',
                'label'         => esc_html__( 'Bold Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .banner-area.text-color .content h2 strong',
            ]
        );

        $this->add_control(
            'hero_des_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .banner-area .item p '=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_des_typography',
                'label'         => esc_html__( 'Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .banner-area .item p',
            ]
        );

        $this->add_control(
            'hero_button_color',
            [
                'label'         => esc_html__( 'Button Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .btn-theme'=> 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hero_boder_color',
            [
                'label'         => esc_html__( 'Button Border Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .btn-theme'=> 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_button_typography',
                'label'         => esc_html__( 'Button Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .banner-area .content a',
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

        $hero10_output = $this->get_settings_for_display(); ?>

        <!-- Start Banner 
============================================= -->
<div class="banner-area home2-banner-fix banner-style-eleven shape center-item text-color">
    <div class="item">
        <div class="container">
            <div class="row align-center">
                                
                <div class="col-lg-7">
                    <div class="content">
                        <h2 class="wow fadeInDown"><?php echo esc_html($hero10_output['title']); ?>  <strong><?php echo esc_html($hero10_output['sub']); ?></strong></h2>
                        <p class="wow fadeInLeft">
                            <?php echo esc_html($hero10_output['des']); ?>
                        </p>
                        <?php if(!empty($hero10_output['bttext'] )): ?>
                        <div class="button wow fadeInDown" data-wow-delay="700ms">
                            <a href="<?php echo esc_url($hero10_output['btlink']['url']); ?>" class="popup-youtube video-btn"><i class="<?php echo esc_html($hero10_output['bticon']); ?>"></i><?php echo esc_html($hero10_output['bttext']); ?></a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-lg-5 thumb">
                    <img class="wow fadeInUp" src="<?php echo esc_url(wp_get_attachment_image_url( $hero10_output['heroimg']['id'], 'full' ));?>" alt="Thumb">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

    <?php }

}