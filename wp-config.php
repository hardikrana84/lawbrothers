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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lawbrothers' );

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

define( 'WP_HOME', 'http://localhost/lawbrothers' );
define( 'WP_SITEURL', 'http://localhost/lawbrothers' );

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
define( 'AUTH_KEY',         ':WzBh<pfxD_c4C1;:hj7{{hW5P -p.,0WqB|ua,yk[P25zT;p+JssAxQ/O#<)JkM' );
define( 'SECURE_AUTH_KEY',  ')4C9*,y1{!`NhYuzcjztdiSl|$%uYmmB7%]7]Vj8~4`:Phd-0VZAl<LMO1&rJEsX' );
define( 'LOGGED_IN_KEY',    '&7,>eeufSdBB8=`_)r.h.b(2Z<efeb_mQK_D1cqK0L?n99[R@`|{|:wne%jh,xx%' );
define( 'NONCE_KEY',        '06{XqVfD~I~(^+p]_Yc*PM$r;a}go8)InBcRH{S5((>:Y+i;|WyAIh?8(_d4]MB1' );
define( 'AUTH_SALT',        'H#;x^4NNa1TFtFM-m<tOc3$j(2rHS47tRzcOW&]V6XPzh~IKIHh2L/f(E{&Ds{{T' );
define( 'SECURE_AUTH_SALT', '9wo]nhGdSsBBPL|=x0dax%;OB[9~ VJ={$=Ly`8m+K8[Dj=G10zp=$Da1[ASZ^Z8' );
define( 'LOGGED_IN_SALT',   'y@6)2yW,tN7l )~;zow}g-UGB^.c=P!$Uj3u$tH:^_}OKVgV0Az[9xHX$p`3qmNi' );
define( 'NONCE_SALT',       'WNz]Hv:U96t!A*KV)%{^^J}ykgds%CrmVv!@+2@q`:j*_yWeXw(_W>EUNWz6>zbU' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lb_';

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';