<?php
/**
 * Recent Work Widget.
 *
 * @package Abaris Pro
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_Recent_Work_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'recent-work-widget', // Base ID
			__('Recent Work', 'flatonpro'), // Name
			array( 'description' => __( 'Displays Recent Works', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, array(
			'title' => __( 'Recent Work', 'flatonpro' ),
			'type' => __( 'Carousel', 'flatonpro' ),
			'count' => 12,
		) );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if(  $instance['type'] == "carousel" ) {
			if(!empty($instance['count'])) : ?><?php echo do_shortcode('[recent_work count="' . $instance['count'] . '"]'); ?><?php endif;
		} else {
			if(!empty($instance['count'])) : ?><?php echo do_shortcode('[recent_work_isotope count="' . $instance['count'] . '"]'); ?><?php endif;
		}

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
			'title' => __( 'Recent Work', 'flatonpro' ),
			'type' => __( 'Carousel', 'flatonpro' ),
			'count' => 12,
		) );

	?>

		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('count') ?>"><?php _e('Work Count', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('count') ?>" name="<?php echo $this->get_field_name('count') ?>" value="<?php echo esc_attr($instance['count']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type') ?>"><?php _e('Type', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('type') ?>" name="<?php echo $this->get_field_name('type') ?>">
				<option value="carousel" <?php selected($instance['type'], "carousel") ?>>Carousel</option>
				<option value="isotope" <?php selected($instance['type'], "isotope") ?>>Isotope</option>
			</select>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
		$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';
		return $instance;
	}
}
