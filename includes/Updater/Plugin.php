<?php
namespace WebsSudan\CustomAutoUpdater\Updater;

class Plugin extends Updater {

	public const CONFIG_KEY = 'CAU_PLUGINS';

	public function register( $transient, $config_key = '' ) {
		return parent::register( $transient, self::CONFIG_KEY );
	}

	public function get_installed_version( $plugin ) {
		$plugin_file_name = trailingslashit( CAU_BASE_DIR . $plugin['dir_name'] ) . $plugin['file_name'];
		if ( ! file_exists( $plugin_file_name ) ) {
			return null;
		}
		$plugin_data = get_plugin_data( $plugin_file_name );
		$installed_plugin_version = $plugin_data['Version'];
		if ( empty( $installed_plugin_version ) ) {
			return null;
		} else {
			return $installed_plugin_version;
		}
	}

	public function add_update_notice( $transient, $plugin, $remote_plugin_version ) {
		$id = trailingslashit( $plugin['dir_name'] ) . $plugin['file_name'];
		$remote_url = trailingslashit( $plugin['update_dir_uri'] ) . $plugin['zip'];
		$transient->response[ $id ] = (object) [
			'id'            => $id,
			'slug'          => $plugin['dir_name'],
			'new_version'   => $remote_plugin_version,
			'url'           => $remote_url,
			'package'       => $remote_url,
			'compatibility' => new \stdClass(),
		];
		return $transient;
	}
}
