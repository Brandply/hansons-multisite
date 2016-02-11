<?php
/**
 * Testimonial Widget.
 *
 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_Testimonial_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'testimonial-widget', // Base ID
			__('Testimonial', 'flatonpro'), // Name
			array( 'description' => __( 'Displays Testimonials', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {

		$instance = wp_parse_args( $instance, array(
			'title' => __( 'Testimonials', 'flatonpro' ),
			'count' => '5'
		) );

		$instance['title'] = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];


		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}

		if(!empty($instance['count'])) : ?><?php echo do_shortcode('[testimonial count="' . $instance['count'] . '"]'); ?><?php endif;

		echo $args['after_widget'];
	}

	/**
	 * Display the flexcount widget form.
	 *
	 * @param array $instance
	 * @return string|void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'title' => __( 'Testimonials', 'flatonpro' ),
			'count' => '5'
		) );
	?>

		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('count') ?>"><?php _e('No. of Testimonials', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('count') ?>" name="<?php echo $this->get_field_name('count') ?>" value="<?php echo esc_attr($instance['count']) ?>" />
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
		return $instance;
	}
}
