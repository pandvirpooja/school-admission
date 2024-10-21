<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Tanda blog Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_tanda_blog_Widget extends \Elementor\Widget_Base {

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
        return 'blog';
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
        return esc_html__( 'Blog Section', 'tanda-core' );
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
                'label' => esc_html__( 'Blog Section', 'tanda-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'class',[
                'label'         => esc_html__( 'Class', 'tanda-core' ),
                'default'         => esc_html__( 'blog-area content-less default-padding bottom-less', 'tanda-core' ),
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
            'sub', [
                'label'         => esc_html__( ' Sub Title', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'slug', [
                'label'         => esc_html__( 'Category Slug', 'tanda-core' ),
                'description' => esc_html__( 'Display Three Latest Post From Category or Leave empty to display three latest post', 'tanda-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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
            'title-co',
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
                'name'          => 'title-ty',
                'label'         => esc_html__( 'Title Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h4',
            ]
        );

        $this->add_control(
            'title-co1',
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
                'name'          => 'title-ty1',
                'label'         => esc_html__( 'Sub Typography', 'tanda-core' ),
                'selector'      => 
                    '{{WRAPPER}} .site-heading h2',
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

        $blog_output = $this->get_settings_for_display(); ?>

        <!-- Start Blog 
    ============================================= -->
    <div class="<?php echo esc_html($blog_output['class']); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                         <h4><?php echo esc_html($blog_output['title']); ?></h4>
                        <h2><?php echo esc_html($blog_output['sub']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="blog-items">
                <div class="row"> 

                     <?php if (empty($blog_output['slug'])) {
        $qry_args = array(
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
      );
    }
            else {
        $qry_args = array(
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
        'category_name' => $blog_output['slug'],
    ); }

    $qry = new WP_Query( $qry_args );

    if( $qry->have_posts() ) {

                while ( $qry->have_posts() ) : $qry->the_post(); ?>

<div class="col-lg-4 col-md-6 single-item">
    <div class="item wow fadeInUp">
        <div class="thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('tanda-blog-sidebar'); ?>
            </a>
        </div>
        <div class="info">
            <div class="meta">
                <ul>
                    <li><i class="fas fa-calendar-alt"></i> <?php the_time('F j Y'); ?></li>
                    <li><i class="fas fa-user"></i><?php echo get_the_author_link() ?></li>
                </ul>
            </div>
            <h4>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
                <?php the_excerpt(); ?>
            <a class="btn-simple" href="<?php the_permalink(); ?>"><?php esc_html_e ('Read More','tanda' ); ?> <i class="fas fa-angle-right"></i></a>
        </div>
    </div>
</div>
<?php
                endwhile;
                
                //Reset Post Data
                wp_reset_postdata(); } ?>
    

   </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <?php }

}