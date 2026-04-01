<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nail-shop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

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
define( 'AUTH_KEY',         'l?l)W#LxJFO>#RD3j~ETf_a1{a[A@Cati!3,| r^vIa2,}6b@*~m1#vd+X*Sc$(S' );
define( 'SECURE_AUTH_KEY',  'v:R/0@8z[tw!$3->3%kRoE{w@qOS8iQM@k@};kC*WjHZbb#/@xVm$3sv0l!q9H-<' );
define( 'LOGGED_IN_KEY',    '=QJz1a.4fOr/lTsGeEYY&GH5Xtn%zH6ti|oG1o5y_>.kgvQv%%7Md{K:fOF]/X{6' );
define( 'NONCE_KEY',        ' +-1I5#^w3>g#$k#@VLWt7AGaB:AL83rs6Wn[5:~W,Cd^057D!y(qM{P0PQ(LE$4' );
define( 'AUTH_SALT',        '9HqBqMBPVJa9Yo^Vo/gWsvy@_3P_&91e>IC(sC/8bCfGGn>AR]U*yJL/;ee}D.B<' );
define( 'SECURE_AUTH_SALT', '& ?D.!3?B?$kiQ_, x_.2/UX$IzzJE^_dwf<pc,f~F*lP!D8+g>ak(>A/}p`v%yu' );
define( 'LOGGED_IN_SALT',   'M({jli~@zmZsQ|a44Dewr]krMaZa8L&s#uG8^iuVj$4*@i;18~jUv*i!YT}jKNJO' );
define( 'NONCE_SALT',       'DIwYx&*8P|l|4btnTOQ8=|$Lu=lLA=u#[PafLQ 0RfvqWx^&7KV>[Tf;/o]kHDHW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
