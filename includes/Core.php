<?php
namespace WebsSudan\CustomAutoUpdater;

use WebsSudan\CustomAutoUpdater\Updater;

class Core {

	public function init() {
		add_filter( 'pre_set_site_transient_update_plugins', [ new Updater\Plugin(), 'register' ] );
		add_filter( 'pre_set_site_transient_update_themes', [ new Updater\Theme(), 'register' ] );
	}

}
