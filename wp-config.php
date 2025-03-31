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
define( 'DB_NAME', 'grafic-trafic' );

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
define( 'AUTH_KEY',         '?Y-W<~q3pz2DPf:JFS-R{V&/]?v#e1Q;UbU!-^nno!P->Am.(%nC?Xv@j^FDZ--s' );
define( 'SECURE_AUTH_KEY',  'o!|<y%c^5Xa<dcw9P`+!ldh1{r$ KG-cm<E;@Hb=4w@C`z</5S,9.PC4`{M0]yQX' );
define( 'LOGGED_IN_KEY',    '%6%~y9m1,$h(4EH>.%at9+lhBKZ/,VGC->V_gO%ndh_xl^?ql7f S4&D5;L,c0Qr' );
define( 'NONCE_KEY',        ';L<,5lkTatdy7=PePX{ v<*{<.P*ah2c,T;<v=uE`o(. WOl2mg${O,(6@6ZSu3q' );
define( 'AUTH_SALT',        'MZniK(A]y.+vhIO]<Jj}G`h&Yj+![aw [_j:x^BO4)x}30_~kd{Tok)A3]Ua7Xxe' );
define( 'SECURE_AUTH_SALT', 'g#Cotf7GFT*=w4EriQV%-Y7Bb`4jft@X^tLMt.8Z%rM<)U+PV6btuqfY&Ug(w(ia' );
define( 'LOGGED_IN_SALT',   '.I#?8GG~o>5]n]0JtM(l[*m;)@2QFv`L6_y2~zLPd^V~V/Y0zlm$ZKULb@Fi>?]q' );
define( 'NONCE_SALT',       'xQGnP4(z*N]g5Wnq;ch~UgL *b<XJu>hd#0q&$;TwVVo4+UKZ}O(_^5~l!8p:R)r' );

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
