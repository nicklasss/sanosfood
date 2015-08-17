<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'sanos');

/** MySQL database password */
define('DB_PASSWORD', 'Htoluis1957');

/** MySQL hostname */
define('DB_HOST', 'sanosfoods.cej93l53hghl.us-east-1.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'f<1d3SRCX3JID}gLG`T)5GIw+ulC4FpL,g57UoZ}H6DYc]c}p3d:Fb]0x5Fg-)5q');
define('SECURE_AUTH_KEY',  'Y4WI2Vv8||UE_>P{+Ll@;|K[X-l[x>&&.ok]4^.%t/wy$TgpSD?-/P#RV2Fuvav1');
define('LOGGED_IN_KEY',    '}n]T6ufw#y[swfkd!q?&5)vak9n}LSz-<~<<fPe+V7OL@Zf`C[cz[YN~i-F|kd_-');
define('NONCE_KEY',        'c,lL,Q;hAXS^JNv!uq2]Ue4m|B>, #+M>Dk|Vj#$5h:LR4L)z2amL2 7$h[lRSxH');
define('AUTH_SALT',        'BLRE<MLaB}hqBQ8h$a]L,XN|Tx{+5M|;;u*,JQlI+_Ms|znrt`@7V@~]/D[G][TO');
define('SECURE_AUTH_SALT', 'Z_Kt4tof{BrOI~R>GnX jeh@it[BLpiD] n_5Kt1OtLMW1G&dJDC7HNi+wjYr!EF');
define('LOGGED_IN_SALT',   'CXn_7ja.k,,Sr}UI!Yg=bAs500 @3`ZI.b!*pW@B1*;yE;*Tq|y.vVSpB+00QI#`');
define('NONCE_SALT',       '(P0LKlu >@8?B!MplVx9m1f<HK`&2]^e&O4/$ljyrKt[ MQ7!orfUL*0=j`,PP7o');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
