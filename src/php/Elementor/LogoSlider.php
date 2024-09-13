<?php
/**
 * Logo slider elementor widget.
 *
 * @package iwpdev/mynonprofitadvisor
 */

namespace Iwpdev\Mynonprofitadvisor\Elementor;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 * LogoSlider class file.
 */
class LogoSlider extends Widget_Base {

	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
	}

	/**
	 * Get name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'logo_slider';
	}

	/**
	 * Get widget title.
	 *
	 * @return string|null
	 */
	public function get_title() {
		return __( 'Logo slider', 'hello-elementor' );
	}

	/**
	 * Get icon
	 *
	 * @return string
	 */
	public function get_icon(): string {
		return 'eicon-slider-3d';
	}

	/**
	 * Get category.
	 *
	 * @return string[]
	 */
	public function get_categories(): array {
		return [ 'general' ];
	}

	/**
	 * Add fields in element.
	 *
	 * @return void
	 */
	protected function _register_controls(): void {
		$repeater = new Repeater();
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'hello-elementor' ),
			]
		);

		$repeater->add_control(
			'logo_image',
			[
				'label'   => __( 'Choose Image', 'hello-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'logo_images',
			[
				'label'   => __( 'Logo List', 'hello-elementor' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render in front-end.
	 *
	 * @return void
	 */
	protected function render() {
		$settings = (object) $this->get_settings_for_display();

		include get_stylesheet_directory() . '/template/LogoSlider/template.php';
	}
}
