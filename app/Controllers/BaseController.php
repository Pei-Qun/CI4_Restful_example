<?php namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{

	protected $helpers = [];
	// protected $session;
	// 20201118 這樣設定可以在其他地方跳出提示
	/**
	 * Undocumented variable
	 *
	 * @var \App\Services\UserAuth
	 */
	protected $auth;
	protected $memberData;

	public function initController(
		\CodeIgniter\HTTP\RequestInterface $request,
		\CodeIgniter\HTTP\ResponseInterface $response,
		\Psr\Log\LoggerInterface $logger
	) {
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		// 20201104
		// $this->session = \Config\Services::session();
		// 20201118
		$this->auth = \Config\Services::UserAuth();
	}

}
