<?php namespace Premmerce\WordpressSDK\Components\Notifier;

class Notifier{

	const ERROR = 'error';
	const WARNING = 'warning';
	const SUCCESS = 'success';
	const INFO = 'info';

	public function push($message, $type = self::SUCCESS){
		add_action('admin_notices', function() use ($message, $type){
			echo "<div class='notice notice-{$type} is-dismissible'><p>{$message}</p></div>";
		});
	}
}