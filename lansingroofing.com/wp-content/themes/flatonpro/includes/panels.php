<?php
/*  Integrates this theme with SiteOrigin Page Builder.

 * @package webulous
 * @since 1.0
 * @license GPL 2.0
 *
 * @param $layouts
 */
function webulous_prebuilt_page_layouts($layouts){
	$layouts['default-home'] = array (
		'name' => __('Default Home', 'flatonpro'),
		'description' => __('Pre Built Layout for  home page', 'flatonpro'),
		'widgets' =>  array(
			0 => 
    array (
      'height' => '50px',
      'panels_info' => 
      array (
        'class' => 'Webulous_Gap_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '<h1 class="tcenter widget-title">Services</h1>',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 1,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'title' => '',
      'text' => '[tabs_group type="center"][tabs title="Research"]
<div  class="fa fa-desktop"></div>
<h2>Research</h2>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.[/tabs][tabs title="Usability"]<div  class="fa fa-heart"></div><h2>Usability</h2>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.[/tabs][tabs title="Design"]<div  class="fa fa-meh-o"></div><h2>Design</h2>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).[/tabs][tabs title="Smart"]<div  class="fa fa-moon-o"></div><h2>Smart</h2>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. [/tabs][/tabs_group]',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 2,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'title' => '',
      'text' => '<h1 class="widget-title tcenter">Meet The Team</h1>',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 3,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'panels_data' => 
      array (
        'widgets' => 
        array (
          0 => 
          array (
            'title' => 'Feugiat Curces',
            'designation' => 'Senior Manager',
            'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/Two.png',
            'linkedin' => 'http://linkedin.com/',
            'google' => 'http://google.com/',
            'twitter' => 'http://twitter.com/',
            'facebook' => 'http://facebook.com',
            'content' => 'Vivamus nec massa quis ligula pulvinar sodales. Donec sit amet placerat ipsum. Sed consequat, est in consectetur dapibus, turpis ligula vehicula sapien.',
            'panels_info' => 
            array (
              'class' => 'Webulous_Ourteam_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 0,
              'id' => 0,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
          1 => 
          array (
            'title' => 'Aaleyah',
            'designation' => 'Art Director',
            'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/four.png',
            'linkedin' => 'http://linkedin.com/',
            'google' => 'http://google.com/',
            'twitter' => 'http://twitter.com/',
            'facebook' => 'http://facebook.com/',
            'content' => 'Sed lorem nibh, feugiat vel laoreet a, pharetra sit amet sem. Sed sagittis purus sit amet hendrerit gravida. Aliquam vitae velit justo. Cras convallis sollicitudin nunc.',
            'panels_info' => 
            array (
              'class' => 'Webulous_Ourteam_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 1,
              'id' => 1,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
          2 => 
          array (
            'title' => 'Christon Bale',
            'designation' => 'Designer',
            'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/Three.png',
            'linkedin' => 'http://linkedin.com/',
            'google' => 'http://google.com/',
            'twitter' => 'http://twitter.com/',
            'facebook' => 'http://facebook.com/',
            'content' => 'Donec sit amet placerat ipsum. Cras convallis sollicitudin nunc, quis convallis quam laoreet ac. Nam congue ex sit amet elit placerat, eget tincidunt velit hendrerit.',
            'panels_info' => 
            array (
              'class' => 'Webulous_Ourteam_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 2,
              'id' => 2,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
          3 => 
          array (
            'title' => 'Kelly Clarkson',
            'designation' => 'Code Ninja',
            'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/one.png',
            'linkedin' => 'http://linkedin.com/',
            'google' => 'http://google.com/',
            'twitter' => 'http://twitter.com/',
            'facebook' => 'http://facebook.com/',
            'content' => 'Aliquam vitae velit justo. Cras convallis sollicitudin nunc, quis convallis quam laoreet ac. Nam congue ex sit amet elit placerat, eget tincidunt velit hendrerit.',
            'panels_info' => 
            array (
              'class' => 'Webulous_Ourteam_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 3,
              'id' => 3,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
        ),
        'grids' => 
        array (
          0 => 
          array (
            'cells' => 4,
            'style' => 
            array (
            ),
          ),
        ),
        'grid_cells' => 
        array (
          0 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
          1 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
          2 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
          3 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
        ),
      ),
      'builder_id' => '54bc9f7e82b75',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Panels_Widgets_Layout',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 4,
        'style' => 
        array (
          'class' => 'section-pattern',
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'title' => 'Why Choose FlatOn',
      'text' => '<p>Aliquam malesuada tristique turpis vel vestibulum. Integer dolor eros, pretium ut ullamcorper ac, fringilla in leo. Sed sed nisi dictum, maximus eros ut, fringilla ipsum. Suspendisse fermentum nisl nibh, pulvinar efficitur sem semper sit amet. Donec venenatis erat felis, in eleifend urna congue ut. Ut quis luctus turpis, vel fermentum erat. Suspendisse dui felis, mattis ac egestas non, facilisis sed dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices consectetur ligula, sit amet viverra felis finibus a. Mauris ut congue justo. Cras tincidunt, lacus a pulvinar scelerisque, velit libero consectetur risus, a egestas nisi urna eget turpis. Morbi sollicitudin dapibus dignissim. Donec sagittis libero orci, id auctor est lacinia ac. </p>
<p class="btn-more"><a href="#">Read More </a></p>',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 5,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'title' => 'Skills',
      'panels_info' => 
      array (
        'class' => 'Webulous_Skill_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 6,
      ),
    ),
    7 => 
    array (
      'title' => '',
      'text' => '<h3 class="widget-title tcenter">Top Features</h3>',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 7,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    8 => 
    array (
      'panels_data' => 
      array (
        'widgets' => 
        array (
          0 => 
          array (
            'src' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2015/01/Top-Features-Two.png',
            'href' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2015/01/Top-Features-Two.png',
            'panels_info' => 
            array (
              'class' => 'Webulous_Image_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 0,
              'id' => 0,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
          1 => 
          array (
            'title' => 'Lorem Ipsum Dollor Sit Amet',
            'text' => 'Aliquam malesuada tristique turpis vel vestibulum. Integer dolor eros, pretium ut ullamcorper ac, fringilla in leo. Sed sed nisi dictum, maximus eros ut, fringilla ipsum. Suspendisse fermentum nisl nibh, pulvinar efficitur sem semper sit amet. Donec venenatis erat felis, in eleifend urna congue ut. Ut quis luctus turpis, vel fermentum erat. Suspendisse dui felis, mattis ac egestas non, facilisis sed dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices consectetur ligula, sit amet viverra felis finibus a. Mauris ut congue justo. Cras tincidunt, lacus a pulvinar scelerisque, velit libero consectetur risus, a egestas nisi urna eget turpis.',
            'panels_info' => 
            array (
              'class' => 'WP_Widget_Text',
              'raw' => false,
              'grid' => 0,
              'cell' => 1,
              'id' => 1,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
        ),
        'grids' => 
        array (
          0 => 
          array (
            'cells' => 2,
            'style' => 
            array (
            ),
          ),
        ),
        'grid_cells' => 
        array (
          0 => 
          array (
            'grid' => 0,
            'weight' => 0.5,
          ),
          1 => 
          array (
            'grid' => 0,
            'weight' => 0.5,
          ),
        ),
      ),
      'builder_id' => '54bc9f7e82da0',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Panels_Widgets_Layout',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 8,
        'style' => 
        array (
          'class' => 'section-pattern',
          'background_display' => 'tile',
        ),
      ),
    ),
    9 => 
    array (
      'title' => 'Suspendisse tempus',
      'text' => '[tabs_group type="normal"][tabs title="2012"]Pellentesque at vulputate nisi. Suspendisse eu consectetur justo, nec rhoncus erat. Nullam auctor nibh eget lectus pulvinar vulputate. Vivamus fermentum egestas lorem, eget accumsan neque lobortis sit amet. Nulla eu massa non mi rutrum semper at at libero. Etiam quis euismod massa, vitae volutpat felis. Aenean id nunc vel nibh fermentum lacinia finibus a magna. Donec pretium nunc eu velit iaculis, sodales cursus nunc laoreet.[/tabs][tabs title="2013"]Donec dapibus, metus eget dictum interdum, eros tellus maximus sapien, ac pretium magna lacus a justo. In dapibus consequat lacus ut congue. Quisque cursus enim sed condimentum faucibus. Vivamus gravida nibh ac justo tincidunt, vel posuere tellus tristique. Donec neque tellus, elementum ac ultrices vitae, tempor a tellus.[/tabs][tabs title="2014"]Ut in diam sapien. Duis ac felis quis ipsum sagittis luctus. Praesent est ex, mollis quis aliquam sit amet, egestas id velit. Praesent lobortis venenatis tincidunt. Fusce eget justo sapien. Phasellus sit amet rutrum nisi. Sed ullamcorper eu nunc sed auctor. Nam nisl tellus, cursus ac orci sed, molestie egestas orci.[/tabs][/tabs_group]',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 9,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    10 => 
    array (
      'title' => 'Words About Us',
      'text' => '[accordion_group][accordion title="Our Solutions"]Donec interdum sagittis quam id viverra. Cras interdum ligula efficitur enim scelerisque rhoncus. Quisque ullamcorper eget lacus consectetur dapibus. Mauris et hendrerit turpis. In auctor facilisis egestas. Vivamus et maximus nunc. Nunc blandit metus ac nulla varius, et porttitor orci egestas. [/accordion][accordion title="Our Missions"]Donec interdum sagittis quam id viverra. Cras interdum ligula efficitur enim scelerisque rhoncus. Quisque ullamcorper eget lacus consectetur dapibus. Mauris et hendrerit turpis. In auctor facilisis egestas. Vivamus et maximus nunc. Nunc blandit metus ac nulla varius, et porttitor orci egestas. [/accordion][accordion title="Our Visions"]Donec interdum sagittis quam id viverra. Cras interdum ligula efficitur enim scelerisque rhoncus. Quisque ullamcorper eget lacus consectetur dapibus. Mauris et hendrerit turpis. In auctor facilisis egestas. Vivamus et maximus nunc. Nunc blandit metus ac nulla varius, et porttitor orci egestas. [/accordion][/accordion_group]',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 6,
        'cell' => 1,
        'id' => 10,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    11 => 
    array (
      'title' => 'Recent Projects',
      'count' => '12',
      'type' => 'isotope',
      'panels_info' => 
      array (
        'class' => 'Webulous_Recent_Work_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 0,
        'id' => 11,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'title' => 'Testimonial Widget',
      'count' => '2',
      'panels_info' => 
      array (
        'class' => 'Webulous_Testimonial_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 12,
      ),
    ),
    13 => 
    array (
      'title' => 'Recent Work',
      'count' => '12',
      'type' => 'carousel',
      'panels_info' => 
      array (
        'class' => 'Webulous_Recent_Work_Widget',
        'raw' => false,
        'grid' => 9,
        'cell' => 0,
        'id' => 13,
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    1 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'section-divider',
        'background_display' => 'tile',
      ),
    ),
    4 => 
    array (
      'cells' => 2,
      'style' => 
      array (
      ),
    ),
    5 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'section-divider',
        'background_display' => 'tile',
      ),
    ),
    6 => 
    array (
      'cells' => 2,
      'style' => 
      array (
      ),
    ),
    7 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'section-divider',
      ),
    ),
    8 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'full-width-layout',
        'background_display' => 'tile',
        'background_image' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2015/01/Testi1.png',
      ),
    ),
    9 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 1,
    ),
    2 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    3 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    4 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    5 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    6 => 
    array (
      'grid' => 5,
      'weight' => 1,
    ),
    7 => 
    array (
      'grid' => 6,
      'weight' => 0.5,
    ),
    8 => 
    array (
      'grid' => 6,
      'weight' => 0.5,
    ),
    9 => 
    array (
      'grid' => 7,
      'weight' => 1,
    ),
    10 => 
    array (
      'grid' => 8,
      'weight' => 1,
    ),
    11 => 
    array (
      'grid' => 9,
      'weight' => 1,
    ),
    
		),

	);

	$layouts['about-us'] = array(
		'name' => __('About Us', 'flatonpro'),
		'description' => __( 'Pre Built layout for about us page', 'flatonpro'),
		'widgets' => array(
			 0 => 
    array (
      'height' => '30',
      'panels_info' => 
      array (
        'class' => 'Webulous_Gap_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => 'Our Skills',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.',
      'filter' => '',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 1,
      ),
    ),
    2 => 
    array (
      'title' => 'Our Skills',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 2,
      ),
    ),
    3 => 
    array (
      'title' => 'Our Skills',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 1,
        'cell' => 2,
        'id' => 3,
      ),
    ),
    4 => 
    array (
      'title' => '7766',
      'text' => 'Lorem Ipsum',
      'icon' => 'fa-desktop',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.co.in',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 4,
      ),
    ),
    5 => 
    array (
      'title' => '4392',
      'text' => 'Lorem Ipsum',
      'icon' => 'fa-clock-o',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.co.in',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 1,
        'id' => 5,
      ),
    ),
    6 => 
    array (
      'title' => '1098',
      'text' => 'Lorem Ipsum',
      'icon' => 'fa-coffee',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.co.in',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 2,
        'id' => 6,
      ),
    ),
    7 => 
    array (
      'title' => '1200',
      'text' => 'Lorem Ipsum',
      'icon' => 'fa-lightbulb-o',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.co.in',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 3,
        'id' => 7,
      ),
    ),
    8 => 
    array (
      'title' => 'Clients Say',
      'count' => '3',
      'panels_info' => 
      array (
        'class' => 'Webulous_Testimonial_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 8,
      ),
    ),
    9 => 
    array (
      'content' => 'Vivamus nec massa quis ligula pulvinar sodales. Donec sit amet placerat ipsum. Sed consequat, est in consectetur dapibus, turpis ligula vehicula sapien, sit amet dapibus lorem risus rhoncus neque.',
      'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/Two.png',
      'title' => 'Feugiat Curces',
      'designation' => 'Senior Manager',
      'linkedin' => 'https://in.linkedin.com/',
      'google' => 'https://plus.google.com/',
      'twitter' => 'https://twitter.com/',
      'facebook' => 'www.facebook.com/‎',
      'panels_info' => 
      array (
        'class' => 'Webulous_Ourteam_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 9,
      ),
    ),
    10 => 
    array (
      'content' => 'Sed lorem nibh, feugiat vel laoreet a, pharetra sit amet sem. Sed sagittis purus sit amet hendrerit gravida. Aliquam vitae velit justo. Cras convallis sollicitudin nunc, quis convallis quam laoreet ac. Donec interdum sagittis quam id viverra. ',
      'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/four.png',
      'title' => 'Aaleyah',
      'designation' => 'Art Director',
      'linkedin' => 'https://in.linkedin.com/',
      'google' => 'https://plus.google.com/',
      'twitter' => 'https://twitter.com/',
      'facebook' => 'www.facebook.com/‎',
      'panels_info' => 
      array (
        'class' => 'Webulous_Ourteam_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 10,
      ),
    ),
    11 => 
    array (
      'content' => 'Donec sit amet placerat ipsum. Cras convallis sollicitudin nunc, quis convallis quam laoreet ac. Nam congue ex sit amet elit placerat, eget tincidunt velit hendrerit. Pellentesque ante orci, congue sit amet urna vel',
      'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/Three.png',
      'title' => 'Christon Bale',
      'designation' => 'Designer',
      'linkedin' => 'https://in.linkedin.com/',
      'google' => 'https://plus.google.com/',
      'twitter' => 'https://twitter.com/',
      'facebook' => 'www.facebook.com/‎',
      'panels_info' => 
      array (
        'class' => 'Webulous_Ourteam_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 2,
        'id' => 11,
      ),
    ),
    12 => 
    array (
      'content' => 'Aliquam vitae velit justo. Cras convallis sollicitudin nunc, quis convallis quam laoreet ac. Nam congue ex sit amet elit placerat, eget tincidunt velit hendrerit. Pellentesque ante orci, congue sit amet urna vel.',
      'image_url' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/09/one.png',
      'title' => 'Kelly Clarkson',
      'designation' => 'Code Ninja',
      'linkedin' => 'https://in.linkedin.com/',
      'google' => 'https://plus.google.com/',
      'twitter' => 'https://twitter.com/',
      'facebook' => 'www.facebook.com/‎',
      'panels_info' => 
      array (
        'class' => 'Webulous_Ourteam_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 3,
        'id' => 12,
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    1 => 
    array (
      'cells' => 3,
      'style' => 
      array (
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 4,
      'style' => 
      array (
        'class' => 'full-width-layout',
        'background_image_attachment' => false,
        'background_display' => 'tile',
        'background_image' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/04/Faq-Background.png',
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'full-width-layout',
        'background_display' => 'tile',
        'background_image' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2015/01/Testi1.png',
      ),
    ),
    4 => 
    array (
      'cells' => 4,
      'style' => 
      array (
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.33333333333333,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.33333333333333,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 0.33333333333333,
    ),
    4 => 
    array (
      'grid' => 2,
      'weight' => 0.25,
    ),
    5 => 
    array (
      'grid' => 2,
      'weight' => 0.25,
    ),
    6 => 
    array (
      'grid' => 2,
      'weight' => 0.25,
    ),
    7 => 
    array (
      'grid' => 2,
      'weight' => 0.25,
    ),
    8 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    9 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    10 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    11 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    12 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    ),
	);
	$layouts['features'] = array(
			'name' => __('Features Page', 'flatonpro'),
			'description' => __( 'Pre Built layout for features page', 'flatonpro'),
			'widgets' => array(
				 0 => 
    array (
      'height' => '40',
      'panels_info' => 
      array (
        'class' => 'Webulous_Gap_Widget',
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'style' => 
        array (
          'background_image_attachment' => false,
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => 'Responsive Layout',
      'text' => 'FlatOn is fully responsive and can adapt to any screen size. Resize your browser window to view it!',
      'icon' => 'fa-desktop',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.com',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 1,
      ),
    ),
    2 => 
    array (
      'title' => 'Awesome Sliders',
      'text' => 'FlatOn includes two types of slider. You can use both Flex and Elastic sliders anywhere in your site.',
      'icon' => 'fa-random',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.com',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 2,
      ),
    ),
    3 => 
    array (
      'title' => 'Font Awesome',
      'text' => 'Font Awesome icons are fully integrated into the theme. Use them anywhere in your site in 6 different sizes!',
      'icon' => 'fa-flag',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.com',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 2,
        'id' => 3,
      ),
    ),
    4 => 
    array (
      'title' => 'Typography',
      'text' => 'FlatOn loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!',
      'icon' => 'fa-font',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.com',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 3,
        'id' => 4,
      ),
    ),
    5 => 
    array (
      'title' => 'Retina Ready',
      'text' => 'FlatOn is Retina Ready. So, Everything looks amazingly sharp and crisp on high resolution retina displays of all sizes!',
      'icon' => 'fa-magic',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 5,
      ),
    ),
    6 => 
    array (
      'title' => 'Excellent Support',
      'text' => 'We truly care about our customers and theme\'s performance. We assure you that you will get the best after sale support like never before!',
      'icon' => 'fa-thumb-tack',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 1,
        'id' => 6,
      ),
    ),
    7 => 
    array (
      'title' => 'Advanced Admin',
      'text' => 'FlatOn uses advanced Redux Framework for theme options panel, you can customize any part of your site quickly and easily!',
      'icon' => 'fa-cog',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 2,
        'id' => 7,
      ),
    ),
    8 => 
    array (
      'title' => 'Page Builder',
      'text' => 'FlatOn supports Page Builder. All our shortcodes can be used as widgets too. You can drag and drop our widgets with page builder visual editor.',
      'icon' => 'fa-plus',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 3,
        'id' => 8,
      ),
    ),
    9 => 
    array (
      'title' => 'Page Layout',
      'text' => 'FlatOn offers many different page layouts so you can quickly and easily create your pages with no hassle!',
      'icon' => 'fa-copy (alias)',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 9,
      ),
    ),
    10 => 
    array (
      'title' => 'Custom Widget',
      'text' => 'We offer many custom widgets that are stylized and ready for use. Simply drag & drop into place to activate!',
      'icon' => 'fa-beer',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 1,
        'id' => 10,
      ),
    ),
    11 => 
    array (
      'title' => 'Shortcode Builder',
      'text' => 'FlatOn inclues lots of shortcodes, and our shortcode builder, users can easily build custom pages!',
      'icon' => 'fa-check',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 2,
        'id' => 11,
      ),
    ),
    12 => 
    array (
      'title' => 'Demo Content',
      'text' => 'FlatOn includes demo content files. You can quickly setup the site like our demo and get started easily!',
      'icon' => 'fa-times',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 3,
        'id' => 12,
      ),
    ),
    13 => 
    array (
      'title' => 'Woo Commerce',
      'text' => 'FlatOn has full design/code integration for WooCommerce, your shop will look as good as the rest of your site!',
      'icon' => 'fa-shopping-cart',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 13,
      ),
    ),
    14 => 
    array (
      'title' => 'Testimonials',
      'text' => 'With our testimonial post type, shortcode and widget, Displaying testimonials is a breeze.',
      'icon' => 'fa-rocket',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 14,
      ),
    ),
    15 => 
    array (
      'title' => 'Social Media',
      'text' => 'Want your users to stay in touch? No problem, Flaton has Social Media icons all throughout the theme!',
      'icon' => 'fa-skype',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 2,
        'id' => 15,
      ),
    ),
    16 => 
    array (
      'title' => 'Google Map',
      'text' => 'Flaton includes Goole Map as shortcode and widget. So, you can use it anywhere in your site!',
      'icon' => 'fa-map-marker',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 3,
        'id' => 16,
      ),
    ),
    17 => 
    array (
      'title' => 'Multiple Portfolio',
      'text' => '7 portfolio layouts, 3 blog layouts and multiple other alternate layouts for interior pages!',
      'icon' => 'fa-list-alt',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 17,
      ),
    ),
    18 => 
    array (
      'title' => 'Multiple Sidebar',
      'text' => 'Unlimited sidebars allow you to create custom sidebars that match the style and layout of pages!',
      'icon' => 'fa-columns',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 1,
        'id' => 18,
      ),
    ),
    19 => 
    array (
      'title' => 'Customization',
      'text' => 'With advanced theme options, page options & extensive docs, its never been easier to customize a theme!',
      'icon' => 'fa-edit (alias)',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 2,
        'id' => 19,
      ),
    ),
    20 => 
    array (
      'title' => 'Improvement',
      'text' => 'We love our theme and customers. We are committed to improve and add new features to FlatOn!',
      'icon' => 'fa-signal',
      'icon_background_color' => '000000',
      'icon_size' => '3x',
      'more' => 'Read More',
      'more_url' => '#',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 3,
        'id' => 20,
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    1 => 
    array (
      'cells' => 4,
      'style' => 
      array (
      ),
    ),
    2 => 
    array (
      'cells' => 4,
      'style' => 
      array (
      ),
    ),
    3 => 
    array (
      'cells' => 4,
      'style' => 
      array (
      ),
    ),
    4 => 
    array (
      'cells' => 4,
      'style' => 
      array (
      ),
    ),
    5 => 
    array (
      'cells' => 4,
      'style' => 
      array (
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    4 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    5 => 
    array (
      'grid' => 2,
      'weight' => 0.24901960784314,
    ),
    6 => 
    array (
      'grid' => 2,
      'weight' => 0.25098039215686,
    ),
    7 => 
    array (
      'grid' => 2,
      'weight' => 0.25,
    ),
    8 => 
    array (
      'grid' => 2,
      'weight' => 0.25,
    ),
    9 => 
    array (
      'grid' => 3,
      'weight' => 0.25,
    ),
    10 => 
    array (
      'grid' => 3,
      'weight' => 0.25,
    ),
    11 => 
    array (
      'grid' => 3,
      'weight' => 0.25,
    ),
    12 => 
    array (
      'grid' => 3,
      'weight' => 0.25,
    ),
    13 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    14 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    15 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    16 => 
    array (
      'grid' => 4,
      'weight' => 0.25,
    ),
    17 => 
    array (
      'grid' => 5,
      'weight' => 0.25,
    ),
    18 => 
    array (
      'grid' => 5,
      'weight' => 0.25,
    ),
    19 => 
    array (
      'grid' => 5,
      'weight' => 0.25,
    ),
    20 => 
    array (
      'grid' => 5,
      'weight' => 0.25,
    ),
    ),
	);

	$layouts['contact-us'] = array(
			'name' => __('Contact Us Page', 'flatonpro'),
			'description' => __( 'Pre Built layout for contact us page', 'flatonpro'),
			'widgets' => array(
				 0 => 
    array (
      'title' => 'Contact us',
      'text' => '
',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'style' => 
        array (
          'background_image_attachment' => false,
          'background_display' => 'tile',
        ),
      ),
      'filter' => false,
    ),
    1 => 
    array (
      'title' => 'Lets get in touch',
      'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'grid' => 1,
        'cell' => 0,
        'id' => 1,
        'style' => 
        array (
          'background_image_attachment' => false,
          'background_display' => 'tile',
        ),
      ),
      'filter' => false,
    ),
    2 => 
    array (
      'title' => '',
      'text' => '[contact-form-7 id="4" title="Contact form 1"]',
      'filter' => '',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 2,
      ),
    ),
    3 => 
    array (
      'title' => '',
      'text' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6305.992774595653!2d-122.41157430890459!3d37.790124433800656!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858091edff45bd%3A0x70c4586b1202a605!2sUSA+Hostels+San+Francisco!5e0!3m2!1sen!2sin!4v1407318894507" width="1200" height="300" frameborder="0" style="border:0"></iframe>',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'grid' => 3,
        'cell' => 0,
        'id' => 3,
        'style' => 
        array (
          'background_image_attachment' => false,
          'background_display' => 'tile',
        ),
      ),
      'filter' => false,
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    1 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 1,
    ),
    2 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    3 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    ),
	);
	$layouts['faq'] = array (
		'name' => __('Faq Page', 'flatonpro'),
		'description' => __('Pre Built Layout for default faq page', 'flatonpro'),
		'widgets' =>  array(
			 0 => 
    array (
      'type' => 'polygon',
      'title' => 'Shopping',
      'text' => '',
      'icon' => 'fa-shopping-cart',
      'icon_background_color' => '000000',
      'icon_size' => '5x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.com',
      'box' => false,
      'all_linkable' => false,
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'type' => 'polygon',
      'title' => 'Shipping',
      'text' => '',
      'icon' => 'fa-phone',
      'icon_background_color' => '000000',
      'icon_size' => '5x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.com',
      'box' => false,
      'all_linkable' => false,
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 1,
        'id' => 1,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'type' => 'polygon',
      'title' => 'Gift Wrapping ',
      'text' => '',
      'icon' => 'fa-gift',
      'icon_background_color' => '000000',
      'icon_size' => '5x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.com',
      'box' => false,
      'all_linkable' => false,
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 2,
        'id' => 2,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'level' => '3',
      'type' => 'normal',
      'content' => 'Order',
      'panels_info' => 
      array (
        'class' => 'Webulous_Heading_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 3,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'title' => '',
      'text' => '[toggle title="Lorem ipsum dolor sit amet, consectetur adipiscing elit ? " open="0" type="polygon"]Integer volutpat sollicitudin magna quis vestibulum. Ut interdum quis mi nec tristique. Nulla urna quam, eleifend sed dolor vitae, fringilla vehicula magna. Duis consequat eros lorem, et cursus magna hendrerit feugiat. Curabitur non eros eu urna convallis ultricies nec quis nunc. Nulla molestie urna sed libero mattis tincidunt. Mauris cursus sem nisl, quis pellentesque augue condimentum eget. Proin id magna quis lectus blandit commodo sed eget metus. Nullam accumsan, mi et porta cursus, justo urna iaculis mi, eu ultricies neque diam et nunc. Integer iaculis ornare est vitae vulputate. Nunc bibendum vestibulum blandit.[/toggle]

[toggle title="Nunc lacinia nisi id felis eleifend pretium." open="0" type="polygon"]Nullam auctor dolor varius justo dignissim venenatis. Donec lobortis convallis fermentum. Sed venenatis, risus vitae accumsan cursus, elit turpis porttitor quam, a elementum eros nibh nec arcu. Duis vitae convallis massa. Praesent lorem diam, fringilla vitae convallis nec, ornare ornare justo.[/toggle]

[toggle title="Proin egestas tortor eu neque ullamcorper rutrum." open="0" type="polygon"]Sed convallis, sapien quis vulputate iaculis, urna risus condimentum neque, sit amet sagittis leo velit nec nisl. Cras volutpat sapien nunc. Nullam aliquet ex fringilla ligula dignissim, a gravida nulla placerat. Curabitur lobortis et purus eget pretium. Aenean luctus fermentum vulputate. Sed sed hendrerit ante.[/toggle]

[toggle title="Ut ut nulla efficitur, tincidunt elit at, aliquet augue." open="0" type="polygon"]Maecenas sapien sem, dapibus in fringilla ac, luctus vitae felis. Sed rutrum sollicitudin mi, vitae hendrerit erat tincidunt ultricies. Nullam elit nunc, scelerisque id maximus suscipit, sollicitudin in turpis. Aliquam ex magna, volutpat quis velit et, imperdiet efficitur lacus.[/toggle]

[toggle title="Maecenas luctus ipsum lacinia fermentum consectetur." open="0" type="polygon"]Morbi molestie metus et lacinia finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam sodales justo vitae lectus dignissim, vitae condimentum mi bibendum. Quisque sit amet tellus ultricies, condimentum turpis vel, luctus lectus. In sit amet erat eu dolor suscipit condimentum. Cras sed blandit quam, et imperdiet metus. Morbi varius erat a purus egestas scelerisque. [/toggle]





',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 4,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'level' => '3',
      'type' => 'normal',
      'content' => 'Payment & Shipping',
      'panels_info' => 
      array (
        'class' => 'Webulous_Heading_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 5,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'title' => '',
      'text' => '[toggle title="Curabitur imperdiet porttitor enim vel consequat" open="0" type="polygon"]Nullam sed varius orci, sed sodales libero. Vestibulum pulvinar lectus id placerat rutrum. Vestibulum pellentesque hendrerit erat a elementum. Vestibulum non gravida ligula. Donec mauris mi, pulvinar at scelerisque a, fermentum sit amet lorem. Nunc consequat lobortis odio, a rhoncus ex pellentesque nec.[/toggle]

[toggle title="Duis efficitur elementum ante" open="0" type="polygon"]Fusce efficitur tempus felis eu porta. Nullam in mollis urna. Pellentesque fermentum blandit lectus, suscipit porttitor lorem viverra quis. Suspendisse nec tempus diam. Suspendisse dignissim, mauris vitae tempus fringilla, magna neque efficitur lacus, rhoncus fringilla justo est eu tortor.[/toggle]

[toggle title="Ut iaculis quis ipsum vitae sodales" open="0" type="polygon"]Pellentesque eu suscipit nisi. Curabitur a laoreet lacus, in cursus tortor. Nunc imperdiet nulla eu risus varius, ac rutrum elit mattis. Ut ultrices at urna ac viverra. Fusce id diam mollis, ullamcorper nibh vitae, congue tellus.[/toggle]

[toggle title="Nullam sed accumsan augue" open="0" type="polygon"]Suspendisse posuere faucibus lacus vel ornare. Sed pellentesque erat ut sem sagittis, vel convallis mauris ultrices. Proin libero metus, facilisis sit amet nulla sed, pretium elementum tortor. Aliquam mattis felis a odio ornare, nec maximus orci aliquet. Nunc sit amet ultrices sem.[/toggle]

[toggle title="Praesent iaculis hendrerit viverra" open="0" type="polygon"]Nulla suscipit urna in nunc pellentesque, non suscipit purus scelerisque. Donec lobortis blandit nulla, at finibus libero interdum et. Aenean lobortis, ligula in aliquet porttitor, erat lorem hendrerit nulla, vel auctor ex leo sit amet massa. Ut consectetur, diam vitae rhoncus rhoncus, libero mi facilisis velit, ut aliquet ex magna ut tortor. Aliquam at euismod turpis, vitae pulvinar nunc[/toggle]






',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 2,
        'cell' => 1,
        'id' => 6,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    7 => 
    array (
      'title' => '',
      'text' => '<h5 class="widget-title tcenter">Have any questions we didn\'t answer?       
[button link="http://www.webulousthemes.com" target="_self" color="btn-inverse" size="btn-Large"]Get in Touch[/button]</h5>
[gap height="10"]

',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'grid' => 3,
        'cell' => 0,
        'id' => 7,
        'style' => 
        array (
          'background_image_attachment' => false,
          'background_display' => 'tile',
        ),
      ),
      'filter' => false,
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 3,
      'style' => 
      array (
        'class' => 'full-width-layout',
        'background_display' => 'tile',
        'background_image' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/04/Faq-Background.png',
      ),
    ),
    1 => 
    array (
      'cells' => 2,
      'style' => 
      array (
      ),
    ),
    2 => 
    array (
      'cells' => 2,
      'style' => 
      array (
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'full-width-layout',
        'row_stretch' => 'full',
        'background_display' => 'tile',
        'background_image' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/Uniq-Get-in-Touch.png',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 0.33333333333333,
    ),
    1 => 
    array (
      'grid' => 0,
      'weight' => 0.33333333333333,
    ),
    2 => 
    array (
      'grid' => 0,
      'weight' => 0.33333333333333,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 0.15436241610738,
    ),
    4 => 
    array (
      'grid' => 1,
      'weight' => 0.84563758389262,
    ),
    5 => 
    array (
      'grid' => 2,
      'weight' => 0.15436241610738,
    ),
    6 => 
    array (
      'grid' => 2,
      'weight' => 0.84563758389262,
    ),
    7 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    ),
    
	);
	$layouts['services'] = array (
		'name' => __('Services Page', 'flatonpro'),
		'description' => __('Pre Built Layout for services page', 'flatonpro'),
		'widgets' =>  array(
			 0 => 
    array (
      'height' => '40',
      'panels_info' => 
      array (
        'class' => 'Webulous_Gap_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '<h3 class="widget-title tcenter">Our Working Process</h3>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.',
      'filter' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 1,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'style' => 'default',
      'panels_info' => 
      array (
        'class' => 'Webulous_Divider_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 2,
      ),
    ),
    3 => 
    array (
      'title' => 'Diamond Perfect Design',
      'text' => 'Ut elit tellus, luctus nec ullamcorper mattis.',
      'icon' => 'fa-heart',
      'icon_background_color' => '',
      'icon_size' => '5x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.co.in',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 3,
      ),
    ),
    4 => 
    array (
      'title' => 'Responsive Design',
      'text' => 'Ut elit tellus, luctus nec ullamcorper mattis.',
      'icon' => 'fa-desktop',
      'icon_background_color' => '',
      'icon_size' => '5x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.co.in',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 1,
        'id' => 4,
      ),
    ),
    5 => 
    array (
      'title' => 'Online Shopping',
      'text' => 'Ut elit tellus, luctus nec ullamcorper mattis.',
      'icon' => 'fa-shopping-cart',
      'icon_background_color' => '',
      'icon_size' => '5x',
      'more' => 'Read More',
      'more_url' => 'http://www.google.co.in',
      'box' => '',
      'all_linkable' => '',
      'panels_info' => 
      array (
        'class' => 'Webulous_CircleIcon_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 2,
        'id' => 5,
      ),
    ),
    6 => 
    array (
      'title' => 'Quality Products',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod mpor incididunt ut labore et dolore magna aliqua. Ut enim.
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium que laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam oluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni olores eos qui ratione voluptatem sequi nesciunt.

[button link="http://www.google.co.in" target="_self" color="btn-danger" size="btn-large"]Browse Products[/button]



',
      'filter' => '',
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 6,
      ),
    ),
    7 => 
    array (
      'src' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/1.png',
      'href' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/1.png',
      'panels_info' => 
      array (
        'class' => 'Webulous_Image_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 7,
      ),
    ),
    8 => 
    array (
      'src' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/3.png',
      'href' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/3.png',
      'panels_info' => 
      array (
        'class' => 'Webulous_Image_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 8,
      ),
    ),
    9 => 
    array (
      'src' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/4.png',
      'href' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/4.png',
      'panels_info' => 
      array (
        'class' => 'Webulous_Image_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 2,
        'id' => 9,
      ),
    ),
    10 => 
    array (
      'src' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/2.png',
      'href' => 'http://demo.webulous.in/flaton/wp-content/uploads/sites/6/2014/10/2.png',
      'panels_info' => 
      array (
        'class' => 'Webulous_Image_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 2,
        'id' => 10,
      ),
    ),
    11 => 
    array (
      'title' => 'Some fields of expertise',
      'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.

It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy',
      'filter' => true,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 11,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'title' => 'Skills',
      'panels_info' => 
      array (
        'class' => 'Webulous_Skill_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 1,
        'id' => 12,
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    1 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    3 => 
    array (
      'cells' => 3,
      'style' => 
      array (
      ),
    ),
    4 => 
    array (
      'cells' => 3,
      'style' => 
      array (
        'class' => 'section-divider',
        'background_display' => 'tile',
      ),
    ),
    5 => 
    array (
      'cells' => 2,
      'style' => 
      array (
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 1,
    ),
    2 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    3 => 
    array (
      'grid' => 3,
      'weight' => 0.33333333333333,
    ),
    4 => 
    array (
      'grid' => 3,
      'weight' => 0.33333333333333,
    ),
    5 => 
    array (
      'grid' => 3,
      'weight' => 0.33333333333333,
    ),
    6 => 
    array (
      'grid' => 4,
      'weight' => 0.33333333333333,
    ),
    7 => 
    array (
      'grid' => 4,
      'weight' => 0.33333333333333,
    ),
    8 => 
    array (
      'grid' => 4,
      'weight' => 0.33333333333333,
    ),
    9 => 
    array (
      'grid' => 5,
      'weight' => 0.5,
    ),
    10 => 
    array (
      'grid' => 5,
      'weight' => 0.5,
    ),
   ),
    
	);

	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'webulous_prebuilt_page_layouts');
/**
 * Configure the SiteOrigin page builder settings.
 * 
 * @param $settings
 * @return mixed
 */
function webulous_panels_settings($settings){
	$settings['home-page'] = true;
	$settings['margin-bottom'] = 35;
	$settings['home-page-default'] = 'default-home';
	$settings['responsive'] = 1; //siteorigin_setting( 'layout_responsive' );
	return $settings;
}
add_filter('siteorigin_panels_settings', 'webulous_panels_settings');

/**
 * Add row styles.
 *
 * @param $styles
 * @return mixed
 */
function webulous_panels_row_styles($styles) {
	$styles['full-width-layout'] = __('Full Width Layout', 'flatonpro');
	$styles['wide-grey'] = __('Wide Grey', 'flatonpro');
	$styles['custom-width'] = __('Custom Width', 'flatonpro');
	$styles['section-divider'] = __('Section Divider', 'flatonpro');
	return $styles;
}
add_filter('siteorigin_panels_row_styles', 'webulous_panels_row_styles');

function webulous_panels_row_style_fields($fields) {

	$fields['top_border'] = array(
		'name' => __('Top Border Color', 'flatonpro'),
		'type' => 'color',
	);

	$fields['bottom_border'] = array(
		'name' => __('Bottom Border Color', 'flatonpro'),
		'type' => 'color',
	);

	$fields['background'] = array(
		'name' => __('Background Color', 'flatonpro'),
		'type' => 'color',
	);

	$fields['background_image'] = array(
		'name' => __('Background Image', 'flatonpro'),
		'type' => 'url',
	);

	$fields['background_image_repeat'] = array(
		'name' => __('Repeat Background Image', 'flatonpro'),
		'type' => 'checkbox',
	);

	$fields['no_margin'] = array(
		'name' => __('No Bottom Margin', 'flatonpro'),
		'type' => 'checkbox',
	);

	return $fields;
}
add_filter('siteorigin_panels_row_style_fields', 'webulous_panels_row_style_fields');

function webulous_panels_panels_row_style_attributes($attr, $style) {
	$attr['style'] = '';

	if(!empty($style['top_border'])) $attr['style'] .= 'border-top: 1px solid '.$style['top_border'].'; ';
	if(!empty($style['bottom_border'])) $attr['style'] .= 'border-bottom: 1px solid '.$style['bottom_border'].'; ';
	if(!empty($style['background'])) $attr['style'] .= 'background-color: '.$style['background'].'; ';
	if(!empty($style['background_image'])) $attr['style'] .= 'background-image: url('.esc_url($style['background_image']).'); ';
	if(!empty($style['background_image_repeat'])) $attr['style'] .= 'background-repeat: repeat; ';

	if(empty($attr['style'])) unset($attr['style']);
	return $attr;
}
add_filter('siteorigin_panels_row_style_attributes', 'webulous_panels_panels_row_style_attributes', 10, 2);

function webulous_panels_panels_row_attributes($attr, $row) {
	if(!empty($row['style']['no_margin'])) {
		if(empty($attr['style'])) $attr['style'] = '';
		$attr['style'] .= 'margin-bottom: 0px;';
	}

	return $attr;
}
add_filter('siteorigin_panels_row_attributes', 'webulous_panels_panels_row_attributes', 10, 2);