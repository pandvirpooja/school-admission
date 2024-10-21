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
class Elementor_tanda_about_Widget extends \Elementor\Widget_Base {

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
        return 'about';
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
        return esc_html__( 'About Section', 'tanda-core' );
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
            'about_style',
            [
                'label'     => esc_html__( 'About Style','tanda-core' ),
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
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'About Left Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image One', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => ['style' => ['1','2']],
            ]
        );

        $this->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => ['style' => ['1','2']],
            ]
        );

        $this->add_control(
            'heading', [
                'label'         => esc_html__( 'Heading', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => ['style' => ['1','2']],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'About Right Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => ['style' => ['1','2']],
            ]
        );

        $this->add_control(
            'des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => ['style' => ['1','2']],
            ]
        );

        $this->add_control(
            'img3',
            [
                'label'     => esc_html__( 'Photo', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => ['style' => '1'],
            ]
        );


        $this->add_control(
            'name', [
                'label'         => esc_html__( 'Name', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_control(
            'job', [
                'label'         => esc_html__( 'Designation', 'tanda-core' ),
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

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'Icon Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Icon Box', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
                'condition'     => ['style' => '1'],
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'heading_id',
            [
                'label'         => esc_html__( 'Heading ID','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'cl_id',
            [
                'label'         => esc_html__( 'ID','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq_title',
            [
                'label'         => esc_html__( 'Title','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq_des',
            [
                'label'         => esc_html__( 'Description','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list_two',
            [
                'label'     => esc_html__( 'FAQ Box', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Faq Box', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
                'condition'     => ['style' => '2'],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'about_design_option',
            [
                'label'         => esc_html__( 'Content Style','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'about_title_option',
            [
                'label'         => esc_html__( 'Content Options', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $this->add_control(
            'about_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-area .thumb .overlay h4'=> 'color: {{VALUE}}',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-area .thumb .overlay h4',
            ]
        );

        $this->add_control(
            'about_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-area .info h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-area .info h2',
            ]
        );

        $this->add_control(
            'about_des_color',
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
                'name'          => 'about_des_typography',
                'label'         => esc_html__( 'Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} p',
            ]
        );

        $this->add_control(
            'about_icon_color',
            [
                'label'         => esc_html__( 'Icon Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-area .info ul li i'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '1'],
            ]
        );


        $this->add_control(
            'about_icontext_color',
            [
                'label'         => esc_html__( 'Icon Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-area .info ul li h4'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_icon_typography',
                'label'         => esc_html__( 'Icon Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-area .info ul li h4',
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_control(
            'about_icondes_color',
            [
                'label'         => esc_html__( 'Icon Description Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-area .info ul li p'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_icondes_typography',
                'label'         => esc_html__( 'Icon Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-area .info ul li p',
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_control(
            'about_name_color',
            [
                'label'         => esc_html__( 'Name Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-area .author h5'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_name_typography',
                'label'         => esc_html__( 'Name Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-area .author h5',
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_control(
            'about_job_color',
            [
                'label'         => esc_html__( 'Job Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about-area .author span'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_job_typography',
                'label'         => esc_html__( 'Job Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-area .author span',
                'condition'     => ['style' => '1'],
            ]
        );

        $this->add_control(
            'about_faqtitle_color',
            [
                'label'         => esc_html__( 'Faq Title Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .faq-area .faq-content .card .card-header h4'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '2'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_faqtitle_typography',
                'label'         => esc_html__( 'Faq Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-area .faq-content .card .card-header h4',
                'condition'     => ['style' => '2'],
            ]
        );

        $this->add_control(
            'about_faqdes_color',
            [
                'label'         => esc_html__( 'Faq Description Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .faq-area .faq-content .card .card-body p'=> 'color: {{VALUE}}',
                ],
                'condition'     => ['style' => '2'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'about_faqdes_typography',
                'label'         => esc_html__( 'Faq Description Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-area .faq-content .card .card-body p',
                'condition'     => ['style' => '2'],
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

        $about_output = $this->get_settings_for_display(); 
        $about_icon = $about_output['list'];
        $about_faq = $about_output['list_two'];
        if($about_output['style'] == 1){ ?>

        <!-- Star About Area
    ============================================= -->
    <div class="about-area inc-shape default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about_output['img1']['id'], 'full' ));?>" alt="Thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about_output['img2']['id'], 'full' ));?>" alt="Thumb">
                        <div class="overlay">
                            <div class="content">
                                <h4><?php echo esc_html($about_output['heading']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 info">
                    <h2><?php echo esc_html($about_output['title']); ?></h2>
                    <p>
                        <?php echo esc_html($about_output['des']); ?> 
                    </p>
                    <ul>
                        <?php 
                            if(!empty($about_icon)):
                            foreach ($about_icon as $icon_box):?>
                        <li>
                            <div class="icon">
                                <i class="<?php echo esc_attr($icon_box['icon']);?>"></i>
                            </div>
                            <div class="info">
                                <h4><?php echo esc_html($icon_box['icon_title']);?></h4>
                                <p>
                                    <?php echo esc_html($icon_box['icon_des']);?>
                                </p>
                            </div>
                        </li>
                        <?php endforeach; endif;?>

                    </ul>
                    <div class="author">
                        <div class="signature">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $about_output['img3']['id'], 'full' ));?>" alt="signature">
                        </div>
                        <div class="intro">
                            <h5><?php echo esc_html($about_output['name']); ?></h5>
                            <span><?php echo esc_html($about_output['job']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

<?php } elseif($about_output['style'] == 2){ ?>

        <!-- Star About Area
    ============================================= -->
    <div class="about-area faq-area inc-shape default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about_output['img1']['id'], 'full' ));?>" alt="Thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about_output['img2']['id'], 'full' ));?>" alt="Thumb">
                        <div class="overlay">
                            <div class="content">
                                <h4><?php echo esc_html($about_output['heading']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 info">
                    <h2><?php echo esc_html($about_output['title']); ?></h2>
                    <p>
                        <?php echo esc_html($about_output['des']); ?> 
                    </p>
                    <div class="faq-content accordion" id="accordionExample">
                            <?php 
                  $counter = 0;
                  if(!empty($about_faq)):
                  foreach ($about_faq as $faq_box) :
                ?>
                            <div class="card">
                                <div class="card-header" id="<?php echo esc_attr($faq_box['heading_id']);?>">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#<?php echo esc_attr($faq_box['cl_id']);?>" aria-expanded="true" aria-controls="<?php echo esc_attr($faq_box['cl_id']);?>">
                                          <?php echo esc_html($faq_box['faq_title']);?>
                                    </h4>
                                </div>

                                <div id="<?php echo esc_attr($faq_box['cl_id']);?>" class="collapse <?php if($counter == 0){echo esc_attr("show");}?>" aria-labelledby="<?php echo esc_attr($faq_box['heading_id']);?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>
                                            <?php echo esc_html($faq_box['faq_des']);?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php 
                    $counter++;
                    endforeach; endif;
                ?>

                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!-- End About Area -->

    <?php }
}

}