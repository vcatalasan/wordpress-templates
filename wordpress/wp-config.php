<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bscmembership');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'no-password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '^FG5S;8SB|f|F,/E-CEj{>r-^J|} lVI&17g<&,k[[kM|e+09Cowbp?aeE7}yPsD');
define('SECURE_AUTH_KEY',  'i~SI3#we,QhqqLwoQs>+Vs8Yf&V~]V|th~OwT-}bx19V{)Y9m_9/}@=/K}3cjcey');
define('LOGGED_IN_KEY',    'iJ47x*gGd/*V4F[|mpz;<B|dn3~m[>5H!A$&J[B{6koN@DU.4.A?u[R;M}kR07J|');
define('NONCE_KEY',        '&a|IX!G-p&|8:La;9>l(_]TO6(t(x^hl$3nGv^v7w24{`e.JW_*L~UAZAoLUc8N-');
define('AUTH_SALT',        '.(YBYP EKWPp%OiEoM^T}@+n*c_v0*||j7xI,L-XxR>-T2nYfz.kZ*,?fT{uSeDk');
define('SECURE_AUTH_SALT', '13f!~Y}RCYttMS{k^g!A*9J /A+JCP-uQ^t|at}pW/mrm|Y|$!7q}6aGa4X6^[1=');
define('LOGGED_IN_SALT',   'Ez^:`GH|ItR<Uz.g<zEq@K/|oK!v)9YQZhWeWh&2HPi>)TwB7)3l~&At4~z@DD67');
define('NONCE_SALT',       'f`hhc8Xn$?8H:5K|Znaoa>|n.o}`gZU63r37o[<[JHs{ByTnz<12{LJFPw+o6]$x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
