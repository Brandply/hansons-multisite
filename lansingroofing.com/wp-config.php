<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lansingroofing');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'R94<-@@S@^tw;Mtk6MS-^v1/Q*6,W:>Z%PuW>6ao6+-.h /pe(ynZ($2[5bymj/v');
define('SECURE_AUTH_KEY',  '1.&b?{CCq6pn#qKj3(:&Z[j707;<3I{zAsD^AB_<}oo%C,w7PG{e3B^mw~.+Y*+r');
define('LOGGED_IN_KEY',    'nh<gtzF<d7G/+]66h+3>[tnya{*#Q]_(j.w&cBLF(1m|At7~].XJ>iImanATE!Sw');
define('NONCE_KEY',        '7?@]<rQx=e5^tG:g .++aN3vi:ct<gq9T#KsdUVz5BK_P/?(+e )n;tlYe5_L~3P');
define('AUTH_SALT',        '5M`i&C|_)2aDfEO_WTv3T!t |+7?u<K>:%9y57{}%-sxkAMa_H;]HiYu[%eqU)@Y');
define('SECURE_AUTH_SALT', 'vYxLim p;;J5?!cO?+7e(OYD8$Cq:/!O#h*4u?)%kC2E+|8+t|L]|AK+DbrfS6`1');
define('LOGGED_IN_SALT',   'z8V+*&>isA(Ma<]g?HitR^B6!fEJp^>%DTmg+MK#rtTK?i,9VunszJJ-+-t]Bj!u');
define('NONCE_SALT',       'jq%D@cPNx8+*Xy?U^V[LL<p`(TeZH{t:+U> b!uI{ZC!w3]wXZf+C-6;^Q4+U%1y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
