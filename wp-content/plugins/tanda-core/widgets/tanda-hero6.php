<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda hero6 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_hero6_Widget extends \Elementor\Widget_Base {

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
        return 'hero6';
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
        return esc_html__( 'Hero Six Section', 'tanda-core' );
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

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'heroimg',
            [
                'label'     => esc_html__( 'Hero Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $repeater->add_control(
            'class', [
                'label'         => esc_html__( 'Active Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'sub', [
                'label'         => esc_html__( 'Sub Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'bticon', [
                'label'         => esc_html__( 'Button Icon', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
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

        

        $repeater->add_control(
            'bttext2', [
                'label'         => esc_html__( 'Button Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'bttitle2', [
                'label'         => esc_html__( 'Button Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Hero Sliders', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Sliders', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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

        $hero6_output = $this->get_settings_for_display(); ?>

        <!-- Start Banner 
    ============================================= -->
    <div class="banner-area content-less">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">

        <?php 
                
            if(!empty($hero6_output['list1'])):
            foreach ($hero6_output['list1'] as $hero_sliders):?>
                
        <div class="carousel-item <?php echo esc_attr($hero_sliders['class']); ?>">
                    <div class="container">
                        <div class="row align-center">

            <div class="col-lg-6">
    <div class="content">
        <h2 class="wow fadeInDown"><?php echo esc_html($hero_sliders['title']); ?> <strong><?php echo esc_html($hero_sliders['sub']); ?></strong></h2>
        <p class="wow fadeInLeft">
            <?php echo esc_html($hero_sliders['des']); ?>
        </p>
        <div class="bottom">
            <?php if(!empty($hero_sliders['bttext'] )): ?>
            <a class="btn btn-theme effect btn-md wow fadeInUp" href="<?php echo esc_url($hero_sliders['btlink']['url']); ?>"><?php echo esc_html($hero_sliders['bttext']); ?></a>
             <?php endif;?>
            <div class="call-us wow fadeInLeft">
                <div class="icon">
                    <i class="<?php echo esc_html($hero_sliders['bticon']); ?>"></i>
                </div>
                <div class="info">
                    <h5><?php echo esc_html($hero_sliders['bttext2']); ?></h5>
                    <span><?php echo esc_html($hero_sliders['bttitle2']); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 thumb">
    <img class="wow fadeInUp" src="<?php echo esc_url(wp_get_attachment_image_url( $hero_sliders['heroimg']['id'], 'full' ));?>" alt="Thumb">
</div>

</div>
    </div>
</div>

        <?php endforeach; endif;?>

        </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <!-- End Banner -->


    <?php }

}