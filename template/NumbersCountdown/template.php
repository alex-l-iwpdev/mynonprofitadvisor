<?php
/**
 * NumbersCountdown template.
 *
 * @package iwpdev/mynonprofitadvisor
 */

?>
<ul class="numbers-items">
	<li>
		<span
				class="counter"
				data-count="<?php echo esc_attr( $settings->count ); ?>"
				data-before="<?php echo esc_attr( $settings->currency_symbol ); ?>"
				data-after="<?php echo esc_attr( $settings->after_number ); ?>">0 </span>
		<?php echo esc_html( $settings->description ); ?>
	</li>
</ul>
<style>
	.numbers-items {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		gap: 20px;
		padding-left: 0;

	}

	.numbers-items li {
		display: flex;
		list-style: none;
		flex-direction: column;
		color: #1C7C89;
		background-color: #FFD154;
		border-radius: 8px;
		border: 2px solid #1C7C89;
		padding: 0 30px;
		font-size: 20px;
		font-weight: 600;
		box-shadow: 10px 10px 0 0 #1C1C1C;
		line-height: 30px;
	}

	.numbers-items span {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		font-size: 40px;
		font-weight: 700;
		line-height: 60px;
		gap: 5px;
	}

	.numbers-items span[data-before]:before,
	.numbers-items span[data-after]:after {
		position: relative;
		display: inline-block;
	}

	.numbers-items span[data-before]:before {
		content: attr(data-before);
	}

	.numbers-items span[data-after]:after {
		content: attr(data-after);
	}
</style>
<script>
	jQuery( document ).ready( function( $ ) {
		$( '.counter' ).each( function() {
			var $this = $( this ),
				countTo = $this.attr( 'data-count' );
			$( { countNum: $this.text() } ).animate( {
				countNum: countTo
			}, {
				duration: 3000,
				easing: 'linear',
				step: function step() {
					$this.text( Math.floor( this.countNum ) );
				},
				complete: function complete() {
					$this.text( this.countNum );
				}
			} );
		} );
	} );
</script>
