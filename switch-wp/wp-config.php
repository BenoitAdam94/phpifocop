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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'Uwrwzoge3cGLn1g=x|yiQn&.Hy^z^E0]gG.K6K`Wb2&t%Oj{`oISX<zh1i)V}4u_' );
define( 'SECURE_AUTH_KEY',  'o#TC#&R!Q+Ytl|/E44Y&*Tob/c9@TG^%VvD-&_R;Rgu?<OZx4ji[qik^ EB?bH!G' );
define( 'LOGGED_IN_KEY',    ',K^1Qr]i{j`zH%k_IB-&]+]43EqCqu}+Piu$ot76>[N3TEFBj6=VNpBJ;nmU}K35' );
define( 'NONCE_KEY',        '89E$L30^`U.leSK~O@@!Kpjz6|wNvJ_kaYvMS?x;[&`PUHLFST37628H!c4JQ|~5' );
define( 'AUTH_SALT',        'qLiu7 -MJ1KjVnihKO_hIwZjs|PTf0np/i5XcHWwiN`wj/I)).T7)g0i$#N8*CW[' );
define( 'SECURE_AUTH_SALT', '$D<n@t04;Cxj+`m494V.F5;/d<wn-cd}#fY5tC;0.?$b=hzQJ.aF9|V5D$g~ZOd!' );
define( 'LOGGED_IN_SALT',   '+rCoVFv=e{k=AT6A_|P[R}c<96V-P`q,|t<tZ6eO4<P}]:vUv LmM%NnbM*~^<b>' );
define( 'NONCE_SALT',       '}MM88;.a/+HZZ!&vAv@2w~)$$T2+:E%{1H}r3Z&Bjw9=X6{i,h;k!hi*L>WB!GxQ' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
