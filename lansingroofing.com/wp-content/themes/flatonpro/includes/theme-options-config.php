<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */

if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            if ( strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( get_template_directory() ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/plugin/hooks', array( $this, 'remove_demo' ) );
            // Function to test the compiler hook and demo CSS output.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2); 
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            // Dynamically add a section. Can be also used to modify sections/fields
            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
            //echo "<h1>The compiler hook has run!";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
              require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
              $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
              );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'flatonpro'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'flatonpro'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
            }

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'flatonpro'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'flatonpro'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'flatonpro'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'flatonpro') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'flatonpro'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }




            // ACTUAL DECLARATION OF SECTIONS

            $this->sections[] = array(
                'title' => __('General Settings', 'flatonpro'),
                'desc' => __('General Settings of Theme to change look and feel through out the site', 'flatonpro'),
                'icon' => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(  
                    array(
                        'id'=>'color',
                        'type' => 'select',
                        'title' => __('Color Scheme', 'flatonpro'),
                        'subtitle'=> __('Select your color scheme.', 'flatonpro'),
                        'options' => array( '1' => 'default', '2' => 'blue', '3' => 'green', '4'  => 'purple', '6' => 'red', '7' => 'yellow', '8' => 'Blue-Free Version', '9' => 'Green-Free Version' ),
                        'default' => '1'
                        ),
                    array(
                        'id'=>'breadcrumb',
                        'type' => 'switch', 
                        'title' => __('Enable Breadcrumb Navigation', 'flatonpro'),
                        'subtitle'=> __('Check to display breadcrumb navigation.', 'flatonpro'),
                        //'default' => 1,
                        //'on' => __( 'Enable','flatonpro'),
                        //'off' => __('Disable','flatonpro'),
                        ),      

                    array(
                        'id'=>'breadcrumb-char',
                        'type' => 'select',
                        'title' => __('Breadcrumb Character', 'flatonpro'),
                        'subtitle'=> __('Check to display breadcrumb navigation.', 'flatonpro'),
                        'options' => array( '1' => ' &raquo; ', '2' => ' / ', '3' => ' > ' ),
                        //'default' => '1'
                        ),

                    array(
                        'id'=>'pagenavi',
                        'type' => 'switch', 
                        'title' => __('Enable Numeric Page Navigation', 'flatonpro'),
                        'subtitle'=> __('Check to display numeric page navigation, instead of Previous Posts / Next Posts links.', 'flatonpro'),
                        'default'       => 1,
                        'on' => __( 'Enable','flatonpro'),
                        'off' => __('Disable','flatonpro'),
                    ),

                    array(
                        'id'=>'animate',
                        'type' => 'switch',
                        'title' => __( 'Enable Home page animation effects', 'flatonpro' ),
                        'subtitle'=> __( 'Check to enable home page css3 animation effects.', 'flatonpro' ),
                        'default'       => 1,
                        'on' => __( 'Enable','flatonpro'),
                        'off' => __('Disable','flatonpro'),
                    ),      

                    array(
                        'id'=>'layout',
                        'type' => 'image_select',
                        'compiler'=>true,
                        'title' => __('Main Layout', 'flatonpro' ), 
                        'subtitle' => __('Select main content and sidebar alignment.', 'flatonpro' ),
                        'options' => array(
                                '2' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                                '3' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png'),
                            ),
                        'default' => '3'
                        ),

                    array(
                        'id'=>'custom-js',
                        'type' => 'textarea',
                        'title' => __('Custom Javascript', 'flatonpro'), 
                        'subtitle' => __('Quickly add some Javascript to your theme by adding it to this block.', 'flatonpro'),
                        //'validate' => 'js',
                        'desc' => __('Validate that it\'s javascript!','flatonpro')
                        ),      
               array(
                        'id'=>'custom-css',
                        'type' => 'ace_editor',
                        'title' => __('Custom CSS', 'flatonpro'), 
                        'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', 'flatonpro'),
                        'mode' => 'css',
                  'theme' => 'monokai',
                        'desc' => __('Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.','flatonpro'),
                        )
                )
            );


            $this->sections[] = array(
                'title' => __('Header', 'flatonpro'),
                'desc' => __('Theme options related to header section', 'flatonpro'),
                'icon' => 'el-icon-arrow-up',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(  

                    array(
                        'id'=>'site-title',
                        'type' => 'switch', 
                        'title' => __('Logo as site title', 'flatonpro'),
                        'subtitle'=> __('Enable to load custom logo as site title in header.', 'flatonpro'),
                        //"default"       => 0,
                        'on' => __( 'Enable','flatonpro'),
                        'off' => __('Disable','flatonpro'),
                        ),

                    array(
                        'id'=>'custom-logo',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Custom Logo', 'flatonpro'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Upload logo to use as site title', 'flatonpro'),
                        'subtitle' => __('Upload any media using the WordPress native uploader', 'flatonpro'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),

                    array(
                        'id'=>'site-description',
                        'type' => 'switch', 
                        'title' => __('Site Description', 'flatonpro'),
                        'subtitle'=> __('Enable to show site description in header.', 'flatonpro'),
                        //"default"       => 1,
                        'on' => __( 'Enable','flatonpro'),
                        'off' => __('Disable','flatonpro'),
                        ),

                    array(
                        'id'=>'favicon',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Custom Favicon (ICO)', 'flatonpro'),
                        'desc' => __('You can upload an ico image that will represent your website\'s favicon (16px X 16px)', 'flatonpro'),
                        ),

                    array(
                        'id'=>'ipad-icon-retina',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPad Retina Icon Upload (144px X 144px)', 'flatonpro'),
                        'desc'=> __('For third-generation iPad with high-resolution Retina display', 'flatonpro'),
                        ),

                    array(
                        'id'=>'iphone-icon-retina',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPhone Retina Icon Upload (114px X 114px)', 'flatonpro'),
                        'desc'=> __('For iPhone with high-resolution Retina display', 'flatonpro'),
                        ),

                    array(
                        'id'=>'ipad-icon',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPad Icon Upload (72px X 72px)', 'flatonpro'),
                        'desc'=> __('For first- and second-generation iPad', 'flatonpro'),
                        ),

                    array(
                        'id'=>'iphone-icon',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPhone Icon Upload (57px X 57px)', 'flatonpro'),
                        'desc'=> __('For non-Retina iPhone, iPod Touch, and Android 2.1+ devices', 'flatonpro'),
                        ),          

                    array(
                        'id'=>'google-analytics',
                        'type' => 'textarea',
                        'title' => __('Tracking Code', 'flatonpro'), 
                        'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'flatonpro'),
                        //'validate' => 'js',
                        'default' => '',
                        'desc' => __('Validate that it\'s javascript!','flatonpro'),
                    ),

                    array(
                        'id'=>'analytics-place',
                        'type' => 'switch', 
                        'title' => __('Load Tracking Code in Footer', 'flatonpro'),
                        'subtitle'=> __('Check to load analytics in footer. Uncheck to load in header.', 'flatonpro'),
                        'default' => 0,
                        'on' => __('In Footer','flatonpro'),
                        'off' => __('In Header','flatonpro'),
                    ),

                )
            );


            $this->sections[] = array(
                'title' => __('Footer', 'flatonpro'),
                'desc' => __('Theme options related to footer area of theme', 'flatonpro'),
                'icon' => 'el-icon-arrow-down',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(  

                    array(
                        'id'=>'footer-widgets',
                        'type' => 'switch', 
                        'title' => __('Enable Footer Widget Area', 'flatonpro'),
                        'subtitle'=> __('Check to enable 4 Column Footer widget Area', 'flatonpro'),
                        //"default"       => 0,
                        'on' => __( 'Enable','flatonpro'),
                        'off' => __('Disable','flatonpro'),
                        ),

                    array(
                        'id'=>'footer-text',
                        'type' => 'textarea',
                        'title' => __('Footer Copyright Text', 'flatonpro'), 
                        'subtitle' => __('Footer copyright text. HTML Allowed', 'flatonpro'),
                        'desc' => __('This field is even HTML validated!', 'flatonpro'),
                        //'default' => __( 'Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a>. Theme by <a href="http://www.webulous.in/">Webulous</a>.', 'flatonpro' ),
                        'validate' => 'html',
                        ),

                    array(
                        'id'=>'enable-footer-menu',
                        'type' => 'switch',
                        'title' => __('Select Menu', 'flatonpro'),
                        'subtitle'=> __('Select menu to display in footer.', 'flatonpro'),
                        //'default'  => 1,
                        //'on' => __( 'Enable','flatonpro'),
                        //'off' => __('Disable','flatonpro'),
                        ),

                    array(
                        'id'=>'footer-menu',
                        'type' => 'select',
                        'data' => 'menus',
                        'title' => __('Select Menu', 'flatonpro'),
                        'subtitle'=> __('Select menu to display in footer.', 'flatonpro'),
                        ),

                    )
            );

            $this->sections[] = array(
                'title' => __('Home', 'flatonpro'),
                'desc' => __('Theme options related to home page', 'flatonpro'),
                'icon' => 'el-icon-home',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                    array(
                        'id'=>'slides',
                        'type' => 'slides',
                        'title' => __('Flex Slider Options', 'flaton' ),
                        'subtitle'=> __('Unlimited slides with drag and drop sortings.', 'flaton' )
                    ),

                    array(
                        'id'=>'service-main-title',
                        'type' => 'text',
                        'title' => __('Services Main Title', 'flaton' ), 
                        'desc' => __('Enter title of this section', 'flaton' ),
                        //'default' => __('Our Services', 'flaton'),
                    ),
                    array(
                        'id'=>'service-sub-title',
                        'type' => 'text',
                        'title' => __('Services Section Sub Title', 'flaton' ), 
                        'desc' => __('Enter subtitle of this section', 'flaton' ),
                        //'default' => __('Our Professional Solutions', 'flaton'),
                    ),

                    array(
                    'id'=>'service-icon-1',
                    'type' => 'text',
                    'title' => __('1. Service Icon', 'flaton' ), 
                    'subtitle' => __('Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'flaton' ),
                    'default' => 'fa fa-bullhorn'
                    ),
                    array(
                        'id'=>'service-title-1',
                        'type' => 'text',
                        'title' => __('Service Title', 'flaton' ), 
                        'desc' => __('Enter title of this service', 'flaton' ),
                       // 'default' => __('Research', 'flaton'),
                    ),
                    array(
                        'id'=>'service-description-1',
                        'type' => 'textarea',
                        'title' => __('1. Service Description', 'flaton' ), 
                        'validate' => 'html',
                        //'default' => __('<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', 'flaton'),
                    ),

                    array(
                        'id'=>'service-icon-2',
                        'type' => 'text',
                        'title' => __('2. Service Icon', 'flaton' ), 
                        'subtitle' => __('Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'flaton' ),
                        //'default' => 'fa fa-cogs',
                    ),
                    array(
                        'id'=>'service-title-2',
                        'type' => 'text',
                        'title' => __('Service Title', 'flaton' ), 
                        'desc' => __('Enter title of this service', 'flaton' ),
                       // 'default' => __('Usability', 'flaton'),
                    ),
                    array(
                        'id'=>'service-description-2',
                        'type' => 'textarea',
                        'title' => __('2. Service Description', 'flaton' ), 
                        'validate' => 'html',
                       // 'default' => __('<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p><ul>   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>   <li>Aliquam tincidunt mauris eu risus.</li>   <li>Vestibulum auctor dapibus neque.</li></ul>', 'flaton'),
                    ),

                    array(
                        'id'=>'service-icon-3',
                        'type' => 'text',
                        'title' => __('3. Service Icon', 'flaton' ), 
                        'subtitle' => __('Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'flaton' ),
                        //'default' => 'fa fa-twitter',
                    ),
                    array(
                        'id'=>'service-title-3',
                        'type' => 'text',
                        'title' => __('Service Title', 'flaton' ), 
                        'desc' => __('Enter title of this service', 'flaton' ),
                        //'default' => __('Design', 'flaton'),
                    ),
                    array(
                        'id'=>'service-description-3',
                        'type' => 'textarea',
                        'title' => __('3. Service Description', 'flaton' ), 
                        'validate' => 'html',
                       // 'default' => __('<h2>Header Level 2</h2><ol><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol>', 'flaton'),
                    ),

                    array(
                        'id'=>'service-icon-4',
                        'type' => 'text',
                        'title' => __('4. Service Icon', 'flaton' ), 
                        'subtitle' => __('Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'flaton' ),
                        //'default' => 'fa fa-group',
                    ),
                    array(
                        'id'=>'service-title-4',
                        'type' => 'text',
                        'title' => __('Service Title', 'flaton' ), 
                        'desc' => __('Enter title of this service', 'flaton' ),
                       // 'default' => __('Design', 'flaton'),
                    ),
                    array(
                        'id'=>'service-description-4',
                        'type' => 'textarea',
                        'title' => __('4. Service Description', 'flaton' ), 
                        //'default' => __('<h2>Header Level 2</h2><ol><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol>', 'flaton'),
                        'validate' => 'html',
                    ),

                    array(
                        'id'=>'service-icon-5',
                        'type' => 'text',
                        'title' => __('5. Service Icon', 'flaton' ), 
                        'subtitle' => __('Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'flaton' ),
                       // 'default' => 'fa fa-digg',
                    ),
                    array(
                        'id'=>'service-title-5',
                        'type' => 'text',
                        'title' => __('Service Title', 'flaton' ), 
                        'desc' => __('Enter title of this service', 'flaton' ),
                        //'default' => __('Design', 'flaton'),
                    ),
                    array(
                        'id'=>'service-description-5',
                        'type' => 'textarea',
                        'title' => __('5. Service Description', 'flaton' ), 
                        'validate' => 'html',
                        //'default' => __('<h2>Header Level 2</h2><ol><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol>', 'flaton'),
                    ),

                    array(
                        'id'=>'team',
                        'type' => 'textarea',
                        'title' => __('Our Team', 'flaton' ),    
                        'validate' => 'html',
                        //'default' => __('<div class="eight columns team-col"><img src="http://localhost/flaton/wp-content/uploads/2014/04/team-mem1.gif" alt="" /><p>Many desktop publishing packages and we page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum" will uncover many websites still in their infancy. Various verions have evolved over the years,sometimes by accident.<h5><strong>Feugiat Cursus</strong>Senior Manager</h5></div><div class="eight columns team-col"><img src="http://localhost/flaton/wp-content/uploads/2014/04/team-mem2.gif" alt="" /><p>Many desktop publishing packages and we page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum" will uncover many websites still in their infancy. Various verions have evolved over the years,sometimes by accident.<h5><strong>Kelly Clarkson</strong>Art Director</h5></div><div class="eight columns team-col"><img src="http://localhost/flaton/wp-content/uploads/2014/04/team-mem3.gif" alt="" /><p>Many desktop publishing packages and we page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum" will uncover many websites still in their infancy. Various verions have evolved over the years,sometimes by accident.<h5><strong>Chris Pontius</strong>Designer</h5></div><div class="eight columns team-col"><img src="http://localhost/flaton/wp-content/uploads/2014/04/team-mem4.gif" alt="" /><p>Many desktop publishing packages and we page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum" will uncover many websites still in their infancy. Various verions have evolved over the years,sometimes by accident.<h5><strong>Bom Margera</strong>Code Ninja</h5></div><br class="clear" />', 'flaton'),
                    ),  

                    array(
                        'id'=>'features',
                        'type' => 'textarea',
                        'title' => __('Why Us? (or) Featrues', 'flaton' ), 
                        'subtitle' => __('A list is best, like "Why Us?", "Features".', 'flaton' ),
                        'validate' => 'html',
                        //'default' => __('<h2>Why Choose FlatOn</h2><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced blow for those interested. Sections 1.10.32 and 1.10.33 from "De Finibus Bonorum et Malorum" by Cicero are also reproduced in their Exact original form, accompanied. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipusm has been the industry\'s standard dummy text ever since the...</p><p class="btn-more"><a href="http://www.webulousthemes.com/?add-to-cart=23">Buy Now</a></p>', 'flaton'),
                    ),  

                    array(
                        'id'=>'skill-heading',
                        'type' => 'text',
                        'title' => __('Skills Heading', 'flaton' ), 
                        'subtitle' => __('Enter heading of the skills list', 'flaton' ),
                        //'default' => __('Our Skills', 'flaton'),
                    ),  

                    array(
                        'id'=>'skill-1',
                        'type' => 'text',
                        'title' => __('1. Skill Name', 'flaton' ), 
                        'subtitle' => __('Enter name of the skill', 'flaton' ),
                       // 'default' => __('Web Design','flaton'),
                    ),      
                    array(
                        'id'=>'percentage-1',
                        'type' => 'spinner',
                        'title' => __('1. Skill Percentage', 'flaton' ), 
                        'desc' => __('Enter 0 to 50', 'flaton' ),
                        'min' => '0',
                        'max' => '100',
                        'step' => '5',
                        //'default' => '80',
                    ),

                    array(
                        'id'=>'skill-icon-1',
                        'type' => 'text',
                        'title' => __('1. Skill Icon', 'flaton' ), 
                        'subtitle' => __('Select icon that represents this skill', 'flaton' ),
                        //'default' => 'fa fa-bell',
                    ),

                    array(
                        'id'=>'skill-2',
                        'type' => 'text',
                        'title' => __('2. Skill Name', 'flaton' ), 
                        'subtitle' => __('Enter name of the skill', 'flaton' ),
                       // 'default' => __('Management','flaton'),
                    ),      

                    array(
                        'id'=>'percentage-2',
                        'type' => 'spinner',
                        'title' => __('2. Skill Percentage', 'flaton' ), 
                        'desc' => __('Enter 0 to 50', 'flaton' ),
                        'min' => '0',
                        'max' => '100',
                        'step' => '5',
                        //'default' => '60',

                    ),

                    array(
                        'id'=>'skill-icon-2',
                        'type' => 'text',
                        'title' => __('2. Skill Icon', 'flaton' ), 
                        'subtitle' => __('Select icon that represents this skill', 'flaton' ),
                        //'default' => 'fa fa-camera',
                    ),

                    array(
                        'id'=>'skill-3',
                        'type' => 'text',
                        'title' => __('3. Skill Name', 'flaton' ), 
                        'subtitle' => __('Enter name of the skill', 'flaton' ),
                        //'default' => __('Design','flaton'),
                    ),

                    array(
                        'id'=>'percentage-3',
                        'type' => 'spinner',
                        'title' => __('3. Skill Percentage', 'flaton' ), 
                        'desc' => __('Enter 0 to 50', 'flaton' ),
                        'min' => '0',
                        'max' => '100',
                        'step' => '5',
                        //'default' => '90',
                    ),

                    array(
                        'id'=>'skill-icon-3',
                        'type' => 'text',
                        'title' => __('3. Skill Icon', 'flaton' ), 
                        'subtitle' => __('Select icon that represents this skill', 'flaton' ),
                       //'default' => 'fa fa-recycle',
                    ),

                    array(
                        'id'=>'skill-4',
                        'type' => 'text',
                        'title' => __('4. Skill Name', 'flaton' ), 
                        'subtitle' => __('Enter name of the skill', 'flaton' ),
                       // 'default' => __('HTML &amp; CSS','flaton'),
                        ),

                    array(
                        'id'=>'percentage-4',
                        'type' => 'spinner',
                        'title' => __('4. Skill Percentage', 'flaton' ), 
                        'desc' => __('Enter 0 to 50', 'flaton' ),
                        'min' => '0',
                        'max' => '100',
                        'step' => '5',
                       // 'default' => '50',
                    ),

                    array(
                        'id'=>'skill-icon-4',
                        'type' => 'text',
                        'title' => __('4. Skill Icon', 'flaton' ), 
                        'subtitle' => __('Select icon that represents this skill', 'flaton' ),
                        //'default' => 'fa fa-user',
                    ),

                    array(
                        'id'=>'skill-5',
                        'type' => 'text',
                        'title' => __('5. Skill Name', 'flaton' ), 
                        'subtitle' => __('Enter name of the skill', 'flaton' ),
                       // 'default' => __('WordPress','flaton'),
                    ),

                    array(
                        'id'=>'percentage-5',
                        'type' => 'spinner',
                        'title' => __('5. Skill Percentage', 'flaton' ), 
                        'desc' => __('Enter 0 to 50', 'flaton' ),
                        'min' => '0',
                        'max' => '100',
                        'step' => '5',
                        //'default' => '80',
                    ),

                    array(
                        'id'=>'skill-icon-5',
                        'type' => 'text',
                        'title' => __('5. Skill Icon', 'flaton' ), 
                        'subtitle' => __('Select icon that represents this skill', 'flaton' ),
                        //'default' => 'fa fa-video-camera',
                    ),

                    array(
                        'id'=>'extra-info',
                        'type' => 'textarea',
                        'title' => __('Additional Info', 'flaton' ), 
                        'validate' => 'html',
                        //'default' => __('<h2>Top Features</h2><img src="http://localhost/flaton/wp-content/uploads/2013/03/soworthloving-wallpaper-300x187.jpg" alt="" class="alignleft" /><h5><strong>Lorem ipsum dolor sit amet</strong></h5><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p class="btn-more"><a href="http://www.webulousthemes.com/?add-to-cart=23">Buy Now</a></p>', 'flaton'),
                    ), 

                    array(
                        "id" => "homepage_blocks",    
                        "type" => "sorter",
                        "title" => "Homepage Layout Manager",
                        "desc" => "Organize how you want the layout to appear on the homepage",
                        "compiler"=>'true',
                        'options' => array(
                            "enabled" => array(
                                "placebo" => "placebo", //REQUIRED!
                                "slider" => "Slider",
                                "services" => "Services",
                                "team" => "Team Members",
                                "features" => "Why Us and Skills",
                                "extra-info" => "Additional Section for Extra information",
                                'recent_posts' => 'Recent Posts',
                            ),
                            "disabled" => array(
                                "placebo" => "placebo", //REQUIRED!
                                'default' => "Default content"
                            ),
                        ),
                    ),  
                    array(
                        'id'=>'home-pagebuilder',
                        'type' => 'switch', 
                        'title' => __('Disable Home Options, Use Page Builder?.', 'flaton'),
                        'subtitle'=> __('Check this to disable options for home page content and use page builder to enter content', 'flaton'),
                        "default" => 0,
                        'on' => 'Yes',
                        'off' => 'No',
                        ),

                    array(
                        'id' => 'home-flexslider',
                        'type' => 'text',
                        'title' => __( 'Enter FlexSlider shortcode', 'flatonpro' ),
                        'subtitle' => __( 'FlexSlider for Home Page', 'flatonpro' ),
                        'desc' => __( 'Enter a FlexSlider shortcode to be displayed on Home Page', 'flatonpro' ),

                    ), 
                )
            );


            $this->sections[] = array(
                'title' => __('Blog', 'flatonpro'),
                'desc' => __('Blog options for site', 'flatonpro'),
                'icon' => 'el-icon-file',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(  

                    array(
                        'id'=>'featured-image',
                        'type' => 'switch', 
                        'title' => __('Featured Image', 'flatonpro'),
                        'subtitle'=> __('Check to show featured image', 'flatonpro'),
                       // "default"       => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                        ),

                    array(
                        'id'=>'single-featured-image',
                        'type' => 'switch', 
                        'title' => __('Single Post Featured Image', 'flatonpro'),
                        'subtitle'=> __('Check to show featured image on single post', 'flatonpro'),
                        //"default"       => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                        ),

                    array(
                        'id'=>'show-author-bio',
                        'type' => 'switch', 
                        'title' => __('Author Bio Box', 'flatonpro'),
                        'subtitle'=> __('Show Author information box below single post.', 'flatonpro'),
                        "default"       => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                        ),

                    array(
                        'id'=>'show-social-sharing',
                        'type' => 'switch', 
                        'title' => __('Social Sharing Box', 'flatonpro'),
                        'subtitle'=> __('Show social sharing options box below single post.', 'flatonpro'),
                        "default"       => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                        ),

                    array(
                        'id'=>'show-related-posts',
                        'type' => 'switch', 
                        'title' => __('Related Posts', 'flatonpro'),
                        'subtitle'=> __('Show related posts.', 'flatonpro'),
                        "default"       => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                        ),

                    array(
                        'id'=>'show-comments',
                        'type' => 'switch', 
                        'title' => __('Comments', 'flatonpro'),
                        'subtitle'=> __('Show comments.', 'flatonpro'),
                        "default"       => 1,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                        ),

                    array(
                        'id'=>'show-post-meta',
                        'type' => 'switch', 
                        'title' => __('Post Meta', 'flatonpro'),
                        'subtitle'=> __('Show post meta.', 'flatonpro'),
                        "default"       => 1,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                        ),

                    array(
                        'id'=>'excerpt-length',
                        'type' => 'text',
                        'title' => __('Excerpt Length', 'flatonpro' ), 
                        'subtitle' => __('Input the number of words you want to cut from the content to be the excerpt of search and archive page.', 'flatonpro' ),
                        //'default' => 100,
                        ),
                )
            );

            $this->sections[] = array(
                'title' => __('Social Sharing Box', 'flatonpro'),
                'desc' => __('Social Sharing Icons Setup', 'flatonpro'),
                'icon' => 'el-icon-share',
                'fields' => array(  
                    array( 
                        'id' => 'ss_box_facebook',
                        'type' => 'switch',
                        'title' => __('Facebook','flatonpro'),
                        'subtitle' => __('Show facebook sharing option in single posts.','flatonpro'),
                        'default' => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                    ), 

                    array( 
                        'id' => 'ss_box_twitter',
                        'type' => 'switch',
                        'title' => __('Twitter','flatonpro'),
                        'subtitle' => __('Show twitter sharing option in single posts.','flatonpro'),
                        'default' => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                    ),

                    array( 
                        'id' => 'ss_box_linkedin',
                        'type' => 'switch',
                        'title' => __('LinkedIn','flatonpro'),
                        'subtitle' => __('Show linkedin sharing option in single posts.','flatonpro'),
                        'default' => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                    ),

                    array( 
                        'id' => 'ss_box_googleplus',
                        'type' => 'switch',
                        'title' => __('Google Plus','flatonpro'),
                        'subtitle' => __('Show googleplus sharing option in single posts.','flatonpro'),
                        'default' => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                    ),

                    array( 
                        'id' => 'ss_box_email',
                        'type' => 'switch',
                        'title' => __('Email','flatonpro'),
                        'subtitle' => __('Show email sharing option in single posts.','flatonpro'),
                        'default' => 0,
                        'on' => __('Show','flatonpro'),
                        'off' => __('Hide','flatonpro'),
                    ),
                )
            );

            $this->sections[] = array(
                'title' => __('Social Network', 'flatonpro'),
                'desc' => __('Social Network Links', 'flatonpro'),
                'icon' => 'el-icon-share',
                'fields' => array(

                    array( 
                        'id' => 'social-digg',
                        'type' => 'text',
                        'title' => __('Digg','flatonpro'),
                        'subtitle' => __('Your Digg link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-dribble',
                        'type' => 'text',
                        'title' => __('Dribble','flatonpro'),
                        'subtitle' => __('Your Dribble link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-facebook',
                        'type' => 'text',
                        'title' => __('Facebook','flatonpro'),
                        'subtitle' => __('Your Facebook link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-flickr',
                        'type' => 'text',
                        'title' => __('Flickr','flatonpro'),
                        'subtitle' => __('Your Flickr link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-google',
                        'type' => 'text',
                        'title' => __('Google','flatonpro'),
                        'subtitle' => __('Your Google link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-instagram',
                        'type' => 'text',
                        'title' => __('Instagram','flatonpro'),
                        'subtitle' => __('Your Instagram link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-linkedin',
                        'type' => 'text',
                        'title' => __('LinkedIn','flatonpro'),
                        'subtitle' => __('Your LinkedIn link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-pinterest',
                        'type' => 'text',
                        'title' => __('Pinterest','flatonpro'),
                        'subtitle' => __('Your Pinterest link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-rss',
                        'type' => 'text',
                        'title' => __('RSS','flatonpro'),
                        'subtitle' => __('Your RSS link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-skype',
                        'type' => 'text',
                        'title' => __('Skype','flatonpro'),
                        'subtitle' => __('Your Skype link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-tumblr',
                        'type' => 'text',
                        'title' => __('Tumblr','flatonpro'),
                        'subtitle' => __('Your Tumblr link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-twitter',
                        'type' => 'text',
                        'title' => __('Twitter','flatonpro'),
                        'subtitle' => __('Your Twitter link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-vimeo',
                        'type' => 'text',
                        'title' => __('Vimeo','flatonpro'),
                        'subtitle' => __('Your Vimeo link','flatonpro'),
                    ),

                    array( 
                        'id' => 'social-youtube',
                        'type' => 'text',
                        'title' => __('YouTube','flatonpro'),
                        'subtitle' => __('Your YouTube link','flatonpro'),
                    ),

                )
            );

            $this->sections[] = array(
                'title' => __('Flex Slider', 'flatonpro'),
                'desc' => __('Flex Slider Settings', 'flatonpro'),
                'icon' => 'el-icon-screen',
                'fields' => array(
                    array(
                        'id' => 'flexslider_animation',
                        'type' => 'select',
                        'title' => __('Animation','flatonpro'),
                        'subtitle' => __('Select slider animation effect.','flatonpro'),
                        'default' => '1',
                        'options' => array( 1 => 'fade', 2 => 'slide'),
                    ),

                    array(
                        'id' => 'flexslider_slide_direction',
                        'type' => 'select',
                        'title' => __('Slide Direction','flatonpro'),
                        'subtitle' => __('Select direction to slide (if you are using the "Slide" animation)', 'flatonpro'),
                        'default' => '1',
                        'options' => array( '1' => 'horizontal', '2' => 'vertical' ),
                    ),

                    array(
                        'id'        => 'flexslider_slideshow_speed',
                        'type'      => 'spinner',
                        'title'     => __('Slideshow Speed','flatonpro'),
                        'subtitle'      => __('Set the delay between each slide animation (in milliseconds)','flatonpro'),
                        'default'       => '7000',
                      'min' => '0',
                      'max' => '10000',
                      'step' => '100',
                    ),

                    array(
                        'id'        => 'flexslider_animation_speed',
                        'type'      => 'spinner',
                        'title'     => __('Animation Speed','flatonpro'),
                        'subtitle'      => __('Set the duration of each slide animation (in milliseconds)','flatonpro'),
                        'default'       => '600',
                      'min' => '0',
                      'max' => '10000',
                      'step' => '100',
                    ),

                    array(
                        'id' => 'flexslider_slideshow',
                        'type'      => 'switch',
                        'title' => __('Slideshow','flatonpro'),
                        'subtitle' => __('Animate the slideshows automatically','flatonpro'),
                        'default' => 1,
                        'on'        => __('Yes','flatonpro'),
                        'off'       => __('No','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_smooth_height',
                        'type'      => 'switch',
                        'title' => __('Auto Height','flatonpro'),
                        'subtitle' => __('Adjust the height of the slideshow to the height of the current slide','flatonpro'),
                        'default' => 0,
                        'on'        => __('Yes','flatonpro'),
                        'off'       => __('No','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_direction_nav',
                        'type'      => 'switch',
                        'title' => __('Previous / Next Buttons','flatonpro'),
                        'subtitle' => __('Display the "Previous/Next" Buttons','flatonpro'),
                        'default' => 1,
                        'on'        => __('Show','flatonpro'),
                        'off'       => __('Hide','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_control_nav',
                        'type'      => 'switch',
                        'title' => __('Pagination','flatonpro'),
                        'subtitle' => __('Display the slideshow pagination','flatonpro'),
                        'default' => 1,
                        'on'        => __('Show','flatonpro'),
                        'off'       => __('Hide','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_keyboard_nav',
                        'type'      => 'switch',
                        'title' => __('Keyboard Navigation','flatonpro'),
                        'subtitle' => __('Enable keyboard navigation','flatonpro'),
                        'default' => 0,
                        'on'        => __('Enable','flatonpro'),
                        'off'       => __('Disable','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_mousewheel_nav',
                        'type'      => 'switch',
                        'title' => __('Mouse Wheel Navigation','flatonpro'),
                        'subtitle' => __('Enable the mousewheel navigation','flatonpro'),
                        'default' => 0,
                        'on'        => __('Enable','flatonpro'),
                        'off'       => __('Disable','flatonpro'),
                    ), 


                    array(
                        'id' => 'flexslider_pauseplay',
                        'type'      => 'switch',
                        'title' => __('Pause / Play','flatonpro'),
                        'subtitle' => __('Enable the "Pause/Play" event','flatonpro'),
                        'default' => 0,
                        'on'        => __('Enable','flatonpro'),
                        'off'       => __('Disable','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_randomize',
                        'type'      => 'switch',
                        'title' => __('Random Slides','flatonpro'),
                        'subtitle' => __('Randomize the order of slides in slideshows','flatonpro'),
                        'default' => 0,
                        'on'        => __('Yes','flatonpro'),
                        'off'       => __('No','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_animation_loop',
                        'type'      => 'switch',
                        'title' => __('Loop Slideshow','flatonpro'),
                        'subtitle' => __('Loop the slideshow animations','flatonpro'),
                        'default' => 0,
                        'on'        => __('Yes','flatonpro'),
                        'off'       => __('No','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_pause_on_action',
                        'type'      => 'switch',
                        'title' => __('Pause On Action','flatonpro'),
                        'subtitle' => __('Pause the slideshow autoplay when using the pagination or "Previous/Next" navigation','flatonpro'),
                        'default' => 0,
                        'on'        => __('Yes','flatonpro'),
                        'off'       => __('No','flatonpro'),
                    ), 

                    array(
                        'id' => 'flexslider_pause_on_hover',
                        'type'      => 'switch',
                        'title' => __('Pause On Hover','flatonpro'),
                        'subtitle' => __('Pause the slideshow autoplay when hovering over a slide','flatonpro'),
                        'default' => 0,
                        'on'        => __('Yes','flatonpro'),
                        'off'       => __('No','flatonpro'),
                    ), 

                    array(
                        'id'        => 'flexslider_prev_text',
                        'type'      => 'text',
                        'title'     => __('"Previous" Button','flatonpro'),
                        'subtitle'      => __('The text to display on the "Previous" button.','flatonpro'),
                        'default'       => __('Previous','flatonpro'),
                    ),

                    array(
                        'id'        => 'flexslider_next_text',
                        'type'      => 'text',
                        'title'     => __('"Next" Button','flatonpro'),
                        'subtitle'      => __('The text to display on the "Next" button.','flatonpro'),
                        'default'       => __('Next','flatonpro'),
                    ),

                    array(
                        'id'        => 'flexslider_play_text',
                        'type'      => 'text',
                        'title'     => __('"Play" Button','flatonpro'),
                        'subtitle'      => __('The text to display on the "Play" button.','flatonpro'),
                        'default'       => __('Play','flatonpro'),
                    ),

                    array(
                        'id'        => 'flexslider_pause_text',
                        'type'      => 'text',
                        'title'     => __('"Pause" Button','flatonpro'),
                        'subtitle'      => __('The text to display on the "Pause" button.','flatonpro'),
                        'default'       => __('Pause','flatonpro'),
                    ),
                )
            );

            $this->sections[] = array(
                'title' => __('Light Box', 'flatonpro'),
                'desc' => __('Light Box Settings', 'flatonpro'),
                'icon' => 'el-icon-idea',
                'fields' => array(
                    array( 
                        'id' => 'lightbox_theme',
                        'type' => 'select',
                        'title' => __('Lightbox Theme','flatonpro'),
                        'subtitle' => '',
                        'default' => '1',
                        'options' => array(
                            '1' => 'pp_default',
                            '2' => 'light_rounded',
                            '3' => 'dark_rounded',
                            '4' => 'light_square',
                            '5' => 'dark_square',
                            '6' => 'facebook'
                        ),
                    ),
                                        
                    array( 
                        'id' => 'lightbox_animation_speed',
                        'type' => 'select',
                        'title' => __('Animation Speed','flatonpro'),
                        'subtitle' => '',
                        'default' => '1',
                        'options' => array( '1' => 'Fast', '2' => 'Slow', '3' => 'Normal' ),
                    ),

                    array( 
                        'id' => 'lightbox_slideshow',
                        'type' => 'spinner',
                        'title' => __('Autoplay Gallery Speed','flatonpro'),
                        'subtitle' => __('If autoplay is set to true, select the slideshow speed in ms. (Default: 5000, 1000 ms = 1 second)','flatonpro'),
                        'default' => '5000',
                        'min' => '1000',
                        'max' => '10000',
                        'step' => '100',
                    ),

                    array( 
                        'id' => 'lightbox_autoplay_slideshow',
                        'type'      => 'switch',
                        'title' => __('Autoplay Gallery','flatonpro'),
                        'subtitle' => __('Check to autoplay the lightbox gallery','flatonpro'),
                        'default' => 0,
                        'on'        => __('Yes','flatonpro'),
                        'off'       => __('No','flatonpro'),
                    ),

                    array( 
                        'id' => 'lightbox_opacity',
                        'type' => 'text',
                        'title' => __('Background Opacity','flatonpro'),
                        'subtitle' => __('Enter 0.1 to 1.0','flatonpro'),
                        'default' => '0.7',
                    ),

                    array( 
                        'id' => 'lightbox_show_title',
                        'type'      => 'switch',
                        'title' => __('Title','flatonpro'),
                        'subtitle' => __('Select visibility of the title','flatonpro'),
                        'default' => 1,
                        'on'        => __('Show','flatonpro'),
                        'off'       => __('Hide','flatonpro'),
                    ),


                    array( 
                        'id' => 'lightbox_overlay_gallery',
                        'type'      => 'switch',
                        'title' => __('Show Gallery Thumbnails','flatonpro'),
                        'subtitle' => __('Check to show gallery thumbnails','flatonpro'),
                        'default' => 1,
                        'on'        => __('Show','flatonpro'),
                        'off'       => __('Hide','flatonpro'),

                    ),


                    array( 
                        'id' => 'lightbox_social_tools',
                        'type'      => 'switch',
                        'title' => __('Social Icons','flatonpro'),
                        'subtitle' => __('Check to show social sharing icons','flatonpro'),
                        'default' => 1,
                        'on'        => __('Show','flatonpro'),
                        'off'       => __('Hide','flatonpro'),
                    ),

                )
            );

            $this->sections[] = array(   
                'title' => __('Typography', 'flatonpro'),
                'desc' => __('Typography and Link Color Settings', 'flatonpro'),
                'icon' => 'el-icon-font',
                'fields' => array(
                    array(
                        'id'=>'custom-typography',
                        'type' => 'switch', 
                        'title' => __('Enable Custom Typography', 'flatonpro'),
                        'subtitle'=> __('Turn on to customize typography and turn off for default typography.', 'flatonpro'),
                        'default'       => 0,
                        'on' => __('Enable','flatonpro'),
                        'off' => __('Disable','flatonpro'),
                        ),    
                      array(
                        'id'=>'primary_color',
                        'type' => 'color',
                        'title' => __('Primary Color', 'flatonpro'),
                        'subtitle'=> __('Select your Primary Color Scheme.', 'flatonpro'), 
                        'sanitize_callback' => 'sanitize_hex_color',
                        'default' => '#FF7E20'
                        ),
                      array(
                        'id'=>'secondary_color',
                        'type' => 'color',
                        'title' => __('Secondary Color', 'flatonpro'),
                        'subtitle'=> __('Select your Secondary Color Scheme.', 'flatonpro'),  
                        'sanitize_callback' => 'sanitize_hex_color',
                        'default' => '#272727'
                        ),   

                    array(
                        'id'       => 'opt-link-color',
                        'type'     => 'link_color',
                        'title'    => __('Links Color Option', 'flatonpro'),
                        'subtitle' => __('Only color validation can be done on this field type', 'flatonpro'),
                        'desc'     => __('This is the description field, again good for additional info.', 'flatonpro'),
                        'default'  => array(
                            'regular'  => '#ff4200', // blue
                            'hover'    => '#ff4200', // red
                            'active'   => '#ff4200',  // purple
                            'visited'  => '#ff4200'  // purple
                        )
                    ),

                    array(
                        'id'        => 'dummy-typography',
                        'type'      => 'typography',
                        'title'     => __('Font Preview', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'color' => false,
                        'subtitle'  => __('Preview Google fonts using this field. Sets nothing, just preview.', 'flatonpro'),
                        'default'   => array( 'font-family' => 'Abel', 'font-size' => '24px' )
                    ),

                    array(
                        'id'        => 'bd-typography',
                        'type'      => 'typography',
                        'title'     => __('Body Font', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the body font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#333',
                            'font-style'    => '400',
                            'font-family'   => 'Roboto',
                            'google'        => true,
                            'font-size'     => '14px',
                            'line-height'   => '1.4',
                        )
                    ),

                    array(
                        'id'        => 'nav-typography',
                        'type'      => 'typography',
                        'title'     => __('Navigation Font', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the navigation font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#ffffff',
                            'font-style'    => '400',
                            'font-family'   => 'Roboto',
                            'google'        => true,
                            'font-size'     => '14px'
                        )
                    ),

                    array(
                        'id'        => 'h1-typography',
                        'type'      => 'typography',
                        'title'     => __('H1 Font Properties', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the h1 font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#333',
                            'font-style'    => '400',
                            'font-family'   => 'Bree Serif',
                            'google'        => true,
                            'font-size'     => '47.6px'
                        )
                    ),

                    array(
                        'id'        => 'h2-typography',
                        'type'      => 'typography',
                        'title'     => __('H2 Font Properties', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the h2 font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#333',
                            'font-style'    => '400',
                            'font-family'   => 'Bree Serif',
                            'google'        => true,
                            'font-size'     => '30.8px'
                        )
                    ),

                    array(
                        'id'        => 'h3-typography',
                        'type'      => 'typography',
                        'title'     => __('H3 Font Properties', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the h3 font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#333',
                            'font-style'    => '400',
                            'font-family'   => 'Bree Serif',
                            'google'        => true,
                            'font-size'     => '23.8px'
                        )
                    ),

                    array(
                        'id'        => 'h4-typography',
                        'type'      => 'typography',
                        'title'     => __('H4 Font Properties', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the h4 font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#333',
                            'font-style'    => '400',
                            'font-family'   => 'Bree Serif',
                            'google'        => true,
                            'font-size'     => '21px'
                        )
                    ),

                    array(
                        'id'        => 'h5-typography',
                        'type'      => 'typography',
                        'title'     => __('H5 Font Properties', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the h5 font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#333',
                            'font-style'    => '400',
                            'font-family'   => 'Bree Serif',
                            'google'        => true,
                            'font-size'     => '18.2px'
                        )
                    ),

                    array(
                        'id'        => 'h6-typography',
                        'type'      => 'typography',
                        'title'     => __('H6 Font Properties', 'flatonpro'),
                        'google'    => true,
                        'text-align'    => false,
                        'subsets'   => false,
                        'line-height'   => false,
                        'preview'   => false,
                        'subtitle'  => __('Specify the h6 font properties.', 'flatonpro'),
                        'default'   => array(
                            'color'         => '#333',
                            'font-style'    => '400',
                            'font-family'   => 'Bree Serif',
                            'google'        => true,
                            'font-size'     => '16.1px'
                        )
                    ),
                )
            );

        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'flatonpro'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'flatonpro')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Theme Information 2', 'flatonpro'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'flatonpro')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'flatonpro');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'webulous_options', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Theme Options', 'flatonpro'),
                'page' => __('Theme Options', 'flatonpro'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyDKSdJkWKtewIhdI_Y0FRk01qREugZEpeQ', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );            
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.		
            $this->args['share_icons'][] = array(
                'url' => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon' => 'el-icon-github'
                    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon' => 'el-icon-linkedin'
            );



            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                //$this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'flatonpro'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'flatonpro');
            }

            // Add content after the form.
            $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'flatonpro');
        }

    }

    //new Redux_Framework_sample_config();
    global $sampleReduxFramework;
    $sampleReduxFramework = new Redux_Framework_sample_config();
}


/**

  Custom function for the callback referenced above

 */
if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

/**

  Custom function for the callback validation referenced above

 * */
if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation

          if(something) {
          $value = $value;
          } elseif(something else) {
          $error = true;
          $value = $existing_value;
          $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;
