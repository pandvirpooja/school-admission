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
class Elementor_tanda_about5_Widget extends \Elementor\Widget_Base {

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
        return 'about5';
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
        return esc_html__( 'Home Nine About Section', 'tanda-core' );
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
                'label' => esc_html__( 'About Left Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
            'heroimg1',
            [
                'label'     => esc_html__( 'Image 2', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'text', [
                'label'         => esc_html__( 'Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'textbold', [
                'label'         => esc_html__( 'Bold Text', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'liconclass', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'liconlink',
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
                'label' => esc_html__( 'About Right Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->add_control(
            'des2', [
                'label'         => esc_html__( 'Block Quote', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
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

        $about5_output = $this->get_settings_for_display(); ?>

         <!-- Star About Area
============================================= -->
<div class="about-standard-area overflow-hidden default-padding">
    <!-- Fixed Shape -->
    <div class="fixed-shape">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about5_output['bgimg']['id'], 'full' ));?>" alt="Shape">
    </div>
    <!-- End Fixed Shape -->
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <div class="thumb">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $about5_output['heroimg']['id'], 'full' ));?>" alt="Thumb">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $about5_output['heroimg1']['id'], 'full' ));?>" alt="Thumb">
                    <div class="overlay">
                        <div class="video">
                            <a class="popup-youtube theme relative video-play-button" href="<?php echo esc_url($about5_output['liconlink']['url']);?>">
                                <i class="<?php echo esc_html($about5_output['liconclass']);?>"></i>
                            </a>
                        </div>
                        <div class="content">
                            <h4><?php echo esc_html($about5_output['text']);?><strong><?php echo esc_html($about5_output['textbold']);?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 info">
                <h5><?php echo esc_html($about5_output['title']);?></h5>
                <h2><?php echo esc_html($about5_output['heading']);?></h2>
                <p>
                    <?php echo esc_html($about5_output['des']);?> 
                </p>
                <blockquote>
                    <?php echo esc_html($about5_output['des2']);?>
                </blockquote>
                <a class="btn btn-theme effect btn-md" href="<?php echo esc_url($about5_output['btlink']['url']);?>"><?php echo esc_html($about5_output['bttext']);?></a>
            </div>
        </div>
    </div>
</div>
<!-- End About Area -->



    <?php }

}