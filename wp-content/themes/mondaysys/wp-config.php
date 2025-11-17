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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define( 'WPCACHEHOME', '/home/u579801203/domains/staging.mondaysys.com/public_html/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'u579801203_EsQcP' );

/** Database username */
define( 'DB_USER', 'u579801203_gfH4D' );

/** Database password */
define( 'DB_PASSWORD', '8cIgh1cBfi' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'J0!X;+rPuY|SGw$gx_hf~?$,3Dm8Fu(|-XJGJ)J3IIUENh6[*rv@hBpHAk;:inyP' );
define( 'SECURE_AUTH_KEY',   'sPE.|jJ#a>i+qi?G`KDQQDI1_i]D8`&_}mZ>Uy^mC0R?w?Q,0>2i(~kL)0AJ>CxJ' );
define( 'LOGGED_IN_KEY',     'AEg$4]GR25(j<&Iy?1MK/~3il]v>Ewkp @**Qz|RO}=Aq!)j0o)9:sZ 4*`ECjvn' );
define( 'NONCE_KEY',         '`^]C~N8n L;_0T{6f=|aLx/X.N0V7@C%28Jj/Y6b<hst@Xz3&WCM4p`;#6<x}4*{' );
define( 'AUTH_SALT',         '<BMhBZZo3Pj4uZ7;0sPPxwcagARy8*9-P7=ka$Ks;_C_c,};NHMBse`pS$V5wK}Q' );
define( 'SECURE_AUTH_SALT',  'eCVo,JWG`u-}rABk2APjbe;y%)#?+|q;v4khk80/k.Vk[9Vuo^8E_rZ1%4x7P+?<' );
define( 'LOGGED_IN_SALT',    'M99{bea{vnIhk=nU2maHZcA4FRK{V*t?gye<>AG0;lQ3PXtSmd@**yyq/Aj%YCUb' );
define( 'NONCE_SALT',        '#Iwtcyn) .$JghD_*c`$6lMSdaP:;RR$F.6#12yNGa^+WN)%}eKnVMlPAoIV^(,o' );
define( 'WP_CACHE_KEY_SALT', 'GMqi omK<K%NmrbTrQ8`oFhn:n~vd1lM(k/$Ka8n;A></_9byQvp2j=wGAX~}/ku' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '71ba9189a66ea55527c93a2eeec3fa48' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
