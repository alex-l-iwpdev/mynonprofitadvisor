<?php
/**
 * Accordion elementor widget.
 *
 * @package iwpdev/mynonprofitadvisor
 */

namespace Iwpdev\Mynonprofitadvisor\Elementor;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

class Accordion extends Widget_Base {

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
		return 'accordion_widget';
	}

	/**
	 * Get widget title.
	 *
	 * @return string|null
	 */
	public function get_title() {
		return __( 'FAQ', 'hello-elementor' );
	}

	/**
	 * Get icon
	 *
	 * @return string
	 */
	public function get_icon(): string {
		return 'eicon-accordion';
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
			'faq_title',
			[
				'label' => __( 'Title', 'hello-elementor' ),
				'type'  => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'faq_description',
			[
				'label' => __( 'Description', 'hello-elementor' ),
				'type'  => Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'faqs',
			[
				'label'   => __( 'FAQ', 'hello-elementor' ),
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

		include get_stylesheet_directory() . '/template/Accordion/template.php';
	}
}
