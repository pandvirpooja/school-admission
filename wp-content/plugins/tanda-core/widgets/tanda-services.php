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
class Elementor_tanda_services_Widget extends \Elementor\Widget_Base {

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
        return 'services';
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
        return esc_html__( 'Services Section', 'tanda-core' );
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
                'label'     => esc_html__( 'Services Style','tanda-core' ),
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
                    '1'         => esc_html__( 'Style One', 'tanda-core' ),
                    '2'         => esc_html__( 'Style Two', 'tanda-core' ),
                    '3'         => esc_html__( 'Style Three', 'tanda-core' ),
                    '4'         => esc_html__( 'Style Four', 'tanda-core' ),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Services Section', 'tanda-core' ),
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
            'class3', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default'         => esc_html__( 'services-area default-padding bg-cover', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => ['style' => '3'],

            ]
        );
        
        $this->add_control(
            'class1', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default'         => esc_html__( 'services-area carousel-shadow default-padding bg-cover', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => ['style' => '1'],

            ]
        );

        $repeater = new \Elementor\Repeater();

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

        $repeater->add_control(
            'icon_link',
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
            'list1',
            [
                'label'     => esc_html__( 'Services', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Services', 'tanda-core' ),
                    ],
                ],
                'condition'     => ['style' => '1'],
                'title_field' => '{{{ icon_title }}}',
            ]
        );


        $repeater = new \Elementor\Repeater();

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

        $repeater->add_control(
            'icon_text',
            [
                'label'         => esc_html__( 'Button Text','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link',
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
            'list2',
            [
                'label'     => esc_html__( 'Services Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Services', 'tanda-core' ),
                    ],
                ],
                'condition'     => ['style' => '2'],
                'title_field' => '{{{ icon_title }}}',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tabid',
            [
                'label'         => esc_html__( 'Tab Id','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'tabclass',
            [
                'label'         => esc_html__( 'Tab Class','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'tabtitle',
            [
                'label'         => esc_html__( 'Tab Title','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3',
            [
                'label'     => esc_html__( 'Tabs Nav', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Tabs Nav', 'tanda-core' ),
                    ],
                ],
                'condition'     => ['style' => '3'],
                'title_field' => '{{{ tabtitle }}}',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_id',
            [
                'label'         => esc_html__( 'Tab ID','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'tab_class',
            [
                'label'         => esc_html__( 'Active Class','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

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

        $repeater->add_control(
            'icon_text',
            [
                'label'         => esc_html__( 'Button Text','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link',
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

        $repeater->add_control(
            'l1',
            [
                'label'         => esc_html__( 'List One','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'l2',
            [
                'label'         => esc_html__( 'List Two','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'l3',
            [
                'label'         => esc_html__( 'List Three','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list4',
            [
                'label'     => esc_html__( 'Services Three', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Services', 'tanda-core' ),
                    ],
                ],
                'condition'     => ['style' => '3'],
                'title_field' => '{{{ icon_title }}}',
            ]
        );
        
        $repeater = new \Elementor\Repeater();

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

        $repeater->add_control(
            'icon_link',
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
            'list5',
            [
                'label'     => esc_html__( 'Services', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Services', 'tanda-core' ),
                    ],
                ],
                'condition'     => ['style' => '4'],
                'title_field' => '{{{ icon_title }}}',
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
            'title_option',
            [
                'label'         => esc_html__( 'Content Options', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'h_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .site-heading h4'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'h_title_typography',
                'label'         => esc_html__( 'Heading Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h4',
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .site-heading h2'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h2',
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'         => esc_html__( 'Icon Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .services-area .services-items .item .icon > i'=> 'color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'icon_title_color',
            [
                'label'         => esc_html__( 'Icon Title Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .services-area .services-items .item h4'=> 'color: {{VALUE}}',
                ],
            ]
        );



        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'icon_title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .services-area .services-items .item h4',
            ]
        );

        $this->add_control(
            'icon_des_color',
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
                'name'          => 'icon_des_typography',
                'label'         => esc_html__( 'Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} p',
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

        $services_output = $this->get_settings_for_display(); 
        if($services_output['style'] == 1){ ?>

       <!-- Start Services 
    ============================================= -->
    <div class="<?php echo esc_html($services_output['class1']); ?>">
        <?php if(!empty($services_output['heading'] || $services_output['title'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="slide-up"><?php echo esc_html($services_output['heading']); ?></h4>
                        <h2><?php echo esc_html($services_output['title']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="services-items services-carousel owl-carousel owl-theme text-center">

            <?php 
                if(!empty($services_output['list1'])):
                foreach ($services_output['list1'] as $servicelist_box):?>

                <!-- Single Item -->
                <div class="item">
                    <div class="icon">
                        <i class="<?php echo esc_attr($servicelist_box['icon']);?>"></i>
                    </div>
                    <div class="info">
                        <h4><a href="<?php echo esc_url($servicelist_box['icon_link']['url']);?>"><?php echo esc_html($servicelist_box['icon_title']);?></a></h4>
                        <p>
                            <?php echo esc_html($servicelist_box['icon_des']);?>
                        </p>
                        <?php if(!empty($servicelist_box['icon_link'] )): ?>
                        <a href="<?php echo esc_url($servicelist_box['icon_link']['url']);?>"><i class="fas fa-angle-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- End Single Item -->
                <?php endforeach; endif;?>

            </div>
        </div>
    </div>
 <?php } elseif($services_output['style'] == 2){ ?>

    <!-- Start Services 
    ============================================= -->
    <div class="service-area default-padding bottom-less bg-cover">
        <?php if(!empty($services_output['heading'] || $services_output['title'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($services_output['heading']); ?></h4>
                        <h2><?php echo esc_html($services_output['title']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="service-items text-center">
                <div class="row">

            <?php 
                if(!empty($services_output['list2'])):
                foreach ($services_output['list2'] as $servicelist_box1):?>

                <!-- Single item -->
                <div class="col-lg-4 col-md-6 single-item">
                    <div class="item">
                        <div class="info">
                            <h4><?php echo esc_html($servicelist_box1['icon_title']);?></h4>
                            <i class="<?php echo esc_attr($servicelist_box1['icon']);?>"></i>
                            <p>
                                <?php echo esc_html($servicelist_box1['icon_des']);?>
                            </p>
                            <?php if(!empty($servicelist_box1['icon_text'] )): ?>
                            <a class="btn-standard" href="<?php echo esc_url($servicelist_box1['icon_link']['url']);?>"><?php echo esc_html($servicelist_box1['icon_text']);?></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- End Single item -->

    
                <?php endforeach; endif;?>

            </div>
            </div>
        </div>
    </div>
    <!-- End Services Area -->

<?php } elseif($services_output['style'] == 3){ ?>

    <!-- Start Services 
    ============================================= -->
    <div class="<?php echo esc_html($services_output['class3']); ?>">
        <?php if(!empty($services_output['heading'] || $services_output['title'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($services_output['heading']); ?></h4>
                        <h2><?php echo esc_html($services_output['title']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="services-tabs">
                <ul id="tabs" class="nav nav-tabs">

                <?php 
                if(!empty($services_output['list3'])):
                foreach ($services_output['list3'] as $tabnav):?>

                    <li class="nav-item">
                        <a href="" data-target="#<?php echo esc_attr($tabnav['tabid']);?>" data-toggle="tab" class="<?php echo esc_attr($tabnav['tabclass']);?> nav-link"><?php echo esc_html($tabnav['tabtitle']);?></a>
                    </li>

                <?php endforeach; endif;?>

            </ul>
                <div id="tabsContent" class="tab-content wow fadeInUp" data-wow-delay="0.5s">

                <?php if(!empty($services_output['list4'])):
                foreach ($services_output['list4'] as $tabs_service):?>

                    <div id="<?php echo esc_attr($tabs_service['tab_id']);?>" class="tab-pane fade <?php echo esc_attr($tabs_service['tab_class']);?>">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 thumb" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $tabs_service['img1']['id'], 'full' ));?>"></div>
                            <div class="col-lg-7 col-md-12 info">
                                <div class="content">
                                    <i class="<?php echo esc_attr($tabs_service['icon']);?>"></i>
                                    <h2><?php echo esc_html($tabs_service['icon_title']);?></h2>
                                    <p>
                                        <?php echo esc_html($tabs_service['icon_des']);?>
                                    </p>
                                    <ul>
                                        <li><?php echo esc_html($tabs_service['l1']);?></li>
                                        <li><?php echo esc_html($tabs_service['l2']);?></li>
                                        <li><?php echo esc_html($tabs_service['l3']);?></li>
                                    </ul>
                            <?php if(!empty($tabs_service['icon_text'] )): ?>
                            <a href="<?php echo esc_url($tabs_service['icon_link']['url']);?>" class="btn-more"><?php echo esc_html($tabs_service['icon_text']);?></a>
                            <?php endif; ?>

                        </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; endif;?>

        </div>
            </div>
        </div>
    </div>
    <!-- End Services Area -->

    <?php } elseif($services_output['style'] == 4){ ?>
    
    <!-- Start Services 
    ============================================= -->
    <div class="service-area default-padding-bottom bottom-less bg-cover">
        <!-- Fixed Shape  -->
        <div class="fixed-shape-left-top">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/shape/7.png'); ?>" alt="Shape">
        </div>
        <!-- End Fixed Shape  -->
        <?php if(!empty($services_output['heading'] || $services_output['title'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($services_output['heading']); ?></h4>
                        <h2><?php echo esc_html($services_output['title']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="service-box">
                <div class="row">
                    <?php 
                if(!empty($services_output['list5'])):
                foreach ($services_output['list5'] as $servicelist_box5):?>
                    <!-- Single item -->
                    
                    <div class="col-lg-6 col-md-6 single-item">
                        <div class="item">
                            <div class="icon">
                                <i class="<?php echo esc_attr($servicelist_box5['icon']);?>"></i>
                            </div>
                            <div class="info">
                                <h4><a href="<?php echo esc_url($servicelist_box5['icon_link']['url']);?>"><?php echo esc_html($servicelist_box5['icon_title']);?></a></h4>
                                <p>
                                    <?php echo esc_html($servicelist_box5['icon_des']);?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single item -->

<?php endforeach; endif;?>

                </div>
            </div>
        </div>
    </div>
    <!-- End Services Area -->
    
<?php }
 }
}