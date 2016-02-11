<?php
/**
 * Font Awesome Icon Widget.
 *
 * @package Webulous
 * @since 1.0
 * @license GPL 2.0
 */

class Webulous_CircleIcon_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'circleicon-widget', // Base ID
			__('Circle Icon', 'flatonpro'), // Name
			array( 'description' => __( 'An icon in a circle with some text beneath it', 'flatonpro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'title' => '',
			'text' => '',
			'icon' => '',
			'type' => 'square',
			'icon_size' => 'lg',
			'icon_background_color' => '',
			'more' => '',
			'more_url' => '',
			'all_linkable' => false,
			'box' => false,
		) );

		$icon_styles = array();

		if( !empty($instance['icon_background_color']) && preg_match('/^#?+[0-9a-f]{3}(?:[0-9a-f]{3})?$/i', $instance['icon_background_color'])) {
			$icon_styles[] = 'color: '.$instance['icon_background_color'];
		}
			
		$icon_class = '';

		if( ! empty($instance['type']) ) {
			if( 'square' == $instance['type'] ) {
				$icon_class = 'icon-square';
			} else {
				$icon_class = 'icon-polygon';
			}
		}
		?>
		<div class="circle-icon-box <?php echo empty($instance['box']) ? 'circle-icon-hide-box' : 'circle-icon-show-box' ?> <?php echo $icon_class ?>">
			<div class="circle-icon-wrapper">
                <?php if(!empty($instance['more_url']) && !empty($instance['all_linkable'])) : ?><a href="<?php echo esc_url($instance['more_url']) ?>" class="link-icon"><?php endif; ?>
				<h3 class="fa-stack fa-<?php echo $instance['icon_size'] ?>">
					<?php if(!empty($instance['icon'])) : ?><i class="fa <?php echo esc_attr($instance['icon']) ?> fa-stack-1x"></i><?php endif; ?>
				</h3>
                <?php if(!empty($instance['more_url']) && !empty($instance['all_linkable'])) : ?></a><?php endif; ?>
			</div>
			
            <?php if(!empty($instance['more_url']) && !empty($instance['all_linkable'])) : ?><a href="<?php echo esc_url($instance['more_url']) ?>" class="link-title"><?php endif; ?>
			<?php if(!empty($instance['title'])) : ?><h4><?php echo esc_html($instance['title']) ?></h4><?php endif; ?>
            <?php if(!empty($instance['more_url']) && !empty($instance['all_linkable'])) : ?></a><?php endif; ?>

			<?php if(!empty($instance['text'])) : ?><p class="text"><?php echo wp_kses_post($instance['text']) ?></p><?php endif; ?>
			<?php if(!empty($instance['more_url']) && $instance['all_linkable']) : ?>
				<a href="<?php echo esc_url($instance['more_url']) ?>" class="more-button"><?php echo !empty($instance['more']) ? esc_html($instance['more']) : __('More Info', 'flatonpro') ?> <i></i></a>
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
			'icon' => '',
			'type' => 'square',
			'icon_size' => 'lg',
			'icon_background_color' => '',
			'more' => '',
			'more_url' => '',
			'all_linkable' => false,
			'box' => false,
		) );

		$icons = include( WEBULOUS_INCLUDES_DIR . '/icons.php' );
		$sections = include( WEBULOUS_INCLUDES_DIR .'/icon-sections.php');

		?>
		<p>
			<label for="<?php echo $this->get_field_id('type') ?>"><?php _e('Icon Type', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('type') ?>" name="<?php echo $this->get_field_name('type') ?>">
				<option value="square" <?php selected('square', $instance['type']) ?>><?php esc_html_e('Square', 'flatonpro') ?></option>
				<option value="polygon" <?php selected('polygon', $instance['type']) ?>><?php esc_html_e('Polygon', 'flatonpro') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text') ?>"><?php _e('Text', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('text') ?>" name="<?php echo $this->get_field_name('text') ?>" value="<?php echo esc_attr($instance['text']) ?>" />
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
			<label for="<?php echo $this->get_field_id('icon_background_color') ?>"><?php _e('Icon Background Color', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('icon_background_color') ?>" name="<?php echo $this->get_field_name('icon_background_color') ?>" value="<?php echo esc_attr($instance['icon_background_color']) ?>" />
			<span class="description"><?php _e('A hex color', 'flatonpro'); ?></span>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon_size') ?>"><?php _e('Icon Size', 'flatonpro') ?></label>
			<select id="<?php echo $this->get_field_id('icon_size') ?>" name="<?php echo $this->get_field_name('icon_size') ?>">
				<option value="lg" <?php selected('lg', $instance['icon_size']) ?>><?php esc_html_e('Normal', 'flatonpro') ?></option>
				<option value="1x" <?php selected('1x', $instance['icon_size']) ?>><?php esc_html_e('1x', 'flatonpro') ?></option>
				<option value="2x" <?php selected('2x', $instance['icon_size']) ?>><?php esc_html_e('2x', 'flatonpro') ?></option>
				<option value="3x" <?php selected('3x', $instance['icon_size']) ?>><?php esc_html_e('3x', 'flatonpro') ?></option>
				<option value="4x" <?php selected('4x', $instance['icon_size']) ?>><?php esc_html_e('4x', 'flatonpro') ?></option>
				<option value="5x" <?php selected('5x', $instance['icon_size']) ?>><?php esc_html_e('5x', 'flatonpro') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('more') ?>"><?php _e('More Text', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('more') ?>" name="<?php echo $this->get_field_name('more') ?>" value="<?php echo esc_attr($instance['more']) ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('more_url') ?>"><?php _e('More URL', 'flatonpro') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('more_url') ?>" name="<?php echo $this->get_field_name('more_url') ?>" value="<?php echo esc_attr($instance['more_url']) ?>" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('all_linkable') ?>">
                <input type="checkbox" id="<?php echo $this->get_field_id('all_linkable') ?>" name="<?php echo $this->get_field_name('all_linkable') ?>" <?php checked( $instance['all_linkable'] ) ?> />
                <?php _e('Link title and icon to "More URL"', 'flatonpro') ?>
            </label>
        </p>
		<!--
		<p>
			<label for="<?php echo $this->get_field_id('box') ?>">
				<input type="checkbox" id="<?php echo $this->get_field_id('box') ?>" name="<?php echo $this->get_field_name('box') ?>" <?php checked($instance['box']) ?> />
				<?php _e('Show Box Container', 'flatonpro') ?>
			</label>
		</p>
		-->
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance['box'] = !empty($new_instance['box']);
		$new_instance['all_linkable'] = !empty($new_instance['all_linkable']);
		return $new_instance;
	}
}
