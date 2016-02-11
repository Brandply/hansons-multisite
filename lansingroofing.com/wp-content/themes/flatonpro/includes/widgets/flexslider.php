<?php
/**
 * Flex Slider Widget.
 *
 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_FlexSlider_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'flexslider-widget', // Base ID
			__('Flex Slider', 'flatonpro'), // Name
			array( 'description' => __( 'Displays flexslider', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'slider' => '',
			'type' => 'slider',
		) );

		if(!empty($instance['slider'])) : ?><?php echo do_shortcode('[flexslider id="' . $instance['slider'] . '" type="' . $instance['type'] . '"]'); ?><?php endif;

		echo $args['after_widget'];
	}

	/**
	 * Display the flexslider widget form.
	 *
	 * @param array $instance
	 * @return string|void
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( $instance, array(
			'slider' => '',
			'type' => 'slider',
		) );
		?>

		<p>
			<label for="<?php echo $this->get_field_id('slider') ?>"><?php _e('Slider', 'flatonpro') ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('slider') ?>" name="<?php echo $this->get_field_name('slider') ?>" value="<?php echo esc_attr($instance['slider']) ?>">
				<?php
					$term_list = get_terms( 'flexslider_group' ); ///wp_get_post_terms(0, 'flexslider_group', array("fields" => "ids"));
					foreach($term_list as $term) : ?>
					<option value="<?php esc_attr_e($term->term_id); ?>" <?php selected($instance['slider'], $term->term_id) ?>><?php esc_html_e($term->name, 'flatonpro') ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type') ?>"><?php _e('Type', 'flatonpro') ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('type') ?>" name="<?php echo $this->get_field_name('type') ?>" value="<?php echo esc_attr($instance['type']) ?>">
				<option value="<?php esc_attr_e('slider'); ?>" <?php selected($instance['slider'], 'slider') ?>><?php esc_html_e('Slider', 'flatonpro') ?></option>
				<option value="<?php esc_attr_e('carousel'); ?>" <?php selected($instance['slider'], 'carousel') ?>><?php esc_html_e('Carousel', 'flatonpro') ?></option>
			</select>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
