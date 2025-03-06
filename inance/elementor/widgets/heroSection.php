<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class heroSection_Widget extends \Elementor\Widget_Base
{
	public function get_name(): string
	{
		return 'heroSection';
	}

	public function get_title(): string
	{
		return esc_html__('Hero Section', 'heroSection-widget');
	}

	public function get_icon(): string
	{
		return 'eicon-post';
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

		// for logo image control
		$this->add_control(
			'logo_image',
			[
				'label' => esc_html__('Logo Image', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => ['url' => ''],
			]
		);

		// for navbar repeater
		$this->add_control(
			'nav',
			[
				'label' => esc_html__('Navbar List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'nav_item',
						'label' => esc_html__('Nav Item', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('Nav Item 1', 'textdomain'),
						'label_block' => true,
					],
					[
						'name' => 'nav_url',
						'label' => esc_html__('Nav URL', 'textdomain'),
						'type' => \Elementor\Controls_Manager::URL,
					],
				],
				'default' => [
					[
						'nav_item' => esc_html__('nav_item #1', 'textdomain'),
					],
				],
				'nav_item_field' => '{{{ nav_item }}}',
			]
		);

		// for control hero title
		$this->add_control(
			'hero_title',
			[
				'label' => esc_html__('Hero Title', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Welcome to Our Website', 'heroSection-widget'),
				'label_block' => true,
			]
		);


		// for control hero desc
		$this->add_control(
			'hero_desc',
			[
				'label' => esc_html__('Hero Description', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'heroSection-widget'),
				'label_block' => true,
			]
		);
		// for hero button text
		$this->add_control(
			'hero_button_text',
			[
				'label' => esc_html__('Hero Button Text', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Contact Us', 'heroSection-widget'),
				'label_block' => true,
			]
		);

		// for hero button URL
		$this->add_control(
			'hero_button_url',
			[
				'label' => esc_html__('Hero Button URL', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'heroSection-widget'),
				'default' => [
					'url' => '',
				],
			]
		);

		// for hero button color
		$this->add_control(
			'hero_button_color',
			[
				'label' => esc_html__('Hero Button Color', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .hero_area .detail-box a' => 'background-color: {{VALUE}};',
				],
			]
		);
		// for hero image
		$this->add_control(
			'hero_image',
			[
				'label' => esc_html__('Hero Image', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => ['url' => ''],
			]
		);
		// for hero card repeater
		$this->add_control(
			'hero_cards',
			[
				'label' => esc_html__('Hero Cards', 'heroSection-widget'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'hero_card_icon',
						'label' => esc_html__('Hero Card Icon', 'heroSection-widget'),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-circle',
							'library' => 'fa-solid',
						],
						'recommended' => [
							'fa-solid' => [
								'circle',
								'dot-circle',
								'square-full',
							],
							'fa-regular' => [
								'circle',
								'dot-circle',
								'square-full',
							],
						],
					],
					[
						'name' => 'hero_card_title',
						'label' => esc_html__('Hero Card Title', 'heroSection-widget'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('Hero Card Title', 'heroSection-widget'),
						'label_block' => true,
					],
				],
				'default' => [
					[
						'hero_card_icon' => [
							'value' => 'fas fa-circle',
							'library' => 'fa-solid',
						],
						'hero_card_title' => esc_html__('Hero Card Title #1', 'heroSection-widget'),
					],
				],
				'title_field' => '{{{ hero_card_title }}}',
			]
		);
		$this->end_controls_section();
	}

	protected function render(): void
	{

		// data
		$settings = $this->get_settings_for_display();
		$logo_img = $settings['logo_img'];
		$nav = $settings['nav'];
		$hero_title = $settings['hero_title'];
		$hero_desc = $settings['hero_desc'];
		$hero_button_text = $settings['hero_button_text'];
		$hero_button_url = $settings['hero_button_url'];
		$hero_button_color = $settings['hero_button_color'];
		$hero_image = $settings['hero_image'];
		$hero_cards = $settings['hero_cards'];
?>

		<div class="hero_area">
			<!-- header section strats -->
			<header class="header_section">
				<div class="header_top">
					<div class="container-fluid">
						<div class="contact_nav">
							<a href="">
								<i class="fa fa-phone" aria-hidden="true"></i>
								<span>
									Call : +01 123455678990
								</span>
							</a>
							<a href="">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<span>
									Email : demo@gmail.com
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="header_bottom">
					<div class="container-fluid">
						<nav class="navbar navbar-expand-lg custom_nav-container ">
							<a class="navbar-brand" href="index.html">
								<span>
									<img src="<?php echo esc_url($logo_img['url']); ?>" alt="Logo">
								</span>
							</a>

							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class=""> </span>
							</button>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav">
									<?php foreach ($nav as $index => $item) : ?>
										<li class="nav-item <?php echo $index === 0 ? 'active' : ''; ?>">
											<a class="nav-link" href="#"><?php echo esc_html($item['nav_item']); ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</header>
			<!-- end header section -->
			<!-- slider section -->
			<section class="slider_section ">
				<div class="container ">
					<div class="row">
						<div class="col-md-6 ">
							<div class="detail-box">
								<h1><?php echo esc_html($hero_title); ?></h1>
								<p>
									<?php echo esc_html($hero_desc); ?>
								</p>
								<a href="<?php echo esc_url($hero_button_url['url']); ?>" style="background-color: <?php echo esc_attr($hero_button_color); ?>;">
									<?php echo esc_html($hero_button_text); ?>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="img-box">
								<img src="<?php echo esc_url($hero_image['url']); ?>" alt="Hero Image">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end slider section -->
		</div>

		<!-- feature section -->
		<section class="feature_section">
			<div class="container">
				<div class="feature_container">
					<?php foreach ($hero_cards as $card) : ?>
						<div class="box">
							<div class="img-box">
								<?php \Elementor\Icons_Manager::render_icon($card['hero_card_icon'], ['aria-hidden' => 'true']); ?>
							</div>
							<h5 class="name">
								<?php echo esc_html($card['hero_card_title']); ?>
							</h5>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<!-- end feature section -->

<?php
	}
}
