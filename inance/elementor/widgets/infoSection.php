<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class infoSection_Widget extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'infoSection';
    }

    public function get_title(): string
    {
        return esc_html__('Info Section', 'infoSection-widget');
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
            'info_title',
            [
                'label' => esc_html__('Info Title', 'infoSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get In Touch', 'infoSection-widget'),
                'placeholder' => esc_html__('Enter your title', 'infoSection-widget'),
            ]
        );
        $this->add_control(
            'info_desc',
            [
                'label' => esc_html__('Info Description', 'infoSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem Ipsum is simply dummy text', 'infoSection-widget'),
                'placeholder' => esc_html__('Enter your description', 'infoSection-widget'),
            ]
        );

        $this->add_control(
            'info_number',
            [
                'label' => esc_html__('Info Number', 'infoSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+02 1234567890', 'infoSection-widget'),
                'placeholder' => esc_html__('Enter your number', 'infoSection-widget'),
            ]
        );

        $this->add_control(
            'info_gmail',
            [
                'label' => esc_html__('Info Gmail', 'infoSection-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('demo@gmail.com', 'infoSection-widget'),
                'placeholder' => esc_html__('Enter your email', 'infoSection-widget'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(): void
    {

        // data
        $settings = $this->get_settings_for_display();
        $info_title = $settings['info_title'];
        $info_desc = $settings['info_desc'];
        $info_number = $settings['info_number'];
        $info_gmail = $settings['info_gmail'];


?>
        <!-- info section -->
        <section class="info_section ">
            <div class="container">
                <h4>
                    <?php echo esc_html($info_title); ?>
                </h4>
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="info_items">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="">
                                        <div class="item ">
                                            <div class="img-box ">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </div>
                                            <p>
                                                <?php echo esc_html($info_desc); ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="">
                                        <div class="item ">
                                            <div class="img-box ">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div>
                                            <p>
                                                <?php echo esc_html($info_number); ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="">
                                        <div class="item ">
                                            <div class="img-box">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </div>
                                            <p>
                                                <?php echo esc_html($info_gmail); ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-box">
                <h4>
                    Follow Us
                </h4>
                <div class="box">
                    <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </section>
        <!-- end info_section -->


<?php
    }
}
