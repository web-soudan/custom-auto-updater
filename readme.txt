=== Custom Auto Update ===
Contributors: websoudan
Donate link: https://web-soudan.co.jp
Tags: Update, Auto, Update
Requires at least: 6.0
Tested up to: 6.1.1
Stable tag: 0.0.2
Requires PHP: 8.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Enable auto update of themes and plugins from an external server.

=== Installation ===

Add the following constants to wp-config.php.

**Theme**

`
define(
	'CAU_THEMES', [
		[
			'dir_name' => 'your-theme-dir-name',
			'update_dir_uri' => 'your-server-dir-uri',
			'version' => 'your-version-json-file',
			'zip' => 'your-theme-zip-name'
		],
	]
);
`

***.exg***

`
define(
	'CAU_THEMES', [
		[
			'dir_name' => 'my-theme',
			'update_dir_uri' => 'https://example.com/theme-update/',
			'version' => 'version.json',
			'zip' => 'my-theme.zip'
		],
	]
);
`

**Plugin**

`
define(
	'CAU_PLUGINS', [
		[
			'dir_name' => 'your-plugin-dir-name',
			'file_name' => 'your-plugin-main-file-name',
			'update_dir_uri' => 'your-server-dir-uri',
			'version' => 'your-version-json-file',
			'zip' => 'your-plugin-zip-name',
		],
	]
);
`

***.exg***

`
define(
	'CAU_PLUGINS', [
		[
			'dir_name' => 'my-plugin',
			'file_name' => 'plugin.php',
			'update_dir_uri' => 'https://example.com/plugin-update/',
			'version' => 'version.json',
			'zip' => 'my-plugin.zip',
		],
	]
);
`
**About version.json**

The verson.json file should contain the following

`
{
	"version" : "your-plugin-or-theme-version"
}
`
***.exg***

`
{
	"version" : "1.0.1"
}
`

*** Note ***

If you have Basic Authentication enabled on the server hosting your latest theme or plugin, use the Basic Authentication user/password in the URL as follows.

`
https://user:password@example.com
`
