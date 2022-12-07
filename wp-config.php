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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'jBE5k$Q1@?v?Q5{3K;>]#PG7>!$h%KO$_BO1} 5QcJ9Nn<(cUpScKoAY;sm!$,>>' );
define( 'SECURE_AUTH_KEY',  'Lv XFrSR=uimqxpr;V-H=ms/[fpE.1{M6}A+c/8#]{lUd|AK}t5>,dI>k*WAU q;' );
define( 'LOGGED_IN_KEY',    'MGtqcA2nR)3JgGM8/e8vxLtF]PR}|q#lqjzc@L&N,qZ?HI(9Fp!`:8pk1U94z>`U' );
define( 'NONCE_KEY',        '3d)?Wls}&Co4)$,T*X*2Ei8MFM=Nww$Y&Q*.BqWH%I[x9tID?UQ3SekI#U[$c&]4' );
define( 'AUTH_SALT',        '<{G`_G|!_SVn; F:fUn!gQGxm`Q7>8o=uN/m]So^vvw?BgpIdto{W>d@ydj3_#l[' );
define( 'SECURE_AUTH_SALT', 'Ksbx?XQh?,Boy$2EJzsk<7dq^t]OV$w2[V&:g_sRJQqbAu+oaM!(+c6*Xf2bV6^4' );
define( 'LOGGED_IN_SALT',   'y!uikbJq=}UEV:I(;V8V9}&*B.h_[VJ2Lz!lW]3q&1V77G8i7KThBk7jox&.)7Kv' );
define( 'NONCE_SALT',       '3.4Z<.{%<P9XH(ljud)XD,oAOcN[idvdwwhl}q/^/t].XY.&<Ts+@JgrIR.Ls[Sv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
