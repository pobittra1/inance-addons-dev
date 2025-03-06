<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class footerSection_Widget extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'footerSection';
    }

    public function get_title(): string
    {
        return esc_html__('Footer Section', 'footerSection-widget');
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

        $this->add_control(
            'footer_text',
            [
                'label' => esc_html__('Footer Text', 'footerSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Free Html Templates', 'footerSection-widget'),
            ]
        );
        $this->end_controls_section();
    }

    protected function render(): void
    {

        // data
        $settings = $this->get_settings_for_display();
        $footer_text = $settings['footer_text'];


?>

        <!-- footer section -->
        <footer class="footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayDateYear"></span> All Rights Reserved By
                    <a href="https://html.design/"><?php echo esc_html($footer_text); ?></a>
                </p>
            </div>
        </footer>
        <!-- footer section -->


<?php
    }
}
