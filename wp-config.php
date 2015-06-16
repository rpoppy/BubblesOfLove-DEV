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
define('DB_NAME', 'bubbles');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'YBfqDVP7nQMGjJbn');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD','direct');

define( 'WP_MEMORY_LIMIT', '64M' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zz>`V/pO<EWW}=`1M_m]DQn{ bse}fqYI2{+0b)ypEPMu;2Zy^[Bldlm=M.IFlrA');
define('SECURE_AUTH_KEY',  ',W#~1^A><8wCV=r+i2gD61aZk%$is[--&q{%Ck?)h<NMijK7B$-86<@aW4<KU>wT');
define('LOGGED_IN_KEY',    'ERT.W0St}iWX*[#hlVK6&|ht+6StByz&&FHnLm*4%=+J,!__25nv+;MKG}~zVYpF');
define('NONCE_KEY',        '/UBOj#$3kP4oH~zqMt1bdX=_dFk4)ok(wSd[E1un][PVVtj;`&U0+E{-aW4])$bq');
define('AUTH_SALT',        '+OMv9#bWgZ{2K$-QW,K^+k083&[ehwgR{_/q;^_3D@;b7PDjH~9X*4aKXM805+b:');
define('SECURE_AUTH_SALT', 'J[}F+q|>9n<Kl%fv0+xCB^!]Zxg^5ML23dt-wo8|-Nca:^ i:I~IT&,+!x?`+V|8');
define('LOGGED_IN_SALT',   'qh`V-&~F&9t[_VK<P-yIM|&Y~is50qrt$)8y?5+@fOyv%jw}CNh.ZodP(6~`!@{c');
define('NONCE_SALT',       'rMG8c3=paT+O|/K(wN_IXH7_ZuJi{+e-;wex|=8gLb1pL_lJ?V_W8^zeE1*);v~=');

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
