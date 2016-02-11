<?php
/**
 * Video Widget.
 *
 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_Video_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'video-widget', // Base ID
			__('Video', 'flatonpro'), // Name
			array( 'description' => __( 'Video Widget', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'type' => 'youtube',
			'video_id' => '',
			'width' => '',
			'height' => '',
		) );

		if( !empty($instance['video_id']) ) {
			echo do_shortcode('[video type="'.$instance['type'].'" video_id="'.$instance['video_id'].'" height="'.$instance['height'].'" width="'.$instance['width'].'"]');
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
			'type' => 'youtube',
			'video_id' => '',
			'width' => '',
			'height' => '',
		) );

		?>
		<p>
			<label for="<?php echo $this->get_field_id('video_id') ?>"><?php _e('Video ID', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('video_id') ?>" name="<?php echo $this->get_field_name('video_id') ?>" value="<?php echo esc_attr($instance['video_id']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('width') ?>"><?php _e('Width (Numerals only)', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('width') ?>" name="<?php echo $this->get_field_name('width') ?>" value="<?php echo esc_attr($instance['width']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('height') ?>"><?php _e('Height (Numerals Only)', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('height') ?>" name="<?php echo $this->get_field_name('height') ?>" value="<?php echo esc_attr($instance['height']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type') ?>"><?php _e('Show Comments', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('type') ?>" name="<?php echo $this->get_field_name('type') ?>">
				<option value="youtube" <?php selected('youtube', $instance['type']) ?>><?php esc_html_e('YouTube', 'flatonpro') ?></option>
				<option value="Vimeo" <?php selected('Vimeo', $instance['type']) ?>><?php esc_html_e('Vimeo', 'flatonpro') ?></option>
			</select>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
