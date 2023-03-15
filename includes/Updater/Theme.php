<?php
namespace WebsSudan\CustomAutoUpdater\Updater;

class Theme extends Updater {

	public const CONFIG_KEY = 'CAU_THEMES';

	public function register( $transient, $config_key = '' ) {
		return parent::register( $transient, self::CONFIG_KEY );
	}

	public function get_installed_version( $theme ) {
		$theme_data = wp_get_theme( $theme['dir_name'] );
		if ( $theme['dir_name'] !== $theme_data->stylesheet ) {
			return null;
		}
		$installed_theme_version = $theme_data['Version'];
		if ( empty( $installed_theme_version ) ) {
			return null;
		}
		return $installed_theme_version;
	}

	public function add_update_notice( $transient, $theme, $remote_theme_version ) {
		$id = $theme['dir_name'];
		$remote_url = trailingslashit( $theme['update_dir_uri'] ) . $theme['zip'];
		$update_notice = [
			'url'         => $remote_url,
			'package'     => $remote_url,
			'new_version' => $remote_theme_version,
		];
		$transient->response[ $id ] = $update_notice;
		return $transient;
	}

}
