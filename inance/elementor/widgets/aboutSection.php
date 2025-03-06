<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class aboutSection_Widget extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'aboutSection';
    }

    public function get_title(): string
    {
        return esc_html__('About Section', 'aboutSection-widget');
    }

    public function get_icon(): string
    {
        return 'eicon-banner';
    }

    public function get_categories(): array
    {
        return ['general'];
    }

    protected function register_controls(): void
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'heroSection-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // add image control
        $this->add_control(
            'about_img',
            [
                'label' => esc_html__('Choose Image for about section', 'heroSection-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        // add title control
        $this->add_control(
            'about_title',
            [
                'label' => esc_html__('Title', 'heroSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About us', 'heroSection-widget'),
            ]
        );

        // add description control
        $this->add_control(
            'about_desc',
            [
                'label' => esc_html__('Description', 'heroSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised', 'heroSection-widget'),
            ]
        );

        // add button text control
        $this->add_control(
            'about_button',
            [
                'label' => esc_html__('Button Text', 'heroSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'heroSection-widget'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(): void
    {

        // data
        $settings = $this->get_settings_for_display();
        $about_img = $settings['about_img'];
        $about_title = $settings['about_title'];
        $about_desc = $settings['about_desc'];
        $about_button = $settings['about_button'];

?>

        <!-- about section -->
        <section class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="detail-box">
                            <h2>
                                <?php echo esc_html($about_title); ?>
                            </h2>
                            <p>
                                <?php echo esc_html($about_desc); ?>
                            </p>
                            <a href="">
                                <?php echo esc_html($about_button); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="img-box">
                            <img src="<?php echo esc_url($about_img['url']); ?>" alt="About Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
