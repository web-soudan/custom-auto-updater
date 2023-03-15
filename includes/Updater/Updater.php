<?php
namespace WebsSudan\CustomAutoUpdater\Updater;

class Updater {

	public function register( $transient, $config_key = '' ) {
		$settings = $this->get_settings( $config_key );
		if ( empty( $settings ) ) {
			return $transient;
		}
		foreach ( $settings as $item ) {
			$installed_version = $this->get_installed_version( $item );
			if ( is_null( $installed_version ) ) {
				continue;
			}
			$remote_version = $this->get_remote_version( $item );
			if ( is_null( $remote_version ) ) {
				continue;
			}
			if ( $this->version_compare( $installed_version, $remote_version ) ) {
				$transient = $this->add_update_notice( $transient, $item, $remote_version );
			}
		}
		return $transient;
	}

	public function get_installed_version( $item ) {
		//
	}

	public function get_remote_version( $item ) {
		$remote_version = wp_remote_get( trailingslashit( $item['update_dir_uri'] ) . $item['version'] );
		if ( 200 !== wp_remote_retrieve_response_code( $remote_version ) ) {
			return null;
		}
		$remote_version = json_decode( wp_remote_retrieve_body( $remote_version ) );
		if ( ! isset( $remote_version->version ) || empty( $remote_version->version ) ) {
			return null;
		}
		return $remote_version->version;
	}

	public function get_settings( $config_key ) {
		if ( ! defined( $config_key ) || ! is_array( constant( $config_key ) ) ) {
			return null;
		} else {
			return constant( $config_key );
		}
	}

	public function version_compare( $installed_version, $remote_version ) {
		return version_compare( $installed_version, $remote_version, '<' );
	}

	public function add_update_notice( $transient, $item, $remote_version ) {
		//
	}

}
