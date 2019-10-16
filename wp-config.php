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
define( 'DB_NAME', 'rara' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         ':oG?DbuV.r(F:t&/o18e<ysIWu+%08;0~S;g{*8T;Eu&X%/FBdWNLwl8.g@r%L`j' );
define( 'SECURE_AUTH_KEY',  '(=]2mo?lt!^Gvdrv(DV?%ExOKmFUlwT7mhcGrbb|k>u/I[=Q]8A#nD&1HA[$3Wr>' );
define( 'LOGGED_IN_KEY',    'f)uR(,Ncd,Nr0V` l/E^Ye7svpv&;G y aWg(M]b;%1DviiEx#9pBXeYT9+SK~.-' );
define( 'NONCE_KEY',        'Y+Yiz?Z#]],E>rM2wPXJ?+|!:_>I>;**Qxm7X|F`B(:`RqDC2+[Q*%,F5?P^)>3j' );
define( 'AUTH_SALT',        'DR`R;mKGt.ga)ACjU>0RB^9h)sX,L%W)F3+OM#&%lr7t&!q.9t$)^PW4sZP.! Dn' );
define( 'SECURE_AUTH_SALT', 'jq#U]Fx=L{:IFr$9Gy|SOZYBWs;U?SB0J_&fZZDuL/Y|tanJn{f>v{5q4*sH:m$P' );
define( 'LOGGED_IN_SALT',   'V7c]rN+ElKhefM*q)i^dR}CeJC,J=S}XyQZjER@qQ,Z+Q^Wk@x5`G.htx-6vP8HX' );
define( 'NONCE_SALT',       'V~+#SnhByYBQcD+m1K7GK1<?@Bm+Q8b|AAHPculxma_FWx.#?M}-J#4w-nP+yNAw' );

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
