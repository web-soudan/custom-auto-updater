<?php
/*
 * Plugin Name:       Custom Auto Updater: Themes and Plugins
 * Plugin URI:        https://github.com/web-soudan/custom-auto-updater
 * Description:       Enable auto update of themes and plugins from an external server.
 * Version:           0.0.1
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            websoudan
 * Author URI:        https://web-soudan.co.jp
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CAU_BASE_DIR', plugin_dir_path( __DIR__ ) );

require_once __DIR__ . '/includes/Core.php';
require_once __DIR__ . '/includes/Updater/Updater.php';
require_once __DIR__ . '/includes/Updater/Plugin.php';
require_once __DIR__ . '/includes/Updater/Theme.php';

add_action(
	'plugins_loaded', [
		new WebsSudan\CustomAutoUpdater\Core, 
		'init'
	]
);
