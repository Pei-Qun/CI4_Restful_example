<?php namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\LoginLogicModel;
use CodeIgniter\API\ResponseTrait;

class Login extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        // 20201118 
        if ($this->auth->isLogin()) {
            return redirect()->to("/member");
        } else {    
            return view('login_view');
        }
    }

    public function doLogin()
    {
        if ($this->auth->isLogin()) return $this->fail("已登入", 403);
        $account = $this->request->getPost("account");
        $password = $this->request->getPost("password");

        if ($account == null || $password == null) {
            return $this->fail("需傳遞帳號及密碼進行登入", 400);
        }

        $model = new MemberModel();
        $memberResult = $model->getMember($account, $password);
        if (!$memberResult) {
            return $this->fail("資料庫資料取得失敗", 404);
        }

        $logic = new LoginLogicModel();
        $memberData = $logic->processLogin($memberResult);
        if (!$memberData) {
            return $this->fail("帳號或密碼錯誤", 400);
        }
        $logic->setSessionData($memberData);
        return $this->respond(["message" => "success"], 200);
    }

    public function doLogout()
    {
        $logic = new LoginLogicModel();
        $logic->doLogout();
        return redirect()->to("/login");
    }
}
