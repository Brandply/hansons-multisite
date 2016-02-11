<?php
/**
 * Quote Widget.
 *
 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_Quote_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'quote-widget', // Base ID
			__('Quote', 'flatonpro'), // Name
			array( 'description' => __( 'Quote Widget', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'align' => 'none',
			'content' => '',
		) );

		if( !empty($instance['content']) ) {
			echo do_shortcode('[quote align="'.$instance['align'].'"]'.$instance['content'].'[/quote]');
		}
		echo $args['after_widget'];
	}

	/**
	 * Display the circle icon widget form.
	 *
	 * @param array $instance
	 * @return string|void
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( $instance, array(
			'align' => 'none',
			'content' => '',
		) );

		?>
		<p>
			<label for="<?php echo $this->get_field_id('align') ?>"><?php _e('Alignment of Pull Quote', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('align') ?>" name="<?php echo $this->get_field_name('align') ?>">
				<option value="none" <?php selected('none', $instance['align']) ?>><?php esc_html_e('None', 'flatonpro') ?></option>
				<option value="left" <?php selected('left', $instance['align']) ?>><?php esc_html_e('Left', 'flatonpro') ?></option>
				<option value="right" <?php selected('right', $instance['align']) ?>><?php esc_html_e('Right', 'flatonpro') ?></option>

			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content') ?>"><?php _e('Quote Content', 'flatonpro') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('content') ?>" name="<?php echo $this->get_field_name('content') ?>"><?php echo esc_html($instance['content']) ?></textarea>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
