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
define( 'DB_NAME', 'schooladmission' );

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
define( 'AUTH_KEY',         'AmB-(LPB@ZK5M.egdW~NhZA3pK+1RmG);H!]|ACFS@]Qbf^[~-t1jP+u[)TQ,57j' );
define( 'SECURE_AUTH_KEY',  'yO`/I|=eYzVN5z)TBQ;H:(_v3Uz[qboqPG#5yOx2JS7@FQ9yYh;1CI4k:dDN~NwG' );
define( 'LOGGED_IN_KEY',    '<W^?6E|#{1MJ/UzJU?,5d/W9Eq2~l%4@nGr>y8:]+R6d+e5EHx//I}GHQ;wa.~fI' );
define( 'NONCE_KEY',        '!G8$N@@GBGOqxR//I=qAMf41Nz{}<YC}:#$hDXX}4*@[to5phsp[1t9V;cr#S[ja' );
define( 'AUTH_SALT',        'R+Zgs5E/m]uPHYXTZ;Am<h;CqB6R2ObGO<^bkaJT+=05noPel_WBOs,g-+],_p7n' );
define( 'SECURE_AUTH_SALT', 'Mq:Y@F)b#drc=,RV?CnF,qR+Q]U@+Z^tG AMDghl*~2y%N4t2sa:JLD.r<r?5NNw' );
define( 'LOGGED_IN_SALT',   'lhuh$,/)*sDDo2l.sj:-mi;Z!Rq=e,U1|uoCJroS?uC iCf{-Ebhw7r:n.PHsM#b' );
define( 'NONCE_SALT',       'c=+5}%},KhP1BI(NO]PUIn4+lT%^7N#ElBPQq@&>/9Ev{00i:%.#0u;Us#yb7)x[' );

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
