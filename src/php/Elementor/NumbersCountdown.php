<?php
/**
 * Numbers Countdown elementor widget.
 *
 * @package iwpdev/mynonprofitadvisor
 */

namespace Iwpdev\Mynonprofitadvisor\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * NumbersCountdown class file.
 */
class NumbersCountdown extends Widget_Base {

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
		return 'numbers_countdown';
	}

	/**
	 * Get widget title.
	 *
	 * @return string|null
	 */
	public function get_title() {
		return __( 'Numbers Countdown', 'hello-elementor' );
	}

	/**
	 * Get icon
	 *
	 * @return string
	 */
	public function get_icon(): string {
		return 'eicon-counter-circle';
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
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'hello-elementor' ),
			]
		);

		$this->add_control(
			'count',
			[
				'label'       => esc_html__( 'Count number', 'hello-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Set a count number', 'hello-elementor' ),
			]
		);

		$this->add_control(
			'currency_symbol',
			[
				'label'       => esc_html__( 'Currency Symbol', 'hello-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Set a currency symbol', 'hello-elementor' ),
			]
		);

		$this->add_control(
			'after_number',
			[
				'label'       => esc_html__( 'After number', 'hello-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Set a after number', 'hello-elementor' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'hello-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Set a description', 'hello-elementor' ),
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

		include get_stylesheet_directory() . '/template/NumbersCountdown/template.php';
	}
}
