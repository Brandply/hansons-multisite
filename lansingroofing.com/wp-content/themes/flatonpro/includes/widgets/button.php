<?php

/**
 * Button Widget
 */

class Webulous_Button_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'button-widget', // Base ID
			__('Button', 'flatonpro'), // Name
			array( 'description' => __( 'Button Widget', 'flatonpro' ), ) // Args
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
			'url' => '',
			'btntext' => '',
			'color' => '#ff0000',
			'size' => 'normal',
			'target' => '_blank'
		) );

		$output = '';

		$output .= '[button link="'.$instance['url'].'" target="'.$instance['target'].'" color="'.$instance['color'].'" size="'.$instance['size'].'"]'.$instance['btntext'].'[/button]';
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
			'url' => '',
			'btntext' => '',
			'color' => '#ff0000',
			'size' => 'normal',
			'target' => '_blank'
		) );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('btntext') ?>"><?php _e('Button Text', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('btntext') ?>" name="<?php echo $this->get_field_name('btntext') ?>" value="<?php echo esc_attr($instance['btntext']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url') ?>"><?php _e('Link URL', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('url') ?>" name="<?php echo $this->get_field_name('url') ?>" value="<?php echo esc_attr($instance['url']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('target') ?>"><?php _e('Link Target', 'flatonpro') ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('target') ?>" name="<?php echo $this->get_field_name('target') ?>" value="<?php echo esc_attr($instance['target']) ?>">
				<option value="_self" <?php selected($instance['target'], '_self') ?>>_self</option>
				<option value="_blank" <?php selected($instance['target'], '_blank') ?>>_blank</option>
			</select>
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id('size') ?>"><?php _e('Need size option?', 'flatonpro') ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('size') ?>" name="<?php echo $this->get_field_name('size') ?>" value="<?php echo esc_attr($instance['type']) ?>">
				<option value="mini" <?php selected($instance['size'], 'mini') ?>><?php _e('Mini','flatonpro'); ?></option>
				<option value="small" <?php selected($instance['size'], 'small') ?>><?php _e('Small','flatonpro'); ?></option>
				<option value="normal" <?php selected($instance['size'], 'normal') ?>><?php _e('Normal','flatonpro'); ?></option>
				<option value="large" <?php selected($instance['size'], 'large') ?>><?php _e('Large','flatonpro'); ?></option>
			</select>
		</p>	
		<p>
		<label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e( 'Button Color:' ); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id('color') ?>" name="<?php echo $this->get_field_name('color') ?>" value="<?php echo esc_attr($instance['type']) ?>">
				<option value="btn" <?php selected($instance['color'], 'btn') ?>><?php _e( 'Normal','flatonpro'); ?></option>
				<option value="blue" <?php selected($instance['color'], 'blue') ?>><?php _e( 'Blue','flatonpro'); ?></option>
				<option value="red" <?php selected($instance['color'], 'red') ?>><?php _e( 'Red','flatonpro'); ?></option>
				<option value="yellow" <?php selected($instance['color'], 'yellow') ?>><?php _e( 'Yellow','flatonpro'); ?></option>
				<option value="green" <?php selected($instance['color'], 'green') ?>><?php _e( 'Green','flatonpro'); ?></option>
				<option value="light-blue" <?php selected($instance['color'], 'light-blue') ?>><?php _e( 'Light Blue','flatonpro'); ?></option>
				<option value="black" <?php selected($instance['color'], 'black') ?>><?php _e( 'Black','flatonpro'); ?></option>
			</select>
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