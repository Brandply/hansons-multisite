<?php
/**
 * Image Box Widget.
 *
 * @package restaurant
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_Image_Box_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'image-box-widget', // Base ID
			__('Image Box', 'flatonpro'), // Name
			array( 'description' => __( 'A title and image with some text beneath it', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'title' => '',
			'text' => '',
			'image_url' => '',
			'more' => '',
			'more_url' => '',
		) );

		?>
		<div class="image-box">
			<?php if(!empty($instance['image_url'])) : ?><img src="<?php echo esc_attr($instance['image_url']) ?>" width="300" height="120" /><?php endif; ?>
			<?php if(!empty($instance['title'])) : ?><h4><?php echo esc_html($instance['title']) ?></h4><?php endif; ?>
			<?php if(!empty($instance['text'])) : ?><p class="text"><?php echo wp_kses_post($instance['text']) ?></p><?php endif; ?>	
            <?php if(!empty($instance['more_url']) && !empty($instance['more'])) : ?>
            <a href="<?php echo esc_url($instance['more_url']) ?>" class="more-button">
            	<?php echo $instance['more']; ?>
            </a>
        	<?php endif; ?>
		</div>
		<?php

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
			'title' => '',
			'text' => '',
			'image_url' => '',
			'more' => '',
			'more_url' => '',
		) );

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id('text') ?>"><?php _e('Text', 'flatonpro') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('text') ?>" name="<?php echo $this->get_field_name('text') ?>"><?php echo esc_attr($instance['text']) ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_url') ?>"><?php _e('Image URL', 'flatonpro') ?></label>
			<input type="image_url" class="widefat" id="<?php echo $this->get_field_id('image_url') ?>" name="<?php echo $this->get_field_name('image_url') ?>" value="<?php echo esc_attr($instance['image_url']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('more') ?>"><?php _e('More Text', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('more') ?>" name="<?php echo $this->get_field_name('more') ?>" value="<?php echo esc_attr($instance['more']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('more_url') ?>"><?php _e('More URL', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('more_url') ?>" name="<?php echo $this->get_field_name('more_url') ?>" value="<?php echo esc_attr($instance['more_url']) ?>" />
		</p>


		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
