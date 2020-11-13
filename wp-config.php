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

//Enable error logging.
@ini_set('log_errors', 'On');
@ini_set('error_log', '/home/customer/www/gosparky.co.uk/public_html/wp-content/elm-error-logs/php-errors.log');

//Don't show errors to site visitors.
@ini_set('display_errors', 'Off');
if ( !defined('WP_DEBUG_DISPLAY') ) {
	define('WP_DEBUG_DISPLAY', false);
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db7tp2pyg3gzhw' );

/** MySQL database username */
define( 'DB_USER', 'uupuhb49jkn8t' );

/** MySQL database password */
define( 'DB_PASSWORD', 'f5r3793bdp55' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Q?Z|p[nO.=|H/`Y<f:}0Jux.oCusJ6phwAUM]R jp<0.Pqr-db$Hb,s!eKVAW08o' );
define( 'SECURE_AUTH_KEY',   '2EwX{?/Hs*KmXMW}f#wgpyye)~0t8UHJQNAeuS.%uUx2MPQ4y[c+OP@8 }s`gGzT' );
define( 'LOGGED_IN_KEY',     'LqYvir`Uif;6fNf~!:GKCYNki8_RNZok6zY!GBRVZ`nhQ0NV/XrWuIuqF%-9lB/>' );
define( 'NONCE_KEY',         'nA|6De.o&ih+9h&!~_GguX3#k(gs!mo2E`%q^(9]K*DXwq=+9:) (;)v>Dh<ZLMR' );
define( 'AUTH_SALT',         '@Kp7_2N@+@a?kSx c*Z-QeYPakV0eK1R0y%_YBFr,*w~%|:>MWZ;R*|bWem#|0zc' );
define( 'SECURE_AUTH_SALT',  '!eAL0!?#L=$03X#Bh,8-J+O>_%m5hMW#x=ILeS&] jFt2]-;E?7t@j^QR%+HHD|7' );
define( 'LOGGED_IN_SALT',    'Ka7bQ*]5KKj>jlTRU_rj92xjbUv }EZ#)lU22-?,fc>TkL(HpsG|nW=bP&Qp,*#`' );
define( 'NONCE_SALT',        'fKAjdQvPXA_6NVhBXW+>9K,p[]wx@~m[OFz [QrD[Wt&b8JH{Dexdn$x8;sy1yXu' );
define( 'WP_CACHE_KEY_SALT', ']5aVrjtrGFU+R8&/gO26;emoD2VrM~QLhpgyxIEKsd@l$Jg](+4j/KJ>J5Q}QUjK' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tsy_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system

//Enable error logging.
@ini_set('log_errors', 'On');
@ini_set('error_log', '/home/customer/www/gosparky.co.uk/public_html/wp-content/elm-error-logs/php-errors.log');

//Don't show errors to site visitors.
@ini_set('display_errors', 'Off');
if ( !defined('WP_DEBUG_DISPLAY') ) {
	define('WP_DEBUG_DISPLAY', false);
}