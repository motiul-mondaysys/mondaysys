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
define( 'DB_NAME', 'mondaysys' );

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
define( 'AUTH_KEY',         'PP;Hg1X!GP&c=}I0=Q[[-~jY?f]j<?{?@Bq)SUj2 EWdrN E-*4F!my8,TzA_HVL' );
define( 'SECURE_AUTH_KEY',  'lcfA$9rKYv E!HggKA=q3gpy/][ZyHhewn{+Q^F!bu-$.[3{$~^|f|4ls&vSLU!l' );
define( 'LOGGED_IN_KEY',    'yCKcWf ZX1{r/}hY}0E~,}Y=0Qmk-:N^m&ni(r%t$hbeNbjb7I#&kZj+RKiy5pJx' );
define( 'NONCE_KEY',        '0}(f32EZb_c:,$<CLp;swGdzc1LL,lV4%qzxjit6[MgJ3{!>Bie9]Y2UX#S|KRA^' );
define( 'AUTH_SALT',        '9{evUEzl>9sbqixP[4@!rkkR4gmKbT}Q:]+6Zo$Je{V=caW,G,g&PF4D!D73RYgZ' );
define( 'SECURE_AUTH_SALT', 'xWwt8g2,{rhm<ne5f(m%qmO+{6osw{s?N`pavDBdqX|t,i <b~dVAFY)PAVkXD?i' );
define( 'LOGGED_IN_SALT',   'Y|^cC~pj,H Ni$t?37*x-53gz8.Ai`YZ=EQ+ba)V/uMJ9Mpw -{]4Stf>xqzB$o(' );
define( 'NONCE_SALT',       's.`yNi,fIrN7ut4R<du9#7=,wc}lX8 P>vTbAXlE(f}:lJ8`5b96`&]wV_sS;#cS' );

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
