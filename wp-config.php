<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mys_wordpress' );

/** Database username */
define( 'DB_USER', 'mys_dbuser' );

/** Database password */
define( 'DB_PASSWORD', 'yMdhLh0E2d6I' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'K<Jf0)EV`vu0IHp(ne%=73B3j% WmP;*G47tLPq8~tE2E$)AVLZqk,vj.p`/.(Z[' );
define( 'SECURE_AUTH_KEY',  'BK%@[`l|66aX~+tXio646@tV?sjXI@fvJ]<j-.0|;U!>tHS~:((E:; V01>u*rhB' );
define( 'LOGGED_IN_KEY',    '!fuHpx9!Y$NgMZusnd/-NoDvx, zAOkHjZMt`<lzU@K$(9Bi2g8[T2]wwqZY-[40' );
define( 'NONCE_KEY',        'U3<k _V=y]50#7z#P]?g|}+C%qBvYL1~/N~05E*(wE#0sn5LEmWHeP$WaSl;7bb&' );
define( 'AUTH_SALT',        ' Lb;6*mP54ZVQ?(Aw|Q|}zc3gG|b$<$0{N)xrAH:]`YZKiA_PCpa1(%P6s4DUeGv' );
define( 'SECURE_AUTH_SALT', 'r3g1(]4p0L32 p%-jxj^:1; 0e(pG6?:1oOW>&XMX3>>5](l=sS?EakwZj5;li}Y' );
define( 'LOGGED_IN_SALT',   'YZ^-yUQz]L3%wGBU<~Gb7J.WDK+;CO]2l3qmnVp2-I__^-=hYV9UtMI,CIXD2=^p' );
define( 'NONCE_SALT',       '1>XYT#*09~h4Fy1eL-rloNv-?i}Nn6Swsa5 ^|PeJ:aAsyd?}T,y zXC6pdb2`Wo' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mys_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'FS_METHOD', 'direct' );
define('WP_POST_REVISIONS', 3);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
