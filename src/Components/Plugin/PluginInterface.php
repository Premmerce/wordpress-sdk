<?php namespace Premmerce\WordpressSDK\Components\Plugins;


interface PluginInterface{

	public function run();

	public function activate();

	public function deactivate();

	public static function uninstall();
}