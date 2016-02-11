<?php

/**
 * Googlefont Widget
 */

class Webulous_Googlefont_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'googlefont-widget', // Base ID
			__('Googlefont', 'flatonpro'), // Name
			array( 'description' => __( 'Googlefont Widget', 'flatonpro' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'font_family' => 'Lato',
			'size' => '1em',
			'weights' => '',
			'weight' => '',
			'content' => '',
		) );

		$output = '';
		$output .= '[googlefont font_family="'.$instance['font_family'].'" size="'.$instance['size'].'" weights="'.$instance['weights'].'" weight="'.$instance['weight'].'"]'.$instance['content'].'[/googlefont]';
		echo do_shortcode($output );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'font_family' => 'Lato',
			'size' => '1em',
			'weights' => '',
			'weight' => '',
			'content' => '',
		) );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('font_family') ?>"><?php _e('Google Font Family Name', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('font_family') ?>" name="<?php echo $this->get_field_name('font_family') ?>" value="<?php echo esc_attr($instance['font_family']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('size') ?>"><?php _e('Size', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('size') ?>" name="<?php echo $this->get_field_name('size') ?>" value="<?php echo esc_attr($instance['size']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('weights') ?>"><?php _e('Font Weight (comma separate format. ex. 400,600)', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('weights') ?>" name="<?php echo $this->get_field_name('weights') ?>" value="<?php echo esc_attr($instance['weights']) ?>" />
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id('weight') ?>"><?php _e('Font Weight to use', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('weight') ?>" name="<?php echo $this->get_field_name('weight') ?>" value="<?php echo esc_attr($instance['weight']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content') ?>"><?php _e('Content', 'flatonpro') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('content') ?>" name="<?php echo $this->get_field_name('content') ?>"><?php echo esc_attr($instance['content']) ?></textarea>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

} // class Foo_Widget