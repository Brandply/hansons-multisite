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
define('DB_NAME', 'hansons');

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
define('AUTH_KEY',         'qv.v#<u!]ZN<m}5]u13(i=*@aQ&kByg-%1JE74:0N,Y>Um&y@yKzc*@2@E]X($m*');
define('SECURE_AUTH_KEY',  '}{WRvYBAuQp%g;0bN~-v{P+k|ebwF+7dJ^wW1%O1 /%c%9Xf%lyJE<_sd2529)/T');
define('LOGGED_IN_KEY',    'ej(&}V?}.mS>al/h+5{Oza$3QdV-|MvCC6#bV.<w`6?<>=iTC]!E:t1jY5PD;OeI');
define('NONCE_KEY',        'GJfm[|YF-GU-UYLI8>5t&L!ANKAA`Wy+ccTc6@flE#g_Fv`O[c)Ps;-RfX+.v{+*');
define('AUTH_SALT',        'CGI9r|;q{|J%6dR45Ev4ARd+mq|yb+V*fur2@2(kR,|~VFtgY{h|2n8[1NL?LWO.');
define('SECURE_AUTH_SALT', 'xANef|t`(c_t|QK>g6175s-8ObG,-&D>Fqs x7r5K;JEaKx#0h>z]yLq?Lm *|Nd');
define('LOGGED_IN_SALT',   'ZX?q0L/gJ-4R@!JY{zMq=A]z6=Ts:PS{!yt(e/{5aVu|9{WO])))eaJ$fz.S@-E/');
define('NONCE_SALT',       'a$_N>j-,h= |z[4`~77S*o`>aV:wqwfEsCT|+^uDot[#Nyy}q6w]=U&iC}]M:= ^');

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

/** allow multisite **/
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/hansons-multisite/wordpress/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
