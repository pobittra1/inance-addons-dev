<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class serviceSection_Widget extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'serviceSection';
    }

    public function get_title(): string
    {
        return esc_html__('service Section', 'serviceSection-widget');
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
            'service_title',
            [
                'label' => esc_html__('Service Title', 'serviceSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Services', 'serviceSection-widget'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_card_title',
            [
                'label' => esc_html__('Service Card Title', 'serviceSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Maintenance', 'serviceSection-widget'),
            ]
        );

        $repeater->add_control(
            'service_card_desc',
            [
                'label' => esc_html__('Service Card Description', 'serviceSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal', 'serviceSection-widget'),
            ]
        );

        $repeater->add_control(
            'service_card_icon',
            [
                'label' => esc_html__('Service Card Icon', 'serviceSection-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'service_cards',
            [
                'label' => esc_html__('Service Cards', 'serviceSection-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_card_title' => esc_html__('Maintenance', 'serviceSection-widget'),
                        'service_card_desc' => esc_html__('when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal', 'serviceSection-widget'),
                        'service_card_icon' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
                    ],
                ],
                'title_field' => '{{{ service_card_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render(): void
    {

        // data
        $settings = $this->get_settings_for_display();
        $service_title = $settings['service_title'];
        $service_cards = $settings['service_cards'];




?>
        <!-- service section -->

        <section class="service_section layout_padding">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2><?php echo esc_html($service_title); ?></h2>
                </div>
                <div class="row">
                    <?php foreach ($service_cards as $card) : ?>
                        <div class="col-sm-6 col-md-4 mx-auto">
                            <div class="box">
                                <div class="img-box">
                                    <img src="<?php echo esc_url($card['service_card_icon']['url']); ?>" alt="" />
                                </div>
                                <div class="detail-box">
                                    <h5><?php echo esc_html($card['service_card_title']); ?></h5>
                                    <p><?php echo esc_html($card['service_card_desc']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="btn-box">
                    <a href="">
                        View More
                    </a>
                </div>
            </div>
        </section>

        <!-- end service section -->

<?php
    }
}
