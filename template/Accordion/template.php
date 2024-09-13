<?php
/**
 * Accordion elementor widget.
 *
 * @package iwpdev/mynonprofitadvisor
 */

$faq_items = $settings->faqs;
if ( ! empty( $faq_items ) ) {
	?>
	<div class="accordion-items">
		<?php foreach ( $faq_items as $item ) { ?>
			<div class="accordion-item">
				<h4 class="arrow-down"><?php echo esc_html( $item['faq_title'] ); ?></h4>
				<div class="hide description">
					<?php echo wp_kses_post( wpautop( $item['faq_description'] ) ); ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<style>
		.accordion-items {
			display: flex;
			flex-direction: column;
			gap: 10px;
		}

		.accordion-item {
			background: #F7F1E8;
		}

		.accordion-item .description {
			padding: 20px 20px 10px 20px;
		}

		.accordion-item h4 {
			border-radius: 8px 8px 8px 8px;
			border: 2px solid #1C7C89;
			padding: 25px 20px 25px 20px;
			font-size: 16px;
			font-weight: 700;
			margin: 0;
			color: #1C7C89;
			display: flex;
			flex-direction: row;
			align-items: center;
			cursor: pointer;
			background: #fff;
		}

		.accordion-item .arrow-up {
			background-color: #FFD154;
			box-shadow: 10px 10px 0px 0px #1C1C1C;
		}

		.accordion-item .arrow-up:after,
		.accordion-item .arrow-down:after {
			content: '';
			width: 15px;
			height: 15px;
			margin-left: auto;
			background-size: contain;
		}

		.accordion-item .arrow-up:after {
			background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCAxMjggMTI4LjEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEyOCAxMjguMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgoJPHBhdGggZmlsbD0iIzFDN0M4OSIgZD0iTTI2LjksMC4xYzMxLjctMC4yLDYzLjMsMCw5NSwwLjVjMS44LDAuOCwzLjMsMiw0LjUsMy41YzEuNywzMi4yLDIsNjQuNiwxLDk3Yy0zLjQsNS4zLTguMyw3LjEtMTQuNSw1LjUKCQljLTMuMi0xLjYtNS40LTQuMS02LjUtNy41Yy0wLjMtMjAtMC43LTQwLTEtNjBjLTI4LjUsMjguNS01Nyw1Ny04NS41LDg1LjVjLTYuNCw0LjgtMTIuNSw0LjctMTguNS0wLjVjLTIuNC01LjctMS43LTExLjEsMi0xNgoJCWMyOC41LTI4LjUsNTctNTcsODUuNS04NS41Yy0yMC0wLjMtNDAtMC43LTYwLTFjLTguNC00LjEtMTAuMi0xMC4zLTUuNS0xOC41QzI0LjYsMS45LDI1LjcsMC45LDI2LjksMC4xeiIvPgo8L3N2Zz4K);
		}

		.accordion-item .arrow-down:after {
			background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjcuOTYgMTI4LjA2Ij48cGF0aCBmaWxsPSIjMUM3Qzg5IiBkPSJNMTY0LjY0LDE5MS40NHEtNDcuNDkuMjQtOTUtLjVhMTEuNjYsMTEuNjYsMCwwLDEtNC41LTMuNXEtMi40Ny00OC4zNy0xLTk3LDUuMTYtNy45NSwxNC41LTUuNWExMi4wOSwxMi4wOSwwLDAsMSw2LjUsNy41cS41MSwzMCwxLDYwbDg1LjUtODUuNXE5LjU2LTcuMjQsMTguNS41YTE1LjE2LDE1LjE2LDAsMCwxLTIsMTZsLTg1LjUsODUuNSw2MCwxcTEyLjU3LDYuMTMsNS41LDE4LjVBMzAuODMsMzAuODMsMCwwLDEsMTY0LjY0LDE5MS40NFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC02My41OSAtNjMuNDQpIi8+PC9zdmc+);
		}

		.accordion-item p {
			font-size: 16px;
			line-height: 24px;
			font-weight: 400;
			margin-bottom: 0.9rem;
		}

		.accordion-item p strong {
			font-weight: 700;
		}

		.accordion-item .hide {
			display: none;
		}
	</style>

	<script>
		jQuery( document ).ready( function( $ ) {
			$( '.accordion-item' ).click( function() {
				console.log( 'click' );
				var allMenu = $( '.accordion-item .hide' ),
					currMenu = $( this ).find( '.description' );
				if ( $( this ).find( 'h4' ).hasClass( 'arrow-up' ) ) {
					currMenu.slideUp( 300 );
					currMenu.addClass( 'hide' );
					$( this ).find( 'h4' ).removeClass( 'arrow-up' ).addClass( 'arrow-down' );
				} else {
					$( this ).find( 'h4' ).removeClass( 'arrow-down' ).addClass( 'arrow-up' );
					allMenu.slideUp( 300 );
					currMenu.slideDown( 300 );
					currMenu.removeClass( 'hide' );
				}
			} );
		} );
	</script>
	<?php
}

