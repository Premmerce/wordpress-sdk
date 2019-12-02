<?php namespace Premmerce\SDK\V2\Notifications;

use YeEasyAdminNotices\V1\AdminNotice;

class AdminNotifier{

	const ERROR = 'error';

	const WARNING = 'warning';

	const SUCCESS = 'success';

	const INFO = 'info';

	private $key = 'premmerce_admin_notifications';

	public function __construct(){
		$this->key .= get_current_user_id();
	}

	/**
	 * Add message to show on admin_notices action
	 *
	 * @param string $message
	 * @param string $type
	 * @param bool $isDismissible
	 */
	public function push($message, $type = self::SUCCESS, $isDismissible = false){
		$this->create($message, $type, $isDismissible)->show();
	}

	/**
	 * Save flash message to show during next request
	 *
	 * @param string $message
	 * @param string $type
	 * @param bool $isDismissible
	 */
	public function flash($message, $type = self::SUCCESS, $isDismissible = false){
		add_action('admin_footer', function() use ($message, $type, $isDismissible){
			$this->create($message, $type, $isDismissible)->showOnNextPage();
		});
	}

	/**
	 * @param string $message
	 * @param string $type
	 * @param bool $isDismissible
	 *
	 * @return AdminNotice
	 */
	private function create($message, $type, $isDismissible){
		$notice = AdminNotice::create()
			->html($message)
			->type($type);

		if($isDismissible){
			$notice->dismissible();
		}

		return $notice;
	}
}
