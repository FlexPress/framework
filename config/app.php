<?php

/**
 * Application directories
 */
define('APP_DIR', dirname(__DIR__));
define('APP_WEB_DIR', APP_DIR . '/public_html');

/**
 * Application environment settings
 */
define('APP_ENVIRONMENT', getenv('APP_ENVIRONMENT') ?: 'development');

$environmentConfigFile = APP_DIR . '/config/environments/' . APP_ENVIRONMENT . '.php';

if(file_exists($environmentConfigFile)) {
    require_once($environmentConfigFile);
}

/**
 * Custom WordPress config
 */

define('CONTENT_DIR', '/content');
define('WP_CONTENT_DIR', APP_WEB_DIR . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('WPLANG', '');

$table_prefix = 'fp_';

/**
 * Includes the salt definitions
 */
require('salts.php');

/**
 * Security configuration
 */
define('DISABLE_WP_CRON', true);
define('DISALLOW_FILE_EDIT', true);
define('AUTOMATIC_UPDATER_DISABLED', true);

/**
 * Finally include WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', APP_WEB_DIR . '/wp/');
}