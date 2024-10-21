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
class Elementor_tanda_case_Widget extends \Elementor\Widget_Base {

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
        return 'case';
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
        return esc_html__( 'Case Studies Section', 'tanda-core' );
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
            'about_style',
            [
                'label'     => esc_html__( 'Case Studies Style','tanda-core' ),
                'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'style',
            [
                'label'     => esc_html__( 'Style', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => [
                    '1'         => esc_html__( 'Version Three', 'tanda-core' ),
                    '2'         => esc_html__( 'Version One', 'tanda-core' ),
                    '3'         => esc_html__( 'Version Two', 'tanda-core' ),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Case Studies Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default'         => esc_html__( 'case-studies-area half-bg default-padding-top', 'tanda-core' ),
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
            'case_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'case_link',
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
            'case_icon', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'case_cat', [
                'label'         => esc_html__( 'Category', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'Case Studies', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Case', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ case_title }}}',
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
            'title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .case-studies-area .item .info .info-items h4 a'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .case-studies-area .item .info .info-items h4 a',
            ]
        );

        $this->add_control(
            'cat_color',
            [
                'label'         => esc_html__( 'Category Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .case-studies-area .item .info .info-items ul li'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'cat_typography',
                'label'         => esc_html__( 'Category Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .case-studies-area .item .info .info-items ul li',
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'         => esc_html__( 'Icon Button Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .case-studies-area .item .info .info-items .right-info a'=> 'background: {{VALUE}}',
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

        $case_output = $this->get_settings_for_display(); 
        if($case_output['style'] == 1){ ?>


       <!-- Start Case Studies Area
    ============================================= -->
    <div class="<?php echo esc_html($case_output['class']); ?>">
        <?php if(!empty($case_output['heading'] || $case_output['title'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($case_output['title']); ?></h4>
                        <h2><?php echo esc_html($case_output['heading']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fill">
            <div class="case-carousel owl-carousel owl-theme">
        <?php else: ?>
        <div class="container-fluid">
            <div class="case-carousel owl-carousel owl-theme">
        <?php endif;?>
        <?php 
            if(!empty($case_output['list'])):
            foreach ($case_output['list'] as $case_box):?>

        <div class="item">
    <div class="thumb">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $case_box['img1']['id'], 'full' ));?>" alt="Thumb">
    </div>
    <div class="info">
        <div class="info-items">
            <div class="left-info">
                <h4>
                    <a href="<?php echo esc_url($case_box['case_link']['url']);?>"><?php echo esc_html($case_box['case_title']);?></a>
                </h4>
                <ul>
                    <li><?php echo esc_html($case_box['case_cat']);?></li>
                </ul>
            </div>
            <div class="right-info">
                <a class="item popup-gallery" href="<?php echo esc_url($case_box['img1']['url']);?>"><i class="<?php echo esc_attr($case_box['case_icon']);?>"></i></a>
            </div>
        </div>
    </div>
</div>

 <?php endforeach; endif;?>

 </div>
        </div>
    </div>
    <!-- End Case Studies Area -->

    <?php } elseif($case_output['style'] == 2){ ?>

        <!-- Start Case Studies Area
    ============================================= -->
    <div class="case-studies-area overflow-hidden grid-items default-padding">
        <div class="container-full">
            <div class="case-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="case-items colums-2">

            <?php 
            if(!empty($case_output['list'])):
            foreach ($case_output['list'] as $case_box):?>

                <!-- Single Item -->
                        <div class="pf-item">
                            <div class="item">
                                <div class="thumb">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $case_box['img1']['id'], 'full' ));?>" alt="Thumb">
                                </div>
                                <div class="info">
                                    <div class="info-items">
                                        <div class="left-info">
                                            <h4>
                                                <a href="<?php echo esc_url($case_box['case_link']['url']);?>"><?php echo esc_html($case_box['case_title']);?></a>
                                            </h4>
                                            <ul>
                                                <li><?php echo esc_html($case_box['case_cat']);?></li>
                                            </ul>
                                        </div>
                                        <div class="right-info">
                                          <a class="item popup-gallery" href="<?php echo esc_url($case_box['img1']['url']);?>"><i class="<?php echo esc_attr($case_box['case_icon']);?>"></i></a>
                                        </div>
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
    </div>
    <!-- End Case Studies Area -->

<?php } elseif($case_output['style'] == 3){ ?>

    <!-- Start Case Studies Area
    ============================================= -->
    <div class="case-studies-area overflow-hidden grid-items default-padding">
        <div class="container-full">
            <div class="case-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="case-items colums-3">

            <?php 
            if(!empty($case_output['list'])):
            foreach ($case_output['list'] as $case_box):?>

                <!-- Single Item -->
                        <div class="pf-item">
                            <div class="item">
                                <div class="thumb">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $case_box['img1']['id'], 'full' ));?>" alt="Thumb">
                                </div>
                                <div class="info">
                                    <div class="info-items">
                                        <div class="left-info">
                                            <h4>
                                                <a href="<?php echo esc_url($case_box['case_link']['url']);?>"><?php echo esc_html($case_box['case_title']);?></a>
                                            </h4>
                                            <ul>
                                                <li><?php echo esc_html($case_box['case_cat']);?></li>
                                            </ul>
                                        </div>
                                        <div class="right-info">
                                          <a class="item popup-gallery" href="<?php echo esc_url($case_box['img1']['url']);?>"><i class="<?php echo esc_attr($case_box['case_icon']);?>"></i></a>
                                        </div>
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
    </div>
    <!-- End Case Studies Area -->

    <?php } }

}