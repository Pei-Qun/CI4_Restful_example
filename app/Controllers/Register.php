<?php namespace App\Controllers;

use App\Models\MemberModel;
use CodeIgniter\API\ResponseTrait;

class Register extends BaseController
{
  use ResponseTrait;
  
	public function index()
	{
		if($this->auth->isLogin()) return redirect()->to("/member") ;
		return view('register_view');
  }

  public function getVerifyCode() {

  }
  
  public function doSignup()
  {
    $name = $this->request->getPost("name");
    $email = $this->request->getPost("email");
    $account = $this->request->getPost("account");
    $password = $this->request->getPost("password");
    $model = new MemberModel();
    if ($model->isSigned($account)) {
      return $this->fail("帳號已經存在", 400);
    }
    $memberAdd = $model->addMember($name, $email, $account, $password);
    if (!$memberAdd) {
        return $this->fail("資料庫資料取得失敗", 404);
    }
    
    // respondCreated 是 201
    return $this->respondCreated();
  }
}
