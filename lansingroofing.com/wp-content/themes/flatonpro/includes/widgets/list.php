<?php
/**
 * List Widget.
 *
 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_List_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'list-widget', // Base ID
			__('List', 'flatonpro'), // Name
			array( 'description' => __( 'Displays a list of elements with bullets', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'title' => 'Title of List',
			'list' => '',
			'icon' => 'fa-check',
			'color' => '',
		) );

		$class = '';
		$class .= 'class="fa '. $instance['icon'] .'"';

		$custom_style = '';
		$custom_style .= ' style="color: ' . $instance['color'] . ';"';

		// Add the list items
		$text = '';
		$text = preg_replace( "/\*+(.*)?/i", '<ul><li><i ' . $class . $custom_style . '></i> $1</li></ul>', $instance['list'] );
		$text = preg_replace( "/(\<\/ul\>\n(.*)\<ul\>*)+/", "", $text );
		$text = wpautop( $text );

		echo '<h3>' . $instance['title'] . '</h3>';
		// sanitized version of the list
		echo wp_kses_post($text);

		echo $args['after_widget'];
	}

	/**
	 * Display the list widget form.
	 *
	 * @param array $instance
	 * @return string|void
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( $instance, array(
			'title' => 'Title of List',
			'list' => '',
 			'icon' => 'fa-check',
			'color' => '',
		) );

		$icons = include( WEBULOUS_INCLUDES_DIR . '/icons.php' );
		$sections = include( WEBULOUS_INCLUDES_DIR .'/icon-sections.php');

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('list') ?>"><?php _e('List (start each line with *)', 'flatonpro') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('list') ?>" name="<?php echo $this->get_field_name('list') ?>"><?php echo esc_html($instance['list']) ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon') ?>"><?php _e('Icon', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('icon') ?>" name="<?php echo $this->get_field_name('icon') ?>">
				<option value="" <?php selected(!empty($instance['icon'])) ?>><?php esc_html_e('None', 'flatonpro') ?></option>
				<?php foreach($icons as $section => $s_icons) : ?>
					<?php if(isset($sections[$section])) : ?><optgroup label="<?php echo esc_attr($sections[$section]) ?>"><?php endif; ?>
						<?php foreach($s_icons as $icon) : ?>
							<option value="<?php echo esc_attr($icon) ?>" <?php selected($instance['icon'], $icon) ?>><?php echo esc_html(webulous_icon_get_name($icon)) ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('color') ?>"><?php _e('Color (in hex code, #ff0000)', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('color') ?>" name="<?php echo $this->get_field_name('color') ?>" value="<?php echo esc_attr($instance['color']) ?>" />
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
