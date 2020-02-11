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
define( 'DB_NAME', 'lsrpqiil_wp975' );

/** MySQL database username */
define( 'DB_USER', 'lsrpqiil_wp975' );

/** MySQL database password */
define( 'DB_PASSWORD', '76nE!SLp(2' );

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
define( 'AUTH_KEY',         'eesgbyvnghnfvyrw2mo8yfmf0spevkytwvvxcbehyrbkiosg0iukfwaenfbyz7om' );
define( 'SECURE_AUTH_KEY',  'bu7xvhetdujwzfwyoxu9wpn2oarascn6hmee1ies4ls4owkwzg0b1pu8yb2gwdjt' );
define( 'LOGGED_IN_KEY',    '5r85kz4vdbbhugaqrvxy4t4icg5zuxzxlk170upyefmnwtnkicsh8rrzhr15c0gz' );
define( 'NONCE_KEY',        'zdx0eqqvzval0mqvxxunl9pbx6v1gzf6bipgsvfhaporfhmnopo0jjh2tmrfhioo' );
define( 'AUTH_SALT',        'xe19ahti0kzr4xujhuyuc77qadq1b6yfjn4jgzty7k8sdflgm86u0gsmnhd0ldxp' );
define( 'SECURE_AUTH_SALT', 'q7ekhk3hnaxbyebjy4n0fbb6fkzey5nycepv0yakgv1nuuynpzlytw9rwhuq22yv' );
define( 'LOGGED_IN_SALT',   '7cofesqv2p4egmadablcdd0nwdohpma7spxdc4ca2ud75ol7d1uetncwzhnm6hht' );
define( 'NONCE_SALT',       'yvcq14lsttuwq3ine1yb8bsqvfq5sjntdnhw3ipe7nxxxkz9h4ccl89kmcoc7uav' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpjn_';

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
