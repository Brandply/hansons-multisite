<?php
/**
 * Social Networks Widget.
 *
 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_Social_Networks_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'social-networks-widget', // Base ID
			__('Social Networks', 'flatonpro'), // Name
			array( 'description' => __( 'Displays social networks', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		
		$instance = wp_parse_args( $instance, array(
			'title' => __("Social Networks", 'flatonpro'),
		) );

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo do_shortcode('[social_networks]'); 

		echo $args['after_widget'];
	}

	/**
	 * Display the skill widget form.
	 *
	 * @param array $instance
	 * @return string|void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'title' => __("Social Networks", 'flatonpro'),
		) );
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
		</p>
		<p>Enter your social network URLs using Theme Options Panel</p>

	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
