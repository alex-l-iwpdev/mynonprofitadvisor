<?php
/**
 * LogoSlider template.
 *
 * @package iwpdev/mynonprofitadvisor
 */

$logos = $settings->logo_images;
if ( ! empty( $logos ) ) {
	?>
	<div class="logo-slider">
		<?php foreach ( $logos as $logo ) { ?>
			<div class="logo-item">
				<img
						src="<?php echo esc_url( $logo['logo_image']['url'] ); ?>"
						alt="<?php echo esc_html( get_the_title( $logo['logo_image']['id'] ) ); ?>">
			</div>
		<?php } ?>
	</div>

	<style>
		.logo-slider .slick-track {
			display: flex;
			flex-direction: row;
			flex-wrap: nowrap;
		}

		.logo-slider .logo-item {
			height: inherit;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}

		.logo-slider .logo-item img {
			height: 90px;
			width: 100%;
			object-fit: contain;
		}
	</style>

	<script>
		jQuery( document ).ready( function( $ ) {
			$( '.logo-slider' ).slick( {
				slidesToShow: 8,
				arrows: false,
				autoplay: true,
				autoplaySpeed: 2000,
				cssEase: 'linear',
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
						}
					} ]
			} );
		} );
	</script>
	<?php
} else {
	sprintf( '<p>%s</p>', esc_html__( 'Set logos', 'hello-elementor-child' ) );
}
