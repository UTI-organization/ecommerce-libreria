<?php
/**
 * Extend WP_Customize_Control to add the slider control.
 *
 * Class Libreria_Slider_Control
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to extend WP_Customize_Control to add the slider customize control.
 *
 * Class Libreria_Slider_Control
 */
class Libreria_Slider_Control extends Libreria_Customize_Base_Additional_Control {

	/**
	 * Control's Type.
	 *
	 * @var string
	 */
	public $type = 'libreria-slider';

	/**
	 * Suffix for slider.
	 *
	 * @var string
	 */
	public $suffix = '';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value'] = $this->value();

		$this->json['link']        = $this->get_link();
		$this->json['id']          = $this->id;
		$this->json['label']       = esc_html( $this->label );
		$this->json['description'] = $this->description;

		$this->json['suffix'] = $this->suffix;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 */
	protected function content_template() {
		?>

		<div class="customizer-text">
			<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>

			<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</div>

		<div class="slider-wrapper <# if ( data.description ) { #>slider-description<# } #>">
			<input {{{ data.inputAttrs }}}
				   type="range"
				   value="{{ data.value }}"
				   data-reset_value="{{ data.default }}"
			/>

			<div class="libreria-range-value">
				<input type="number"
					   data-name="{{ data.name }}"
					   class="value libreria-range-input"
					   {{{ data.link }}}
					   value="{{ data.value }}"
					   {{{ data.inputAttrs }}}
				>
				<# if ( data.suffix ) { #>
				<span class="libreria-range-unit">{{ data.suffix }}</span>
				<# } #>
			</div>

			<div class="libreria-slider-reset">
				<span class="dashicons dashicons-image-rotate libreria-control-tooltip"
					  title="<?php esc_attr_e( 'Back to default', 'libreria' ); ?>"
				>
				</span>
			</div>
		</div>

		<?php
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 */
	public function render_content() {
	}

}
