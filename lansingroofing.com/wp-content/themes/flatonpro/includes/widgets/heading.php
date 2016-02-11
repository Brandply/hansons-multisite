<?php
/**
 * Heading Widget.
 *
 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_Heading_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'heading-widget', // Base ID
			__('Heading', 'flatonpro'), // Name
			array( 'description' => __( 'Heading Widget', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'level' => '1',
			'type' => 'normal',
			'content' => '',
		) );

		if( !empty($instance['content']) ) {
			echo do_shortcode('[headline level="'.$instance['level'].'" type="'.$instance['type'].'"]'.$instance['content'].'[/headline]');
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
			'level' => '1',
			'type' => 'normal',
			'content' => '',
		) );

		?>
		<p>
			<label for="<?php echo $this->get_field_id('level') ?>"><?php _e('Level', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('level') ?>" name="<?php echo $this->get_field_name('level') ?>">
				<option value="1" <?php selected('1', $instance['level']) ?>><?php esc_html_e('Level 1', 'flatonpro') ?></option>
				<option value="2" <?php selected('2', $instance['level']) ?>><?php esc_html_e('Level 2', 'flatonpro') ?></option>
				<option value="3" <?php selected('3', $instance['level']) ?>><?php esc_html_e('Level 3', 'flatonpro') ?></option>
				<option value="4" <?php selected('4', $instance['level']) ?>><?php esc_html_e('Level 4', 'flatonpro') ?></option>
				<option value="5" <?php selected('5', $instance['level']) ?>><?php esc_html_e('Level 5', 'flatonpro') ?></option>
				<option value="6" <?php selected('6', $instance['level']) ?>><?php esc_html_e('Level 6', 'flatonpro') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type') ?>"><?php _e('Level', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('type') ?>" name="<?php echo $this->get_field_name('type') ?>">
				<option value="normal" <?php selected('normal', $instance['type']) ?>><?php esc_html_e('Normal', 'flatonpro') ?></option>
				<option value="separator" <?php selected('separator', $instance['type']) ?>><?php esc_html_e('Separator', 'flatonpro') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content') ?>"><?php _e('Heading', 'flatonpro') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('content') ?>" name="<?php echo $this->get_field_name('content') ?>"><?php echo ($instance['content']) ?></textarea>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
