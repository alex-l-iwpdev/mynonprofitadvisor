<?php
/**
 * Main class file.
 *
 * @package iwpdev/mynonprofitadvisor
 */

namespace Iwpdev\Mynonprofitadvisor;

use Elementor\Plugin;
use Iwpdev\Mynonprofitadvisor\Elementor\Accordion;
use Iwpdev\Mynonprofitadvisor\Elementor\LogoSlider;
use Iwpdev\Mynonprofitadvisor\Elementor\NumbersCountdown;
use Tryperion\Theme\Elementor\Map;

/**
 * Main class.
 */
class Main {

	/**
	 * Theme version.
	 */
	const HLC_VERSION = '1.0.0';

	/**
	 * Main construct.
	 */
	public function __construct() {

		$this->init();
	}

	/**
	 * Init action and filter.
	 *
	 * @return void
	 */
	private function init(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'add_scripts_and_styles' ] );
		add_action( 'init', [ $this, 'add_elementor_widgets' ] );
	}

	/**
	 * Add script and style.
	 *
	 * @return void
	 */
	public function add_scripts_and_styles(): void {
		$url = get_stylesheet_directory_uri();
		$min = '.min';

		if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
			$min = '';
		}

		wp_enqueue_script( 'hlc_slick', $url . '/assets/js/slick.min.js', [ 'jquery' ], self::HLC_VERSION, true );
		wp_enqueue_script( 'hlc_main', $url . '/assets/js/main' . $min . '.js', [ 'jquery' ], self::HLC_VERSION, true );
		wp_enqueue_style( 'hlc_slick_theme', $url . '/assets/css/slick-theme' . $min . '.css', '', self::HLC_VERSION, true );
		wp_enqueue_style( 'hlc_slick', $url . '/assets/css/slick' . $min . '.css', '', self::HLC_VERSION, true );
		wp_enqueue_style( 'hlc_main', $url . '/assets/css/main' . $min . '.css', '', self::HLC_VERSION, true );
	}

	/**
	 * Init elementor widget.
	 *
	 * @return void
	 */
	public function add_elementor_widgets(): void {
		Plugin::instance()->widgets_manager->register( new NumbersCountdown() );
		Plugin::instance()->widgets_manager->register( new LogoSlider() );
		Plugin::instance()->widgets_manager->register( new Accordion() );
	}
}
