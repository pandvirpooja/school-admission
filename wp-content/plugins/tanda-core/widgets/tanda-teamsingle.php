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
class Elementor_tanda_teamsingle_Widget extends \Elementor\Widget_Base {

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
        return 'teamsingle';
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
        return esc_html__( 'Team Single Section', 'tanda-core' );
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
                'label' => esc_html__( 'Team Single Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'name', [
                'label'         => esc_html__( 'Name', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'job', [
                'label'         => esc_html__( 'Job', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'des',
            [
                'label'         => esc_html__( 'Description', 'dustra-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]

        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_class', [
                'label'         => esc_html__( 'Icon Class', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link',
            [
                'label'         => esc_html__( 'Icon Link', 'tanda-core' ),
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
                'label'     => esc_html__( 'Social Icon List', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_class }}}',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'basic_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'basic_des', [
                'label'         => esc_html__( 'Info', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Basic Info List', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ basic_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'About Member', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_des', [
                'label'         => esc_html__( 'Description', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'skill_title', [
                'label'         => esc_html__( 'Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'skill_per', [
                'label'         => esc_html__( 'Number', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Skill List', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ skill_title }}}',
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

        $teamsingle_output = $this->get_settings_for_display(); ?>


       <!-- Start Team 
    ============================================= -->
    <div class="team-single-area default-padding">
        <div class="container">
            <div class="top-info">
                <div class="row align-center">
                    <div class="col-lg-5 thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $teamsingle_output['img1']['id'], 'full' ));?>" alt="Thumb">
                    </div>
                    <div class="col-lg-7 content">
                        <h2><?php echo esc_html($teamsingle_output['name']); ?></h2>
                        <span><?php echo esc_html($teamsingle_output['job']); ?></span>
                        <p>
                            <?php echo esc_html($teamsingle_output['des']); ?>
                        </p>
                        <div class="social">
                            <ul>

            <?php 
            if(!empty($teamsingle_output['list'])):
            foreach ($teamsingle_output['list'] as $teamsingle_social):?>

                <li class="<?php echo esc_attr($teamsingle_social['class']);?>">
                    <a href="<?php echo esc_url($teamsingle_social['icon_link']['url']);?>">
                        <i class="<?php echo esc_attr($teamsingle_social['icon_class']);?>"></i>
                    </a>
                </li>

             <?php endforeach; endif;?>

             </ul>
                        </div>

                        <ul class="basic-info">
            <?php 
            if(!empty($teamsingle_output['list1'])):
            foreach ($teamsingle_output['list1'] as $teamsingle_info):?>

                            <li>
                                <strong><?php echo esc_html($teamsingle_info['basic_title']);?> </strong> <span><?php echo esc_html($teamsingle_info['basic_des']);?></span>
                            </li>

                            <?php endforeach; endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottom-info">
                <div class="row">
                    <div class="col-lg-6">
                        <h2><?php echo esc_html($teamsingle_output['about_title']); ?></h2>
                        <p>
                            <?php echo esc_html($teamsingle_output['about_des']); ?>
                        </p>
                    </div>
                    <div class="col-lg-6 about-area reverse">
                        <div class="info">
                            <div class="skill-items">
                                <!-- Progress Bar Start -->

            <?php 
            if(!empty($teamsingle_output['list2'])):
            foreach ($teamsingle_output['list2'] as $teamsingle_skill):?>

                                <div class="progress-box">
                                    <h5><?php echo esc_html($teamsingle_skill['skill_title']); ?></h5>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" data-width="<?php echo esc_html($teamsingle_skill['skill_per']); ?>">
                                             <span><?php echo esc_html($teamsingle_skill['skill_per']); ?>%</span>
                                        </div>
                                    </div>
                                </div>

             <?php endforeach; endif;?>
                                
                                <!-- End Progressbar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team -->

    <?php }

}