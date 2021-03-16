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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 've' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'N%cQjlK)IPKd5NTxQBmt|{^`(av4xy0vrZ9e1%m}%0RnFAN90-apt^_y{dDNNKoa' );
define( 'SECURE_AUTH_KEY',  '-c$ZsTTfj[l;1v$KS%0lm_[d<*A1V&!2T# .}1(uG,(YW2;Bej-)+Vm~4?HXdL)3' );
define( 'LOGGED_IN_KEY',    '~o8>.@Yj/Y[NUcNM?(9-/c5IFCY{#{fx]j(?pH!^E[,F^?=BGwQy;]+U,T)@b%-/' );
define( 'NONCE_KEY',        'tgu=A&Un_}Hgm0[3T,?<`/7@O;5jHa_yUTd_+5GQ61sJ6nhSm?A2=A&+V-Y4j_*_' );
define( 'AUTH_SALT',        'SS|Dr_]bR|J#QzlyaCRSSv7Rq5~x=H@p?}aM$<9 VzgA{H0j5>UR_,Xz,]g$Z3,A' );
define( 'SECURE_AUTH_SALT', ':Djk]`6~liQ?Zwc2()a:0~JuyayL@LKbi2E?`vrA%@9z$;wXe(c#.$DDHqeZ I).' );
define( 'LOGGED_IN_SALT',   ' Yh(+XHJj]^;K@=aEJ{~> uI/8O9[Zt&pFH`}6ta|tl!E,Po:Z:2POM|sWh}k4U#' );
define( 'NONCE_SALT',       'ONdJ4(y,F]By1Dqf1va2K>&gO5nP| ,}*3By#iz{u;-W7,EpPBC-j -2bCNA`P_.' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
