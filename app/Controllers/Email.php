<?php namespace App\Controllers;

use App\Models\VerifyModel;
use CodeIgniter\API\ResponseTrait;

class Email extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		return view('welcome_message');
	}

	public function sentMail()
	{
		$email = \Config\Services::email();

		$email->setFrom('noReplyMeason@gmail.com', '曾霈宭');
		$email->setTo('nancy016071@gmail.com');
		// $email->setCC('another@another-example.com');
		// $email->setBCC('them@their-example.com');

		$email->setSubject('喔不');
		$email->setMessage('你今天好嗎');

		$email->send();
		return $email->printDebugger();
	}

	public function getVerifyCode() {
		$verifyModel = new VerifyModel();
		$email = $this->request->getPost("email");
		$code = $verifyModel->getCode(5);
		$verifyModel->delete($email);
		$verifyModel->insert([
			"email" => $email,
			"code" => $code
		]);
		if($verifyModel->sentMail($email, $code)) {
			return $this->respond(["msg"=>"成功"], 201);
		} else {
			return $this->respond(["msg"=>"失敗"], 400);
		}
	}

}
