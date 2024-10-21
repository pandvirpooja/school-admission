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
class Elementor_tanda_faq1_Widget extends \Elementor\Widget_Base {

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
        return 'faq1';
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
        return esc_html__( 'Faq1 Section', 'tanda-core' );
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
                'label' => esc_html__( 'Faq Left Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default' => esc_html__( 'faq-area default-padding bg-gray', 'tanda-core' ),
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
            'faq1_title',
            [
                'label'         => esc_html__( 'Title','tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq1_des',
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
                'title_field' => '{{{ faq1_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'form1_section',
            [
                'label' => esc_html__( 'Form Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'ftitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'fdes', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contactform_shortcode',
            [
                'label'         => esc_html__( 'Contact Form Shortcode', 'dustra-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'rows'          => 2,
                'placeholder'   => esc_html__( 'Put your shortcode Here', 'dustra-core' ),
            ]

        );

        $this->end_controls_section();

        $this->start_controls_section(
            'design_option1',
            [
                'label'         => esc_html__( 'Content Style Left','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'         => esc_html__( 'Title Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .faq-area .info > h5'=> 'color: {{VALUE}}',
                    '{{WRAPPER}} .faq-area .info > h5::after'=> 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'title_ty',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-area .info > h5',
            ]
        );

        $this->add_control(
            'h_color',
            [
                'label'         => esc_html__( 'Heading Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .faq-area .info h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'h_ty',
                'label'         => esc_html__( 'Heading Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-area .info h2',
            ]
        );

        $this->add_control(
            'bt_color',
            [
                'label'         => esc_html__( 'Button Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .faq-area .info a.btn'=> 'background-color: {{VALUE}};border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btt_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .faq-area .info a.btn'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'btt_ty',
                'label'         => esc_html__( 'Button Text Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-area .info a.btn',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'design_option2',
            [
                'label'         => esc_html__( 'Content Style Right','tanda-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_faq',
            [
                'label'         => esc_html__( 'Title Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .faq-area .faq-content .card .card-header h4'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'title_faq1_ty',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-area .faq-content .card .card-header h4',
            ]
        );

        $this->add_control(
            'des_faq',
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
                'name'          => 'des_faq1_ty',
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

        $faq1_output = $this->get_settings_for_display(); 
        $faq1_box = $faq1_output['list_two'];
       ?>

       <!-- Star About Area
============================================= -->
<div class="<?php echo esc_html($faq1_output['class']); ?>">
<div class="container">
<div class="row">

<div class="col-lg-6 info wow fadeInLeft">
    <h2><?php echo esc_html($faq1_output['title']); ?></h2>
    <p>
        <?php echo esc_html($faq1_output['des']); ?>
    </p>
    <div class="faq-content accordion" id="accordionExample">
    <?php 
          $counter = 0;
          if(!empty($faq1_box)):
          foreach ($faq1_box as $faq1_box1) :
    ?>
        <div class="card">
                    <div class="card-header" id="<?php echo esc_attr($faq1_box1['heading_id']);?>">
                        <h4 class="mb-0" data-toggle="collapse" data-target="#<?php echo esc_attr($faq1_box1['cl_id']);?>" aria-expanded="true" aria-controls="<?php echo esc_attr($faq1_box1['cl_id']);?>">
                            <?php echo esc_html($faq1_box1['faq1_title']);?>
                        </h4>
                    </div>

                    <div id="<?php echo esc_attr($faq1_box1['cl_id']);?>" class="collapse <?php if($counter == 0){echo esc_attr("show");}?>" aria-labelledby="<?php echo esc_attr($faq1_box1['heading_id']);?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                <?php echo esc_html($faq1_box1['faq1_des']);?>
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
<div class="form col-lg-5 offset-lg-1">
    <div class="appoinment-form wow fadeInUp">
        <div class="heading">
            <h4><?php echo esc_html($faq1_output['ftitle']); ?></h4>
            <p>
                <?php echo esc_html($faq1_output['fdes']); ?>
            </p>
        </div>
        <?php echo do_shortcode($faq1_output['contactform_shortcode']);?>
    </div>
</div>

</div>
</div>
</div>
<!-- End About Area -->

    <?php 
}

}