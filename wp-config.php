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
define( 'DB_NAME', 'wp_morley' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'lkWz3komhrvneIJjNxdDuvmnrzheOL4gw8ykU3kETXZ3CjBeJ9kvnbNXNRSaHcny' );

/** MySQL hostname */
define( 'DB_HOST', 'nick' );

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
define( 'AUTH_KEY',         'TupX$4=)3gHQD.v2Z=ZD>ci{G9Z:?W[Dc1> TqXo-F/,)bZj6_}8)LslPdnxYw+7' );
define( 'SECURE_AUTH_KEY',  'Qg=4qOvT5gg5sH#84KYYHdj9aV)Ye?z>)NDrJ<i8D#&SJ0|;^nmiGB{~t:D1~2*F' );
define( 'LOGGED_IN_KEY',    '%X=l@OS|K1]>TOf4e0yHy2YtHet%v[v;PH~N;laAZ-;1~9#)2e*p:*N`YyTfy&%J' );
define( 'NONCE_KEY',        '=q}.{Q2ICOq[w&f_ZOqa_O6]ii~qJ5L1Z!Cm3jh64S*X(t/E*|%&6{$`1,zUbi`3' );
define( 'AUTH_SALT',        '?V-X(i()ltAf9n?Qe}}p2b&)(vk`m~3]E$9MN4[xtNSzVH<D{IS&[VnauSK-Tc9m' );
define( 'SECURE_AUTH_SALT', '|-Z=T&oZCqyXX V/0+ZrG/Ul_e^FzHvly7Un-w>KRr+^]>.@debj,KdT1/2$Ecsn' );
define( 'LOGGED_IN_SALT',   'Ka<C1E-QhM|U94$jJL(jK3|.0nrg7h%R>|;l:#<M!Ev2NI:%6]_nl:4gd)+($=[T' );
define( 'NONCE_SALT',       ',jeg=vu:HP[-pFMD YPB=)53cTZ9-fq|u[=%ct#MG.FGyfF7X>C$25R_foTlz[@J' );

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
