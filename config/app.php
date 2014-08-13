<?php

$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir . '/public_html';

/**
 * Set up our global environment constant and load its config first
 * Default: development
 */
define('APP_ENVIRONMENT', getenv('APP_ENVIRONMENT') ? getenv('APP_ENVIRONMENT') : 'development');

$env_config = dirname(__FILE__) . '/environments/' . APP_ENVIRONMENT . '.php';

if (file_exists($env_config)) {
  require_once $env_config;
}

/**
 * Custom Content Directory
 */
define('CONTENT_DIR', '/content');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * DB settings
 */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ? getenv('DB_PREFIX') : 'wp_';

/**
 * WordPress Localized Language
 * Default: English
 *
 * A corresponding MO file for the chosen language must be installed to app/languages
 */
define('WPLANG', '');

/**
 * Includes the salt definitions
 */
require('salts.php');

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', true);
define('DISALLOW_FILE_EDIT', true);

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
  define('ABSPATH', $webroot_dir . '/wp/');
}