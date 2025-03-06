<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class professionalSection_Widget extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'professionalSection';
    }

    public function get_title(): string
    {
        return esc_html__('Professional Section', 'professionalSection-widget');
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
            'professional_img',
            [
                'label' => esc_html__('Choose Image for professional section', 'professionalSection-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // add title control
        $this->add_control(
            'professional_title',
            [
                'label' => esc_html__('Title', 'professionalSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('     We Provide Professional Home professionals.', 'professionalSection-widget'),
            ]
        );

        // add description control
        $this->add_control(
            'professional_desc',
            [
                'label' => esc_html__('Description', 'professionalSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__("randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All randomised words which don't look even slightly", 'professionalSection-widget'),
            ]
        );
        // add button link control

        $this->add_control(
            'professional_button_link',
            [
                'label' => esc_html__('Button Link', 'professionalSection-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'professionalSection-widget'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render(): void
    {

        // data
        $settings = $this->get_settings_for_display();
        $professional_img = $settings['professional_img'];
        $professional_title = $settings['professional_title'];
        $professional_desc = $settings['professional_desc'];
        $professional_button_link = $settings['professional_button_link'];


?>

        <!-- professional section -->
        <section class="professional_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="<?php echo esc_url($professional_img['url']); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="detail-box">
                            <h2>
                                <?php echo esc_html($professional_title); ?>
                            </h2>
                            <p>
                                <?php echo esc_html($professional_desc); ?>
                            </p>
                            <a href="">
                                <?php echo esc_url($professional_button_link['url']); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
