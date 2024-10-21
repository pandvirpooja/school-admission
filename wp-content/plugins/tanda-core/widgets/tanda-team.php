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
class Elementor_tanda_team_Widget extends \Elementor\Widget_Base {

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
        return 'team';
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
        return esc_html__( 'Team Section', 'tanda-core' );
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
                'label' => esc_html__( 'Team Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default' => esc_html__( 'team-area default-padding bottom-less', 'tanda-core' ),
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
            'team_id', [
                'label'         => esc_html__( 'ID', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'name', [
                'label'         => esc_html__( 'Name', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         $repeater->add_control(
            'link',
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
            'job', [
                'label'         => esc_html__( 'Job', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'heading_social',
            [
                'label'         => esc_html__( 'Social Links', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::HEADING,
                'separator'     => 'before',
            ]
        );

        $repeater->add_control(
            'fb',
            [
                'label'         => esc_html__( 'FaceBook Url', 'tanda-core' ),
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
            'tw',
            [
                'label'         => esc_html__( 'Twitter Url', 'tanda-core' ),
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
            'instagram',
            [
                'label'         => esc_html__( 'Instagram Url', 'tanda-core' ),
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
                'label'     => esc_html__( 'Team Members', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Team Members', 'tanda-core' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
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
                    '{{WRAPPER}} .site-heading h4'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'title_typography',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h4',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'         => esc_html__( 'Sub Text Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .site-heading h2'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'subtitle_typography',
                'label'         => esc_html__( 'Sub Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h2',
            ]
        );

        $this->add_control(
            'n_color',
            [
                'label'         => esc_html__( 'Name Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .team-area .team-items .info h4'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'n_typography',
                'label'         => esc_html__( 'Name Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .team-area .team-items .info h4',
            ]
        );

        $this->add_control(
            'j_color',
            [
                'label'         => esc_html__( 'Job Color', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .team-area .team-items .info span'=> 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'j_typography',
                'label'         => esc_html__( 'Job Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .team-area .team-items .info span',
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

        $team_output = $this->get_settings_for_display(); ?>

        <!-- Start Team 
    ============================================= -->
    <div class="<?php echo esc_html($team_output['class']); ?>">
        <?php if(!empty($team_output['title'])):?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4><?php echo esc_html($team_output['title']); ?></h4>
                        <h2><?php echo esc_html($team_output['heading']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="team-items text-center">
                <div class="row">
        
        <?php 
            if(!empty($team_output['list'])):
            foreach ($team_output['list'] as $team_box):?>

            <!-- Sngle Item -->
            <div class="single-item col-lg-4 col-md-6">
                <div class="item">
                    <div class="thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $team_box['img1']['id'], 'full' ));?>" alt="Thumb">
                        <div class="social">
                            <input type="checkbox" id="<?php echo esc_attr($team_box['team_id']);?>" class="share-toggle" hidden>
                            <label for="<?php echo esc_attr($team_box['team_id']);?>" class="share-button">
                                <i class="fas fa-plus"></i>
                            </label>
                            <?php if(!empty($team_box['fb']['url'])):?>
                            <a href="<?php echo esc_url($team_box['fb']['url']);?>" class="share-icon facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <?php endif;?>
                            <?php if(!empty($team_box['tw']['url'])):?>
                            <a href="<?php echo esc_url($team_box['tw']['url']);?>" class="share-icon twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <?php endif;?>
                            <?php if(!empty($team_box['instagram']['url'])):?>
                            <a href="<?php echo esc_url($team_box['instagram']['url']);?>" class="share-icon instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                             <?php endif;?>
                        </div>
                    </div>
                    <div class="info">
                        <h4><a href="<?php echo esc_url($team_box['link']['url']);?>"><?php echo esc_html($team_box['name']);?></a></h4>
                        <span><?php echo esc_attr($team_box['job']);?></span>
                    </div>
                </div>
            </div>
                <!-- End Sngle Item -->

        <?php endforeach; endif;?>

        </div>
            </div>
        </div>
    </div>
    <!-- End Team Area -->

    <?php }

}