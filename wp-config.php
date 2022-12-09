<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
define( 'AUTH_KEY',         'CXZ9.>:qQt>wVyUzOz5OEhq,3d3M/09<xM[GE:L<kHsit+D:1f{-$oPlUqks?<xq' );
define( 'SECURE_AUTH_KEY',  'w]-7Y?0/9r1J@<0n~$6@)iPOcQyx 6Z.qYh%nqNx4TU2w?+;6UF+_a:uFekYK#u=' );
define( 'LOGGED_IN_KEY',    '[r&^nxbdXLd`BEVrH8_<k3jeo!WNe!Ra9.~.m?f,FUSPH9qFEWwW0u7h#kX${we_' );
define( 'NONCE_KEY',        'b1[IKm4Ru0 ebt+U88tM-/1@1,.40g4jj)8J$FZR8moRNq$>~16A3ZUm3KS.CdT#' );
define( 'AUTH_SALT',        'Mm~Wfn]+*ey9gZsiz`v~t9Mn?:$3G% cMuYma[36vx:Iql!7!TL|s6|)Ey1H/w~S' );
define( 'SECURE_AUTH_SALT', 'R8t48|OHEh]oo0uu*^X_pK2<4Tk:hqXd`Rw/khfE]TW*eZkEh?$<9m&B=MY3)%y6' );
define( 'LOGGED_IN_SALT',   'Q.:k*IXbVVJSHiOIg|<{|PI^vx,2k%4t8O|D6IzP,6I0SradAMLK`jh;_WBlGvMO' );
define( 'NONCE_SALT',       '2nX##y^2aPfp)>v$I.IY9:AGE_w*85?BwH):OG*oS_9.l5TLlTU;@!JSfqb~.%rC' );
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
define('FS_METHOD','direct');
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';