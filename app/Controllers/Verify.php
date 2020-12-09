<?php namespace App\Controllers;

use App\Models\VerifyModel;
use CodeIgniter\API\ResponseTrait;

class Verify extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		return view('verify_view');
  }

  public function doVerify()
  {
		$verifyModel = new VerifyModel();
		$email = $this->request->getPost("email");
    $code =  $this->request->getPost("code");
    
		if ($verifyModel->getVerify($email, $code)) {
      return $this->respond("認證成功", 200);
    } else {
      return $this->fail("認證失敗", 400);
    }
  }

  // public function getVerifyCode() {
	// 	$verifyModel = new VerifyModel();
	// 	$email = $this->request->getPost("email");
	// 	$code = $verifyModel->getCode(5);
	// 	// 暫時的刪除測試重複資料
	// 	$verifyModel->delete($email);
	// 	$verifyModel->insert([
	// 		"email" => $email,
	// 		"code" => $code
	// 	]);
	// 	if($verifyModel->sentMail($email, $code)) {
	// 		return $this->respond(["msg"=>"成功"], 201);
	// 	} else {
	// 		return $this->respond(["msg"=>"失敗"], 400);
	// 	}
	// }

}
