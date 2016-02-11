<?php
/**
 * Simple Widget that displays a single image
 */

class Webulous_Image_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'webulous-image-widget',
			__( 'Image', 'flatonpro' ),
			array(
				'description' => __( 'Displays a single image.', 'flatonpro' ),
			)
		);
	}

	function widget( $args, $instance ) {
		echo $args['before_widget'];
		if(!empty($instance['href'])) echo '<a href="' . $instance['href'] . '">';
		echo '<img src="'.esc_url($instance['src']).'" />';
		if(!empty($instance['href'])) echo '</a>';
		echo $args['after_widget'];
	}

	function form( $instance ) {
		$instance = wp_parse_args($instance, array(
			'src' => '',
			'href' => '',
		));

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'src' ) ?>"><?php _e( 'Image URL', 'flatonpro' ) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'src' ) ?>" name="<?php echo $this->get_field_name( 'src' ) ?>" value="<?php echo esc_attr($instance['src']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'href' ) ?>"><?php _e( 'Destination URL', 'flatonpro' ) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'href' ) ?>" name="<?php echo $this->get_field_name( 'href' ) ?>" value="<?php echo esc_attr($instance['href']) ?>" />
		</p>
	<?php
	}

	function update($new, $old){
		$new = wp_parse_args($new, array(
			'src' => '',
			'href' => '',
		));
		return $new;
	}
}
