<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda about4 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_about4_Widget extends \Elementor\Widget_Base {

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
        return 'about4';
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
        return esc_html__( 'About4 Section', 'tanda-core' );
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
            'content_section',
            [
                'label' => esc_html__( 'About 4 Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heroimg',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
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
        
         $this->add_control(
            'icon', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tabtitle', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Tab Title', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Tab Title', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ tabtitle }}}',
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'tabdes', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Tab Content', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Tab Content', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ tabdes }}}',
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

        $about3_output = $this->get_settings_for_display(); ?>

         <!-- Star About Area
============================================= -->
<div class="about-content-area bg-gray default-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="thumb">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $about3_output['heroimg']['id'], 'full' ));?>" alt="Thumb">
                    <div class="overlay">
                        <div class="icon">
                            <i class="<?php echo esc_html($about3_output['icon']);?>"></i>
                        </div>
                        <div class="content">
                            <h4><?php echo esc_html($about3_output['title']);?></h4>
                            <p>
                               <?php echo esc_html($about3_output['sub']);?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 info">
                <h2><?php echo esc_html($about3_output['heading']);?></h2>
                <p>
                    <?php echo esc_html($about3_output['des']);?> 
                </p>
                <div class="content-tabs">
                    <ul id="tabs" class="nav nav-tabs">

                <?php 
                  $counter = 1;
                  if(!empty($about3_output['list1'])):
                  foreach ($about3_output['list1'] as $about3_tabtitle) :
                ?>

                <li class="nav-item">
                    <a href="" data-target="#tab<?php echo esc_html($counter);?>" data-toggle="tab" class="<?php if($counter == 1){echo esc_attr("active");}?> nav-link"><?php echo esc_html($about3_tabtitle['tabtitle']);?></a>
                </li>

                 <?php 
                    $counter++;
                    endforeach; endif;
                ?>

                 </ul>
                    <div id="tabsContent" class="tab-content wow fadeInUp" data-wow-delay="0.5s">

                <?php 
                  $counter1 = 1;
                  if(!empty($about3_output['list2'])):
                  foreach ($about3_output['list2'] as $about3_tabdes) :
                ?>

                <div id="tab<?php echo esc_html($counter1);?>" class="tab-pane fade active <?php if($counter1 == 1){echo esc_attr("show");}?>">
                    <p>
                        <?php echo esc_html($about3_tabdes['tabdes']);?>
                    </p>
                </div>

                <?php 
                    $counter1++;
                    endforeach; endif;
                ?>

                 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->


    <?php }

}