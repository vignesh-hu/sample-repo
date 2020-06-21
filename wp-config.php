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
define( 'DB_NAME', 'amazing_college' );

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
define( 'AUTH_KEY',         's6h/8ctA],!|fh+!Q9j/U2>g:)?>w^nl;?#$V+p)h:Cye*p(>9n%4a OHM,?hLs}' );
define( 'SECURE_AUTH_KEY',  '5b8.C.[rTF]HBDl:_#zV#+1NNzXiV491ry/8=kz: r7n0l@SvklXIw@rga/0dd;S' );
define( 'LOGGED_IN_KEY',    '(p@+jHFG_{H(wMAA#L7-c:Yv!%X:}Y}uht8C[Z$=M$wEV3tKOIMbKb9<w-Z RsIb' );
define( 'NONCE_KEY',        'Ucuu~VV`5V,[fB L:+zZ_gCPN3S0c7==sIy9mY#NF;`Z>sbA|Ne$53tQ4a}<%`<8' );
define( 'AUTH_SALT',        'u4zo9+1@YFUYA#ZOC>BdP-:1fgS)9FF,`.?oV55+B%lsl+0XH6P]$,_wwaR.Oqiv' );
define( 'SECURE_AUTH_SALT', ';sT?(ln8$u#Q8 i-.O-1(])T(wngJsg6/f$!TS#p%_mIanaOFTM)oyfyC:e_=*Ei' );
define( 'LOGGED_IN_SALT',   ')@+v&#^Mn-rQc; *R5S`?n[guIOw]KWQA;L(~@Y>;Q[Q{B;W](lb;&5z>=h;)f<}' );
define( 'NONCE_SALT',       'IU>]Yf.`J:+Cgi5z3Ht#<l.WY?F#JGubD%|WpX:w[ RLjXkm+x]1pr?o=tlXgu*j' );

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
