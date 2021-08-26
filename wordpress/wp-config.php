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

define( 'DB_NAME', 'bitnami_wordpress' );


/** MySQL database username */

define( 'DB_USER', 'bn_wordpress' );


/** MySQL database password */

define( 'DB_PASSWORD', '43ec4eb9702d763f753f92c0bb671aa5d19ae4695a9ca3a49a8250ffd8e792f6' );


/** MySQL hostname */

define( 'DB_HOST', 'localhost:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         'raYZapz`Re%S~kjvOh4rUHhq$!UB?.sUM!AFk?KI7S77@w$>4ie^S+o>}%+rS8i[' );

define( 'SECURE_AUTH_KEY',  'i{P `#a9~XLY{&#X&0XhgIxYp,-bX$-sSlMw A5gaQkM$YG]j([B{kIfZSV+;w|l' );

define( 'LOGGED_IN_KEY',    '4s`R2SNnX[G@~zQn!t5@%Gg`Tu:A7&f3&mrC5q-3qZC!D,Uw*REwcg3fc_M!T%>{' );

define( 'NONCE_KEY',        'RgvyHOe7eUp];E?LIxP7Ye60sF5aqA`20LJW!+zHl9Ef5-M/*[:Y0bc0m9{>=!a%' );

define( 'AUTH_SALT',        ']{sH%G6^;.YENJ[?]@4e(-}wOC%,`05U<NX.mcikJ.^rED@A_3P1Lz|<R5RQ>onA' );

define( 'SECURE_AUTH_SALT', 'b~cP]qgHRps<z|:]XFDX1LX{BjhSKI%7}mxre4=ts$nNoy|ngF jL{$d;4qn?uUE' );

define( 'LOGGED_IN_SALT',   'v[wCBFowJ#Z-a#V[ Cj1Z?o[[uZJTogp?e=>UgqyB3%59?R.UgU/(D7~gYvFT*Ht' );

define( 'NONCE_SALT',       'd8f4ZFTw+&=d!Vsio2qZA()m|5GKj5#fgpvySAh##E>Nty{-Og)Ed8 dt%EJpM&2' );


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




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
