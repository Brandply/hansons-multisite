<?php

/**
 * Our Team Widget
 */

class Webulous_Ourteam_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ourteam-widget', // Base ID
			__('Our Team', 'flatonpro'), // Name
			array( 'description' => __( 'Our Team Widget', 'flatonpro' ), ) // Args
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
			'content' => '',
			'image_url' => '',
			'title' => '',
			'designation' => '',
			'linkedin' => '',
			'google' => '',
			'twitter' => '',
			'facebook' => ''
		) );

		$output = '';
		$output .= '[ourteam title="' . $instance['title'] .'" designation="';
		$output .= $instance['designation'] . '" image_url="' . $instance['image_url'];
		$output .= '" linkedin="' . $instance['linkedin'] . '" google="';
		$output .= $instance['google'] . '" twitter="' . $instance['twitter'];
		$output .= '" facebook="' . $instance['facebook'] . '"]';
		$output .= $instance['content'];
		$output .= '[/ourteam]';
		echo do_shortcode($output);
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
			'content' => '',
			'image_url' => '',
			'title' => '',
			'designation' => '',
			'linkedin' => '',
			'google' => '',
			'twitter' => '',
			'facebook' => ''
		) );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Name of Team Member', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('designation') ?>"><?php _e('Designation of Team Member', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('designation') ?>" name="<?php echo $this->get_field_name('designation') ?>" value="<?php echo esc_attr($instance['designation']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_url') ?>"><?php _e('Image URL of Team Member', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('image_url') ?>" name="<?php echo $this->get_field_name('image_url') ?>" value="<?php echo esc_attr($instance['image_url']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin') ?>"><?php _e('LinkedIn URL', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin') ?>" name="<?php echo $this->get_field_name('linkedin') ?>" value="<?php echo esc_attr($instance['linkedin']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google') ?>"><?php _e('Google Plus URL', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('google') ?>" name="<?php echo $this->get_field_name('google') ?>" value="<?php echo esc_attr($instance['google']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter') ?>"><?php _e('Twitter URL', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter') ?>" name="<?php echo $this->get_field_name('twitter') ?>" value="<?php echo esc_attr($instance['twitter']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook') ?>"><?php _e('Facebook URL', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook') ?>" name="<?php echo $this->get_field_name('facebook') ?>" value="<?php echo esc_attr($instance['facebook']) ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo esc_html( $instance['content'] ); ?></textarea>
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
		$instance = array();
		$allowed_tags = array(    
							'a' => array(
	        					'href' => array(),
    	    					'title' => array()
    					),
						    'em' => array(),
						    'strong' => array(),
						    'br' => array(),
						);

		$instance['content'] = ( ! empty( $new_instance['content'] ) ) ? wp_kses( $new_instance['content'], $allowed_tags ) : '';
		$instance['image_url'] = $new_instance['image_url'];
		$instance['title'] = $new_instance['title'];
		$instance['designation'] = $new_instance['designation'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['google'] = $new_instance['google'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];

		return $instance;
	}

} // class Foo_Widget
